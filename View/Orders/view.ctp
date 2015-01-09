<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Order'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Customer Name'); ?></td>
            <td>
                <?php echo h($order['Order']['customer_name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Customer Email'); ?></td>
            <td>
                <?php echo h($order['Order']['customer_email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Customer Mobile'); ?></td>
            <td>
                <?php echo h($order['Order']['customer_mobile']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Address'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_address']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Other Direction'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_other_direction']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Phone Number'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_phone_number']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Payment Type'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_payment_type']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Type'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_type']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Time'); ?></td>
            <td>
                <?php echo h($order['Order']['delivery_time']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Type'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_type']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Payment Gatewayid'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_payment_gatewayid']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Card Number'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_card_number']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Exp Date'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_exp_date']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Card Name'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_card_name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Transaction Cvv'); ?></td>
            <td>
                <?php echo h($order['Order']['transaction_cvv']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Total Price'); ?></td>
            <td>
                <?php echo h($order['Order']['total_price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Total Discount'); ?></td>
            <td>
                <?php echo h($order['Order']['total_discount']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Redeemed Point'); ?></td>
            <td>
                <?php echo h($order['Order']['redeemed_point']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($order['Order']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($order['Order']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($order['Order']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($order['Order']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Order Items'); ?></h3>
    <?php if(!empty($order['OrderItem'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($order['OrderItem'] as $orderItem): ?>
                <tr>
                    <td><?php echo $orderItem['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'order_items', 'action' => 'view', $orderItem['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'order_items', 'action' => 'edit', $orderItem['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $orderItem['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
