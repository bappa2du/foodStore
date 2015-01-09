<div class="row">
    <?php echo $this->Form->create('OrderItem'); ?>
    <fieldset>
        <legend><?php echo __('Add Order Item'); ?></legend>
        <?php
            echo $this->Form->input('order_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('food_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('offer_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('price', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('discount', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('sale_price', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Order Items'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Offers'), array('controller' => 'offers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Offer'), array('controller' => 'offers', 'action' => 'add')); ?> </li>
    </ul>
</div>
