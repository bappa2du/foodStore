<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Food Categories'); ?></h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cusines as $cusine): ?>
                <tr>
                    <td><?php echo h($cusine['Cusine']['name']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $cusine['Cusine']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $cusine['Cusine']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $cusine['Cusine']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cusine['Cusine']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
