<?php
    App::uses('AppModel', 'Model');

    /**
     * Currency Model
     *
     * @property Pointvalue $Pointvalue
     */
    class Currency extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'title';


        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Pointvalue' => array(
                'className'    => 'Pointvalue',
                'foreignKey'   => 'currency_id',
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
