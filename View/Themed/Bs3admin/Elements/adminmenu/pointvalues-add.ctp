<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> List Point Values ',
                array('plugin' => '', 'controller' => 'pointvalues', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Restaurants ',
                array('plugin' => '', 'controller' => 'restaurants', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Restaurants ',
                array('plugin' => '', 'controller' => 'restaurants', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

