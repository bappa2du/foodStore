<?php
    App::uses('AppModel', 'Model');

    /**
     * Webpage Model
     *
     * @property Category $Category
     * @property Restaurant $Restaurant
     */
    class Webpage extends AppModel
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
            'Category'   => array(
                'className'  => 'Category',
                'foreignKey' => 'category_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Restaurant' => array(
                'className'  => 'Restaurant',
                'foreignKey' => 'restaurant_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
    }
