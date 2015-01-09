<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Additional Foods'); ?>
        </h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('food_id'); ?></th>
                <th><?php echo $this->Paginator->sort('additional_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($additionalFoods as $additionalFood): ?>
                <tr>
                    <td><?php echo h($additionalFood['AdditionalFood']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($additionalFood['Food']['name'], array('controller' => 'foods', 'action' => 'view', $additionalFood['Food']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($additionalFood['Additional']['name'], array('controller' => 'additionals', 'action' => 'view', $additionalFood['Additional']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $additionalFood['AdditionalFood']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $additionalFood['AdditionalFood']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $additionalFood['AdditionalFood']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $additionalFood['AdditionalFood']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
