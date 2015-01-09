<?php
    App::uses('AppModel', 'Model');

    /**
     * AdditionalOrderItem Model
     *
     * @property OrderItem $OrderItem
     * @property Additional $Additional
     */
    class AdditionalOrderItem extends AppModel
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
            'OrderItem'  => array(
                'className'  => 'OrderItem',
                'foreignKey' => 'order_item_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            ),
            'Additional' => array(
                'className'  => 'Additional',
                'foreignKey' => 'additional_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
    }
