<?php
    App::uses('AppModel', 'Model');

    /**
     * Package Model
     *
     * @property Restaurant $Restaurant
     * @property Cusine $Cusine
     * @property PackageDetail $PackageDetail
     */
    class Package extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'title';

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'title' => array(
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
            'Restaurant' => array(
                'className'  => 'Restaurant',
                'foreignKey' => 'restaurant_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Cusine'     => array(
                'className'  => 'Cusine',
                'foreignKey' => 'cusine_id',
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
            'PackageDetail' => array(
                'className'    => 'PackageDetail',
                'foreignKey'   => 'package_id',
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

    }
