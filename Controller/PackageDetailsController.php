<?php
    App::uses('AppController', 'Controller');

    /**
     * PackageDetails Controller
     *
     * @property PackageDetail $PackageDetail
     * @property PaginatorComponent $Paginator
     */
    class PackageDetailsController extends AppController
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
            $this->PackageDetail->recursive = 0;
            $this->set('packageDetails', $this->Paginator->paginate());
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
            if(!$this->PackageDetail->exists($id))
            {
                throw new NotFoundException(__('Invalid package detail'));
            }
            $options = array('conditions' => array('PackageDetail.' . $this->PackageDetail->primaryKey => $id));
            $this->set('packageDetail', $this->PackageDetail->find('first', $options));
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
                $this->PackageDetail->create();
                if($this->PackageDetail->save($this->request->data))
                {
                    $this->Session->setFlash(__('The package detail has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The package detail could not be saved. Please, try again.'));
                }
            }
            $packages = $this->PackageDetail->Package->find('list');
            $this->set(compact('packages'));
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
            if(!$this->PackageDetail->exists($id))
            {
                throw new NotFoundException(__('Invalid package detail'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->PackageDetail->save($this->request->data))
                {
                    $this->Session->setFlash(__('The package detail has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The package detail could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('PackageDetail.' . $this->PackageDetail->primaryKey => $id));
                $this->request->data = $this->PackageDetail->find('first', $options);
            }
            $packages = $this->PackageDetail->Package->find('list');
            $this->set(compact('packages'));
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
            $this->PackageDetail->id = $id;
            if(!$this->PackageDetail->exists())
            {
                throw new NotFoundException(__('Invalid package detail'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->PackageDetail->delete())
                {
                    $this->Session->setFlash(__('The package detail has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The package detail could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
