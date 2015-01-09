<div class="row">
    <?php echo $this->Form->create('PackageDetail'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Edit Package Detail'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'hidden', 'class' => 'form-control'));
            echo $this->Form->input('package_id', array('div' => array('class' => 'form-group col-md-12'), 'class' => 'form-control'));
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>
