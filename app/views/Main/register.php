<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">

                        <div class="form-group">
                            <input type="text" id="login" name="login" placeholder="Login" class="form-control input-sm"
                                   required
                                   value="<?php echo (isset($model->login)) ? $model->login : ""; ?>"
                            >
                            <p class="help-block">Login is required</p>
                            <p class="has-error text-danger"><?php echo (isset($errors['login'])) ? $errors['login'] : ""; ?></p>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">

                                    <input type="text" id="f_name" name="f_name" placeholder="First Name"
                                           class="form-control input-sm" required
                                           value="<?php echo (isset($model->f_name)) ? $model->f_name : ""; ?>">
                                    <p class="help-block ">First Name is required</p>
                                    <p class="has-error text-danger"><?php echo (isset($errors['f_name'])) ? $errors['f_name'] : ""; ?></p>

                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" id="l_name" name="l_name" placeholder="Last Name"
                                           class="form-control input-sm"
                                           value="<?php echo (isset($model->l_name)) ? $model->l_name : ""; ?>">
                                    <p class="help-block"></p>
                                    <p class="has-error text-danger"><?php echo (isset($errors['l_name'])) ? $errors['l_name'] : ""; ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm"
                                           placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                           class="form-control input-sm" placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group ">

                                        <p class="has-error text-danger"><?php echo (isset($errors['password'])) ? $errors['password'] : ""; ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>