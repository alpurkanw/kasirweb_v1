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

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


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

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header p-1">
                                <div class="card-tittle ">Batalkan Penjualan </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">

                                <div class="row ">

                                    <div class="col-6 text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                        <div class="input-group input-group-sm">

                                            <input type="text" class="form-control inp_noNota" placeholder="Masukan No Nota" autofocus>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info  btn_cekNota">Cek Nota</button>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <hr class="my-2">

                                <div class="display_data">

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>




                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



    </div>
    <!-- ./wrapper -->





    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url("assets/") ?>datepick/js/bootstrap-datepicker.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {


            $('.btn_cekNota ').on('click', function() {

                var noNota = $('.inp_noNota').val();
                $.get("<?= base_url('owner/Cretur/cekNota/') ?>" + noNota, function(data) {

                    $('.display_data').html(data)

                })

            })

            $('.display_data ').on('click', '.btn_prosesBatal', function() {

                // alert($(this).data('idnota'));

                // var noNota = $('.inp_noNota').val();
                $.get("<?= base_url('owner/Cretur/prosesPembatalanPenj/') ?>" + $(this).data('idnota'), function(data) {

                    $('.display_data').html(data)

                })

            })
        });
    </script>
</body>

</html>