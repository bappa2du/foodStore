<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Comment'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($comment['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $comment['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Food'); ?></td>
            <td>
                <?php echo $this->Html->link($comment['Food']['name'], array('controller' => 'foods', 'action' => 'view', $comment['Food']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('User'); ?></td>
            <td>
                <?php echo $this->Html->link($comment['User']['id'], array('controller' => 'users', 'action' => 'view', $comment['User']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Comment'); ?></td>
            <td>
                <?php echo h($comment['Comment']['comment']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Quality Rating'); ?></td>
            <td>
                <?php echo h($comment['Comment']['quality_rating']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Delivery Time Rating'); ?></td>
            <td>
                <?php echo h($comment['Comment']['delivery_time_rating']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Service Rating'); ?></td>
            <td>
                <?php echo h($comment['Comment']['service_rating']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($comment['Comment']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($comment['Comment']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($comment['Comment']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($comment['Comment']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


