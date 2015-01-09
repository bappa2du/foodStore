<?php
    App::uses('AppModel', 'Model');

    /**
     * Pointvalue Model
     *
     * @property Currency $Currency
     * @property Restaurant $Restaurant
     */
    class Pointvalue extends AppModel
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
            'Currency'   => array(
                'className'  => 'Currency',
                'foreignKey' => 'currency_id',
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
