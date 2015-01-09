<?php
    App::uses('AppController', 'Controller');

    /**
     * AdditionalOrderItems Controller
     *
     * @property AdditionalOrderItem $AdditionalOrderItem
     * @property PaginatorComponent $Paginator
     */
    class AdditionalOrderItemsController extends AppController
    {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator');

        /**
         * index method
         *
         * @return void
         */
        public function index()
        {
            $this->AdditionalOrderItem->recursive = 0;
            $this->set('additionalOrderItems', $this->Paginator->paginate());
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
            if(!$this->AdditionalOrderItem->exists($id))
            {
                throw new NotFoundException(__('Invalid additional order item'));
            }
            $options = array('conditions' => array('AdditionalOrderItem.' . $this->AdditionalOrderItem->primaryKey => $id));
            $this->set('additionalOrderItem', $this->AdditionalOrderItem->find('first', $options));
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
                $this->AdditionalOrderItem->create();
                if($this->AdditionalOrderItem->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional order item has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional order item could not be saved. Please, try again.'));
                }
            }
            $orderItems  = $this->AdditionalOrderItem->OrderItem->find('list');
            $additionals = $this->AdditionalOrderItem->Additional->find('list');
            $this->set(compact('orderItems', 'additionals'));
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
            if(!$this->AdditionalOrderItem->exists($id))
            {
                throw new NotFoundException(__('Invalid additional order item'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->AdditionalOrderItem->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional order item has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional order item could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('AdditionalOrderItem.' . $this->AdditionalOrderItem->primaryKey => $id));
                $this->request->data = $this->AdditionalOrderItem->find('first', $options);
            }
            $orderItems  = $this->AdditionalOrderItem->OrderItem->find('list');
            $additionals = $this->AdditionalOrderItem->Additional->find('list');
            $this->set(compact('orderItems', 'additionals'));
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
            $this->AdditionalOrderItem->id = $id;
            if(!$this->AdditionalOrderItem->exists())
            {
                throw new NotFoundException(__('Invalid additional order item'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->AdditionalOrderItem->delete())
                {
                    $this->Session->setFlash(__('The additional order item has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The additional order item could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
