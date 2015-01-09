<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Cusine Restaurants'); ?>
        </h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('cusine_id'); ?></th>
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($cusineRestaurants as $cusineRestaurant): ?>
                <tr>
                    <td><?php echo h($cusineRestaurant['CusineRestaurant']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($cusineRestaurant['Cusine']['name'], array('controller' => 'cusines', 'action' => 'view', $cusineRestaurant['Cusine']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($cusineRestaurant['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $cusineRestaurant['Restaurant']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $cusineRestaurant['CusineRestaurant']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $cusineRestaurant['CusineRestaurant']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $cusineRestaurant['CusineRestaurant']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $cusineRestaurant['CusineRestaurant']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
