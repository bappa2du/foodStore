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
            // the page we will redirect to
            $url['action'] = 'index';

            // build a URL will all the search elements in it
            // the resulting URL will be
            // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
            foreach($this->data as $k => $v)
            {
                foreach($v as $kk => $vv)
                {
                    if(!empty($vv))
                    {
                        $url[ $k . '.' . $kk ] = $vv;
                    }
                }
            }

            // redirect the user to the url
            $this->redirect($url, null, true);

        }

        /**
         * index method
         *
         * @return void
         */
        public function index()
        {


            // the elements from the url we set above are read
            // automagically by cake into $this->passedArgs[]
            // eg:
            // $passedArgs['Search.keywords'] = mykeyword
            // $passedArgs['Search.tag_id'] = 3
            // required if you are using Containable
            // requires Post to have the Containable behaviour
            //$contain = array();
            // we want to set a title containing all of the
            // search criteria used (not required)
            //                    'OTHERFUNCTION(OModel.other_attribute) AS other'
            $title                              = array();
            $this->Paginator->settings['limit'] = 10;

            //
            // filter by name
            //

            if(isset($this->passedArgs['Search.name']))
            {
                $this->Paginator->settings['conditions'][]['Restaurant.name LIKE'] = '%' . $this->passedArgs['Search.name'] . '%';
                $this->request->data['Search']['name']                             = $this->passedArgs['Search.name'];
                $title[]                                                           = __('Name', true) . ': ' . $this->passedArgs['Search.name'];
            }

            //
            // filter by postcode
            //
            if(isset($this->passedArgs['Search.postcode']))
            {
//            $this->Paginator->settings['conditions'][]['Restaurant.postal LIKE'] = '%' . $this->passedArgs['Search.postcode'] . '%';
                // Find restaurant postcode lat lon
                $this->loadModel('Postcode');
                $postcode = $this->Postcode->find('first', array(
                    'conditions' => array(
                        'postcode' => $this->passedArgs['Search.postcode']
                    )
                ));

                if(!empty($postcode))
                {
                    $this->Restaurant->virtualFields    = array(
                        'approx_distance' => 'latlongDistance (Restaurant.lattitude, Restaurant.longitude, ' . $postcode['Postcode']['lattitude'] . ',' . $postcode['Postcode']['longitude'] . ')',
                    );
                    $this->Paginator->settings['order'] = array('Restaurant.approx_distance' => 'asc');

                    $this->request->data['Search']['postcode'] = $this->passedArgs['Search.postcode'];
                    $title[]                                   = __('Postcode', true) . ': ' . $this->passedArgs['Search.postcode'];
                } else
                {
                    $this->Session->setFlash(__('Invalid postcode.'));
                }
            }

            // filter by cusine
            //

            if(isset($this->passedArgs['Search.cuisines'][0]) && $this->passedArgs['Search.cuisines'][0] != NULL)
            {
                $this->loadModel('Restaurant');

                $restaurants                = $this->Restaurant->query("SELECT restaurant_id FROM cusines_restaurants WHERE cusine_id='" . $this->passedArgs['Search.cuisines'][0] . "'");
                $list_of_search_restaurants = array();
                foreach($restaurants as $restaurant)
                {
                    $list_of_search_restaurants[] = $restaurant['cusines_restaurants']['restaurant_id'];
                }
                $this->Paginator->settings['conditions'][]['Restaurant.id'] = $list_of_search_restaurants;
            }

            $restaurants = $this->Paginator->paginate('Restaurant');


            // get posts
            //$this->Post->contain($contain); // required if you are using Containable
            //$this->paginate['reset']=false; // required if you are using Containable
            //$this->Paginator->settings['limit'] = 10;
            // $restaurants                        = $this->Paginator->paginate('Restaurant');
            // set the category path of each post (not required, just an example)
            // requires Category to have the Tree behaviour
            //
            // you can use this to add anything you want to the $posts array
            $this->loadModel('Cusines');
            $cuisines = $this->Cusines->find('list', array(
                'order' => 'name ASC'
            ));

            $this->set(compact('restaurants', 'cuisines'));

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

            $this->loadModel('Food');
            $this->Food->recursive = 0;
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
            $this->set(compact('restaurant', 'menus'));

        }

    }

    /*
    [NEW]
    DROP FUNCTION `latlongDistance`;
    DELIMITER $$
    CREATE FUNCTION `latlongDistance`(lat1  float, lon1  float, lat2 float, lon2 float) RETURNS float
    BEGIN
    DECLARE output float;
    SET output = sin(deg2rad(lat1)) * sin(deg2rad(lat2)) +  cos(deg2rad(lat1)) * cos(deg2rad(lat2)) * cos(deg2rad(lon1 - lon2));
    SET output = acos(output);
    SET output = rad2deg(output) * 60 * 1.1515*1.609344;
    RETURN output;
    END

    DELIMITER $$
    CREATE FUNCTION `deg2rad`(deg float) RETURNS float
    BEGIN
    DECLARE output float;
    SET output = deg*pi()/180;
    RETURN output;
    END

    DELIMITER $$
    CREATE FUNCTION `rad2deg`(deg float) RETURNS float
    BEGIN
    DECLARE output float;
    SET output = deg*180/pi();
    RETURN output;
    END
     *
     *
    CREATE TABLE IF NOT EXISTS `postcodes` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `postcode` varchar(256) NOT NULL,
      `lattitude` float(10,6) NOT NULL,
      `longitude` float(10,6) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
    LOAD DATA INFILE 'postcodes.csv' INTO TABLE myshop3.postcodes FIELDS TERMINATED BY ',' (postcode, lattitude, longitude);
    */
