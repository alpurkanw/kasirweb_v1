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




            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="card col-6 card-outline card-primary">
                    <div class="card-header p-2">
                        <h5>Form Tambah Kategori</h5>
                    </div>
                    <div class="card-body p-2">
                        <form action="<?= base_url("admin/kategori/tambah"); ?>" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" required id="ketegori" name="kategori" class="form-control" placeholder="Nama Kategori" autofocus>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-outline-primary">Tambahkan</button>
                                    <button type="button" class="btn btn-outline-secondary">Batalkan</button>
                                </div>
                            </div>
                        </form>


                    </div>
                    <!-- /.card-body -->

                </div>


                <div class="row">
                    <div class="col">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <table id="list_kateg" class="table table-sm table-bordered   ">
                                    <thead class="bg-primary">
                                        <tr role="row" class="">
                                            <th>Id</th>
                                            <th>KATEGORI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($ktgs as $key => $ktg) {

                                        ?>
                                            <tr role="row" class="item_ktg" data-id="<?= $ktg->id; ?>" data-kategori="<?= $ktg->kategori; ?>">
                                                <td><?= $no; ?></td>
                                                <td>
                                                    <?= $ktg->kategori; ?>
                                                    <form action="<?= base_url("admin/Kategori/delete"); ?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $ktg->id; ?>">
                                                        <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Anda Yakin mau Delete kategori ini?')">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }; ?>

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>

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
            $('#list_kateg').DataTable({
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

            // $('.btn_submit').click(function() {
            //     $('.form_submit').submit();

            // });


        });
    </script>
</body>

</html>