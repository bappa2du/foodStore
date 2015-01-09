<?php
    /**
     *
     *
     * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
     * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     *
     * Licensed under The MIT License
     * For full copyright and license information, please see the LICENSE.txt
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
     * @link          http://cakephp.org CakePHP(tm) Project
     * @package       app.View.Layouts
     * @since         CakePHP(tm) v 0.10.0.1076
     * @license       http://www.opensource.org/licenses/mit-license.php MIT License
     */

    $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        MYSHOP
        <?php //echo $cakeDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('custom');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('../slider/jquery-ui.css', array('inline' => false));
        echo $this->Html->script(array('../slider/jquery-1.10.2.js', '../slider/jquery-ui.js'));
    ?>
    <?php echo $this->element('js'); ?>
    <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
    <!--==============================top menu===============================-->
    <?php echo $this->element('top-menu'); ?>
    <!--==============================/top menu===============================-->
    <!--=======================================Content=======================================-->
    <!--==============================slider===============================-->
    <?php echo $this->element('slider'); ?>
    <!--==============================/slider===============================-->
    <div class="container" id="ajax-view-content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <!--=======================================/Content=======================================-->
    <!--=======================================Footer=======================================-->
    <?php echo $this->element('footer'); ?>
    <!--=======================================/Footer=======================================-->

    <?php
        //echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('application');
    ?>
    <script type="text/javascript">
        var APP_URL_ROOT = "<?php echo $this->webroot;?>";
        var APP_XHR = null;
    </script>
    <script>
        $(function () {
            $('.dropdown-menu').mouseleave(function () {
                $("li").removeClass('open');
            });

            APP_HELPER_VIEW.ajaxSubmitDataCallback('dashboard/dashboard', '', function (data) {
                APP_COMMON_VIEW.initLayout("");
            });

            $('ul li a').click(function () {
                $('ul li.active').removeClass('active');
                $(this).closest('li').addClass('active');
            });

            $("button.disabled").click(function () {
                alert(1);
                return (false);
            });
        });
    </script>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
