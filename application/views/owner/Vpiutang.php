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
        <!-- DataTables -->

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

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
                        <div class="col-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header p-2">
                                    <h3 class="card-title">List Piutang Customer </h3>
                                </div> <!-- /.card-body -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/Cpiutang/showList"); ?>" class="form_submit "
                                        method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect04"
                                                        aria-label="Example select with button addon" name="piutang">
                                                        <option value="0">Semua Status..</option>
                                                        <option value="1">Lunas</option>
                                                        <option value="2">Belum</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary"
                                                            type="submit">Submit</button>
                                                    </div>
                                                </div>
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
                                    <div class="card-title h4">List Piutang</div><br>
                                    <div class="card-title h5">Dengan Status <?= $status_p; ?> </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <!-- <button class="btn btn-primary btn_export">tes</button> -->
                                    <div class="tes_data">
                                        <table id="list_piutang"
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
                                                    <th class="text-right">Status</th>
                                                    <th class="text-right"></th>
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
                                                    <td><?=  substr($ptg->tgl_inp,0,4)."-".substr($ptg->tgl_inp,4,2)."-".substr($ptg->tgl_inp,-2) ; ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?= number_format($ptg->jum_piutang_hutang);?></td>
                                                    <td class="text-right"> <?= number_format($ptg->terbayar); ?></td>
                                                    <td class="text-right"> <?= number_format($ptg->sisa); ?></td>
                                                    <td class="text-right">
                                                        <?= ($ptg->st_piutang_hutang == 1)? "Lunas": "Belum"; ?>
                                                    </td>
                                                    <td><a class="btn btn-info btn-sm"
                                                            href="<?= base_url("owner/Cpiutang/DetailPerPiutang?no_nota_p="). $ptg->no_nota; ?>">Detail</a>
                                                    </td>
                                                </tr>
                                                <?php

                                                        $no++;
                                                        $sisa_p = $sisa_p + $ptg->sisa;
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
                                            <tfoot role="row">
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                                <th class="text-right">Total </th>
                                                <th class="text-right"> <?= number_format($sisa_p); ?></th>
                                                <th class="text-right"></th>
                                                <th class="text-right"></th>
                                            </tfoot>

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




        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- AdminLTE App -->
        <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
        <!-- date-range-picker -->


        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>


        <script>
        $(document).ready(function() {


            $('#list_piutang').DataTable();

        });
        </script>
    </body>

</html>
