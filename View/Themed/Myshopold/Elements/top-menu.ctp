<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header coustomr-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->link('MyShop', '/', array('title' => 'MyShop', 'class' => 'navbar-brand'), null, null, false); ?>
            <!--===================search box==================-->
            <div class="input-group navbar-toggle coustome" data-toggle="collapse" data-target=".navbar-collapse">
                <input type="text" class="form-control input-large " title="eg. SW6 6LG" type="search" placeholder="e.g. SW6 6LG" maxlength="8" onLoad="this.focus();" id="post-code-input-top" name='s[p]'>
                <input name="s[sd]" type="hidden" value="0" id="ajax-search"/>
            <span class="input-group-btn">
                <button class="btn btn-success input-large" type="button" value="find takeaways" name="find takeaways" id="cta-homepage-top">Find Takeaways</button>                
            </span>
            </div>
            <script>
                $(function () {
                    $("#cta-homepage-top").click(function () {
                        var postcode = $("#post-code-input-yop").val();
                        APP_HELPER_VIEW.ajaxSubmitDataCallback('stores/view/' + postcode, '', function (data) {
                            $('#homeBanner').hide();
                            $("#ajax-view-content").html(data);
                        });


                    });
                });
            </script>
            <!--===================/search box==================-->
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <!-- <li><a href='<?php //echo $this->webroot."/dashboard/changetheme/old" ?>'><span>Theme V1 </span></a></li> -->
                <li class='menu-ajax'><a href=' #dashboard/index'><span>Home</span></a></li>
                <li class='menu-ajax'><a href=' #stores/view'><span>My Order</span></a></li>

                <?php if(!empty($role))
                { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo $user['username'] ?>
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                            <li><a href=' #/users/change_password'><span>Change Password</span></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->webroot ?>logout"><span>Logout</span></a></li>
                        </ul>
                    </li>

                <?php } else
                { ?>
                    <li class='last menu-ajax'><a href=' #users/login'><span>Login</span></a></li>
                    <li class='last menu-ajax'><a href=' #Customers/add'><span>Register</span></a></li>
                <?php } ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>