<?php
    $user = $this->UserAuth->getUser();
?>

<div class="panel panel-default">
    <?php if(empty($user)): ?>
        <!-- login-ragister -->
        <div class="panel-heading"><h3>Existing Member Login</h3></div>
        <div class="panel-body">
            <div class="form-inline">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">@</div>
                        <input name="data[User][email]" id="memberId" class="form-control" type="text" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                    <input name="data[User][password]" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <input class="btn btn-defult btn-success active" type="button" value="Login" id="login">
            </div>
        </div><!-- /bdy -->
    <?php endif; ?>
</div>