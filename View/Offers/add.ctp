<div class="row">
    <?php echo $this->Form->create('Offer'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Add Offer'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('title', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('restaurant_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control', 'empty' => 'Choose Restaurant'));
            echo $this->Form->input('food_id', array('div' => array('class' => 'form-group col-md-6'), 'class' => 'form-control', 'empty' => 'Choose Food'));
            echo $this->Form->input('discount_amount', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('discount_type', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'select', 'class' => 'form-control', 'options' => array('%' => '%', 'fixed' => 'Fixed'), 'empty' => 'Choose Discount Type'));
            //		echo $this->Form->input('discount_type',array('div' => array('class' => 'form-group col-md-12'), 'type'=>'text','class'=>'form-control'));
            echo $this->Form->input('start_date', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('end_date', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>
<script>
    $(function () {
        $('#OfferStartDate').datepicker({dateFormat: 'yy-mm-dd'}).val();
        $('#OfferEndDate').datepicker({dateFormat: 'yy-mm-dd'}).val();
    });
</script>