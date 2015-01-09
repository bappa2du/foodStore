<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Package Detail'); ?>
        </h2></div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Package'); ?></td>
            <td>
                <?php echo $this->Html->link($packageDetail['Package']['title'], array('controller' => 'packages', 'action' => 'view', $packageDetail['Package']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($packageDetail['PackageDetail']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($packageDetail['PackageDetail']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($packageDetail['PackageDetail']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($packageDetail['PackageDetail']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($packageDetail['PackageDetail']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


