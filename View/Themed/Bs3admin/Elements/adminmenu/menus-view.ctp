<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit Menus ',
                array('plugin' => '', 'controller' => 'menus', 'action' => 'edit', $menu['Menu']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Menus ',
                array('plugin' => '', 'controller' => 'menus', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Menus ',
                array('plugin' => '', 'controller' => 'menus', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

