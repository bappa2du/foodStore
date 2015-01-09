<?php
    App::uses('AppModel', 'Model');

    /**
     * Offer Model
     *
     * @property Restaurant $Restaurant
     * @property Food $Food
     * @property OrderItem $OrderItem
     */
    class Offer extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'title';


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
            )
        );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'OrderItem' => array(
                'className'    => 'OrderItem',
                'foreignKey'   => 'offer_id',
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
