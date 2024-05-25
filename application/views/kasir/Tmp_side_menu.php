<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php $this->load->view("VlogoMenu"); ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel   mb-3 d-flex">

            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $_SESSION["nama"]; ?> <br>KASIR</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column  nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">Menu Utama</li>
                <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Pembukaan DO
                        </p>
                    </a>

                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Pembukaan DO
                        </p>
                    </a>

                </li> -->

                <!-- <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo/allDo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            List DO
                        </p>
                    </a>
                </li> -->


                <li class="nav-header">Laporan</li>
                <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lap. Pembukaan DO
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lap. Pembukaan DO
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url("kasir/Cdo") ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Lap. open BO
                        </p>
                    </a>
                </li> -->

                <!-- 
                <li class="nav-header">Menu Utama</li>
                <li class="nav-item">
                    <a href="<?= base_url("karyw/Home") ?>" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Cari Barang
                        </p>
                    </a>
                </li> -->


                <li class="nav-header mt-0"></li>

                <li class="nav-item">
                    <a href="<?= base_url("Auth/logout") ?>" class="nav-link">
                        <i class="nav-icon fas fa-Sign out"></i>
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