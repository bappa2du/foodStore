<div class="row">
    <?php echo $this->Form->create('User', array('action' => 'addUser', 'type' => 'file')); ?>

    <?php if(count($userGroups) > 2)
    { ?>
        <?php echo $this->Form->input("user_group_id", array('type' => 'select', 'label' => __('Group'), 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control required")) ?>
    <?php } ?>

    <?php echo $this->Form->input("restaurantid", array('type' => 'select', 'options' => $restaurants, 'label' => __('Restaurant'), 'empty' => '(Choose Restaurant)', 'div' => array('class' => 'form-group col-md-6'), 'class' => "form-control required")) ?>


    <?php echo $this->Form->input("username", array('label' => __('Username'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control required")) ?>
    <?php echo $this->Form->input("email", array('label' => __('Email'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control required required")) ?>
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

    <?php echo $this->Form->input("gender", array('label' => __('Gender'), 'div' => array('class' => 'form-group col-md-3 '), 'class' => "form-control required", 'options' => array('' => 'Select One', 'Male' => 'Male', 'Female' => 'Female'))) ?>
    <?php echo $this->Form->input("cell_phone", array('label' => __('Cell Phone'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>
    <?php echo $this->Form->input("home_phone", array('label' => __('Home Phone'), 'div' => array('class' => 'form-group col-md-3'), 'class' => "form-control")) ?>


    <div class="form-group col-md-12">
        <?php echo $this->Form->input('User.photo', array('type' => 'file', 'div' => false, 'class' => "btn btn-lg btn-info")); ?>
        <?php echo $this->Form->input('User.photo_dir', array('type' => 'hidden')); ?>
    </div>

    <?php echo $this->Form->input('Save', array('label' => false, 'type' => 'submit', 'div' => array('class' => 'form-group col-md-12'), 'class' => 'btn btn-lg btn-success', 'id' => 'Save_button')); ?>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {


        $("#Save_button").on('click', function (e) {

            e.preventDefault();


            if ($('#UserAddUserForm').valid()) {

                $("#UserAddUserForm").submit();

            }
        });


    });
</script>