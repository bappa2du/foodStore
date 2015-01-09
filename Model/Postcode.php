<?php
    App::uses('AppModel', 'Model');

    /**
     * Postcode Model
     *
     */
    class Postcode extends AppModel
    {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'postcode';

        public function findLatlngForPostCode($postcode)
        {
            return $this->find('first', array('conditions' => array('Postcode.postcode' => $postcode)));
        }

    }
