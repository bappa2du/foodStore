<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> List Countries ',
                array('plugin' => '', 'controller' => 'countries', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> List Cities ',
                array('plugin' => '', 'controller' => 'cities', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> New Countries ',
                array('plugin' => '', 'controller' => 'cities', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

