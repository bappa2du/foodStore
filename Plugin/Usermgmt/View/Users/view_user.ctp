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
<!--<div class="umtop">-->
<?php echo $this->Session->flash(); ?>
<?php echo $this->element('dashboard'); ?>
<div class="panel panel-default">
    <div class="panel-heading"><h2 class="panel-title"><i class="icon-table"></i> User Detail </h2></div>
    <!--			<div class="um_box_mid_content_top">-->
    <!--				<span class="umstyle1">--><?php //echo __('User Detail'); ?><!--</span>-->
    <!--				<span class="umstyle2" style="float:right">--><?php //echo $this->Html->link(__("Home",true),"/") ?><!--</span>-->
    <!--				<div style="clear:both"></div>-->
    <!--			</div>-->
    <div class="umhr"></div>
    <div class="um_box_mid_content_mid" id="index">
        <table cellspacing="0" cellpadding="0" width="100%" border="0" class="table table-striped">
            <tbody>
            <?php if(!empty($user))
            { ?>
                <tr>
                    <td><strong><?php echo __('User Group'); ?></strong></td>
                    <td><?php echo h($user['UserGroup']['name']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Username'); ?></strong></td>
                    <td><?php echo h($user['User']['username']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('First Name'); ?></strong></td>
                    <td><?php echo h($user['User']['first_name']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Last Name'); ?></strong></td>
                    <td><?php echo h($user['User']['last_name']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Email'); ?></strong></td>
                    <td><?php echo h($user['User']['email']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Cell Phone'); ?></strong></td>
                    <td><?php echo h($user['User']['cell_phone']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Home Phone'); ?></strong></td>
                    <td><?php echo h($user['User']['home_phone']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Fax'); ?></strong></td>
                    <td><?php echo h($user['User']['fax']) ?></td>
                </tr>

                <tr>
                    <td><strong><?php echo __('Current Address'); ?></strong></td>
                    <td><?php echo h($user['User']['current_address']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('City'); ?></strong></td>
                    <td><?php echo h($user['User']['city']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Postal'); ?></strong></td>
                    <td><?php echo h($user['User']['postal']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Country'); ?></strong></td>
                    <td><?php echo h($user['User']['country']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Permanent Address'); ?></strong></td>
                    <td><?php echo h($user['User']['permanent_address']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('National ID Number'); ?></strong></td>
                    <td><?php echo h($user['User']['national_idnumber']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('IP Address'); ?></strong></td>
                    <td><?php echo h($user['User']['ip']) ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Status'); ?></strong></td>
                    <td><?php
                            if($user['User']['active'])
                            {
                                echo 'Active';
                            } else
                            {
                                echo 'Inactive';
                            } ?>
                    </td>
                </tr>
                <tr>
                    <td><strong><?php echo __('Created'); ?></strong></td>
                    <td><?php echo date('d-M-Y', strtotime($user['User']['created'])) ?></td>
                </tr>
            <?php
            } else
            {
                echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
            } ?>
            </tbody>
        </table>
    </div>
</div>
<!--</div>-->