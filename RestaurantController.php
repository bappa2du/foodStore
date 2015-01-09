<?php

    App::uses('AppController', 'Controller');

    /**
     * Restaurants Controller
     *
     * @property Restaurant $Restaurant
     * @property PaginatorComponent $Paginator
     */
    class RestaurantsController extends AppController
    {

        public $name     = 'Restaurants';
        public $paginate = array(
            'limit' => 2,
            'order' => array(
                'Restaurant.name' => 'asc'
            )
        );

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator');

        /*
         * search page
         *
         */

        public function adminSearch()
        {
            $this->loadModel('Cusine');
            $restaurant_postal = 'M27 4A';
            $restaurant_name   = 'Taste Of India';

            $conditions = array('Restaurant.name' => $restaurant_name, 'Restaurant.postal' => $restaurant_postal);

            $options    = array('conditions' => $conditions);
            $restaurant = $this->Restaurant->find('all', $options);
            // $menu=$this->Restaurant->Menu->find('all',$options);
            echo('<pre>');
            var_dump($restaurant);
            echo('</pre>');
            die();

        }

        /**
         * index method
         *
         * @return void
         */
        public function adminIndex()
        {
            $this->Restaurant->recursive = 0;
            $this->set('restaurants', $this->Paginator->paginate());

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
            if(!$this->Restaurant->exists($id))
            {
                throw new NotFoundException(__('Invalid restaurant'));
            }
            $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
            $this->set('restaurant', $this->Restaurant->find('first', $options));

        }

        /**
         * add method
         *
         * @return void
         */
        public function add()
        {
            if($this->request->is('post'))
            {
                $this->Restaurant->create();
                if($this->Restaurant->save($this->request->data))
                {
                    $this->Session->setFlash(__('The restaurant has been saved.'));
                    return $this->redirect(array('action' => 'adminIndex'));
                } else
                {
                    $this->Session->setFlash(__('The restaurant could not be saved. Please, try again.'));
                }
            }
            $countries = $this->Restaurant->Country->find('list');
            $cities    = $this->Restaurant->City->find('list');
            $cusines   = $this->Restaurant->Cusine->find('list');
            $this->set(compact('countries', 'cities', 'cusines'));

        }

        /**
         * edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function edit($id = null)
        {
            if(!$this->Restaurant->exists($id))
            {
                throw new NotFoundException(__('Invalid restaurant'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Restaurant->save($this->request->data))
                {
                    $this->Session->setFlash(__('The restaurant has been saved.'));
                    return $this->redirect(array('action' => 'adminIndex'));
                } else
                {
                    $this->Session->setFlash(__('The restaurant could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
                $this->request->data = $this->Restaurant->find('first', $options);
            }
            $countries = $this->Restaurant->Country->find('list');
            $cities    = $this->Restaurant->City->find('list');
            $cusines   = $this->Restaurant->Cusine->find('list');
            $this->set(compact('countries', 'cities', 'cusines'));

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
            $this->Restaurant->id = $id;
            if(!$this->Restaurant->exists())
            {
                throw new NotFoundException(__('Invalid restaurant'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Restaurant->delete())
                {
                    $this->Session->setFlash(__('The restaurant has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The restaurant could not be deleted. Please, try again.'));
                }
            }

            return $this->redirect(array('action' => 'adminIndex'));

        }

        /*
         * search page
         *
         */

        public function search()
        {
          // debug($_POST);
           // die();
//            the page we will redirect to
            $url['action'] = 'index';

//            build a URL will all the search elements in it
//            the resulting URL will be
//            example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
            if(isset($_POST['lattitude']))
            {

                $this->redirect(array("controller" => "restaurants",
                                      "action" => "index",
                                      "?"=>array("lattitude" => $_POST['lattitude'],
                                                 "longitude" => $_POST['longitude']),
                                                            ),null,true);
            }
           debug($this->data);
           die();
            foreach($this->data as $k => $v)
            {
                foreach($v as $kk => $vv)
                {
                    if(!empty($vv))
                    {
                        $url[ $k . '_' . $kk ] = $vv;
                    }
                }
            }
//            debug($url);
//            die();
            

//             redirect the user to the url
            $this->redirect($url, null, true);






        }

        /**
         * index method
         *
         * @return void
         */
        public function index()
        {
            $title                              = array();
            $this->Paginator->settings['limit'] = 10;

            $restaurants = $this->Paginator->paginate('Restaurant');

            /**
             * ==========================================================================================================
             *  Search Restaurant form current user position
             * ==========================================================================================================
             */
            
            if($this->request->query)
            {
//                debug($this->request->query);

                $current_position['Postcode']['lattitude'] = $this->request->query['lattitude'];
                $current_position['Postcode']['longitude'] = $this->request->query['longitude'];

                if(!empty($current_position))
                {
                    $restaurants = $this->getRestaurantDataByWithinRange($current_position,30);

//                    $restaurants = $this->Paginator->paginate($restaurants);
//                    debug($restaurants);
//                    die();

                } else
                {
                    $this->Session->setFlash("Invalid Postal Code");
                    $this->layout = 'error404_1';
                }
            }


//            $allPublishedAuthors = $this->Restaurant->find('list', array(
//                'fields' => array('longitude','lattitude','name'),
//                'recursive' => 0,
//                'order' => array('Restaurant.lattitude'),
//            ));
//            $this->loadModel('Restaurant');
//            $restaurants = $this->Restaurant->find('all');
//            foreach($restaurants as $restaurant):
//                echo ($restaurant['Restaurant']['name']);
//                echo ($restaurant['Restaurant']['longitude']);
//                echo ($restaurant['Restaurant']['longitude']);
//                echo "<br/>";
//                endforeach;
//            die();
//            debug($allPublishedAuthors);


//             the elements from the url we set above are read
//             automagically by cake into $this->passedArgs[]
//             eg:
//             $passedArgs['Search.keywords'] = mykeyword
//             $passedArgs['Search.tag_id'] = 3
//             required if you are using Containable
//             requires Post to have the Containable behaviour
//            $contain = array();
//             we want to set a title containing all of the
//             search criteria used (not required)
//                                'OTHERFUNCTION(OModel.other_attribute) AS other'
//
//            $restaurants = $this->Paginator->paginate('Restaurant');
            /**
             * ==========================================================================================================
             *  filter by name
             * ==========================================================================================================
             */


//            if(isset($this->passedArgs['Search.name']))
//            {
//                $this->Paginator->settings['conditions'][]['Restaurant.name LIKE'] = '%' . $this->passedArgs['Search.name'] . '%';
//                $this->request->data['Search']['name']                             = $this->passedArgs['Search.name'];
//                $title[]                                                           = __('Name', true) . ': ' . $this->passedArgs['Search.name'];
//
//                $restaurants = $this->Paginator->paginate('Restaurant');
//            }

            /**
             * ==========================================================================================================
             *  filter by postcode
             * ==========================================================================================================
             */
            if(isset($this->passedArgs['Search_postcode']))
            {

                

//            $this->Paginator->settings['conditions'][]['Restaurant.postal LIKE'] = '%' . $this->passedArgs['Search.postcode'] . '%';
//                 Find restaurant postcode lat lon
                $this->loadModel('Postcode');

                $postcode = $this->passedArgs['Search_postcode'];
                $postcode = str_replace(' ', '', $postcode);
                $p_length = strlen($postcode);
                if($p_length > 3)
                {
                    $split_1                             = substr($postcode, 0, -3);
                    $split_2                             = " " . substr($postcode, -3);
                    $postcode                            = $split_1 . "" . $split_2;
                    $this->passedArgs['Search_postcode'] = strtoupper($postcode);
                }
                

                $postcode = $this->Postcode->find('first', array(
                    'conditions' => array(
                        'postcode' => $this->passedArgs['Search_postcode']
                    )
                ));



                if(!empty($postcode))
                {
                    

                    $this->request->data['Search']['postcode'] = $this->passedArgs['Search_postcode'];
                    $title[]                                   = __('Postcode', true) . ': ' . $this->passedArgs['Search_postcode'];

                    $restaurants = $this->getRestaurantDataByWithinRange($postcode,30);

                } else
                {
                    $this->Session->setFlash("Invalid Postal Code");
                    $this->layout = 'error404_1';
                }
            }

            /**
             * ==========================================================================================================
             *  filter by cusine
             * ==========================================================================================================
             */
//            if(isset($this->passedArgs['Search.cuisines'][0]) && $this->passedArgs['Search.cuisines'][0] != NULL)
//            {
//                $this->loadModel('Restaurant');
//
//                $restaurants                = $this->Restaurant->query("SELECT restaurant_id FROM cusines_restaurants WHERE cusine_id='" . $this->passedArgs['Search.cuisines'][0] . "'");
//                $list_of_search_restaurants = array();
//                foreach($restaurants as $restaurant)
//                {
//                    $list_of_search_restaurants[] = $restaurant['cusines_restaurants']['restaurant_id'];
//                }
//                $this->Paginator->settings['conditions'][]['Restaurant.id'] = $list_of_search_restaurants;
//                $restaurants                                                = $this->Paginator->paginate('Restaurant');
//            }



//             get posts
//            $this->Post->contain($contain); // required if you are using Containable
//            $this->paginate['reset']=false; // required if you are using Containable
//            $this->Paginator->settings['limit'] = 10;
//             $restaurants                        = $this->Paginator->paginate('Restaurant');
//             set the category path of each post (not required, just an example)
//             requires Category to have the Tree behaviour
//
//             you can use this to add anything you want to the $posts array
            $this->loadModel('Cusines');
            $cuisines = $this->Cusines->find('list', array(
                'order' => 'name ASC'
            ));


            $this->set(compact('restaurants', 'cuisines'));
//            $this->set('restaurants', $this->Paginator->paginate());

        }

        /**
         * Overridden paginate method - group by week, away_team_id and home_team_id
         */
        public function getRestaurantDataByWithinRange($postcode,$distance)
        {

            $recursive = -1;
            $lat       = $postcode['Postcode']['lattitude'];
            $lng       = $postcode['Postcode']['longitude'];

            $query     = "SELECT Restaurant.id , 3956 *2 * ASIN( SQRT( POWER( SIN( ($lat - abs( Restaurant.lattitude ) ) * pi( ) /180 /2 ) , 2 ) + COS( $lat * pi( ) /180 ) * COS( abs( Restaurant.lattitude ) * pi( ) /180 ) * POWER( SIN( (
    	$lng - Restaurant.longitude
    	) * pi( ) /180 /2 ) , 2 ) ) ) AS approx_distance
    	FROM restaurants AS Restaurant
    	HAVING approx_distance <=$distance
    	ORDER BY approx_distance";
            $results   = $this->Restaurant->query($query);
            $r_array   = array();
            foreach($results as $r)
            {
                $dist                                        = $r['0']['approx_distance'];
                $res_id                                      = $r['Restaurant']['id'];
                $restaurant                                  = $this->Restaurant->read(null, $res_id);
                $restaurant['Restaurant']['approx_distance'] = $dist;
                $r_array[]                                   = $restaurant;
            }
//            debug($r_array);die();

            return $r_array;

        }

        public function details($id = null)
        {
            if(!$this->Restaurant->exists($id))
            {
                throw new NotFoundException(__('Invalid restaurant'));
            }
            $this->Restaurant->recursive = 2;
            $options                     = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
            $restaurant                  = $this->Restaurant->find('first', $options);
            $this->loadModel('Menu');
            $this->Menu->recursive = 0;
            $menus                 = $this->Menu->find('all', array(
                    'fields'     => array('Menu.id', 'Menu.name', 'Menu.photo', 'Menu.photo_dir'),
                    'conditions' => array('restaurant_id' => $id))
            );

//            debug($menus);
//            die();
            $this->loadModel('Food');
            $this->loadModel('FoodAccessories');
            $this->loadModel('FoodAccessoriesDetails');
            $this->Food->recursive = 0;
            $this->FoodAccessories->recursive = 0;
//            $this->FoodAccessoriesDetails->recursive = 0;
            if(!empty($menus))
            {
                foreach($menus as $key => $menu)
                {
                    $foods                 = $this->Food->find('all', array(
                            'fields'     => array('Food.id', 'Food.name', 'Food.description', 'Food.price', 'Food.photo', 'Food.photo_dir'),
                            'conditions' => array(
                                'Food.restaurant_id' => $id,
                                'Food.menu_id'       => $menu['Menu']['id'],
                            ))
                    );
                    $menus[ $key ]['Food'] = $foods;


                }
            }
//            debug($menus);
//            die();


            $food = $this->Food->find('all',['conditions'=>['Food.restaurant_id' => $id]]);
//            foreach($foods as $food)
//            {
//               debug($food['Food']);
//            }
//            die();
//
//
//            foreach($foods as $food)
//            {
//                $food_accessories = $this->FoodAccessories->find('all',array(
////                    'fields'     => array('FoodAccessories.id','FoodAccessories.name','FoodAccessories.price','FoodAccessories.food_id'),
////                    'conditions' => array('food_id' => $food['Food']['id'])
//                ));
//                $food_acc = $food_accessories;
//            }
//            $new_array = [];
//            foreach($food_acc as $foo)
//            {
////                debug($foo);
////                die();
//                $i=0;
//                if($foo['FoodAccessories']['food_id'] == $foo['Food']['id'])
//                {
//                    $new_array[$i]['FoodAccessories'] = $foo['FoodAccessories'];
//                }
//                $i++;
//            }
            /**
             * ==========================================================================================================
             *  Extra for Food accessories table
             * ==========================================================================================================
             */
//            $food = $this->Food->find('all');
            $food_accessories = $this->FoodAccessories->find('all');
            $food_accessories_details = $this->FoodAccessoriesDetails->find('all');

            $new = array();
            $i=1;
            foreach($food_accessories_details as $foo)
            {
                if($foo['FoodAccessoriesDetails']['food_accessories_id'] == $foo['FoodAccessories']['id'])
                {
                    $new['FoodAccessoriesDetails'][$foo['FoodAccessoriesDetails']['food_accessories_id']][$i] = $foo['FoodAccessoriesDetails'];
                }
                $i++;
            }
            $j=0;
            foreach($food_accessories as $fac)
            {
                foreach($new['FoodAccessoriesDetails'] as $n)
                {
                    foreach($n as $nn)
                    {
                        if($fac['FoodAccessories']['id'] == $nn['food_accessories_id'])
                        {
                            $fac['FoodAccessories']['FoodAccessoriesDetails'] = $new['FoodAccessoriesDetails'][$fac['FoodAccessories']['id']];
                        }
                    }
                }

                $final[$j] = $fac;
                $j++;

            }
            $k=0;$l=0;
            foreach($food as $combine_food)
            {
                foreach($final as $f)
                {
                    if($f['FoodAccessories']['food_id'] == $combine_food['Food']['id'])
                    {
                        $combine_food['Food']['FoodAccessories'][$f['FoodAccessories']['id']] = $f['FoodAccessories'];
                    }
                    $l++;
                }
                $ultimate[$k] = $combine_food['Food'];
                $k++;
            }
            // debug($menus);
            // die();
            $sm=0;$count=0;
            foreach($menus as $menu)
            {
                if($menu['Food']){
                    foreach($menu['Food'] as $food1)
                    {
                        foreach($final as $f){
                            if($f['FoodAccessories']['food_id'] == $food1['Food']['id'])
                            {
                                $food1['Food']['FoodAccessories'][$f['FoodAccessories']['id']] = $f['FoodAccessories'];
                            }
                        }
                        $summation[$sm]['Food'] = $food1['Food'];$sm++;
                    }
                    $menu['Food'] = $summation;
                }
                else
                {
                    $menu['Food'] = [];
                }
                $final_menu[$count] = $menu;
                $count++;

//                $menu['Menu'] = $menu['Menu'];
//                 debug($menu);
            }
//             debug($final_menu);
//             die();
            /**
             * ==========================================================================================================
             *  Extra for Food accessories table end
             * ==========================================================================================================
             */
//            debug($ultimate);die();

//            $ok = array_merge($food_accessories,$food_accessories_details);
//            $indexed = array_chunk($food_accessories_details,1);
//            debug($food_accessories_details['FoodAccessories']);
//            debug($food);

//            die();


//            $this->loadModel('FoodAccessories');
//            $this->FoodAccessories->recursive = 0;
//            $food_accessories   = $this->FoodAccessories->find('all');

//            $this->loadModel('Food');
//            $this->Food->recursive = 0;
//            $food_accessories   = $this->Food->find('all');


//        $options    = array (
//            'joins'      => array (
//                array ('table'      => 'cusines_restaurants',
////        'alias' => 'Channel',  // the alias is 'included' in the 'table' field
//                    'type'       => 'LEFT',
//                    'conditions' => array (
//                        'Restaurant.id = cusines_restaurants.restaurant_id',
//                    )
//                )
//            ),
//            'conditions' => array ('Restaurant.' . $this->Restaurant->primaryKey => $id)
//        );
//        $restaurant = $this->Restaurant->find('first', $options);
//        $this->loadModel('Menu');
//        if(!empty($restaurant['Cusine'])){
//            foreach($restaurant['Cusine'] as $key => $cusine){
//                $menu = $this->Menu->find('all', array(
//                    'conditions' => array (
//                        'Menu.cusine_id' => $cusine['id'],
//                        'Menu.restaurant_id' => $id,
//                        )
//                ));
//                $restaurant['Cusine'][$key]['Menu'] = $menu;
//            }
//        }
            $menus = $final_menu;
            $this->set(compact('restaurant', 'menus'));
//            $this->set(compact('restaurant', 'menus'));

        }

        public function findLatlngForPostCode()
        {
            $this->loadModel('Postcode');
            $postcode = $this->request->data['postcode'];
            $data     = $this->Postcode->findLatlngForPostCode($postcode);
            $output   = array();
            if($data)
            {
                $output['lat'] = $data['Postcode']['lattitude'];
                $output['lng'] = $data['Postcode']['longitude'];
            } else
            {
                $output = 0;
            }
            return new CakeResponse(array('type' => 'application/json', 'body' => json_encode($output)));
        }

    }


