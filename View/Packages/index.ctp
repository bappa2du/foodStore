<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Packages'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th><?php echo $this->Paginator->sort('cusine_id'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($packages as $package): ?>
                <tr>
                    <!--		<td>--><?php //echo h($package['Package']['id']); ?><!--&nbsp;</td>-->
                    <td><?php echo h($package['Package']['title']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($package['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $package['Restaurant']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($package['Cusine']['name'], array('controller' => 'cusines', 'action' => 'view', $package['Cusine']['id'])); ?>
                    </td>
                    <td><?php echo h($package['Package']['price']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($package['Package']['created']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($package['Package']['modified']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($package['Package']['created_by']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($package['Package']['modified_by']); ?><!--&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $package['Package']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $package['Package']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $package['Package']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $package['Package']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
