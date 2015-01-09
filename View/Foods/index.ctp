<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Foods'); ?></h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th><?php echo $this->Paginator->sort('menu_id'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('rattings'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($foods as $food): ?>
                <tr>
                    <td><?php echo h($food['Food']['name']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($food['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $food['Restaurant']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($food['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $food['Menu']['id'])); ?>
                    </td>
                    <td><?php echo h($food['Food']['price']); ?>&nbsp;</td>
                    <td><?php echo h($food['Food']['rattings']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $food['Food']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $food['Food']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $food['Food']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $food['Food']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
