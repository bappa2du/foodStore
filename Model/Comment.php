<?php
    App::uses('AppModel', 'Model');

    /**
     * Comment Model
     *
     * @property Restaurant $Restaurant
     * @property Food $Food
     * @property User $User
     */
    class Comment extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'user_id';


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
            'Food'       => array(
                'className'  => 'Food',
                'foreignKey' => 'food_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'User'       => array(
                'className'  => 'User',
                'foreignKey' => 'user_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
    }
