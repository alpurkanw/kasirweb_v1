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
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/buttons.dataTables.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>datepick/css/bootstrap-datepicker.min.css">


</head>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view("admin/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("admin/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">


            <section class="content-header p-2">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-6">
                            <h4>List Barang</h4>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card">

                    <div class="card-body p-2">
                        <table id="list_lap_bar" class="table table-sm table-bordered   " role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row" class="bg-info">
                                    <th>id</th>
                                    <th>Nama Barang</th>
                                    <th>kategori</th>
                                    <th>Qty</th>
                                    <th>Limit Minimal</th>
                                    <th>Harga beli</th>
                                    <th>Batas bawah</th>
                                    <th>Harga jual</th>
                                    <th>Batas atas</th>
                                    <th>satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bars as $key => $asl) {

                                ?>
                                    <tr role="row" class="
                                        <?php

                                        if ($asl->jum_stok > 0  && $asl->jum_stok <= $asl->lmt_min) {
                                            echo " bg-warning";
                                        } else if ($asl->jum_stok == 0) {
                                            echo "bg-danger";
                                        }
                                        ?>
                                        ">
                                        <td><?= $asl->id; ?></td>
                                        <td><?= $asl->namabar; ?></td>
                                        <td><?= $asl->kategori; ?></td>
                                        <td><?= $asl->jum_stok; ?></td>
                                        <td><?= $asl->lmt_min; ?></td>
                                        <td><?= $asl->harga_beli; ?></td>
                                        <td><?= $asl->hrgjualbawah; ?></td>
                                        <td><?= $asl->harga_jual; ?></td>
                                        <td><?= $asl->hrgjualatas; ?></td>
                                        <td><?= $asl->satuan; ?></td>
                                    </tr>
                                <?php
                                    $no++;
                                }; ?>

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->



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
    <script src="<?= base_url("assets/") ?>plugins/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/dataTables.buttons.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/jszip.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/pdfmake.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/vfs_fonts.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/buttons.html5.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/buttons.print.min.js"></script>


    <script>
        $(document).ready(function() {

            // $('.btn_export').click(function() {

            //     // alert('sds');
            //     myWin = window.open("", "", "width=700,height=500");
            //     myWin.document.write($('.tes_data').clone(true));
            // });

            //Date range picker
            $('.tgl1').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
            //Date range picker
            $('.tgl2').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true
            });
            $('#list_lap_bar').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'pdf',
                        "title": 'List Seluruh Barang ',
                        "messageBottom": "kiosprogram.com"
                    },
                    {
                        extend: 'excel',
                        title: 'List Seluruh Barang',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                        "messageBottom": "kiosprogram.com"
                    },
                    {
                        extend: 'print',
                        title: 'List Seluruh Barang',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        },
                        "messageBottom": "kiosprogram.com"
                    }

                ]
            });

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
        });
    </script>
</body>

</html>