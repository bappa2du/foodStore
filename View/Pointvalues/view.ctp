<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Pointvalue'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($pointvalue['Pointvalue']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Point'); ?></td>
            <td>
                <?php echo h($pointvalue['Pointvalue']['point']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Value'); ?></td>
            <td>
                <?php echo h($pointvalue['Pointvalue']['value']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Currency'); ?></td>
            <td>
                <?php echo $this->Html->link($pointvalue['Currency']['title'], array('controller' => 'currencies', 'action' => 'view', $pointvalue['Currency']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($pointvalue['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $pointvalue['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($pointvalue['Pointvalue']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($pointvalue['Pointvalue']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($pointvalue['Pointvalue']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($pointvalue['Pointvalue']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


