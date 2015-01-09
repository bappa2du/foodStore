<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Food'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($food['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $food['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Menu'); ?></td>
            <td>
                <?php echo $this->Html->link($food['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $food['Menu']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Name'); ?></td>
            <td>
                <?php echo h($food['Food']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Description'); ?></td>
            <td>
                <?php echo h($food['Food']['description']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('In Store'); ?></td>
            <td>
                <?php echo h($food['Food']['in_store']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Quantity'); ?></td>
            <td>
                <?php echo h($food['Food']['quantity']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Price'); ?></td>
            <td>
                <?php echo h($food['Food']['price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Image'); ?></td>
            <td>
                <?php
                    if(strlen(trim($food['Food']['photo_dir'])) > 0)
                    {
                        echo $this->Html->image('/files/food/photo/' . $food['Food']['id'] . '/' . $food['Food']['photo']);
                    } else
                    {
                        echo "<div class='alert alert-warning'>No files available</div>";
                    }
                ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Rattings'); ?></td>
            <td>
                <?php echo h($food['Food']['rattings']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($food['Food']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($food['Food']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($food['Food']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($food['Food']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Comments'); ?></h3>
    <?php if(!empty($food['Comment'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Comment'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($food['Comment'] as $comment): ?>
                <tr>
                    <td><?php echo $comment['comment']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'comments', 'action' => 'view', $comment['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'comments', 'action' => 'edit', $comment['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $comment['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
    <h3><?php echo __('Related Offers'); ?></h3>
    <?php if(!empty($food['Offer'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($food['Offer'] as $offer): ?>
                <tr>
                    <td><?php echo $offer['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'offers', 'action' => 'view', $offer['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'offers', 'action' => 'edit', $offer['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'offers', 'action' => 'delete', $offer['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $offer['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Offer'), array('controller' => 'offers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
    <h3><?php echo __('Related Order Items'); ?></h3>
    <?php if(!empty($food['OrderItem'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($food['OrderItem'] as $orderItem): ?>
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
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
    <h3><?php echo __('Related Additionals'); ?></h3>
    <?php if(!empty($food['Additional'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($food['Additional'] as $additional): ?>
                <tr>
                    <td><?php echo $additional['name']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'additionals', 'action' => 'view', $additional['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'additionals', 'action' => 'edit', $additional['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'additionals', 'action' => 'delete', $additional['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $additional['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Additional'), array('controller' => 'additionals', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
