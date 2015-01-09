<?php $tfbbdDescription = __d('cake_dev', 'TFBBD'); ?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $tfbbdDescription ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('/bootstrap/css/bootstrap.min');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <?php echo $this->Html->css(array('/bs3admin/css/londinium-theme', '/bs3admin/css/styles', '/bs3admin/css/icons')); ?>
</head>
<body class="sidebar-wide">
    <div role="navigation" class="navbar navbar-inverse">
        <?php echo $this->element('admin/header'); ?>
    </div>
    <div class="page-container">
        <!-- Sidebar -->
        <div class="sidebar collapse">
            <?php echo $this->element('admin/leftbar'); ?>
        </div>
        <!-- /sidebar -->
        <!-- Page content -->
        <div class="page-content">
            <!-- Page header -->
            <?php echo $this->element('admin/contentHeader'); ?>
            <!-- /page header -->
            <!-- Breadcrumbs line -->
            <div class="breadcrumb-line">
                <?php echo $this->element('admin/breadcrumb'); ?>
            </div>
            <!-- /breadcrumbs line -->
            <!-- Info blocks -->
            <div class="Info">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- /info blocks -->
            <!-- Footer -->

            <?php echo $this->element('admin/footer'); ?>

            <!-- /footer -->
        </div>
        <!-- /page content -->
    </div>


    <?php echo $this->Html->script('lib/jquery-1.11.0.min'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap.min'); ?>
    <?php echo $this->Html->script(array('/bs3admin/js/plugins/charts/sparkline.min', '/bs3admin/js/plugins/forms/uniform.min', '/bs3admin/js/plugins/forms/uniform.min', '/bs3admin/js/plugins/forms/select2.min', '/bs3admin/js/plugins/forms/inputmask', '/bs3admin/js/plugins/forms/autosize', '/bs3admin/js/plugins/forms/inputlimit.min', '/bs3admin/js/plugins/forms/listbox', '/bs3admin/js/plugins/forms/multiselect', '/bs3admin/js/plugins/forms/validate.min', '/bs3admin/js/plugins/forms/tags.min', '/bs3admin/js/plugins/forms/switch.min', '/bs3admin/js/plugins/forms/uploader/plupload.full.min', '/bs3admin/js/plugins/forms/uploader/plupload.queue.min', '/bs3admin/js/plugins/forms/wysihtml5/wysihtml5.min', '/bs3admin/js/plugins/forms/wysihtml5/toolbar', '/bs3admin/js/plugins/interface/daterangepicker', '/bs3admin/js/plugins/interface/daterangepicker', '/bs3admin/js/plugins/interface/fancybox.min', '/bs3admin/js/plugins/interface/moment', '/bs3admin/js/plugins/interface/jgrowl.min', '/bs3admin/js/plugins/interface/datatables.min', '/bs3admin/js/plugins/interface/colorpicker', '/bs3admin/js/plugins/interface/fullcalendar.min', '/bs3admin/js/plugins/interface/timepicker.min', '/bs3admin/js/plugins/interface/collapsible.min', '/bs3admin/js/application')); ?>


    <div style="clear:both"><?php echo $this->element('sql_dump'); ?>
    </div>
</body>
</html>

