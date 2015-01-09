<?php
    /*debug($restaurant['Restaurant']['id']);
    die();*/

    ?>
<style>
    #cartContentConfirm table td:nth-child(4) {
        display: none;
    }
</style>
<style>
    .restaurant-cuisine li a {
        font-size: 15px;
        font-weight: bold;
    }

    .foodName {
        font-size: 15px;

    }

    .foodPrice {
        font-size: 14px;
        font-weight: bold;
    }

    .myOrderIName {
        font-size: 12px;
        font-weight: bold;

    }

    #cartContent td {
        border: 0;
        padding-bottom: 0;
    }

    #cartContent .myOrderDetailCarted td {
        width: 33.33%;
        padding-bottom: 5px;
    }

    .offer-button {
        margin-top: 0px;
        margin-bottom: 0px;
        background: #ff6600;
        color: rgba(255, 255, 255, 0.75);
        padding: 6px 5px;
        transform: rotate(-12deg);
        -ms-transform: rotate(-12deg); /* IE 9 */
        -webkit-transform: rotate(-12deg);
    }

    .btnAddToCurt, .btnDeleteFromCurt {
        padding: 5px 10px;
    }

    .offerBTH h4 {
        text-align: center;
    }

    .myOrderDetailCarted td:nth-child(1), .myOrderDetailCarted td:nth-child(2) {
        padding-top: 13px;
    }
</style>
<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>

        <?php if($restaurant){ ?>
        <li>
            <a href="/restaurants/details/<?php echo $restaurant['Restaurant']['id']; ?>"><?php echo $restaurant['Restaurant']['name']; ?></a>
        </li>
        <li class="active">Checkout</li>
        <?php } ?>
    </ol>
    <h1 class="title"><i class="glyphicon glyphicon-shopping-cart"></i><span id="pg_title">Checkout</span></h1>
    <!-- ========================= -->
    <div class="row">
        <div class="col-sm-18">
            <?php
        if($this->Session->check('Message.flash'))
        {
            ?>
            <div class="alert alert-danger fade in block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo $this->Session->flash(); ?>
            </div>
        <?php
        }
        ?>
        </div>
    </div>
        <!-- ============================= -->

    <?php
        if(!empty($restaurant))
        {
            ?>
            <div class="row">
                <div class="col-sm-18">
                    <?php
                        /**
                         * Checkout Form
                         */
                        echo $this->Form->create(null, array(
                            'url'  => array('controller' => 'orders', 'action' => 'add'),
                            'name' => 'checkoutform'
                        ));
                    ?>

                    <div id="chechoutStep1">
                        <?php echo $this->element('checkout_login'); ?>
                        <?php echo $this->element('checkout_customer'); ?>
                        <?php echo $this->element('checkout_delivery'); ?>
                        <?php echo $this->element('checkout_comment'); ?>
                    </div>
                    <div id="chechoutStep2">
                        <?php echo $this->element('checkout_payment'); ?>

                        <button type="button" id="checkoutStemPrevious" class="btn btn-success btn-lg"/>
                        Previous</button>
                        <?php echo $this->Form->submit('Place my order', array('id' => 'placeMyOrder', 'class' => 'btn btn-success btn-lg', 'div' => false, 'onclick' => 'terms();')); ?>
                        <?php echo $this->Form->end(); ?>

                        <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
                        <!--:::::::::::::::::::::::                TAPPWARE SOLUTIONS                       ::::::::::::::::::::::-->
                        <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
                        <script type="text/javascript">
                            function secondStepValidation() {
                                document.getElementById("OrderCheckoutForm").onsubmit = function () {
                                    if (document.getElementById("card_payment").checked == true) {
                                        if (document.getElementById("transaction_card_number").value == '') {
                                            $('#cardno').modal('show');

                                            return false;
                                        }
                                        if (document.getElementById("transaction_cvv").value == '') {
                                            $('#cards').modal('show');
                                            return false;
                                        }
                                    }
                                    if (document.getElementById("termsConditions").checked == false) {
                                        $('#tc').modal('show');
                                        return false;
                                    }
                                }
                            }
                            window.onload = function () {
                                secondStepValidation();
                            }
                        </script>
                        <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
                        <!--:::::::::::::::::::::::                TAPPWARE SOLUTIONS                       ::::::::::::::::::::::-->
                        <!--::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
                    </div>
                </div>
                <div class="col-sm-6">
                    <?php
                        echo $this->element('my_cart', array('checkout' => false, 'addmore' => true));
                    ?>
                </div>
            </div>




        <?php
        } else
        {
            ?>
            <div class="row">
                <div class="col-sm-7">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3>Cart is empty</h3>
                        </div>
                        <div class="panel-body">
                            <h1 class="text-center"><span class="fa fa-shopping-cart"></span></h1>
                            <h2 class="text-center">Empty Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    ?>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $("#panel_search_address").hide();
    OrderObj.updateCart('display', '', '<?php echo $restaurant['Restaurant']['id']; ?>');
    // Checkout steps
    $('#chechoutStep2').hide();
    $('#checkoutStemNext').bind('click', function (e) {

        if (formValidationIsTrue()) {  /*if formValidationIsTrue()==true, That means Validation Error */
            return false;
        }
        ;

        $('#chechoutStep1').hide();
        $('#chechoutStep2').show();
        $("#pg_title").text("Make Payment");
    });
    $('#checkoutStemPrevious').bind('click', function (e) {
        $('#chechoutStep2').hide();
        $('#chechoutStep1').show();
        $("#pg_title").text("Checkout");
    });


    function formValidationIsTrue() {

        var isValidated = true;
        /*Flag for checking all fields validation*/

        var OrderCustomerEmail = $('#OrderCustomerEmail').val().trim();
        var OrderConfirmCustomerEmail = $('#OrderConfirmCustomerEmail').val().trim();
        var OrderCustomerName = $('#OrderCustomerName').val().trim();
        var OrderDeliveryAddress = $('#OrderDeliveryAddress').val();
        var transaction_card_number = $('#transaction_card_number').val();
        var transaction_cvv = $('#transaction_cvv').val();
        var OrderCustomerMobile = $('#OrderCustomerMobile').val();
        var postcode = $('#postcode').val().trim();
        //  var postcode_town = $('#postcode_town').val().trim();
        //  var postcode_line1 = $('#postcode_line1').val().trim();
        //  var postcode_memo_address = $('#postcode_memo_address').val().trim();
        //

        if (OrderCustomerMobile == '') {
            $('#mobile').modal('show');
            return true;
        }
        if (postcode == '') {
            $('#post').modal('show');
            return true;
        }
        if (OrderDeliveryAddress == '') {
            $('#address').modal('show');
            return true;
        }

        // isValidated = validateEmailAddress(OrderCustomerEmail, OrderConfirmCustomerEmail);
        /*Email address validation*/

        // if (!isValidated) {
        // return true;
        // }

        // isValidated = checkEmptyFields(OrderCustomerName, 'First Name', $('#OrderCustomerName'));
        /*Checking First Name Is not Empty*/

        // if (!isValidated) {
        // return true;
        // }


        // isValidated = checkEmptyFields(OrderCustomerMobile, 'Mobile', $('#OrderCustomerMobile'));
        // Checking Mobile Is not Empty

        // if (!isValidated) {
        //     return true;
        // }


        // isValidated = checkEmptyFields(postcode, 'Post Code', $('#postcode'));
        /*Checking Post Code Is not Empty*/

        // if (!isValidated) {
        // return true;
        // }

        // isValidated = checkEmptyFields(OrderDeliveryAddress, 'Delivery Address', $('#OrderDeliveryAddress'));
        /*Checking Delivery Address Is not Empty*/

        // if (!isValidated) {
        // return true;
        // }

        /*isValidated = checkEmptyFields(transaction_card_number,'Card No',$('#transaction_card_number')); */
        /*Checking Delivery Address Is not Empty*/
        /*

         if (!isValidated) {
         return true;
         }

         isValidated = checkEmptyFields(transaction_cvv,'Security Code',$('#transaction_cvv')); */
        /*Checking Delivery Address Is not Empty*/
        /*

         if (!isValidated) {
         return true;
         }*/

        /* isValidated = checkEmptyFields(postcode_town,'Town',$('#postcode_town'));   /*Checking Town Is not Empty*/

        /* if (!isValidated) {
         return true;
         }

         isValidated = checkEmptyFields(postcode_line1,'Address line1',$('#postcode_line1')); /*Checking Line address 1 Is not Empty*/

        /* if (!isValidated) {
         return true;
         }

         isValidated = checkEmptyFields(postcode_memo_address,'Memo address',$('#postcode_memo_address')); /*Checking Memo address Is not Empty*/

        /* if (!isValidated) {
         return true;
         }
         */

        return false;

    }

    function validateEmailAddress(OrderCustomerEmail, OrderConfirmCustomerEmail) {

        if (OrderCustomerEmail == '' && OrderConfirmCustomerEmail == '') {

            displayErrorMsg("Email address must not blank!");
            $('#OrderCustomerEmail').focus();
            return false;

        } else if (OrderCustomerEmail == OrderConfirmCustomerEmail) {

            var regExp = /\S+@\S+\.\S+/;

            if (regExp.test(OrderConfirmCustomerEmail)) {

                return true;

            } else {

                displayErrorMsg('Enter valid email address!');
                return false;

            }

        } else {

            displayErrorMsg("Email address doesn't matches!");
            $('#OrderConfirmCustomerEmail').focus();
            return false;

        }

        return true;

    }

    /*Params (fieldValue,fieldLabel,focusErrorField) */
    function checkEmptyFields(fieldValue, fieldLabel, focusErrorField) {

        if (fieldValue == '') {
            displayErrorMsg(fieldLabel + ' must not be empty!');
            focusErrorField.focus();
            return false;
        }

        return true;

    }

    function displayErrorMsg(MSG) {
        alert(MSG);
    }

    $('#placeMyOrder').click(function () {

        if ($('input[name=paymentType]:radio:checked').val() == 'Card') {

            var isValidated = true;

            var transaction_card_number = $('#transaction_card_number').val().trim();
            var transaction_cvv = $('#transaction_cvv').val().trim();
            var fName = $('#fName').val().trim();
            var lName = $('#lName').val().trim();


            isValidated = checkEmptyFields(transaction_card_number, 'Card number', $('#transaction_card_number'));
            /*Checking Card Number Is not Empty*/

            if (!isValidated) {
                return false;
            }

            isValidated = checkEmptyFields(transaction_cvv, 'Security number', $('#transaction_cvv'));
            /*Checking Security Number Is not Empty*/

            if (!isValidated) {
                return false;
            }

            /*isValidated = checkEmptyFields(fName,'First Name',$('#fName')); */
            /*Checking First Name Is not Empty*/
            /*

             if (!isValidated) {
             return false;
             }

             isValidated = checkEmptyFields(lName,'Last Name',$('#lName')); */
            /*Checking Last Name Is not Empty*/
            /*

             if (!isValidated) {
             return false;
             }*/
        }


    });

});
</script>
<script>
    $(document).ready(function () {
        $('#checkoutStemNext').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 500);
        });
    });
</script>
<!-- ===================================================================================
=======================Modal=======================================================
=================================================================================== -->
<div class="modal fade" id="cardno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>**Card No**</strong> Required
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>**Card Security No**</strong> Required
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>Please accept term & condition</strong>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mobile" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>**Mobile No**</strong> Required
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>**Post code**</strong> Required
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-warning">
                    Warning Message
                </h4>
            </div>
            <div class="modal-body text-danger">
                <strong>**Order Delivery Address**</strong> Required
            </div>
        </div>
    </div>
</div>