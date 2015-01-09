<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List packages',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Restaurants',
                array('plugin' => '', 'controller' => 'restaurants', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Restaurants',
                array('plugin' => '', 'controller' => 'restaurants', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Cusines',
                array('plugin' => '', 'controller' => 'cusines', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Cusines',
                array('plugin' => '', 'controller' => 'cusines', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Package Details',
                array('plugin' => '', 'controller' => 'package_details', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Package Details',
                array('plugin' => '', 'controller' => 'package_details', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>