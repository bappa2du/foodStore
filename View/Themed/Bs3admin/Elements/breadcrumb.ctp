<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link(__('Home'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard')); ?></li>
        <!--      <li class="active">--><?php //echo $this->Html->link(__('Dashboard'), array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard')); ?><!--</li>-->
        <li class="active"><?php echo __(ucwords($this->params['controller'])); ?></li>
    </ul>
    <div class="visible-xs breadcrumb-toggle">
        <a class="btn btn-link btn-lg btn-icon" data-toggle="collapse" data-target=".breadcrumb-buttons"><i
                class="icon-menu2"></i></a>
    </div>
    <ul class="breadcrumb-buttons collapse">
        <li class="dropdown">
            <!--            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-search3"></i> <span>Search</span>-->
            <!--                <b class="caret"></b></a>-->
            <div class="popup dropdown-menu dropdown-menu-right">
                <div class="popup-header">
                    <a href="#" class="pull-left"><i class="icon-paragraph-justify"></i></a>
                    <span>Quick search</span>
                    <a href="#" class="pull-right"><i class="icon-new-tab"></i></a>
                </div>
                <form action="#" class="breadcrumb-search">
                    <input type="text" placeholder="Type and hit enter..." name="search"
                           class="form-control autocomplete">

                    <div class="row">
                        <div class="col-xs-6">
                            <label class="radio">
                                <input type="radio" name="search-option" class="styled" checked="checked">
                                Everywhere
                            </label>
                            <label class="radio">
                                <input type="radio" name="search-option" class="styled">
                                Invoices
                            </label>
                        </div>
                        <div class="col-xs-6">
                            <label class="radio">
                                <input type="radio" name="search-option" class="styled">
                                Users
                            </label>
                            <label class="radio">
                                <input type="radio" name="search-option" class="styled">
                                Orders
                            </label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block btn-success" value="Search">
                </form>
            </div>
        </li>
        <li class="language dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span> <i class="glyphicon glyphicon-cog"> </i>Actions</span> <b class="caret"></b></a>
            <?php echo $this->element('crud'); ?>
        </li>
    </ul>
</div>