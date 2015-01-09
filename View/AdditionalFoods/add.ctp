<div class="row">
    <?php echo $this->Form->create('AdditionalFood'); ?>
    <fieldset>
        <legend><?php echo __('Add Additional Food'); ?></legend>
        <?php
            echo $this->Form->input('food_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('additional_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Additional Foods'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Additionals'), array('controller' => 'additionals', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Additional'), array('controller' => 'additionals', 'action' => 'add')); ?> </li>
    </ul>
</div>
