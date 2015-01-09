<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> <?php echo __('Currency'); ?> </h2>
    </div>
    <table class="table table-striped">
        <tr>
            <td><?php echo __('Title'); ?></td>
            <td>
                <?php echo h($currency['Currency']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Code'); ?></td>
            <td>
                <?php echo h($currency['Currency']['code']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Symbol Left'); ?></td>
            <td>
                <?php echo h($currency['Currency']['symbol_left']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Symbol Right'); ?></td>
            <td>
                <?php echo h($currency['Currency']['symbol_right']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Decimal Place'); ?></td>
            <td>
                <?php echo h($currency['Currency']['decimal_place']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Value'); ?></td>
            <td>
                <?php echo h($currency['Currency']['value']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Status'); ?></td>
            <td>
                <?php echo h($currency['Currency']['status']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($currency['Currency']['created']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified'); ?></td>
            <td>
                <?php echo $this->Time->niceShort($currency['Currency']['modified']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Created By'); ?></td>
            <td>
                <?php echo h($currency['Currency']['created_by']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <td><?php echo __('Modified By'); ?></td>
            <td>
                <?php echo h($currency['Currency']['modified_by']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
<div class="related">
    <h3><?php echo __('Related Pointvalues'); ?></h3>
    <?php if(!empty($currency['Pointvalue'])): ?>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th><?php echo __('Title'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($currency['Pointvalue'] as $pointvalue): ?>
                <tr>
                    <td><?php echo $pointvalue['title']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link('<i class="icon-eye3"></i>', array('controller' => 'pointvalues', 'action' => 'view', $pointvalue['id']), array('escape' => false)); ?>
                        <?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'pointvalues', 'action' => 'edit', $pointvalue['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink('<i class="icon-cancel"></i>', array('controller' => 'pointvalues', 'action' => 'delete', $pointvalue['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $pointvalue['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- <div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pointvalue'), array('controller' => 'pointvalues', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	-->
</div>
