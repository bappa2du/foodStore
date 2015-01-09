<div class="panel panel-default">
    <div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i><?php echo __('Offers'); ?></h6></div>
    <div class="datatable">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('restaurant_id'); ?></th>
                <th><?php echo $this->Paginator->sort('food_id'); ?></th>
                <th><?php echo $this->Paginator->sort('discount_amount'); ?></th>
                <th><?php echo $this->Paginator->sort('discount_type'); ?></th>
                <th><?php echo $this->Paginator->sort('start_date'); ?></th>
                <th><?php echo $this->Paginator->sort('end_date'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($offers as $offer): ?>
                <tr>
                    <td><?php echo h($offer['Offer']['title']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($offer['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $offer['Restaurant']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($offer['Food']['name'], array('controller' => 'foods', 'action' => 'view', $offer['Food']['id'])); ?>
                    </td>
                    <td><?php echo h($offer['Offer']['discount_amount']); ?>&nbsp;</td>
                    <td><?php echo h($offer['Offer']['discount_type']); ?>&nbsp;</td>
                    <td><?php echo h($offer['Offer']['start_date']); ?>&nbsp;</td>
                    <td><?php echo h($offer['Offer']['end_date']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('action' => 'view', $offer['Offer']['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('action' => 'edit', $offer['Offer']['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('action' => 'delete', $offer['Offer']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $offer['Offer']['title'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
