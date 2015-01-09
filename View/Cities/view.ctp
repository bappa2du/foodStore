<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('City'); ?> </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Country'); ?></td>
            <td>
                <?php echo $this->Html->link($city['Country']['name'], array('controller' => 'countries', 'action' => 'view', $city['Country']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Name'); ?></td>
            <td>
                <?php echo h($city['City']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Description'); ?></td>
            <td>
                <?php echo h($city['City']['description']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($city['City']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($city['City']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($city['City']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($city['City']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


