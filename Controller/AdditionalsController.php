<?php
    App::uses('AppController', 'Controller');

    /**
     * Additionals Controller
     *
     * @property Additional $Additional
     * @property PaginatorComponent $Paginator
     */
    class AdditionalsController extends AppController
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
            $this->Additional->recursive = 0;
            $data = $this->Paginator->paginate();
            $final_data = array();
            
            $this->loadModel('Restaurant');
            $this->loadModel('Menu');
            $this->loadModel('Food');
            
            foreach ($data as $additional){
            	$new = $additional;
            	$restaurant = $this->Restaurant->find('first',array('field'=>array('name'),'conditions'=>array('id'=>$additional['Additional']['restaurant_id']),'recursive'=>-1));
            	$menu = $this->Menu->find('first',array('field'=>array('name'),'conditions'=>array('id'=>$additional['Additional']['menu_id']),'recursive'=>-1));
            	$food = $this->Food->find('first',array('field'=>array('name'),'conditions'=>array('id'=>$additional['Additional']['food_id']),'recursive'=>-1));
            	
            	$new['Additional']['res_name'] = "";
            	$new['Additional']['menu_name'] = "";
            	$new['Additional']['food_name'] = "";
            	
            	if($restaurant){
            		$new['Additional']['res_name'] = $restaurant['Restaurant']['name'];
            	}
            	if($menu){
            		$new['Additional']['menu_name'] = $menu['Menu']['name'];
            	}
            	if($food){
            		$new['Additional']['food_name'] = $food['Food']['name'];
            	}
            	
            	$final_data[] = $new;
            }
            $this->set('additionals', $final_data);
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
            if(!$this->Additional->exists($id))
            {
                throw new NotFoundException(__('Invalid additional'));
            }
            $options = array('conditions' => array('Additional.' . $this->Additional->primaryKey => $id));
            $additional_info = $this->Additional->find('first', $options);
            $this->set('additional', $additional_info);
            
            $this->loadModel('Restaurant');
            $this->loadModel('Menu');
            $this->loadModel('Food');
            $restaurant = $this->Restaurant->find('first',array('field'=>array('name','id'),'conditions'=>array('id'=>$additional_info['Additional']['restaurant_id']),'recursive'=>-1));
            $menu = $this->Menu->find('first',array('field'=>array('name','id'),'conditions'=>array('id'=>$additional_info['Additional']['menu_id']),'recursive'=>-1));
            $food = $this->Food->find('first',array('field'=>array('name','id'),'conditions'=>array('id'=>$additional_info['Additional']['food_id']),'recursive'=>-1));
            
            $this->set('restaurant',$restaurant);
            $this->set('menu',$menu);
            $this->set('food',$food);
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
                $this->Additional->create();
                if($this->Additional->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional could not be saved. Please, try again.'));
                }
            }
           // $foods = $this->Additional->Food->find('list');
            $this->loadModel('Restaurant');
            $restaurants = $this->Restaurant->find('list');
            $this->set(compact('restaurants'));
            
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
            if(!$this->Additional->exists($id))
            {
                throw new NotFoundException(__('Invalid additional'));
            }
            if($this->request->is(array('post', 'put')))
            {
                if($this->Additional->save($this->request->data))
                {
                    $this->Session->setFlash(__('The additional has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                {
                    $this->Session->setFlash(__('The additional could not be saved. Please, try again.'));
                }
            } else
            {
                $options             = array('conditions' => array('Additional.' . $this->Additional->primaryKey => $id));
                $this->request->data = $this->Additional->find('first', $options);
            }
//             $foods = $this->Additional->Food->find('list');
//             $this->set(compact('foods'));
            $this->loadModel('Restaurant');
            $restaurants = $this->Restaurant->find('list');
            $this->set(compact('restaurants'));
            
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
            $this->Additional->id = $id;
            if(!$this->Additional->exists())
            {
                throw new NotFoundException(__('Invalid additional'));
            }
            //$this->request->allowMethod('post', 'delete');

            if($this->request->isPost())
            {

                if($this->Additional->delete())
                {
                    $this->Session->setFlash(__('The additional has been deleted.'));
                } else
                {
                    $this->Session->setFlash(__('The additional could not be deleted. Please, try again.'));
                }

            }

            return $this->redirect(array('action' => 'index'));
        }
    }
