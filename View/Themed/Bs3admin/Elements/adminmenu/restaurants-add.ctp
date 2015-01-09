<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> List Restaurants ',
                array('plugin' => '', 'controller' => 'restaurants', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

