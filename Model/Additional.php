<?php

    App::uses('AppModel', 'Model');

    /**
     * Additional Model
     *
     * @property AdditionalOrderItem $AdditionalOrderItem
     * @property Food $Food
     */
    class Additional extends AppModel
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

            'name' => array(

                'notEmpty' => array(

                    'rule'    => array('notEmpty'),

                    'message' => 'Please enter food name.',

                    //'allowEmpty' => false,

                    //'required' => false,

                    //'last' => false, // Stop validation after this rule

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

            'AdditionalOrderItem' => array(

                'className'    => 'AdditionalOrderItem',

                'foreignKey'   => 'additional_id',

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

            'Food' => array(

                'className'             => 'Food',

                'joinTable'             => 'additionals_foods',

                'foreignKey'            => 'additional_id',

                'associationForeignKey' => 'food_id',

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

