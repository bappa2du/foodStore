<?php
    App::uses('AppModel', 'Model');

    /**
     * CusineRestaurant Model
     *
     * @property Cusine $Cusine
     * @property Restaurant $Restaurant
     */
    class CusineRestaurant extends AppModel
    {


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Cusine'     => array(
                'className'  => 'Cusine',
                'foreignKey' => 'cusine_id',
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
