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
                                    <h3 class="card-title">Laporan Penjualan Per User </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/ClapPenj/perUserReq"); ?>" class="form_submit " method="post">
                                        <div class="row">
                                            <div class="col">
                                                <input type="date" class="form-control" name="tgl1" value="<?= date('Y-m-d'); ?>">
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control" name="tgl2" value="<?= date('Y-m-d'); ?>">
                                            </div>

                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <select name="id_kasir" id="kondisi" class="form-control">
                                                    <option value="">.: Pilih Kasir :.</option>
                                                    <?php foreach ($karys as $key => $kary) { ?>
                                                        <option value="<?= $kary->id_kar; ?>"><?= $kary->nama; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="row mt-2">
                                            <div class="col offset-8">
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
                    // $nama_user = $trxs[0]->nama_user;
                    // print_r($trxs);
                    // echo $nama_user;
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header p-1">
                                    <h3 class="card-title">Laporan Penjualan Per User</h3>
                                    <h5 class="h6"><?php
                                                    // echo "tes" . count($trxs);
                                                    (count($trxs) > 0) ? $trxs[0]->id_user . "-" . $trxs[0]->nama_user . "||" . $tgl1_ori . " - " . $tgl2_ori : "";
                                                    ?> </h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar" class="table table-sm text-sm table-bordered table-striped table-hover " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Id nota/Jns Trx</th>
                                                    <th>Tgl Nota</th>
                                                    <th>Nama Cust.</th>
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
                                                        $subtotal = $trx->jum_bar * $trx->harga_jual
                                                ?>
                                                        <tr role="row" class="odd">
                                                            <td><?= $no; ?></td>
                                                            <td><?= $trx->id_nota . "-" . $trx->jenis_tran; ?></td>
                                                            <td><?= $trx->tanggal_nota; ?></td>
                                                            <td><?= $trx->id_cust . "-" . $trx->nama_cust; ?></td>
                                                            <td><?= $trx->kode_barang . " - " . $trx->nama_barang; ?></td>
                                                            <td>Rp <?= number_format($trx->harga_jual); ?></td>
                                                            <td><?= $trx->jum_bar; ?></td>
                                                            <td>Rp <?= number_format($subtotal); ?></td>
                                                        </tr>
                                                    <?php

                                                        $no++;
                                                        $grandTotal += $subtotal;
                                                    };
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" class="text-right text-bold text-secondary bg-grey">
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
                                                        <td colspan="9" class="text-center text-bold text-secondary bg-grey">
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
            var pesanHeader = '<h4 class="m-0">List Barang</h4>';
            pesanHeader += '<h4>Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?> </h4>';
            $('#list_lap_bar').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        "extend": 'pdf',
                        "title": 'List Barang ',
                        "messageTop": 'Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?>',
                        "messageBottom": "exportMessageBottom"
                    },
                    {
                        extend: 'excel',
                        title: 'List Barang',
                        messageTop: 'Lokasi: <?= $_SESSION["lokid"] . "-" . $_SESSION["namalok"]; ?>',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        title: '',
                        messageTop: pesanHeader,
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }

                ]
            });

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
            $('#lokasi').change(function() {
                var lokasi = JSON.parse($(this).val());

                // if (lokasi < > "") {
                // alert(lokasi.id);
                // return;
                // }
                $.get('<?= base_url('admin/ClapRuangPerLok/ambilRuang/'); ?>' + lokasi.id, function(data) {
                    // alert('Data : ' + data);
                    $('#list_ruang').html(data);
                    // $('.kodebar').val('');
                    // $('.kodebar').focus();


                });
            });

        });
    </script>
</body>

</html>