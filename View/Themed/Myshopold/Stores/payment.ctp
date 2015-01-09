<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Checkout</h2>
        </div>
        <div class="col-md-8">
            <ol class="breadcrumb coustome-bredcume pull-right">
                <li class="active"><a href="#"><span>1</span>
                        <small>Customer Information</small>
                    </a></li>
                <li class="active"><a href="#"><span>2</span>
                        <small>My Delivery<br> Details</small>
                    </a></li>
                <li class="active"><a href="#"><span>3</span>
                        <small>Confirm<br> My Order</small>
                    </a></li>
                <li><a href="#"><span>4</span>
                        <small>Payment Information</small>
                    </a></li>
            </ol>
        </div>
    </div>
    <div class="row">       <!-- result -->
                            <!--    --><?php
            //    echo $this->Form->create('Customer', array('inputDefaults' => array('div' => false, 'error' => false), 'class' => ''));
            //
        ?>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Payment Information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-2">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" checked="checked" name="paymentType" value="1"> <b>Cash</b>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="paymentType" value="2"> <?php echo $this->Html->image('img_ae.jpg', array('alt' => 'add product to cart')); ?>
                                </label>
                            </div>
                        </div>
                        <!--   <div class="col-md-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> <?php //echo $this->Html->image('img_wu.jpg', array('alt' => 'add product to cart'));?>
                    </label>
                </div>
            </div> -->
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="paymentType" value="3"> <?php echo $this->Html->image('img_visa.jpg', array('alt' => 'add product to cart')); ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input type="radio" name="paymentType" value="4"> <?php echo $this->Html->image('img_mc.jpg', array('alt' => 'add product to cart')); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <?php //echo $this->Html->image('img_ppl.jpg', array('alt' => 'add product to cart'));?>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <?php //echo $this->Html->image('img_ebay.jpg', array('alt' => 'add product to cart'));?>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <?php //echo $this->Html->image('img_ppl.jpg', array('alt' => 'add product to cart'));?>
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <b>Cash</b>
                        </label>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-success btn-md coustome-button pull-left" onclick='gotoPrevious();'>
                <i class="glyphicon glyphicon-chevron-left"></i> Go to Previous Step
            </button>
        </div>
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-success btn-md coustome-button pull-right" onclick='gotoNext();'>Pay for Order
                <i class="glyphicon glyphicon-chevron-right"></i></button>
        </div>
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
</div>
<script type="text/javascript">
    $(function () {

    });
    function gotoPrevious() {
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/confirmOrder/<?php echo $orderId?>/1');
    }
    function gotoNext() {
        var paymentType = $('input[name="paymentType"]:checked').val();
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/creditPayment/' + paymentType);
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