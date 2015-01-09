<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Additionals'); ?></h6>
    </div>
    <?php //pr($additionals);?>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('price'); ?></th>
                <th><?php echo $this->Paginator->sort('food_name'); ?></th>
                <th><?php echo $this->Paginator->sort('menu_name'); ?></th>
                <th><?php echo $this->Paginator->sort('res_name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($additionals as $additional): ?>
                <tr>
                    <td><?php echo h($additional['Additional']['name']); ?>&nbsp;</td>
                    <td><?php echo h($additional['Additional']['price']); ?>&nbsp;</td>
                    <td> <a href="/foods/view/<?php echo $additional['Additional']['food_id']; ?>"><?php echo h($additional['Additional']['food_name']); ?></a>&nbsp;</td>
                   	<td> <a href="/menus/view/<?php echo $additional['Additional']['menu_id']; ?>"><?php echo h($additional['Additional']['menu_name']); ?></a>&nbsp;</td>
                    <td> <a href="/restaurants/view/<?php echo $additional['Additional']['restaurant_id']; ?>"><?php echo h($additional['Additional']['res_name']); ?></a>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $additional['Additional']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $additional['Additional']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $additional['Additional']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $additional['Additional']['name'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
