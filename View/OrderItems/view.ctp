<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Order Item'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Order'); ?></td>
            <td>
                <?php echo $this->Html->link($orderItem['Order']['customer_name'], array('controller' => 'orders', 'action' => 'view', $orderItem['Order']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Food'); ?></td>
            <td>
                <?php echo $this->Html->link($orderItem['Food']['name'], array('controller' => 'foods', 'action' => 'view', $orderItem['Food']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Offer'); ?></td>
            <td>
                <?php echo $this->Html->link($orderItem['Offer']['title'], array('controller' => 'offers', 'action' => 'view', $orderItem['Offer']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Price'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Discount'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['discount']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Sale Price'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['sale_price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($orderItem['OrderItem']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($orderItem['OrderItem']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($orderItem['OrderItem']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


