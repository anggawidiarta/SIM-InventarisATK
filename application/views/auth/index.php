<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <link rel="icon" href="<?php echo base_url('assets/'); ?>dist/img/imigrasi.png" alt="Imigrasi" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style type="text/css">
    body {
        background: url('<?php echo base_url(); ?>/assets/dist/img/bg_imigrasi.png') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
    }
</style>

<body>
    <div class="login-box" style="margin-top:12%;margin-bottom:12%">
        <div class="login-logo">
            <!-- <a href="<?php base_url('assets/'); ?>index2.html"><b>Admin</b>LTE</a> -->
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h4 class="login-box-msg pl-0"><b>Sistem Inventaris ATK Imigrasi Mataram</b></h4>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php echo $this->session->flashdata('msg'); ?>
                <form action="<?php base_url('auth/index'); ?>" method="post">
                    <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="varchar" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>

</body>

</html>