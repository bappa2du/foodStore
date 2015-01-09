<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Country'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Name'); ?></td>
            <td>
                <?php echo h($country['Country']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Description'); ?></td>
            <td>
                <?php echo h($country['Country']['description']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($country['Country']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($country['Country']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($country['Country']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($country['Country']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Cities'); ?></h3>
    <?php if(!empty($country['City'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Name'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($country['City'] as $city): ?>
                <tr>
                    <td><?php echo $city['name']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'cities', 'action' => 'view', $city['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'cities', 'action' => 'edit', $city['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'cities', 'action' => 'delete', $city['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $city['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">No data available</div>
    <?php endif; ?>
    <!-- <div class="actions">
		<ul>
<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
</ul>
</div>
-->
</div>