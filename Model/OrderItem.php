<?php
    App::uses('AppModel', 'Model');

    /**
     * OrderItem Model
     *
     * @property Order $Order
     * @property Food $Food
     * @property Offer $Offer
     */
    class OrderItem extends AppModel
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
            'Order' => array(
                'className'  => 'Order',
                'foreignKey' => 'order_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Food'  => array(
                'className'  => 'Food',
                'foreignKey' => 'food_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Offer' => array(
                'className'  => 'Offer',
                'foreignKey' => 'offer_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
    }
