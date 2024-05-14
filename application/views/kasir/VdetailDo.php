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

                    <div class="col-12 dsp_8">

                        <div class="card card-outline card-primary">
                            <!-- <div class="card-header p-2">
                                Detail DO
                            </div> -->
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">

                                <?php
                                // Menggunakan array_reduce() untuk menjumlahkan nilai qty_minta
                                $total_qty_minta = array_reduce($trxdos, function ($carry, $item) {
                                    return $carry + $item->qty_minta;
                                }, 0);
                                ?>
                                <div class="row mb-4">
                                    <div class="col text-center">
                                        <strong class="h4 font-weight-bold ">DETAIL DO</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">Tanggal Open</div>
                                            <div class="col">: <?= $do->tglinp; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">No DO</div>
                                            <div class="col">: <?= substr("00000000" . $do->id, -6); ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col">Customer</div>
                                            <div class="col">: <?= $do->idcust . " - " . $do->namacust; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Alamat/Telp</div>
                                            <div class="col">: <?= $do->alamat . " <br>" . $do->notelp; ?></div>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">Barang</div>
                                            <div class="col">: <?= $do->idbar . " - " . $do->namabar; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Jumlah Qty Pembukaan</div>
                                            <div class="col">: <?= $do->qty . " " . "BTG" . $do->satuan; ?> @Rp <?= number_format($do->harga_jual); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Total Harga Pembukaan</div>
                                            <div class="col">: Rp <?= number_format($do->qty * $do->harga_jual); ?> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Jumlah QTY Perubahan</div>
                                            <div class="col">: <?= $total_qty_minta; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Saldo Qty</div>
                                            <div class="col">: <?= ($do->qty - $total_qty_minta); ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Total Harga Sekarang</div>
                                            <div class="col">: Rp <?= number_format($do->qty * $do->harga_jual); ?> </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Status DO </div>
                                            <div class="col">:
                                                <?php



                                                echo (($do->qty - $total_qty_minta) == 0) ? "TUTUP" : "OPEN"; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <strong>DETAIL TRANSAKSI DO</strong>
                                <hr>


                                <table class="table table-sm ">
                                    <thead>
                                        <tr>
                                            <th>ID DO</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>User Transaksi</th>
                                            <th>Qty Ambil </th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $total_tarik = 0;
                                        foreach ($trxdos as $key => $arr_do) {
                                            $total_tarik += $arr_do->qty_minta;
                                        ?>
                                            <tr>
                                                <td><?= $arr_do->iddo; ?></td>
                                                <td><?= $arr_do->tglinp; ?></td>
                                                <td><?= $arr_do->userinput; ?></td>
                                                <td><?= $arr_do->qty_minta; ?></td>
                                            </tr>

                                        <?php
                                            $no++;
                                        }; ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">TOTAL</td>
                                            <td colspan="2" class=""><?= $total_tarik; ?></td>
                                        </tr>
                                    </tfoot>
                                </table>


                                <hr>
                                <?= $do->harga_jual; ?>
                                <!-- <button type="submit" class="btn btn-primary btn_sbmt_barang">Submit</button> -->
                            </div>

                        </div>



                    </div>


                </div>

                <div class="row">

                    <div class="col-12 dsp_8">

                        <div class="card card-outline card-primary">
                            <div class="card-header p-2">
                                Form Ambil DO
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="<?= base_url("kasir/Cdo/ambildo"); ?>" class="form_ambildo">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NAMA BARANG</label>
                                        <input type="hidden" value="<?= $arr_do->id; ?>" name="id" class="form-control idbar" readonly>
                                        <input type="text" value="<?= $arr_do->namabar; ?>" name="namabar" class="form-control namabar" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">QTY AWAL</label>
                                                <input type="text" value="<?= $arr_do->qty; ?>" name="qty_awal" class="form-control qty_awal" readonly>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">QTY SISAH</label>
                                                <input type="text" value="<?= ($arr_do->qty); ?>" name="qty_sisah" class="form-control qty_sisah" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">HARGA DO</label>
                                        <input type="text" value="<?= $do->harga_jual; ?>" name="harga" class="form-control harga_jual" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">JUMLAH AMBIL BARU</label>
                                        <input type="number" name="jum_minta" class="form-control jum_minta " placeholder="Masukkan JUMLAH PERMINTAAN" autocomplete="off">
                                    </div>

                                    <!-- <div class="form-group mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                    </div>
                                </div> -->
                                    <button type="submit" class="btn btn-primary btn_sbmt_barang">Submit</button>
                                </div>

                            </form>
                        </div>



                    </div>


                </div>


                <div class="row">

                    <div class="col-12  dsp_4">
                        <?= $this->session->flashdata('pesan'); ?>

                        <div class="card card-outline card-primary">
                            <div class="card-header p-2">
                                History Pengambilan DO
                                <table class="table table-sm ">
                                    <thead>
                                        <tr>
                                            <th>ID DO</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Qty sisa sebelumnya</th>
                                            <th>Qty ambil</th>
                                            <th>qty sisa</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($trxdos as $key => $do) {

                                        ?>
                                            <tr>
                                                <td><?= $do->iddo; ?></td>
                                                <td><?= $do->tglinp; ?></td>
                                                <td><?= $do->qty_sisah_sebelum; ?></td>
                                                <td><?= $do->qty_minta; ?></td>
                                                <td><?= ($do->qty_sisah_sebelum - $do->qty_minta); ?></td>
                                                <td><?= $do->harga; ?></td>
                                                <td><?= (($do->qty_sisah_sebelum - $do->qty_minta) * $do->harga); ?></td>
                                            </tr>

                                        <?php
                                            $no++;
                                        }; ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">


                            </div>

                        </div>



                    </div>

                </div>



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



    <!-- custom by aal -->
    <script>
        $(document).ready(function() {
            $(".btn_sbmt_barang").click(function(a) {
                a.preventDefault();
                if ($('.qty_sisah').val() < $('.jum_minta').val()) {
                    alert("tidak boleh pengambilan lebih besar dari Jumlah Sisah" + $('.qty_sisah').val())
                    return;
                }
                // alert("Apakah sudab Benar?");
                $('.form_ambildo').submit();
            })
        });
    </script>
</body>

</html>