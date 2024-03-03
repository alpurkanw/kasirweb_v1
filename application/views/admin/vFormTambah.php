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
                <div class="card card-primary">
                    <div class="card-header p-2">
                        <h5>Form Tambah Barang</h5>
                    </div>
                    <div class="card-body p-2">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" id="nama_barang" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="harga_beli">Harga Beli</label>
                                        <input type="text" id="harga_beli" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_jual">Harga Jual</label>
                                        <input type="text" id="harga_jual" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="batas_bawah_harga_jual">Batas Bawah Harga Jual</label>
                                        <input type="text" id="batas_bawah_harga_jual" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="batas_atas_harga_jual">Batas Atas Harga Jual</label>
                                        <input type="text" id="batas_atas_harga_jual" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="kategori_barang">Kategori Barang</label>
                                        <select id="kategori_barang" class="form-control">
                                            <option value="kategori1">Kategori 1</option>
                                            <option value="kategori2">Kategori 2</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="suplier">Suplier</label>
                                        <select id="suplier" class="form-control">
                                            <option value="suplier1">Suplier 1</option>
                                            <option value="suplier2">Suplier 2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="satuan">Satuan</label>
                                        <input type="text" id="satuan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="limit_minimal">Limit Minimal</label>
                                        <input type="text" id="limit_minimal" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea id="keterangan" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                            <button type="button" class="btn btn-secondary">Batalkan</button>
                        </form>


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