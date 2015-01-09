<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit Packages ',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'edit', $package['Package']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Packages ',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Packages ',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

