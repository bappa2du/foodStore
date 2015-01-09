<div class="row">
    <?php echo $this->Form->create('Pointvalue'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Add Pointvalue'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('point', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('value', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('currency_id', array('div' => array('class' => 'form-group col-md-12'), 'class' => 'form-control'));
            //echo $this->Form->input('restaurant_id',array('div' => array('class' => 'form-group col-md-12'),'class'=>'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>
