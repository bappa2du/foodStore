<?php
    $mark = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-7 review-form">
            <?php echo $this->Form->create('Comment'); ?>
            <fieldset>
                <legend><?php echo __('Add your review'); ?></legend>
                <?php
                    echo $this->Form->input('comment', array('div' => array('class' => 'form-group col-md-22'), 'class' => 'form-control'));
                    echo $this->Form->input('quality_rating', array('div' => array('class' => 'form-group col-md-22'), 'type' => 'select', 'options' => $mark, 'class' => 'form-control'));
                    echo $this->Form->input('delivery_time_rating', array('div' => array('class' => 'form-group col-md-22'), 'type' => 'select', 'options' => $mark, 'class' => 'form-control'));
                    echo $this->Form->input('service_rating', array('div' => array('class' => 'form-group col-md-22'), 'type' => 'select', 'options' => $mark, 'class' => 'form-control'));
                ?>
            </fieldset>
            <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-22'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success'));
            ?>
        </div>
    </div>
</div>

