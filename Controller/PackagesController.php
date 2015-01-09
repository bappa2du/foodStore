<?php
    App::uses('AppController', 'Controller');

    /**
     * Packages Controller
     *
     * @property Package $Package
     * @property PaginatorComponent $Paginator
     */
    class PackagesController extends AppController
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
            $this->Package->recursive = 0;
            $this->set('packages', $this->Paginator->paginate());
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
            if(!$this->Package->exists($id))
            {
                throw new NotFoundException(__('Invalid package'));
            }
            $options = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
            $this->set('package', $this->Package->find('first', $options));
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
                $this->Package->create();
                if($this->Package->save($this->request->data))
                {
                    $this->Session->setFlash(__('The package has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The package could not be saved. Please, try again.'));
                }
            }
            $restaurants = $this->Package->Restaurant->find('list');
            $cusines     = $this->Package->Cusine->find('list');
            $this->set(compact('restaurants', 'cusines'));
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
            if(!$this->Package->exists($id))
            {
                throw new NotFoundException(__('Invalid package'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Package->save($this->request->data))
                {
                    $this->Session->setFlash(__('The package has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The package could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Package.' . $this->Package->primaryKey => $id));
                $this->request->data = $this->Package->find('first', $options);
            }
            $restaurants = $this->Package->Restaurant->find('list');
            $cusines     = $this->Package->Cusine->find('list');
            $this->set(compact('restaurants', 'cusines'));
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
            $this->Package->id = $id;
            if(!$this->Package->exists())
            {
                throw new NotFoundException(__('Invalid package'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Package->delete())
                {
                    $this->Session->setFlash(__('The package has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The package could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
