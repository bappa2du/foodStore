<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'edit', $currency['Currency']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add currencies ',
                array('plugin' => '', 'controller' => 'currencies', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

