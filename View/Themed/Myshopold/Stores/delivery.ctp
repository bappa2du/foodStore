<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 class="title"><i class="glyphicon glyphicon-shopping-cart">Checkout</i></h1>
        </div>
        <div class="col-md-8">
            <ol class="breadcrumb coustome-bredcume pull-right">
                <li class="active"><a href="#" onclick="gotoPrevious();"><span>1</span>
                        <small>Customer
                               Information
                        </small>
                    </a></li>
                <li class="#"><a href="#"><span>2</span>
                        <small>My Delivery<br>
                               Details
                        </small>
                    </a></li>
                <li class="active"><a href="#"><span>3</span>
                        <small>Confirm<br> My
                               Order
                        </small>
                    </a></li>
                <li class="active"><a href="#"><span>4</span>
                        <small>Payment
                               Information
                        </small>
                    </a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">         <!--    registration     -->
    <?php echo $this->Session->flash();
        $data = $this->Js->get('#OrderMainCheckoutForm')->serializeForm(array('isForm' => true, 'inline' => true));
        $this->Js->get('#OrderMainCheckoutForm')->event(
            'submit',
            $this->Js->request(
                array('action' => 'delivery/' . $orderId . '/' . $isEdit),
                array(
                    'data'           => $data,
                    'async'          => true,
                    'dataExpression' => true,
                    'method'         => 'POST',
                    'before'         => 'APP_HELPER_VIEW.ajax_start();',
                    'success'        => 'APP_HELPER_VIEW.ajax_stop();APP_HELPER_VIEW.loadContents(data);',
                    'error'          => 'APP_HELPER_VIEW.ajax_error(errorThrown);'
                )
            )
        );
        echo $this->Form->create('OrderMain', array('inputDefaults' => array('div' => false, 'error' => false), 'class' => 'form-horizontal'));
    ?>
    <?php echo $this->Form->hidden('order_main', array('value' => $orderId)); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Delivery Details</h3>
                </div>
                <div class="panel-body">
                    <div id='delivery_div'>
                        <?php echo $this->Form->input('delivery_address', array('div' => array('class' => 'form-group col-md-12 login'), 'type' => 'textarea', 'class' => 'form-control', 'value' => $store['OrderMain']['address']));
                            echo $this->Form->error('address'); ?>

                        <?php echo $this->Form->input('other direction', array('div' => array('value' => $store['OrderMain']['add_direction'], 'class' => 'form-group col-md-12 login'), 'type' => 'text', 'class' => 'form-control'));

                            echo $this->Form->error('direction'); ?>

                        <?php echo $this->Form->input('phone number', array('div' => array('class' => 'form-group col-md-12 login'), 'type' => 'text', 'class' => 'form-control', 'value' => $store['OrderMain']['phone']));
                            echo $this->Form->error('phone'); ?>

                        <div class="form-group col-md-12">
                            <label>Payment Type </label>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="payment" id="payment" value="Cash" checked> Cash
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="submit" class="btn btn-success pull-right btn-sm"
                            onclick="submitDeliveryDetail();">Next <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                    <h3>Time</h3>
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->input('delivery_type', array('onchange' => 'toggleDeliverydetail();', 'div' => array('class' => 'form-group col-md-12 login'), 'type' => 'select', 'class' => 'form-control',
                                                                         'options'  => array(
                                                                             'Delivery'   => 'Delivery',
                                                                             'Collection' => 'Collection',
                                                                         )
                    )); ?>

                    <div class="form-group col-md-12 ">
                        <label>Delivery Time </label>

                        <div class="radio">
                            <label>
                                <input type="radio" value="0" id="radioTo" name="delivery_time_class" onclick="setTimeForOrder($(this));" checked="checked"> ASAP
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="1" id="radioTo" name="delivery_time_class" onclick="setTimeForOrder($(this));"> Choose Time
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-12 ">
                        <!-----select time ------>
                        <div class="select-time">
                            <select id="select_time" class="form-control" disabled
                                    onchange="setDeliveryTime($(this).val())">
                                <option>1:00:00 - 2:00:00</option>
                                <option>2:00:00 - 3:00:00</option>
                                <option>3:00:00 - 4:00:00</option>
                                <option>4:00:00 - 5:00:00</option>
                                <option>5:00:00 - 6:00:00</option>
                                <option>6:00:00 - 7:00:00</option>
                                <option>7:00:00 - 8:00:00</option>
                                <option>8:00:00 - 9:00:00</option>
                                <option>9:00:00 - 10:00:00</option>
                                <option>10:00:00 - 11:00:00</option>
                                <option>11:00:00 - 12:00:00</option>
                                <option>12:00:00 - 13:00:00</option>
                                <option>13:00:00 - 14:00:00</option>
                                <option>14:00:00 - 15:00:00</option>
                                <option>15:00:00 - 16:00:00</option>
                                <option>16:00:00 - 17:00:00</option>
                                <option>17:00:00 - 18:00:00</option>
                                <option>18:00:00 - 19:00:00</option>
                                <option>19:00:00 - 20:00:00</option>
                                <option>20:00:00 - 21:00:00</option>
                                <option>21:00:00 - 22:00:00</option>
                                <option>22:00:00 - 23:00:00</option>
                                <option>23:00:00 - 24:00:00</option>
                                <option>24:00:00 - 1:00:00</option>
                            </select>
                        </div>
                        <!-----end of select time ------>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 text-center">
                <button type="button"
                        class="btn btn-success btn-md coustome-button pull-left"
                        onclick="gotoPrevious();"><i class="glyphicon glyphicon-chevron-left"></i> Go to Previous Step
                </button>
            </div>
            <div class="col-md-6 text-center">
                <button type="submit"
                        class="btn btn-success btn-md coustome-button pull-right"
                        onclick="submitDeliveryDetail();">Go to Next Step
                    <i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>
        </div>
    </div>
    <?php
        echo $this->Form->end();
        echo $this->Js->writeBuffer();
    ?>
</div>
<div>&nbsp;</div>
<script type="text/javascript">
    function toggleDeliverydetail() {
        if ($("#OrderMainDeliveryType").val() == 'Collection') {
            $("#delivery_div").fadeOut('slow');
        } else {
            $("#delivery_div").fadeIn('slow');
        }
    }
    function gotoPrevious() {
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/checkout/<?php echo $orderId?>/1');
    }
    function submitDeliveryDetail() {
        $("#OrderMainCheckoutForm").submit();
    }
    /*
     function setTimeForOrder(data){
     var val = data.attr('value');
     if(val== 1){
     $("#select_time").removeAttr('disabled');
     $("#OrderDeliveryTime").val('<?php echo $asap?>');
     }
     else{
     $("#select_time").attr('disabled', 'disabled');
     $("#OrderDeliveryTime").val('<?php echo $asap?>');
     }
     }*/
    function setDeliveryTime(val) {
        $("#OrderDeliveryTime").val(val);
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
