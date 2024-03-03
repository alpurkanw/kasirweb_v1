<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.admin/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
        $data["tes"] = 0;
        // $this->load->view('path');
        $this->load->view("kasir/Tmp_navbar_top", $data); ?>
        <!-- /.navbar -->

        <?php
        $data["tes1"] = 0;
        // $this->load->view('path');
        $this->load->view("kasir/Tmp_side_menu", $data); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->




                <!-- Outer Row -->
                <div class="row ">

                    <div class="col-xl-12 col-lg-12 col-md-9">

                        <div class="card  card-outline card-primary shadow mb-1">

                            <div class="card-body m-1 p-1">
                                <!-- Nested Row within Card Body -->

                                <div class="row mb-2 ml-2 mb-0 pb-0">
                                    <div class="col-12 ">
                                        <h5 class="card-title m-0 p-0">Cari Barang</h5>
                                    </div>
                                </div>
                                <hr class="m-0 mt-0">
                                <div class="row m-1">
                                    <div class="col-12 ">
                                        Selamat Datang <?= $_SESSION["nama"]; ?>
                                        <!-- <form class="user" action="<?= base_url("karyw/Home/cariBar"); ?>" method="POST">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Masukan Nama Barang/Kode Barang" name="keywordnya" value="<?= isset($result) ? $keywordnya : ""; ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit" id="button-addon2" name="cariBarang"><i class="fas fa-search"></i> Search</button>
                                                    <a href="<?= base_url(); ?>" class="btn btn-secondary">Kembali</a>
                                                </div>
                                            </div>

                                        </form> -->
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <?php if (isset($result)) { ?>
                    <div class="row ">

                        <div class="col-xl-12 col-lg-12 col-md-9">

                            <div class="card card-outline card-primary  shadow my-2 ">
                                <div class="card-body ">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row mb-2 ml-2 mb-0 pb-0">
                                        <div class="col-12 ">
                                            <h5 class="card-title m-0 p-0">Hasil Pencarian (<?= count($brgs); ?> Item Barang)</h5>
                                        </div>
                                    </div>
                                    <hr class="m-0 mt-0">
                                    <div class="row">
                                        <?php if (count($brgs) == 0) {
                                            echo '<div class="row mb-2 ml-2 mb-0 pb-0">
                                    <div class="col-12 ">
                                        <h5 class="m-0 p-0">DATA TIDAK DITEMUKAN</h5>
                                    </div>
                                </div>';
                                        } else { ?>
                                            <table class="table table-hover table-striped table-responsive-lg  ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Kode Barang/Nama barang</th>
                                                        <th scope="col">Stok</th>
                                                        <th scope="col">Harga</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $i = 1;
                                                    foreach ($brgs as $brg) { ?>
                                                        <tr>
                                                            <th><?= $i; ?></th>
                                                            <td><?= $brg->id . " - " . $brg->namabar; ?></td>
                                                            <td><?= $brg->jum_stok; ?></td>
                                                            <td>Rp. <?= number_format($brg->harga_jual); ?></td>
                                                        </tr>
                                                    <?php $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php } ?>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script>
</body>

</html>