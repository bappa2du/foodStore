<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Categories'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($categories as $category): ?>
                <tr>
                    <!--		<td>--><?php //echo h($category['Category']['id']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($category['Category']['created']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($category['Category']['modified']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($category['Category']['created_by']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($category['Category']['modified_by']); ?><!--&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $category['Category']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $category['Category']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $category['Category']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
