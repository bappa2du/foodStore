<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Webpages'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('category_id'); ?></th>
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('summary'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('htmlized_ summary'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('detail'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('htmlized_detail'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($webpages as $webpage): ?>
                <tr>
                    <!--		<td>--><?php //echo h($webpage['Webpage']['id']); ?><!--&nbsp;</td>-->
                    <td>
                        <?php echo $this->Html->link($webpage['Category']['title'], array('controller' => 'categories', 'action' => 'view', $webpage['Category']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($webpage['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $webpage['Restaurant']['id'])); ?>
                    </td>
                    <td><?php echo h($webpage['Webpage']['title']); ?>&nbsp;</td>
                    <!--<td><?php /*echo h($webpage['Webpage']['summary']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['htmlized_ summary']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['detail']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['htmlized_detail']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['created']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['modified']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['created_by']); */ ?>&nbsp;</td>
		<td><?php /*echo h($webpage['Webpage']['modified_by']); */ ?>&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $webpage['Webpage']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $webpage['Webpage']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $webpage['Webpage']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $webpage['Webpage']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
