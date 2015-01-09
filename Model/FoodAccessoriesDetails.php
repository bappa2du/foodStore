<?php
    App::uses('AppModel', 'Model');

    
    class FoodAccessoriesDetails extends AppModel
    {
        public $belongsTo = array(
            'FoodAccessories'       => array(
                'className'  => 'FoodAccessories',
                'foreignKey' => 'food_accessories_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );

    }
