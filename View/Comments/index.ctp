<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Comments'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <!--			<th>--><?php //echo $this->Paginator->sort('id'); ?><!--</th>-->
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th><?php echo $this->Paginator->sort('food_id'); ?></th>
                <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                <th><?php echo $this->Paginator->sort('comment'); ?></th>
                <th><?php echo $this->Paginator->sort('quality_rating'); ?></th>
                <th><?php echo $this->Paginator->sort('delivery_time_rating'); ?></th>
                <th><?php echo $this->Paginator->sort('service_rating'); ?></th>
                <!--			<th>--><?php //echo $this->Paginator->sort('created'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('created_by'); ?><!--</th>-->
                <!--			<th>--><?php //echo $this->Paginator->sort('modified_by'); ?><!--</th>-->
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($comments as $comment): ?>
                <tr>
                    <!--		<td>--><?php //echo h($comment['Comment']['id']); ?><!--&nbsp;</td>-->
                    <td>
                        <?php echo $this->Html->link($comment['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $comment['Restaurant']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($comment['Food']['name'], array('controller' => 'foods', 'action' => 'view', $comment['Food']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($comment['User']['id'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
                    </td>
                    <td><?php echo h($comment['Comment']['comment']); ?>&nbsp;</td>
                    <td><?php echo h($comment['Comment']['quality_rating']); ?>&nbsp;</td>
                    <td><?php echo h($comment['Comment']['delivery_time_rating']); ?>&nbsp;</td>
                    <td><?php echo h($comment['Comment']['service_rating']); ?>&nbsp;</td>
                    <!--		<td>--><?php //echo h($comment['Comment']['created']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($comment['Comment']['modified']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($comment['Comment']['created_by']); ?><!--&nbsp;</td>-->
                    <!--		<td>--><?php //echo h($comment['Comment']['modified_by']); ?><!--&nbsp;</td>-->
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $comment['Comment']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $comment['Comment']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $comment['Comment']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $comment['Comment']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
