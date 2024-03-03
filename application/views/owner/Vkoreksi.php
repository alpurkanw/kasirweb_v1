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
                                <div class="card-tittle ">List Barang </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-2">

                                <div class="row ">

                                    <div class="col-6 text-center">
                                        <?= $this->session->flashdata('pesan'); ?>
                                        <div class="input-group input-group-sm">

                                            <input type="text" class="form-control inp_keyword" placeholder="Input namabarang/kode barang (min 3 character)" autofocus>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat">Search!</button>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <hr class="my-2">

                                <div class="display_data"></div>




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


        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.0.5
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="modal_form_koreksi" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="card card-info shadow">
                    <div class="card-header">
                        <h3 class="card-title">Form Koreksi Jumlah Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal form_koreksi" action="<?= base_url("owner/Ckoreksi/proses_koreksi"); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Kode Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kode_barang" class="form-control kode_barang" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputtext3" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_barang" class="form-control nama_barang" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputtext3" class="col-sm-4 col-form-label">Jumlah Stok</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jum_stok" class="form-control jum_stok" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputtext3" class="col-sm-4 col-form-label">Jumlah Koreksi</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jumlah_koreksi" class="form-control jumlah_koreksi">
                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                            <button type="submit" class="btn btn-primary btn_submit_koreksi">Submit</button>
                            <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>

    </div>




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
            $('.display_data ').on('click', '.baris_data', function() {
                // alert('')
                // var idbar = $(this).data("id")
                // var namabar = $(this).data("namabar")
                // var jum_stok = $(this).data("jum_stok")

                $('.kode_barang').val($(this).data("id"))
                $('.nama_barang').val($(this).data("nama_barang"))
                $('.jum_stok').val($(this).data("jum_stok"))

                $('#modal_form_koreksi').modal()
                $(document).on('shown.bs.modal', '#modal_form_koreksi', function() {
                    $('.jumlah_koreksi').focus()
                    $('#modal_form_koreksi .btn_submit_koreksi').click(function(e) {
                        // alert()
                        e.preventDefault()
                        $('.form_koreksi').submit()
                    })
                });
            })

            $('.inp_keyword').on("keyup", function(e) {
                var keyword = $('.inp_keyword').val();
                // alert(keyword.length)
                getData(keyword);
            });
        });

        function getData(huruf) {
            if (huruf.length >= 3) {
                // alert(keyword)
                $.post('<?= base_url("owner/Ckoreksi/") ?>getData2/', {
                    "keyw": huruf
                }, function(data) {
                    data = JSON.parse(data)
                    var tbl_header = `

                    <div class="row mb-1">
                        <div class="col">
                            <span class="badge badge-info">Klik Baris Yang Akan DIKOREKSI </span>
                        </div>
                        <div class="col text-right">
                            <span class="badge badge-info">Total Data : ${data.length}</span>
                        </div>
                    </div>
                        <table id="list_bar" class="table table-bordered table-striped  ">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Stok</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    `
                    var rows = ""
                    // $.forEach()
                    // data.forEach(function() {
                    //    
                    // })
                    var no = 1;
                    $.each(data, function(i, dt) {

                        rows += `
                            <tr class="baris_data"  
                            data-id="${dt.id}"
                            data-nama_barang="${dt.namabar}"
                            data-jum_stok ="${dt.jum_stok}" >
                                <td>${no}</td>
                                <td>${dt.id}</td>
                                <td>${dt.namabar}</td>
                                <td>${dt.jum_stok}</td>
                                <td>${dt.harga_beli}</td>
                                <td>${dt.harga_jual}</td>
                            </tr>
                            `
                        no++
                    })
                    var tbl_footer = `
                        </tbody>
                        </table>`

                    $('.display_data').html(tbl_header + rows + tbl_footer)
                })
            }
            if (huruf.length <= 3) {
                $('.display_data').text("")
            }
        }
    </script>
</body>

</html>