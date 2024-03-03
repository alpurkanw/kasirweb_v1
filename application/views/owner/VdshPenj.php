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
        <!-- Navbar -->
        <?php
        $data["tes"] = 0;
        // $this->load->view('path');
        $this->load->view("owner/Tmp_navbar_top", $data); ?>
        <!-- /.navbar -->

        <?php
        $data["tes1"] = 0;
        // $this->load->view('path');
        $this->load->view("owner/Tmp_side_menu", $data); ?>

        <div class="content-wrapper" style="min-height: 1592px;">


            <div class="row ">

                <div class="col-sm-6">
                    <div class="card m-2">
                        <div class="card-body p-2">
                            <form action="<?= base_url("owner/CdshPenj"); ?>" class="form_submit " method="post">
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
                        </div>

                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <h4>
                            Transaksi Tanggal <?= $tgl1; ?> sampai <?= $tgl2; ?>
                        </h4>
                    </div>
                </div>
                <hr class="my-2">
                <div class="row">

                    <div class="col-md-6">


                        <div class="card card-primary">
                            <div class="card-header py-1">
                                <h3 class="card-title">
                                    Omset
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7 col-sm-12">
                                        <canvas id="donutChart" style="min-height: 150px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 1045px;" width="1045" height="250" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class=" col-md-5 col-sm-12">

                                        <ul class="chart-legend clearfix">
                                            <?php
                                            // print_r($omset_perUser);
                                            $total_omset = 0;
                                            $g_total_omset = [];
                                            if ($omset_perUser !== 0) {
                                                foreach ($omset_perUser as $key => $val_user) {
                                                    echo '<li><i class="far fa-circle text-danger"></i> ';
                                                    echo $val_user->nama_user . " - Rp " . number_format($val_user->grand_total) . "<br>";
                                                    echo "</li>";

                                                    $g_total_omset[] = $val_user->grand_total;
                                                    $total_omset += $val_user->grand_total;
                                                };
                                                echo '<hr class="my-1">';
                                            }


                                            ?>
                                            <button type="button" class="btn btn-primary btn-block btn-block text-right ">Total : Rp <?= number_format($total_omset); ?></button>
                                        </ul>

                                    </div>

                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>


                    </div>
                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Title</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <?php print_r($omsetPer_M_in_Y[0]); ?> -->
                        <!-- <?php print_r($omsetPer_D_in_M[0]); ?> -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>

            </section>
            <!-- /.content -->
        </div>


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
    <script src="<?= base_url("assets/") ?>plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script>

    <script>
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $("#donutChart").get(0).getContext("2d");
        var donutData = {
            labels: ["Open", "Resolved"],
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