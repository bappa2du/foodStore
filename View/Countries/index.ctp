<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Countries'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('description'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($countries as $country): ?>
                <tr>
                    <!--		<td>--><?php //echo h($country['Country']['id']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($country['Country']['name']); ?>&nbsp;</td>
                    <td><?php echo h($country['Country']['description']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($country['Country']['created']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($country['Country']['modified']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($country['Country']['created_by']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($country['Country']['modified_by']); ?><!--&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $country['Country']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $country['Country']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $country['Country']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $country['Country']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
