<header id="header">
    <!-- Fixed navbar -->
    <div class="navbar navbar-myshop navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand" style="margin-top: 6px;">
                    <?php
                        /*echo $this->Html->link(
                        $this->Html->image('logo.png'), '/', array('class' => '','data-href' => Router::url(array('controller'=>'webpages', 'action'=>'home', '?'  => array('layout'=>'ajax'))), 'data-holder' => '#ajaxPage','escape' => false)
                        );*/
                        echo $this->html->link('ChefGenie', '/', array('style' => array('color:#eee;font-size:35px;text-decoration:none;')));
                    ?>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul id="nav" class="nav navbar-nav navbar-right">
                    <li><?php
                            echo $this->Html->link(
                                'Home', '/', array('class' => '', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'home', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                            );
                        ?>
                    </li>
                    <?php
                        $user = $this->UserAuth->getUser();
                        if(empty($user)):
                            ?>
                            <li><?php
                                    echo $this->Html->link(
                                        'My Order', array('plugin' => false, 'controller' => 'restaurants', 'action' => 'index'), array('class' => '', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'index', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                                    );
                                ?>
                            </li>
                            <li><?php
                                    echo $this->Html->link(
                                        'Login', '/login', array('class' => '')
                                    );
                                ?>
                            </li>
                            <li><?php
                                    echo $this->Html->link(
                                        'Register', '/register', array('class' => '')
                                    );
                                ?>
                            </li>
                        <?php
                        else:
                            ?>
                            <li><?php
                                    echo $this->Html->link(
                                        'My account', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userDashboard'), array('class' => '')
                                    );
                                ?>
                            </li>
                            <!--<li><?php
                                echo $this->Html->link(
                                    'My Order', array('plugin' => false, 'controller' => 'orders', 'action' => 'orderList'), array('class' => '')
                                );
                            ?>
                        </li>
                        <li><?php
                                echo $this->Html->link(
                                    'Edit', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editProfile'), array('class' => '')
                                );
                            ?>
                        </li>
                        <li><?php
                                echo $this->Html->link(
                                    'Change password', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editPassword'), array('class' => '')
                                );
                            ?>
                        </li>-->
                            <li><?php
                                    echo $this->Html->link(
                                        'Logout', '/logout', array('class' => '')
                                    );
                                ?>
                            </li>
                        <?php
                        endif;
                    ?>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</header>
