<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Currencies'); ?></h6>
    </div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo __('symbol'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($currencies as $currency): ?>
                <tr>
                    <td><?php echo h($currency['Currency']['title']); ?>&nbsp;</td>
                    <td><?php echo h($currency['Currency']['symbol_left']); ?>&nbsp;<?php echo h($currency['Currency']['symbol_right']); ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $currency['Currency']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $currency['Currency']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $currency['Currency']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $currency['Currency']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
