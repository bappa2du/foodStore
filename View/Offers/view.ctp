<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Offer'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($offer['Offer']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($offer['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $offer['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Food'); ?></td>
            <td>
                <?php echo $this->Html->link($offer['Food']['name'], array('controller' => 'foods', 'action' => 'view', $offer['Food']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Discount Amount'); ?></td>
            <td>
                <?php echo h($offer['Offer']['discount_amount']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Discount Type'); ?></td>
            <td>
                <?php echo h($offer['Offer']['discount_type']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Start Date'); ?></td>
            <td>
                <?php echo h($offer['Offer']['start_date']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('End Date'); ?></td>
            <td>
                <?php echo h($offer['Offer']['end_date']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($offer['Offer']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($offer['Offer']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($offer['Offer']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($offer['Offer']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Order Items'); ?></h3>
    <?php if(!empty($offer['OrderItem'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($offer['OrderItem'] as $orderItem): ?>
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
