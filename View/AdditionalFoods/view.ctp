<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Additional Food'); ?>
        </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Food'); ?></td>
            <td>
                <?php echo $this->Html->link($additionalFood['Food']['name'], array('controller' => 'foods', 'action' => 'view', $additionalFood['Food']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Additional'); ?></td>
            <td>
                <?php echo $this->Html->link($additionalFood['Additional']['name'], array('controller' => 'additionals', 'action' => 'view', $additionalFood['Additional']['id'])); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


