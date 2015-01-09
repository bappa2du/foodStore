<p>&nbsp;</p>
<div class="container">
    <div class="col-md-24">
        <?php echo $this->Form->create('User', array('action' => 'editProfile', 'type' => 'file')); ?>

        <?php echo $this->Form->input("id", array('type' => 'hidden', 'label' => false, 'div' => false)) ?>

        <?php echo $this->Form->input("username", array('label' => __('Username'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("email", array('label' => __('Email'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control required")) ?>
        <?php echo $this->Form->input("password", array("type" => "password", 'label' => __('Password'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control required")) ?>
        <?php echo $this->Form->input("cpassword", array("type" => "password", 'label' => __('Confirm Password'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control required")) ?>

        <?php echo $this->Form->input("first_name", array('label' => __('First Name'), 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("last_name", array('label' => __('Last Name'), 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control")) ?>

        <?php echo $this->Form->input("postal", array('label' => __('Postal'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("city", array('label' => __('City'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("country", array('label' => __('Country'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("fax", array('label' => __('Fax'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>

        <?php echo $this->Form->input("current_address", array('label' => __('Current Address'), 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("permanent_address", array('label' => __('Permanent Address'), 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control")) ?>

        <?php echo $this->Form->input("gender", array('label' => __('Gender'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control", 'options' => array('Male' => 'Male', 'Female' => 'Female'))) ?>
        <?php echo $this->Form->input("cell_phone", array('label' => __('Cell Phone'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("home_phone", array('label' => __('Home Phone'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
        <?php echo $this->Form->input("national_idnumber", array('label' => __('National ID'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>


        <div class="form-group col-md-12">
            <?php echo $this->Form->input('User.photo', array('type' => 'file', 'div' => false, 'class' => "btn btn-lg btn-info")); ?>
            <?php echo $this->Form->input('User.photo_dir', array('type' => 'hidden')); ?>
            <img class="thumbnail" height="150" width="150"
                 src="/files/user/photo/<?php echo $this->data['User']['photo_dir'] . '/' . $this->data['User']['photo'] ?>"/>
        </div>

        <?php echo $this->Form->input('Save', array('label' => false, 'type' => 'submit', 'div' => array('class' => 'form-group col-md-12'), 'class' => 'btn btn-lg btn-success')); ?>
        </form>
    </div>
</div>
					
