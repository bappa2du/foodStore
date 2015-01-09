<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title">
            <i class="icon-table"></i> <?php echo __('Additional Order Item'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Order Item'); ?></td>
            <td>
                <?php echo $this->Html->link($additionalOrderItem['OrderItem']['title'], array('controller' => 'order_items', 'action' => 'view', $additionalOrderItem['OrderItem']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Additional'); ?></td>
            <td>
                <?php echo $this->Html->link($additionalOrderItem['Additional']['name'], array('controller' => 'additionals', 'action' => 'view', $additionalOrderItem['Additional']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($additionalOrderItem['AdditionalOrderItem']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Price'); ?></td>
            <td>
                <?php echo h($additionalOrderItem['AdditionalOrderItem']['price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($additionalOrderItem['AdditionalOrderItem']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($additionalOrderItem['AdditionalOrderItem']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($additionalOrderItem['AdditionalOrderItem']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($additionalOrderItem['AdditionalOrderItem']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


