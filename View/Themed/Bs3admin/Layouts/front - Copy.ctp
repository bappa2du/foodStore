<?php $tfbbdDescription = __d('cake_dev', 'TFBBD'); ?>
<!DOCTYPE html>
<head>
    <?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $tfbbdDescription ?>:
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
<body>
    <header class="container">
        <?php echo $this->element('front-header'); ?>
        <?php echo $this->element('front-top-nav'); ?>
    </header>
    <div class="container">
        <?php if($this->Session->check('Message.flash'))
        { ?>
            <div class="alert alert-warning fade in block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-info"></i>  <?php echo $this->Session->flash(); ?>
            </div>
        <?php } ?>

        <?php echo $this->fetch('content'); ?>
    </div>

    <?php echo $this->element('footer'); ?>
</body>
</html>