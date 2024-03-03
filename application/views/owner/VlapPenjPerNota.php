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
                                    <h3 class="card-title">Laporan Penjualan Per Nota </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/ClapPenj/perNotaReq"); ?>" class="form_submit " method="post">
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
                                    <h3 class="card-title">Laporan Penjualan Per Nota</h3><br>
                                    <p><?= $tgl1_ori . " Sampai " . $tgl2_ori; ?></p>
                                    <!-- <h5 class="h6"> <?= $tgl1_ori . " Sampai " . $tgl2_ori; ?> </h5> -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <p class="small my-1">*Silahkan Klik baris data untuk melihat detail nota</p>
                                        <table id="list_lap_bar" class="table table-sm text-sm table-bordered table-striped table-hover " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>Id nota/Jns Trx</th>
                                                    <th>Tgl Nota</th>
                                                    <th>Nama Cust.</th>
                                                    <th>Harga </th>
                                                    <th>Potongan</th>
                                                    <th>Tagihan </th>
                                                    <th>Pembayaran </th>
                                                    <th>Kembalian </th>
                                                    <th>Piutang </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (count($trxs) > 0) {

                                                    $harga_sblm_pot = 0;
                                                    $potongan = 0;
                                                    $tagihan = 0;
                                                    $pembayaran = 0;
                                                    $piutang = 0;

                                                    $tot_harga_sblm_pot = 0;
                                                    $tot_potongan = 0;
                                                    $tot_tagihan = 0;
                                                    $tot_bayar = 0;
                                                    $tot_pembayaran = 0;
                                                    $tot_kembalian = 0;
                                                    $tot_piutang = 0;
                                                    foreach ($trxs as $key => $trx) {

                                                        $tagihan = $trx->tot_sblm_pot - $trx->tot_potongan;

                                                        if ($trx->tot_bayar  > $tagihan) {
                                                            $piutang = 0;
                                                            $kembalian = $trx->tot_bayar  - $tagihan;
                                                        } else {
                                                            $piutang = ($trx->tot_sblm_pot - $trx->tot_potongan) - $trx->tot_bayar;
                                                            $kembalian = 0;
                                                        }
                                                ?>
                                                        <tr role="row" class="baris_data" data-idnota="<?= $trx->id_nota; ?>">
                                                            <td><?= $no; ?></td>
                                                            <td><?= $trx->id_nota . "-" . $trx->jenis_tran; ?></td>
                                                            <td><?= $trx->tanggal_nota; ?></td>
                                                            <td><?= $trx->id_cust . "-" . $trx->nama_cust; ?></td>
                                                            <td class="text-right"><?= number_format($trx->tot_sblm_pot); ?></td>
                                                            <td class="text-right"><?= number_format($trx->tot_potongan); ?></td>
                                                            <td class="text-right"><?= number_format($tagihan); ?></td>
                                                            <td class="text-right"><?= number_format($trx->tot_bayar); ?></td>
                                                            <td class="text-right"><?= number_format($kembalian); ?></td>
                                                            <td class="text-right"><?= number_format($piutang); ?></td>
                                                        </tr>
                                                    <?php

                                                        $no++;
                                                        $tot_harga_sblm_pot += $trx->tot_sblm_pot;
                                                        $tot_potongan += $trx->tot_potongan;
                                                        $tot_bayar += $trx->tot_bayar;
                                                        $tot_tagihan += $tagihan;
                                                        $tot_kembalian += $kembalian;
                                                        $tot_piutang += $piutang;
                                                    };
                                                    ?>
                                                    <tr>
                                                        <td colspan="4" class="text-right text-bold text-secondary bg-grey">
                                                            Total
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_harga_sblm_pot); ?><br>
                                                            Harga
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_potongan); ?><br>
                                                            Potongan
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_tagihan); ?><br>
                                                            Tagihan
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_bayar); ?><br>
                                                            Pembayaran
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_kembalian); ?><br>
                                                            Kembalian
                                                        </td>
                                                        <td class="text-right text-bold text-secondary bg-grey">
                                                            <?= number_format($tot_piutang); ?><br>
                                                            Piutang
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
    <div class="modal fade" id="modal_nota">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



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


            $('.baris_data ').on('click', function() {
                var idnota = $(this).data("idnota");
                $.get("<?= base_url('owner/ClapPenj/pernotaDetail/') ?>" + idnota, function(data) {
                    // alert(data);
                    $('#modal_nota').modal()


                    $(document).on('shown.bs.modal', '#modal_nota', function() {

                        $('#modal_nota .modal-content').html(data)
                    });

                })

            })
        });
    </script>
</body>

</html>