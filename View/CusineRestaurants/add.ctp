<div class="row">
    <?php echo $this->Form->create('CusineRestaurant'); ?>
    <fieldset>
        <legend><?php echo __('Add Cusine Restaurant'); ?></legend>
        <?php
            echo $this->Form->input('cusine_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('restaurant_id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Cusine Restaurants'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Cusines'), array('controller' => 'cusines', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Cusine'), array('controller' => 'cusines', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
    </ul>
</div>
