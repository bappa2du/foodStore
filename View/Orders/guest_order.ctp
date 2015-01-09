<?php
    header("refresh: 59;");
?>

<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Order Status'); ?></h6>
    </div>
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
</div>
<div class="print">
    <?php $orderPrintUri = Router::url('/', true) . 'orders/printOrder/' . $orders[0]['Order']['id']; ?>
    <a onclick="popUpWindow('<?php echo($orderPrintUri); ?>', 700,500);" class="btn btn-success" id="" style="display: inline-block;">Print Order</a>
</div>
<script language="javascript">
    function popUpWindow(URLStr, width, height) {
        var left = parseInt((screen.width - width) / 2);
        var top = parseInt((screen.height - height) / 2);
        window.open(URLStr, null, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=' + width + ',height=' + height + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
    }
</script>