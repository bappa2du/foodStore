<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 class="title"><i class="glyphicon glyphicon-shopping-cart"></i>Checkout</h1>
        </div>
        <div class="col-md-8">
            <ol class="breadcrumb coustome-bredcume pull-right">
                <li><a href="#"><span>1</span>
                        <small>Customer Information</small>
                    </a></li>
                <li class="active"><a href="#"><span>2</span>
                        <small>My Delivery<br> Details</small>
                    </a></li>
                <li class="active"><a href="#"><span>3</span>
                        <small>Confirm<br> My Order</small>
                    </a></li>
                <li class="active"><a href="#"><span>4</span>
                        <small>Payment Information</small>
                    </a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container">         <!-- registration -->
    <div class="row">
        <div class="col-md-8">          <!--  order-from -->
            <div class="panel panel-default">           <!-- order-ragister -->
                <div class="panel-heading"><h3>Order Without Registration</h3></div>
                                                        <!--                <p class="stepname">Order Without Registration</p>-->
                <div class="panel-body">
                    <?php
                        echo $this->Session->flash();
                        $data = $this->Js->get('#OrderCustomerCheckoutForm')->serializeForm(array('isForm' => true, 'inline' => true));
                        $this->Js->get('#OrderCustomerCheckoutForm')->event(
                            'submit',
                            $this->Js->request(
                                array('action' => 'checkout/' . $orderId . '/' . $isEdit),
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

                    ?>

                    <?php
                        echo $this->Form->create('OrderCustomer', array('inputDefaults' => array('div' => false, 'error' => false), 'class' => ''));      // form-horizontal
                        echo $this->Form->hidden('order_main', array('value' => $orderId));
                    ?>

                    <div class="col-md-6">
                        <div class="form-group coustome-group">
                            <label for="title">Title</label>
                            <?php echo $this->Form->input('title',
                                array(
                                    'options' => array(

                                        'Mr.'   => 'Mr.',
                                        'Mrs.'  => 'Mrs.',
                                        'Miss.' => 'Miss.',
                                        'Ms.'   => 'Ms.'
                                    ),
                                    'label'   => false,
                                    'class'   => 'form-control'
                                ));
                            ?>
                        </div>
                        <div class="form-group coustome-group">
                            <label for="firstName">First Name</label>
                            <?php echo $this->Form->input('f_name', array('label' => false, 'class' => 'form-control')); ?>
                        </div>
                        <div class="form-group coustome-group">
                            <label for="lastName">Last Name</label>
                            <?php echo $this->Form->input('l_name', array('label' => false, 'class' => 'form-control')); ?>
                        </div>
                    </div>
                    <!--                    <div class="col-md-2"></div>-->
                    <div class="col-md-6">
                        <div class="form-group coustome-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <?php echo $this->Form->input('email',
                                array(
                                    'label'       => false,
                                    'placeholder' => "Enter email",
                                    'class'       => "form-control"

                                ));?>
                        </div>
                        <div class="form-group coustome-group">
                            <label for="exampleInputEmail1">Re-enter email address</label>
                            <?php
                                if($isEdit == 1)
                                {
                                    echo $this->Form->input('confirm_email', array('label' => false, 'value' => $this->request->data['OrderCustomer']['email'], 'class' => 'form-control'));
                                } else
                                {
                                    echo $this->Form->input('confirm_email', array('label' => false, 'class' => 'form-control'));
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="inputMobile">Mobile</label>
                            <?php echo $this->Form->input('phone', array('label' => false, 'class' => 'form-control', 'placeholder' => "+880-1xxxxxxxxx")); ?>
                        </div>
                    </div>
                    <?php
                        echo $this->Form->end();
                        echo $this->Js->writeBuffer();
                    ?>
                    </form>
                </div>
            </div>
        </div>
        <!--        <div class="col-md-1 divider"></div>-->
        <div class="col-md-4">
            <div class="panel panel-default">            <!-- login-ragister -->
                <div class="panel-heading"><h3>Login for Order</h3></div>
                                                         <!--                <p class="stepname">Login for Order</p>-->
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group coustome-group">
                            <label for="memberId">User or Email</label>
                            <input type="email" class="form-control" id="memberId" placeholder="User or Email">
                            <a class="forget-password">
                                <small>Forgotten your user?</small>
                            </a>
                        </div>
                        <div class="form-group coustome-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <a class="forget-password">
                                <small>Forgotten your password?</small>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 text-center">
                    <button type="button" class="btn btn-success btn-md coustome-button pull-left" onclick="goBackToMenu();">
                        <i class="glyphicon glyphicon-chevron-left"></i> Go to Previous Step
                    </button>
                </div>
                <div class="col-md-6 text-center">
                    <button type="submit" class="btn btn-success btn-md coustome-button pull-right" onclick="gotoNext();">Go to Next Step
                        <i class="glyphicon glyphicon-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div>&nbsp;</div>
<script type="text/javascript">
    function gotoNext() {
        $("#OrderCustomerCheckoutForm").submit();
    }

    function goBackToMenu() {
        APP_HELPER_VIEW.ajaxSubmitData('orderMains/goBackToMenu/<?php echo $orderId;?>');
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
