<div class="row">
    <?php echo $this->Form->create('Currency'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Add Currency'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            //echo $this->Form->input('code',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
            echo $this->Form->input('symbol_left', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('symbol_right', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('decimal_place', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            //echo $this->Form->input('value',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
            //echo $this->Form->input('status',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
    ?></div>