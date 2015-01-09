<!-- Login wrapper -->
<p>&nbsp;</p>
<div class="container">
    <?php echo $this->element('bradecrumb', array('page' => 'login')); ?>
    <div class="row">
        <div class="col-md-24">
            <div class="myshop-well whitebg border">
                <h1 class="title">Why sign up?</h1>

                <div class="large">
                    <p>Get local offers by email every week, re-order saved meals in a few clicks, store your delivery address and build a list of your favourite local takeaways.</p>
                </div>
                <br>
                <br>

                <p>Please note: input fields marked with a * are required fields.</p>
                <hr>
                <?php if($this->Session->check('Message.flash'))
                { ?>
                    <div class="alert alert-warning fade in block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $this->Session->flash(); ?>
                    </div>
                <?php } ?>
                <?php
                    echo $this->Form->create('User', array(
                        'action'        => 'register',
                        'class'         => 'form-horizontal',
                        'inputDefaults' => array(
                            'format'  => array('before', 'label', 'between', 'input', 'error', 'after'),
                            'div'     => array('class' => 'form-group has-feedback'),
                            'label'   => array('class' => 'control-label'),
                            'between' => '<div class="col-sm-16">',
                            'after'   => '</div>',
                            'error'   => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                        )));
                ?>

                <?php echo $this->Form->input("user_group_id", array('type' => 'hidden', 'label' => false, 'div' => false, 'between' => false, 'after' => false, 'value' => "2")) ?>
                <div class="row">
                    <div class="col-md-11">
                        <h3>Your details:</h3>
                        <br>
                        <?php
                            echo $this->Form->input('email', array(
                                'label' => array('text' => 'Email Address:*', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => 'Email Address'
                            ));
                            echo $this->Form->input('password', array(
                                'label' => array('text' => 'Password:*', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => 'Password'
                            ));
                            echo $this->Form->input('cpassword', array(
                                'label' => array('text' => 'Confirm password', 'class' => 'col-sm-8 control-label'), 'type' => 'password', 'class' => "form-control", 'placeholder' => 'Confirm Password'
                            ));
                            echo $this->Form->input('first_name', array(
                                'label' => array('text' => 'Name:*', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => 'Name'
                            ));
                            echo $this->Form->input('cell_phone', array(
                                'label' => array('text' => 'Phone Number:*', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => 'Phone No.'
                            ));
                        ?>
                    </div>
                    <div class="col-md-11 col-md-offset-2">
                        <h3>Delivery address:</h3>
                        <br>
                        <?php
                            //                        echo $this->Form->input('username', array (
                            //                            'label' => array ('text' => 'User name', 'class' => 'col-sm-8 control-label'), 'class' => "form-control"
                            //                        ));
                            echo $this->Form->input('current_address', array(
                                'label' => array('text' => 'Current Address', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "Present Address"
                            ));
                            echo $this->Form->input('permanent_address', array(
                                'label' => array('text' => 'Permanent Address', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "Permanent Address"
                            ));
                            echo $this->Form->input('country', array(
                                'label' => array('text' => 'Country', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "Country"
                            ));
                            echo $this->Form->input('postal', array(
                                'label' => array('text' => 'City / Postcode:*', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "City / Postcode"
                            ));
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-24">
                        <div class="form-group">
                            <div class="checkbox">
                                <?php
                                    echo $this->Form->input("remember", array("type"  => "checkbox", 'label' => false, 'div' => false, 'between' => false,
                                                                              'after' => false,))
                                ?>
                                Keep me up-to-date with local money-saving offers by email or SMS.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-24">
                        <div class="form-group">
                            <div class="checkbox">
                                <?php
                                    echo $this->Form->input("remember", array("type"  => "checkbox", 'label' => false, 'div' => false, 'between' => false,
                                                                              'after' => false,))
                                ?>
                                I accept JUST EAT's terms and conditions, including the privacy policy & cookies policy
                            </div>
                        </div>
                    </div>
                    <div class="col-md-24">
                        <div class="form-group">
                            <div class="checkbox">
                                <?php
                                    echo $this->Form->input("remember", array("type"  => "checkbox", 'label' => false, 'div' => false, 'between' => false,
                                                                              'after' => false,))
                                ?>
                                <strong>Keep me logged in</strong><br> Leave unticked if you're on a shared computer
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <button type="submit" class="btn-myshop pull-right">Create your profile</button>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('input, text').placeholder();
        $('input, textarea').placeholder();
    });
</script>