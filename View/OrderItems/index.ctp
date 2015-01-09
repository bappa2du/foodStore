<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Order Items'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('order_id'); ?></th>
                <th><?php echo $this->Paginator->sort('food_id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('offer_id'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('discount'); ?></th>
                <th><?php echo $this->Paginator->sort('sale_price'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th><?php echo $this->Paginator->sort('created_by'); ?></th>
                <th><?php echo $this->Paginator->sort('modified_by'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($orderItems as $orderItem): ?>
                <tr>
                    <td><?php echo h($orderItem['OrderItem']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($orderItem['Order']['customer_name'], array('controller' => 'orders', 'action' => 'view', $orderItem['Order']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($orderItem['Food']['name'], array('controller' => 'foods', 'action' => 'view', $orderItem['Food']['id'])); ?>
                    </td>
                    <td><?php echo h($orderItem['OrderItem']['title']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($orderItem['Offer']['title'], array('controller' => 'offers', 'action' => 'view', $orderItem['Offer']['id'])); ?>
                    </td>
                    <td><?php echo h($orderItem['OrderItem']['price']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['discount']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['sale_price']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['created']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['modified']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['created_by']); ?>&nbsp;</td>
                    <td><?php echo h($orderItem['OrderItem']['modified_by']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $orderItem['OrderItem']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $orderItem['OrderItem']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $orderItem['OrderItem']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $orderItem['OrderItem']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
