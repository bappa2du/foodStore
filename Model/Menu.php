<?php
    App::uses('AppModel', 'Model');

    /**
     * Menu Model
     *
     * @property Cusine $Cusine
     * @property Restaurant $Restaurant
     * @property Food $Food
     */
    class Menu extends AppModel
    {
        /**
         *image upload
         *
         **/
        public $actsAs = array(
            'Upload.Upload' => array(
                'photo' => array(
                    'fields' => array(
                        'dir' => 'photo_dir'
                    )
                )
            )
        );
        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'name';


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

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Food' => array(
                'className'    => 'Food',
                'foreignKey'   => 'menu_id',
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
        
        public function getMenuItemsByRestaurent($res_id){
        	$query = "select id,name from menus where restaurant_id = '$res_id'";
        	return $this->query($query);
        }

    }
