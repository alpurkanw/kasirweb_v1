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
    <div class="baseUrl" data-url="<?= base_url(); ?>"></div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view("kasir/Tmp_navbar_top"); ?>
        <!-- /.navbar -->

        <?php $this->load->view("kasir/Tmp_side_menu"); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper pt-2">


            <!-- Main content -->
            <section class="content">



                <div class="row">

                    <div class="col-8 dsp_8">

                        <div class="card card-outline card-primary ">
                            <div class="card-body p-2">
                                <button class="btn btn-primary btn_show_bar">List barang</button>
                                <button class="btn btn-primary btn_show_cust">List Customer</button>

                            </div>
                            <!-- /.card-body -->

                        </div>


                        <div class="card card-outline card-primary card_barang">
                            <div class="card-header p-2">
                                List Barang
                            </div>
                            <div class="card-body p-2">
                                <table id="list_lap_bar" class="table table-sm table-bordered   ">
                                    <thead class="bg-primary">
                                        <tr role="row" class="">
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Stok</th>
                                            <th>Harga jual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bars as $key => $asl) {

                                        ?>
                                            <tr role="row" class="item_bar" data-id="<?= $asl->id; ?>" data-namabar="<?= $asl->namabar; ?>" data-harga_jual="<?= $asl->harga_jual; ?>" data-harga_beli="<?= $asl->harga_beli; ?>">
                                                <td class="w-auto"><?= $asl->id; ?></td>
                                                <td><?= $asl->namabar; ?></td>
                                                <td><?= number_format($asl->jum_stok); ?></td>
                                                <td><?= number_format($asl->harga_jual); ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }; ?>

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <div class="card card-outline card-primary card_cust">
                            <div class="card-header p-2">
                                List Customer
                            </div>
                            <div class="card-body p-2">
                                <table id="list_cust" class="table table-sm table-bordered   ">
                                    <thead class="bg-primary">
                                        <tr role="row" class="">
                                            <th>NAMA</th>
                                            <th>ALAMAT</th>
                                            <th>NO TELP/HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($custs as $key => $cust) {

                                        ?>
                                            <tr role="row" class="item_cust" data-id="<?= $cust->id; ?>" data-nama="<?= $cust->nama; ?>" data-alamat="<?= $cust->alamat; ?>" data-notelp="<?= $cust->notelp . $cust->nohp; ?>">
                                                <td><?= $cust->nama; ?></td>
                                                <td><?= $cust->alamat; ?></td>
                                                <td><?= $cust->notelp . "/" . $cust->nohp; ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }; ?>

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>
                    <div class="col-4 dsp_4">
                        <div class="card card-outline card-primary">

                            <div class="card-body p-2">
                                <div class="info-box bg-primary">

                                    <div class="info-box-content p-1">
                                        <div class="row">
                                            <div class="col">
                                                <span class="info-box-text">Nama/Alamat/Nohp</span>
                                                <span class="info-box-number txt_dt_cust">
                                                    Klik Untuk cek customer
                                                </span>
                                            </div>
                                            <div class="col text-right">
                                                <span class="info-box-text">TOTAL</span>
                                                <span class="info-box-number h5">
                                                    0 </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <div class="card card_list_do">
                                    <div class="card-body p-2">
                                        <div class="row font-weight-bold">
                                            <div class="col">KETERANGAN</div>
                                            <div class="col-2 text-center">QTY</div>
                                            <div class="col-3 text-right">JUMLAH</div>
                                        </div>
                                        Data Masih Kosong

                                    </div>
                                </div>

                                <button class="btn btn-primary btn-block btn_submit_do">Submit</button>
                            </div>
                            <!-- /.card-body -->

                        </div>
                    </div>

                </div>




            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="mdl_pickupBar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card card-outline card-primary">
                        <div class="card-header p-2">
                            Form Tambah DO
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="quickForm" novalidate="novalidate">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NAMA BARANG</label>
                                    <input type="hidden" name="idbar" class="form-control idbar" readonly>
                                    <input type="text" name="namabar" class="form-control namabar" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">HARGA JUAL</label>
                                    <input type="text" name="harga_jual" class="form-control harga_jual" readonly>
                                    <input type="hidden" name="harga_beli" class="form-control harga_beli" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">JUMLAH PERMINTAAN</label>
                                    <input type="number" name="jum_minta" class="form-control jum_minta " placeholder="Masukkan JUMLAH PERMINTAANsss" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">TOTAL HARGA</label>
                                    <input type="text" name="tot_harga" class="form-control tot_harga" readonly>
                                </div>
                                <!-- <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                </div> -->
                                <button type="button" class="btn btn-primary btn_sbmt_barang">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>



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

    <!-- custom by aal -->
    <script src="<?= base_url("assets/do/") ?>do.js"></script>
    <script>
        $(document).ready(function() {
            $('.card_barang').show();
            $('.card_cust').hide();


            $('#list_lap_bar').DataTable();
            $(".btn_show_bar").on("click", function() {
                $('.card_barang').show();
                $('.card_cust').hide();
            })



            $('#list_cust').DataTable();
            $(".btn_show_cust").on("click", function() {
                $('.card_barang').hide();
                $('.card_cust').show()
            })

            // $('.btn_submit').click(function() {
            //     $('.form_submit').submit();

            // });
        });
    </script>
</body>

</html>