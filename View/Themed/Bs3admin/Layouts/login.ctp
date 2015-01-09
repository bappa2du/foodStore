<?php $myshop = __d('cake_dev', 'Myshop Login'); ?>
<!DOCTYPE html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $myshop ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('/bs3admin/css/bootstrap.min');
        echo $this->Html->css('/bs3admin/css/londinium-theme');
        echo $this->Html->css('/bs3admin/css/styles');
        echo $this->Html->css('/bs3admin/css/icons');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

    <?php echo $this->Html->script('/bs3admin/js/plugins/charts/sparkline.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/uniform.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/select2.min'); ?>

    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/inputmask'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/autosize'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/inputlimit.min'); ?>
    <?php //echo $this->Html->script('/bs3admin/js/plugins/forms/listbox.min'); ?>

    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/multiselect'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/validate.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/tags.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/switch.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/uploader/plupload.full.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/uploader/plupload.queue.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/wysihtml5/wysihtml5.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/forms/wysihtml5/toolbar'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/daterangepicker.js'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/fancybox.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/moment'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/jgrowl.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/datatables.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/colorpicker'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/fullcalendar.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/timepicker.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/plugins/interface/collapsible.min'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap.min'); ?>
    <?php echo $this->Html->script('/bs3admin/js/application'); ?>
</head>
<body class="full-width page-condensed">
    <!-- Navbar -->
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right">
                <span class="sr-only">Toggle navbar</span>
                <i class="icon-grid3"></i>
            </button>
            <a class="navbar-brand" href="/"><?php echo Configure::read('Site.title') ?></a>
        </div>
        <ul class="nav navbar-nav navbar-right collapse">
            <li><a href="/login"><i class="icon-screen2"></i>Sign In</a></li>
            <!-- <li><a href="#"><i class="icon-paragraph-justify2"></i></a></li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
                <ul class="dropdown-menu icons-right dropdown-menu-right">
                    <li><a href="#"><i class="icon-cogs"></i> This is</a></li>
                    <li><a href="#"><i class="icon-grid3"></i> Dropdown</a></li>
                    <li><a href="#"><i class="icon-spinner7"></i> With right</a></li>
                    <li><a href="#"><i class="icon-link"></i> Aligned icons</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
    <!-- /navbar -->
    <?php if($this->Session->check('Message.flash'))
    { ?>
        <div class="alert alert-warning fade in block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="icon-info"></i>  <?php echo $this->Session->flash(); ?>
        </div>
    <?php } ?>
    <?php //echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

    <?php echo $this->element('footer') ?>
</body>
</html>