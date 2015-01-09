<div class="container">
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="row">
        <!--         <i class=" fa fa-3x fa-unlock"></i><span>Some Text</span> -->
    </div>
    <div class="row result">
        <div class="col-md-2">&nbsp;</div>
        <div class="col-md-8 result">
            <div class="row">&nbsp;</div>
            <div class="row logon-box">
                <?php
                    echo $this->Session->flash();
                    $data = $this->Js->get('#CustomerAddForm')->serializeForm(array('isForm' => true, 'inline' => true));
                    $this->Js->get('#CustomerAddForm')->event(
                        'submit',
                        $this->Js->request(
                            array('action' => 'add'),
                            array(
                                'data'           => $data,
                                'async'          => true,
                                'dataExpression' => true,
                                'method'         => 'POST',
                                'before'         => 'APP_HELPER_VIEW.ajax_start();',
                                'success'        => 'APP_HELPER_VIEW.ajax_stop();APP_HELPER_VIEW.loadContents(data);',
                                'error'          => 'APP_HELPER_VIEW.ajax_error(errorThrown);'
                            )
                        )
                    );
                    echo $this->Form->create('Customer', array('inputDefaults' => array('div' => false, 'error' => false), 'class' => ''));
                ?>
                <!--                <form class="" action="" method="post">-->
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-3">
                        <h3 class="login">REGISTRATION FORM</h3>
                    </div>
                </div>

                <?php echo $this->Form->input('title', array('div'     => array('class' => 'form-group col-md-2 login'), 'type' => 'select', 'class' => 'form-control',
                                                             'options' => array(
                                                                 'Mr.'   => 'Mr.',
                                                                 'Mrs.'  => 'Mrs.',
                                                                 'Miss.' => 'Miss.',
                                                                 'Ms.'   => 'Ms.'
                                                             )
                )); ?>

                <?php echo $this->Form->input('firstname', array('div' => array('class' => 'form-group col-md-4 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('firstname'); ?>

                <?php echo $this->Form->input('lastname', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('lastname'); ?>

                <?php echo $this->Form->input('email', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('email'); ?>

                <?php echo $this->Form->input('mobile', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('mobile'); ?>

                <?php echo $this->Form->input('telephone', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('telephone'); ?>

                <?php echo $this->Form->input('fax', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('fax'); ?>

                <?php echo $this->Form->input('country', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('country'); ?>

                <?php echo $this->Form->input('city', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('city'); ?>

                <?php echo $this->Form->input('address', array('div' => array('class' => 'form-group col-md-12 login'), 'type' => 'textarea', 'class' => 'form-control'));
                    echo $this->Form->error('address'); ?>

                <?php echo $this->Form->input('postal', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('postal'); ?>

                <?php echo $this->Form->input('username', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'text', 'class' => 'form-control'));
                    echo $this->Form->error('username'); ?>

                <?php echo $this->Form->input('password', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'password', 'class' => 'form-control'));
                    echo $this->Form->error('password'); ?>

                <?php echo $this->Form->input('pass', array('div' => array('class' => 'form-group col-md-6 login'), 'type' => 'password', 'class' => 'form-control'));
                    echo $this->Form->error('password'); ?>

                <?php echo $this->Form->input('Submit', array('div' => array('class' => 'form-group col-md-6 col-md-offset-3'), 'label' => false, 'type' => 'submit', 'class' => 'btn btn-success col-md-12')); ?>
                <!--                </form>-->
                <?php
                    echo $this->Form->end();
                    echo $this->Js->writeBuffer();
                ?>
            </div>
        </div>
        <div class="col-md-2">&nbsp;</div>
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
</div>