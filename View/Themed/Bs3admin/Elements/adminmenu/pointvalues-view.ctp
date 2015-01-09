<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit pointvalues ',
                array('plugin' => '', 'controller' => 'pointvalues', 'action' => 'edit', $pointvalue['Pointvalue']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List pointvalues ',
                array('plugin' => '', 'controller' => 'pointvalues', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add pointvalues ',
                array('plugin' => '', 'controller' => 'pointvalues', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>

