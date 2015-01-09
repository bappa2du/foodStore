<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit countries ',
                array('plugin' => '', 'controller' => 'countries', 'action' => 'edit', $country['Country']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List countries ',
                array('plugin' => '', 'controller' => 'countries', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add countries ',
                array('plugin' => '', 'controller' => 'countries', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

