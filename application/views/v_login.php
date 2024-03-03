<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>ionicons.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page ">

    <div class="login-box ">
        <div class="login-logo">


            <b>
                <?= NAMA_TOKO; ?>

            </b> <br>
        </div>
        <!-- /.login-logo -->
        <?php
        echo  $this->session->flashdata('pesan');
        ?>

        <div class="card card-outline card-primary ">
            <div class="card-body login-card-body p-2">
                <p class="login-box-msg ">Log In</p>

                <form action="<?= base_url("Auth/login"); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="usernm" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row ">

                        <!-- /.col -->
                        <!-- <div class="col text-right">
                            <a href="<?= base_url("Daftar"); ?>" class="btn btn-info btn-block">Daftar</a>

                        </div> -->
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>

                        </div>
                        <!-- /.col -->
                    </div>

                </form>

            </div>
            <!-- /.login-card-body -->
            <div class="card-footer p-1">
                <p class="login-box-msg m-0">Copyright © 2022. All rights reserved.</p>

            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/"); ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/"); ?>dist/js/adminlte.min.js"></script>


</body>

</html>