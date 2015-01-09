<?php
    App::uses('AppModel', 'Model');

    /**
     * AdditionalFood Model
     *
     * @property Food $Food
     * @property Additional $Additional
     */
    class AdditionalFood extends AppModel
    {


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Food'       => array(
                'className'  => 'Food',
                'foreignKey' => 'food_id',
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
