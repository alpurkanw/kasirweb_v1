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
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.admin/css/ionicons.min.css"> -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/buttons.dataTables.min.css"> -->

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>datepick/css/bootstrap-datepicker.min.css">


</head>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view("owner/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("owner/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <?php if ($page == "index") { ?>
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header p-2">
                                    <h3 class="card-title">Laporan Pembelian </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/ClapPemb/Req"); ?>" class="form_submit " method="post">
                                        <div class="row">
                                            <div class="col">
                                                <input type="date" class="form-control" name="tgl1" value="<?= date('Y-m-d'); ?>">
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control" name="tgl2" value="<?= date('Y-m-d'); ?>">
                                            </div>
                                            <div class="col">
                                                <button class="btn btn-block btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col text-right">
                                            <!-- <a href="<?= base_url("admin/Cuser"); ?>" class="btn btn-info">Kembali</a> -->
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->

                            </div>
                        </div>
                    </div>
                <?php } else if ($page == "showdata") {
                    // print_r($trxs);
                    // return;
                    // echo count($trxs);



                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header p-1">
                                    <h4 class="card-title">Laporan Penjualan Detail</h4><br>
                                    <p><?= $tgl1_ori . " Sampai " . $tgl2_ori; ?></p>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar" class="table table-sm text-sm table-bordered table-striped table-hover " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Id nota</th>
                                                    <th>Tgl Nota</th>
                                                    <th>Kode-Nama Bar.</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (count($trxs) > 0) {
                                                    $subtotal = 0;
                                                    $grandTotal = 0;
                                                    foreach ($trxs as $key => $trx) {
                                                        $subtotal = $trx->jum_beli * $trx->harga_beli
                                                ?>
                                                        <tr role="row" class="odd">
                                                            <td><?= $no; ?></td>
                                                            <td><?= $trx->id_nota; ?></td>
                                                            <td><?= $trx->tgl_beli; ?></td>
                                                            <td><?= $trx->kode_barang . " - " . $trx->nama_barang; ?></td>
                                                            <td>Rp <?= number_format($trx->harga_beli); ?></td>
                                                            <td><?= $trx->jum_beli; ?></td>
                                                            <td>Rp <?= number_format($subtotal); ?></td>
                                                        </tr>
                                                    <?php

                                                        $no++;
                                                        $grandTotal += $subtotal;
                                                    };
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" class="text-right text-bold text-secondary bg-grey">
                                                            Total
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($grandTotal); ?>
                                                        </td>
                                                    </tr>

                                                <?php
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td colspan="8" class="text-center text-bold text-secondary bg-grey">
                                                            Data Tidak Ada
                                                        </td>
                                                    </tr>
                                                <?php
                                                } ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                <?php }; ?>





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

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url("assets/") ?>datepick/js/bootstrap-datepicker.min.js"></script>

    <!-- DataTables -->
    <!-- <script src="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/dataTables.buttons.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/jszip.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/pdfmake.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/vfs_fonts.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/buttons.html5.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/buttons.print.min.js"></script> -->


    <script>
        $(document).ready(function() {



        });
    </script>
</body>

</html>