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

                    <div class="col dsp_8">

                        <div class="card card-outline card-primary card_barang">
                            <div class="card-header p-2">
                                List DO
                            </div>
                            <div class="card-body p-2">
                                <table id="list_lap_bar" class="table table-sm table-bordered   ">
                                    <thead class="bg-primary">
                                        <tr role="row" class="">
                                            <th>ID</th>
                                            <th>Tanggal Open</th>
                                            <th>Customer / No Telp / Alamat <br>
                                                Barang / Harga</th>
                                            <th>Qty Awal /<br> Qty Ambil /<br> Qty Sisah</th>
                                            <th>Total Awal / Total Ambil / <br>Total Sisah </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total_hrg_awal = 0;
                                        $total_hrg_taken = 0;
                                        $total_hrg_sisah = 0;
                                        foreach ($dos as $key => $asl) {
                                            $qty_ambil = ($asl->qty_ambil == "") ? "0" : $asl->qty_ambil;
                                            $qty_sisah = ($asl->qty - $asl->qty_ambil);

                                            $harga_awal = $asl->qty * $asl->harga_jual;
                                            $harga_taken = $qty_ambil * $asl->harga_jual;
                                            $harga_sisah = $qty_sisah * $asl->harga_jual;

                                            $total_hrg_awal += $harga_awal;
                                            $total_hrg_taken += $harga_taken;
                                            $total_hrg_sisah += $harga_sisah;

                                            // $harga = $qty_sisah * $asl->harga_jual;
                                            // $total += $harga;
                                        ?>
                                            <tr role="row" class="item_do" data-id="<?= $asl->no_notado; ?>" data-namabar="<?= $asl->namabar; ?>" data-qty_sisah="<?= $qty_sisah; ?>" data-harga_jual="<?= $asl->harga_jual; ?>" data-harga_beli="<?= $asl->harga_beli; ?>">
                                                <td><?= $asl->id; ?></td>
                                                <td><?= $asl->tglinp; ?></td>
                                                <td><?= $asl->namacust . " / " . $asl->notelp . " / " . $asl->alamat; ?><br>
                                                    <?= $asl->namabar . " / @Rp " . number_format($asl->harga_jual); ?></td>
                                                <td><?= $asl->qty . " / " . $qty_ambil . " /  " . $qty_sisah; ?></td>
                                                <td><?= number_format($harga_awal) . " / " . number_format($harga_taken) . " / " . number_format($harga_sisah); ?></td>
                                                <td>
                                                    <a href="<?= base_url("kasir/Cdo/detailDo/") . $asl->id; ?>" class="btn btn-sm btn-primary">Detail DO</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }; ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4" class="text-right">TOTAL</th>
                                            <th> <?= number_format($total_hrg_awal) . " /<br> " . number_format($total_hrg_taken) . " /<br> " . number_format($total_hrg_sisah); ?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>

                                </table>
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
    <script>
        $(document).ready(function() {
            $('#list_lap_bar').DataTable();

            // $(".item_do").on("click", function() {
            //     $("#mdl_pickupBar .idbar").val($(this).data("id"));
            //     $("#mdl_pickupBar .namabar").val($(this).data("namabar"));
            //     $("#mdl_pickupBar .harga_jual").val($(this).data("harga_jual"));
            //     $("#mdl_pickupBar .harga_beli").val($(this).data("harga_beli"));
            //     $("#mdl_pickupBar .qty_sisah").val($(this).data("qty_sisah"));
            //     $("#mdl_pickupBar").modal("toggle");
            // });

            // $("#mdl_pickupBar").on("shown.bs.modal", function() {
            //     $("#mdl_pickupBar .jum_minta").val("");
            //     $("#mdl_pickupBar .tot_harga").val("");
            //     $("#mdl_pickupBar .jum_minta").focus();

            //     $("#mdl_pickupBar .jum_minta").keyup(function(e) {
            //         e.preventDefault();
            //         // alert();
            //         var minta = $(this).val();
            //         var harga_jual = $("#mdl_pickupBar .harga_jual").val();
            //         $("#mdl_pickupBar .tot_harga").val(formatAngka(minta * harga_jual));
            //     });
            // });

            // $('.card_barang').show();
            // $('.card_cust').hide();


            // $(".btn_show_bar").on("click", function() {
            //     $('.card_barang').show();
            //     $('.card_cust').hide();
            // })



            // $('#list_cust').DataTable();
            // $(".btn_show_cust").on("click", function() {
            //     $('.card_barang').hide();
            //     $('.card_cust').show()
            // })

            // $('.btn_submit').click(function() {
            //     $('.form_submit').submit();

            // });
        });
    </script>
</body>

</html>