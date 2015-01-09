<header id="header" class="navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <a class="logo" href="<?php echo $this->webroot ?>">
                    <img width="170" src="Chefgenie/img/chefe-genie-logo.png" alt="chefe-genie-logo" title="logo"/>
                </a>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="row" style="margin-top:10px;">
                    <div class="pull-right">
                        <?php
                            $user = $this->UserAuth->getUser();
                            if(empty($user))
                            {
                                ?>

                                <a class="btn btn-booking btn-lg" href="<?php echo $this->webroot ?>join"
                                   id="mainmenu-item-join"><span>Join</span></a>
                                <a rel="#sign-in-popup-wrapper" class="btn btn-booking btn-lg" id="guest-login-button"
                                   name="signin" href="<?php echo $this->webroot ?>login">Sign in</a>
                            <?php } else
                            { ?>
                                <!--                         <a href="<?php echo $this->webroot ?>restaurants" class="btn btn-booking btn-lg">
                            my booking&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
                        </a> -->
                                <a href="<?php echo $this->webroot ?>logout"
                                   class="btn btn-booking btn-lg">logout&nbsp;<span class="glyphicon glyphicon-off"></span></a>
                            <?php } ?>
                    </div>
                </div>
                <div class="row" style="margin-top:8px; margin-bottom: 5px;">
                    <div class="pull-right">
                        <ul class="mainNav">
                            <li class="nav-home">
                                <a href="<?php echo $this->webroot ?>"><span
                                        class="glyphicon glyphicon-home"></span></a>
                            </li>
                            <li>
                                <a href="<?php echo $this->webroot ?>restaurants" title="Help"><span>Restaurants</span></a>
                            </li>
                            <?php if(!empty($user))
                            { ?>
                                <li class="active">
                                    <a href="<?php echo $this->webroot ?>orders/orderList" title="My Order"><span>My Order</span></a>
                                </li>
                            <?php } ?>
                            <?php if(!empty($user))
                            { ?>
                                <!--<li class="active">
                                    <a href="<?php /*echo $this->webroot */?>account"
                                       title="0My Account"><span>My Account</span></a>
                                </li>-->
                            <?php } ?>
                            <li>
                                <a href="<?php echo $this->webroot ?>contact" title="Help"><span>Contact/Help</span></a>
                            </li>
                            <!--                            <li>
                                <a class="homeNavOrderTracking" href="<?php echo $this->webroot ?>ordertracking" title="Order Tracking"><span>Order Tracking</span></a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container END -->
</header><!-- /.HEADER END -->
<!--
        <section id="nav-bg">
            <div class="container">
                <nav class="navbar navbar-bg" role="navigation" style="background: none;">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav star-symbol">
                            <li><a href="<?php echo $this->webroot ?>">HOME</a></li>
                            <li><a href="<?php echo $this->webroot ?>restaurants">OUR RESTAURANT</a></li>
                            <li><a href="#">MENU</a></li>
                            <li><a href="#">CONTACT</a></li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </section>
        -->
<!-- /.nav-bg-->