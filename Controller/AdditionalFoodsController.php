<?php
    App::uses('AppController', 'Controller');

    /**
     * AdditionalFoods Controller
     *
     * @property AdditionalFood $AdditionalFood
     * @property PaginatorComponent $Paginator
     */
    class AdditionalFoodsController extends AppController
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
            $this->AdditionalFood->recursive = 0;
            $this->set('additionalFoods', $this->Paginator->paginate());
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
            if(!$this->AdditionalFood->exists($id))
            {
                throw new NotFoundException(__('Invalid additional food'));
            }
            $options = array('conditions' => array('AdditionalFood.' . $this->AdditionalFood->primaryKey => $id));
            $this->set('additionalFood', $this->AdditionalFood->find('first', $options));
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
                $this->AdditionalFood->create();
                if($this->AdditionalFood->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional food has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional food could not be saved. Please, try again.'));
                }
            }
            $foods       = $this->AdditionalFood->Food->find('list');
            $additionals = $this->AdditionalFood->Additional->find('list');
            $this->set(compact('foods', 'additionals'));
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
            if(!$this->AdditionalFood->exists($id))
            {
                throw new NotFoundException(__('Invalid additional food'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->AdditionalFood->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional food has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional food could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('AdditionalFood.' . $this->AdditionalFood->primaryKey => $id));
                $this->request->data = $this->AdditionalFood->find('first', $options);
            }
            $foods       = $this->AdditionalFood->Food->find('list');
            $additionals = $this->AdditionalFood->Additional->find('list');
            $this->set(compact('foods', 'additionals'));
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
            $this->AdditionalFood->id = $id;
            if(!$this->AdditionalFood->exists())
            {
                throw new NotFoundException(__('Invalid additional food'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->AdditionalFood->delete())
                {
                    $this->Session->setFlash(__('The additional food has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The additional food could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
