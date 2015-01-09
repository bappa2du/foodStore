<?php
    echo $this->Html->css(array(
        '/Chefgenie/css/font-awesome.min.css',
        '/Chefgenie/css/slicknav',
        '/Chefgenie/css/normalize',
        '/Chefgenie/css/bootstrap.min',
        '/Chefgenie/css/style',
        '/Chefgenie/css/responsive'
    ));
?>

<header id="header" style="background-color: #faebcc;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <a class="logo" href="<?php echo $this->webroot ?>"><img
                        src="<?php echo $this->webroot ?>Chefgenie/img/chefe-genie-logo.png"
                        alt="chefe-genie-logo" title="logo"/></a>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="pull-right mybokking">
                    <a href="<?php echo $this->webroot ?>restaurants"
                       style="background: none;" class="btn btn-booking btn-lg"> my
                                                                                 booking&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                    <?php
                        $user = $this->UserAuth->getUser();
                        if(empty ($user))
                        {
                            ?>
                            <a href="<?php echo $this->webroot ?>login"
                               class="btn btn-booking btn-lg" style="background: none;">login&nbsp;<span
                                    class="glyphicon glyphicon-lock"></span></a>
                        <?php } else
                        { ?>
                            <a href="<?php echo $this->webroot ?>logout"
                               class="btn btn-booking btn-lg" style="background: none;">logout&nbsp;<span
                                    class="glyphicon glyphicon-off"></span></a>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container END -->
</header>
<!-- /.HEADER END -->
<section id="nav-bg">
    <div class="container">
        <nav class="navbar navbar-bg" role="navigation"
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
<!-- /.nav-bg-->
<div class="container">
    <div class="text-center">
        <div class="row">
            <div class="col-md-6 col-sm-6" style="margin-left: 20%;">
                <div
                    style="color: #grey; font-size: 1.1em; margin-left: 5%; margin-top: 5px; padding: 10px; background-color: white; border: 1px solid #ddd;">
                    <img width="120px" height="120px"
                         src="<?php echo $this->webroot; ?>img/error.png">

                    <div
                        style="color: #grey; font-size: 1.1em; margin-left: 5%; margin-top: 5px; padding: 10px; background-color: #faebcc; border: 1px solid #ddd; border-radius: 5px;">
                        <p style="font-weight: bold"><?php echo $this->Session->Flash(); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

