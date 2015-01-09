<style>
    .form-control {
        max-width: 100%;
    }
</style>
<p>&nbsp;</p>
<div class="container">
    <?php echo $this->Session->flash(); ?>

    <div class="col-md-8 col-md-offset-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Change Password</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('User', array('action' => 'editPassword')); ?><br/>

                <div class="form-group">
                    <?php echo $this->Form->input("password", array("type" => "password", 'label' => 'Password', 'div' => false, 'class' => "form-control")) ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input("cpassword", array("type" => "password", 'label' => 'Confirm Password', 'div' => false, 'class' => "form-control")) ?>
                </div>
                <?php echo $this->Form->input(' Submit ', array('label' => false,
                                                                'div'   => array('class' => 'control-group'),
                                                                'type'  => 'submit',
                                                                'class' => 'btn btn-lg',
                ));
                ?>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("UserPassword").focus();
</script>