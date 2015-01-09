<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">
			<i class="icon-table"></i> <?php echo __('Additional'); ?> </h2>
	</div>
	<table class="table table-striped">
		<tr>
			<td><?php echo __('Restaurant'); ?></td>
			<td>
                <a href="/restaurants/view/<?php echo $restaurant['Restaurant']['id'];?>"><?php echo h($restaurant['Restaurant']['name']);?></a>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Menu'); ?></td>
			<td>
                <a href="/menus/view/<?php echo $menu['Menu']['id'];?>"><?php echo h($menu['Menu']['name']);?></a>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Food'); ?></td>
			<td>
                <a href="/foods/view/<?php echo $food['Food']['id'];?>"><?php echo h($food['Food']['name']);?></a>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Name'); ?></td>
			<td>
                <?php echo h($additional['Additional']['name']); ?>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Price'); ?></td>
			<td>
                <?php echo h($additional['Additional']['price']); ?>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Created'); ?></td>
			<td>
                <?php echo $this->Time->niceShort($additional['Additional']['created']); ?>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td>
                <?php echo $this->Time->niceShort($additional['Additional']['modified']); ?>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Created By'); ?></td>
			<td>
                <?php echo h($additional['Additional']['created_by']); ?>
                &nbsp;
            </td>
		</tr>
		<tr>
			<td><?php echo __('Modified By'); ?></td>
			<td>
                <?php echo h($additional['Additional']['modified_by']); ?>
                &nbsp;
            </td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Additional Order Items'); ?></h3>
    <?php if(!empty($additional['AdditionalOrderItem'])): ?>
        <table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><?php echo __('Title'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($additional['AdditionalOrderItem'] as $additionalOrderItem): ?>
                <tr>
				<td><?php echo $additionalOrderItem['title']; ?></td>
				<td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'additional_order_items', 'action' => 'view', $additionalOrderItem['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'additional_order_items', 'action' => 'edit', $additionalOrderItem['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'additional_order_items', 'action' => 'delete', $additionalOrderItem['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $additionalOrderItem['id'])); ?>
                    </td>
			</tr>
            <?php endforeach; ?>
            </tbody>
	</table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Additional Order Item'), array('controller' => 'additional_order_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
	<h3><?php echo __('Related Foods'); ?></h3>
    <?php if(!empty($additional['Food'])): ?>
        <table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><?php echo __('Name'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($additional['Food'] as $food): ?>
                <tr>
				<td><?php echo $food['name']; ?></td>
				<td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'foods', 'action' => 'view', $food['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'foods', 'action' => 'edit', $food['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'foods', 'action' => 'delete', $food['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $food['id'])); ?>
                    </td>
			</tr>
            <?php endforeach; ?>
            </tbody>
	</table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
