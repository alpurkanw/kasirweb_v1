/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : toko_hatama

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 04/03/2024 16:59:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pos_barang
-- ----------------------------
DROP TABLE IF EXISTS `pos_barang`;
CREATE TABLE `pos_barang`  (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `merk` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `namabar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe_bar` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_beli` decimal(15, 0) NULL DEFAULT NULL,
  `harga_beli_bayangan` decimal(15, 0) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 0) NULL DEFAULT NULL,
  `jum_stok` decimal(6, 1) NULL DEFAULT NULL,
  `satuan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lmt_min` decimal(15, 0) NULL DEFAULT NULL,
  `ket` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `st_per_harga` int(1) NULL DEFAULT 0,
  `harga_beli_sebelum` decimal(15, 0) NULL DEFAULT NULL,
  `jns_kepemilikan` int(2) NULL DEFAULT NULL COMMENT '1 milik \r\n2 hutang\r\n3 konsinyiasi',
  `hrgjualbawah` decimal(15, 0) NULL DEFAULT NULL,
  `hrgjualatas` decimal(15, 0) NULL DEFAULT NULL,
  `id_sup` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sup` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_biaya_lain
-- ----------------------------
DROP TABLE IF EXISTS `pos_biaya_lain`;
CREATE TABLE `pos_biaya_lain`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `kat` int(1) NULL DEFAULT NULL COMMENT '1 pendapatan 2 pengeluaran',
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` decimal(15, 0) NULL DEFAULT NULL,
  `tgl_input` decimal(8, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_customer
-- ----------------------------
DROP TABLE IF EXISTS `pos_customer`;
CREATE TABLE `pos_customer`  (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ktp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `notelp` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nohp` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `diskon` int(3) NULL DEFAULT NULL COMMENT 'dalam persentase\r\n',
  `berhutang` int(1) NOT NULL DEFAULT 2 COMMENT '1 boleh berhutang 2 tidak boleh berhutang\r\n',
  `batas_maks_hutang` decimal(15, 0) NULL DEFAULT NULL,
  `jns_cust` int(1) NULL DEFAULT NULL COMMENT '\'1=biasa, 2 = Reseller\'',
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_jns_milik_barang
-- ----------------------------
DROP TABLE IF EXISTS `pos_jns_milik_barang`;
CREATE TABLE `pos_jns_milik_barang`  (
  `jns_kepemilikan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`jns_kepemilikan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `pos_karyawan`;
CREATE TABLE `pos_karyawan`  (
  `id_kar` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `pass` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notelp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` int(3) NULL DEFAULT NULL,
  `sts_online` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kar`, `username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_kategori_bar
-- ----------------------------
DROP TABLE IF EXISTS `pos_kategori_bar`;
CREATE TABLE `pos_kategori_bar`  (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_mas_piutang
-- ----------------------------
DROP TABLE IF EXISTS `pos_mas_piutang`;
CREATE TABLE `pos_mas_piutang`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `nota_frm_suplier` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_nota` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `cust_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pelanggan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_piutang_hutang` decimal(15, 0) NULL DEFAULT NULL,
  `terbayar` decimal(15, 0) NULL DEFAULT NULL,
  `sisa` decimal(15, 0) NULL DEFAULT NULL,
  `jns_hutang_piutang` int(1) NOT NULL DEFAULT 0 COMMENT '1 hutang 2 piutang',
  `tgl_inp` decimal(8, 0) NULL DEFAULT NULL,
  `last_update` decimal(8, 0) NULL DEFAULT NULL,
  `jth_tempo` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_inp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `st_piutang_hutang` int(1) NULL DEFAULT NULL COMMENT '1 lunas 2 belum lunas',
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_suplier
-- ----------------------------
DROP TABLE IF EXISTS `pos_suplier`;
CREATE TABLE `pos_suplier`  (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `pic` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp_toko` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp_pic` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_trans_bayar_hutang_piutang
-- ----------------------------
DROP TABLE IF EXISTS `pos_trans_bayar_hutang_piutang`;
CREATE TABLE `pos_trans_bayar_hutang_piutang`  (
  `id_hutang_piutang` int(8) NULL DEFAULT 0,
  `no_urut` int(8) NULL DEFAULT 0,
  `id_sup_cust` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sup_cust` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nom_hutang` decimal(15, 0) NULL DEFAULT NULL,
  `nom_pemb_sebelum` decimal(15, 0) NULL DEFAULT NULL,
  `nom_bayar` decimal(15, 0) NULL DEFAULT NULL,
  `nom_sisa_sebelum` decimal(15, 0) NULL DEFAULT NULL,
  `tgl_bayar` int(8) NULL DEFAULT NULL,
  `userid` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `noid_nota_bayar` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis` int(1) NULL DEFAULT NULL COMMENT '1 hutang 2 piutang',
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pos_trans_koreksi_jum_bar
-- ----------------------------
DROP TABLE IF EXISTS `pos_trans_koreksi_jum_bar`;
CREATE TABLE `pos_trans_koreksi_jum_bar`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `kode_bar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jum_awal` int(8) NULL DEFAULT NULL,
  `jum_koreksi` int(8) NULL DEFAULT NULL,
  `jum_akhir` int(8) NULL DEFAULT NULL,
  `tgl_ubah` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam_ubah` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tbl_log_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_log_barang`;
CREATE TABLE `tbl_log_barang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_bar` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_bar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ubah` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_act` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_awal` decimal(15, 0) NULL DEFAULT NULL,
  `harga_baru` decimal(15, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_beli
-- ----------------------------
DROP TABLE IF EXISTS `trans_beli`;
CREATE TABLE `trans_beli`  (
  `id_sup` int(6) NULL DEFAULT NULL,
  `nama_sup` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_nota_sup` int(8) NULL DEFAULT NULL,
  `id_nota` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `no_urut` decimal(4, 0) NOT NULL DEFAULT 0,
  `tgl_beli` decimal(8, 0) NULL DEFAULT NULL,
  `tgl_int` decimal(8, 0) NULL DEFAULT NULL,
  `kode_barang` decimal(6, 0) NULL DEFAULT NULL,
  `nama_barang` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_jual` decimal(15, 0) NULL DEFAULT NULL,
  `harga_beli` decimal(15, 0) NULL DEFAULT NULL,
  `jum_beli` decimal(6, 1) NULL DEFAULT NULL,
  `jum_harga` decimal(15, 0) NULL DEFAULT NULL,
  `subtotal` decimal(15, 0) NULL DEFAULT NULL,
  `potongan` decimal(15, 0) NULL DEFAULT NULL,
  `tot_harga` decimal(15, 0) NULL DEFAULT NULL,
  `jns_transaksi` decimal(2, 0) NULL DEFAULT NULL,
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tujuan_bar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nota`, `no_urut`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_beli_batal
-- ----------------------------
DROP TABLE IF EXISTS `trans_beli_batal`;
CREATE TABLE `trans_beli_batal`  (
  `idbatal` int(11) NULL DEFAULT NULL,
  `id_sup` int(6) NULL DEFAULT NULL,
  `nama_sup` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_nota_sup` int(8) NULL DEFAULT NULL,
  `id_nota` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `no_urut` decimal(4, 0) NOT NULL DEFAULT 0,
  `tgl_beli` decimal(8, 0) NULL DEFAULT NULL,
  `tgl_int` decimal(8, 0) NULL DEFAULT NULL,
  `kode_barang` decimal(6, 0) NULL DEFAULT NULL,
  `nama_barang` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_jual` decimal(15, 0) NULL DEFAULT NULL,
  `harga_beli` decimal(15, 0) NULL DEFAULT NULL,
  `jum_beli` decimal(6, 1) NULL DEFAULT NULL,
  `jum_harga` decimal(15, 0) NULL DEFAULT NULL,
  `subtotal` decimal(15, 0) NULL DEFAULT NULL,
  `potongan` decimal(15, 0) NULL DEFAULT NULL,
  `tot_harga` decimal(15, 0) NULL DEFAULT NULL,
  `jns_transaksi` decimal(2, 0) NULL DEFAULT NULL,
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_batal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userbatal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_jual
-- ----------------------------
DROP TABLE IF EXISTS `trans_jual`;
CREATE TABLE `trans_jual`  (
  `id_nota` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_urut` int(4) NOT NULL DEFAULT 0,
  `kode_barang` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_beli` decimal(15, 0) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 0) NULL DEFAULT NULL,
  `jum_bar` decimal(6, 1) NULL DEFAULT NULL,
  `tanggal_nota` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam_nota` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tot_potongan` decimal(15, 0) NULL DEFAULT NULL,
  `tot_bayar` decimal(15, 0) NULL DEFAULT NULL,
  `tot_kembalian` decimal(15, 0) NULL DEFAULT NULL,
  `id_cust` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_cust` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_user` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sales` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sales` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tipe_kepemilikan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_tran` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_harga` decimal(15, 0) NULL DEFAULT NULL,
  `tot_sblm_pot` decimal(15, 0) NULL DEFAULT NULL,
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f3` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f4` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nota`, `no_urut`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for trans_jual_batal
-- ----------------------------
DROP TABLE IF EXISTS `trans_jual_batal`;
CREATE TABLE `trans_jual_batal`  (
  `idbatal` int(11) NULL DEFAULT NULL,
  `id_nota` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_urut` int(4) NOT NULL DEFAULT 0,
  `kode_barang` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_beli` decimal(15, 0) NULL DEFAULT NULL,
  `harga_jual` decimal(15, 0) NULL DEFAULT NULL,
  `jum_bar` decimal(6, 1) NULL DEFAULT NULL,
  `tanggal_nota` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam_nota` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tot_potongan` decimal(15, 0) NULL DEFAULT NULL,
  `tot_bayar` decimal(15, 0) NULL DEFAULT NULL,
  `tot_kembalian` decimal(15, 0) NULL DEFAULT NULL,
  `id_cust` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_cust` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_user` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sales` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_sales` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tipe_kepemilikan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_tran` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_harga` decimal(15, 0) NULL DEFAULT NULL,
  `tot_sblm_pot` decimal(15, 0) NULL DEFAULT NULL,
  `f1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `f2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_batal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `userbatal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nota`, `no_urut`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
