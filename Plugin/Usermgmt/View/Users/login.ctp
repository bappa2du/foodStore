<!-- Login wrapper -->
<p>&nbsp;</p>
<div class="container">
    <?php echo $this->element('bradecrumb', array('page' => 'login')); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="myshop-well whitebg border">
                <h1 class="title">Login</h1>

                <div class="large">
                    <p>Please enter your email address and password to sign in</p>
                </div>
                <?php
                    if($this->Session->check('Message.flash'))
                    {
                        ?>
                        <div class="alert alert-warning fade in block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <?php echo $this->Session->flash(); ?>
                        </div>
                    <?php
                    }
                    $ch = isset($checkout) ? $checkout : "";
                    echo $this->Form->create('User', array(
                        'action'        => 'login' . $ch,
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
                <?php // echo $this->Form->create('User', array ('action' => 'login', 'class' => 'form-horizontal')); ?>

                <?php
                    echo $this->Form->input('email', array(
                        'label' => array('class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "Email"
                    ));
                    echo $this->Form->input('password', array(
                        'label' => array('class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => "Password"
                    ));
                ?>

                <?php
                    if(!isset($this->request->data['User']['remember']))
                        $this->request->data['User']['remember'] = true;
                ?>
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-16">
                        <div class="checkbox">
                            <?php
                                echo $this->Form->input("remember", array("type"  => "checkbox", 'label' => false, 'div' => false, 'between' => false,
                                                                          'after' => false,))
                            ?>
                            <strong>Keep me logged in</strong><br> Leave unticked if you're on a shared computer
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-16">
                        <button type="submit" class="btn-myshop">Sign in</button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>

                <div class="form-group">
                    <div class="col-sm-offset-8 col-sm-16">
                        <?php echo $this->Html->link(__("Can't access your account?", true), "/forgotPassword", array("escape" => false)) ?>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="myshop-well">
                <h1 class="title">No account?</h1>

                <div class="large">
                    <p>Please enter your email address and password to sign in</p>
                </div>
                <?php echo $this->Html->link(__("Create an account", true), "/register", array("type" => "button", "class" => "btn-myshop", "escape" => false)) ?>
                <br>
                <br>

                <div class="large">
                    <h3>Why sign up?</h3>
                    <ul>
                        <li>Get exclusive discounts and offers by email</li>
                        <li>Save and re-order your favourite meals</li>
                        <li>Store your delivery addresses for quick and easy checkout</li>
                    </ul>
                </div>
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