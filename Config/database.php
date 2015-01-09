<?php

    class DATABASE_CONFIG
    {

        //initalize variable as null

        var $default = array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host'       => 'localhost',
            'login'      => 'root',
            'password'   => 'cheFgeniE1@3SqL',
            'database'   => 'myshoplive',
            'prefix'     => '',
        );
        //set up connection details to use in Live production server

        public $prod = array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host'       => 'localhost',
            'login'      => 'c15myshop3',
            'password'   => 'myshopdb',
            'database'   => 'c15myshop3',
            'prefix'     => '',
            'encoding'   => 'utf8',
        );
        // and details to use on your local machine for testing and development

        public $dev = array(
            'datasource' => 'Database/Mysql',
            'persistent' => false,
            'host'       => 'localhost',
            'login'      => 'root',
            'password'   => '',
            'database'   => 'myshoplive',
            'prefix'     => '',
            'encoding'   => 'utf8',
        );

        public function __construct()
        {

            if(isset($_SERVER['SERVER_NAME']))
            {
                switch($_SERVER['SERVER_NAME'])
                {
                    case 'localhost':
                        $this->default = $this->dev;
                        break;
                    case 'dev.myshop.com':
                        $this->default = $this->dev;
                        break;
                    case 'myshop3.liveoutsource.com':
                        $this->default = $this->prod;
                        break;
                }
            }
        }
    }
