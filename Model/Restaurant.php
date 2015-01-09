<?php
App::uses('AppModel', 'Model');

    /**
     * Restaurant Model
     *
     * @property Country $Country
     * @property City $City
     * @property Comment $Comment
     * @property Food $Food
     * @property Menu $Menu
     * @property Offer $Offer
     * @property Package $Package
     * @property Pointvalue $Pointvalue
     * @property Cusine $Cusine
     */
    class Restaurant extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'name';

        public $actsAs = array(
            'Upload.Upload' => array(
                'photo' => array(
                    'fields' => array(
                        'dir' => 'photo_dir'
                        )
                    )
                )
            );

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'name' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                    //'message' => 'Your custom message here',
                    //'allowEmpty' => false,
                    //'required' => false,
                    //'last' => false, // Stop validation after this rule
                    //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                ),
            );

        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Country' => array(
                'className'  => 'Country',
                'foreignKey' => 'country_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
                ),
            'City'    => array(
                'className'  => 'City',
                'foreignKey' => 'city_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
                )
            );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Comment'    => array(
                'className'    => 'Comment',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                ),
            'Food'       => array(
                'className'    => 'Food',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                ),
            'Menu'       => array(
                'className'    => 'Menu',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                ),
            'Offer'      => array(
                'className'    => 'Offer',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                ),
            'Package'    => array(
                'className'    => 'Package',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                ),
            'Pointvalue' => array(
                'className'    => 'Pointvalue',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                )
            ,
            'RestaurentOpeningHours' => array(
                'className'    => 'RestaurentOpeningHours',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                )
            ,
            'RestaurentDeliveryAreaFee' => array(
                'className'    => 'RestaurentDeliveryAreaFee',
                'foreignKey'   => 'restaurant_id',
                'dependent'    => false,
                'conditions'   => '',
                'fields'       => '',
                'order'        => '',
                'limit'        => '',
                'offset'       => '',
                'exclusive'    => '',
                'finderQuery'  => '',
                'counterQuery' => ''
                )
            );


        /**
         * hasAndBelongsToMany associations
         *
         * @var array
         */
        public $hasAndBelongsToMany = array(
            'Cusine' => array(
                'className'             => 'Cusine',
                'joinTable'             => 'cusines_restaurants',
                'foreignKey'            => 'restaurant_id',
                'associationForeignKey' => 'cusine_id',
                'unique'                => 'keepExisting',
                'conditions'            => '',
                'fields'                => '',
                'order'                 => '',
                'limit'                 => '',
                'offset'                => '',
                'finderQuery'           => '',
                )
            );

        
        public function getRestaurantListByPostCode($postcode){
            return $this->find('all', array('conditions'=>array('postal'=>$postcode),'recursive'=>-1));
        }

        public function getRestaurantListByCity($city){
            return $this->find('all', array('conditions'=>array('city_id'=>$city),'recursive'=>-1));
        }

        public function getRestaurantListByQuery($postcode,$city)
        {
        	$and = array();
        	
	        $and[] = array('1'=>1);	

	        if(!empty($postcode))
	        {
	        	$and[] = array('postal'=>$postcode);
	        }
	        
	        if(!empty($city))
	        {
	        	$and[] = array('city_id'=>$city);
	        }
		
	        $conditions = array();
			if(count($and)>1)
			{
				$conditions = array('AND' => $and);
			}
			else
			{
				$conditions = $and;
			}
            
            return $this->find('all', array('conditions'=>$conditions,'recursive'=>-1));
        }
    }
