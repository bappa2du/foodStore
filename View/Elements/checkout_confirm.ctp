<div class="panel panel-myshop">
    <div class="panel-heading">
        <h3>Checkout Confirm</h3>
    </div>
    <div class="panel-body">
        <div style="width:67%; float:left; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <td> Ordering From</td>
                            <td id="customerName"> &nbsp; </td>
                        </tr>
                        <tr>
                            <td>Paying With</td>
                            <td> Cash</td>
                        </tr>
                        <tr>
                            <td>Deliver To</td>
                            <td id="deleverTo">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td id="deleveryContact">
                                &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="width:33%; float:left; position: relative; min-height: 1px; padding-left: 5px; padding-right: 5px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <!--<button type="button" class="btn btn-success btn-sm coustome-button pull-right" onclick="ConfirmOrder();">Confirm <i class="glyphicon glyphicon-chevron-right"></i> </button>-->
                    <h3>Order Detail</h3>
                </div>
                <div class="panel-body">
                    <div id="cartContentConfirm">
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            OrderObj.updateCartCOnfirm('display', '', '<?php echo $restaurant['Restaurant']['id']; ?>');
                        });
                    </script>
                    <table class="table table-hover deliveryChargePanel">
                        <tr>
                            <td>
                                Delivery Charge
                            </td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>
                                <b> Total Pay </b>
                            </td>
                            <td id="totalPayable">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
