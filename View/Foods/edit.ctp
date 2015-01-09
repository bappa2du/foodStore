<div class="row">
    <?php echo $this->Form->create('Food', array('type' => 'file')); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Edit Food'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('restaurant_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('menu_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'list'=>'existing_foods','type' => 'text', 'class' => 'form-control'));
        ?>
        <datalist id="existing_foods">
            <?php foreach($foods as $val) { ?>
                <option value="<?php echo $val;?>"><?php echo $val;?></option>
            <?php } ?>
        </datalist>
        <?php
        echo $this->Form->input('description', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('in_store', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('quantity', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('price', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('photo', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'file', 'class' => 'form-control'));
            echo $this->Form->input('photo_dir', array('type' => 'hidden'));

            if(strlen(trim($this->data['Food']['photo_dir'])) > 0)
            {
                echo $this->Html->image('/files/food/photo/' . $this->data['Food']['id'] . '/' . $this->data['Food']['photo']);
            } else
            {
                echo "<div class='alert alert-warning'>No files available</div>";
            }
            //echo $this->Form->input('image',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
            echo $this->Form->input('rattings', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('Additional', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Food.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Food.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Foods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Offers'), array('controller' => 'offers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offer'), array('controller' => 'offers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Items'), array('controller' => 'order_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Item'), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Additionals'), array('controller' => 'additionals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Additional'), array('controller' => 'additionals', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
