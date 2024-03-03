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
                                    <h3 class="card-title">Laporan Laba Rugi </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/ClapLabaRugi/lrReg"); ?>" class="form_submit " method="post">
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
                                    <h4 class="card-title">Laporan Laba Rugi</h4> <br>
                                    <h5 class="h6"> <?= $tgl1_ori . " Sampai " . $tgl2_ori; ?> </h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar" class="table table-sm text-sm table-bordered table-striped table-hover " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>KETERANGAN</th>
                                                    <th class="text-right">PENDAPPATAN</th>
                                                    <th class="text-right">PENGELUARAN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // $trx_jual_beli;
                                                // $tot_potongan;
                                                // $trx_lain;
                                                ?>
                                                <tr role="row" class="odd">
                                                    <td>1.</td>
                                                    <td>Pendapatan Penjualan</td>
                                                    <td class="text-right"><?= number_format($trx_jual_beli["total_jual"]); ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td>2.</td>
                                                    <td>Modal Barang Terjual</td>
                                                    <td></td>
                                                    <td class="text-right"><?= number_format($trx_jual_beli["total_beli"]); ?></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td>3.</td>
                                                    <td>Pendapatan Lain</td>
                                                    <td class="text-right"><?= number_format($trx_lain["pendapatan"]); ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td>4.</td>
                                                    <td>Pengeluaran Lain</td>
                                                    <td></td>
                                                    <td class="text-right"><?= number_format($trx_lain["pengeluaran"]); ?></td>
                                                </tr>
                                                <tr role="row" class="odd">
                                                    <td>5.</td>
                                                    <td>Pemberian Potongan</td>
                                                    <td></td>
                                                    <td class="text-right"><?= number_format($tot_potongan["total_pot"]); ?></td>
                                                </tr>

                                                <!-- <tr>
                                                    <td colspan="8" class="text-center text-bold text-secondary bg-grey">
                                                        Data Tidak Ada
                                                    </td>
                                                </tr> -->


                                            </tbody>
                                            <tfoot>
                                                <tr class="text-bold">
                                                    <td>

                                                    </td>
                                                    <td>
                                                        TOTAL
                                                    </td>
                                                    <td class="text-right"><?= number_format($trx_jual_beli["total_jual"] + $trx_lain["pendapatan"]); ?></td>
                                                    <td class="text-right"><?= number_format($trx_jual_beli["total_beli"] + $trx_lain["pengeluaran"] + $tot_potongan["total_pot"]); ?></td>
                                                </tr>
                                                <tr class="text-bold">

                                                    <td class="text-right" colspan="3">
                                                        KEUNTUNGAN
                                                    </td>
                                                    <td class="text-right"><?= number_format(($trx_jual_beli["total_jual"] + $trx_lain["pendapatan"]) - ($trx_jual_beli["total_beli"] + $trx_lain["pengeluaran"] + $tot_potongan["total_pot"])); ?></td>
                                                </tr>
                                            </tfoot>
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