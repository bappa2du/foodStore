<?php
    //debug($orders[0]); die();

    //    header("refresh: 59;");
?>
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
        color: #fff;
        padding: 6px 5px;
        transform: rotate(-12deg);
        -ms-transform: rotate(-12deg); /* IE 9 */
        -webkit-transform: rotate(-12deg);
    }

    .btnAddToCurt, .btnDeleteFromCurt {
        /*padding: 5px 10px;*/
    }

    .offerBTH h4 {
        text-align: center;
    }

    .myOrderDetailCarted td:nth-child(1), .myOrderDetailCarted td:nth-child(2) {
        padding-top: 13px;
    }

    iframe {
        border: 0px;
        width: 100%;
    }

    .mylist {
        line-height: 24px;
    }

    .mylist:hover {
        text-decoration: underline;
        color: #b20508;
        font-weight: bold;
    }
    .order-id
    {
        font-weight: bolder;
        font-size: 32px;
        border: 1px solid #FEC752;
        width: 30px;
        padding: 5px;
        border-radius: 35px;
        background-color: #FEC752;
    }
</style>

<div class="container">

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
<h1>My Previous Order Detailes</h1>

<table class="table table-bordered table-hover">

    <?php foreach($orders as $order): ?>

        <tr>
            <td>
                <div class="row">
                    <div class="col-sm-2">
                        <span class="order-id">
                            <?php echo $order['Order']['id']; ?>
                        </span>
                    </div>
                    <div class="col-sm-22">
                        <div class="row">
                            <div class="col-lg-6">
                                <strong>Date : </strong>
                                <?php echo $this->time->nice($order['Order']['created']); ?>
                                <br>
                                <strong>Customer Name : </strong>
                                <?php echo h($order['Order']['customer_name']); ?>
                                <br>
                                <strong>Customer Email : </strong>
                                <?php echo h($order['Order']['customer_email']); ?>
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <strong>Customer Mobile : </strong>
                                <?php echo h($order['Order']['customer_mobile']); ?>
                                <br>
                                <strong>Order Status : </strong>
                                <?php echo h($order['Order']['status']); ?>
                                <br>
                                <strong>Order Total Price : </strong>
                                <?php echo h($order['Order']['total_price']); ?>
                                <br>
                            </div>
                            <!--=========================================================================================================
                            =========================================== <Tappware solution> =============================================
                            ==========================================================================================================-->
                            <div class=" col-lg-6">
                                <strong>Order Item : </strong>
                                <strong class="pull-right">Order Now</strong>
                                <br>
                                <!--<a href="" class="btn btn-xs btn-success" data-toggle="modal" data-target="#<?php /*echo h($order['Order']['id']); */ ?>">View Content</a>-->

                                <?php
                                    echo "<ol>";                                                       //debug($order['Order']['restaurant_id']);die();

                                    for($i = 0; $i < count($order['OrderItem']); $i++)
                                    {
//                                                        debug($order['Order']);die();

                                        echo "<li class='mylist'>" . $order['OrderItem'][ $i ]['item_name']; ?>

                                        <span id="quantity_msg" class="form-control-static" style="display: inline;"></span>
                                        <!--                                                <a class="label label-warning pull-right" style="cursor: pointer" data-food-id="--><?php //echo $order['OrderItem'][$i]['food_id']; ?><!--" restaurant="--><?php //echo $order['Order']['restaurant_id']; ?><!--" onclick="mgs_add()">+</a>-->
                                        <button class="btn btn-success btn-xs pull-right" data-toggle="modal" data-target="#<?php echo $order['OrderItem'][ $i ]['food_id']; ?>">+</button>

                                        <span class="pull-right">&nbsp;</span>
                                        <button id="del_cart" class="btn btn-danger btn-xs btnDeleteFromCurt pull-right" style="display: none" data-food-id="<?php echo $order['OrderItem'][ $i ]['food_id']; ?>" restaurant="<?php echo $order['Order']['restaurant_id']; ?>" onclick="mgs_del()">-</button>
                                        <!--                                                <a id="del_cart" class="label label-danger" style="display: none" data-food-id="--><?php //echo $order['OrderItem'][$i]['food_id']; ?><!--" restaurant="--><?php //echo $order['Order']['restaurant_id']; ?><!--" onclick="mgs_del()">-</a>-->

                                        </li>

                                        <!-- <a href="<?php /*echo $this->webroot */ ?>restaurants/details/<?php /*echo $order['Order']['restaurant_id']; */ ?>" class="btn btn-xs btn-success" title="Help">Go to Restaurant</a>-->
                                        <!--==================MODAL============================================-->


                                        <div class="modal fade" id="<?php echo $order['OrderItem'][ $i ]['food_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                            <span class="sr-only">Close</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">
                                                            <strong style="color: #b20508">
                                                                <span class="fa fa-shopping-cart"></span>
                                                                <?php echo $order['OrderItem'][ $i ]['item_name']; ?>
                                                                <span class="label label-warning">
                                                                            <i class="fa fa-euro"></i><?php echo $order['OrderItem'][ $i ]['price']; ?>
                                                                        </span>
                                                            </strong>
                                                            &nbsp;
                                                            will add to your cart
                                                        </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <button class="btn btn-sm btn-danger pull-right"
                                                                data-dismiss="modal">Cancel Order
                                                        </button>
                                                        <button class="btn btn-sm btn-success btnAddToCurt "
                                                                data-food-id="<?php echo $order['OrderItem'][ $i ]['food_id']; ?>"
                                                                restaurant="<?php echo $order['Order']['restaurant_id']; ?>"
                                                                data-dismiss="modal" onclick="itemAddMgs()">Confirm Order
                                                        </button>
                                                        <br/>
                                                    </div>
                                                    <script>
                                                        function itemAddMgs() {

                                                            document.getElementById('item_add_mgs').style.display = 'inline';
                                                            setTimeout(function () {
                                                                $("#item_add_mgs").fadeIn("slow");
                                                            }, 2000);
                                                            setTimeout(function () {
                                                                $("#item_add_mgs").fadeOut("slow");
                                                            }, 3000);
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <!--==================MODAL CLOSE===================================================================-->

                                    <?php
                                    }
                                    echo "</ol>";

                                ?>
                                <div id="chkbtn" style="display: none">
                                    <hr/>
                                    <?php
                                        echo $this->Html->link('Go to checkout', array('controller' => 'orders', 'action' => 'checkout'), array('class' => 'btn btn-xs btn-danger', 'escape' => false, 'data-href' => Router::url(array('controller' => 'orders', 'action' => 'checkout', '?' => array('layout' => 'ajax'))), 'data-holder' => '#ajaxPage'));
                                    ?>

                                    <br/>
                                </div>
                            </div>
                            <div class="col-lg-1">
                            </div>
                            <script>
                                var x = 0;
                                function mgs_add() {
                                    document.getElementById('<?php echo $list; ?>').style.display = 'inline';
                                    document.getElementById('thank_you_m').style.display = 'none';
                                    x = x + 1;
                                    document.getElementById('quantity_msg').innerHTML = "x " + (x);
                                    if (x > 0) {
                                        document.getElementById("del_cart").disabled = false;
                                        document.getElementById("chkbtn").style.display = 'inline';
                                        document.getElementById("del_cart").style.display = 'inline';
                                    }

                                }
                                function mgs_del() {
                                    document.getElementById('<?php echo $list; ?>').style.display = 'none';
                                    document.getElementById('thank_you_m').style.display = 'inline';
                                    if (x > 0) {
                                        x = x - 1;
                                        document.getElementById('quantity_msg').innerHTML = "x " + (x);
                                        if (x == 0) {
                                            document.getElementById("del_cart").style.display = 'none';
                                            document.getElementById("chkbtn").style.display = 'none';
                                            document.getElementById('quantity_msg').innerHTML = "";
                                            document.getElementById('thank_you_m').style.display = 'none';
                                        }
                                    }

                                }
                            </script>
                            <!--=========================================================================================================
                            =========================================== <Tappware solution> =============================================
                            ==========================================================================================================-->
                            <div class="col-lg-5">
                                <strong>Action : </strong><br>
                                <?php $orderPrintUri = Router::url('/', true) . 'orders/printOrder/' . $order['Order']['id']; ?>
                                <?php $restaurantReviewUri = Router::url('/', true) . 'comments/resReview/' . $order['Order']['restaurant_id']; ?>
                                <a onclick="popUpWindow('<?php echo($orderPrintUri); ?>', 700,500);" class="btn btn-xs btn-success" id="" style="display: inline-block;">Print</a>
                                <a onclick="popUpWindow('<?php echo($restaurantReviewUri); ?>', 700,500);" class="btn btn-xs btn-success" id="" style="display: inline-block;">Review Restaurant</a>
                                <?php echo $this->html->link('View', array('action' => 'orderView', $order['Order']['id']), array('class' => 'btn btn-xs btn-success', 'target' => '_blank')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

    <div class="pull-right">
        <?php if(count($orders) >= 10): ?>
            <div class="pagination">
                <ul class="pagination">
                    <?php
                        echo $this->Paginator->prev(__('Prev'), array('tag' => 'li'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
                        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => ''));
                        echo $this->Paginator->next(__('Next'), array('tag' => 'li', 'currentClass' => 'disabled'), null, array('tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a'));
                    ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>



</div>
<p>&nbsp;</p>
<div class="container" style="display: none">
    <div class="col-md-24">
        <h1 class="title">My Orders</h1>

        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Orders'); ?>
                </h6></div>
            <div class="">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('date'); ?></th>
                        <th><?php echo $this->Paginator->sort('customer_name'); ?></th>
                        <th><?php echo $this->Paginator->sort('customer_email'); ?></th>
                        <th><?php echo $this->Paginator->sort('customer_mobile'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                        <th><?php echo $this->Paginator->sort('previous_order'); ?></th>
                        <th><?php echo $this->Paginator->sort('total_price'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $order): ?>
                        <tr>
                            <td><?php echo $this->time->nice($order['Order']['created']); ?>&nbsp;</td>
                            <td><?php echo h($order['Order']['customer_name']); ?>&nbsp;</td>
                            <td><?php echo h($order['Order']['customer_email']); ?>&nbsp;</td>
                            <td><?php echo h($order['Order']['customer_mobile']); ?>&nbsp;</td>
                            <td><?php echo h($order['Order']['status']); ?>&nbsp;</td>
                            <td><?php echo "testing"; ?>
                            </td>
                            <td><?php echo h($order['Order']['total_price']); ?>&nbsp;</td>
                            <td class="actions">
                                <?php $orderPrintUri = Router::url('/', true) . 'orders/printOrder/' . $order['Order']['id']; ?>
                                <?php $restaurantReviewUri = Router::url('/', true) . 'comments/resReview/' . $order['Order']['restaurant_id']; ?>
                                <a onclick="popUpWindow('<?php echo($orderPrintUri); ?>', 700,500);" class="btn btn-xs btn-success" id="" style="display: inline-block;">Print</a>
                                <a onclick="popUpWindow('<?php echo($restaurantReviewUri); ?>', 700,500);" class="btn btn-xs btn-success" id="" style="display: inline-block;">Review Restaurant</a>
                                <?php echo $this->html->link('View', array('action' => 'orderView', $order['Order']['id']), array('class' => 'btn btn-xs btn-success', 'target' => '_blank')); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script language="javascript">
    function popUpWindow(URLStr, width, height) {
        var left = parseInt((screen.width - width) / 2);
        var top = parseInt((screen.height - height) / 2);
        window.open(URLStr, null, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=' + width + ',height=' + height + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }

</script>
