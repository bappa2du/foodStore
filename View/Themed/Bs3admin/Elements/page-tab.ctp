<div class="tabbable page-tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-file"></i> Activity</a></li>
        <li><a href="#contacts" data-toggle="tab"><i class="icon-accessibility"></i> My contacts
                <span class="label label-danger">34</span></a></li>
        <li><a href="#tasks" data-toggle="tab"><i class="icon-grid"></i> My tasks
                <span class="label label-primary">31</span></a></li>
        <li><a href="#invoices" data-toggle="tab"><i class="icon-cart2"></i> My invoices
                <span class="label label-primary">9</span></a></li>
        <li class="pull-right dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="icon-cog3"></i>Settings <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-menu-right icons-right">
                <li><a href="#"><i class="icon-cogs"></i> This is</a></li>
                <li><a href="#"><i class="icon-grid3"></i> Dropdown</a></li>
                <li><a href="#"><i class="icon-spinner7"></i> With right</a></li>
                <li><a href="#"><i class="icon-link"></i> Aligned icons</a></li>
            </ul>
        </li>
    </ul>
    <div class="tab-content">
        <?php echo $this->element('tabs/tab1') ?>
        <?php echo $this->element('tabs/tab2') ?>
        <?php echo $this->element('tabs/tab3') ?>
        <?php echo $this->element('tabs/tab4') ?>
    </div>
</div>