<?php

    App::uses('AppController', 'Controller');

    /**
     * Restaurants Controller
     *
     * @property Restaurant $Restaurant
     * @property PaginatorComponent $Paginator
     */
    class ApiController extends AppController
    {

        private $key      = '6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy';
        public  $paginate = array();

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator');

        public function index()
        {
            $this->layout = false;
            $this->render('index');

        }

        /**
         * List Restaurant
         * Available param
         * key [required]:
         * limit: default = 10;
         * page: default = 1;
         * date [optional]: 2014-02-08
         * restaurant_id [optional]: 5391c114-a9a4-4fc9-b6ab-3da66715296b
         * example:
         *
         * {
         * "key": "6Ao3uq3rA1jg5z8LaIIRqb44OP69y8Iy",
         * "limit": "10",
         * "page": "1",
         * "date": "2014-06-08",
         * "restaurant_id": "5391c114-a9a4-4fc9-b6ab-3da66715296b"
         * }
         *
         *
         * @return type
         * @throws NotFoundException
         */
        public function restaurants()
        {
            if(!$this->request->is(array('post')))
            {
                $this->autoRender = false;
                $this->response->type('json');
                $return_array['status']    = false;
                $return_array['message'][] = 'Unauthorized Access';
                $return_data               = json_encode($return_array);
                $this->response->body($return_data);
                return;
            }

            $key = empty($this->request->data['key']) ? 0 : $this->request->data['key'];

            if($key !== $this->key)
            {
                $this->autoRender = false;
                $this->response->type('json');
                $return_array['status']    = false;
                $return_array['message'][] = 'Unauthorized Access';
                $return_data               = json_encode($return_array);
                $this->response->body($return_data);
                return;
            }

            $return_array = array(
                'total' => 0,
                'data'  => 0
            );

            $this->loadModel('Restaurant');
            $this->Restaurant->unBindModel(
                array(
                    'hasMany'             => array(
                        'Comment',
                        'Food',
                        'Menu',
                        'Offer',
                        'Package',
                        'Pointvalue',
                    ),
                    'hasAndBelongsToMany' => array(
                        'Cusine'
                    )
                ), false
            );
            $baseurl                         = Router::url('/', true);
            $this->Restaurant->virtualFields = array(
                'logourl' => "CONCAT('" . $baseurl . "', Restaurant.photo_dir, '/', Restaurant.photo)"
            );

            // Filter Restaurants
            // Last 24 hrs restaurant list
            $conditions = array();
            if(isset($this->request->data['date']))
            {
                $req_date           = $this->request->data['date'];
                $fromdate           = date('Y-m-d h:i:s', strtotime($req_date . '-1 day'));
                $todate             = date('Y-m-d h:i:s', strtotime($req_date));
                $conditions[]['OR'] = array(
                    array(
                        'Restaurant.created >=' => $fromdate,
                        'Restaurant.created <=' => $todate,
                    ),
                    array(
                        'Restaurant.modified >=' => $fromdate,
                        'Restaurant.modified <=' => $todate,
                    )
                );
            }

            if(isset($this->request->data['restaurant_id']))
            {
                $conditions[]['Restaurant.id ='] = $this->request->data['restaurant_id'];
            }

            $return_array['total'] = $this->Restaurant->find('count', array('conditions' => $conditions));

            $this->Paginator->settings['page']  = 1;
            $this->Paginator->settings['limit'] = 10;
            $this->Paginator->settings['order'] = array(
                'Restaurant.name' => 'asc'
            );

            if(!empty($this->request->data['page']))
            {
                $this->Paginator->settings['page'] = $this->request->data['page'];
            }
            if(!empty($this->request->data['limit']))
            {
                $this->Paginator->settings['limit'] = $this->request->data['limit'];
            }

            // Filter Restaurants
            // Last 24 hrs restaurant list
            if(isset($this->request->data['date']))
            {
                $req_date = $this->request->data['date'];
                $fromdate = date('Y-m-d h:i:s', strtotime($req_date . '-1 day'));
                $todate   = date('Y-m-d h:i:s', strtotime($req_date));
            }
            $this->Paginator->settings['conditions'] = $conditions;

            $this->Paginator->settings['fields'] = array(
                'Restaurant.id',
                'Restaurant.name',
                'Restaurant.postal',
                'Restaurant.area',
                'Restaurant.address',
                'Restaurant.photo',
                'Restaurant.photo_dir',
                'Restaurant.logourl',
                'Restaurant.delivery_time',
                'Restaurant.email',
                'Restaurant.phone',
                'Restaurant.mobile',
                'Restaurant.website',
                'City.name',
                'Country.name',
                'Country.name',
            );

            $restaurants = $this->Paginator->paginate('Restaurant');
//$log = $this->Restaurant->getDataSource()->getLog(false, false);
//debug($log);
            $return_array['data'] = $this->formetRestaurant($restaurants);


            $this->autoRender = false;
            $this->response->type('json');
            $return_data = json_encode($return_array);
            $this->response->body($return_data);

        }

        private function formetRestaurant($restaurants = array())
        {
            if(!empty($restaurants))
            {
                foreach($restaurants as $key => $restaurant)
                {
                    $restaurants[ $key ]['Restaurant']['city_name']    = $restaurant['City']['name'];
                    $restaurants[ $key ]['Restaurant']['country_name'] = $restaurant['Country']['name'];
                    unset($restaurants[ $key ]['City']);
                    unset($restaurants[ $key ]['Country']);
                }
            }
            return $restaurants;

        }

    }
