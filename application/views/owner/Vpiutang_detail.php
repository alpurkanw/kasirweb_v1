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
        <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header p-2">
                                    <h3 class="card-title">Detail Piutang Customer </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/Cpiutang/showList"); ?>" class="form_submit "
                                        method="post">
                                        <div class="row">
                                            <div class="col-6">
                                                <table class="table table-sm table-striped">
                                                    <tr>
                                                        <td>No Nota</td>
                                                        <td>:</td>
                                                        <td><?= $ptgs["no_nota"]; ?><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pelanggan</td>
                                                        <td>:</td>
                                                        <td><?= $ptgs["cust_id"]." - ".$ptgs["nama_pelanggan"]; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jum_piutang</td>
                                                        <td>:</td>
                                                        <td><?= $ptgs["jum_piutang_hutang"]; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Terbayar</td>
                                                        <td>:</td>
                                                        <td><?= number_format($ptgs["terbayar"]); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sisa</td>
                                                        <td>:</td>
                                                        <td><?= number_format($ptgs["sisa"]); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>tgl_input</td>
                                                        <td>:</td>
                                                        <td><?= $ptgs["tgl_inp"]; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>User Input</td>
                                                        <td>:</td>
                                                        <td><?= $ptgs["user_inp"]; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>:</td>
                                                        <td><?= ($ptgs["st_piutang_hutang"] == 2)? "Belum Lunas" : "Lunas" ; ?>
                                                        </td>
                                                    </tr>
                                                </table>



                                            </div>
                                        </div>
                                        <hr>


                                        <div class="row">
                                            <div class="col-12">
                                                <table id="list_lap_bar"
                                                    class="table table-sm text-sm table-bordered table-striped table-hover "
                                                    role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>No</th>
                                                            <th>No Nota</th>
                                                            <th>No urut</th>
                                                            <th>Tgl Bayar</th>
                                                            <th>Nom Piutang </th>
                                                            <th>nom_pemb_sebelum</th>
                                                            <th>Nom. bayar </th>
                                                            <th class="text-right">Nom Sisa Piutang </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                $no = 1;
                                                if (count($ptg_bayars) > 0) {
                                                    $tot_piutang = 0;
                                                    $sisa_p = 0;
                                                    foreach ($ptg_bayars as $key => $ptg) {
                                                ?>
                                                        <tr role="row" class="baris_data" data-idnota="">
                                                            <td><?= $no; ?></td>
                                                            <td><?= $ptg->id_hutang_piutang; ?></td>
                                                            <td><?= $ptg->no_urut; ?></td>
                                                            <td><?= $ptg->tgl_bayar; ?></td>
                                                            <td class="text-right">
                                                                <?= number_format($ptg->nom_hutang); ?></td>
                                                            <td class="text-right">
                                                                <?= number_format($ptg->nom_pemb_sebelum); ?></td>
                                                            <td class="text-right">
                                                                <?= number_format($ptg->nom_bayar); ?></td>
                                                            <td class="text-right">
                                                                <?= number_format($ptg->nom_sisa_sebelum - $ptg->nom_bayar); ?>
                                                            </td>

                                                        </tr>
                                                        <?php

                                                        $no++;
                                                    };
                                                    ?>

                                                        <?php
                                                } else {
                                                ?>
                                                        <tr>
                                                            <td colspan="9"
                                                                class="text-center text-bold text-secondary bg-grey">
                                                                Data Tidak Ada
                                                            </td>
                                                        </tr>
                                                        <?php
                                                } ?>

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </form>

                                </div><!-- /.card-body -->

                            </div>
                        </div>
                    </div>

                    <?php
                    // echo $page;
                    if(isset($page) && $page == 'showdata'){
                        ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header p-1">
                                    <div class="card-title h3">List Piutang</div><br>
                                    <div class="card-title h5">Berstatus <?= $status_p; ?> </div><br>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_lap_bar"
                                            class="table table-sm text-sm table-bordered table-striped table-hover "
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>No Nota</th>
                                                    <th>Pelanggan</th>
                                                    <th>Tgl Piutang </th>
                                                    <th class="text-right">Jumlah Piutang</th>
                                                    <th class="text-right">Terbayar</th>
                                                    <th class="text-right">Sisa Piutang</th>
                                                    <th class="text-right">Tanggal Bayar</th>
                                                    <th class="text-right">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (count($piutangs) > 0) {
                                                    
                                                    
                                                    $tot_piutang = 0;
                                                    $sisa_p = 0;
                                                    foreach ($piutangs as $key => $ptg) {
                                                ?>
                                                <tr role="row" class="baris_data" data-idnota="<?= $ptg->id; ?>">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $ptg->no_nota; ?></td>
                                                    <td><?= $ptg->cust_id."-".$ptg->nama_pelanggan; ?></td>
                                                    <td><?= $ptg->tgl_inp; ?></td>
                                                    <td class="text-right">
                                                        <?= number_format($ptg->jum_piutang_hutang);?></td>
                                                    <td class="text-right"> <?= number_format($ptg->terbayar); ?></td>
                                                    <td class="text-right"> <?= number_format($ptg->sisa); ?></td>
                                                    <td class="text-right"> <?= $ptg->tgl_bayar ?></td>
                                                    <td class="text-right">
                                                        <?= ($ptg->st_piutang_hutang == 1)? "Lunas": "Belum"; ?>
                                                    </td>
                                                    <td><a
                                                            href="<?= base_url("owner/Cpiutang/DetailPerPiutang?no_nota_p="). $ptg->no_nota; ?>">Cek
                                                            Pemb</a></td>
                                                </tr>
                                                <?php

                                                        $no++;
                                                        $sisa_p = $sisa_p + $ptg->sisa;
                                                    };
                                                    ?>
                                                <tr role="row">
                                                    <th colspan="6" class="text-right">Total SISA PIUTANG</th>
                                                    <th class="text-right"> <?= number_format($sisa_p); ?></th>
                                                    <th class="text-right"></th>
                                                </tr>

                                                <?php
                                                } else {
                                                ?>
                                                <tr>
                                                    <td colspan="9"
                                                        class="text-center text-bold text-secondary bg-grey">
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

                    <?php 
                    }
                    ?>





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


            // $('.baris_data ').on('click', function() {
            //     var idnota = $(this).data("idnota");
            //     $.get("<?= base_url('owner/ClapPenj/pernotaDetail/') ?>" + idnota, function(data) {
            //         // alert(data);
            //         $('#modal_nota').modal()


            //         $(document).on('shown.bs.modal', '#modal_nota', function() {

            //             $('#modal_nota .modal-content').html(data)
            //         });

            //     })

            // })
        });
        </script>
    </body>

</html>
