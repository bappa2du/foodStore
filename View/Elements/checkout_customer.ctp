<?php
    $user      = $this->UserAuth->getUser();
    $firstName = NULL;
    $lasttName = NULL;
    $email     = NULL;
    $cellPhone = NULL;
    if(!empty($user))
    {
        $firstName = $user['User']['first_name'];
        $lasttName = $user['User']['last_name'];
        $email     = $user['User']['email'];
        $cellPhone = $user['User']['cell_phone'];
    }
?>

    <div class="panel panel-myshop">
        <div class="panel-heading">
            <h3>Checkout Customer</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group coustome-group">
                        <label for="title">Title</label>
                        <?php
                            echo $this->Form->input('title', array('options'                                   => array(
                                'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Miss.' => 'Miss.', 'Ms.' => 'Ms.'), 'label' => false, 'class' => 'form-control'));
                        ?>
                    </div>
                    <div class="form-group coustome-group">
                        <label for="firstName">First Name <span style="color:red">*</span></label>
                        <?php echo $this->Form->input('customer_name', array('label' => false, 'value' => $firstName, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group coustome-group">
                        <label for="lastName">Last Name</label>
                        <?php echo $this->Form->input('l_name', array('type' => 'text', 'label' => false, 'value' => $lasttName, 'class' => 'form-control')); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group coustome-group">
                        <label for="exampleInputEmail1">Email address <span style="color:red">*</span></label>
                        <?php echo $this->Form->input('customer_email', array('label' => false, 'value' => $email, 'class' => "form-control"
                        ));
                        ?>
                    </div>
                    <div class="form-group coustome-group">
                        <label for="exampleInputEmail1">Re-enter email address <span style="color:red">*</span></label>
                        <?php echo $this->Form->input('confirm_customer_email', array('label' => false, 'value' => $email, 'class' => 'form-control')); ?>
                    </div>
                    <div class="form-group">
                        <label for="inputMobile">Mobile <span style="color:red">*</span></label>
                        <?php echo $this->Form->input('customer_mobile', array('label' => false, 'value' => $cellPhone, 'class' => 'form-control', 'placeholder' => "+880-1xxxxxxxxx")); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    if(empty($user)):
        ?>
        <?php $baseUrl = trim(Router::url('/', true), "/"); ?>

        <script>
            $(function () {
                $('#login').click(function (e) {

                    var userName = document.getElementById('memberId').value;
                    var password = document.getElementById('exampleInputPassword1').value;
                    if (password == '' || userName == '') {
                        e.preventDefault();
                        alert('Please enter Email or Password');
                    } else {
                        var action = "<?php echo $baseUrl; ?>" + '/login?checkout=true';
                        $("#OrderCheckoutForm").attr("action", action);
                        this.form.submit();
                    }

                });
                $("#panel_search_address").hide();
            });
        </script>
    <?php

    endif;
