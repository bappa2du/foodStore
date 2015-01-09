<div class="container">
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="row">
        <i class=" fa fa-3x fa-unlock"></i><span>Some Text</span>
    </div>
    <div class="row result">
        <div class="col-md-offset-3 col-md-6 result">
            <div class="row">&nbsp;</div>
            <div class="row logon-box">
                <form id="UserLoginForm" class="form-horizontal" accept-charset="utf-8"
                      method="post" action="/myshop/login">
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-3">
                            <h3 class="login">LOGIN FORM</h3>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputNAME" class="col-sm-2 control-label login">USERNAME</label>

                        <div class="col-sm-9 col-sm-offset-1">
                            <input type="text" placeholder="Username" class="form-control"
                                   name="data[User][username]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label login">PASSWORD</label>

                        <div class="col-sm-9 col-sm-offset-1">
                            <input type="password"
                                   placeholder="Password" class="form-control"
                                   name="data[User][password]">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success col-sm-12">login</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6">
                            <a href="#" class="forget">Forgotten your password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
</div>
