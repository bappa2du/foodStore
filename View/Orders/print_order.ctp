
<style>
    row {
        clear: both;
        display: block;
    }
    .print-button{
        border-radius: 0px;
        background-color: #FEC752;
        color: #B20508;
        padding: 5px;
        font-weight: bold;
        border: 1px solid #E3A31B;
        cursor: pointer;
    }
    .print-button:hover{
        background-color: #C79449;
        color: #f5f5f5;
    }
    @media print {
        .print-button {
            display: none;
        }
    }
</style>
<button class="print-button" onclick="window.print()">Print This Page</button>
<br/>
<?php foreach($orders as $order): //debug($order); ?>
    Delivery:<br/>ChefGenie.co.uk<br/>
    <hr/>Order no .<?php echo h($order['Order']['id']); ?><br/>Thai Erawan<br/>629 Roundhai Road<br/>Leeds LS8
    <hr/>
<?php

//    echo "<pre>";
//    print_r($order['OrderItem']);
//    echo "</pre>";

    if(!empty($order['OrderItem'])):
        foreach($order['OrderItem'] as $orderItem):
            ?>
            <row>
                <Ltd><?php if(isset($orderItem['quantity'])) echo $orderItem['quantity']; ?> x <?php if(isset($orderItem['item_name'])) echo $orderItem['item_name']; ?></Ltd>
                <Rtd>pounds <?php if(isset($orderItem['lineItemTotal'])) echo($orderItem['lineItemTotal']); ?></Rtd>
            </row>
        <?php
        endforeach;
    endif;
    ?>
    <!--
<row>
    <Ltd>1 x no.3 Chicken Satax</Ltd>
    <Rtd>pounds 4,20</Rtd>
</row>
<row>
    <Ltd>1 x no.10 Guns Chu Pang Tod</Ltd>
    <Rtd>pounds 1,50</Rtd>
</row>
<row>
    <Ltd>1 x no.11 Guns Hom Pa</Ltd>
    <Rtd>Pounds 1.50</Rtd>
</row>
<row>
    <Ltd>1 x no.51 Gans Inman With (Beef)</Ltd>
    <Rtd>Pounds 6,95</Rtd>
</row>
<row>
    <Ltd>1 x no.45 Gans Kies Wan With (Chicken)</Ltd>
    <Rtd>Pounds 6,95</Rtd>
</row>
<row>
    <Ltd>1 x no.42 Thai Gans Oang With (Beef)</Ltd>
    <Rtd>Pounds 6,95</Rtd>
</row>
<row>
    <Ltd>3 x no.128 Khao Hom Mali</Ltd>
    <Rtd>Pounds 5,25</Rtd>
</row>-->
    <hr/>
    <row>
        <Ltd>Delivery:</Ltd>
        <Rtd>Pounds 0,00</Rtd>
    </row>
    <row>
        <Ltd>Total:</Ltd>
        <Rtd>Pounds <?php echo h($order['Order']['total_price']); ?></Rtd>
    </row>
    <hr/><b>Accepted</b>
    <hr/><b>DELIVERY -60 Minutes</b>
    <hr/>Customer info:
    <br/><?php echo $order['Order']['title'] . ' ' . $order['Order']['customer_name'] . ' ' . $order['Order']['l_name']; ?>
    <br/><?php echo h($order['Order']['delivery_address']); ?>
    <br/>Phone <?php echo h($order['Order']['customer_mobile']); ?><br/><b>Order
                                                                           NOT PAID</b>
    <hr/>Comments: <?php echo h($order['Order']['comment']); ?>
    <hr/>Requested For:<br/>ASAP 04-04-2014
    <hr/>Prey, order from customer: 13
    <hr/>ChefGenie phone no: 0814 243 7777
    <hr/>Your WWW is<br/>chefgenie.co.uk
    <hr/><br/><br/><br/><br/>Accepted to<br/>20:10 01-01-2014<br/>Cust. phone:
    <br/><?php echo h($order['Order']['customer_mobile']); ?>
<?php endforeach; ?>


<!--
<style>
    table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
    }
</style>
<div class="panel panel-default">
    <h2>Myshop</h2>

    <h3>www.chefgenie.co.uk</h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('customer_name'); ?></th>
            <th><?php echo $this->Paginator->sort('customer_email'); ?></th>
            <th><?php echo $this->Paginator->sort('customer_mobile'); ?></th>
            <th><?php echo $this->Paginator->sort('delivery_address'); ?></th>
            <th><?php echo $this->Paginator->sort('delivery_phone_number'); ?></th>
            <th><?php echo $this->Paginator->sort('total_price'); ?></th>
            <th class="actions"><?php echo __('Status'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($orders as $order): ?>
            <tr>
                <td><?php echo h($order['Order']['customer_name']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['customer_email']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['customer_mobile']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['delivery_address']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['delivery_phone_number']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['total_price']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo h($order['Order']['status']); ?>&nbsp;
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form>
        <input class="btn btn-defult btn-success active" type="button" value="Print" id="PrintThisWindow">
    </form>

</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#PrintThisWindow').bind('click', function () {
            $(this).hide();
            window.print();
        });
    });
</script>
-->