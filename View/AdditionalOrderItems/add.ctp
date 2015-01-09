<div class="row">
    <?php echo $this->Form->create('AdditionalOrderItem'); ?>
    <fieldset>
        <legend><?php echo __('Add Additional Order Item'); ?></legend>
        <?php
            echo $this->Form->input('order_item_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('additional_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('price', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Additional Order Items'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Order Items'), array('controller' => 'order_items', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Additionals'), array('controller' => 'additionals', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Additional'), array('controller' => 'additionals', 'action' => 'add')); ?> </li>
    </ul>
</div>
