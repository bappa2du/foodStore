<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo 'Chefgenie'; ?>:
        <?php
            $_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $segments                    = explode('/', $_SERVER['REQUEST_URI_PATH']);

            if(isset($segments[2]) && $segments[2] == "checkout")
                $title_for_layout = ucfirst($segments[2]);
            echo $title_for_layout;

        ?>
    </title>

    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('/bs3admin/css/bootstrap.min');
        echo $this->Html->css('/myshop/css/bootstrap-custom');
        echo $this->Html->css('/myshop/css/styles');
        echo $this->Html->css('/myshop/css/font-awesome.min.css');


        echo $this->Html->script('lib/jquery-1.11.0.min.js');
        echo $this->Html->script('lib/bootstrap.min.js');
        echo $this->Html->script('lib/underscore-min.js');
        echo $this->Html->script('lib/myshop.js');
        echo $this->Html->script('module/order/checkout.js');
        echo $this->Html->script('lib/jquery.cookie.js');
        echo $this->Html->script('/Chefgenie/js/placeholder');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript">var siteurl = "<?php echo $this->request->webroot;?>"</script>
</head>
<body class="sidebar-wide">
    <!--    ====================================================
                            Ie compitibility 
            ==================================================== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php
        echo $this->Html->script(array(
    'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js',
    'https://oss.maxcdn.com/respond/1.4.2/respond.min.js'
    )); ?>
    <![endif]-->
    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!--    ====================================================
                    end change 
            ==================================================== -->
    <!-- Page container -->
    <div class="page-container">
        <?php
            echo $this->element('header');
        ?>
        <div id="ajaxPage">
            <?php
                echo $this->Session->flash();
                echo $this->fetch('content');
            ?>
        </div>
        <?php
            echo $this->element('footer');
        ?>
    </div>
    <!-- /page container -->
    <script>
        $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
            var id = $(this).attr('id');
            if (id == 'checkoutNext2') {
                var orderTitle = $('#OrderTitle').val();
                var orderCustomerName = $('#OrderCustomerName').val();
                var orderLName = $('#OrderLName').val();
                var customerName = orderTitle + ' ' + orderCustomerName + ' ' + orderLName;
                var orderDeliveryAddress = $('#OrderDeliveryAddress').val();
                var orderDeliveryPhoneNumber = $('#OrderDeliveryPhoneNumber').val();

                $.cookie('customerDeliveryName', customerName, {expires: 1});
                $.cookie('orderDeliveryAddress', orderDeliveryAddress, {expires: 1});
                $.cookie('orderDeliveryPhoneNumber', orderDeliveryPhoneNumber, {expires: 1});
                var oDCN = $.cookie('customerDeliveryName');
                var oDAData = $.cookie('orderDeliveryAddress');
                var oDPN = $.cookie('orderDeliveryPhoneNumber');
                $('#customerName').html(oDCN);
                $('#deleverTo').html(oDAData);
                $('#deleveryContact').html(oDPN);
            }

            // Add active class
            function selector(nth) {
                return 'ul.nav.nav-tabs.switchs.pull-right li:nth-child(' + nth + ')';
            }

            function section() {
                return 'ul.nav.nav-tabs.switchs.pull-right li';
            }

            $(section()).removeClass('active');

            if (id == 'checkoutNext1') {
                $(selector(2)).addClass('active');
            } else if (id == 'checkoutNext2') {
                $(selector(3)).addClass('active');
            } else if (id == 'checkoutNext3') {
                $(selector(4)).addClass('active');
            } else if (id == 'checkoutPrev2') {
                $(selector(1)).addClass('active');
            } else if (id == 'checkoutPrev3') {
                $(selector(2)).addClass('active');
            } else if (id == 'checkoutPrev4') {
                $(selector(3)).addClass('active');
            }

        });
    </script>
</body>
</html>