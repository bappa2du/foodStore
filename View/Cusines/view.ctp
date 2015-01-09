<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Food Category'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Name'); ?></td>
            <td>
                <?php echo h($cusine['Cusine']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($cusine['Cusine']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($cusine['Cusine']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($cusine['Cusine']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($cusine['Cusine']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Menus'); ?></h3>
    <?php if(!empty($cusine['Menu']))
    { ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cusine['Menu'] as $menu): ?>
                <tr>
                    <td><?php echo $menu['name']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'menus', 'action' => 'view', $menu['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'menus', 'action' => 'edit', $menu['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'menus', 'action' => 'delete', $menu['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $menu['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else
    { ?>
        <div class='alert alert-info'>No item available</div>
    <?php } ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
    <h3><?php echo __('Related Packages'); ?></h3>
    <?php if(!empty($cusine['Package']))
    { ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cusine['Package'] as $package): ?>
                <tr>
                    <td><?php echo $package['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'packages', 'action' => 'view', $package['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'packages', 'action' => 'edit', $package['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'packages', 'action' => 'delete', $package['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $package['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else
    { ?>
        <div class='alert alert-info'>No item available</div>
    <?php } ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package'), array('controller' => 'packages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
<div class="related">
    <h3><?php echo __('Related Restaurants'); ?></h3>
    <?php if(!empty($cusine['Restaurant']))
    { ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cusine['Restaurant'] as $restaurant): ?>
                <tr>
                    <td><?php echo $restaurant['name']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'restaurants', 'action' => 'view', $restaurant['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'restaurants', 'action' => 'edit', $restaurant['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'restaurants', 'action' => 'delete', $restaurant['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $restaurant['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else
    { ?>
        <div class='alert alert-info'>No item available</div>
    <?php } ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
