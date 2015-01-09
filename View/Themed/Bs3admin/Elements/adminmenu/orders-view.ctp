<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit Order',
                array('plugin' => '', 'controller' => 'orders', 'action' => 'edit', $order['Order']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Orders',
                array('plugin' => '', 'controller' => 'orders', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <!--	<li> -->
    <!--	--><?php
        //        echo $this->Html->link('<i class="icon-plus"></i> Add Order',
        //            array('plugin' => '', 'controller' => 'orders', 'action' => 'add'),
        //            array('escape' => false, 'class' => '')
        //        );
        //
    ?>
    <!--    </li>-->
</ul>

