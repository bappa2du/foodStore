<!-- Main navigation -->
<?php $user = $this->UserAuth->getUser(); //debug($user);?>
<ul class="navigation">
    <li class="active"><?php echo $this->Html->link(__('<span>Dashboard</span><i class="icon-stack"></i>'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'), array('escape' => false)); ?></li>
    <?php if(!empty($user))
    { ?>
        <?php if($user['User']['user_group_id'] == 1)
    { ?>
        <li>
            <a href="#" class="expand cusines restaurants"><span>Restaurant</span> <i class="icon-yelp"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Restaurants'), array('plugin' => '', 'controller' => 'restaurants', 'action' => 'adminIndex')); ?></li>
                
            </ul>
        </li>
        <li>
            <a href="#" class="expand additionals foods menus"><span>Food</span> <i class="icon-cake"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Menus'), array('plugin' => '', 'controller' => 'menus', 'action' => 'add')); ?></li>
                <li><?php echo $this->Html->link(__('Foods'), array('plugin' => '', 'controller' => 'foods', 'action' => 'add')); ?></li>
               <!-- <li><?php //echo $this->Html->link(__('Additional Food Item'), array('plugin' => '', 'controller' => 'additionals', 'action' => 'index')); ?></li> -->
            </ul>
        </li>
        <li>
            <a href="#" class="expand orders"><span>Order</span> <i class="icon-support"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Orders'), array('plugin' => '', 'controller' => 'orders', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand offers packages package_details"><span>Package & Offer</span>
                <i class="icon-sun"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Packages'), array('plugin' => '', 'controller' => 'packages', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Package Details'), array('plugin' => '', 'controller' => 'package_details', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Offers'), array('plugin' => '', 'controller' => 'offers', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand comments"><span>Comment & Rating</span> <i class="icon-bubbles5"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Comments'), array('plugin' => '', 'controller' => 'comments', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand users user_groups "><span>User</span> <i class="icon-user"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Users'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('User Groups'), array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand comments"><span>Page</span> <i class="icon-file3"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Page Categories'), array('plugin' => '', 'controller' => 'categories', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Pages'), array('plugin' => '', 'controller' => 'webpages', 'action' => 'index')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand countries cities currencies pointvalues"><span>System Configuration</span>
                <i class="icon-cogs"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Countries'), array('plugin' => '', 'controller' => 'countries', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Cities'), array('plugin' => '', 'controller' => 'cities', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Currencies'), array('plugin' => '', 'controller' => 'currencies', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Point Values'), array('plugin' => '', 'controller' => 'pointvalues', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Food Category'), array('plugin' => '', 'controller' => 'cusines', 'action' => 'index')); ?></li>
            </ul>
        </li>
    <?php } elseif($user['User']['user_group_id'] == 7)
    { ?>
        <li>
            <a href="#" class="expand additionals foods menus"><span>Food</span> <i class="icon-cake"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Foods'), array('plugin' => '', 'controller' => 'foods', 'action' => 'sownersfoods')); ?></li>
            </ul>
        </li>
        <li>
            <a href="#" class="expand offers packages package_details"><span>Packages</span>
                <i class="icon-sun"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Packages'), array('plugin' => '', 'controller' => 'packages', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('Package Details'), array('plugin' => '', 'controller' => 'package_details', 'action' => 'index')); ?></li>
            </ul>
        </li>
    <?php } elseif($user['User']['user_group_id'] == 2)
    { ?>
        <li>
            <a href="#" class="expand additionals orders menus"><span>Orders</span> <i class="icon-cake"></i></a>
            <ul>
                <li><?php echo $this->Html->link(__('Order list'), array('plugin' => '', 'controller' => 'orders', 'action' => 'orderList')); ?></li>
            </ul>
        </li>
    <?php } ?>
    <?php } ?>
</ul>
<!-- /main navigation -->