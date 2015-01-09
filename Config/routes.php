<?php

    Router::connect('/', array('controller' => 'webpages', 'action' => 'home', 'home'));
//Router::connect('/', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));

    Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    CakePlugin::routes();

    require CAKE . 'Config' . DS . 'routes.php';

