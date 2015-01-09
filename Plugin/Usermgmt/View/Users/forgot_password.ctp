<?php
    /*
      This file is part of UserMgmt.

      Author: Chetan Varshney (http://ektasoftwares.com)

      UserMgmt is free software: you can redistribute it and/or modify
      it under the terms of the GNU General Public License as published by
      the Free Software Foundation, either version 3 of the License, or
      (at your option) any later version.

      UserMgmt is distributed in the hope that it will be useful,
      but WITHOUT ANY WARRANTY; without even the implied warranty of
      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
      GNU General Public License for more details.

      You should have received a copy of the GNU General Public License
      along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
     */
?>




<!-- Login wrapper -->
<p>&nbsp;</p>
<div class="container">
    <?php echo $this->element('bradecrumb', array('page' => 'login')); ?>
    <div class="row">
        <div class="col-md-24">
            <div class="myshop-well whitebg border">
                <h1 class="title">Forgotten your password?</h1>

                <div class="large">
                    <p>Don't worry! Enter your login email below and we will send you an email that will enable you to restore access to your account.</p>
                </div>

                <?php if($this->Session->check('Message.flash'))
                { ?>
                    <div class="alert alert-warning fade in block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $this->Session->flash(); ?>
                    </div>
                <?php } ?>


                <div class="row">
                    <div class="col-md-12">
                        <?php
                            echo $this->Form->create('User', array(
                                'action'        => 'forgotPassword',
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
                        <?php
                            echo $this->Form->input('email', array(
                                'label' => array('text' => 'Email Address', 'class' => 'col-sm-8 control-label'), 'class' => "form-control", 'placeholder' => 'Email Address'
                            ));
                        ?>

                        <div class="form-group">
                            <div class="col-sm-offset-8 col-sm-16">
                                <button type="submit" class="btn-myshop">Send Email</button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>