<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login to <?= get_option('site_name'); ?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= BASE_ASSET; ?>/admin-lte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" type="text/css" href="<?= BASE_ASSET; ?>/css/main.css">

    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= BASE_ASSET; ?>/img/login-vektor.png" alt="IMG">
                    <!-- <br /><br />
                    <h3><b><?= get_option('site_name'); ?></b></h3>
                    <?= cclang('sign_to_start_your_session'); ?></p> -->
                </div>
                <?= form_open('', [
        'name'    => 'form_login', 
        'class'      => 'login100-form validate-form', 
        'id'      => 'form_login', 
        'method'  => 'POST'
      ]); ?>
                <span class="login100-form-title">
                    <img src="<?= BASE_ASSET; ?>/img/logo-olam.png" style="width: 300px;margin-bottom:25px" alt="Logo Berau Coal">
                    <b>Please <?= cclang('login'); ?></b> <?php if(isset($error) AND !empty($error)): ?>
                    <div class="callout callout-error" style="color:#C82626">
                        <h4><?= cclang('error'); ?>!</h4>
                        <p><?= $error; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php
    $message = $this->session->flashdata('f_message'); 
    $type = $this->session->flashdata('f_type'); 
    if ($message):
    ?>
                    <div class="callout callout-<?= $type; ?>" style="color:#C82626">
                        <p><?= $message; ?></p>
                    </div>
                    <?php endif; ?>
                </span>
                <div class="wrap-input100 validate-input form-group has-feedback <?= form_error('username') ? 'has-error' :''; ?>">
                    <input type="email" class="form-control input100" placeholder="Email" name="username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input form-group has-feedback <?= form_error('password') ? 'has-error' :''; ?>">
                    <input type="password" class="input100 form-control input100" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <input type="checkbox" name="remember" style="margin-left: 30px" value="1"> Remember me
                <div class="container-login100-form-btn">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="login100-form-btn btn btn-primary btn-block btn-flat"><i class="fa fa-user" style="margin-right:10px"></i> <?= cclang('sign_in'); ?></button>
                    </div>
                  <!--   <div class="container-login100-form-btn" style="margin-top:20px">
                        <div class="col-xs-12">
                            <a href="register" class="btn btn-default btn-block btn-flat"><i class="fa fa-user-plus" style="margin-right:10px"></i> or you can Register here...</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery 2.2.3 -->
    <script src="<?= BASE_ASSET; ?>/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= BASE_ASSET; ?>/admin-lte/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= BASE_ASSET; ?>/login/popper.js"></script>

    <script src="<?= BASE_ASSET; ?>/login/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="<?= BASE_ASSET; ?>/login/main.js"></script>
</body>

</html>