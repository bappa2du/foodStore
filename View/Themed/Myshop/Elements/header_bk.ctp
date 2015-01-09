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
                <div class="navbar-brand">
                    <?php
                        echo $this->Html->link(
                            $this->Html->image('logo.png'), '/', array('class' => 'ajaxlink', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'home', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage', 'escape' => false)
                        );
                    ?>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul id="nav" class="nav navbar-nav navbar-right">
                    <li><?php
                            echo $this->Html->link(
                                'Home', '/', array('class' => 'ajaxlink', 'data-href' => Router::url(array('controller' => 'webpages', 'action' => 'home', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
                            );
                        ?>
                    </li>
                    <li><?php
                            echo $this->Html->link(
                                'My Order', array('controller' => 'restaurants', 'action' => 'index'), array('class' => 'ajaxlink', 'data-href' => Router::url(array('controller' => 'restaurants', 'action' => 'index', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage')
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
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</header>
