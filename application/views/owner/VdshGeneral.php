<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title><?= $judul; ?></title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header bg-dark navbar navbar-expand-md navbar-dark navbar-white">
            <div class="container">
                <a href="<?= base_url("assets/") ?>index3.html" class="navbar-brand">
                    <!-- <img src="<?= base_url("assets/") ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <span class="brand-text font-weight-light"><?= NAMA_TOKO; ?></span>
                </a>

                <!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>

                    </ul> -->

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <a href="<?= base_url() ?>" class="nav-link">Kembali</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="#" class="dropdown-item">Some action </a></li>
                            <li><a href="#" class="dropdown-item">Some other action</a></li>

                            <li class="dropdown-divider"></li>

                            <li><a href="#" class="dropdown-item">Some other action</a></li>

                        </ul>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-2">

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <!-- 

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Hari ini <?= date('d-m-Y'); ?></h5>
                        </div>
                        <div class="card-body">

                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col ">
                            <h5>Hari ini <?= date('d-m-Y'); ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body p-2 pb-1">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Penjualan(omset)</span>

                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_jual_beli["total_jual"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Modal Penjualan</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_jual_beli["total_beli"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Margin</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_jual_beli["total_jual"] - $trx_jual_beli["total_beli"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pemberian Potongan</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($tot_potongan["total_pot"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pendapatan lain</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_lain["pendapatan"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pengeluaran lain</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_lain["pengeluaran"]); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="card-body p-2 pb-1">
                                    <div class="row">


                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Total Piutang</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($ret_total_piutang[0]->tot_piutang); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>


                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Piutang Hari ini</span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($piutang_today[0]->tot_piutang); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <div class="info-box bg-gradient-info">
                                                <span class="info-box-icon"><i class="fa fa-dollar-sign"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">Pemb. Piutang Hari ini </span>
                                                    <span class="info-box-number">Rp
                                                        <?= number_format($trx_piutang_today[0]->tot_bayar); ?></span>

                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-info ">
                                <div class="card-header p-2">
                                    <strong>Omset Per Kasir</strong>
                                </div>
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col">
                                            <canvas id="donutChart" style="min-height: 150px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 1045px;" width="1045" height="250" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <table class="table m-0 table-sm ">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th class="text-right">Omset</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // print_r($omset_perUser);
                                                    $total_omset = 0;
                                                    $g_total_omset = [];
                                                    if ($omset_perUser !== 0) {
                                                        foreach ($omset_perUser as $key => $val_user) {
                                                    ?>
                                                            <tr>
                                                                <td><?= $val_user->nama_user; ?></td>
                                                                <td class="text-right"><span>Rp.
                                                                        <?= number_format($val_user->grand_total); ?></span>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $users[] = $val_user->nama_user;
                                                            $g_total_omset[] = $val_user->grand_total;
                                                            $total_omset += $val_user->grand_total;
                                                        };
                                                    }
                                                    ?>


                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2" class="text-right"><span class="badge badge-btn badge- badge-info ">
                                                                <h5 class="mb-1">Rp.
                                                                    <?= number_format($total_omset); ?></h5>
                                                            </span></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-info ">
                                <div class="card-header p-2">
                                    <strong>Jenis Transaksi</strong>
                                </div>
                                <div class="card-body p-2">
                                    <table class="table m-0 table-sm ">
                                        <thead>
                                            <tr>
                                                <th>Jenis Transaksi</th>
                                                <th class="text-right">Omset</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $jumlahtot_by_jns_tran = 0;
                                            foreach ($trx_by_jenistran as $key => $val) {
                                            ?>
                                                <tr>
                                                    <td><?= $val->jenis_tran; ?></td>
                                                    <td class="text-right"><span>Rp.
                                                            <?= number_format($val->total_jual); ?></span></td>
                                                </tr>
                                            <?php
                                                $jumlahtot_by_jns_tran += $val->total_jual;
                                            } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>TOTAL</th>
                                                <th class="text-right"><span class="badge badge-info ">
                                                        <h5 class="mb-1">Rp.
                                                            <?= number_format($jumlahtot_by_jns_tran); ?></h5>
                                                    </span></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>





                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>

    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
        var donutData = {
            labels: <?= json_encode($users); ?>,
            datasets: [{
                data: <?= json_encode($g_total_omset); ?>,
                backgroundColor: [
                    "#f39c12",
                    "#2E86C1",
                    "#d2d6de",
                    "#3c8dbc",
                    "#f56954",
                    "#00a65a",
                    "#00c0ef",
                ],
            }, ],
        };

        var donutOptions = {
            legend: {
                display: false
            },
            maintainAspectRatio: false,
            responsive: true,
            display: true,
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: "doughnut",
            data: donutData,
            options: donutOptions,
        });
    </script>
</body>

</html>