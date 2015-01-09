<div class="row">
    <?php echo $this->Form->create('Webpage'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Add Webpage'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('restaurant_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control', 'empty' => '(Choose Restaurant)',));
            echo $this->Form->input('placement', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('category_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control', 'empty' => '(Choose Category)',));
            echo $this->Form->input('position', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control'));
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('summary', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('htmlized_ summary', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('detail', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('htmlized_detail', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>