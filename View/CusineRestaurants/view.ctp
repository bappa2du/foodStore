<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Cusine Restaurant'); ?>
        </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Cusine'); ?></td>
            <td>
                <?php echo $this->Html->link($cusineRestaurant['Cusine']['name'], array('controller' => 'cusines', 'action' => 'view', $cusineRestaurant['Cusine']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($cusineRestaurant['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $cusineRestaurant['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


