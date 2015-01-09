<style>
    #nav-bg {
        background: url("<?php echo $this->webroot;?>Chefgenie/img/Nav-bg-right-left.png") repeat-x scroll 0 0 white;
        height: 50px;
        position: relative;
    }
</style>
<header id="header">
    <!-- Fixed navbar -->
    <div class="navbar navbar-myshop navbar-fixed-top" role="navigation"
         style="background: #cbce30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <a class="logo" href="<?php echo $this->webroot ?>"><img
                            src="/img/chefe-genie-logo.png" alt="chefe-genie-logo"
                            title="logo" width="150px;"/></a>
                </div>
                <div class="col-md-6 col-sm-6 pull-right">
                    <div class="pull-right mybokking">
                        <?php
                            $user = $this->UserAuth->getUser();
                            if(empty ($user))
                            {
                                ?>
                                <a href="<?php echo $this->webroot ?>login">
                                    <img alt="Login" src="<?php echo $this->webroot ?>myshop/img/login-button.png" style="margin-top:20px;" width="100px;"></a>
                            <?php } else
                            { ?>
                                <a
                                    href="<?php echo $this->webroot ?>orders/orderList"
                                    class="btn btn-booking btn-lg" style="margin-top:20px;"> my
                                                                                             order&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                                <a href="<?php echo $this->webroot ?>logout"
                                   class="btn btn-booking btn-lg" style="margin-top:20px;">logout&nbsp;<span
                                        class="glyphicon glyphicon-off"></span></a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="nav-bg"
             style="position: fixed; z-index: 100000; width: 100%;">
        <div class="container">
            <nav class="navbar navbar-bg " role="navigation"
                 style="background: none;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed"
                            data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse"
                     id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav star-symbol">
                        <li><a href="<?php echo $this->webroot ?>">HOME</a></li>
                        <li><a href="<?php echo $this->webroot ?>restaurants">OUR
                                                                              RESTAURANT</a></li>
                        <li><a href="#">MENU</a></li>
                        <li><a href="#">CONTACT</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </section>
    <!-- /.nav-bg-->
</header>
