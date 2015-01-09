<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> List Categories',
                array('plugin' => '', 'controller' => 'categories', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Pages',
                array('plugin' => '', 'controller' => 'webpages', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Pages',
                array('plugin' => '', 'controller' => 'webpages', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>