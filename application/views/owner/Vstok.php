<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $judul; ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url("assets/") ?>dist/css/adminlte.min.css">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url("assets/") ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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

                <!-- <div class="row mb-2">
                    <div class="col text-right">
                        <button class="btn btn-primary bg-gradient-blue">TAMBAH</button>
                    </div>
                </div> -->
                <?php if ($page == "hargaModal") {; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card  card-outline card-primary">
                                <div class="card-header p-1">
                                    <h5>Laporan Stok</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/Cstok/hargaModal/1"); ?>" class="form_submit " method="post">
                                        <div class="row">
                                            <div class="col-2">
                                                <select name="kategori" class=" form-control form-control-sm">
                                                    <option value="semua">Semua Kategori</option>
                                                    <?php
                                                    foreach ($kategs as $key => $ktg) { ?>
                                                        <option value="<?= $ktg->kategori; ?>"><?= $ktg->kategori; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <select name="sedia" class=" form-control form-control-sm">
                                                    <option value="semua">Ketersediaan</option>
                                                    <option value="ready">Barang Tersedia</option>
                                                    <option value="dikit">Barang Sedikit</option>
                                                    <option value="habis">Barang Habis</option>

                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm btn-block btn-primary">Retrieve</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                    <?php if (count($bars) !== 0) {
                    ?>
                        <div class="row mb-2">
                            <div class="col-12 text-right">

                                <a href="#" class="btn btn-sm btn-success bg-gradient">
                                    <i class="fa-solid fa-square-plus"></i>
                                    Print</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header p-1">
                                        <h5>Stok Barang Per Tanggal <?= date("d-m-Y"); ?></h5>
                                        <small>Kategori : <?= $kategori; ?>, Ketersediaan barang : <?= $jum_stok; ?></small>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-2">
                                        <?= $this->session->flashdata('pesan'); ?>

                                        <table id="list_user" class="table table-sm text-sm table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Nama Barang</th>
                                                    <th class="text-right">Harga Beli</th>
                                                    <th class="text-center">Jumlah Stok </th>
                                                    <th class="text-center">Limit Minimal</th>
                                                    <th class="text-right">Nilai Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $g_tot = 0;
                                                $subtotal = 0;
                                                foreach ($bars as $key => $bar) {
                                                    $subtotal = $bar->jum_stok * $bar->harga_beli
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td><?= $bar->id; ?></td>
                                                        <td><?= $bar->namabar; ?></td>
                                                        <td class="text-right"><?= number_format($bar->harga_beli); ?></td>
                                                        <td class="text-center"><?= $bar->jum_stok; ?></td>
                                                        <td class="text-center"><?= $bar->lmt_min; ?></td>
                                                        <td class="text-right"><?= number_format($subtotal); ?></td>



                                                    </tr>
                                                <?php
                                                    $g_tot += $subtotal;
                                                    $no++;
                                                }; ?>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">Total</td>
                                                    <td class="text-right"><?= number_format($g_tot); ?></td>
                                                </tr>
                                            </tfoot>


                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                    <?php
                    } ?>


                <?php }
                ?>
                <?php if ($page == "hargaJual") {; ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card  card-outline card-primary">
                                <div class="card-header p-1">
                                    <h5>Laporan Stok</h5>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-2">
                                    <form action="<?= base_url("owner/Cstok/hargaJual/1"); ?>" class="form_submit " method="post">
                                        <div class="row">
                                            <div class="col-2">
                                                <select name="kategori" class=" form-control form-control-sm">
                                                    <option value="semua">Semua Kategori</option>
                                                    <?php
                                                    foreach ($kategs as $key => $ktg) { ?>
                                                        <option value="<?= $ktg->kategori; ?>"><?= $ktg->kategori; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <select name="sedia" class=" form-control form-control-sm">
                                                    <option value="semua">Ketersediaan</option>
                                                    <option value="ready">Barang Tersedia</option>
                                                    <option value="dikit">Barang Sedikit</option>
                                                    <option value="habis">Barang Habis</option>

                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm btn-block btn-primary">Retrieve</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>

                    <?php if (count($bars) !== 0) {
                    ?>
                        <div class="row mb-2">
                            <div class="col-12 text-right">

                                <a href="#" class="btn btn-sm btn-success bg-gradient">
                                    <i class="fa-solid fa-square-plus"></i>
                                    Print</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header p-1">
                                        <h5>Stok Barang Per Tanggal <?= date("d-m-Y"); ?></h5>
                                        <small>Kategori : <?= $kategori; ?>, Ketersediaan barang : <?= $jum_stok; ?></small>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-2">
                                        <?= $this->session->flashdata('pesan'); ?>

                                        <table id="list_user" class="table table-sm text-sm  table-bordered table-striped  " role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Nama Barang</th>
                                                    <th class="text-right">Harga Jual</th>
                                                    <th class="text-center">Jumlah Stok </th>
                                                    <th class="text-center">Limit Minimal</th>
                                                    <th class="text-right">Nilai Barang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $g_tot = 0;
                                                $subtotal = 0;
                                                foreach ($bars as $key => $bar) {
                                                    $subtotal = $bar->jum_stok * $bar->harga_beli
                                                ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $no; ?></td>
                                                        <td><?= $bar->id; ?></td>
                                                        <td><?= $bar->namabar; ?></td>
                                                        <td class="text-right"><?= number_format($bar->harga_jual); ?></td>
                                                        <td class="text-center"><?= $bar->jum_stok; ?></td>
                                                        <td class="text-center"><?= $bar->lmt_min; ?></td>
                                                        <td class="text-right"><?= number_format($subtotal); ?></td>



                                                    </tr>
                                                <?php
                                                    $g_tot += $subtotal;
                                                    $no++;
                                                }; ?>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="6">Total</td>
                                                    <td class="text-right"><?= number_format($g_tot); ?></td>
                                                </tr>
                                            </tfoot>


                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                    <?php
                    } ?>


                <?php }
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




    <!-- jQuery -->
    <script src="<?= base_url("assets/") ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("assets/") ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("assets/") ?>dist/js/adminlte.min.js"></script>
    <!-- <script src="<?= base_url("assets/") ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script> -->
    <!-- DataTables -->
    <!-- <script src="<?= base_url("assets/") ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url("assets/") ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url("assets/") ?>dist/js/demo.js"></script> -->
    <script>
        $(document).ready(function() {
            // $("#list_user").DataTable();

            $('.btn_submit').click(function() {
                $('.form_submit').submit();

            });
        });
    </script>
</body>

</html>