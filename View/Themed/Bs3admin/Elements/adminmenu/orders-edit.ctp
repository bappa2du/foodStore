<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> List orders',
                array('plugin' => '', 'controller' => 'orders', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Order Items ',
                array('plugin' => '', 'controller' => 'order_items', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Order Items ',
                array('plugin' => '', 'controller' => 'order_items', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>