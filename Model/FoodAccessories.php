<?php
    App::uses('AppModel', 'Model');

    
   class FoodAccessories extends AppModel
    {
        public $belongsTo = array(
            'Food'       => array(
                'className'  => 'Food',
                'foreignKey' => 'food_id',
                'conditions' => '',
                'fields'     => '',
                'order'      => ''
            )
        );
       public $hasMany = array(

           'FoodAccessoriesDetails'   => array(

               'className'    => 'FoodAccessoriesDetails',
               'foreignKey'   => 'food_accessories_id',
               'dependent'    => false,
               'conditions'   => '',
               'fields'       => '',
               'order'        => ''

           ));

    }

