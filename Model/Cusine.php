<?php

    App::uses('AppModel', 'Model');

    /**
     * Cusine Model
     *
     * @property Menu $Menu
     * @property Package $Package
     * @property Restaurant $Restaurant
     */
    class Cusine extends AppModel
    {


        /**
         * Display field
         *
         * @var string
         */

        public $displayField = 'name';
        
        /**
         *image upload
         *
         **/
        public $actsAs = array(
        		'Upload.Upload' => array(
        				'image' => array(
        						'fields' => array(
        								'dir' => 'image_dir'
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

                    'rule'     => array('notEmpty'),

                    'message'  => 'Please enter a cuisine name',

                    //'allowEmpty' => false,

                    'required' => true,

                    //'last' => false, // Stop validation after this rule
                    'last'     => true

                    //'on' => 'create', // Limit validation to 'create' or 'update' operations

                ),

            ),

        );


        //The Associations below have been created with all possible keys, those that are not needed can be removed


        /**
         * hasMany associations
         *
         * @var array
         */

        public $hasMany = array(

            'Menu'    => array(

                'className'    => 'Menu',

                'foreignKey'   => 'cusine_id',

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

            'Package' => array(

                'className'    => 'Package',

                'foreignKey'   => 'cusine_id',

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

            'Restaurant' => array(

                'className'             => 'Restaurant',

                'joinTable'             => 'cusines_restaurants',

                'foreignKey'            => 'cusine_id',

                'associationForeignKey' => 'restaurant_id',

                'unique'                => 'keepExisting',

                'conditions'            => '',

                'fields'                => '',

                'order'                 => '',

                'limit'                 => '',

                'offset'                => '',

                'finderQuery'           => '',

            )

        );


    }

