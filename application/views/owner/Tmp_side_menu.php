<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>Owner</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url("owner/Home/cariBarang") ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Cari Barang
                        </p>
                    </a>
                </li>
                <li class="nav-header">DASHBOARD</li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url("owner/CdshPenj") ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Penjualan
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url("owner/CdshGeneral") ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Dashboard Utama
                        </p>
                    </a>
                </li>
                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="<?= base_url("owner/Ckoreksi") ?>" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Koreksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("owner/Cretur/retPenjIndex") ?>" class="nav-link">
                        <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Batalkan Penjualan
                        </p>
                    </a>
                </li>

                <li class="nav-header">HUTANG/PIUTANG</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Piutang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("owner/Cpiutang/list") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Piutang</p>
                            </a>
                            <!-- <span class="badge badge-warning right">On Going</span> -->
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url("owner/Cpiutang/lapTrxPiutang") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lap. Trans. Pemb. Piutang</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-header">LAPORAN</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Penjualan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url("owner/ClapPenj/perNotaIndex") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan Per Nota</p>
                            </a>
                            <!-- <span class="badge badge-warning right">On Going</span> -->
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("owner/ClapPenj/detailIndex") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("owner/ClapPenj/perUserIndex") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan per User</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Stok
                            <i class="right fas fa-angle-left"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item  ">
                            <a href="<?= base_url("owner/Cstok/hargaModal") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok (Harga Modal)</p>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?= base_url("owner/Cstok/hargaJual") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok (Harga Jual)</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("owner/ClapPemb") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pembelian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("owner/Ckoreksi/indexLap") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Koreksi Barang
                            <!-- <span class="badge badge-warning right">On Going</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url("owner/ClapLabaRugi/lrIndex") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laba Rugi

                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Piutang
                            <i class="right fas fa-angle-left"></i>
                            <span class="badge badge-warning right">On Going</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?= base_url("owner/ClapPenj/detailIndex") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan Detail</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("owner/ClapPenj/perUserIndex") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan per User</p>
                            </a>
                        </li>

                    </ul>
                </li> -->

                <!-- <li class="nav-item">
                    <a href="<?= base_url("admin/Cruang") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Laporan Biaya Lain
                        </p>
                    </a>
                </li> -->

                <li class="nav-header mt-0"></li>

                <li class="nav-item">
                    <a href="<?= base_url("Auth/logout") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>