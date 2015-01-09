<div class="row">
    <?php echo $this->Form->create('City'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Edit City'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'hidden', 'class' => 'form-control'));
            echo $this->Form->input('country_id', array('div' => array('class' => 'form-group col-md-12'), 'class' => 'form-control'));
            echo $this->Form->input('name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('description', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'textarea', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>
