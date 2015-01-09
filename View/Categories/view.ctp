<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Category'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($category['Category']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Placement'); ?></td>
            <td><?php echo $category['Category']['placement']; ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo __('Position'); ?></td>
            <td><?php echo $category['Category']['position']; ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($category['Category']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($category['Category']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($category['Category']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($category['Category']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Webpages'); ?></h3>
    <?php if(!empty($category['Webpage'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($category['Webpage'] as $webpage): ?>
                <tr>
                    <td><?php echo $webpage['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'webpages', 'action' => 'view', $webpage['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'webpages', 'action' => 'edit', $webpage['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'webpages', 'action' => 'delete', $webpage['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $webpage['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Webpage'), array('controller' => 'webpages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
