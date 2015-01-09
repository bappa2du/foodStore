<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li> <?php
            echo $this->Html->link('<i class="icon-stack"></i> Dashboard ',
                array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <?php if($this->UserAuth->getGroupName() == 'Admin')
    { ?>
        <li> <?php
                echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> Add User ',
                    array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser'),
                    array('escape' => false, 'class' => '')
                );
            ?>
        </li>
        <li> <?php
                echo $this->Html->link('<i class="icon-list"></i> All Users ',
                    array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'),
                    array('escape' => false, 'class' => '')
                );
            ?>
        </li>
        <li class="divider"></li>
        <li> <?php
                echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> Add Group ',
                    array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup'),
                    array('escape' => false, 'class' => '')
                );
            ?>
        </li>
        <li> <?php
                echo $this->Html->link('<i class="icon-list"></i> All Groups ',
                    array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'),
                    array('escape' => false, 'class' => '')
                );
            ?>
        </li>
        <li class="divider"></li>
        <li> <?php
                echo $this->Html->link('<i class="icon-insert-template"></i> Permissions ',
                    array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'),
                    array('escape' => false, 'class' => '')
                );
            ?>
        </li>
    <?php } ?>


    <li class="divider"></li>
</ul>

