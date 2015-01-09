<div class="row">
    <?php echo $this->Form->create('Menu', array('type' => 'file')); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Edit Menu'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('cusine_id', array('label' => 'Food Category','div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('restaurant_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('photo', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'file', 'class' => 'form-control'));
            echo $this->Form->input('photo_dir', array('type' => 'hidden'));

            if(strlen(trim($this->data['Menu']['photo_dir'])) > 0)
            {
                echo $this->Html->image('/files/menu/photo/' . $this->data['Menu']['id'] . '/' . $this->data['Menu']['photo']);
            } else
            {
                echo "<div class='alert alert-warning'>No files available</div>";
            }
            //echo $this->Form->input('image',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Menu.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Menu.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cusines'), array('controller' => 'cusines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cusine'), array('controller' => 'cusines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Restaurants'), array('controller' => 'restaurants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Restaurant'), array('controller' => 'restaurants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Foods'), array('controller' => 'foods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Food'), array('controller' => 'foods', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
