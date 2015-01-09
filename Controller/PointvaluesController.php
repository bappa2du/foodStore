<?php
    App::uses('AppController', 'Controller');

    /**
     * Pointvalues Controller
     *
     * @property Pointvalue $Pointvalue
     * @property PaginatorComponent $Paginator
     */
    class PointvaluesController extends AppController
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
            $this->Pointvalue->recursive = 0;
            $this->set('pointvalues', $this->Paginator->paginate());
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
            if(!$this->Pointvalue->exists($id))
            {
                throw new NotFoundException(__('Invalid pointvalue'));
            }
            $options = array('conditions' => array('Pointvalue.' . $this->Pointvalue->primaryKey => $id));
            $this->set('pointvalue', $this->Pointvalue->find('first', $options));
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
                $this->Pointvalue->create();
                if($this->Pointvalue->save($this->request->data))
                {
                    $this->Session->setFlash(__('The pointvalue has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The pointvalue could not be saved. Please, try again.'));
                }
            }
            $currencies  = $this->Pointvalue->Currency->find('list');
            $restaurants = $this->Pointvalue->Restaurant->find('list');
            $this->set(compact('currencies', 'restaurants'));
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
            if(!$this->Pointvalue->exists($id))
            {
                throw new NotFoundException(__('Invalid pointvalue'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Pointvalue->save($this->request->data))
                {
                    $this->Session->setFlash(__('The pointvalue has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The pointvalue could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Pointvalue.' . $this->Pointvalue->primaryKey => $id));
                $this->request->data = $this->Pointvalue->find('first', $options);
            }
            $currencies  = $this->Pointvalue->Currency->find('list');
            $restaurants = $this->Pointvalue->Restaurant->find('list');
            $this->set(compact('currencies', 'restaurants'));
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
            $this->Pointvalue->id = $id;
            if(!$this->Pointvalue->exists())
            {
                throw new NotFoundException(__('Invalid pointvalue'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Pointvalue->delete())
                {
                    $this->Session->setFlash(__('The pointvalue has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The pointvalue could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
