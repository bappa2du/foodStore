<?php
    App::uses('AppController', 'Controller');

    /**
     * CusineRestaurants Controller
     *
     * @property CusineRestaurant $CusineRestaurant
     * @property PaginatorComponent $Paginator
     */
    class CusineRestaurantsController extends AppController
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
            $this->CusineRestaurant->recursive = 0;
            $this->set('cusineRestaurants', $this->Paginator->paginate());
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
            if(!$this->CusineRestaurant->exists($id))
            {
                throw new NotFoundException(__('Invalid cusine restaurant'));
            }
            $options = array('conditions' => array('CusineRestaurant.' . $this->CusineRestaurant->primaryKey => $id));
            $this->set('cusineRestaurant', $this->CusineRestaurant->find('first', $options));
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
                $this->CusineRestaurant->create();
                if($this->CusineRestaurant->save($this->request->data))
                {
                    $this->Session->setFlash(__('The cusine restaurant has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The cusine restaurant could not be saved. Please, try again.'));
                }
            }
            $cusines     = $this->CusineRestaurant->Cusine->find('list');
            $restaurants = $this->CusineRestaurant->Restaurant->find('list');
            $this->set(compact('cusines', 'restaurants'));
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
            if(!$this->CusineRestaurant->exists($id))
            {
                throw new NotFoundException(__('Invalid cusine restaurant'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->CusineRestaurant->save($this->request->data))
                {
                    $this->Session->setFlash(__('The cusine restaurant has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The cusine restaurant could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('CusineRestaurant.' . $this->CusineRestaurant->primaryKey => $id));
                $this->request->data = $this->CusineRestaurant->find('first', $options);
            }
            $cusines     = $this->CusineRestaurant->Cusine->find('list');
            $restaurants = $this->CusineRestaurant->Restaurant->find('list');
            $this->set(compact('cusines', 'restaurants'));
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
            $this->CusineRestaurant->id = $id;
            if(!$this->CusineRestaurant->exists())
            {
                throw new NotFoundException(__('Invalid cusine restaurant'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->CusineRestaurant->delete())
                {
                    $this->Session->setFlash(__('The cusine restaurant has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The cusine restaurant could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
