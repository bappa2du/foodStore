<div class="row">
    <?php echo $this->Form->create('Order'); ?>
    <fieldset>
        <div class="col-md-12">
            <legend><?php echo __('Edit Order'); ?></legend>
        </div>
        <?php
            echo $this->Form->input('id', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'hidden', 'class' => 'form-control'));
            echo $this->Form->input('customer_name', array('div' => array('class' => 'form-group col-md-12'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('customer_email', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('customer_mobile', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_address', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('delivery_other_direction', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'textarea', 'class' => 'form-control'));
            echo $this->Form->input('delivery_phone_number', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_payment_type', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_type', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('delivery_time', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_type', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_payment_gatewayid', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_card_number', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_exp_date', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_card_name', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('transaction_cvv', array('div' => array('class' => 'form-group col-md-6'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('total_price', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('total_discount', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
            echo $this->Form->input('redeemed_point', array('div' => array('class' => 'form-group col-md-4'), 'type' => 'text', 'class' => 'form-control'));
        ?>
    </fieldset>
    <?php echo $this->Form->input(' Save ', array('label' => false, 'div' => array('class' => 'form-group col-md-12'), 'type' => 'submit', 'class' => 'btn btn-lg btn-success')); ?>
</div>
