<?php

    App::uses('AppController', 'Controller');

    class WebpagesController extends AppController
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
		
            $this->Webpage->recursive = 0;
            $this->set('webpages', $this->Paginator->paginate());
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
            if(!$this->Webpage->exists($id))
            {
                throw new NotFoundException(__('Invalid webpage'));
            }
            die('dd');
            $options = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
            $this->set('webpage', $this->Webpage->find('first', $options));
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
                $this->Webpage->create();
                if($this->Webpage->save($this->request->data))
                {
                    $this->Session->setFlash(__('The webpage has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The webpage could not be saved. Please, try again.'));
                }
            }
            $categories  = $this->Webpage->Category->find('list');
            $restaurants = $this->Webpage->Restaurant->find('list');
            $this->set(compact('categories', 'restaurants'));
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
            if(!$this->Webpage->exists($id))
            {
                throw new NotFoundException(__('Invalid webpage'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Webpage->save($this->request->data))
                {
                    $this->Session->setFlash(__('The webpage has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The webpage could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
                $this->request->data = $this->Webpage->find('first', $options);
            }
            $categories  = $this->Webpage->Category->find('list');
            $restaurants = $this->Webpage->Restaurant->find('list');
            $this->set(compact('categories', 'restaurants'));
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
            $this->Webpage->id = $id;
            if(!$this->Webpage->exists())
            {
                throw new NotFoundException(__('Invalid webpage'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Webpage->delete())
                {
                    $this->Session->setFlash(__('The webpage has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The webpage could not be deleted. Please, try again.'));
                }
            }
            return $this->redirect(array('action' => 'index'));

        }

        public function home()
        {
            
            /**
             * sample coding
             */
            /* $layout = empty($this->request->query['layout'])?'':$this->request->query['layout'];
             if(!empty($layout)){
                 $this->layout = $layout;
             }*/
            $this->theme = 'Chefgenie';
            $this->loadModel('restaurant');
            $restaurants = $this->restaurant->find('all', array(
                'order' => array('ratting' => 'desc'),
                'limit' => 6,
            ));

            /*
            $this->loadModel('food');
            $foods = $this->food->find('all', array(
                'order' => array('rattings' => 'desc'),
                'limit' => 6,
            ));
            $this->set(compact('restaurants', 'foods'));
            */
            
            $this->loadModel('cusine');
            $this->loadModel('Order');

        

            $query = "SELECT count(orders.id) as ordercount, orders.restaurant_id, restaurants.name from orders join restaurants on orders.restaurant_id = restaurants.id group by orders.restaurant_id order by ordercount desc ";
            $query = "SELECT 
                        count(orders.id) as ordercount, orders.restaurant_id, restaurants.name, cusines_restaurants.cusine_id,cusines.name,cusines.image,cusines.image_dir
                        from orders 
                        join restaurants 
                        on orders.restaurant_id = restaurants.id 
                        join cusines_restaurants
                        on orders.restaurant_id = cusines_restaurants.restaurant_id
                        join cusines
                        on cusines_restaurants.cusine_id = cusines.id
                        group by orders.restaurant_id 
                        order by ordercount desc";

            $order = $this->Order->query ( $query );
            $cusines = $this->cusine->find('all', array(
                'limit' => 6,
            ));
            
            $this->set(compact('restaurants', 'cusines','order'));

        }


        public function getmenu($menupos = 'footer')
        {
            $this->loadModel('Category');
            if($this->request->is('requested'))
            {
                return $this->Category->find('all', array(
                    'conditions' => array('Category.placement' => $menupos)
                ));
            }

        }

        public function quickmail()
        {
            $qumail = $this->request->data;
            $Email  = new CakeEmail();
            $Email->from(array($qumail['qemail'] => $qumail['qname']));
            $Email->to('admin@lict.com');
            $Email->subject('Query form Mail');
            $Email->send($qumail['qcomment']);

        }

    }
