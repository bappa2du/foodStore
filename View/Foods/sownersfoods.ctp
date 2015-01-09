<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Foods'); ?></h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($foods as $food): ?>
                <tr>
                    <td><?php echo h($food['Food']['name']); ?>&nbsp;</td>
                    <td><?php echo h($food['Food']['price']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'priceedit', $food['Food']['id']), array('escape' => false)); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
