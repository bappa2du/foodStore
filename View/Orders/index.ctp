<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Orders'); ?></h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('customer_name'); ?></th>
                <th><?php echo $this->Paginator->sort('customer_email'); ?></th>
                <th><?php echo $this->Paginator->sort('customer_mobile'); ?></th>
                <th><?php echo $this->Paginator->sort('delivery_address'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('delivery_other_direction'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('delivery_phone_number'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('delivery_payment_type'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('delivery_type'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('delivery_time'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_type'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_payment_gatewayid'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_card_number'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_exp_date'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_card_name'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('transaction_cvv'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('total_price'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('total_discount'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('redeemed_point'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <!--		<td>--><?php //echo h($order['Order']['id']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($order['Order']['customer_name']); ?>&nbsp;</td>
                    <td><?php echo h($order['Order']['customer_email']); ?>&nbsp;</td>
                    <td><?php echo h($order['Order']['customer_mobile']); ?>&nbsp;</td>
                    <td><?php echo h($order['Order']['delivery_address']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($order['Order']['delivery_other_direction']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($order['Order']['delivery_phone_number']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($order['Order']['delivery_payment_type']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['delivery_type']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['delivery_time']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_type']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_payment_gatewayid']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_card_number']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_exp_date']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_card_name']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['transaction_cvv']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($order['Order']['total_price']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($order['Order']['total_discount']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['redeemed_point']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['created']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['modified']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['created_by']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($order['Order']['modified_by']); ?><!--&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $order['Order']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $order['Order']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $order['Order']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
