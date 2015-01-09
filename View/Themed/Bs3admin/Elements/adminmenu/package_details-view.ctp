<ul class="dropdown-menu dropdown-menu-right icons-right">
    <li>
        <?php
            echo $this->Html->link('<i class="icon-pencil"></i> Edit Package Details ',
                array('plugin' => '', 'controller' => 'package_details', 'action' => 'edit', $packageDetail['PackageDetail']['id']),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Package Details',
                array('plugin' => '', 'controller' => 'package_details', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li class="divider"></li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-list"></i> List Packages',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'index'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
    <li>
        <?php
            echo $this->Html->link('<i class="icon-plus"></i> Add Packages',
                array('plugin' => '', 'controller' => 'packages', 'action' => 'add'),
                array('escape' => false, 'class' => '')
            );
        ?>
    </li>
</ul>