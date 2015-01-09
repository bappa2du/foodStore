<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li> <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

