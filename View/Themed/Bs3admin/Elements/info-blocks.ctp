<ul class="info-blocks">
    <li class="bg-primary">
        <div class="top-info">
            <?php echo $this->Html->link(__('Tasks'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
            <small>Task Management</small>
        </div>
        <?php echo $this->Html->link('<i class="icon-numbered-list"></i>', array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
        <span class="bottom-info bg-danger">Tass</span>
    </li>
    <li class="bg-success">
        <div class="top-info">
            <?php echo $this->Html->link(__('Users'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
            <small>User Settings</small>
        </div>
        <?php echo $this->Html->link(__('<i class="icon-user"></i>'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
        <span class="bottom-info bg-primary">Users</span>
    </li>
    <li class="bg-info">
        <div class="top-info">
            <?php echo $this->Html->link(__('Settings'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
            <small>Site Settings</small>
        </div>
        <?php echo $this->Html->link(__('<i class="icon-cogs"></i>'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
        <span class="bottom-info bg-primary">Settings</span>
    </li>
    <li class="bg-warning">
        <div class="top-info">
            <?php echo $this->Html->link(__('Tasks'), array('plugin' => '', 'controller' => 'bookings', 'action' => 'index'), array('escape' => false)); ?>
            <small>Task Management</small>
        </div>
        <?php echo $this->Html->link(__('<i class="icon-numbered-list"></i>'), array('plugin' => '', 'controller' => 'bookings', 'action' => 'index'), array('escape' => false)); ?>
        <span class="bottom-info bg-primary">Tasks</span>
    </li>
    <li class="bg-primary">
        <div class="top-info">
            <?php echo $this->Html->link(__('Users'), array('plugin' => '', 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
            <small>User Management</small>
        </div>
        <?php echo $this->Html->link(__('<i class="icon-user"></i>'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
        <span class="bottom-info bg-danger">User Management</span>
    </li>
    <li class="bg-success">
        <div class="top-info">
            <?php echo $this->Html->link(__('Sites'), array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
            <small>Site Setting</small>
        </div>
        <?php echo $this->Html->link('<i class="icon-cogs"></i>', array('plugin' => '', 'controller' => '', 'action' => ''), array('escape' => false)); ?>
        <span class="bottom-info bg-primary">Sites</span>
    </li>
</ul>