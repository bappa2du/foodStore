<?php
    App::uses('AppController', 'Controller');

    /**
     * Offers Controller
     *
     * @property Offer $Offer
     * @property PaginatorComponent $Paginator
     */
    class OffersController extends AppController
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
            $this->Offer->recursive = 0;
            $this->set('offers', $this->Paginator->paginate());
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
            if(!$this->Offer->exists($id))
            {
                throw new NotFoundException(__('Invalid offer'));
            }
            $options = array('conditions' => array('Offer.' . $this->Offer->primaryKey => $id));
            $this->set('offer', $this->Offer->find('first', $options));
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
                $this->Offer->create();
                if($this->Offer->save($this->request->data))
                {
                    $this->Session->setFlash(__('The offer has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The offer could not be saved. Please, try again.'));
                }
            }
            $restaurants = $this->Offer->Restaurant->find('list');
            $foods       = $this->Offer->Food->find('list');
            $this->set(compact('restaurants', 'foods'));
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
            if(!$this->Offer->exists($id))
            {
                throw new NotFoundException(__('Invalid offer'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Offer->save($this->request->data))
                {
                    $this->Session->setFlash(__('The offer has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The offer could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Offer.' . $this->Offer->primaryKey => $id));
                $this->request->data = $this->Offer->find('first', $options);
            }
            $restaurants = $this->Offer->Restaurant->find('list');
            $foods       = $this->Offer->Food->find('list');
            $this->set(compact('restaurants', 'foods'));
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
            $this->Offer->id = $id;
            if(!$this->Offer->exists())
            {
                throw new NotFoundException(__('Invalid offer'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Offer->delete())
                {
                    $this->Session->setFlash(__('The offer has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The offer could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
