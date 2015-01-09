<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Countries ',
                array('plugin' => '', 'controller' => 'countries', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

