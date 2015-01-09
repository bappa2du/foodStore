<?php

    App::uses('AppModel', 'Model');

    /**
     * Food Model
     *
     * @property Restaurant $Restaurant
     * @property Menu $Menu
     * @property Comment $Comment
     * @property Offer $Offer
     * @property OrderItem $OrderItem
     * @property Additional $Additional
     */
    class Food extends AppModel
    {

        /**
         *image upload
         *
         **/
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
         * Display field
         *
         * @var string
         */

        public $displayField = 'name';


        /**
         * Validation rules
         *
         * @var array
         */

        public $validate = array(

            /*'name' => array(

                'notEmpty' => array(

                    'rule' => array('notEmpty'),

                    //'message' => 'Your custom message here',

                    //'allowEmpty' => false,

                    //'required' => false,

                    //'last' => false, // Stop validation after this rule

                    //'on' => 'create', // Limit validation to 'create' or 'update' operations

                ),

            ),*/

        );


        //The Associations below have been created with all possible keys, those that are not needed can be removed


        /**
         * belongsTo associations
         *
         * @var array
         */

        public $belongsTo = array(

            'Restaurant' => array(
                'className'  => 'Restaurant',
                'foreignKey' => 'restaurant_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''

            ),

            'Menu'       => array(
                'className'  => 'Menu',
                'foreignKey' => 'menu_id',
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

            'Comment'   => array(

                'className'    => 'Comment',

                'foreignKey'   => 'food_id',

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

            'Offer'     => array(

                'className'    => 'Offer',

                'foreignKey'   => 'food_id',

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

            'OrderItem' => array(

                'className'    => 'OrderItem',

                'foreignKey'   => 'food_id',

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

            'Additional' => array(

                'className'             => 'Additional',

                'joinTable'             => 'additionals_foods',

                'foreignKey'            => 'food_id',

                'associationForeignKey' => 'additional_id',

                'unique'                => 'keepExisting',

                'conditions'            => '',

                'fields'                => '',

                'order'                 => '',

                'limit'                 => '',

                'offset'                => '',

                'finderQuery'           => '',

            )

        );
        
        public function getFoodItemsForMenu($menu_id){
        	$query = "select id,name from foods where menu_id = '$menu_id'";
        	return $this->query($query);
        }


    }

