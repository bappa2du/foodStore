<?php $user = $this->UserAuth->getUser(); //debug($user);?>

<ul class="info-blocks">
    <?php if($user['User']['user_group_id'] == 1)
    { ?>
        <li class="bg-info">
            <div class="top-info">
                <?php echo $this->Html->link(__('RESTAURANTS'), array('plugin' => '', 'controller' => 'restaurants', 'action' => 'index'), array('escape' => false)); ?>
                <small>Restaurant Information</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-yelp"></i>'), array('plugin' => '', 'controller' => 'restaurants', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">RESTAURANTS</span>
        </li>

        <li class="bg-warning">
            <div class="top-info">
                <?php echo $this->Html->link(__('FOODS'), array('plugin' => '', 'controller' => 'foods', 'action' => 'index'), array('escape' => false)); ?>
                <small>Food Information</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-cake"></i>'), array('plugin' => '', 'controller' => 'foods', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">FOODS</span>
        </li>

        <li class="bg-primary">
            <div class="top-info">
                <?php echo $this->Html->link(__('ORDERS'), array('plugin' => '', 'controller' => 'orders', 'action' => 'index'), array('escape' => false)); ?>
                <small>Manage Orders</small>
            </div>
            <?php echo $this->Html->link('<i class="icon-support"></i>', array('plugin' => '', 'controller' => 'orders', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-danger">ORDERS</span>
        </li>

        <li class="bg-success">
            <div class="top-info">
                <?php echo $this->Html->link(__('PACKAGES'), array('plugin' => '', 'controller' => 'packages', 'action' => 'index'), array('escape' => false)); ?>
                <small>Manage Packages</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-sun"></i>'), array('plugin' => '', 'controller' => 'packages', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">PACKAGES</span>
        </li>

        <li class="bg-warning">
            <div class="top-info">
                <?php echo $this->Html->link(__('COMMENTS'), array('plugin' => '', 'controller' => 'foods', 'action' => 'index'), array('escape' => false)); ?>
                <small>Comments & Ratings</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-bubbles5"></i>'), array('plugin' => '', 'controller' => 'foods', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">COMMENTS</span>
        </li>

        <li class="bg-primary">
            <div class="top-info">
                <?php echo $this->Html->link(__('User'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
                <small>User Management</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-user"></i>'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-danger">USERS</span>
        </li>

        <li class="bg-info">
            <div class="top-info">
                <?php echo $this->Html->link(__('PAGES'), array('plugin' => '', 'controller' => 'webpages', 'action' => 'index'), array('escape' => false)); ?>
                <small>Pages Information</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-file3"></i>'), array('plugin' => '', 'webpages' => 'comments', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">PAGES</span>
        </li>

        <li class="bg-success">
            <div class="top-info">
                <?php echo $this->Html->link(__('SYSTEM'), array('plugin' => '', 'controller' => 'countries', 'action' => 'index'), array('escape' => false)); ?>
                <small>System Configuration</small>
            </div>
            <?php echo $this->Html->link('<i class="icon-cogs"></i>', array('plugin' => '', 'controller' => 'countries', 'action' => 'index'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">SYSTEM</span>
        </li>
    <?php } else
    { ?>

        <li class="bg-warning">
            <div class="top-info">
                <?php echo $this->Html->link(__('Orders'), array('plugin' => '', 'controller' => 'orders', 'action' => 'orderList'), array('escape' => false)); ?>
                <small>Order List</small>
            </div>
            <?php echo $this->Html->link(__('<i class="icon-cake"></i>'), array('plugin' => '', 'controller' => 'orders', 'action' => 'orderList'), array('escape' => false)); ?>
            <span class="bottom-info bg-primary">Orders</span>
        </li>

    <?php } //debug($user);?>
</ul>