<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - <?php $settings->title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?php echo base_url('login'); ?>" class="h1"><b><?php $settings->title ?? 'Login'; ?></b></a>
      </div>
      <div class="card-body">
        <!-- alert message -->
        <?php if ($this->session->flashdata('message') != null) {  ?>
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('message');
            $this->session->unset_userdata('message'); ?>
          </div>
        <?php } ?>

        <?php if ($this->session->flashdata('exception') != null) {  ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $this->session->flashdata('exception');
            $this->session->unset_userdata('exception'); ?>
          </div>
        <?php } ?>

        <?php if (validation_errors()) {  ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo validation_errors(); ?>
          </div>
        <?php } ?>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="<?php echo base_url('login/index'); ?>" method="post">
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $user['u_email']; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password" value="<?php //echo $user['u_pass'];
                                                                                                      ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <?php echo form_dropdown('user_role', $user_role_list, 1/*$user->user_role*/, 'class="form-control" id="user_role" '); ?>
          </div>
          <div class="row">
            <div class="col-12">
              <button name="sign_in" type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>



  <!-- jQuery -->
  <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js">
  </script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>dist/js/adminlte.min.js"></script>
</body>

</html>