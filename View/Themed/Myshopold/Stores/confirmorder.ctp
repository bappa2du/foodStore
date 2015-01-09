<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 class="title"><i class="glyphicon glyphicon-shopping-cart">Checkout</i></h1>
        </div>
        <div class="col-md-8">
            <ol class="breadcrumb coustome-bredcume pull-right">
                <li class="active"><a href="#"><span>1</span>
                        <small>Customer Information</small>
                    </a></li>
                <li class="active"><a href="#"><span>2</span>
                        <small>My Delivery<br> Details</small>
                    </a></li>
                <li><a href="#"><span>3</span>
                        <small>Confirm<br> My Order</small>
                    </a></li>
                <li class="active"><a href="#"><span>4</span>
                        <small>Payment Information</small>
                    </a></li>
            </ol>
        </div>
    </div>
    <div class="row">       <!-- result -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Please review and then place your order below</h3></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td> Ordering From</td>
                            <td> <?php echo $store['address']; ?> </td>
                        </tr>
                        <tr>
                            <td>Paying With</td>
                            <td> Cash</td>
                        </tr>
                        <tr>
                            <td>Deliver To</td>
                            <td>
                                <?php echo $orderMain['OrderMain']['address'] ?>
                                <br> <?php echo $orderMain['OrderMain']['add_direction']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>
                                <?php echo $orderCustomer['OrderCustomer']['title'] . " " . $orderCustomer['OrderCustomer']['f_name'] . " " . $orderCustomer['OrderCustomer']['l_name'] ?>
                                <br/> <?php echo $orderCustomer['OrderCustomer']['phone'] ?>
                                <br/> <?php echo $orderCustomer['OrderCustomer']['email'] ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--        <h3>Order Detail</h3>-->
            <!--        <h4>Delivery Detail</h4>-->
            <!--        <table class="table table-hover">-->
            <?php //$orderItems = $orderMain['OrderItem'];
                //            foreach ($orderItems as $item){
            ?>
            <!--                <tr>-->
            <!--                    <td> <b>--><?php //echo $item['name'];?><!--</b> </td>-->
            <!--                    <td> --><?php //echo $item['quantity'];?><!-- </td>-->
            <!--                    <td> --><?php //echo $item['price'];?><!-- </td>-->
            <!--                </tr>-->
            <?php //} ?>
            <!--            <tr>-->
            <!--                <td colspan="3"> &nbsp; </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>-->
            <!--                    Delivery Charge-->
            <!--                </td>-->
            <!--                <td>&nbsp;</td>-->
            <!--                <td> --><?php //echo $store['delivery_charge'];?><!-- </td>-->
            <!--            </tr>-->
            <!--            <tr>-->
            <!--                <td>-->
            <!--                    <b> Total Pay </b>-->
            <!--                </td>-->
            <!--                <td>&nbsp;</td>-->
            <!--                <td> <b>--><?php //echo $orderMain['OrderMain']['total_price'];?><!--</b> </td>-->
            <!--            </tr>-->
            <!--        </table>-->
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-success btn-sm coustome-button pull-right" onclick="ConfirmOrder();">Confirm
                        <i class="glyphicon glyphicon-chevron-right"></i></button>
                    <h3>Order Detail</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <?php $orderItems = $orderMain['OrderItem'];
                            foreach($orderItems as $item)
                            {
                                ?>
                                <tr>
                                    <td><b><?php echo $item['name']; ?></b></td>
                                    <td> <?php echo $item['quantity']; ?> </td>
                                    <td> <?php echo $item['price']; ?> </td>
                                </tr>
                            <?php } ?>
                        <tr>
                            <td colspan="3"> &nbsp; </td>
                        </tr>
                        <tr>
                            <td>
                                Delivery Charge
                            </td>
                            <td>&nbsp;</td>
                            <td> <?php echo $store['delivery_charge']; ?> </td>
                        </tr>
                        <tr>
                            <td>
                                <b> Total Pay </b>
                            </td>
                            <td>&nbsp;</td>
                            <td><b><?php echo $orderMain['OrderMain']['total_price']; ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="row">       <!-- result -->
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-success btn-md coustome-button pull-left" onclick="gotoPrevious();">
                <i class="glyphicon glyphicon-chevron-left"></i> Go to Previous Step
            </button>
        </div>
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-success btn-md coustome-button pull-right" onclick="ConfirmOrder();">Confirm Order
                <i class="glyphicon glyphicon-chevron-right"></i></button>
        </div>
    </div>
    <?php
        //echo $this->Form->input('Go To Previous Step', array('div' => array('class' => 'form-group col-md-4 col-md-offset-2'), 'label' => false, 'type' => 'submit', 'class' => 'btn btn-primary col-md-12'));
        // echo $this->Form->input('Confirm Order', array('div' => array('class' => 'form-group col-md-4'), 'label' => false, 'type' => 'submit', 'class' => 'btn btn-success col-md-12'));

        echo $this->Form->end();
    ?>
</div>
<div>&nbsp;</div>
<script type="text/javascript">
    function ConfirmOrder() {
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/confirmorder/<?php echo $orderId?>');
    }
    function gotoPrevious() {
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/delivery/<?php echo $orderId?>/1');
    }
</script>
<style type="text/css">
    body {
        font-family: Tahoma, Geneva, sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: Tahoma, Geneva, sans-serif;
    }

    h1, h2 {
        color: #006600;
    }

    h3, h4, h5, h6 {
        color: #339900;
    }

    .panel-heading h3 {
        margin: 0;
    }

    h1.title {
        font-family: Tahoma, Geneva, sans-serif;
        padding-top: 20px;
    }
</style>