<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Menu'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Cusine'); ?></td>
            <td>
                <?php echo $this->Html->link($menu['Cusine']['name'], array('controller' => 'cusines', 'action' => 'view', $menu['Cusine']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($menu['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $menu['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Name'); ?></td>
            <td>
                <?php echo h($menu['Menu']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Image'); ?></td>
            <td>
                <?php
                    if(strlen(trim($menu['Menu']['photo_dir'])) > 0)
                    {
                        echo $this->Html->image('/files/menu/photo/' . $menu['Menu']['id'] . '/' . $menu['Menu']['photo']);
                    } else
                    {
                        echo "<div class='alert alert-warning'>No files available</div>";
                    }
                ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($menu['Menu']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($menu['Menu']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($menu['Menu']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($menu['Menu']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Foods'); ?></h3>
    <?php if(!empty($menu['Food'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($menu['Food'] as $food): ?>
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
