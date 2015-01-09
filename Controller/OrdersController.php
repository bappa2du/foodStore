<?php

App::uses('AppController', 'Controller');

class OrdersController extends AppController
{

    public $components = array (
        'Paginator'
    );

    public function index()
    {
        $this->Order->recursive = 0;
        $this->paginate         = array (
            'maxLimit' => 999999999,
            'limit'    => 999999999
        );
        $this->set('orders', $this->Paginator->paginate());

    }

    public function test()
    {
        die('dd');

    }

    public function orderList()
    {

        $this->Order->recursive             = 1;
        $user                               = $this->UserAuth->getUser();
        $this->paginate                     = array (
            'maxLimit' => 9999,
            'limit'    => 999,
            'order'    => array (
                'created' => 'Desc'
            )
        );
        $this->loadModel('Food');
        $foods                              = $this->Food->find('all');
        $this->set(compact('foods'));
        $this->Paginator->settings['limit'] = 10;
        $this->set('orders', $this->Paginator->paginate());

    }

    public function guestOrder()
    {
        $this->Order->recursive = 0;
        $guestOrder             = $this->Session->read("guestOrder");
        $guestOrderEmail        = $guestOrder ['Order'] ['customer_email'];
        $this->paginate         = array (
            'limit'      => 1,
            'order'      => array (
                'created' => 'Desc'
            ),
            'conditions' => array (
                'Order.customer_email =' => $guestOrderEmail
            )
        );

        $this->set('orders', $this->Paginator->paginate());

    }

    public function printOrder($orderId)
    {
        $this->layout           = 'ajax';
        $this->Order->recursive = 1;
        $this->paginate         = array (
            'limit'      => 1,
            'order'      => array (
                'created' => 'Desc'
            ),
            'conditions' => array (
                'Order.id =' => $orderId
            )
        );

        $this->set('orders', $this->Paginator->paginate());

    }

    /**
     * =====================
     * Custom function
     * =====================
     */
    public function printOrderModal($orderId)
    {

        $this->layout           = 'ajax';
        $this->Order->recursive = 1;
        $this->paginate         = array (
            'limit'      => 1,
            'order'      => array (
                'created' => 'Desc'
            ),
            'conditions' => array (
                'Order.id =' => $orderId
            )
        );

        $this->set('orders', $this->Paginator->paginate());

    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array (
            'conditions' => array (
                'Order.' . $this->Order->primaryKey => $id
            )
        );
        $this->set('order', $this->Order->find('first', $options));

    }

    public function orderView($id = null)
    {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array (
            'conditions' => array (
                'Order.' . $this->Order->primaryKey => $id
            )
        );
        $this->set('order', $this->Order->find('first', $options));

    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {

//		 var_dump(); die();

        if ($this->request->is('post')) {
            $user                                            = $this->UserAuth->getUser();
            $this->Order->create();
            $this->request->data ['Order'] ['status']        = 'Processing';
            $orderData                                       = $this->Session->read('cart');
            $this->request->data ['Order'] ['restaurant_id'] = $orderData ['restaurant'] ['id'];
            $this->request->data ['Order'] ['total_price']   = $orderData ['total'];
            /**
             * =========================================================================================================
             * =========================================== <<Tappware Change>> =========================================
             * =========================================================================================================
             */
            $this->request->data ['Order'] ['delivery_note'] = $this->request->data ['Order'] ['delevery_instruction'];
            /**
             * =========================================================================================================
             * =========================================== <<Tappware Change>> =========================================
             * =========================================================================================================
             */
            if (!empty($user)) {
                $this->request->data ['created_by'] = $user ['User'] ['email'];
            }

            /**
             * =========================================================================================================
             *  Call payment getwary for CARD form authorize.net
             * =========================================================================================================
             */
            if ($this->request->data ['transaction_type'] == 'Card') {
                $data       = $this->process_payment($this->data);
                $pay_status = $data ['payment_code'];
            } else {
                $data       = $this->request->data;
                $pay_status = "1";
            }

            /**
             * =========================================================================================================
             *  payment getwary form authorize.net for CARD
             * =========================================================================================================
             */
            if ($pay_status == "1") {
                //debug($data);
                $this->Order->save($data);
                //die();
                $data = $this->Session->read('cart');

                //debug($this->request->data);
                debug($data);
                //die();

                $delivery                             = 'chefgenie.co.uk';
                $restaurant_id                        = $this->request->data['Order'] ['restaurant_id'];
                $orderNo                              = $this->Order->getLastInsertId();
                $this->request->data ['Order'] ['id'] = $orderNo;
                $orderAddress                         = $this->request->data ['Order'] ['delivery_address']; // 'Thai Erawan<br/>629 Roundhai Road<br/>Leeds LS8';
                $itemNPrice = null;

                foreach ($data ['food'] as $item) {

                    $this->loadModel('OrderItem');
                    $this->OrderItem->create();

                    $orderItemData ['OrderItem'] ['order_id']      = $orderNo;
                    $orderItemData ['OrderItem'] ['food_id']       = $item ['id'];
                    $orderItemData ['OrderItem'] ['item_name']     = $item ['name'];

                    //additional_item variable will contain information for both main food and additional food.
                    foreach ($item['additional'] as $additional_item) {

                        $orderItemData ['OrderItem'] ['quantity'] = $additional_item ['orderQty'];
                        $orderItemData ['OrderItem'] ['price'] = $additional_item ['price'];
                        $orderItemData ['OrderItem'] ['lineItemTotal'] = $additional_item ['lineItemTotal'];

                        /**
                         * When additional food has been chosen, the fields 'additional_id' & 'additional_item_name' will be populated.
                         * Otherwise those fields will be kept as null ( default at database level also ).
                         */
                        if (!empty($additional_item['name'])) {
                            $orderItemData ['OrderItem'] ['additional_id'] = $additional_item ['id'];
                            $orderItemData ['OrderItem'] ['additional_item_name'] = $additional_item ['name'];
                        } else {
                            $orderItemData ['OrderItem'] ['additional_id'] = NULL;
                            $orderItemData ['OrderItem'] ['additional_item_name'] = NULL;
                        }
                    }

                    $this->OrderItem->save($orderItemData);

                    // debug($data['food']);die;
                    // $itemNPrice = '<row><Ltd>1 x no.3 Chicken Satax</Ltd><Rtd>pounds 4,20</Rtd></row><row><Ltd>1 x no.10 Guns Chu Pang Tod</Ltd><Rtd>pounds 1,50</Rtd></row><row><Ltd>1 x no.11 Guns Hom Pa </Ltd><Rtd>Pounds 1.50</Rtd></row><row><Ltd>1 x no.51 Gans Inman With (Beef)</Ltd><Rtd>Pounds 6,95</Rtd></row><row><Ltd>1 x no.45 Gans Kies Wan With (Chicken)</Ltd><Rtd>Pounds 6,95</Rtd></row><row><Ltd>1 x no.42 Thai Gans Oang With (Beef)</Ltd><Rtd>Pounds 6,95</Rtd></row><row><Ltd>3 x no. 128 Khao Hom Mali</Ltd><Rtd>Pounds 5,25</Rtd></row>';
                    $itemNPrice .= '<row><Ltd>' . $item ['name'] . '</Ltd><Rtd>pounds  ' . $additional_item ['lineItemTotal'] . '</Rtd></row>';
                }

                $this->loadModel('Restaurant');
                $restaurant     = $this->Restaurant->find('first', array (
                    'conditions' => array (
                        'id' => $orderData ['restaurant'] ['id']
                    ),
                    'recursive'  => -1
                ));

                $deliveryCharge = 'Pounds ' . $restaurant ['Restaurant'] ['delivery_charge'];
                $totalPayable   = 'Pounds ' . $data ['total'];
                $customerInfo   = $this->request->data ['Order'] ['delivery_address'] . '<br/>Phone :' . $this->request->data ['Order'] ['customer_mobile'];
                $orderStatus    = $this->request->data ['Order'] ['status'];
                $comment        = $this->request->data['Order'] ['comment'];

                //$deliveryTime   = $this->request->data ['delivery_time_value'];
//                    debug($orderStatus);
//                    die();
                $order_time     = date('Y-m-d H:i:s');
                $customer_phone = $this->request->data['Order']['customer_mobile'];
                $payment_mode   = $this->request->data ['transaction_type'];
                $card_no        = $this->request->data ['transaction_card_number'];

                $prev_delivery = $this->Order->find('count', array ('conditions' => array ('restaurant_id' => $restaurant ['Restaurant'] ['id'], 'customer_email' => $user ['User'] ['email']), 'recursive' => -1));
                if ($prev_delivery > 1) {
                    $prev_delivery = $prev_delivery - 1;
                }
//                    debug($restaurant_id);
//                    die();
                /**
                 * =========================================================================================================
                 *  Start order All API Request
                 * =========================================================================================================
                 */
//                    $online_restaurant = json_decode($this->_onlineRestaurant(), true);
                /**
                 * ==========================================================================================================
                 *  return all available restaurant_id connected to open print server
                 * ==========================================================================================================
                 */
//                    foreach($online_restaurant['restaurant_id'] as $online)
//                    {
//                        debug($online);
//                        if($online == $restaurant_id)
//                        {
//                            echo "Restaurant is open";
//                        }
//                        else
//                        {
//                            echo "Restaurant is close";
//                        }
//                    }
//                    debug($online_restaurant['restaurant_id']);
//                    die();
//                    $api_response = $this->_startOrder($restaurant_id, $delivery, $orderNo, $orderAddress, $itemNPrice, $deliveryCharge, $totalPayable);
//                    $start_order = $this->_startOrder($restaurant_id, $delivery, $orderNo, $orderAddress, $itemNPrice, $deliveryCharge, $totalPayable,$comment);
//                    $start_order = json_decode($start_order, true);
//                    debug($start_order);
//                    $transaction_id = $start_order['transaction_id'];

                /**
                 * ==========================================================================================================
                 *  return transaction_id
                 * ==========================================================================================================
                 */
//                    $currentOrderStatus = $this->_getOrderStatus($transaction_id);
//                    $currentOrderStatus = json_decode($currentOrderStatus, true);
//                    debug($currentOrderStatus);//order_status = 3 i.e. pending
//                    die();
                /**
                 * ==========================================================================================================
                 *  Return order_status and delivery_time
                 *  "order_status": 1,"delivery_time": "60"
                 * ==========================================================================================================
                 */
//                    $endOrder = $this->_endOrder($deliveryTime, $customerInfo, $orderStatus, $prev_delivery, $order_time, $customer_phone, $card_no, $payment_mode, $transaction_id, $final_response);
                /**
                 * ==========================================================================================================
                 *  return order_status
                 * ==========================================================================================================
                 */
//                    debug($api_response);
//                    die();
                /**
                 * =========================================================================================================
                 *  $api_response = "yes"
                 * =========================================================================================================
                 */
                $api_response = "yes";

                if ($api_response == "yes") {
                    $this->Session->write("guestOrder", $this->request->data);
                    $this->Session->delete('cart');
                    if (!empty($user)) {
                        return $this->redirect(array (
                                    'action' => 'thankyou'
                        ));
                    } else {
                        return $this->redirect(array (
                                    'action' => 'guestOrder'
                        ));
                    }
                } else {
                    $this->Order->id = $orderNo;
                    $this->Order->saveField('status', "Print Server Failure");

                    $this->Session->setFlash(__('Problem occurred while processing your order. Please, try again. COZ we are testing'));
                    $this->redirect(array (
                        'controller' => 'orders',
                        'action'     => 'checkout'
                    ));
                }
                /**
                 * =========================================================================================================
                 *  End API request
                 * =========================================================================================================
                 */
            } else {
                /**
                 * ==========================================================================================================
                 *  For Error CARD Payment
                 * ==========================================================================================================
                 */
                $this->Session->setFlash(__($data ['payment_code_message'] . '<br/>The order could not be saved. Please, try again.'));
                $this->redirect(array (
                    'controller' => 'orders',
                    'action'     => 'checkout'
                ));
            }
        }

    }

    public function thankyou()
    {

    }

    public function edit($id = null)
    {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array (
                    'post',
                    'put'
                ))
        ) {
            if ($this->Order->save($this->request->data)) {
                $this->Session->setFlash(__('The order has been saved.'));
                return $this->redirect(array (
                            'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
            }
        } else {
            $options             = array (
                'conditions' => array (
                    'Order.' . $this->Order->primaryKey => $id
                )
            );
            $this->request->data = $this->Order->find('first', $options);
        }

    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        // $this->request->allowMethod('post', 'delete');

        if ($this->request->isPost()) {

            if ($this->Order->delete()) {
                $this->Session->setFlash(__('The order has been deleted.'));
            } else {
                $this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
            }
        }

        return $this->redirect(array (
                    'action' => 'index'
        ));

    }

    public function checkout()
    {

        $userId = $this->UserAuth->getUserId();
        if ($userId) {
            $this->loadModel('Restaurant');
            $cartdata = $this->Session->read('cart');

            $restaurant_id = $cartdata ['restaurant'] ['id'];
            $restaurant    = '';
            if (!empty($restaurant_id) && !empty($cartdata ['food'])) {
                $restaurant = $this->Restaurant->find('first', array (
                    'conditions' => array (
                        'Restaurant.' . $this->Restaurant->primaryKey => $restaurant_id
                    )
                ));
            }

            $this->set(compact('cartdata', 'restaurant'));
        } else {
            return $this->redirect('/login?checkout');
        }

    }

    public function ajaxAddToCart()
    {
        $return_data = array ();
        if ($this->request->is(array ('post', 'put'))) {
            $food_id       = empty($this->request->data['food_id']) ? 0 : $this->request->data['food_id'];
            $additional_id = empty($this->request->data['additional_id']) ? 0 : $this->request->data['additional_id'];
            $action        = $this->request->data['action'];

            $food       = $this->_prepareFood($food_id);
            $additional = $this->_prepareAdditionalFood($additional_id);

            if (!empty($food)) {
                $lineItemPrice = empty($additional) ? $food['Food']['price'] : $additional['Additional']['price'];
                $lineItemName  = empty($additional) ? '' : $additional['Additional']['name'];
                $lineItemId    = empty($additional) ? 0 : $additional['Additional']['id'];
            }
            $total    = 0;
            $subtotal = 0;

            if (!empty($food) && in_array($action, array ('add', 'delete'))) {
//            echo "<pre>";
//            print_r($additional);
//            die();
                $data = $this->Session->read('cart');

//                $data = $this->Session->write('cart', array());

                if (!empty($data['restaurant']['id']) && ($data['restaurant']['id'] == $food['Restaurant']['id'])) {
                    $foodExist = false;
                    foreach ($data['food'] as $f_key => $f_val) {
                        foreach ($f_val['additional'] as $key => $val) {
                            if (!empty($additional)) {
                                if ($additional['Additional']['id'] == $val['id']) {
                                    switch ($action) {
                                        case 'add':
                                            $orderQty = $val['orderQty'] + 1;
                                            break;
                                        case 'delete':
                                            $orderQty = $val['orderQty'] - 1;
                                            break;
                                    }
                                    if ($orderQty < 1) {
                                        $orderQty = 0;
                                    }
                                    $data['food'][$f_key]['additional'][$key]['orderQty']      = $orderQty;
                                    $data['food'][$f_key]['additional'][$key]['lineItemTotal'] = $lineItemPrice * $data['food'][$f_key]['additional'][$key]['orderQty'];
                                    $foodExist                                                 = true;
                                }
                            } else {
                                if ($food['Food']['id'] == $f_val['id']) {
                                    switch ($action) {
                                        case 'add':
                                            $orderQty = $val['orderQty'] + 1;
                                            break;
                                        case 'delete':
                                            $orderQty = $val['orderQty'] - 1;
                                            break;
                                    }
                                    if ($orderQty < 1) {
                                        $orderQty = 0;
                                    }
                                    $data['food'][$f_key]['additional'][$key]['orderQty']      = $orderQty;
                                    $data['food'][$f_key]['additional'][$key]['lineItemTotal'] = $lineItemPrice * $data['food'][$f_key]['additional'][$key]['orderQty'];
                                    $foodExist                                                 = true;
                                }
                            }
                        }
                    }
                    foreach ($data['food'] as $f_key => $f_val) {
                        foreach ($f_val['additional'] as $key => $val) {
                            if ($data['food'][$f_key]['additional'][$key]['orderQty'] < 1) {
                                unset($data['food'][$f_key]['additional'][$key]);
                            }
                        }
                        if (empty($data['food'][$f_key]['additional'])) {
                            unset($data['food'][$f_key]);
                        }
                    }


                    if (!$foodExist) {
                        $data['food'][] = array (
                            'id'         => $food['Food']['id'],
                            'name'       => $food['Food']['name'],
                            'additional' => array (
                                array (
                                    'id'            => $lineItemId,
                                    'name'          => $lineItemName,
                                    'orderQty'      => 1,
                                    'price'         => $lineItemPrice,
                                    'lineItemTotal' => $lineItemPrice * 1,
                                )
                            )
                        );
                    }

                    foreach ($data['food'] as $food) {
                        foreach ($food['additional'] as $row) {
                            $subtotal += $row['price'] * $row['orderQty'];
                        }
                    }
                    $total = $subtotal;

                    $data['total'] = $total;
                } else {

                    $data = array (
                        'restaurant' => array (
                            'id'   => $food['Restaurant']['id'],
                            'name' => $food['Restaurant']['name'],
                            'min_order' => $food['Restaurant']['min_order'],
                        ),
                        'food'       => array (
                            array (
                                'id'         => $food['Food']['id'],
                                'name'       => $food['Food']['name'],
                                'additional' => array (
                                    array (
                                        'id'            => $lineItemId,
                                        'name'          => $lineItemName,
                                        'orderQty'      => 1,
                                        'price'         => $lineItemPrice,
                                        'lineItemTotal' => $lineItemPrice * 1,
                                    )
                                )
                            )
                        ),
                        'total'      => $lineItemPrice
                    );
                }
                $this->Session->write('cart', $data);
                $return_data['type'] = 'success';
                $return_data['cart'] = $data;
            } else {
                $data = $this->Session->read('cart');
                if ($data['restaurant']['id'] != $this->request->data['restaurant_id']) {
                    $data = array ();
                }
                $return_data['type'] = 'success';
                $return_data['cart'] = $data;
            }
        } else {
            $return_data['type']    = 'error';
            $return_data['message'] = 'Invalid method';
        }

        $this->autoRender = false;
        $this->response->type('json');
        $return_data      = json_encode($return_data);
        $this->response->body($return_data);

    }

//    public function ajaxAddToCart()
//    {
//        $return_data             = array ();
//        $return_data ['type']    = 'error';
//        $return_data ['message'] = 'Invalid method';
//
//        if ($this->request->is(array ('post', 'put'))) {
//
//            $action   = $this->request->data ['action'];
//            $total    = 0;
//            $subtotal = 0;
//
//            $food_id            = empty($this->request->data ['food_id']) ? 0 : $this->request->data ['food_id'];
//            $additional_food_id = empty($this->request->data ['additional_id']) ? 0 : $this->request->data ['additional_id'];
//
//            if (!$additional_food_id) {
//                $food        = $this->_prepareFood($food_id);
//                $return_data = $this->_updateCart($food, $action);
//            } else {
//                //note: confusion may arise. on cart additional_food is sent AS food to keep existing code flow
//                //food contains food_id means this food is basically additional food
//                $additional_food = $this->_prepareAdditionalFood($additional_food_id);
//                $_food           = $this->_prepareFood($additional_food['Additional']['food_id']);
//                $additionalFood  = array ('Food' => $additional_food['Additional'], 'Restaurant' => $_food['Restaurant']);
//                //print_r($additionalFood);die();
//                $return_data     = $this->_updateCart($additionalFood, $action);
//            }
//        }
//
//
//        $this->autoRender = false;
//        $this->response->type('json');
//        $return_data      = json_encode($return_data);
//        $this->response->body($return_data);
//
//    }

    private function _prepareFood($food_id)
    {

        $this->loadModel('Food');
        $options = array (
            'conditions' => array (
                'Food.' . $this->Food->primaryKey => $food_id
            )
        );
        return $food    = $this->Food->find('first', $options);

    }

    private function _prepareAdditionalFood($additional_food_id)
    {

        $this->loadModel('Additional');
        $options         = array (
            'conditions' => array (
                'Additional.' . $this->Additional->primaryKey => $additional_food_id
            )
        );
        return $additional_food = $this->Additional->find('first', $options);

    }

    private function _updateCart($food, $action)
    {

        $data = $this->Session->read('cart');


        if (!empty($food) && in_array($action, array ('add', 'delete'))) {

            if (!empty($data ['restaurant'] ['id']) && ($data ['restaurant'] ['id'] == $food ['Restaurant'] ['id'])) {

                $foodExist = false;

                foreach ($data ['food'] as $key => $val) {
                    if ($food ['Food'] ['id'] == $val ['id']) {
                        switch ($action) {
                            case 'add' :
                                $orderQty = $val ['orderQty'] + 1;
                                break;
                            case 'delete' :
                                $orderQty = $val ['orderQty'] - 1;
                                break;
                        }
                        if ($orderQty < 1) {
                            $orderQty = 0;
                        }
                        $data ['food'] [$key] ['orderQty']      = $orderQty;
                        $data ['food'] [$key] ['lineItemTotal'] = $food ['Food'] ['price'] * $data ['food'] [$key] ['orderQty'];
                        $foodExist                              = true;
                    }
                }

                foreach ($data ['food'] as $key => $val) {
                    if ($data ['food'] [$key] ['orderQty'] < 1) {
                        unset($data ['food'] [$key]);
                    }
                }

                if (!$foodExist) {
                    if (array_key_exists('food_id', $food ['Food'])) {
                        $data ['food'] [] = array (
                            'id'                 => $food ['Food'] ['food_id'],
                            'additional_food_id' => $food ['Food'] ['id'],
                            'name'               => $food ['Food'] ['name'],
                            'orderQty'           => 1,
                            'price'              => $food ['Food'] ['price'],
                            'lineItemTotal'      => $food ['Food'] ['price'] * 1
                        );
                    } else {
                        $data ['food'] [] = array (
                            'id'            => $food ['Food'] ['id'],
                            'name'          => $food ['Food'] ['name'],
                            'orderQty'      => 1,
                            'price'         => $food ['Food'] ['price'],
                            'lineItemTotal' => $food ['Food'] ['price'] * 1
                        );
                    }
                }



                $data ['total'] = $this->_getTotal($data);
            } else {

                $data = $this->_entryFoodToData($food);
            }

            $this->Session->write('cart', $data);
        } else {

            if ($data ['restaurant'] ['id'] != $this->request->data ['restaurant_id']) {
                $data = array ();
            }
        }

        $return_data ['type'] = 'success';
        $return_data ['cart'] = $data;
        return $return_data;

    }

    private function _getTotal($data)
    {

        $subtotal = 0;
        foreach ($data ['food'] as $row) {
            $subtotal += $row ['price'] * $row ['orderQty'];
        }
        return $subtotal;

    }

    private function _entryFoodToData($food)
    {

        if (array_key_exists('food_id', $food ['Food'])) {
            $data = array (
                'restaurant' => array (
                    'id'   => $food ['Restaurant'] ['id'],
                    'name' => $food ['Restaurant'] ['name']
                ),
                'food'       => array (
                    array (
                        'id'                 => $food ['Food'] ['food_id'],
                        'additional_food_id' => $food ['Food'] ['id'],
                        'name'               => $food ['Food'] ['name'],
                        'orderQty'           => 1,
                        'price'              => $food ['Food'] ['price'],
                        'lineItemTotal'      => $food ['Food'] ['price'] * 1
                    )
                ),
                'total'      => $food ['Food'] ['price']
            );
        } else {
            $data = array (
                'restaurant' => array (
                    'id'   => $food ['Restaurant'] ['id'],
                    'name' => $food ['Restaurant'] ['name']
                ),
                'food'       => array (
                    array (
                        'id'            => $food ['Food'] ['id'],
                        'name'          => $food ['Food'] ['name'],
                        'orderQty'      => 1,
                        'price'         => $food ['Food'] ['price'],
                        'lineItemTotal' => $food ['Food'] ['price'] * 1
                    )
                ),
                'total'      => $food ['Food'] ['price']
            );
        }

        return $data;

    }

    private function _startOrder($restaurant_id, $delivery, $orderNo, $orderAddress, $itemNPrice, $deliveryCharge, $totalPayable, $comment)
    {
//
        $uri = 'https://184.183.154.249/pos_web_service/api/start_order';

        // Set up and execute the curl process
        $curl_handle     = curl_init();
        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);
        $verbose         = fopen('php://temp', 'rw+');
        curl_setopt($curl_handle, CURLOPT_STDERR, $verbose);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_SSLVERSION, 3);
        //curl_setopt($curl_handle, CURLOPT_CAINFO, getcwd() . "/cert/brotecs.crt");
        curl_setopt($curl_handle, CURLOPT_URL, $uri);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        // Data to print
//            $payment_stat = "";
//            $order_stat   = "";
//            if($payment_mode == "Card")
//            {
//                $payment_stat .= "Card   used: '$card_no'";
//                $order_stat .= "Order  IS  PAID";
//            } else
//            {
//                $order_stat .= "Order  NOT  PAID";
//            }
        $dataToBePrinted = 'Delivery:<br/>' . $delivery . '<br/><hr/>Order no .' . $orderNo . '<br/>' . $orderAddress . '<hr/>' . $itemNPrice . '<hr/><row><Ltd>Delivery:</Ltd><Rtd>' . $deliveryCharge . '</Rtd></row><row><Ltd>Total:</Ltd><Rtd>' . $totalPayable . '</Rtd></row><hr/>Comments: ' . $comment . '<hr/>';


        //$_POST data key with value json string
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array (
            'api_key'       => '50ab307d440a23b301e32df3e7c30231',
            'restaurant_id' => $restaurant_id,
            'order_no'      => $orderNo,
            'order_layout'  => $dataToBePrinted
        ));


        // Apply Digest access authentication
        $username = 'admin';
        $password = 'pos@print!order';

        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);

        if (!($buffer = curl_exec($curl_handle))) {
            echo 'Curl error: ' . curl_error($curl_handle);
        } else {
            //echo 'Operation completed without any errors';
            //Get final CDR json data
            return ($buffer);
            unset($result);
        }
        // Close handle
        curl_close($curl_handle);

        /**
         * ==========================================================================================================
         *  Dummy API service function call
         * ---------------------------------
         * ==========================================================================================================
         */
//            return $this->dummyAPIService($orderNo, $dataToBePrinted);
        // debug($dataToBePrinted);die();

    }

    private function dummyAPIService($orderNo, $dataToBePrinted)
    {

        // $APIPath = 'http://192.185.116.207/~winnexfa/myshop_api/service.php?ordrNo='.urlencode($orderNo).'&str='.urlencode($dataToBePrinted);
        $APIPath = 'http://114.130.54.103/chefgenie_print_server/service.php?ordrNo=' . urlencode($orderNo) . '&str=' . urlencode($dataToBePrinted);
        $ch      = curl_init();

        // Set query data here with the URL
        curl_setopt($ch, CURLOPT_URL, $APIPath);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        return $content;

    }

    /**
     * ==========================================================================================================
     *  Update response status of order
     * ==========================================================================================================
     */
    public function response($orderId, $status)
    {
        $this->Order->id = $orderId;
        $this->Order->saveField('status', $status);

    }

    /**
     * ==========================================================================================================
     *  Payment Process
     * ==========================================================================================================
     */
    public function process_payment($data)
    {

        /*
         * var_dump($data); echo "--------------------------------";
         */
        $post_url = "https://test.authorize.net/gateway/transact.dll";

        $post_values = array (
            // the API Login ID and Transaction Key must be replaced with valid values
            "x_login"          => "2397gMn2Jx3D",
            "x_tran_key"       => "3vZW4377b52kzFs5",
            "x_version"        => "3.1",
            "x_delim_data"     => "TRUE",
            "x_delim_char"     => "|",
            "x_relay_response" => "FALSE",
            "x_type"           => "AUTH_CAPTURE",
            "x_method"         => "CC",
            "x_card_num"       => $data ['transaction_card_number'],
            "x_card_code"      => $data ['transaction_cvv'],
            "x_exp_date"       => $data ['expMonth'] . $data ['expYear'],
            "x_amount"         => $data ['Order'] ['total_price'],
            "x_description"    => $data ['card_type'],
            "x_first_name"     => $data ['card_firs_name'],
            "x_last_name"      => $data ['card_firs_name'],
            "x_address"        => $data ['Order'] ['postcode_line1'],
            "x_postcode_line2" => $data ['Order'] ['postcode_line2'],
            "x_postcode_line3" => $data ['Order'] ['postcode_line3'],
            "x_state"          => $data ['Order'] ['postcode_county'],
            "x_country"        => $data ['Order'] ['postcode_country'],
            "x_zip"            => $data ['Order'] ['delivery_other_direction']
        );
        /*
         * var_dump($post_values); echo "--------------------------------";
         */

        // This section takes the input fields and converts them to the proper format
        // for an http post. For example: "x_login=username&x_tran_key=a1B2c3D4"
        $post_string = "";
        foreach ($post_values as $key => $value) {
            $post_string .= "$key=" . urlencode($value) . "&";
        }
        $post_string = rtrim($post_string, "& ");

        $request        = curl_init($post_url); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
        $post_response  = curl_exec($request); // execute curl post and store results in $post_response
        // additional options may be required depending upon your server configuration
        // you can find documentation on curl options at http://www.php.net/curl_setopt
        curl_close($request); // close curl object
        // This line takes the response and breaks it into an array using the specified delimiting character
        $response_array = explode($post_values ["x_delim_char"], $post_response);

        echo "<pre>";
        // print_r($response_array);
        echo "</pre>";

        $data ['Order'] ['transaction_card_name']   = $data ['card_firs_name'] . $data ['card_last_name'];
        $data ['Order'] ['transaction_card_number'] = $data ['transaction_card_number'];
        $data ['Order'] ['transaction_type']        = $data ['transaction_type'];
        $data ['Order'] ['card_type']               = $data ['card_type'];
        $data ['Order'] ['transaction_cvv']         = $data ['transaction_cvv'];
        // $data['Order']['transaction_exp_date'] = $data['transaction_exp_date'];
        $data ['Order'] ['transaction_exp_date']    = $data ['expMonth'] . "-20" . $data ['expYear'];

        $data ['Order'] ['total_price'] = $response_array [9];
        $data ['Order'] ['card_type']   = $response_array [8];

        $data ['Order'] ['card_firs_name'] = $response_array [13];
        $data ['Order'] ['card_firs_name'] = $response_array [14];
        $data ['Order'] ['postcode_line1'] = $response_array [16];
        $data ['Order'] ['postcode_line2'] = $response_array [68];
        $data ['Order'] ['postcode_line3'] = $response_array [69];

        $data ['Order'] ['postcode_county']               = $response_array [18];
        $data ['Order'] ['postcode_country']              = $response_array [20];
        $data ['Order'] ['delivery_other_direction']      = $response_array [19];
        $data ['Order'] ['transaction_payment_gatewayid'] = $response_array [4];
        $data ['payment_code']                            = $response_array [0];
        $data ['payment_code_message']                    = $response_array [3];

        return $data;

    }

    /**
     * =========================================================================================================
     *  This function is Only for Postcode Api (Searching Address)
     * =========================================================================================================
     */
    public function SPLGetFullAddressStep1($postalCode = null)
    {
        $this->layout = 'ajax';

        /**
         * =========================================================================================================
         * You need to open an account which will send you a data key, goto:
         * http://www.simplylookupadmin.co.uk/A2CustomerAccount/WebAccountCreateFromReseller.aspx?r=&id=4
         * =========================================================================================================
         */
        $datakey = "W_F47A937588EC4F60A184639B1B3C60";

        /**
         * =========================================================================================================
         *  see http://www.simply-postcode-lookup.com/full_address_inline_ajax_section_list.htm
         * for explanation for code
         * =========================================================================================================
         */
        $simplyserver = "http://www.simplylookupadmin.co.uk/xmlservice";
        $usernameID   = "";
        $postcode     = "";
        $XMLData      = "";
        $data         = "";

        /**
         * =========================================================================================================
         *
         * =========================================================================================================
         */
        // #############################################################################
        // When using an INTERNAL License (used in company by your employees), each user MUST be identified, so use cookie
        // Not doing this is in breach of our End User License agreement
        // If turned off then redirect to page explaining the restriction
        // For External use the following code does nothing, the following section can be removed
        // ######################## Identify User START #################################
        if (substr($datakey, 0, 2) == "I_") {
            // Internal KEY requires a User ID, so need a cookie, if turned off then terminate search

            $usernameID = "Not Set";
            @$usernameID = $_COOKIE ['usernameID'];
            if ($usernameID == "") {
                @$IsSetCookieFlag = $_GET ['set'];
                if ($IsSetCookieFlag != 'yes') {
                    // Set cookie
                    // This will be unique enough, for 30 users! since any more will use System License
                    $usernameID = date("ymd_gis", time());
                    setcookie("usernameID", $usernameID, time() + (60 * 60 * 24 * 7));

                    // Reload page
                    $postcode = $postalCode;
                    header("Location: SPLGetFullAddressStep1.php?set=yes&postcode=" . $postcode);
                } else {
                    // Check if cookie exists
                    if (!empty($_COOKIE ['usernameID'])) {
                        $usernameID = $_COOKIE ['usernameID'];
                    } else {
                        $CannotIdentifyUser = "True";
                    }
                }
            }
        } else {
            // Web use KEY does not require a User ID
            $usernameID = "";
        }
        // ######################### Identify User END #############################
        // ###############################################
        // So Get Data from SPL Web server:

        header('Expires: Wed, 23 Dec 1980 00:30:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('Content-Type: text/xml');

        $postcode = $postalCode;
        $postcode = str_replace(" ", "", $postcode);

        $XMLService = $simplyserver . "/InlineComboSearch3.aspx?datakey=" . $datakey . "&postcode=" . $postcode . "&username=" . $usernameID . "&user=" . urlencode($_SERVER ['HTTP_USER_AGENT']) . "&ip=" . $_SERVER ['REMOTE_ADDR'];

        // Set Message when on Mobile
        $XMLService = $XMLService . "&textmob=Please%20Select%20Address";

        // Set to 1 to show License status
        $XMLService = $XMLService . "&showlic=0";

        // Set Number of lines in list
        // Set to 0 to display Combo box
        $XMLService = $XMLService . "&lines=8";

        // Future use
        $XMLService = $XMLService . "&style=1";

        // Message at bottom of combo
        // Set to nothing to remove
        $XMLService = $XMLService . "&text=Please%20Select%20Address";

        // get XML
        $DataToSend = file_get_contents($XMLService);

        // var_dump($XMLService,$DataToSend);

        $this->set('DataToSend', $DataToSend);

    }

    /* This function is Only for Postcode Api (Searching Address) */

    public function SPLGetFullAddressStep2($FullAddressIs = null)
    {
        $this->layout = 'ajax';

        // #################################################################
        // You need to open an account which will send you a data key, goto:
        // http://www.simplylookupadmin.co.uk/A2CustomerAccount/WebAccountCreateFromReseller.aspx?r=&id=4

        $datakey = "W_F47A937588EC4F60A184639B1B3C60";

        // #################################################################
        // see http://www.simply-postcode-lookup.com/full_address_inline_ajax_section_list.htm
        // for explanation for code
        // #################################################################

        $simplyserver = "http://www.simplylookupadmin.co.uk/xmlservice";
        $usernameID   = "";
        $postcode     = "";
        $XMLData      = "";
        $data         = "";

        // #############################################################################
        // When using an INTERNAL License (used in company by your employees), each user MUST be identified, so use cookie
        // Not doing this is in breach of our End User License agreement
        // If turned off then redirect to page explaining the restriction
        // For External use the following code does nothing, the following section can be removed
        // ######################## Identify User START #################################
        if (substr($datakey, 0, 2) == "I_") {
            // Internal KEY requires a User ID, so need a cookie, if turned off then terminate search

            $usernameID = "Not Set";
            @$usernameID = $_COOKIE ['usernameID'];
            if ($usernameID == "") {
                @$IsSetCookieFlag = $_GET ['set'];
                if ($IsSetCookieFlag != 'yes') {
                    // Set cookie
                    // This will be unique enough, for 30 users! since any more will use System License
                    $usernameID = date("ymd_gis", time());
                    setcookie("usernameID", $usernameID, time() + (60 * 60 * 24 * 7));

                    // Reload page
                    header("Location: SPLGetFullAddressStep2.php?set=yes");
                } else {
                    // Check if cookie exists
                    if (!empty($_COOKIE ['usernameID'])) {
                        $usernameID = $_COOKIE ['usernameID'];
                    } else {
                        $CannotIdentifyUser = "True";
                    }
                }
            }
        } else {
            // Web use KEY does not require a User ID
            $usernameID = "";
        }
        // ######################### Identify User END #############################
        // ###############################################
        // So Get Data from SPL Web server:

        header('Expires: Wed, 23 Dec 1980 00:30:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('Content-Type: text/xml');

        $AddressID  = $FullAddressIs;
        $XMLService = $simplyserver . "/GetAddressRecord.aspx?datakey=" . $datakey . "&id=" . $AddressID . "&username=" . $usernameID . "&AppID=36";

        // get XML
        @$XMLtoSend = file_get_contents($XMLService);

        if (strpos($XMLtoSend, "<line1>")) {
            // return XML
            // echo $XMLtoSend;
            $this->set('XMLtoSend', $XMLtoSend);
        } else {
            // Noting to return, so return XML to stop error on client
            // echo "<data></data>";
            $this->set('XMLtoSend', "<data></data>");
        }

    }

    public function checkOrderStatus()
    {
        $order_id = $this->request->data ['order_id'];
        if (empty($order_id)) {
            return new CakeResponse(array (
                'type' => 'application/json',
                'body' => json_encode(0)
            ));
        }

        $order_data = $this->Order->read(null, $order_id);
        $data       = 1;
        if ($order_data) {
            $r              = array ();
            $r ['order_id'] = $order_data ['Order'] ['id'];
            $r ['status']   = $order_data ['Order'] ['status'];

            if ($r ['status'] != ORDER_STATUS_PROCESSING) {
                $this->Session->delete('guestOrder');
            }
            $data = $r;
        }
        return new CakeResponse(array (
            'type' => 'application/json',
            'body' => json_encode($data)
        ));

    }

    /**
     * ==========================================================================================================
     *  Get Online Restaurant List
     * ==========================================================================================================
     */
    public function _onlineRestaurant()
    {
        // POST url
        $uri         = 'https://184.183.154.249/pos_web_service/api/get_online_restaurant_list';
        // $uri = 'http://localhost/pos_web_service/api/get_online_restaurant_list';
        $curl_handle = curl_init();
        // or the file specified using CURLOPT_STDERR.
        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);

        $verbose = fopen('php://temp', 'rw+');
        curl_setopt($curl_handle, CURLOPT_STDERR, $verbose);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_SSLVERSION, 3);
        //curl_setopt($curl_handle, CURLOPT_CAINFO, getcwd() . "/cert/brotecs.crt");
        curl_setopt($curl_handle, CURLOPT_URL, $uri);
        curl_setopt($curl_handle, CURLOPT_POST, 1);

        //$_POST data key with value
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array (
            'api_key' => '50ab307d440a23b301e32df3e7c30231'
        ));


        // Apply Digest access authentication
        $username = 'admin';
        $password = 'pos@print!order';

        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);

        if (!($buffer = curl_exec($curl_handle))) {
            echo 'Curl error: ' . curl_error($curl_handle);
        } else {
            //echo 'Operation completed without any errors';
            //Get final CDR json data
            return ($buffer);
//                echo($buffer);
            unset($result);
//                die();
        }
        // Close handle
        curl_close($curl_handle);

    }

    /**
     * ==========================================================================================================
     *  Get Order Status
     * ==========================================================================================================
     */
    public function _getOrderStatus($transaction_id)
    {
        // POST url
        $uri         = 'https://184.183.154.249/pos_web_service/api/get_order_status';
        // $uri = 'http://localhost/pos_web_service/api/get_order_status';
        // Set up and execute the curl process
        $curl_handle = curl_init();

        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);

        $verbose = fopen('php://temp', 'rw+');
        curl_setopt($curl_handle, CURLOPT_STDERR, $verbose);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_SSLVERSION, 3);
        //curl_setopt($curl_handle, CURLOPT_CAINFO, getcwd() . "/cert/brotecs.crt");
        curl_setopt($curl_handle, CURLOPT_URL, $uri);
        curl_setopt($curl_handle, CURLOPT_POST, 1);

        //$_POST data key with value json string
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array (
            'api_key'        => '50ab307d440a23b301e32df3e7c30231',
            'transaction_id' => $transaction_id,
        ));

        // Apply Digest access authentication
        $username = 'admin';
        $password = 'pos@print!order';

        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);

        if (!($buffer = curl_exec($curl_handle))) {
            echo 'Curl error: ' . curl_error($curl_handle);
        } else {
            //echo 'Operation completed without any errors';
            //Get final CDR json data
            return ($buffer);
            unset($result);
        }
        // Close handle
        curl_close($curl_handle);

    }

    /**
     * ==========================================================================================================
     *  End order with confirmation
     * ==========================================================================================================
     */
    public function _endOrder($deliveryTime, $customerInfo, $orderStatus, $prev_delivery, $order_time, $customer_phone, $card_no, $payment_mode, $transaction_id, $final_response)
    {
        // POST url
        $uri         = 'https://184.183.154.249/pos_web_service/api/end_order';
        //$uri = 'http://localhost/pos_web_service/api/end_order';
        // Set up and execute the curl process
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_VERBOSE, true);

        $verbose = fopen('php://temp', 'rw+');
        curl_setopt($curl_handle, CURLOPT_STDERR, $verbose);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl_handle, CURLOPT_SSLVERSION, 3);
        //curl_setopt($curl_handle, CURLOPT_CAINFO, getcwd() . "/cert/brotecs.crt");
        curl_setopt($curl_handle, CURLOPT_URL, $uri);
        curl_setopt($curl_handle, CURLOPT_POST, 1);

        //$_POST data key with value json string
        $payment_stat = "";
        $order_stat   = "";
        if ($payment_mode == "Card") {
            $payment_stat .= "Card   used: '$card_no'";
            $order_stat .= "Order  IS  PAID";
        } else {
            $order_stat .= "Order  NOT  PAID";
        }
        $data_to_print = '<b>DELIVERY: ' . $deliveryTime . '</b><hr/>Customer info:<br/>' . $customerInfo . '<br/><b>' . $orderStatus . '</b><br/>Signature:<br/><br/><hr/><br/><br/><hr/>' . $payment_stat . '<hr/>Requested For:<br/>ASAP 04-04-2014<hr/>Prev. order from customer: ' . $prev_delivery . '<hr/>Chefgenie phone no: 01928 555111<hr/>Your WWW is<br/>www.chefgenie.co.uk<hr/><br/><br/><br/><br/>Accepted to<br/>' . $order_time . '<br/>Cust. phone:<br/>' . $customer_phone;
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array (
            'api_key'             => '50ab307d440a23b301e32df3e7c30231',
            'transaction_id'      => $transaction_id,
            'order_status_client' => $final_response,
            'accept_layout'       => $data_to_print,
        ));

        // Apply Digest access authentication
        $username = 'admin';
        $password = 'pos@print!order';

        curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);

        if (!($buffer = curl_exec($curl_handle))) {
            echo 'Curl error: ' . curl_error($curl_handle);
        } else {
            //echo 'Operation completed without any errors';
            //Get final CDR json data
            return ($buffer);
            unset($result);
        }
        // Close handle
        curl_close($curl_handle);

    }

}
