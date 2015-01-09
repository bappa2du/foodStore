<?php $_user = $this->UserAuth->getUser(); ?>
<!-- User dropdown -->
<div class="user-menu dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!--<img src="/files/user/photo/<?php /* echo $_user['User']['photo_dir'] */ ?>/<?php /* echo $_user['User']['photo'] */ ?>"  height="50" width="50" />-->
        <?php echo $this->Html->image('user_thumb.jpg', array('alt' => 'Admin')) ?>
        <div class="user-info">
            <!-- =====================================
            ===================================== -->
            <?php if(!empty($_user))
            { ?>
                <?php echo $_user['User']['first_name'] . ' ' . $_user['User']['last_name'] ?>
                <span><?php echo $_user['User']['username'] ?></span>
            <?php } ?>
            <!-- ======================================
            ====================================== -->
        </div>
    </a>

    <div class="popup dropdown-menu dropdown-menu-right">
        <div class="thumbnail">
            <div class="thumb">
                <!--<img src="/files/user/photo/<?php /* echo $_user['User']['photo_dir'] */ ?>/<?php /*echo $_user['User']['photo'] */ ?>" >-->
                <?php echo $this->Html->image('user_thumb.jpg', array('alt' => 'Admin')) ?>
                <div class="thumb-options">
									<span>
										<?php echo $this->Html->link('<i class="icon-user"></i>', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'), array('escape' => false)); ?>
										
									</span>
                </div>
            </div>
            <div class="caption text-center">
                <h6><?php echo $_user['User']['first_name'] . ' ' . $_user['User']['last_name'] ?>
                    <small><?php echo $_user['User']['username'] ?></small>
                </h6>
            </div>
        </div>
        <!--<ul class="list-group">
            <li class="list-group-item"><i class="icon-pencil3 text-muted"></i> My posts <span class="label label-success">289</span></li>
            <li class="list-group-item"><i class="icon-people text-muted"></i> Users online <span class="label label-danger">892</span></li>
            <li class="list-group-item"><i class="icon-stats2 text-muted"></i> Reports <span class="label label-primary">92</span></li>
            <li class="list-group-item"><i class="icon-stack text-muted"></i> Balance <h5 class="pull-right text-danger">$45.389</h5></li>
        </ul>-->
    </div>
</div>
