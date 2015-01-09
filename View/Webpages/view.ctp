<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Webpage'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Category'); ?></td>
            <td>
                <?php echo $this->Html->link($webpage['Category']['title'], array('controller' => 'categories', 'action' => 'view', $webpage['Category']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Restaurant'); ?></td>
            <td>
                <?php echo $this->Html->link($webpage['Restaurant']['name'], array('controller' => 'restaurants', 'action' => 'view', $webpage['Restaurant']['id'])); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Placement'); ?></td>
            <td><?php echo h($webpage['Webpage']['placement']); ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo __('Position'); ?></td>
            <td><?php echo h($webpage['Webpage']['position']); ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td><?php echo h($webpage['Webpage']['title']); ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo __('Summary'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['summary']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Htmlized  Summary'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['htmlized_ summary']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Detail'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['detail']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Htmlized Detail'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['htmlized_detail']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($webpage['Webpage']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($webpage['Webpage']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($webpage['Webpage']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>


