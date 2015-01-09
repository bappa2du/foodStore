<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit Cities ',
                array('plugin' => '', 'controller' => 'cities', 'action' => 'edit', $city['City']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List cities ',
                array('plugin' => '', 'controller' => 'cities', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Cities ',
                array('plugin' => '', 'controller' => 'cities', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

