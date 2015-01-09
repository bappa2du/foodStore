<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Pointvalues'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('point'); ?></th>
                <th><?php echo $this->Paginator->sort('value'); ?></th>
                <th><?php echo $this->Paginator->sort('currency_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pointvalues as $pointvalue): ?>
                <tr>
                    <td><?php echo h($pointvalue['Pointvalue']['title']); ?>&nbsp;</td>
                    <td><?php echo h($pointvalue['Pointvalue']['point']); ?>&nbsp;</td>
                    <td><?php echo h($pointvalue['Pointvalue']['value']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($pointvalue['Currency']['title'], array('controller' => 'currencies', 'action' => 'view', $pointvalue['Currency']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $pointvalue['Pointvalue']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $pointvalue['Pointvalue']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $pointvalue['Pointvalue']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pointvalue['Pointvalue']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
