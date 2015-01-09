<?php $user = $this->UserAuth->getUser(); //debug($user);?>

<?php if($user['User']['user_group_id'] == 2)
{ ?>
    <p>&nbsp;</p>
    <div class="container" style="margin-top: 40px;">
        <div class="row well" style="background-color: white">
            <div class="col-md-8" style="border-left:1px solid #ddd;min-height:200px;">
                <h3>My account details</h3>
                <ul style="list-style-type: square;">
                    <li
                    <?php
                        echo $this->html->link('Account info', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editProfile'));
                    ?>
                    </li>
                    <li><?php
                            echo $this->Html->link(
                                'Change password', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editPassword'), array('class' => '')
                            );
                        ?>
                    </li>
                    <li>Address Book</li>
                    <li>Delete my Credit/Debit cards</li>
                </ul>
            </div>
            <div class="col-md-8" style="border-left:1px solid #ddd;min-height:200px;">
                <h3>My Orders</h3>
                <ul style="list-style-type: square;">
                    <li>
                        <?php
                            echo $this->html->link('Order overview', array('plugin' => '', 'controller' => 'orders', 'action' => 'orderList'));
                        ?>
                    </li>
                    <li>
                        <?php
                            echo $this->html->link('Ratings & reviews', array('plugin' => '', 'controller' => 'comments', 'action' => 'review'));
                        ?>
                    </li>
                    <li>Account credit</li>
                </ul>
            </div>
            <div class="col-md-8" style="border-left:1px solid #ddd;min-height:200px;">
                <h3>Miscellaneous</h3>
            </div>
        </div>
    </div>

<?php } ?>
