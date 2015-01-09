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
<div class="umtop">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->element('dashboard'); ?>
    <div class="um_box_up"></div>
    <div class="um_box_mid">
        <div class="um_box_mid_content">
            <div class="um_box_mid_content_top">
                <span class="umstyle1"><?php echo __('Change Password'); ?></span>
                <span class="umstyle2" style="float:right"><?php echo $this->Html->link(__("Home", true), "/") ?></span>

                <div style="clear:both"></div>
            </div>
            <div class="umhr"></div>

            <?php echo $this->Form->create('User', array('action' => 'changePassword')); ?><br/>

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
    <div class="um_box_down"></div>
</div>
<script>
    document.getElementById("UserPassword").focus();
</script>