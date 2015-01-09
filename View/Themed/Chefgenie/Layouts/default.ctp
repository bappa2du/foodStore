<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"><!--<![endif]-->
<head>
    <?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo 'Chefgenie'; ?>:
        <?php echo $title_for_layout; ?>
    </title>

    <?php
        echo $this->Html->meta('icon');

        /*echo $this->Html->css(array(
            '/Chefgenie/css/font-awesome.min.css',
            '/Chefgenie/css/slicknav',
            '/Chefgenie/css/normalize',
            '/Chefgenie/css/bootstrap.min',
            '/Chefgenie/css/style',
            '/Chefgenie/css/responsive'

        ));*/
        echo $this->Html->css('/Chefgenie/css/font-awesome.min.css');
        echo $this->Html->css('/Chefgenie/css/slicknav');
        echo $this->Html->css('/Chefgenie/css/normalize');
        echo $this->Html->css('/Chefgenie/css/bootstrap.min');
        echo $this->Html->css('/Chefgenie/css/style');
        echo $this->Html->css('/Chefgenie/css/responsive');

        echo $this->Html->script('/Chefgenie/js/vendor/modernizr-2.6.2.min');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
<body>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php
    echo $this->Html->script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js');
    echo $this->Html->script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js');
    ?>
    <![endif]-->
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
                                                                                                                        your browser</a> to improve your experience.
    </p>
    <![endif]-->
    <!-- Page container -->
    <div class="page-container">
        <?php echo $this->element('header'); ?>

        <div id="ajaxPage">
            <?php
                echo $this->Session->flash();
                echo $this->fetch('content');
            ?>
        </div>

        <?php echo $this->element('footer'); ?>
    </div>
    <!-- /page container -->
    <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); ?>
    <script>
        window.jQuery || document.write('<script src="<?php echo $this->webroot ?>Chefgenie/js/vendor/jquery-1.10.2.min.js"><\/script>');
    </script>
    <?php
        echo $this->Html->script(array(
            '/Chefgenie/js/plugins',
            '/Chefgenie/js/jquery.slicknav.min',
            '/Chefgenie/js/jquery.fitvids',
            '/Chefgenie/js/bootstrap.min',
            '/Chefgenie/js/main',
            '/Chefgenie/js/placeholder'
        ));
    ?>
    <script type="text/javascript">
        $(function () {
            $('input, text').placeholder();
            $('input, textarea').placeholder();
        });
    </script>
</body>
</html>