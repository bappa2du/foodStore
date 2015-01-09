<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Package'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($package['Package']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($package['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $package['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Cusine'); ?></td>
            <td>
                <?php echo $this->Html->link($package['Cusine']['name'], array('controller' => 'cusines', 'action' => 'view', $package['Cusine']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Price'); ?></td>
            <td>
                <?php echo h($package['Package']['price']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($package['Package']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($package['Package']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($package['Package']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($package['Package']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Package Details'); ?></h3>
    <?php if(!empty($package['PackageDetail'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Package Id'); ?></th>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($package['PackageDetail'] as $packageDetail): ?>
                <tr>
                    <td><?php echo $packageDetail['package_id']; ?></td>
                    <td><?php echo $packageDetail['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'package_details', 'action' => 'view', $packageDetail['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'package_details', 'action' => 'edit', $packageDetail['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'package_details', 'action' => 'delete', $packageDetail['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $packageDetail['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Package Detail'), array('controller' => 'package_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
