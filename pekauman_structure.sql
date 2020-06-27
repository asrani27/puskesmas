/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : pekauman

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 28/06/2020 00:03:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for api_key
-- ----------------------------
DROP TABLE IF EXISTS `api_key`;
CREATE TABLE `api_key`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `api_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_token` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateway_token` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for api_log
-- ----------------------------
DROP TABLE IF EXISTS `api_log`;
CREATE TABLE `api_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `api_user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime(0) NOT NULL,
  `api` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_time` double(8, 4) NOT NULL,
  `mem_usage` double(8, 4) NOT NULL,
  `size_req` double(8, 4) NOT NULL,
  `size_response` double(8, 4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_antrian
-- ----------------------------
DROP TABLE IF EXISTS `c_antrian`;
CREATE TABLE `c_antrian`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `config` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `c_bpjs`;
CREATE TABLE `c_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_aktif` datetime(0) NOT NULL,
  `kode_provider` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `consid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `secret` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `c_bpjs_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  CONSTRAINT `c_bpjs_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_disdukcapil
-- ----------------------------
DROP TABLE IF EXISTS `c_disdukcapil`;
CREATE TABLE `c_disdukcapil`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tanggal_aktif` datetime(0) NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `c_disdukcapil_kota_id_foreign`(`kota_id`) USING BTREE,
  CONSTRAINT `c_disdukcapil_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_efarmasi
-- ----------------------------
DROP TABLE IF EXISTS `c_efarmasi`;
CREATE TABLE `c_efarmasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_aktif` datetime(0) NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_konfigurasi_form
-- ----------------------------
DROP TABLE IF EXISTS `c_konfigurasi_form`;
CREATE TABLE `c_konfigurasi_form`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `model_nama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kolom_nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` tinyint(1) NULL DEFAULT 0,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for c_sistem
-- ----------------------------
DROP TABLE IF EXISTS `c_sistem`;
CREATE TABLE `c_sistem`  (
  `id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_center_view_jawa_timur
-- ----------------------------
DROP TABLE IF EXISTS `h_center_view_jawa_timur`;
CREATE TABLE `h_center_view_jawa_timur`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tgl_pelayanan` date NOT NULL,
  `kd_pasien` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_pasien` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = tidak diketahui, 1 = Laki-laki, 2 = Perempuan',
  `tgllahir_pasien` date NULL DEFAULT NULL,
  `kd_penyakit` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cara_bayar` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasus_baru` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = baru, 0 = lama',
  `data` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `h_center_view_jawa_timur_diagnosa_id_foreign`(`diagnosa_id`) USING BTREE,
  CONSTRAINT `h_center_view_jawa_timur_diagnosa_id_foreign` FOREIGN KEY (`diagnosa_id`) REFERENCES `t_diagnosa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_detail_obat_keluar
-- ----------------------------
DROP TABLE IF EXISTS `h_detail_obat_keluar`;
CREATE TABLE `h_detail_obat_keluar`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `obat_pasien_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `distribusi_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_jumlah` double(16, 2) NULL DEFAULT NULL,
  `batch` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `barcode` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `h_detail_obat_keluar_obat_pasien_detail_id_foreign`(`obat_pasien_detail_id`) USING BTREE,
  INDEX `h_detail_obat_keluar_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `h_detail_obat_keluar_distribusi_detail_id_foreign`(`distribusi_detail_id`) USING BTREE,
  CONSTRAINT `h_detail_obat_keluar_distribusi_detail_id_foreign` FOREIGN KEY (`distribusi_detail_id`) REFERENCES `t_distribusi_obat_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `h_detail_obat_keluar_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `h_detail_obat_keluar_obat_pasien_detail_id_foreign` FOREIGN KEY (`obat_pasien_detail_id`) REFERENCES `t_obat_pasien_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_featureusage
-- ----------------------------
DROP TABLE IF EXISTS `h_featureusage`;
CREATE TABLE `h_featureusage`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `feature` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_data` int(11) NOT NULL DEFAULT 0,
  `puskesmas` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_feedback
-- ----------------------------
DROP TABLE IF EXISTS `h_feedback`;
CREATE TABLE `h_feedback`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pegawai_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` tinyint(4) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `h_loginlog`;
CREATE TABLE `h_loginlog`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `h_loginlog_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `h_loginlog_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `h_loginlog_tanggal_index`(`tanggal`) USING BTREE,
  CONSTRAINT `h_loginlog_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `h_loginlog_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_stok_obat
-- ----------------------------
DROP TABLE IF EXISTS `h_stok_obat`;
CREATE TABLE `h_stok_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `penerimaan_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `obat_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `stok_opname_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `stok_jumlah` double(8, 2) NULL DEFAULT 0.00,
  `distribusi_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `batch` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `barcode` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sumber_dana` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `harga_jual` double NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `h_stok_obat_penerimaan_detail_id_foreign`(`penerimaan_detail_id`) USING BTREE,
  INDEX `h_stok_obat_obat_detail_id_foreign`(`obat_detail_id`) USING BTREE,
  INDEX `h_stok_obat_stok_opname_id_foreign`(`stok_opname_id`) USING BTREE,
  INDEX `h_stok_obat_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `h_stok_obat_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `h_stok_obat_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `h_stok_obat_distribusi_detail_id_foreign`(`distribusi_detail_id`) USING BTREE,
  CONSTRAINT `h_stok_obat_distribusi_detail_id_foreign` FOREIGN KEY (`distribusi_detail_id`) REFERENCES `t_distribusi_obat_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `h_stok_obat_obat_detail_id_foreign` FOREIGN KEY (`obat_detail_id`) REFERENCES `t_obat_pasien_detail` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `h_stok_obat_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `h_stok_obat_penerimaan_detail_id_foreign` FOREIGN KEY (`penerimaan_detail_id`) REFERENCES `t_penerimaan_obat_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `h_stok_obat_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `h_stok_obat_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `h_stok_obat_stok_opname_id_foreign` FOREIGN KEY (`stok_opname_id`) REFERENCES `t_stok_opname_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4393 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for h_updatelog
-- ----------------------------
DROP TABLE IF EXISTS `h_updatelog`;
CREATE TABLE `h_updatelog`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `versi` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `h_updatelog_versi_unique`(`versi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_alergipasien
-- ----------------------------
DROP TABLE IF EXISTS `m_alergipasien`;
CREATE TABLE `m_alergipasien`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `anamnesa_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_alergi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `alergi_id_cloud` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_alergipasien_anamnesa_id_foreign`(`anamnesa_id`) USING BTREE,
  INDEX `m_alergipasien_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `m_alergipasien_anamnesa_id_foreign` FOREIGN KEY (`anamnesa_id`) REFERENCES `t_anamnesa` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `m_alergipasien_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 604 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_asupan_makanan
-- ----------------------------
DROP TABLE IF EXISTS `m_asupan_makanan`;
CREATE TABLE `m_asupan_makanan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tipe` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `air` double(8, 2) NULL DEFAULT 0.00,
  `energi` double(8, 2) NULL DEFAULT 0.00,
  `protein` double(8, 2) NULL DEFAULT 0.00,
  `lemak` double(8, 2) NULL DEFAULT 0.00,
  `karbohidrat` double(8, 2) NULL DEFAULT 0.00,
  `serat` double(8, 2) NULL DEFAULT 0.00,
  `abu` double(8, 2) NULL DEFAULT 0.00,
  `kalsium` double(8, 2) NULL DEFAULT 0.00,
  `fosfor` double(8, 2) NULL DEFAULT 0.00,
  `besi` double(8, 2) NULL DEFAULT 0.00,
  `natrium` double(8, 2) NULL DEFAULT 0.00,
  `kalium` double(8, 2) NULL DEFAULT 0.00,
  `tembaga` double(8, 2) NULL DEFAULT 0.00,
  `seng` double(8, 2) NULL DEFAULT 0.00,
  `retinol` double(8, 2) NULL DEFAULT 0.00,
  `beta_karoten` double(8, 2) NULL DEFAULT 0.00,
  `karoten_total` double(8, 2) NULL DEFAULT 0.00,
  `thiamin` double(8, 2) NULL DEFAULT 0.00,
  `riboflavin` double(8, 2) NULL DEFAULT 0.00,
  `niasin` double(8, 2) NULL DEFAULT 0.00,
  `vitamin_c` double(8, 2) NULL DEFAULT 0.00,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1147 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_asuransi
-- ----------------------------
DROP TABLE IF EXISTS `m_asuransi`;
CREATE TABLE `m_asuransi`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_asuransi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bridgingbpjs` tinyint(1) NOT NULL DEFAULT 0,
  `show_no_asuransi` tinyint(1) NOT NULL DEFAULT 1,
  `require_no_asuransi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_aturan_pakai
-- ----------------------------
DROP TABLE IF EXISTS `m_aturan_pakai`;
CREATE TABLE `m_aturan_pakai`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_bed
-- ----------------------------
DROP TABLE IF EXISTS `m_bed`;
CREATE TABLE `m_bed`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamar_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_bed_kamar_id_foreign`(`kamar_id`) USING BTREE,
  INDEX `m_bed_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `m_bed_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `m_kamar` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_bed_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_beratbadan_umur
-- ----------------------------
DROP TABLE IF EXISTS `m_beratbadan_umur`;
CREATE TABLE `m_beratbadan_umur`  (
  `beratbadan_umur_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `berat_badan` double(5, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`beratbadan_umur_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_berattinggi_badan
-- ----------------------------
DROP TABLE IF EXISTS `m_berattinggi_badan`;
CREATE TABLE `m_berattinggi_badan`  (
  `berattinggi_badan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_badan` double(5, 2) NOT NULL,
  `tinggi_badan` double(5, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`berattinggi_badan_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_datadasar
-- ----------------------------
DROP TABLE IF EXISTS `m_datadasar`;
CREATE TABLE `m_datadasar`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_demo
-- ----------------------------
DROP TABLE IF EXISTS `m_demo`;
CREATE TABLE `m_demo`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `anak_ke` int(10) UNSIGNED NULL DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jam_kerja_mulai` time(0) NULL DEFAULT NULL,
  `jam_kerja_selesai` time(0) NULL DEFAULT NULL,
  `minat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hobi` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tgl_kontrak` datetime(0) NULL DEFAULT NULL,
  `isi_kontrak` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_demo_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa`;
CREATE TABLE `m_diagnosa`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `induk_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_warna` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_penyakit_khusus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `confignotif` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_diagnosa_induk_id_index`(`induk_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_induk_id_foreign` FOREIGN KEY (`induk_id`) REFERENCES `m_diagnosa_induk` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_bpjs`;
CREATE TABLE `m_diagnosa_bpjs`  (
  `kdDiag` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmDiag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonSpesialis` tinyint(1) NOT NULL DEFAULT 0,
  `diagnosa_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdDiag`) USING BTREE,
  INDEX `m_diagnosa_bpjs_diagnosa_id_foreign`(`diagnosa_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_bpjs_diagnosa_id_foreign` FOREIGN KEY (`diagnosa_id`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_gizi
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_gizi`;
CREATE TABLE `m_diagnosa_gizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `jenis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_induk
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_induk`;
CREATE TABLE `m_diagnosa_induk`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_keperawatan_detail
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_keperawatan_detail`;
CREATE TABLE `m_diagnosa_keperawatan_detail`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_kelas_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `definisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `versi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_diagnosa_keperawatan_detail_diagnosa_kelas_id_foreign`(`diagnosa_kelas_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_keperawatan_detail_diagnosa_kelas_id_foreign` FOREIGN KEY (`diagnosa_kelas_id`) REFERENCES `m_diagnosa_keperawatan_kelas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_keperawatan_domain
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_keperawatan_domain`;
CREATE TABLE `m_diagnosa_keperawatan_domain`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_keperawatan_faktor
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_keperawatan_faktor`;
CREATE TABLE `m_diagnosa_keperawatan_faktor`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `diagnosa_detail_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `for` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_diagnosa_keperawatan_faktor_diagnosa_detail_id_foreign`(`diagnosa_detail_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_keperawatan_faktor_diagnosa_detail_id_foreign` FOREIGN KEY (`diagnosa_detail_id`) REFERENCES `m_diagnosa_keperawatan_detail` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_keperawatan_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_keperawatan_kelas`;
CREATE TABLE `m_diagnosa_keperawatan_kelas`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_domain_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_diagnosa_keperawatan_kelas_diagnosa_domain_id_foreign`(`diagnosa_domain_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_keperawatan_kelas_diagnosa_domain_id_foreign` FOREIGN KEY (`diagnosa_domain_id`) REFERENCES `m_diagnosa_keperawatan_domain` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_diagnosa_sisrute
-- ----------------------------
DROP TABLE IF EXISTS `m_diagnosa_sisrute`;
CREATE TABLE `m_diagnosa_sisrute`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_diagnosa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_diagnosa_sisrute_diagnosa_id_foreign`(`diagnosa_id`) USING BTREE,
  CONSTRAINT `m_diagnosa_sisrute_diagnosa_id_foreign` FOREIGN KEY (`diagnosa_id`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_dokter_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_dokter_bpjs`;
CREATE TABLE `m_dokter_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdDokter` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmDokter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_dokter_bpjs_pegawai_id_unique`(`pegawai_id`) USING BTREE,
  CONSTRAINT `m_dokter_bpjs_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_dusun
-- ----------------------------
DROP TABLE IF EXISTS `m_dusun`;
CREATE TABLE `m_dusun`  (
  `id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_dusun_kelurahan_id_index`(`kelurahan_id`) USING BTREE,
  INDEX `m_dusun_nama_index`(`nama`) USING BTREE,
  CONSTRAINT `m_dusun_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_imt_umur
-- ----------------------------
DROP TABLE IF EXISTS `m_imt_umur`;
CREATE TABLE `m_imt_umur`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_tahun` int(11) NOT NULL,
  `umur_bulan` int(11) NOT NULL,
  `imt` double(5, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2165 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_imunisasi
-- ----------------------------
DROP TABLE IF EXISTS `m_imunisasi`;
CREATE TABLE `m_imunisasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imunisasi_kode` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imunisasi_nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktif` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `untuk_kategori` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_imunisasi_imunisasi_kode_unique`(`imunisasi_kode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_instalasi
-- ----------------------------
DROP TABLE IF EXISTS `m_instalasi`;
CREATE TABLE `m_instalasi`  (
  `id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_pelayanan` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `m_jadwal`;
CREATE TABLE `m_jadwal`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` tinyint(4) NULL DEFAULT 0,
  `jam_mulai` time(0) NULL DEFAULT NULL,
  `jam_selesai` time(0) NULL DEFAULT NULL,
  `kuota` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_jadwal_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `m_jadwal_id_ruangan_id_index`(`id`, `ruangan_id`) USING BTREE,
  CONSTRAINT `m_jadwal_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_jadwalimunisasi
-- ----------------------------
DROP TABLE IF EXISTS `m_jadwalimunisasi`;
CREATE TABLE `m_jadwalimunisasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `umur` int(11) NOT NULL,
  `imunisasi_kode` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_jadwalimunisasi_imunisasi_kode_unique`(`imunisasi_kode`) USING BTREE,
  CONSTRAINT `m_jadwalimunisasi_imunisasi_kode_foreign` FOREIGN KEY (`imunisasi_kode`) REFERENCES `m_imunisasi` (`imunisasi_kode`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_jenis_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis_laboratorium`;
CREATE TABLE `m_jenis_laboratorium`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pemeriksaan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_jenispegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_jenispegawai`;
CREATE TABLE `m_jenispegawai`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok_pegawai` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kamar
-- ----------------------------
DROP TABLE IF EXISTS `m_kamar`;
CREATE TABLE `m_kamar`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdPoli` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kamar_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `m_kamar_kdpoli_foreign`(`kdPoli`) USING BTREE,
  CONSTRAINT `m_kamar_kdpoli_foreign` FOREIGN KEY (`kdPoli`) REFERENCES `m_ruangan_bpjs` (`kdPoli`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `m_kamar_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `m_kecamatan`;
CREATE TABLE `m_kecamatan`  (
  `id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kecamatan_kota_id_index`(`kota_id`) USING BTREE,
  INDEX `m_kecamatan_nama_index`(`nama`) USING BTREE,
  CONSTRAINT `m_kecamatan_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kelurahan
-- ----------------------------
DROP TABLE IF EXISTS `m_kelurahan`;
CREATE TABLE `m_kelurahan`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kelurahan_kecamatan_id_index`(`kecamatan_id`) USING BTREE,
  INDEX `m_kelurahan_nama_index`(`nama`) USING BTREE,
  CONSTRAINT `m_kelurahan_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kelurahan_eis
-- ----------------------------
DROP TABLE IF EXISTS `m_kelurahan_eis`;
CREATE TABLE `m_kelurahan_eis`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kelurahan_eis_kelurahan_id_index`(`kelurahan_id`) USING BTREE,
  CONSTRAINT `m_kelurahan_eis_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kesadaran_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_kesadaran_bpjs`;
CREATE TABLE `m_kesadaran_bpjs`  (
  `kdSadar` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmSadar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesadaran_value` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdSadar`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kms
-- ----------------------------
DROP TABLE IF EXISTS `m_kms`;
CREATE TABLE `m_kms`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_kms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pekerjaan_ayah` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_ibu` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `macam_persalinan` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `persalinan_oleh` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anak_ke` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_persalinan` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `neonatal_1` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `neonatal_2` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `neonatal_3` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `neonatal_4` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vita` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kms_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `m_kms_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 388 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kota
-- ----------------------------
DROP TABLE IF EXISTS `m_kota`;
CREATE TABLE `m_kota`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kota_propinsi_id_index`(`propinsi_id`) USING BTREE,
  INDEX `m_kota_nama_index`(`nama`) USING BTREE,
  CONSTRAINT `m_kota_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kpsp_form
-- ----------------------------
DROP TABLE IF EXISTS `m_kpsp_form`;
CREATE TABLE `m_kpsp_form`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `umur_bayi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivitas` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 158 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kpsp_hasil
-- ----------------------------
DROP TABLE IF EXISTS `m_kpsp_hasil`;
CREATE TABLE `m_kpsp_hasil`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interpretasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_kpsp_hasil_code_index`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_kpsp_stimulasi
-- ----------------------------
DROP TABLE IF EXISTS `m_kpsp_stimulasi`;
CREATE TABLE `m_kpsp_stimulasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `umur_bayi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahapan_perkembangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stimulasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `m_laboratorium`;
CREATE TABLE `m_laboratorium`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_pemeriksaan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_normal` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `satuan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sampel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tarif` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `orders` double(4, 2) NULL DEFAULT 0.00,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_laboratorium_jenis_laboratorium_id_foreign`(`jenis_laboratorium_id`) USING BTREE,
  CONSTRAINT `m_laboratorium_jenis_laboratorium_id_foreign` FOREIGN KEY (`jenis_laboratorium_id`) REFERENCES `m_jenis_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laboratorium_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_laboratorium_bpjs`;
CREATE TABLE `m_laboratorium_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PemeriksaanBpjs` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laboratorium_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_laboratorium_bpjs_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  CONSTRAINT `m_laboratorium_bpjs_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `m_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laporan
-- ----------------------------
DROP TABLE IF EXISTS `m_laporan`;
CREATE TABLE `m_laporan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_laporan` enum('bulan','tahun','semester','triwulan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_laporan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kumulatif` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `limit_per_page` mediumint(9) NULL DEFAULT NULL,
  `view_dinkes` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `view_puskesmas` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_riwayat_input` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 853 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laporan_data
-- ----------------------------
DROP TABLE IF EXISTS `m_laporan_data`;
CREATE TABLE `m_laporan_data`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `column` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `detail` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_laporan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `column_status` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_element` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lookup` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `default_value` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `formula` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `formula_kumulatif` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `source` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lap_query` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `target` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `attributes` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `target_attribute` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_laporan_data_label_id_foreign`(`label_id`) USING BTREE,
  CONSTRAINT `m_laporan_data_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `m_laporan_label` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41454 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laporan_label
-- ----------------------------
DROP TABLE IF EXISTS `m_laporan_label`;
CREATE TABLE `m_laporan_label`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `laporan_id` int(10) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `for` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `group` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `a` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `b` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `c` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `d` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `e` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `f` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `g` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `h` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `i` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `j` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `k` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `l` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `m` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `n` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `o` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `p` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `q` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `r` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `s` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `t` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `u` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `v` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `w` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `x` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `y` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `z` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aa` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ab` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ac` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ad` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ae` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `af` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ag` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ah` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ai` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aj` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ak` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `al` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `am` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `an` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ao` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ap` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aq` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ar` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `as` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `at` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `au` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `av` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aw` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ax` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ay` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `az` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ba` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bb` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bc` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bd` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `be` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bf` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bg` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bh` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bi` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bj` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bk` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bl` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bm` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bn` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bo` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bp` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bq` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `br` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bs` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bt` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bu` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bv` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bw` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bx` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `by` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bz` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ca` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cb` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cc` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cd` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ce` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cf` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cg` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ch` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ci` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cj` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ck` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cl` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cm` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cn` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `co` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cp` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cq` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cr` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cs` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ct` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cu` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cv` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cw` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cx` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cy` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cz` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `da` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `db` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dc` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dd` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `de` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `df` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dg` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dh` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `di` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dj` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dk` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dl` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dm` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dn` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `do` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dp` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dq` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dr` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ds` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dt` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `du` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dv` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dw` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dx` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dy` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dz` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ea` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eb` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ec` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ed` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ee` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ef` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eg` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eh` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ei` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ej` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ek` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `el` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `em` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `en` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eo` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ep` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eq` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `er` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `es` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `et` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eu` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ev` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ew` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ex` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ey` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ez` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fa` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fb` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fc` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fd` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ff` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_laporan_label_laporan_id_foreign`(`laporan_id`) USING BTREE,
  CONSTRAINT `m_laporan_label_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `m_laporan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24405 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_laporan_lookup
-- ----------------------------
DROP TABLE IF EXISTS `m_laporan_lookup`;
CREATE TABLE `m_laporan_lookup`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(10) UNSIGNED NOT NULL,
  `for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_laporan_lookup_for_value_label_unique`(`for`, `value`, `label`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 265 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_lookup
-- ----------------------------
DROP TABLE IF EXISTS `m_lookup`;
CREATE TABLE `m_lookup`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(10) UNSIGNED NOT NULL,
  `for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_lookup_for_value_label_unique`(`for`, `value`, `label`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 551 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_nic_aktivitas
-- ----------------------------
DROP TABLE IF EXISTS `m_nic_aktivitas`;
CREATE TABLE `m_nic_aktivitas`  (
  `kode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NULL DEFAULT 1,
  `noc_nic_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode`) USING BTREE,
  INDEX `m_nic_aktivitas_noc_nic_detail_id_foreign`(`noc_nic_detail_id`) USING BTREE,
  CONSTRAINT `m_nic_aktivitas_noc_nic_detail_id_foreign` FOREIGN KEY (`noc_nic_detail_id`) REFERENCES `m_noc_nic_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_noc_indikator
-- ----------------------------
DROP TABLE IF EXISTS `m_noc_indikator`;
CREATE TABLE `m_noc_indikator`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NULL DEFAULT 1,
  `noc_nic_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_noc_indikator_noc_nic_detail_id_foreign`(`noc_nic_detail_id`) USING BTREE,
  CONSTRAINT `m_noc_indikator_noc_nic_detail_id_foreign` FOREIGN KEY (`noc_nic_detail_id`) REFERENCES `m_noc_nic_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_noc_nic_detail
-- ----------------------------
DROP TABLE IF EXISTS `m_noc_nic_detail`;
CREATE TABLE `m_noc_nic_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `definisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `for` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dipertahankan_pada` double(6, 2) NULL DEFAULT 0.00,
  `ditingkatkan_ke` double(6, 2) NULL DEFAULT 0.00,
  `skala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_detail_ids` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `versi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noc_nic_kelas_ids` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_noc_nic_detail_noc_nic_kelas_id_foreign`(`noc_nic_kelas_ids`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_noc_nic_domain
-- ----------------------------
DROP TABLE IF EXISTS `m_noc_nic_domain`;
CREATE TABLE `m_noc_nic_domain`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `definisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_noc_nic_kelas
-- ----------------------------
DROP TABLE IF EXISTS `m_noc_nic_kelas`;
CREATE TABLE `m_noc_nic_kelas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `definisi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `noc_nic_domain_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_noc_nic_kelas_noc_nic_domain_id_foreign`(`noc_nic_domain_id`) USING BTREE,
  CONSTRAINT `m_noc_nic_kelas_noc_nic_domain_id_foreign` FOREIGN KEY (`noc_nic_domain_id`) REFERENCES `m_noc_nic_domain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_obat
-- ----------------------------
DROP TABLE IF EXISTS `m_obat`;
CREATE TABLE `m_obat`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_title` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_unit` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_jenis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'OBAT',
  `pemesanan_tujuan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_efk` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `jumlah_stok` double(16, 2) NULL DEFAULT NULL,
  `eis_code` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_obat_obat_title_index`(`obat_title`) USING BTREE,
  INDEX `m_obat_obat_unit_index`(`obat_unit`) USING BTREE,
  CONSTRAINT `m_obat_obat_title_foreign` FOREIGN KEY (`obat_title`) REFERENCES `m_obat_title` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_obat_obat_unit_foreign` FOREIGN KEY (`obat_unit`) REFERENCES `m_obat_unit` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_obat_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_obat_bpjs`;
CREATE TABLE `m_obat_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdObat` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmObat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sedia` double(16, 2) NULL DEFAULT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_obat_bpjs_obat_id_unique`(`obat_id`) USING BTREE,
  CONSTRAINT `m_obat_bpjs_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_obat_eis
-- ----------------------------
DROP TABLE IF EXISTS `m_obat_eis`;
CREATE TABLE `m_obat_eis`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_obat` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_satuan_eis_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_obat_eis_obat_id_unique`(`obat_id`) USING BTREE,
  INDEX `m_obat_eis_obat_satuan_eis_id_foreign`(`obat_satuan_eis_id`) USING BTREE,
  CONSTRAINT `m_obat_eis_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_obat_eis_obat_satuan_eis_id_foreign` FOREIGN KEY (`obat_satuan_eis_id`) REFERENCES `m_satuan_obat_eis` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 327 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_obat_title
-- ----------------------------
DROP TABLE IF EXISTS `m_obat_title`;
CREATE TABLE `m_obat_title`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_obat_unit
-- ----------------------------
DROP TABLE IF EXISTS `m_obat_unit`;
CREATE TABLE `m_obat_unit`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_odontogram
-- ----------------------------
DROP TABLE IF EXISTS `m_odontogram`;
CREATE TABLE `m_odontogram`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3864 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_paket_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `m_paket_laboratorium`;
CREATE TABLE `m_paket_laboratorium`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemeriksaan_laboratorium` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `tarif` double(8, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_pasien
-- ----------------------------
DROP TABLE IF EXISTS `m_pasien`;
CREATE TABLE `m_pasien`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rm_lama` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_dok_rm` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_asuransi` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_kk` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `gol_darah` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `imd` tinyint(1) NULL DEFAULT NULL,
  `tb_lahir` double(4, 1) NULL DEFAULT NULL,
  `bb_lahir` double(4, 1) NULL DEFAULT NULL,
  `pekerjaan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instansi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_keluarga` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `warganegara` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rt` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rw` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_alamat_berbeda` tinyint(1) NOT NULL DEFAULT 0,
  `ktp_alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_rt` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_rw` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ktp_dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `pasien_id_cloud` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `verified_at` timestamp(0) NULL DEFAULT NULL,
  `verified_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `reg_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0 = aplikasi, 1 = mobile, 2 = kiosk, 3 = sms, 4 = epuskesmas-o2o, 5 = poltekes',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_pasien_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `m_pasien_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `m_pasien_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `m_pasien_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `m_pasien_dusun_id_foreign`(`dusun_id`) USING BTREE,
  INDEX `m_pasien_asuransi_id_foreign`(`asuransi_id`) USING BTREE,
  INDEX `m_pasien_pekerjaan_id_foreign`(`pekerjaan_id`) USING BTREE,
  INDEX `m_pasien_ktp_propinsi_id_foreign`(`ktp_propinsi_id`) USING BTREE,
  INDEX `m_pasien_ktp_kota_id_foreign`(`ktp_kota_id`) USING BTREE,
  INDEX `m_pasien_ktp_kecamatan_id_foreign`(`ktp_kecamatan_id`) USING BTREE,
  INDEX `m_pasien_ktp_kelurahan_id_foreign`(`ktp_kelurahan_id`) USING BTREE,
  INDEX `m_pasien_ktp_dusun_id_foreign`(`ktp_dusun_id`) USING BTREE,
  CONSTRAINT `m_pasien_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `m_asuransi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_ktp_dusun_id_foreign` FOREIGN KEY (`ktp_dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_ktp_kecamatan_id_foreign` FOREIGN KEY (`ktp_kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_ktp_kelurahan_id_foreign` FOREIGN KEY (`ktp_kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_ktp_kota_id_foreign` FOREIGN KEY (`ktp_kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_ktp_propinsi_id_foreign` FOREIGN KEY (`ktp_propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `m_pekerjaan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_pasien_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `m_pegawai`;
CREATE TABLE `m_pegawai`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenispegawai_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `tempat_lahir` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan_terakhir` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_lulus` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_jabatan` date NULL DEFAULT NULL,
  `status_kepegawaian` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_status_kepegawaian` date NULL DEFAULT NULL,
  `golongan_pangkat` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_golongan_pangkat` date NULL DEFAULT NULL,
  `masa_golongan_tahun` double NULL DEFAULT NULL,
  `masa_golongan_bulan` double NULL DEFAULT NULL,
  `jabatan_struktural` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_jabatan_struktural` date NULL DEFAULT NULL,
  `tempat_kerja` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ket_tempat_kerja` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mulai_kerja` date NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `pegawai_id_cloud` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_pegawai_jenispegawai_id_foreign`(`jenispegawai_id`) USING BTREE,
  CONSTRAINT `m_pegawai_jenispegawai_id_foreign` FOREIGN KEY (`jenispegawai_id`) REFERENCES `m_jenispegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_pekerjaan
-- ----------------------------
DROP TABLE IF EXISTS `m_pekerjaan`;
CREATE TABLE `m_pekerjaan`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_pekerjaan_nama_index`(`nama`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_periksafisik
-- ----------------------------
DROP TABLE IF EXISTS `m_periksafisik`;
CREATE TABLE `m_periksafisik`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `teknik_pemeriksaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_peserta_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_peserta_bpjs`;
CREATE TABLE `m_peserta_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noKartu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noKTP` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hubunganKeluarga` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglLahir` date NULL DEFAULT NULL,
  `tglMulaiAktif` date NULL DEFAULT NULL,
  `tglAkhirBerlaku` date NULL DEFAULT NULL,
  `kdProviderPst_kdProvider` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdProviderPst_nmProvider` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdProviderGigi_kdProvider` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdProviderGigi_nmProvider` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jnsKelas_nama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jnsKelas_kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jnsPeserta_nama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jnsPeserta_kode` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `golDarah` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noHP` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pstProl` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pstPrb` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktif` tinyint(1) NULL DEFAULT NULL,
  `ketAktif` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_kdAsuransi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_nmAsuransi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_noAsuransi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_cob` tinyint(1) NULL DEFAULT NULL,
  `tunggakan` double UNSIGNED NULL DEFAULT 0,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_peserta_bpjs_nokartu_unique`(`noKartu`) USING BTREE,
  INDEX `m_peserta_bpjs_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `m_peserta_bpjs_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3606 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_peserta_bpjs_jenis_kepesertaan
-- ----------------------------
DROP TABLE IF EXISTS `m_peserta_bpjs_jenis_kepesertaan`;
CREATE TABLE `m_peserta_bpjs_jenis_kepesertaan`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_bantuan` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_upah` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_poli_fktl_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_poli_fktl_bpjs`;
CREATE TABLE `m_poli_fktl_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdPoli` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmPoli` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = spesialis, 0 = khusus',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_poli_fktl_bpjs_kdpoli_polisakit_index`(`kdPoli`, `type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_poli_subspesialis_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_poli_subspesialis_bpjs`;
CREATE TABLE `m_poli_subspesialis_bpjs`  (
  `kdSubSpesialis` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmSubSpesialis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdPoliRujuk` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdSpesialis` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdSubSpesialis`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_program
-- ----------------------------
DROP TABLE IF EXISTS `m_program`;
CREATE TABLE `m_program`  (
  `id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_laporan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_option` tinyint(1) NOT NULL DEFAULT 0,
  `input_option_detail` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `input_type` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_option_view` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `eis_api_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `model_name` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_program_jenis_laporan_foreign`(`jenis_laporan`) USING BTREE,
  CONSTRAINT `m_program_jenis_laporan_foreign` FOREIGN KEY (`jenis_laporan`) REFERENCES `m_program_jenis` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_program_form
-- ----------------------------
DROP TABLE IF EXISTS `m_program_form`;
CREATE TABLE `m_program_form`  (
  `id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) UNSIGNED NULL DEFAULT 0,
  `tab` int(10) UNSIGNED NULL DEFAULT 0,
  `type` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_detail` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribute` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lookup_fill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` double(8, 2) NOT NULL,
  `kelompok_dashboard` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'field untuk mengelompokan dashboard sip, salah satu syarat untuk grafik dashboard tipe kelompok',
  `formula` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eis_code` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_program_form_program_id_foreign`(`program_id`) USING BTREE,
  CONSTRAINT `m_program_form_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `m_program` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_program_jenis
-- ----------------------------
DROP TABLE IF EXISTS `m_program_jenis`;
CREATE TABLE `m_program_jenis`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_propinsi
-- ----------------------------
DROP TABLE IF EXISTS `m_propinsi`;
CREATE TABLE `m_propinsi`  (
  `id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_propinsi_nama_index`(`nama`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_provider_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_provider_bpjs`;
CREATE TABLE `m_provider_bpjs`  (
  `kdProvider` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmProvider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuanrujukan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdProvider`) USING BTREE,
  INDEX `m_provider_bpjs_tujuanrujukan_id_foreign`(`tujuanrujukan_id`) USING BTREE,
  CONSTRAINT `m_provider_bpjs_tujuanrujukan_id_foreign` FOREIGN KEY (`tujuanrujukan_id`) REFERENCES `m_tujuanrujukan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_puskesmas
-- ----------------------------
DROP TABLE IF EXISTS `m_puskesmas`;
CREATE TABLE `m_puskesmas`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kemendagri` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_puskesmas` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PUSKESMAS',
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `db_connection` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `db_database` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jejaring_puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_nama_for_surat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_telp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kapus_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `koordinator_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_pembayaran` datetime(0) NULL DEFAULT NULL,
  `tanggal_jatuhtempo` datetime(0) NULL DEFAULT NULL,
  `tanggal_tunda` tinyint(4) NOT NULL DEFAULT 3,
  `tanggal_pemberitahuan` date NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_nama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_kontak` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pic_jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_suspend` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `stok_obat_realtime` tinyint(1) NULL DEFAULT 1,
  `api_key` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `api_key_center_view_jawa_timur` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url_kiosk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `restrict_action` tinyint(1) NOT NULL DEFAULT 0,
  `show_riwayat` int(11) NOT NULL DEFAULT 0,
  `localhost` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_puskesmas_kapus_id_foreign`(`kapus_id`) USING BTREE,
  INDEX `m_puskesmas_koordinator_id_foreign`(`koordinator_id`) USING BTREE,
  INDEX `m_puskesmas_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `m_puskesmas_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `m_puskesmas_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `m_puskesmas_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `m_puskesmas_dusun_id_foreign`(`dusun_id`) USING BTREE,
  CONSTRAINT `m_puskesmas_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_kapus_id_foreign` FOREIGN KEY (`kapus_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_koordinator_id_foreign` FOREIGN KEY (`koordinator_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_puskesmas_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_riwayatpasien
-- ----------------------------
DROP TABLE IF EXISTS `m_riwayatpasien`;
CREATE TABLE `m_riwayatpasien`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `anamnesa_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_riwayat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `riwayat_id_cloud` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_riwayatpasien_anamnesa_id_foreign`(`anamnesa_id`) USING BTREE,
  INDEX `m_riwayatpasien_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `m_riwayatpasien_anamnesa_id_foreign` FOREIGN KEY (`anamnesa_id`) REFERENCES `t_anamnesa` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `m_riwayatpasien_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2308 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `m_ruangan`;
CREATE TABLE `m_ruangan`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instalasi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poli_sakit` tinyint(1) NOT NULL DEFAULT 1,
  `kdPoli` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_antrean_pelayanan` tinyint(1) NOT NULL DEFAULT 0,
  `is_antrean_resep` tinyint(1) NOT NULL DEFAULT 0,
  `is_antrean_lab` tinyint(1) NOT NULL DEFAULT 0,
  `is_lplpo` tinyint(1) NOT NULL DEFAULT 0,
  `default_resep` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_resep` tinyint(1) NOT NULL DEFAULT 1,
  `permission_roles` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `batas_hari_booking` tinyint(3) UNSIGNED NULL DEFAULT 7,
  `code` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_aktif` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'Y',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_ruangan_instalasi_id_foreign`(`instalasi_id`) USING BTREE,
  INDEX `m_ruangan_kdpoli_foreign`(`kdPoli`) USING BTREE,
  CONSTRAINT `m_ruangan_instalasi_id_foreign` FOREIGN KEY (`instalasi_id`) REFERENCES `m_instalasi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_ruangan_kdpoli_foreign` FOREIGN KEY (`kdPoli`) REFERENCES `m_ruangan_bpjs` (`kdPoli`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_ruangan_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_ruangan_bpjs`;
CREATE TABLE `m_ruangan_bpjs`  (
  `kdPoli` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmPoli` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poliSakit` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdPoli`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_sarana_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_sarana_bpjs`;
CREATE TABLE `m_sarana_bpjs`  (
  `kdSarana` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmSarana` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdSarana`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_satuan_obat_eis
-- ----------------------------
DROP TABLE IF EXISTS `m_satuan_obat_eis`;
CREATE TABLE `m_satuan_obat_eis`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_sekolah
-- ----------------------------
DROP TABLE IF EXISTS `m_sekolah`;
CREATE TABLE `m_sekolah`  (
  `id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_sekolah_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `m_sekolah_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `m_sekolah_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `m_sekolah_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `m_sekolah_dusun_id_foreign`(`dusun_id`) USING BTREE,
  CONSTRAINT `m_sekolah_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_sekolah_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_sekolah_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_sekolah_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_sekolah_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_signa
-- ----------------------------
DROP TABLE IF EXISTS `m_signa`;
CREATE TABLE `m_signa`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 177 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_sip_ukp_kesakitan_umum_list
-- ----------------------------
DROP TABLE IF EXISTS `m_sip_ukp_kesakitan_umum_list`;
CREATE TABLE `m_sip_ukp_kesakitan_umum_list`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diagnosa` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL,
  `group` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eis_code` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_sip_ukp_kesakitan_umum_list_title_id_foreign`(`title_id`) USING BTREE,
  CONSTRAINT `m_sip_ukp_kesakitan_umum_list_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `m_sip_ukp_kesakitan_umum_title` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 241 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_sip_ukp_kesakitan_umum_title
-- ----------------------------
DROP TABLE IF EXISTS `m_sip_ukp_kesakitan_umum_title`;
CREATE TABLE `m_sip_ukp_kesakitan_umum_title`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `m_siswa`;
CREATE TABLE `m_siswa`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nisn` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_asuransi` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `golongan_darah` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_orangtua` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rw` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rt` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_disabilitas` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_siswa_sekolah_id_foreign`(`sekolah_id`) USING BTREE,
  INDEX `m_siswa_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `m_siswa_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `m_siswa_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `m_siswa_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `m_siswa_asuransi_id_foreign`(`asuransi_id`) USING BTREE,
  INDEX `m_siswa_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `m_siswa_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `m_asuransi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_siswa_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_siswa_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_siswa_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_siswa_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `m_siswa_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_siswa_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `m_sekolah` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_skrining
-- ----------------------------
DROP TABLE IF EXISTS `m_skrining`;
CREATE TABLE `m_skrining`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order` int(10) UNSIGNED NOT NULL,
  `value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_soap
-- ----------------------------
DROP TABLE IF EXISTS `m_soap`;
CREATE TABLE `m_soap`  (
  `id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_soap_detail
-- ----------------------------
DROP TABLE IF EXISTS `m_soap_detail`;
CREATE TABLE `m_soap_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `soap_id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `label` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `for` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_soap_detail_soap_id_foreign`(`soap_id`) USING BTREE,
  CONSTRAINT `m_soap_detail_soap_id_foreign` FOREIGN KEY (`soap_id`) REFERENCES `m_soap` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 247 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_statuspulang
-- ----------------------------
DROP TABLE IF EXISTS `m_statuspulang`;
CREATE TABLE `m_statuspulang`  (
  `id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_statuspulang_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_statuspulang_bpjs`;
CREATE TABLE `m_statuspulang_bpjs`  (
  `kdStatusPulang` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmStatusPulang` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statuspulang_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kdStatusPulang`) USING BTREE,
  INDEX `m_statuspulang_bpjs_statuspulang_id_foreign`(`statuspulang_id`) USING BTREE,
  CONSTRAINT `m_statuspulang_bpjs_statuspulang_id_foreign` FOREIGN KEY (`statuspulang_id`) REFERENCES `m_statuspulang` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_stok_obat
-- ----------------------------
DROP TABLE IF EXISTS `m_stok_obat`;
CREATE TABLE `m_stok_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `harga_jual` double NOT NULL,
  `barcode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batch` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `jumlah_stok` double(16, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_stok_obat_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `m_stok_obat_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `m_stok_obat_obat_id_foreign`(`obat_id`) USING BTREE,
  CONSTRAINT `m_stok_obat_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_stok_obat_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_stok_obat_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2329 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tarif_karcis
-- ----------------------------
DROP TABLE IF EXISTS `m_tarif_karcis`;
CREATE TABLE `m_tarif_karcis`  (
  `id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asuransi_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_tarif_karcis_asuransi_id_foreign`(`asuransi_id`) USING BTREE,
  INDEX `m_tarif_karcis_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  CONSTRAINT `m_tarif_karcis_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `m_asuransi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_tarif_karcis_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_terapi_gizi
-- ----------------------------
DROP TABLE IF EXISTS `m_terapi_gizi`;
CREATE TABLE `m_terapi_gizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tindakan
-- ----------------------------
DROP TABLE IF EXISTS `m_tindakan`;
CREATE TABLE `m_tindakan`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` char(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` int(10) UNSIGNED NULL DEFAULT 0,
  `tipe` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tindakan_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `m_tindakan_bpjs`;
CREATE TABLE `m_tindakan_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdTindakan` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmTindakan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxTarif` double(16, 2) NULL DEFAULT NULL,
  `withValue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdTkp` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_tindakan_bpjs_tindakan_id_unique`(`tindakan_id`) USING BTREE,
  CONSTRAINT `m_tindakan_bpjs_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `m_tindakan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tinggibadan_umur
-- ----------------------------
DROP TABLE IF EXISTS `m_tinggibadan_umur`;
CREATE TABLE `m_tinggibadan_umur`  (
  `tinggibadan_umur_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` int(11) NOT NULL,
  `tinggi_badan` double(5, 2) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tinggibadan_umur_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tujuan_pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `m_tujuan_pemesanan`;
CREATE TABLE `m_tujuan_pemesanan`  (
  `id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bridging_efarmasi` tinyint(1) NOT NULL DEFAULT 0,
  `order` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tujuan_rujukan_sisrute
-- ----------------------------
DROP TABLE IF EXISTS `m_tujuan_rujukan_sisrute`;
CREATE TABLE `m_tujuan_rujukan_sisrute`  (
  `id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_faskes` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_rujukan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_tujuan_rujukan_sisrute_tujuan_rujukan_id_unique`(`tujuan_rujukan_id`) USING BTREE,
  CONSTRAINT `m_tujuan_rujukan_sisrute_tujuan_rujukan_id_foreign` FOREIGN KEY (`tujuan_rujukan_id`) REFERENCES `m_tujuanrujukan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_tujuanrujukan
-- ----------------------------
DROP TABLE IF EXISTS `m_tujuanrujukan`;
CREATE TABLE `m_tujuanrujukan`  (
  `id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for m_wilayah
-- ----------------------------
DROP TABLE IF EXISTS `m_wilayah`;
CREATE TABLE `m_wilayah`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kelurahan_id` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `longitude` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `latitude` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `m_wilayah_kelurahan_id_index`(`kelurahan_id`) USING BTREE,
  INDEX `m_wilayah_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  CONSTRAINT `m_wilayah_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `m_wilayah_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 709 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `permission_role_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 594 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_detail
-- ----------------------------
DROP TABLE IF EXISTS `r_detail`;
CREATE TABLE `r_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_id` int(10) UNSIGNED NOT NULL,
  `label_id` int(10) UNSIGNED NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `a` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `b` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `c` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `d` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `e` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `f` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `g` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `h` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `i` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `j` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `k` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `l` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `m` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `n` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `o` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `p` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `q` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `r` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `s` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `t` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `u` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `v` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `w` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `x` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `y` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `z` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ad` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ae` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `af` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ai` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `al` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `am` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `an` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ap` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `as` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `at` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `au` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `av` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aw` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ay` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `az` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ba` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `be` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `br` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bw` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ca` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ce` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cf` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ch` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ci` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ck` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `co` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ct` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cw` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `da` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `db` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `de` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `df` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `di` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `do` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ds` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `du` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dv` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dw` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dx` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dz` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ea` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ec` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ed` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ee` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ef` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ei` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ej` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ek` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `el` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `em` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ep` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eq` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `er` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `es` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `et` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ev` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ew` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ex` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ey` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ez` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fd` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ff` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fl` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fm` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `fn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_detail_label_id_foreign`(`label_id`) USING BTREE,
  INDEX `r_detail_header_id_foreign`(`header_id`) USING BTREE,
  CONSTRAINT `r_detail_header_id_foreign` FOREIGN KEY (`header_id`) REFERENCES `r_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `r_detail_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `m_laporan_label` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_header
-- ----------------------------
DROP TABLE IF EXISTS `r_header`;
CREATE TABLE `r_header`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label_id` int(10) UNSIGNED NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `a` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `b` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `c` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `d` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `e` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `f` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `g` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `h` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `i` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `j` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `k` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `l` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `m` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `n` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `o` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `p` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `q` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `r` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `s` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `t` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `u` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `v` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `w` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `x` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `y` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `z` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aa` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ab` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ac` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ad` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ae` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `af` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ag` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ah` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ai` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ak` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `al` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `am` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `an` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ao` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ap` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aq` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ar` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `as` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `at` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `au` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `av` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aw` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ax` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ay` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `az` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ba` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bc` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bd` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `be` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bf` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bg` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bh` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bk` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bl` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bm` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bn` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bo` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bp` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bq` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `br` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bs` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bt` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bu` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bv` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bw` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bx` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `by` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bz` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ca` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cc` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cd` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ce` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cf` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cg` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ch` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ci` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ck` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cl` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cm` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cn` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `co` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cp` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cq` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cr` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cs` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ct` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cu` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cv` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_header_label_id_foreign`(`label_id`) USING BTREE,
  CONSTRAINT `r_header_label_id_foreign` FOREIGN KEY (`label_id`) REFERENCES `m_laporan_label` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_kohort
-- ----------------------------
DROP TABLE IF EXISTS `r_kohort`;
CREATE TABLE `r_kohort`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `rujukan_dari` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_ibu` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jamkesmas` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `taksiran_persalinan` datetime(0) NULL DEFAULT NULL,
  `tanggal_hpht` datetime(0) NULL DEFAULT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `usia_kehamilan` int(11) NULL DEFAULT NULL,
  `trisemester_ke` int(11) NULL DEFAULT NULL,
  `anamnesis` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tekanan_darah` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lila` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_gizi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tinggi_fundus` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `refrex_pattela` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `djj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pap` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tbj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `presentasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_janin` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `djj1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pap1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tbj1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `presentasi1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `injeksi_tt` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catat_kia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fe` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `risiko_pertama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komplikasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_imunisasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hb` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anemia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `protein_uria` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gula_darah` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thalasemia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sifilis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hbsag` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujuk_ke` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_datang_dengan_hiv` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_perapdoinan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_pervaginaan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_ditawarkan_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_dilakukan_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_hasil_tes_hiv` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_mendapat_art` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_rdt` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_mikropis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_rdt1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_mikropis1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_darah_malaria` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_kina` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_kelambu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_diperiksa_ims` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_diterapi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_dahak` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_tbc` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_obat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phdk_diperiksa_hepatitis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phdk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_tiba` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_pulang` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdk_ankylostoma` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_kohort_thn_index`(`thn`) USING BTREE,
  INDEX `r_kohort_bln_index`(`bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 486 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_konseling_hiv
-- ----------------------------
DROP TABLE IF EXISTS `r_konseling_hiv`;
CREATE TABLE `r_konseling_hiv`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `variable` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `1_tahun_l` int(11) NOT NULL DEFAULT 0,
  `1_tahun_p` int(11) NOT NULL DEFAULT 0,
  `1_14_tahun_l` int(11) NOT NULL DEFAULT 0,
  `1_14_tahun_p` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_l` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_p` int(11) NOT NULL DEFAULT 0,
  `20_24_tahun_l` int(11) NOT NULL DEFAULT 0,
  `20_24_tahun_p` int(11) NOT NULL DEFAULT 0,
  `25_49_tahun_l` int(11) NOT NULL DEFAULT 0,
  `25_49_tahun_p` int(11) NOT NULL DEFAULT 0,
  `50_tahun_l` int(11) NOT NULL DEFAULT 0,
  `50_tahun_p` int(11) NOT NULL DEFAULT 0,
  `total_l` int(11) NOT NULL DEFAULT 0,
  `total_p` int(11) NOT NULL DEFAULT 0,
  `total_l_p` int(11) NOT NULL DEFAULT 0,
  `tb` int(11) NOT NULL DEFAULT 0,
  `diare` int(11) NOT NULL DEFAULT 0,
  `kandidiasisoralesovaginal` int(11) NOT NULL DEFAULT 0,
  `dermatitis` int(11) NOT NULL DEFAULT 0,
  `lgv` int(11) NOT NULL DEFAULT 0,
  `pcp` int(11) NOT NULL DEFAULT 0,
  `herpes` int(11) NOT NULL DEFAULT 0,
  `toksoplasmosis` int(11) NOT NULL DEFAULT 0,
  `wastingsyndrome` int(11) NOT NULL DEFAULT 0,
  `imslainnya` int(11) NOT NULL DEFAULT 0,
  `sifilis` int(11) NOT NULL DEFAULT 0,
  `lainnya` int(11) NOT NULL DEFAULT 0,
  `hepatitis` int(11) NOT NULL DEFAULT 0,
  `total_jumlah` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_konseling_hiv_thn_index`(`thn`) USING BTREE,
  INDEX `r_konseling_hiv_bln_index`(`bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_pemeriksaan_ims
-- ----------------------------
DROP TABLE IF EXISTS `r_pemeriksaan_ims`;
CREATE TABLE `r_pemeriksaan_ims`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `variable` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `1_tahun_l` int(11) NOT NULL DEFAULT 0,
  `1_tahun_p` int(11) NOT NULL DEFAULT 0,
  `1_14_tahun_l` int(11) NOT NULL DEFAULT 0,
  `1_14_tahun_p` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_l` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_p` int(11) NOT NULL DEFAULT 0,
  `20_24_tahun_l` int(11) NOT NULL DEFAULT 0,
  `20_24_tahun_p` int(11) NOT NULL DEFAULT 0,
  `25_49_tahun_l` int(11) NOT NULL DEFAULT 0,
  `25_49_tahun_p` int(11) NOT NULL DEFAULT 0,
  `50_tahun_l` int(11) NOT NULL DEFAULT 0,
  `50_tahun_p` int(11) NOT NULL DEFAULT 0,
  `risiko_wps` int(11) NOT NULL DEFAULT 0,
  `risiko_pps` int(11) NOT NULL DEFAULT 0,
  `risiko_waria` int(11) NOT NULL DEFAULT 0,
  `risiko_lsl` int(11) NOT NULL DEFAULT 0,
  `risiko_idu` int(11) NOT NULL DEFAULT 0,
  `risiko_pasangan_risti` int(11) NOT NULL DEFAULT 0,
  `risiko_pelanggan_ps` int(11) NOT NULL DEFAULT 0,
  `risiko_lain` int(11) NOT NULL DEFAULT 0,
  `total_l` int(11) NOT NULL DEFAULT 0,
  `total_p` int(11) NOT NULL DEFAULT 0,
  `total_risiko` int(11) NOT NULL DEFAULT 0,
  `total_jumlah` int(11) NOT NULL DEFAULT 0,
  `total_klinis` int(11) NOT NULL DEFAULT 0,
  `total_lab` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_pemeriksaan_ims_thn_index`(`thn`) USING BTREE,
  INDEX `r_pemeriksaan_ims_bln_index`(`bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_pemeriksaan_pkpr
-- ----------------------------
DROP TABLE IF EXISTS `r_pemeriksaan_pkpr`;
CREATE TABLE `r_pemeriksaan_pkpr`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `variable` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `10_14_tahun_br_lk` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_lm_lk` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_tot_lk` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_br_lk` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_lm_lk` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_tot_lk` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_br_pr` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_lm_pr` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_tot_pr` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_br_pr` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_lm_pr` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_tot_pr` int(11) NOT NULL DEFAULT 0,
  `kasus_datang_sendiri` int(11) NOT NULL DEFAULT 0,
  `kasus_pkm` int(11) NOT NULL DEFAULT 0,
  `kasus_rujukan_klinik_rinja` int(11) NOT NULL DEFAULT 0,
  `kasus_rujukan_uks` int(11) NOT NULL DEFAULT 0,
  `kasus_rujukan_kelp_sabaya` int(11) NOT NULL DEFAULT 0,
  `tindak_lain` int(11) NOT NULL DEFAULT 0,
  `tindak_medis` int(11) NOT NULL DEFAULT 0,
  `tindak_konseling` int(11) NOT NULL DEFAULT 0,
  `rujuk_rs` int(11) NOT NULL DEFAULT 0,
  `rujuk_pratik_spesialis` int(11) NOT NULL DEFAULT 0,
  `rujuk_lain` int(11) NOT NULL DEFAULT 0,
  `ket` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_pemeriksaan_pkpr_thn_index`(`thn`) USING BTREE,
  INDEX `r_pemeriksaan_pkpr_bln_index`(`bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 133 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_ptm
-- ----------------------------
DROP TABLE IF EXISTS `r_ptm`;
CREATE TABLE `r_ptm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurang_1_tahun_l` int(11) NOT NULL DEFAULT 0,
  `kurang_1_tahun_p` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_l` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_p` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_l` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_p` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_l` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_p` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_l` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_p` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_l` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_p` int(11) NOT NULL DEFAULT 0,
  `45_59_tahun_l` int(11) NOT NULL DEFAULT 0,
  `45_59_tahun_p` int(11) NOT NULL DEFAULT 0,
  `lebih_59_tahun_l` int(11) NOT NULL DEFAULT 0,
  `lebih_59_tahun_p` int(11) NOT NULL DEFAULT 0,
  `jumlah_kunjungan_l` int(11) NOT NULL DEFAULT 0,
  `jumlah_kunjungan_p` int(11) NOT NULL DEFAULT 0,
  `kasus_baru_l` int(11) NOT NULL DEFAULT 0,
  `kasus_baru_p` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_ptm_thn_index`(`thn`) USING BTREE,
  INDEX `r_ptm_bln_index`(`bln`) USING BTREE,
  INDEX `r_ptm_code_index`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_rekap_mtbs_mtbm
-- ----------------------------
DROP TABLE IF EXISTS `r_rekap_mtbs_mtbm`;
CREATE TABLE `r_rekap_mtbs_mtbm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int(11) NOT NULL,
  `variable` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kategori` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `1_l` int(11) NOT NULL DEFAULT 0,
  `1_p` int(11) NOT NULL DEFAULT 0,
  `2_l` int(11) NOT NULL DEFAULT 0,
  `2_p` int(11) NOT NULL DEFAULT 0,
  `3_l` int(11) NOT NULL DEFAULT 0,
  `3_p` int(11) NOT NULL DEFAULT 0,
  `4_l` int(11) NOT NULL DEFAULT 0,
  `4_p` int(11) NOT NULL DEFAULT 0,
  `5_l` int(11) NOT NULL DEFAULT 0,
  `5_p` int(11) NOT NULL DEFAULT 0,
  `6_l` int(11) NOT NULL DEFAULT 0,
  `6_p` int(11) NOT NULL DEFAULT 0,
  `7_l` int(11) NOT NULL DEFAULT 0,
  `7_p` int(11) NOT NULL DEFAULT 0,
  `8_l` int(11) NOT NULL DEFAULT 0,
  `8_p` int(11) NOT NULL DEFAULT 0,
  `9_l` int(11) NOT NULL DEFAULT 0,
  `9_p` int(11) NOT NULL DEFAULT 0,
  `10_l` int(11) NOT NULL DEFAULT 0,
  `10_p` int(11) NOT NULL DEFAULT 0,
  `11_l` int(11) NOT NULL DEFAULT 0,
  `11_p` int(11) NOT NULL DEFAULT 0,
  `12_l` int(11) NOT NULL DEFAULT 0,
  `12_p` int(11) NOT NULL DEFAULT 0,
  `13_l` int(11) NOT NULL DEFAULT 0,
  `13_p` int(11) NOT NULL DEFAULT 0,
  `14_l` int(11) NOT NULL DEFAULT 0,
  `14_p` int(11) NOT NULL DEFAULT 0,
  `15_l` int(11) NOT NULL DEFAULT 0,
  `15_p` int(11) NOT NULL DEFAULT 0,
  `16_l` int(11) NOT NULL DEFAULT 0,
  `16_p` int(11) NOT NULL DEFAULT 0,
  `17_l` int(11) NOT NULL DEFAULT 0,
  `17_p` int(11) NOT NULL DEFAULT 0,
  `18_l` int(11) NOT NULL DEFAULT 0,
  `18_p` int(11) NOT NULL DEFAULT 0,
  `19_l` int(11) NOT NULL DEFAULT 0,
  `19_p` int(11) NOT NULL DEFAULT 0,
  `20_l` int(11) NOT NULL DEFAULT 0,
  `20_p` int(11) NOT NULL DEFAULT 0,
  `21_l` int(11) NOT NULL DEFAULT 0,
  `21_p` int(11) NOT NULL DEFAULT 0,
  `22_l` int(11) NOT NULL DEFAULT 0,
  `22_p` int(11) NOT NULL DEFAULT 0,
  `23_l` int(11) NOT NULL DEFAULT 0,
  `23_p` int(11) NOT NULL DEFAULT 0,
  `24_l` int(11) NOT NULL DEFAULT 0,
  `24_p` int(11) NOT NULL DEFAULT 0,
  `25_l` int(11) NOT NULL DEFAULT 0,
  `25_p` int(11) NOT NULL DEFAULT 0,
  `26_l` int(11) NOT NULL DEFAULT 0,
  `26_p` int(11) NOT NULL DEFAULT 0,
  `27_l` int(11) NOT NULL DEFAULT 0,
  `27_p` int(11) NOT NULL DEFAULT 0,
  `28_l` int(11) NOT NULL DEFAULT 0,
  `28_p` int(11) NOT NULL DEFAULT 0,
  `29_l` int(11) NOT NULL DEFAULT 0,
  `29_p` int(11) NOT NULL DEFAULT 0,
  `30_l` int(11) NOT NULL DEFAULT 0,
  `30_p` int(11) NOT NULL DEFAULT 0,
  `31_l` int(11) NOT NULL DEFAULT 0,
  `31_p` int(11) NOT NULL DEFAULT 0,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_rekap_mtbs_mtbm_thn_index`(`thn`) USING BTREE,
  INDEX `r_rekap_mtbs_mtbm_bln_index`(`bln`) USING BTREE,
  INDEX `r_rekap_mtbs_mtbm_kode_index`(`kode`) USING BTREE,
  INDEX `r_rekap_mtbs_mtbm_kategori_index`(`kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 206 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sip_ukp1
-- ----------------------------
DROP TABLE IF EXISTS `r_sip_ukp1`;
CREATE TABLE `r_sip_ukp1`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_form_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sip_ukp1_program_form_id_foreign`(`program_form_id`) USING BTREE,
  INDEX `r_sip_ukp1_thn_index`(`thn`) USING BTREE,
  INDEX `r_sip_ukp1_bln_index`(`bln`) USING BTREE,
  CONSTRAINT `r_sip_ukp1_program_form_id_foreign` FOREIGN KEY (`program_form_id`) REFERENCES `m_program_form` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 110 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sip_ukp2
-- ----------------------------
DROP TABLE IF EXISTS `r_sip_ukp2`;
CREATE TABLE `r_sip_ukp2`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(10) UNSIGNED NOT NULL,
  `0_7_hari` int(11) NOT NULL DEFAULT 0,
  `8_28_hari` int(11) NOT NULL DEFAULT 0,
  `1_11_bulan` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun` int(11) NOT NULL DEFAULT 0,
  `45_59_tahun` int(11) NOT NULL DEFAULT 0,
  `60_tahun` int(11) NOT NULL DEFAULT 0,
  `total_l_baru` int(11) NOT NULL DEFAULT 0,
  `total_p_baru` int(11) NOT NULL DEFAULT 0,
  `total_baru` int(11) NOT NULL DEFAULT 0,
  `total_l_lama` int(11) NOT NULL DEFAULT 0,
  `total_p_lama` int(11) NOT NULL DEFAULT 0,
  `total_lama` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sip_ukp2_thn_index`(`thn`) USING BTREE,
  INDEX `r_sip_ukp2_bln_index`(`bln`) USING BTREE,
  INDEX `r_sip_ukp2_code_index`(`code`) USING BTREE,
  CONSTRAINT `r_sip_ukp2_code_foreign` FOREIGN KEY (`code`) REFERENCES `m_sip_ukp_kesakitan_umum_list` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 454 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sip_ukp3
-- ----------------------------
DROP TABLE IF EXISTS `r_sip_ukp3`;
CREATE TABLE `r_sip_ukp3`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_4_tahun` int(11) NOT NULL DEFAULT 0,
  `5_6_tahun` int(11) NOT NULL DEFAULT 0,
  `7_11_tahun` int(11) NOT NULL DEFAULT 0,
  `12_tahun` int(11) NOT NULL DEFAULT 0,
  `13_14_tahun` int(11) NOT NULL DEFAULT 0,
  `15_18_tahun` int(11) NOT NULL DEFAULT 0,
  `19_34_tahun` int(11) NOT NULL DEFAULT 0,
  `35_44_tahun` int(11) NOT NULL DEFAULT 0,
  `45_64_tahun` int(11) NOT NULL DEFAULT 0,
  `65_tahun` int(11) NOT NULL DEFAULT 0,
  `total_l_baru` int(11) NOT NULL DEFAULT 0,
  `total_p_baru` int(11) NOT NULL DEFAULT 0,
  `total_baru` int(11) NOT NULL DEFAULT 0,
  `total_l_lama` int(11) NOT NULL DEFAULT 0,
  `total_p_lama` int(11) NOT NULL DEFAULT 0,
  `total_lama` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sip_ukp3_thn_index`(`thn`) USING BTREE,
  INDEX `r_sip_ukp3_bln_index`(`bln`) USING BTREE,
  INDEX `r_sip_ukp3_code_index`(`code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sip_ukp4
-- ----------------------------
DROP TABLE IF EXISTS `r_sip_ukp4`;
CREATE TABLE `r_sip_ukp4`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_baru` int(11) NOT NULL DEFAULT 0,
  `total_lama` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sip_ukp4_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `r_sip_ukp4_thn_index`(`thn`) USING BTREE,
  INDEX `r_sip_ukp4_bln_index`(`bln`) USING BTREE,
  INDEX `r_sip_ukp4_code_index`(`code`) USING BTREE,
  CONSTRAINT `r_sip_ukp4_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2734 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sip_ukp5
-- ----------------------------
DROP TABLE IF EXISTS `r_sip_ukp5`;
CREATE TABLE `r_sip_ukp5`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_kk` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepala_keluarga` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_meninggal` date NULL DEFAULT NULL,
  `jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_meninggal` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sebab_langsung` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sebab_tidak_langsung` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyakit_penyerta` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemeriksa` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `r_sip_ukp5_nik_unique`(`nik`) USING BTREE,
  INDEX `r_sip_ukp5_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `r_sip_ukp5_thn_index`(`thn`) USING BTREE,
  INDEX `r_sip_ukp5_bln_index`(`bln`) USING BTREE,
  CONSTRAINT `r_sip_ukp5_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_skrining_ptm
-- ----------------------------
DROP TABLE IF EXISTS `r_skrining_ptm`;
CREATE TABLE `r_skrining_ptm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pasien` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gol_darah` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyakit_keluarga_diabetes` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_hipertensi` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_jantung` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_stroke` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_asma` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_kanker` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_kolesterol_tinggi` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_diabetes` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_hipertensi` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_jantung` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_stroke` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_asma` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_kanker` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_kolesterol_tinggi` tinyint(1) NULL DEFAULT NULL,
  `merokok` tinyint(1) NULL DEFAULT NULL,
  `kurang_aktifitas_fisik` tinyint(1) NULL DEFAULT NULL,
  `kurang_sayur_dan_buah` tinyint(1) NULL DEFAULT NULL,
  `konsumsi_alkohol` tinyint(1) NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `diastole` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `tinggi_badan` double(5, 2) NULL DEFAULT NULL,
  `berat_badan` double(5, 2) NULL DEFAULT NULL,
  `lingkar_perut` double(4, 1) NULL DEFAULT NULL,
  `pengukuran_paru` double(4, 1) NULL DEFAULT NULL,
  `gula_darah_sewaktu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kolesterol` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `trigliserida` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolan_payudara` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `iva` tinyint(1) NULL DEFAULT NULL,
  `kadar_alkohol` tinyint(1) NULL DEFAULT NULL,
  `tes_amfetamin` tinyint(1) NULL DEFAULT NULL,
  `penyuluhan_iva` tinyint(1) NULL DEFAULT NULL,
  `penyuluhan_rokok` tinyint(1) NULL DEFAULT NULL,
  `penyuluhan_cidera` tinyint(1) NULL DEFAULT NULL,
  `kecamatan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rw` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rt` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `imt` double(5, 2) NULL DEFAULT NULL,
  `usia` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_skrining_ptm_thn_index`(`thn`) USING BTREE,
  INDEX `r_skrining_ptm_bln_index`(`bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sp3_lb1
-- ----------------------------
DROP TABLE IF EXISTS `r_sp3_lb1`;
CREATE TABLE `r_sp3_lb1`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icdx` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icdx_induk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `0_7_hari_l_baru` int(11) NOT NULL DEFAULT 0,
  `0_7_hari_p_baru` int(11) NOT NULL DEFAULT 0,
  `0_7_hari_l_lama` int(11) NOT NULL DEFAULT 0,
  `0_7_hari_p_lama` int(11) NOT NULL DEFAULT 0,
  `8_28_hari_l_baru` int(11) NOT NULL DEFAULT 0,
  `8_28_hari_p_baru` int(11) NOT NULL DEFAULT 0,
  `8_28_hari_l_lama` int(11) NOT NULL DEFAULT 0,
  `8_28_hari_p_lama` int(11) NOT NULL DEFAULT 0,
  `1_11_bulan_l_baru` int(11) NOT NULL DEFAULT 0,
  `1_11_bulan_p_baru` int(11) NOT NULL DEFAULT 0,
  `1_11_bulan_l_lama` int(11) NOT NULL DEFAULT 0,
  `1_11_bulan_p_lama` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `1_4_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `5_9_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `10_14_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `15_19_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `20_44_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `45_54_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `45_54_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `45_54_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `45_54_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `55_59_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `55_59_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `55_59_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `55_59_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `60_64_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `60_64_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `60_64_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `60_64_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `65_69_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `65_69_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `65_69_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `65_69_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `70_tahun_l_baru` int(11) NOT NULL DEFAULT 0,
  `70_tahun_p_baru` int(11) NOT NULL DEFAULT 0,
  `70_tahun_l_lama` int(11) NOT NULL DEFAULT 0,
  `70_tahun_p_lama` int(11) NOT NULL DEFAULT 0,
  `total_l_baru` int(11) NOT NULL DEFAULT 0,
  `total_p_baru` int(11) NOT NULL DEFAULT 0,
  `total_l_lama` int(11) NOT NULL DEFAULT 0,
  `total_p_lama` int(11) NOT NULL DEFAULT 0,
  `total_l` int(11) NOT NULL DEFAULT 0,
  `total_p` int(11) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sp3_lb1_thn_index`(`thn`) USING BTREE,
  INDEX `r_sp3_lb1_bln_index`(`bln`) USING BTREE,
  INDEX `r_sp3_lb1_icdx_index`(`icdx`) USING BTREE,
  INDEX `r_sp3_lb1_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  CONSTRAINT `r_sp3_lb1_icdx_foreign` FOREIGN KEY (`icdx`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `r_sp3_lb1_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3409 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sp3_lb2
-- ----------------------------
DROP TABLE IF EXISTS `r_sp3_lb2`;
CREATE TABLE `r_sp3_lb2`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `barcode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_satuan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `laporan_jenis` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'OBAT',
  `pemesanan_tujuan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `stok_awal` double NULL DEFAULT 0,
  `penerimaan` double NULL DEFAULT 0,
  `persediaan` double NULL DEFAULT 0,
  `pemakaian` double NULL DEFAULT 0,
  `akhir_stok` double NULL DEFAULT 0,
  `ratarata_pemakaian` double(8, 2) NULL DEFAULT 0.00,
  `waktu_distribusi` double(8, 2) NULL DEFAULT 0.00,
  `waktu_tunggu` double(8, 2) NULL DEFAULT 0.00,
  `buffer_stok` double(8, 2) NULL DEFAULT 0.00,
  `stok_optimum` double NULL DEFAULT 0,
  `permintaan` double NULL DEFAULT 0,
  `pemberian` double NULL DEFAULT 0,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sp3_lb2_thn_index`(`thn`) USING BTREE,
  INDEX `r_sp3_lb2_bln_index`(`bln`) USING BTREE,
  INDEX `r_sp3_lb2_obat_id_index`(`obat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 499 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sp3_lb3
-- ----------------------------
DROP TABLE IF EXISTS `r_sp3_lb3`;
CREATE TABLE `r_sp3_lb3`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_form_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sp3_lb3_program_form_id_foreign`(`program_form_id`) USING BTREE,
  INDEX `r_sp3_lb3_thn_index`(`thn`) USING BTREE,
  INDEX `r_sp3_lb3_bln_index`(`bln`) USING BTREE,
  CONSTRAINT `r_sp3_lb3_program_form_id_foreign` FOREIGN KEY (`program_form_id`) REFERENCES `m_program_form` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sp3_lb4
-- ----------------------------
DROP TABLE IF EXISTS `r_sp3_lb4`;
CREATE TABLE `r_sp3_lb4`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_form_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sp3_lb4_program_form_id_foreign`(`program_form_id`) USING BTREE,
  INDEX `r_sp3_lb4_thn_index`(`thn`) USING BTREE,
  INDEX `r_sp3_lb4_bln_index`(`bln`) USING BTREE,
  CONSTRAINT `r_sp3_lb4_program_form_id_foreign` FOREIGN KEY (`program_form_id`) REFERENCES `m_program_form` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 206 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_sp3_lsd2
-- ----------------------------
DROP TABLE IF EXISTS `r_sp3_lsd2`;
CREATE TABLE `r_sp3_lsd2`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pegawai` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `pendidikan_terakhir` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_lulus` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kepegawaian` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_status_kepegawaian` date NULL DEFAULT NULL,
  `golongan_pangkat` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_golongan_pangkat` date NULL DEFAULT NULL,
  `masa_golongan_bulan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `masa_golongan_tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_jabatan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_jabatan` date NULL DEFAULT NULL,
  `jabatan_struktural` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tmt_jabatan_struktural` date NULL DEFAULT NULL,
  `tempat_kerja` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ket_tempat_kerja` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mulai_kerja` date NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_sp3_lsd2_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `r_sp3_lsd2_thn_index`(`thn`) USING BTREE,
  CONSTRAINT `r_sp3_lsd2_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for r_ukp6_lplpo
-- ----------------------------
DROP TABLE IF EXISTS `r_ukp6_lplpo`;
CREATE TABLE `r_ukp6_lplpo`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eis_code` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_satuan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `stok_awal` int(11) NOT NULL DEFAULT 0,
  `penerimaan` int(11) NOT NULL DEFAULT 0,
  `persediaan` int(11) NOT NULL DEFAULT 0,
  `pemakaian` int(11) NOT NULL DEFAULT 0,
  `akhir_stok` int(11) NOT NULL DEFAULT 0,
  `stok_optimum` int(11) NOT NULL DEFAULT 0,
  `permintaan` int(11) NOT NULL DEFAULT 0,
  `pemberian` int(11) NOT NULL DEFAULT 0,
  `pemberian_apbd2` int(11) NOT NULL DEFAULT 0,
  `pemberian_askes` int(11) NOT NULL DEFAULT 0,
  `pemberian_apbd1` int(11) NOT NULL DEFAULT 0,
  `pemberian_apbn` int(11) NOT NULL DEFAULT 0,
  `pemberian_program` int(11) NOT NULL DEFAULT 0,
  `pemberian_jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi` int(11) NULL DEFAULT NULL,
  `tidak_bayar` int(11) NULL DEFAULT NULL,
  `bayar` int(11) NULL DEFAULT NULL,
  `jumlah_resep` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `r_ukp6_lplpo_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `r_ukp6_lplpo_thn_index`(`thn`) USING BTREE,
  INDEX `r_ukp6_lplpo_bln_index`(`bln`) USING BTREE,
  INDEX `r_ukp6_lplpo_obat_id_index`(`obat_id`) USING BTREE,
  CONSTRAINT `r_ukp6_lplpo_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 504 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `user_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`, `role_id`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_akseptor
-- ----------------------------
DROP TABLE IF EXISTS `t_akseptor`;
CREATE TABLE `t_akseptor`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `urut_kartu_seri` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_kartu_seri` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `suami_istri_nama` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan_suami` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan_istri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_suami` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_istri` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_akseptor` int(10) UNSIGNED NOT NULL,
  `tanggal_mulai` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `jumlah_anak` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur_anak` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cara_kb_terakhir` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cara_kb` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahapan_ks` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posisi_rahim` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_haid_terakhir` date NULL DEFAULT NULL,
  `hamil` int(11) NULL DEFAULT NULL,
  `gravida` int(11) NULL DEFAULT NULL,
  `partus` int(11) NULL DEFAULT NULL,
  `abortus` int(11) NULL DEFAULT NULL,
  `menyusui` int(11) NULL DEFAULT NULL,
  `sakit_kuning` int(11) NULL DEFAULT NULL,
  `pendarahan_pervaginaan` int(11) NULL DEFAULT NULL,
  `keputihan_lama` int(11) NULL DEFAULT NULL,
  `t_payudara` int(11) NULL DEFAULT NULL,
  `t_rahim` int(11) NULL DEFAULT NULL,
  `t_indung_telur` int(11) NULL DEFAULT NULL,
  `tanda_radang` int(11) NULL DEFAULT NULL,
  `tumor_ginekologi_iud` int(11) NULL DEFAULT NULL,
  `keadaan_umum` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanda_diabetes` int(11) NULL DEFAULT NULL,
  `kelainan_pembekuan_darah` int(11) NULL DEFAULT NULL,
  `radang_orchitis` int(11) NULL DEFAULT NULL,
  `tumor_ginekologi_mop` int(11) NULL DEFAULT NULL,
  `alat_kontrasepsi_boleh` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alat_kontrasepsi_pilih` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_dilayani` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_dipesan_kembali` date NULL DEFAULT NULL,
  `tanggal_dilepas` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_akseptor_pasien_id_index`(`pasien_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_akseptor_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_akseptor_detail`;
CREATE TABLE `t_akseptor_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `akseptor_id` int(10) UNSIGNED NOT NULL,
  `tanggal_datang` date NULL DEFAULT NULL,
  `tanggal_haid_terakhir` date NULL DEFAULT NULL,
  `tekanan_darah` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `berat_badan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_akseptor` int(11) NULL DEFAULT NULL,
  `komplikasi` int(11) NULL DEFAULT NULL,
  `efek_samping` int(11) NULL DEFAULT NULL,
  `gagal` int(11) NULL DEFAULT NULL,
  `tindakan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` char(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_dipesan_kembali` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_akseptor_detail_akseptor_id_foreign`(`akseptor_id`) USING BTREE,
  CONSTRAINT `t_akseptor_detail_akseptor_id_foreign` FOREIGN KEY (`akseptor_id`) REFERENCES `t_akseptor` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_analisis_makanan
-- ----------------------------
DROP TABLE IF EXISTS `t_analisis_makanan`;
CREATE TABLE `t_analisis_makanan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `periksagizi_id` int(10) UNSIGNED NOT NULL,
  `total_air` double(8, 2) NULL DEFAULT NULL,
  `total_energi` double(8, 2) NULL DEFAULT NULL,
  `total_protein` double(8, 2) NULL DEFAULT NULL,
  `total_lemak` double(8, 2) NULL DEFAULT NULL,
  `total_karbohidrat` double(8, 2) NULL DEFAULT NULL,
  `total_serat` double(8, 2) NULL DEFAULT NULL,
  `total_abu` double(8, 2) NULL DEFAULT NULL,
  `total_kalsium` double(8, 2) NULL DEFAULT NULL,
  `total_fosfor` double(8, 2) NULL DEFAULT NULL,
  `total_besi` double(8, 2) NULL DEFAULT NULL,
  `total_natrium` double(8, 2) NULL DEFAULT NULL,
  `total_kalium` double(8, 2) NULL DEFAULT NULL,
  `total_tembaga` double(8, 2) NULL DEFAULT NULL,
  `total_seng` double(8, 2) NULL DEFAULT NULL,
  `total_retinol` double(8, 2) NULL DEFAULT NULL,
  `total_beta_karoten` double(8, 2) NULL DEFAULT NULL,
  `total_karoten_total` double(8, 2) NULL DEFAULT NULL,
  `total_thiamin` double(8, 2) NULL DEFAULT NULL,
  `total_riboflavin` double(8, 2) NULL DEFAULT NULL,
  `total_niasin` double(8, 2) NULL DEFAULT NULL,
  `total_vitamin_c` double(8, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_analisis_makanan_periksagizi_id_foreign`(`periksagizi_id`) USING BTREE,
  CONSTRAINT `t_analisis_makanan_periksagizi_id_foreign` FOREIGN KEY (`periksagizi_id`) REFERENCES `t_periksagizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_analisis_makanan_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_analisis_makanan_detail`;
CREATE TABLE `t_analisis_makanan_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `asupan_makanan_id` int(10) UNSIGNED NOT NULL,
  `analisis_makanan_id` int(10) UNSIGNED NOT NULL,
  `jumlah` double(8, 2) NULL DEFAULT 0.00,
  `waktu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `air` double(8, 2) NULL DEFAULT 0.00,
  `energi` double(8, 2) NULL DEFAULT 0.00,
  `protein` double(8, 2) NULL DEFAULT 0.00,
  `lemak` double(8, 2) NULL DEFAULT 0.00,
  `karbohidrat` double(8, 2) NULL DEFAULT 0.00,
  `serat` double(8, 2) NULL DEFAULT 0.00,
  `abu` double(8, 2) NULL DEFAULT 0.00,
  `kalsium` double(8, 2) NULL DEFAULT 0.00,
  `fosfor` double(8, 2) NULL DEFAULT 0.00,
  `besi` double(8, 2) NULL DEFAULT 0.00,
  `natrium` double(8, 2) NULL DEFAULT 0.00,
  `kalium` double(8, 2) NULL DEFAULT 0.00,
  `tembaga` double(8, 2) NULL DEFAULT 0.00,
  `seng` double(8, 2) NULL DEFAULT 0.00,
  `retinol` double(8, 2) NULL DEFAULT 0.00,
  `beta_karoten` double(8, 2) NULL DEFAULT 0.00,
  `karoten_total` double(8, 2) NULL DEFAULT 0.00,
  `thiamin` double(8, 2) NULL DEFAULT 0.00,
  `riboflavin` double(8, 2) NULL DEFAULT 0.00,
  `niasin` double(8, 2) NULL DEFAULT 0.00,
  `vitamin_c` double(8, 2) NULL DEFAULT 0.00,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_analisis_makanan_detail_asupan_makanan_id_foreign`(`asupan_makanan_id`) USING BTREE,
  INDEX `t_analisis_makanan_detail_analisis_makanan_id_foreign`(`analisis_makanan_id`) USING BTREE,
  CONSTRAINT `t_analisis_makanan_detail_analisis_makanan_id_foreign` FOREIGN KEY (`analisis_makanan_id`) REFERENCES `t_analisis_makanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_analisis_makanan_detail_asupan_makanan_id_foreign` FOREIGN KEY (`asupan_makanan_id`) REFERENCES `m_asupan_makanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_anamnesa
-- ----------------------------
DROP TABLE IF EXISTS `t_anamnesa`;
CREATE TABLE `t_anamnesa`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan_utama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan_tambahan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lama_sakit_tahun` int(10) UNSIGNED NOT NULL,
  `lama_sakit_bulan` int(10) UNSIGNED NOT NULL,
  `lama_sakit_hari` int(10) UNSIGNED NOT NULL,
  `merokok` tinyint(1) NOT NULL DEFAULT 0,
  `konsumsi_alkohol` tinyint(1) NOT NULL DEFAULT 0,
  `kurang_sayur_buah` tinyint(1) NOT NULL DEFAULT 0,
  `terapi` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `anamnesa_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `edukasi` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rencana_tindakan` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `askep` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `observasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `biopsikososial` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_anamnesa_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_anamnesa_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_anamnesa_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_anamnesa_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_anamnesa_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_anamnesa_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18088 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_antenatal
-- ----------------------------
DROP TABLE IF EXISTS `t_antenatal`;
CREATE TABLE `t_antenatal`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `kunjungan` tinyint(4) NULL DEFAULT NULL,
  `rujukan_dari` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_id` int(10) UNSIGNED NOT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `usia_kehamilan` int(11) NULL DEFAULT NULL,
  `trisemester_ke` int(11) NULL DEFAULT NULL,
  `anamnesis` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tekanan_darah` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lila` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_gizi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tinggi_fundus` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `satuan_tinggi_fundus` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `refrex_pattela` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `djj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pap` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tbj` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `presentasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_janin` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `djj1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pap1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tbj1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `presentasi1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `injeksi_tt` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catat_kia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fe` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `risiko_pertama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komplikasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_imunisasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hb` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anemia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `protein_uria` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gula_darah` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thalasemia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sifilis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hbsag` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujuk_ke` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_datang_dengan_hiv` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_perapdoinan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_pervaginaan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_ditawarkan_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_dilakukan_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_hasil_tes_hiv` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ppia_mendapat_art` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_rdt` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_mikropis` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_rdt1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_mikropis1` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_darah_malaria` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_kina` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pmdk_kelambu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_diperiksa_ims` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pidk_diterapi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_dahak` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_tbc` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tdk_obat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phdk_diperiksa_hepatitis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phdk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_tiba` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_pulang` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdk_ankylostoma` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdk_hasil_tes` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_antenatal_kehamilan_id_foreign`(`kehamilan_id`) USING BTREE,
  CONSTRAINT `t_antenatal_kehamilan_id_foreign` FOREIGN KEY (`kehamilan_id`) REFERENCES `t_kehamilan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 601 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_bayar_tindakan
-- ----------------------------
DROP TABLE IF EXISTS `t_bayar_tindakan`;
CREATE TABLE `t_bayar_tindakan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_id` int(10) UNSIGNED NOT NULL,
  `jumlah` double(16, 2) NULL DEFAULT NULL,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `total` double(16, 2) NULL DEFAULT NULL,
  `pembayaran` double(16, 2) NULL DEFAULT NULL,
  `tanggal_mulai` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_bayar_tindakan_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_bayar_tindakan_petugas_id_foreign`(`petugas_id`) USING BTREE,
  INDEX `t_bayar_tindakan_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  CONSTRAINT `t_bayar_tindakan_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_bayar_tindakan_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_bayar_tindakan_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `t_tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_bridging_infokes
-- ----------------------------
DROP TABLE IF EXISTS `t_bridging_infokes`;
CREATE TABLE `t_bridging_infokes`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17624 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_bulan_pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `t_bulan_pemeriksaan`;
CREATE TABLE `t_bulan_pemeriksaan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tahap_pemeriksaan_id` int(10) UNSIGNED NOT NULL,
  `bulan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_bulan_pemeriksaan_tahap_pemeriksaan_id_foreign`(`tahap_pemeriksaan_id`) USING BTREE,
  CONSTRAINT `t_bulan_pemeriksaan_tahap_pemeriksaan_id_foreign` FOREIGN KEY (`tahap_pemeriksaan_id`) REFERENCES `t_tahap_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_caten
-- ----------------------------
DROP TABLE IF EXISTS `t_caten`;
CREATE TABLE `t_caten`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `no_sertifikat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keadaan_khusus` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nip` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_caten_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `t_caten_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_caten_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_caten_detail`;
CREATE TABLE `t_caten_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `caten_id` int(10) UNSIGNED NOT NULL,
  `pemeriksaan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_caten_detail_caten_id_foreign`(`caten_id`) USING BTREE,
  CONSTRAINT `t_caten_detail_caten_id_foreign` FOREIGN KEY (`caten_id`) REFERENCES `t_caten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_datadasar
-- ----------------------------
DROP TABLE IF EXISTS `t_datadasar`;
CREATE TABLE `t_datadasar`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header_nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_datadasar_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `t_datadasar_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  CONSTRAINT `t_datadasar_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_datadasar_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_datadasar_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_datadasar_detail`;
CREATE TABLE `t_datadasar_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `nilai` double(8, 2) NULL DEFAULT NULL,
  `datadasar_code` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `datadasar_id` int(10) UNSIGNED NOT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_datadasar_detail_datadasar_id_foreign`(`datadasar_id`) USING BTREE,
  CONSTRAINT `t_datadasar_detail_datadasar_id_foreign` FOREIGN KEY (`datadasar_id`) REFERENCES `t_datadasar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_diagnosa
-- ----------------------------
DROP TABLE IF EXISTS `t_diagnosa`;
CREATE TABLE `t_diagnosa`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_kasus` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_jenis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `diagnosa_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_diagnosa_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_diagnosa_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_diagnosa_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_diagnosa_diagnosa_id_foreign`(`diagnosa_id`) USING BTREE,
  CONSTRAINT `t_diagnosa_diagnosa_id_foreign` FOREIGN KEY (`diagnosa_id`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_diagnosa_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_diagnosa_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_diagnosa_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22033 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_diagnosa_gizi
-- ----------------------------
DROP TABLE IF EXISTS `t_diagnosa_gizi`;
CREATE TABLE `t_diagnosa_gizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksagizi_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `diagnosa_gizi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_diagnosa_gizi_periksagizi_id_foreign`(`periksagizi_id`) USING BTREE,
  INDEX `t_diagnosa_gizi_diagnosa_gizi_id_foreign`(`diagnosa_gizi_id`) USING BTREE,
  CONSTRAINT `t_diagnosa_gizi_diagnosa_gizi_id_foreign` FOREIGN KEY (`diagnosa_gizi_id`) REFERENCES `m_diagnosa_gizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_diagnosa_gizi_periksagizi_id_foreign` FOREIGN KEY (`periksagizi_id`) REFERENCES `t_periksagizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_diagnosa_keperawatan
-- ----------------------------
DROP TABLE IF EXISTS `t_diagnosa_keperawatan`;
CREATE TABLE `t_diagnosa_keperawatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `pengkajian_keperawatan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `diagnosa_detail_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondisi_terkait` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `populasi_beresiko` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `faktor_berhubungan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `batasan_karakteristik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_diagnosa_keperawatan_diagnosa_detail_id_foreign`(`diagnosa_detail_id`) USING BTREE,
  INDEX `t_diagnosa_keperawatan_pengkajian_keperawatan_id_foreign`(`pengkajian_keperawatan_id`) USING BTREE,
  CONSTRAINT `t_diagnosa_keperawatan_diagnosa_detail_id_foreign` FOREIGN KEY (`diagnosa_detail_id`) REFERENCES `m_diagnosa_keperawatan_detail` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_diagnosa_keperawatan_pengkajian_keperawatan_id_foreign` FOREIGN KEY (`pengkajian_keperawatan_id`) REFERENCES `t_pengkajian_keperawatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_distribusi_obat
-- ----------------------------
DROP TABLE IF EXISTS `t_distribusi_obat`;
CREATE TABLE `t_distribusi_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `keperluan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'DISTRIBUSI',
  `tanggal_proses` datetime(0) NULL DEFAULT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmasasal_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruanganasal_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihpkmatauluar` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmastujuan_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ruangantujuan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `distribusi_no` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmastujuan_luar` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ruangantujuan_luar` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_distribusi_obat_petugas_id_foreign`(`petugas_id`) USING BTREE,
  INDEX `t_distribusi_obat_puskesmasasal_id_foreign`(`puskesmasasal_id`) USING BTREE,
  INDEX `t_distribusi_obat_ruanganasal_id_foreign`(`ruanganasal_id`) USING BTREE,
  INDEX `t_distribusi_obat_puskesmastujuan_id_foreign`(`puskesmastujuan_id`) USING BTREE,
  INDEX `t_distribusi_obat_ruangantujuan_id_foreign`(`ruangantujuan_id`) USING BTREE,
  CONSTRAINT `t_distribusi_obat_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_distribusi_obat_puskesmasasal_id_foreign` FOREIGN KEY (`puskesmasasal_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_distribusi_obat_puskesmastujuan_id_foreign` FOREIGN KEY (`puskesmastujuan_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_distribusi_obat_ruanganasal_id_foreign` FOREIGN KEY (`ruanganasal_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_distribusi_obat_ruangantujuan_id_foreign` FOREIGN KEY (`ruangantujuan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_distribusi_obat_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_distribusi_obat_detail`;
CREATE TABLE `t_distribusi_obat_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `distribusi_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `barcode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga_jual` double NULL DEFAULT NULL,
  `batch` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `obat_jumlah` double(16, 2) NULL DEFAULT NULL,
  `status_sinkron` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `obat_nama_pkm_asal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_id_pkm_asal` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_distribusi_obat_detail_distribusi_id_foreign`(`distribusi_id`) USING BTREE,
  INDEX `t_distribusi_obat_detail_obat_id_foreign`(`obat_id`) USING BTREE,
  CONSTRAINT `t_distribusi_obat_detail_distribusi_id_foreign` FOREIGN KEY (`distribusi_id`) REFERENCES `t_distribusi_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_distribusi_obat_detail_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 520 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_evaluasi_keperawatan
-- ----------------------------
DROP TABLE IF EXISTS `t_evaluasi_keperawatan`;
CREATE TABLE `t_evaluasi_keperawatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `catatan_evaluasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `saran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kesimpulan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `persentase` double(6, 2) NULL DEFAULT 0.00,
  `pengkajian_keperawatan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_evaluasi_keperawatan_pengkajian_keperawatan_id_foreign`(`pengkajian_keperawatan_id`) USING BTREE,
  CONSTRAINT `t_evaluasi_keperawatan_pengkajian_keperawatan_id_foreign` FOREIGN KEY (`pengkajian_keperawatan_id`) REFERENCES `t_pengkajian_keperawatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_haji
-- ----------------------------
DROP TABLE IF EXISTS `t_haji`;
CREATE TABLE `t_haji`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `tahapsatu_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenaga_medis_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status_selesai` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_haji_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_haji_tenaga_medis_id_foreign`(`tenaga_medis_id`) USING BTREE,
  INDEX `t_haji_tahapsatu_id_foreign`(`tahapsatu_id`) USING BTREE,
  CONSTRAINT `t_haji_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_haji_tahapsatu_id_foreign` FOREIGN KEY (`tahapsatu_id`) REFERENCES `t_haji` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_haji_tenaga_medis_id_foreign` FOREIGN KEY (`tenaga_medis_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_hari_pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `t_hari_pemeriksaan`;
CREATE TABLE `t_hari_pemeriksaan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `bulan_pemeriksaan_id` int(10) UNSIGNED NOT NULL,
  `tanggal` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_hari_pemeriksaan_bulan_pemeriksaan_id_foreign`(`bulan_pemeriksaan_id`) USING BTREE,
  CONSTRAINT `t_hari_pemeriksaan_bulan_pemeriksaan_id_foreign` FOREIGN KEY (`bulan_pemeriksaan_id`) REFERENCES `t_bulan_pemeriksaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_header_laporan
-- ----------------------------
DROP TABLE IF EXISTS `t_header_laporan`;
CREATE TABLE `t_header_laporan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `thn` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `program_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pustu_lapor` int(10) UNSIGNED NULL DEFAULT NULL,
  `poskesdes_lapor` int(10) UNSIGNED NULL DEFAULT NULL,
  `jumlah_pustu` int(10) UNSIGNED NULL DEFAULT NULL,
  `jumlah_poskesdes` int(10) UNSIGNED NULL DEFAULT NULL,
  `waktu_distribusi` double(8, 2) NULL DEFAULT 0.00,
  `keterangan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permintaan_selama` tinyint(4) NULL DEFAULT 1,
  `jumlah_konselor` int(10) UNSIGNED NULL DEFAULT NULL,
  `jumlah_fgd` int(10) UNSIGNED NULL DEFAULT NULL,
  `jumlah_kie` int(10) UNSIGNED NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `from` date NULL DEFAULT NULL,
  `to` date NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_header_laporan_program_id_foreign`(`program_id`) USING BTREE,
  INDEX `t_header_laporan_thn_index`(`thn`) USING BTREE,
  INDEX `t_header_laporan_bln_index`(`bln`) USING BTREE,
  CONSTRAINT `t_header_laporan_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `m_program` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 128 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_implementasi_keperawatan
-- ----------------------------
DROP TABLE IF EXISTS `t_implementasi_keperawatan`;
CREATE TABLE `t_implementasi_keperawatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `outcome` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `intervensi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `catatan_intervensi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dipertahankan_pada` double(6, 2) NULL DEFAULT 0.00,
  `ditingkatkan_ke` double(6, 2) NULL DEFAULT 0.00,
  `total` double(6, 2) NULL DEFAULT 0.00,
  `pengkajian_keperawatan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `noc_nic_detail_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_implementasi_keperawatan_pengkajian_keperawatan_id_foreign`(`pengkajian_keperawatan_id`) USING BTREE,
  INDEX `t_implementasi_keperawatan_noc_nic_detail_id_foreign`(`noc_nic_detail_id`) USING BTREE,
  CONSTRAINT `t_implementasi_keperawatan_noc_nic_detail_id_foreign` FOREIGN KEY (`noc_nic_detail_id`) REFERENCES `m_noc_nic_detail` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_implementasi_keperawatan_pengkajian_keperawatan_id_foreign` FOREIGN KEY (`pengkajian_keperawatan_id`) REFERENCES `t_pengkajian_keperawatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_imunisasi
-- ----------------------------
DROP TABLE IF EXISTS `t_imunisasi`;
CREATE TABLE `t_imunisasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur_bulan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb` double(5, 2) NULL DEFAULT NULL,
  `pb` double(5, 2) NULL DEFAULT NULL,
  `kepandaian` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `makanan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gejala` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pengobatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nasihat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kategori` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_imunisasi_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_imunisasi_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_imunisasi_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_imunisasi_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_imunisasi_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_imunisasi_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 569 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_imunisasi_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_imunisasi_detail`;
CREATE TABLE `t_imunisasi_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imunisasi_id` int(10) UNSIGNED NOT NULL,
  `imunisasi_kode` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_imunisasi_detail_imunisasi_kode_foreign`(`imunisasi_kode`) USING BTREE,
  INDEX `t_imunisasi_detail_imunisasi_id_index`(`imunisasi_id`) USING BTREE,
  CONSTRAINT `t_imunisasi_detail_imunisasi_id_foreign` FOREIGN KEY (`imunisasi_id`) REFERENCES `t_imunisasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_imunisasi_detail_imunisasi_kode_foreign` FOREIGN KEY (`imunisasi_kode`) REFERENCES `m_imunisasi` (`imunisasi_kode`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1054 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kb
-- ----------------------------
DROP TABLE IF EXISTS `t_kb`;
CREATE TABLE `t_kb`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `no_akseptor` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kb_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_kb_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_kb_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_kb_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kb_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kb_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 146 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kehamilan
-- ----------------------------
DROP TABLE IF EXISTS `t_kehamilan`;
CREATE TABLE `t_kehamilan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `posyandu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kader` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dukun` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gravida` int(11) NULL DEFAULT NULL,
  `partus` int(11) NULL DEFAULT NULL,
  `abortus` int(11) NULL DEFAULT NULL,
  `hidup` int(11) NULL DEFAULT NULL,
  `tanggal_hpht` date NULL DEFAULT NULL,
  `taksiran_persalinan` date NULL DEFAULT NULL,
  `persalinan_sebelumnya` date NULL DEFAULT NULL,
  `buku_kia` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `riwayat_komplikasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyakit_kronis` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_rencana` date NULL DEFAULT NULL,
  `penolong` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendamping` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `transportasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendonor` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_mulai` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kehamilan_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `t_kehamilan_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 751 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_keterangan_buta_warna
-- ----------------------------
DROP TABLE IF EXISTS `t_keterangan_buta_warna`;
CREATE TABLE `t_keterangan_buta_warna`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_surat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visus_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visus_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `buta_warna` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_keterangan_buta_warna_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_keterangan_buta_warna_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_keterangan_buta_warna_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_keterangan_buta_warna_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_buta_warna_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_buta_warna_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_keterangan_sakit
-- ----------------------------
DROP TABLE IF EXISTS `t_keterangan_sakit`;
CREATE TABLE `t_keterangan_sakit`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_surat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `selama` tinyint(4) NOT NULL,
  `mulai_tanggal` date NOT NULL,
  `sampai_tanggal` date NOT NULL,
  `catatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_keterangan_sakit_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_keterangan_sakit_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_keterangan_sakit_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_keterangan_sakit_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_sakit_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_sakit_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_keterangan_sehat
-- ----------------------------
DROP TABLE IF EXISTS `t_keterangan_sehat`;
CREATE TABLE `t_keterangan_sehat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_surat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `buta_warna` tinyint(4) NULL DEFAULT NULL,
  `cacat_badan` tinyint(4) NULL DEFAULT NULL,
  `keperluan_keur` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` tinyint(4) NOT NULL,
  `catatan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_keterangan_sehat_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_keterangan_sehat_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_keterangan_sehat_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_keterangan_sehat_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_sehat_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_keterangan_sehat_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kohort
-- ----------------------------
DROP TABLE IF EXISTS `t_kohort`;
CREATE TABLE `t_kohort`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kohort_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_kohort_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_kohort_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_kohort_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kohort_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kohort_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1223 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_konselinghiv
-- ----------------------------
DROP TABLE IF EXISTS `t_konselinghiv`;
CREATE TABLE `t_konselinghiv`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kunjungan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_rujukan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelompok_risiko` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelompok_risiko_lama` date NULL DEFAULT NULL,
  `pasangan_tetap` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasangan_perempuan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasangan_hamil` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasangan_sex` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir_pasangan` date NULL DEFAULT NULL,
  `status_pasangan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_tes_pasangan` date NULL DEFAULT NULL,
  `tanggal_pra_tes` date NULL DEFAULT NULL,
  `klien_wbp` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_klien` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasan_tes` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mengetahui_tes` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `seks_vaginal` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_seks_vaginal` date NULL DEFAULT NULL,
  `anal_seks` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_seks_anal` date NULL DEFAULT NULL,
  `bergantian_suntik` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_bergantian_suntik` date NULL DEFAULT NULL,
  `transfusi_darah` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_transfusi_darah` date NULL DEFAULT NULL,
  `transmisi_ibu` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_transmisi_ibu` date NULL DEFAULT NULL,
  `lainnya` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lainnya` date NULL DEFAULT NULL,
  `periode_jendela` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_periode_jendela` date NULL DEFAULT NULL,
  `kesediaan_tes` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pernah_tes` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_pernah_tes` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_pernah_tes` date NULL DEFAULT NULL,
  `hasil_pernah_tes` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `usia_anak_terakhir` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_anak` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status_kehamilan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_konselinghiv_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_konselinghiv_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_konselinghiv_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_konselinghiv_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_konselinghiv_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_konselinghiv_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_konselinghiv_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_konselinghiv_detail`;
CREATE TABLE `t_konselinghiv_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `konselinghiv_id` int(10) UNSIGNED NOT NULL,
  `tanggal_pemberian` date NULL DEFAULT NULL,
  `penyakit_terkait` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_tes_hiv` date NULL DEFAULT NULL,
  `jenis_tes` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_tes_r1` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_reagen_r1` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_tes_r2` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_reagen_r2` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_tes_r3` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_reagen_r3` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nomor_registrasi_pdp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_masuk_pdp` date NULL DEFAULT NULL,
  `tindaklanjut` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindaklanjut_konseling` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindaklanjut_rujuk` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_pasangan_hiv` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_pascates` date NULL DEFAULT NULL,
  `terima_hasil` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kaji_gejala_tb` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_kondom` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindaklanjut_pasca` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `konselor` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_layanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_pelayanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_konselinghiv_detail_konselinghiv_id_foreign`(`konselinghiv_id`) USING BTREE,
  CONSTRAINT `t_konselinghiv_detail_konselinghiv_id_foreign` FOREIGN KEY (`konselinghiv_id`) REFERENCES `t_konselinghiv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kontakserumah
-- ----------------------------
DROP TABLE IF EXISTS `t_kontakserumah`;
CREATE TABLE `t_kontakserumah`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `periksatb_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `hasil` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kontakserumah_periksatb_id_foreign`(`periksatb_id`) USING BTREE,
  CONSTRAINT `t_kontakserumah_periksatb_id_foreign` FOREIGN KEY (`periksatb_id`) REFERENCES `t_pemeriksaan_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kpsp
-- ----------------------------
DROP TABLE IF EXISTS `t_kpsp`;
CREATE TABLE `t_kpsp`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur_bayi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isi_kuesioner` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hasil_pemeriksaan_code` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kpsp_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_kpsp_pasien_id_foreign`(`pasien_id`) USING BTREE,
  INDEX `t_kpsp_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_kpsp_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_kpsp_hasil_pemeriksaan_code_foreign`(`hasil_pemeriksaan_code`) USING BTREE,
  CONSTRAINT `t_kpsp_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kpsp_hasil_pemeriksaan_code_foreign` FOREIGN KEY (`hasil_pemeriksaan_code`) REFERENCES `m_kpsp_hasil` (`code`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kpsp_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kpsp_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_kpsp_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kunjungan_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_kunjungan_bpjs`;
CREATE TABLE `t_kunjungan_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noKunjungan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noKartu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglDaftar` date NULL DEFAULT NULL,
  `kdPoli` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdSadar` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `diastole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `beratBadan` double(4, 1) NULL DEFAULT 0.0,
  `tinggiBadan` double(4, 1) NULL DEFAULT 0.0,
  `respRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `heartRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `terapi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdProviderRujukLanjut` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdStatusPulang` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglPulang` date NULL DEFAULT NULL,
  `kdDokter` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdDiag1` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdDiag2` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdDiag3` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdPoliRujukInternal` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_kdppk` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_tglEstRujuk` date NULL DEFAULT NULL,
  `rujukLanjut_subSpesialis_kdSubSpesialis1` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_subSpesialis_kdSubSpesialis2` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_subSpesialis_kdSubSpesialis3` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_subSpesialis_kdSarana` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_khusus_kdKhusus` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_khusus_kdSubSpesialis` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukLanjut_khusus_catatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdPoliRujukLanjut` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdTacc` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasanTacc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_kunjungan_bpjs_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `t_kunjungan_bpjs_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7759 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_kunjungan_sehat_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_kunjungan_sehat_bpjs`;
CREATE TABLE `t_kunjungan_sehat_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdProviderPeserta` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noKartu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglDaftar` datetime(0) NULL DEFAULT NULL,
  `kdPoli` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `diastole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `beratBadan` double(4, 1) NULL DEFAULT 0.0,
  `tinggiBadan` double(4, 1) NULL DEFAULT 0.0,
  `respRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `heartRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `kunjSakit` tinyint(1) NULL DEFAULT NULL,
  `rujukBalik` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdTkp` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_sinkron` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 502 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `t_laboratorium`;
CREATE TABLE `t_laboratorium`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `antrean` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penanggung_jawab_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asisten_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `saran` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_antrian` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `puskesmas_tujuan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukan_laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_laboratorium_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_laboratorium_penanggung_jawab_id_foreign`(`penanggung_jawab_id`) USING BTREE,
  INDEX `t_laboratorium_asisten_id_foreign`(`asisten_id`) USING BTREE,
  INDEX `t_laboratorium_antrean_index`(`antrean`) USING BTREE,
  CONSTRAINT `t_laboratorium_asisten_id_foreign` FOREIGN KEY (`asisten_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_laboratorium_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_laboratorium_penanggung_jawab_id_foreign` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2381 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_laboratorium_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_laboratorium_detail`;
CREATE TABLE `t_laboratorium_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemeriksaan_id` int(10) UNSIGNED NOT NULL,
  `laboratorium_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `hasil` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nilai_normal` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `satuan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sampel_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `paket_laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_laboratorium_detail_pemeriksaan_id_foreign`(`pemeriksaan_id`) USING BTREE,
  INDEX `t_laboratorium_detail_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  INDEX `t_laboratorium_detail_sampel_id_foreign`(`sampel_id`) USING BTREE,
  INDEX `t_laboratorium_detail_paket_laboratorium_id_foreign`(`paket_laboratorium_id`) USING BTREE,
  CONSTRAINT `t_laboratorium_detail_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `m_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_laboratorium_detail_paket_laboratorium_id_foreign` FOREIGN KEY (`paket_laboratorium_id`) REFERENCES `m_paket_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_laboratorium_detail_pemeriksaan_id_foreign` FOREIGN KEY (`pemeriksaan_id`) REFERENCES `t_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_laboratorium_detail_sampel_id_foreign` FOREIGN KEY (`sampel_id`) REFERENCES `t_pengambilansampel` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10818 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_laboratorium_detail_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_laboratorium_detail_bpjs`;
CREATE TABLE `t_laboratorium_detail_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdMCU` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noKunjungan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdProvider` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglPelayanan` date NOT NULL,
  `tekananDarahSistole` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tekananDarahDiastole` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `radiologiFoto` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinHemo` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinLeu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinErit` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinLaju` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinHema` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darahRutinTrom` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lemakDarahHDL` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lemakDarahLDL` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lemakDarahChol` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lemakDarahTrigli` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gulaDarahSewaktu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gulaDarahPuasa` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gulaDarahPostPrandial` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gulaDarahHbA1c` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiHatiSGOT` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiHatiSGPT` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiHatiGamma` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiHatiProtKual` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiHatiAlbumin` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiGinjalCrea` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiGinjalUreum` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiGinjalAsam` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiJantungABI` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiJantungEKG` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fungsiJantungEcho` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `funduskopi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemeriksaanLain` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `laboratorium_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_laboratorium_detail_bpjs_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  CONSTRAINT `t_laboratorium_detail_bpjs_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `t_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 912 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_laporan_program
-- ----------------------------
DROP TABLE IF EXISTS `t_laporan_program`;
CREATE TABLE `t_laporan_program`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thn` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `tri` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sem` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `minggu` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `form_id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_laporan_program_option_index`(`option`) USING BTREE,
  INDEX `t_laporan_program_thn_index`(`thn`) USING BTREE,
  INDEX `t_laporan_program_bln_index`(`bln`) USING BTREE,
  INDEX `t_laporan_program_tri_index`(`tri`) USING BTREE,
  INDEX `t_laporan_program_sem_index`(`sem`) USING BTREE,
  INDEX `t_laporan_program_form_id_index`(`form_id`) USING BTREE,
  INDEX `t_laporan_program_minggu_index`(`minggu`) USING BTREE,
  CONSTRAINT `t_laporan_program_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `m_program_form` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_mata
-- ----------------------------
DROP TABLE IF EXISTS `t_mata`;
CREATE TABLE `t_mata`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visus_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visus_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palbebra_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palbebra_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `conjunctiva_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `conjunctiva_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cornea_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cornea_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coa_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coa_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `iris_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `iris_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pupil_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pupil_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lensa_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lensa_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vitreous_humor_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vitreous_humor_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `funduskopi_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `funduskopi_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tonometri_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tonometri_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anel_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anel_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_mata_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_mata_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_mata_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_mata_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mata_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mata_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_mtbm
-- ----------------------------
DROP TABLE IF EXISTS `t_mtbm`;
CREATE TABLE `t_mtbm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sakit` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kunjungan` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_mtbm_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_mtbm_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_mtbm_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `t_mtbm_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mtbm_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mtbm_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_mtbm_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_mtbm_detail`;
CREATE TABLE `t_mtbm_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mtbm_id` int(10) UNSIGNED NOT NULL,
  `pemeriksaan` int(10) UNSIGNED NOT NULL,
  `penilaian` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `klasifikasi` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_mtbm_detail_mtbm_id_index`(`mtbm_id`) USING BTREE,
  INDEX `t_mtbm_detail_pemeriksaan_index`(`pemeriksaan`) USING BTREE,
  CONSTRAINT `t_mtbm_detail_mtbm_id_foreign` FOREIGN KEY (`mtbm_id`) REFERENCES `t_mtbm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_mtbs
-- ----------------------------
DROP TABLE IF EXISTS `t_mtbs`;
CREATE TABLE `t_mtbs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anak_sakit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kunjungan_ulang` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kunjungan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_mtbs_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_mtbs_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_mtbs_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_mtbs_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mtbs_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_mtbs_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_mtbs_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_mtbs_detail`;
CREATE TABLE `t_mtbs_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mtbs_id` int(10) UNSIGNED NOT NULL,
  `pemeriksaan` int(10) UNSIGNED NOT NULL,
  `penilaian` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `klasifikasi` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan` varchar(192) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_mtbs_detail_mtbs_id_index`(`mtbs_id`) USING BTREE,
  INDEX `t_mtbs_detail_pemeriksaan_index`(`pemeriksaan`) USING BTREE,
  CONSTRAINT `t_mtbs_detail_mtbs_id_foreign` FOREIGN KEY (`mtbs_id`) REFERENCES `t_mtbs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_nifas
-- ----------------------------
DROP TABLE IF EXISTS `t_nifas`;
CREATE TABLE `t_nifas`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `kehamilan_id` int(10) UNSIGNED NOT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `tanggal_pnc` datetime(0) NULL DEFAULT NULL,
  `tekanan_darah` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `suhu` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komplikasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hari_ke` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catat_kia` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fe` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vit_a` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujukan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `art` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anti_tbc` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anti_malaria` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thorax` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_tiba` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_pulang` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_nifas_kehamilan_id_foreign`(`kehamilan_id`) USING BTREE,
  CONSTRAINT `t_nifas_kehamilan_id_foreign` FOREIGN KEY (`kehamilan_id`) REFERENCES `t_kehamilan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_obat_pasien
-- ----------------------------
DROP TABLE IF EXISTS `t_obat_pasien`;
CREATE TABLE `t_obat_pasien`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_resep` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `antrean` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `resep_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apoteker_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asisten_apoteker_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_obat_pasien_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_obat_pasien_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `t_obat_pasien_apoteker_id_foreign`(`apoteker_id`) USING BTREE,
  INDEX `t_obat_pasien_asisten_apoteker_id_foreign`(`asisten_apoteker_id`) USING BTREE,
  INDEX `t_obat_pasien_resep_id_foreign`(`resep_id`) USING BTREE,
  INDEX `t_obat_pasien_antrean_index`(`antrean`) USING BTREE,
  CONSTRAINT `t_obat_pasien_apoteker_id_foreign` FOREIGN KEY (`apoteker_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_obat_pasien_asisten_apoteker_id_foreign` FOREIGN KEY (`asisten_apoteker_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_obat_pasien_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_obat_pasien_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `t_resep` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_obat_pasien_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 261 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_obat_pasien_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_obat_pasien_detail`;
CREATE TABLE `t_obat_pasien_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `obat_pasien_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_jumlah` double(16, 2) NULL DEFAULT NULL,
  `obat_signa` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aturan_pakai` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_racikan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_jumlah_permintaan` double(16, 2) NULL DEFAULT NULL,
  `obat_keterangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_jumlah_apotek` double(16, 2) NULL DEFAULT NULL,
  `obat_indikasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `stok_obat_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_obat_pasien_detail_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `t_obat_pasien_detail_obat_pasien_id_foreign`(`obat_pasien_id`) USING BTREE,
  CONSTRAINT `t_obat_pasien_detail_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_obat_pasien_detail_obat_pasien_id_foreign` FOREIGN KEY (`obat_pasien_id`) REFERENCES `t_obat_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 510 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_odontogram
-- ----------------------------
DROP TABLE IF EXISTS `t_odontogram`;
CREATE TABLE `t_odontogram`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `occlusi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `torus_palatinus` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `torus_mandibularis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palatum` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diastema` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diastema_keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gigi_anomali` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gigi_anomali_keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lain_lain` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `d` int(11) NULL DEFAULT NULL,
  `m` int(11) NULL DEFAULT NULL,
  `f` int(11) NULL DEFAULT NULL,
  `jumlah_photo` int(10) UNSIGNED NULL DEFAULT NULL,
  `keterangan_photo` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_rontgen_photo` int(10) UNSIGNED NULL DEFAULT NULL,
  `keterangan_rontgen_photo` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_odontogram_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_odontogram_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_odontogram_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `t_odontogram_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_odontogram_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_odontogram_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1600 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_odontogram_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_odontogram_detail`;
CREATE TABLE `t_odontogram_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `odontogram_id` int(10) UNSIGNED NOT NULL,
  `odontogram_no` int(11) NOT NULL,
  `value` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wwwww',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_odontogram_detail_odontogram_id_foreign`(`odontogram_id`) USING BTREE,
  CONSTRAINT `t_odontogram_detail_odontogram_id_foreign` FOREIGN KEY (`odontogram_id`) REFERENCES `t_odontogram` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1599 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_odontogram_lama
-- ----------------------------
DROP TABLE IF EXISTS `t_odontogram_lama`;
CREATE TABLE `t_odontogram_lama`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reg_time` datetime(0) NOT NULL,
  `cl_pid` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_gigi` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuadran` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_urut` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_paket_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `t_paket_laboratorium`;
CREATE TABLE `t_paket_laboratorium`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `laboratorium_id` int(10) UNSIGNED NOT NULL,
  `paket_laboratorium_id` int(10) UNSIGNED NOT NULL,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_paket_laboratorium_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  INDEX `t_paket_laboratorium_paket_laboratorium_id_foreign`(`paket_laboratorium_id`) USING BTREE,
  CONSTRAINT `t_paket_laboratorium_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `t_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_paket_laboratorium_paket_laboratorium_id_foreign` FOREIGN KEY (`paket_laboratorium_id`) REFERENCES `m_paket_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pal
-- ----------------------------
DROP TABLE IF EXISTS `t_pal`;
CREATE TABLE `t_pal`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `tenaga_medis_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pal_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_pal_tenaga_medis_id_foreign`(`tenaga_medis_id`) USING BTREE,
  INDEX `t_pal_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_pal_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pal_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pal_tenaga_medis_id_foreign` FOREIGN KEY (`tenaga_medis_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pasienmeninggal
-- ----------------------------
DROP TABLE IF EXISTS `t_pasienmeninggal`;
CREATE TABLE `t_pasienmeninggal`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_kk` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kepala_keluarga` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `jenis_kelamin` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_meninggal` date NULL DEFAULT NULL,
  `jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_meninggal` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sebab_langsung` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sebab_tidak_langsung` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penyakit_penyerta` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemeriksa` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik_pelapor` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pelapor` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir_pelapor` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir_pelapor` date NULL DEFAULT NULL,
  `pekerjaan_id_pelapor` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_pelapor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hubungan_almarhum` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_melapor` tinyint(1) NULL DEFAULT 0,
  `nomor_surat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `t_pasienmeninggal_nik_unique`(`nik`) USING BTREE,
  UNIQUE INDEX `t_pasienmeninggal_pasien_id_unique`(`pasien_id`) USING BTREE,
  INDEX `t_pasienmeninggal_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `t_pasienmeninggal_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `t_pasienmeninggal_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `t_pasienmeninggal_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `t_pasienmeninggal_dusun_id_foreign`(`dusun_id`) USING BTREE,
  INDEX `t_pasienmeninggal_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  CONSTRAINT `t_pasienmeninggal_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pasienmeninggal_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pasienmeninggal_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pasienmeninggal_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pasienmeninggal_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pasienmeninggal_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_patograf
-- ----------------------------
DROP TABLE IF EXISTS `t_patograf`;
CREATE TABLE `t_patograf`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `kehamilan_id` int(10) UNSIGNED NOT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `tanggal_rawat` date NULL DEFAULT NULL,
  `pukul_rawat` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_mules` date NULL DEFAULT NULL,
  `pukul_mules` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_ketuban_pecah` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `pukul_ketuban_pecah` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_patograf_kehamilan_id_foreign`(`kehamilan_id`) USING BTREE,
  CONSTRAINT `t_patograf_kehamilan_id_foreign` FOREIGN KEY (`kehamilan_id`) REFERENCES `t_kehamilan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_patograf_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_patograf_detail`;
CREATE TABLE `t_patograf_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patograf_id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kategori_detail` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `pukul` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `detail_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_patograf_detail_patograf_id_foreign`(`patograf_id`) USING BTREE,
  CONSTRAINT `t_patograf_detail_patograf_id_foreign` FOREIGN KEY (`patograf_id`) REFERENCES `t_patograf` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `t_pelayanan`;
CREATE TABLE `t_pelayanan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rujukanpelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `is_promotifpreventif` tinyint(1) NOT NULL DEFAULT 0,
  `instalasi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamar_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bed_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `status_bpjs` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `antrean` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_pendaftaran` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_mulai` datetime(0) NULL DEFAULT NULL,
  `tanggal_mulai_dokter` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `lama_hari` int(10) UNSIGNED NULL DEFAULT 0,
  `lama_jam` int(10) UNSIGNED NULL DEFAULT 0,
  `lama_menit` int(10) UNSIGNED NULL DEFAULT 0,
  `statuspulang_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kontrol` date NULL DEFAULT NULL,
  `daftar_ulang_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `catatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pengkajian_keperawatan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `dokter_id_bpjs_jejaring` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `pelayanan_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pelayanan_pendaftaran_id_foreign`(`pendaftaran_id`) USING BTREE,
  INDEX `t_pelayanan_instalasi_id_foreign`(`instalasi_id`) USING BTREE,
  INDEX `t_pelayanan_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `t_pelayanan_kamar_id_foreign`(`kamar_id`) USING BTREE,
  INDEX `t_pelayanan_bed_id_foreign`(`bed_id`) USING BTREE,
  INDEX `t_pelayanan_rujukanpelayanan_id_foreign`(`rujukanpelayanan_id`) USING BTREE,
  INDEX `t_pelayanan_antrean_index`(`antrean`) USING BTREE,
  INDEX `t_pelayanan_statuspulang_id_foreign`(`statuspulang_id`) USING BTREE,
  INDEX `t_pelayanan_pengkajian_keperawatan_id_foreign`(`pengkajian_keperawatan_id`) USING BTREE,
  INDEX `t_pelayanan_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  INDEX `t_pelayanan_daftar_ulang_id_foreign`(`daftar_ulang_id`) USING BTREE,
  CONSTRAINT `t_pelayanan_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `m_bed` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_daftar_ulang_id_foreign` FOREIGN KEY (`daftar_ulang_id`) REFERENCES `t_pendaftaran` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_instalasi_id_foreign` FOREIGN KEY (`instalasi_id`) REFERENCES `m_instalasi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `m_kamar` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `t_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `t_pendaftaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_pengkajian_keperawatan_id_foreign` FOREIGN KEY (`pengkajian_keperawatan_id`) REFERENCES `t_pengkajian_keperawatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_rujukanpelayanan_id_foreign` FOREIGN KEY (`rujukanpelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pelayanan_statuspulang_id_foreign` FOREIGN KEY (`statuspulang_id`) REFERENCES `m_statuspulang` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 100074 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran`;
CREATE TABLE `t_pembayaran`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandtotal` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `jumlah_bayar` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `sisa_bayar` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `uang_bayar` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `uang_kembali` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `jaminan` double(8, 2) NULL DEFAULT 0.00,
  `status` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dibayar_oleh` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pembayaran_pendaftaran_id_foreign`(`pendaftaran_id`) USING BTREE,
  INDEX `t_pembayaran_petugas_id_foreign`(`petugas_id`) USING BTREE,
  CONSTRAINT `t_pembayaran_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `t_pendaftaran` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pembayaran_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pembayaran_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pembayaran_detail`;
CREATE TABLE `t_pembayaran_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pembayaran_id` int(10) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `tindakan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `paket_laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `jumlah` int(10) UNSIGNED NULL DEFAULT 0,
  `tarif` double(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `total` double(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `pembayaran` double(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `status_bayar` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pembayaran_detail_pendaftaran_id_foreign`(`pendaftaran_id`) USING BTREE,
  INDEX `t_pembayaran_detail_pembayaran_id_foreign`(`pembayaran_id`) USING BTREE,
  INDEX `t_pembayaran_detail_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  INDEX `t_pembayaran_detail_laboratorium_id_foreign`(`laboratorium_id`) USING BTREE,
  INDEX `t_pembayaran_detail_paket_laboratorium_id_foreign`(`paket_laboratorium_id`) USING BTREE,
  CONSTRAINT `t_pembayaran_detail_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `t_laboratorium_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_pembayaran_detail_paket_laboratorium_id_foreign` FOREIGN KEY (`paket_laboratorium_id`) REFERENCES `t_paket_laboratorium` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pembayaran_detail_pembayaran_id_foreign` FOREIGN KEY (`pembayaran_id`) REFERENCES `t_pembayaran` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pembayaran_detail_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `t_pendaftaran` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pembayaran_detail_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `t_tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 122 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pemeriksaan_dahak
-- ----------------------------
DROP TABLE IF EXISTS `t_pemeriksaan_dahak`;
CREATE TABLE `t_pemeriksaan_dahak`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemeriksaan_tb_id` int(10) UNSIGNED NOT NULL,
  `bulan` int(11) NOT NULL,
  `tanggal_periksa` datetime(0) NOT NULL,
  `hasil` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_registrasi_lab` varchar(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pemeriksaan_dahak_pemeriksaan_tb_id_foreign`(`pemeriksaan_tb_id`) USING BTREE,
  CONSTRAINT `t_pemeriksaan_dahak_pemeriksaan_tb_id_foreign` FOREIGN KEY (`pemeriksaan_tb_id`) REFERENCES `t_pemeriksaan_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pemeriksaan_dasar_gigi
-- ----------------------------
DROP TABLE IF EXISTS `t_pemeriksaan_dasar_gigi`;
CREATE TABLE `t_pemeriksaan_dasar_gigi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksafisik_id` int(10) UNSIGNED NOT NULL,
  `bengkak_atas` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `konsistensi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `warna_kulit` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `suhu_kulit` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `goyang` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `warna_gusi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `karies_gigi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pembengkakan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perkusi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palpasi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `druk` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_karies_gigi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pemeriksaan_dasar_gigi_periksafisik_id_foreign`(`periksafisik_id`) USING BTREE,
  CONSTRAINT `t_pemeriksaan_dasar_gigi_periksafisik_id_foreign` FOREIGN KEY (`periksafisik_id`) REFERENCES `t_periksafisik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 402 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pemeriksaan_tb
-- ----------------------------
DROP TABLE IF EXISTS `t_pemeriksaan_tb`;
CREATE TABLE `t_pemeriksaan_tb`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `berat_badan` double(4, 1) NULL DEFAULT NULL,
  `tinggi_badan` double(4, 1) NULL DEFAULT NULL,
  `parut_bcg` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jml_skoring_tb_anak` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_pmo` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp_pmo` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_pmo` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_faskes` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tipe_diagnosis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `klasifikasi_anatomi` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `klasifikasi_pengobatan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `klasifikasi_hiv` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uji_tuberkulin` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_toraks` datetime(0) NULL DEFAULT NULL,
  `no_seri_toraks` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesan_toraks` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_fnab` datetime(0) NULL DEFAULT NULL,
  `hasil_fnab` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `biakan_hasil_uji` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `contoh_biakan_hasil_uji` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `riwayat_dm` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_tes_dm` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `terapi_dm` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `hasil_pengobatan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `wanita_usia_subur` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pemeriksaan_tb_pasien_id_foreign`(`pasien_id`) USING BTREE,
  INDEX `t_pemeriksaan_tb_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `t_pemeriksaan_tb_kota_id_foreign`(`kota_id`) USING BTREE,
  CONSTRAINT `t_pemeriksaan_tb_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pemeriksaan_tb_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `t_pemeriksaan_tb_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pemesanan_obat
-- ----------------------------
DROP TABLE IF EXISTS `t_pemesanan_obat`;
CREATE TABLE `t_pemesanan_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_no` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemesanan_tujuan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmastujuan_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_proses` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pemesanan_obat_petugas_id_foreign`(`petugas_id`) USING BTREE,
  INDEX `t_pemesanan_obat_pemesanan_tujuan_foreign`(`pemesanan_tujuan`) USING BTREE,
  CONSTRAINT `t_pemesanan_obat_pemesanan_tujuan_foreign` FOREIGN KEY (`pemesanan_tujuan`) REFERENCES `m_tujuan_pemesanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pemesanan_obat_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pemesanan_obat_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_pemesanan_obat_detail`;
CREATE TABLE `t_pemesanan_obat_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_jumlah` double(16, 2) NULL DEFAULT NULL,
  `status_sinkron` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `stok_akhir` double(16, 2) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pemesanan_obat_detail_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `t_pemesanan_obat_detail_pemesanan_id_foreign`(`pemesanan_id`) USING BTREE,
  CONSTRAINT `t_pemesanan_obat_detail_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pemesanan_obat_detail_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `t_pemesanan_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pendaftaran
-- ----------------------------
DROP TABLE IF EXISTS `t_pendaftaran`;
CREATE TABLE `t_pendaftaran`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `antrean` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_tahun` int(10) UNSIGNED NOT NULL,
  `umur_bulan` int(10) UNSIGNED NOT NULL,
  `umur_hari` int(10) UNSIGNED NOT NULL,
  `penanggung_jawab_pasien` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hubungan_dengan_pasien` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp_penanggung` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kunjungan` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `with_pelayanan` tinyint(1) NOT NULL DEFAULT 1,
  `status` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asuransi_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_asuransi` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_pstprol` tinyint(1) NULL DEFAULT 0,
  `status_pstprb` tinyint(1) NULL DEFAULT 0,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `rujukan_dari` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_perujuk` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_periksa` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pendaftaran_pasien_id_foreign`(`pasien_id`) USING BTREE,
  INDEX `t_pendaftaran_asuransi_id_foreign`(`asuransi_id`) USING BTREE,
  INDEX `t_pendaftaran_antrean_index`(`antrean`) USING BTREE,
  CONSTRAINT `t_pendaftaran_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `m_asuransi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pendaftaran_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21757 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pendaftaran_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_pendaftaran_bpjs`;
CREATE TABLE `t_pendaftaran_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdProviderPeserta` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noKartu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglDaftar` date NOT NULL,
  `noUrut` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdPoli` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `diastole` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `beratBadan` double(4, 1) NULL DEFAULT 0.0,
  `tinggiBadan` double(4, 1) NULL DEFAULT 0.0,
  `respRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `heartRate` tinyint(3) UNSIGNED NULL DEFAULT 0,
  `rujukBalik` int(10) UNSIGNED NULL DEFAULT 0,
  `kunjSakit` tinyint(1) NULL DEFAULT 1,
  `kdTkp` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '10',
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pendaftaran_bpjs_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  CONSTRAINT `t_pendaftaran_bpjs_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8473 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_penerimaan_obat
-- ----------------------------
DROP TABLE IF EXISTS `t_penerimaan_obat`;
CREATE TABLE `t_penerimaan_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pemesanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerimaan_no` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `bln_lapor` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_laporan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_proses` datetime(0) NULL DEFAULT NULL,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmasasal_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_penerimaan_obat_petugas_id_foreign`(`petugas_id`) USING BTREE,
  INDEX `t_penerimaan_obat_pemesanan_id_foreign`(`pemesanan_id`) USING BTREE,
  INDEX `t_penerimaan_obat_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  INDEX `t_penerimaan_obat_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `t_penerimaan_obat_puskesmasasal_id_foreign`(`puskesmasasal_id`) USING BTREE,
  CONSTRAINT `t_penerimaan_obat_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `t_pemesanan_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_penerimaan_obat_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_penerimaan_obat_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_penerimaan_obat_puskesmasasal_id_foreign` FOREIGN KEY (`puskesmasasal_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_penerimaan_obat_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_penerimaan_obat_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_penerimaan_obat_detail`;
CREATE TABLE `t_penerimaan_obat_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penerimaan_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `obat_jumlah` double(16, 2) NULL DEFAULT NULL,
  `status_sinkron` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `obat_nama_pkm_asal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `harga_jual` double(16, 2) NULL DEFAULT NULL,
  `total_harga` double(16, 2) NULL DEFAULT NULL,
  `barcode` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `batch` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_penerimaan_obat_detail_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `t_penerimaan_obat_detail_penerimaan_id_foreign`(`penerimaan_id`) USING BTREE,
  CONSTRAINT `t_penerimaan_obat_detail_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_penerimaan_obat_detail_penerimaan_id_foreign` FOREIGN KEY (`penerimaan_id`) REFERENCES `t_penerimaan_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_penerimaan_obat_detail_sinkron
-- ----------------------------
DROP TABLE IF EXISTS `t_penerimaan_obat_detail_sinkron`;
CREATE TABLE `t_penerimaan_obat_detail_sinkron`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `penerimaan_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_obat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_jumlah` double NULL DEFAULT 0,
  `keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmasasal_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pengambilansampel
-- ----------------------------
DROP TABLE IF EXISTS `t_pengambilansampel`;
CREATE TABLE `t_pengambilansampel`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `penanggung_jawab_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asisten_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `batas_waktu` datetime(0) NULL DEFAULT NULL,
  `jenis_sampel` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `takaran` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah` double(16, 2) NULL DEFAULT NULL,
  `catatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pengambilansampel_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_pengambilansampel_penanggung_jawab_id_foreign`(`penanggung_jawab_id`) USING BTREE,
  INDEX `t_pengambilansampel_asisten_id_foreign`(`asisten_id`) USING BTREE,
  CONSTRAINT `t_pengambilansampel_asisten_id_foreign` FOREIGN KEY (`asisten_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pengambilansampel_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pengambilansampel_penanggung_jawab_id_foreign` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pengkajian_keperawatan
-- ----------------------------
DROP TABLE IF EXISTS `t_pengkajian_keperawatan`;
CREATE TABLE `t_pengkajian_keperawatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asisten_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pengkajian_keperawatan_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_pengkajian_keperawatan_asisten_id_foreign`(`asisten_id`) USING BTREE,
  CONSTRAINT `t_pengkajian_keperawatan_asisten_id_foreign` FOREIGN KEY (`asisten_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pengkajian_keperawatan_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pengkajian_resikojatuh
-- ----------------------------
DROP TABLE IF EXISTS `t_pengkajian_resikojatuh`;
CREATE TABLE `t_pengkajian_resikojatuh`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pengkajian_resikojatuh_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_pengkajian_resikojatuh_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_pengkajian_resikojatuh_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_pengkajian_resikojatuh_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pengkajian_resikojatuh_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pengkajian_resikojatuh_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_perencanaan_keperawatan
-- ----------------------------
DROP TABLE IF EXISTS `t_perencanaan_keperawatan`;
CREATE TABLE `t_perencanaan_keperawatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `pengkajian_keperawatan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `noc_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nic_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_perencanaan_keperawatan_pengkajian_keperawatan_id_foreign`(`pengkajian_keperawatan_id`) USING BTREE,
  CONSTRAINT `t_perencanaan_keperawatan_pengkajian_keperawatan_id_foreign` FOREIGN KEY (`pengkajian_keperawatan_id`) REFERENCES `t_pengkajian_keperawatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksafisik
-- ----------------------------
DROP TABLE IF EXISTS `t_periksafisik`;
CREATE TABLE `t_periksafisik`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NOT NULL,
  `diastole` tinyint(3) UNSIGNED NOT NULL,
  `detak_nadi` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `nafas` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `detak_jantung` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `suhu` double(4, 1) NULL DEFAULT NULL,
  `kesadaran` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `triage` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `berat` double(5, 2) NULL DEFAULT NULL,
  `tinggi` double(5, 2) NULL DEFAULT NULL,
  `lingkar_perut` double(4, 1) NULL DEFAULT NULL,
  `imt` double(5, 2) NULL DEFAULT NULL,
  `hasil_imt` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aktifitas_fisik` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kulit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kuku` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kepala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `wajah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `mata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `telinga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `hidung_sinus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `mulut_bibir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `leher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dada_punggung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kardiovaskuler` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `dada_aksila` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `abdomen_perut` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ekstermitas_atas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ekstermitas_bawah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `genitalia_wanita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `genitalia_pria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `periksafisik_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_hamil` tinyint(1) NOT NULL DEFAULT 0,
  `skala_nyeri` enum('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksafisik_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_periksafisik_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_periksafisik_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_periksafisik_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksafisik_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_periksafisik_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18088 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksafisik_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_periksafisik_detail`;
CREATE TABLE `t_periksafisik_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksafisik_id` int(10) UNSIGNED NOT NULL,
  `bagiantubuh` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posisi_x` double(9, 8) NULL DEFAULT NULL,
  `posisi_y` double(9, 8) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksafisik_detail_periksafisik_id_foreign`(`periksafisik_id`) USING BTREE,
  CONSTRAINT `t_periksafisik_detail_periksafisik_id_foreign` FOREIGN KEY (`periksafisik_id`) REFERENCES `t_periksafisik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksagizi
-- ----------------------------
DROP TABLE IF EXISTS `t_periksagizi`;
CREATE TABLE `t_periksagizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur_bulan` int(11) NOT NULL,
  `berat` double(5, 2) NULL DEFAULT NULL,
  `tinggi` double(5, 2) NULL DEFAULT NULL,
  `rencana_monev` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `intervensi_gizi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_personal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_dietary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_klinis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `biokimia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aktivitas_fisik` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_pengobatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kurang_sayur_buah` tinyint(1) NULL DEFAULT NULL,
  `konsumsi_alkohol` tinyint(1) NULL DEFAULT NULL,
  `merokok` tinyint(1) NULL DEFAULT NULL,
  `lingkar_perut` double(5, 2) NULL DEFAULT NULL,
  `nafas` double(5, 2) NULL DEFAULT NULL,
  `suhu` double(5, 2) NULL DEFAULT NULL,
  `detak_nadi` double(5, 2) NULL DEFAULT NULL,
  `diastole` double(5, 2) NULL DEFAULT NULL,
  `sistole` double(5, 2) NULL DEFAULT NULL,
  `keterangan_lain` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kebutuhan_kalori` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_gizi` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `imt` double(5, 2) NULL DEFAULT NULL,
  `keluhan_utama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bb_u` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tb_u` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb_tb` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `n_t` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lila` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kek` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bmi` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asi` tinyint(1) NULL DEFAULT NULL,
  `vitamin_a` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `konseling` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pmt` tinyint(1) NULL DEFAULT NULL,
  `obat_cacing` tinyint(1) NULL DEFAULT NULL,
  `gejala_gizi_buruk` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksagizi_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_periksagizi_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_periksagizi_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_periksagizi_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksagizi_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksagizi_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaims
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaims`;
CREATE TABLE `t_periksaims`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kunjungan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_rujukan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kunjungan_ke` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok_risiko` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasan_kunjungan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan_ims` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kehamilan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hubungan_seksterakhir` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondomhubungan_seksterakhir` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlahpasangan_seksterakhir` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondomhubungan1mg_seksterakhir` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondomhubunganpacar_seksterakhir` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cuci_vagina` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anamnesa_lainnya` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanda_klinis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujuk_lab` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaims_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_periksaims_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_periksaims_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_periksaims_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaims_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaims_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaims_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaims_detail`;
CREATE TABLE `t_periksaims_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksaims_id` int(10) UNSIGNED NOT NULL,
  `pnm_uretra_serviks` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diplokokus_intrasel_uletra` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pnm_anus` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diplokokus_intrasel_anus` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `t_vaginalis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kandida` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ph` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ph_value` int(11) NULL DEFAULT NULL,
  `sniff_test` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `clue_test` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rpr_vdrl` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tpha_ttpa` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rpr_vdrl_titer` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_pemeriksaanlab_lainnya` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis_lab` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis_lainnya` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ditest_sifilis` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pengobatan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_kondom` int(11) NULL DEFAULT NULL,
  `jumlah_materi_kie` int(11) NULL DEFAULT NULL,
  `rujuk_vct` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaims_detail_periksaims_id_foreign`(`periksaims_id`) USING BTREE,
  CONSTRAINT `t_periksaims_detail_periksaims_id_foreign` FOREIGN KEY (`periksaims_id`) REFERENCES `t_periksaims` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaiva
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaiva`;
CREATE TABLE `t_periksaiva`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `berat` double(4, 1) NULL DEFAULT NULL,
  `tinggi` double(4, 1) NULL DEFAULT NULL,
  `status_kawin` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kawin_value` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaansuami_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kawin_suami` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_kawin_suami_value` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info_pelayanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info_pelayanan_value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kemudahan_tempat` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `usia_pertama_haid` double(4, 1) NULL DEFAULT NULL,
  `usia_pertama_kawin` double(4, 1) NULL DEFAULT NULL,
  `usia_pertama_hamil` double(4, 1) NULL DEFAULT NULL,
  `tanggal_hpht` datetime(0) NULL DEFAULT NULL,
  `siklus_haid` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_melahirkan` tinyint(4) NULL DEFAULT NULL,
  `umur_monopouse` double(4, 1) NULL DEFAULT NULL,
  `pernah_menyusui` tinyint(1) NULL DEFAULT NULL,
  `caesar` tinyint(4) NULL DEFAULT NULL,
  `keguguran` tinyint(4) NULL DEFAULT NULL,
  `keluarga_kanker` tinyint(1) NULL DEFAULT NULL,
  `keluarga_kanker_nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kanker_apa` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kanker_value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keputihan` tinyint(1) NULL DEFAULT NULL,
  `sakit_panggul` tinyint(1) NULL DEFAULT NULL,
  `pendarahan_senggama` tinyint(1) NULL DEFAULT NULL,
  `pendarahan_diluar_haid` tinyint(1) NULL DEFAULT NULL,
  `nyeri_payudara` tinyint(1) NULL DEFAULT NULL,
  `benjolan_payudara` tinyint(1) NULL DEFAULT NULL,
  `cairan_payudara` tinyint(1) NULL DEFAULT NULL,
  `lain_lain_keluhan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaiva_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_periksaiva_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_periksaiva_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_periksaiva_pekerjaan_id_foreign`(`pekerjaan_id`) USING BTREE,
  INDEX `t_periksaiva_pekerjaansuami_id_foreign`(`pekerjaansuami_id`) USING BTREE,
  CONSTRAINT `t_periksaiva_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `m_pekerjaan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_pekerjaansuami_id_foreign` FOREIGN KEY (`pekerjaansuami_id`) REFERENCES `m_pekerjaan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaiva_krioterapi
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaiva_krioterapi`;
CREATE TABLE `t_periksaiva_krioterapi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `periksaiva_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tandatangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `probekrio_tip` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemberian_antibiotik` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemberian_value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kemungkinan_setelah` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kontrol` datetime(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaiva_krioterapi_periksaiva_id_foreign`(`periksaiva_id`) USING BTREE,
  INDEX `t_periksaiva_krioterapi_dokter_id_foreign`(`dokter_id`) USING BTREE,
  CONSTRAINT `t_periksaiva_krioterapi_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_krioterapi_periksaiva_id_foreign` FOREIGN KEY (`periksaiva_id`) REFERENCES `t_periksaiva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaiva_payudara
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaiva_payudara`;
CREATE TABLE `t_periksaiva_payudara`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `periksaiva_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tandatangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kulit_kanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aerola_kanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolan_kanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolankanan_ukuran_a` double(4, 1) NULL DEFAULT NULL,
  `benjolankanan_ukuran_b` double(4, 1) NULL DEFAULT NULL,
  `kulit_kiri` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aerola_kiri` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolan_kiri` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolankiri_ukuran_a` double(4, 1) NULL DEFAULT NULL,
  `benjolankiri_ukuran_b` double(4, 1) NULL DEFAULT NULL,
  `hasil_perabaan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaiva_payudara_periksaiva_id_foreign`(`periksaiva_id`) USING BTREE,
  INDEX `t_periksaiva_payudara_dokter_id_foreign`(`dokter_id`) USING BTREE,
  CONSTRAINT `t_periksaiva_payudara_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_payudara_periksaiva_id_foreign` FOREIGN KEY (`periksaiva_id`) REFERENCES `t_periksaiva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaiva_rahim
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaiva_rahim`;
CREATE TABLE `t_periksaiva_rahim`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NULL DEFAULT NULL,
  `periksaiva_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tandatangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `curiga_kanker` tinyint(1) NULL DEFAULT NULL,
  `pemeriksaan_ssk` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pengambilan_pap` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_iva` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_iva_radang` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_iva_value` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_lainnya` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_lainnya_value` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaiva_rahim_periksaiva_id_foreign`(`periksaiva_id`) USING BTREE,
  INDEX `t_periksaiva_rahim_dokter_id_foreign`(`dokter_id`) USING BTREE,
  CONSTRAINT `t_periksaiva_rahim_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_periksaiva_rahim_periksaiva_id_foreign` FOREIGN KEY (`periksaiva_id`) REFERENCES `t_periksaiva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_periksaiva_visual
-- ----------------------------
DROP TABLE IF EXISTS `t_periksaiva_visual`;
CREATE TABLE `t_periksaiva_visual`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksaiva_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posisi_x` double(9, 8) NULL DEFAULT NULL,
  `posisi_y` double(9, 8) NULL DEFAULT NULL,
  `keterangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_periksaiva_visual_periksaiva_id_foreign`(`periksaiva_id`) USING BTREE,
  CONSTRAINT `t_periksaiva_visual_periksaiva_id_foreign` FOREIGN KEY (`periksaiva_id`) REFERENCES `t_periksaiva` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_persalinan
-- ----------------------------
DROP TABLE IF EXISTS `t_persalinan`;
CREATE TABLE `t_persalinan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `kehamilan_id` int(10) UNSIGNED NOT NULL,
  `no_urut_kehamilan` tinyint(4) NULL DEFAULT NULL,
  `kala_satu_tanggal` date NULL DEFAULT NULL,
  `kala_satu_jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kala_dua_tanggal` date NULL DEFAULT NULL,
  `kala_dua_jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bayi_lahir_tanggal` date NULL DEFAULT NULL,
  `bayi_lahir_jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `plasenta_lahir_tanggal` date NULL DEFAULT NULL,
  `plasenta_lahir_jam` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendarahan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `usia_kehamilan` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `usia_hpht` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_ibu` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keadaan_bayi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb_bayi` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `presentasi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `penolong` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cara_persalinan` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `manajemen_aktif` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pelayanan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `integrasi_program` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `arv_progilaksi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komplikasi` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujuk_ke` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_bersalin` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_persalinan_kehamilan_id_foreign`(`kehamilan_id`) USING BTREE,
  CONSTRAINT `t_persalinan_kehamilan_id_foreign` FOREIGN KEY (`kehamilan_id`) REFERENCES `t_kehamilan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_pkpr
-- ----------------------------
DROP TABLE IF EXISTS `t_pkpr`;
CREATE TABLE `t_pkpr`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_mulai` datetime(0) NULL DEFAULT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `warganegara` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_tinggal` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_hp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_sekolah` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelas` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anak_ke` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dari_saudara` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan_ayah` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_id_ayah` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pendidikan_ibu` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pekerjaan_id_ibu` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `orang_tua` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gangguan_haid` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gangguan_haid_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `seks_pranikah` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `seks_pranikah_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_diinginkan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_diinginkan_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_tak_diinginkan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kehamilan_tak_diinginkan_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `persalinan_remaja` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `persalinan_remaja_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `abortus` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `abortus_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gangguan_gizi` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gangguan_gizi_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anemia` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anemia_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kek` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kek_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obesitas` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obesitas_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `napza` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `napza_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `merokok` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `merokok_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alkohol` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alkohol_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `napza_lain` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `napza_lain_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ims` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ims_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isr` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isr_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hiv` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hiv_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aids` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aids_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `psikologis` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `psikologis_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesulitan_belajar` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesulitan_belajar_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdrt` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdrt_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lainnya` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lainnya_keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `masalah_utama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `latar_belakang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `alternatif` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `keputusan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `observasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `konselor` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `home` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `employment_education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `eating` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `activity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `drugs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sexuality` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `safety` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `suicide_depression` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_pkpr_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_pkpr_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_pkpr_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_pkpr_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pkpr_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_pkpr_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 183 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_prima
-- ----------------------------
DROP TABLE IF EXISTS `t_prima`;
CREATE TABLE `t_prima`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan_utama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_reproduksi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `jenis_pekerjaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `uraian_tugas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pekerjaan_keluhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sensorium` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tekanan_darah` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `detak_nadi` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `nafas` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `temp_suhu` double(4, 1) NULL DEFAULT NULL,
  `berat` double(5, 2) NULL DEFAULT NULL,
  `tinggi` double(5, 2) NULL DEFAULT NULL,
  `imt` double(5, 2) NULL DEFAULT NULL,
  `bentuk_badan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kepala` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `visus_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `visus_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tio_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tio_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palbebra_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `palbebra_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `conjunctiva_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `conjunctiva_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cornea_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cornea_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coa_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coa_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `iris_pupil_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `iris_pupil_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lensa_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lensa_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vitreous_funduskopi_od` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vitreous_funduskopi_os` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `daun_telinga_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `daun_telinga_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `liang_telinga_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `liang_telinga_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `membrana_timpani_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `membrana_timpani_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `test_berbisik_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `test_berbisik_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rinne_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rinne_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `weber_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `weber_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `swabach_kanan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `swabach_kiri` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `tenggorokan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `leher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `thorax` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `abdomen` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ekstermitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kulit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_penunjang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `diagnosis_kerja` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `diagnosis_klinis_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis_klinis_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_fisik_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_fisik_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_kimia_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_kimia_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_biologi_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_biologi_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_ergonomi_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_ergonomi_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_psikosial_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_psikosial_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `evidence_based_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `evidence_based_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_masa_kerja_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_masa_kerja_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_jumlah_jam_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_jumlah_jam_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_pemakaian_apd_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_pemakaian_apd_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_konsentrasi_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pajanan_konsentrasi_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lainnya_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lainnya_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesimpulan_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesimpulan_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_individu_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_individu_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_luar_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_luar_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis_okupasi_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosis_okupasi_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kategori_kesehatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `prognosis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `tatalaksana` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_prima_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_prima_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_prima_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_prima_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_prima_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_prima_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_prima_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_prima_detail`;
CREATE TABLE `t_prima_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prima_id` int(10) UNSIGNED NOT NULL,
  `urutan_kegiatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fisik` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kimia` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `biologi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ergonomi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `psikosial` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecelakaan_kerja` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gangguan_kesehatan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_prima_detail_prima_id_foreign`(`prima_id`) USING BTREE,
  CONSTRAINT `t_prima_detail_prima_id_foreign` FOREIGN KEY (`prima_id`) REFERENCES `t_prima` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_psikologi
-- ----------------------------
DROP TABLE IF EXISTS `t_psikologi`;
CREATE TABLE `t_psikologi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anak_ke` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dari` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hobby` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `aktivitas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `jenis_rujukan` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keluhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `penampilan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `emosi` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `motorik` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kognitif` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sosial` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `autoanamnesa` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `upaya` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alloanamnesa_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alloanamnesa_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alloanamnesa_3` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `axis_1` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `axis_2` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `axis_3` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `axis_4` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `axis_5` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_pendukung` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faktor_penghambat` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `treatment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rencana` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `jenis_kasus` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_genogram` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_psikologi_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_psikologi_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_psikologi_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_psikologi_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_psikologi_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_psikologi_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_psikologi_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_psikologi_detail`;
CREATE TABLE `t_psikologi_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `psikologi_id` int(10) UNSIGNED NOT NULL,
  `jenis_tes` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil_interprestasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_psikologi_detail_psikologi_id_foreign`(`psikologi_id`) USING BTREE,
  CONSTRAINT `t_psikologi_detail_psikologi_id_foreign` FOREIGN KEY (`psikologi_id`) REFERENCES `t_psikologi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_ptm
-- ----------------------------
DROP TABLE IF EXISTS `t_ptm`;
CREATE TABLE `t_ptm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `skrining_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `diabetes_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `hipertensi_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `jantung_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `stroke_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `asma_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kanker_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kolesterol_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `benjolan_keluarga` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `diabetes_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `hipertensi_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `jantung_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `stroke_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `asma_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kanker_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kolesterol_sendiri` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `merokok` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kurang_aktifitas_fisik` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `kurang_makan_sayur` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `alkohol` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `sistole` int(10) NULL DEFAULT NULL,
  `diastole` int(10) NULL DEFAULT NULL,
  `tinggi` double(4, 1) NULL DEFAULT NULL,
  `berat` double(4, 1) NULL DEFAULT NULL,
  `lingkar_perut` double(4, 1) NULL DEFAULT NULL,
  `gula` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kolesterol` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `benjolan_payudara` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `rujuk_fktp` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `benjolan_abnormal_payudara` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `riwayat_periksa_iva` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `hasil_periksa_iva` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `pap_smear` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `krioterapi` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `diagnosa_id_1` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id_2` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id_3` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id_4` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `diagnosa_id_5` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rujuk_rs` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '2',
  `is_skrining` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_ptm_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_ptm_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_ptm_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_ptm_diagnosa_id_1_foreign`(`diagnosa_id_1`) USING BTREE,
  INDEX `t_ptm_diagnosa_id_2_foreign`(`diagnosa_id_2`) USING BTREE,
  INDEX `t_ptm_diagnosa_id_3_foreign`(`diagnosa_id_3`) USING BTREE,
  INDEX `t_ptm_diagnosa_id_4_foreign`(`diagnosa_id_4`) USING BTREE,
  INDEX `t_ptm_diagnosa_id_5_foreign`(`diagnosa_id_5`) USING BTREE,
  INDEX `t_ptm_skrining_id_foreign`(`skrining_id`) USING BTREE,
  CONSTRAINT `t_ptm_diagnosa_id_1_foreign` FOREIGN KEY (`diagnosa_id_1`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_diagnosa_id_2_foreign` FOREIGN KEY (`diagnosa_id_2`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_diagnosa_id_3_foreign` FOREIGN KEY (`diagnosa_id_3`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_diagnosa_id_4_foreign` FOREIGN KEY (`diagnosa_id_4`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_diagnosa_id_5_foreign` FOREIGN KEY (`diagnosa_id_5`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_ptm_skrining_id_foreign` FOREIGN KEY (`skrining_id`) REFERENCES `t_skrining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 216 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_resep
-- ----------------------------
DROP TABLE IF EXISTS `t_resep`;
CREATE TABLE `t_resep`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_resep` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `antrean` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `ruangantujuan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_print` tinyint(1) NULL DEFAULT 0,
  `status_ambil` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `resep_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_resep_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_resep_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_resep_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_resep_ruangantujuan_id_foreign`(`ruangantujuan_id`) USING BTREE,
  CONSTRAINT `t_resep_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_resep_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_resep_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_resep_ruangantujuan_id_foreign` FOREIGN KEY (`ruangantujuan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10480 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_resep_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_resep_detail`;
CREATE TABLE `t_resep_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `resep_id` int(10) UNSIGNED NOT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_jumlah` double(16, 2) NULL DEFAULT NULL,
  `obat_signa` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `aturan_pakai` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_racikan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_jumlah_permintaan` double(16, 2) NULL DEFAULT NULL,
  `obat_keterangan` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_indikasi` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `obat_tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `resep_detail_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_resep_detail_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `t_resep_detail_resep_id_foreign`(`resep_id`) USING BTREE,
  CONSTRAINT `t_resep_detail_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_resep_detail_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `t_resep` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21480 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_resep_detail_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_resep_detail_bpjs`;
CREATE TABLE `t_resep_detail_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noKunjungan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `racikan` tinyint(1) NOT NULL DEFAULT 0,
  `obatDPHO` tinyint(1) NOT NULL DEFAULT 1,
  `signa1` int(11) NULL DEFAULT NULL,
  `signa2` int(11) NULL DEFAULT NULL,
  `kdObat` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jmlObat` double(16, 2) NULL DEFAULT NULL,
  `jmlPermintaan` double(16, 2) NULL DEFAULT NULL,
  `nmObatNonDPHO` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kunjungan_id` int(11) NOT NULL,
  `kdObatSK` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdRacikan` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `resep_detail_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_resep_detail_bpjs_resep_detail_id_foreign`(`resep_detail_id`) USING BTREE,
  CONSTRAINT `t_resep_detail_bpjs_resep_detail_id_foreign` FOREIGN KEY (`resep_detail_id`) REFERENCES `t_resep_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_rujukan_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_rujukan_bpjs`;
CREATE TABLE `t_rujukan_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noRujukan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nokaPst` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmPst` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglLahir` date NULL DEFAULT NULL,
  `nmKR` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmKC` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdPPK` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmPPK` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdDati` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmDati` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmProvider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmPoli` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur` int(10) UNSIGNED NULL DEFAULT NULL,
  `pisa` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sex` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmDiag` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `catatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nmTacc` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasanTacc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglKunjungan` date NULL DEFAULT NULL,
  `nmDokter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `catatanRujuk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tglEstRujuk` date NULL DEFAULT NULL,
  `tglAkhirRujuk` date NULL DEFAULT NULL,
  `jadwal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1258 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_rujukan_laboratorium
-- ----------------------------
DROP TABLE IF EXISTS `t_rujukan_laboratorium`;
CREATE TABLE `t_rujukan_laboratorium`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laboratorium_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `puskesmas_asal` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_rujukan_laboratorium_pasien_id_foreign`(`pasien_id`) USING BTREE,
  CONSTRAINT `t_rujukan_laboratorium_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_rujukan_sisrute
-- ----------------------------
DROP TABLE IF EXISTS `t_rujukan_sisrute`;
CREATE TABLE `t_rujukan_sisrute`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomor_rujukan_sisrute` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `rujukan_external_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keterangan_status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_rujukan` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_faskes` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_rujukan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa_sisrute_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alasan_lainnya` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_rujukan_sisrute_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_rujukan_sisrute_rujukan_external_id_foreign`(`rujukan_external_id`) USING BTREE,
  INDEX `t_rujukan_sisrute_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_rujukan_sisrute_diagnosa_sisrute_id_foreign`(`diagnosa_sisrute_id`) USING BTREE,
  INDEX `t_rujukan_sisrute_petugas_id_foreign`(`petugas_id`) USING BTREE,
  INDEX `t_rujukan_sisrute_kode_faskes_foreign`(`kode_faskes`) USING BTREE,
  CONSTRAINT `t_rujukan_sisrute_diagnosa_sisrute_id_foreign` FOREIGN KEY (`diagnosa_sisrute_id`) REFERENCES `m_diagnosa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_rujukan_sisrute_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_rujukan_sisrute_kode_faskes_foreign` FOREIGN KEY (`kode_faskes`) REFERENCES `m_tujuan_rujukan_sisrute` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_rujukan_sisrute_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_rujukan_sisrute_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_rujukan_sisrute_rujukan_external_id_foreign` FOREIGN KEY (`rujukan_external_id`) REFERENCES `t_tujuanrujukan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining`;
CREATE TABLE `t_skrining`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asuransi_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_asuransi` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_kk` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `kepala_keluarga` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `propinsi_id` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kota_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kecamatan_id` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelurahan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dusun_id` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_luargedung` tinyint(1) NULL DEFAULT NULL,
  `is_bridgingbpjs` tinyint(1) NULL DEFAULT NULL,
  `skrining` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_skrining_pasien_id_foreign`(`pasien_id`) USING BTREE,
  INDEX `t_skrining_asuransi_id_foreign`(`asuransi_id`) USING BTREE,
  INDEX `t_skrining_propinsi_id_foreign`(`propinsi_id`) USING BTREE,
  INDEX `t_skrining_kota_id_foreign`(`kota_id`) USING BTREE,
  INDEX `t_skrining_kecamatan_id_foreign`(`kecamatan_id`) USING BTREE,
  INDEX `t_skrining_kelurahan_id_foreign`(`kelurahan_id`) USING BTREE,
  INDEX `t_skrining_dusun_id_foreign`(`dusun_id`) USING BTREE,
  CONSTRAINT `t_skrining_asuransi_id_foreign` FOREIGN KEY (`asuransi_id`) REFERENCES `m_asuransi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_dusun_id_foreign` FOREIGN KEY (`dusun_id`) REFERENCES `m_dusun` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `m_kecamatan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `m_kelurahan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_kota_id_foreign` FOREIGN KEY (`kota_id`) REFERENCES `m_kota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `t_skrining_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_propinsi_id_foreign` FOREIGN KEY (`propinsi_id`) REFERENCES `m_propinsi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 238 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining_anak_sekolah
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining_anak_sekolah`;
CREATE TABLE `t_skrining_anak_sekolah`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `tanggal_selesai` datetime(0) NULL DEFAULT NULL,
  `siswa_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sekolah_id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_sekolah` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat_sekolah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nama` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kelas` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `umur_tahun` int(10) UNSIGNED NULL DEFAULT NULL,
  `umur_bulan` int(10) UNSIGNED NULL DEFAULT NULL,
  `umur_hari` int(10) UNSIGNED NULL DEFAULT NULL,
  `golongan_darah` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_kelamin` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_orangtua` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_disabilitas` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesimpulan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `tindak_lanjut` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_anak_sekolah_siswa_id_foreign`(`siswa_id`) USING BTREE,
  INDEX `t_skrining_anak_sekolah_sekolah_id_foreign`(`sekolah_id`) USING BTREE,
  CONSTRAINT `t_skrining_anak_sekolah_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `m_sekolah` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_anak_sekolah_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `m_siswa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining_anak_sekolah_detail
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining_anak_sekolah_detail`;
CREATE TABLE `t_skrining_anak_sekolah_detail`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skrining_anak_id` int(10) UNSIGNED NOT NULL,
  `riwayat_kesehatan_anak` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_imunisasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `riwayat_kesehatan_keluarga` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gaya_hidup` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kesehatan_reproduksi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kesehatan_mental_emosional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kesehatan_intelegensia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_tanda_vital` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_status_gizi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_kebersihan_diri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_kesehatan_penglihatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_kesehatan_pendengaran` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_kesehatan_gigimulut` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `diagram_gigi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemakaian_alat_bantu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pemeriksaan_kebugaran_jasmani` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rujukan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_anak_sekolah_detail_skrining_anak_id_foreign`(`skrining_anak_id`) USING BTREE,
  CONSTRAINT `t_skrining_anak_sekolah_detail_skrining_anak_id_foreign` FOREIGN KEY (`skrining_anak_id`) REFERENCES `t_skrining_anak_sekolah` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining_lansia
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining_lansia`;
CREATE TABLE `t_skrining_lansia`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skrining_id` int(10) UNSIGNED NOT NULL,
  `form1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form5` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form6` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form7` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form8` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `form9` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_lansia_skrining_id_foreign`(`skrining_id`) USING BTREE,
  CONSTRAINT `t_skrining_lansia_skrining_id_foreign` FOREIGN KEY (`skrining_id`) REFERENCES `t_skrining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining_ptm
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining_ptm`;
CREATE TABLE `t_skrining_ptm`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skrining_id` int(10) UNSIGNED NOT NULL,
  `penyakit_keluarga_diabetes` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_hipertensi` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_jantung` tinyint(1) NULL DEFAULT NULL,
  `penyakit_keluarga_stroke` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_diabetes` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_hipertensi` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_jantung` tinyint(1) NULL DEFAULT NULL,
  `penyakit_sendiri_stroke` tinyint(1) NULL DEFAULT NULL,
  `merokok` tinyint(1) NULL DEFAULT NULL,
  `kurang_aktifitas_fisik` tinyint(1) NULL DEFAULT NULL,
  `konsumsi_alkohol` tinyint(1) NULL DEFAULT NULL,
  `kurang_sayur_dan_buah` tinyint(1) NULL DEFAULT NULL,
  `sistole` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `diastole` tinyint(3) UNSIGNED NULL DEFAULT NULL,
  `tinggi_badan` double(5, 2) NULL DEFAULT NULL,
  `berat_badan` double(5, 2) NULL DEFAULT NULL,
  `imt` double(5, 2) NULL DEFAULT NULL,
  `lingkar_perut` double(4, 1) NULL DEFAULT NULL,
  `gula_darah_sewaktu` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pemeriksaan_iva` tinyint(1) NULL DEFAULT NULL,
  `hasil_iva` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_ptm_skrining_id_foreign`(`skrining_id`) USING BTREE,
  CONSTRAINT `t_skrining_ptm_skrining_id_foreign` FOREIGN KEY (`skrining_id`) REFERENCES `t_skrining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_skrining_tb
-- ----------------------------
DROP TABLE IF EXISTS `t_skrining_tb`;
CREATE TABLE `t_skrining_tb`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skrining_id` int(10) UNSIGNED NOT NULL,
  `batuk_selama_lebih` tinyint(1) NULL DEFAULT NULL,
  `batuk_bercampur_darah` tinyint(1) NULL DEFAULT NULL,
  `sesak_nafas` tinyint(1) NULL DEFAULT NULL,
  `badan_lemas` tinyint(1) NULL DEFAULT NULL,
  `nafsu_makan_menurun` tinyint(1) NULL DEFAULT NULL,
  `berat_badan_menurun` tinyint(1) NULL DEFAULT NULL,
  `berkeringat_malam_hari` tinyint(1) NULL DEFAULT NULL,
  `demam` tinyint(1) NULL DEFAULT NULL,
  `petugas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_skrining_tb_skrining_id_foreign`(`skrining_id`) USING BTREE,
  INDEX `t_skrining_tb_petugas_id_foreign`(`petugas_id`) USING BTREE,
  CONSTRAINT `t_skrining_tb_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_skrining_tb_skrining_id_foreign` FOREIGN KEY (`skrining_id`) REFERENCES `t_skrining` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_soap
-- ----------------------------
DROP TABLE IF EXISTS `t_soap`;
CREATE TABLE `t_soap`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `soap_id` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anamnesa_id` int(10) UNSIGNED NOT NULL,
  `subjective` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `objective` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `planning` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `soap_id_cloud` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_soap_anamnesa_id_foreign`(`anamnesa_id`) USING BTREE,
  INDEX `t_soap_soap_id_foreign`(`soap_id`) USING BTREE,
  CONSTRAINT `t_soap_anamnesa_id_foreign` FOREIGN KEY (`anamnesa_id`) REFERENCES `t_anamnesa` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_soap_soap_id_foreign` FOREIGN KEY (`soap_id`) REFERENCES `m_soap` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_status_kirim
-- ----------------------------
DROP TABLE IF EXISTS `t_status_kirim`;
CREATE TABLE `t_status_kirim`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thn` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bln` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `model_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `status_eis` tinyint(1) NOT NULL DEFAULT 0,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_status_kirim_thn_index`(`thn`) USING BTREE,
  INDEX `t_status_kirim_bln_index`(`bln`) USING BTREE,
  INDEX `t_status_kirim_model_id_index`(`model_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_status_kirim_new
-- ----------------------------
DROP TABLE IF EXISTS `t_status_kirim_new`;
CREATE TABLE `t_status_kirim_new`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_id` int(10) UNSIGNED NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_status_kirim_new_header_id_foreign`(`header_id`) USING BTREE,
  CONSTRAINT `t_status_kirim_new_header_id_foreign` FOREIGN KEY (`header_id`) REFERENCES `r_header` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_stok_opname
-- ----------------------------
DROP TABLE IF EXISTS `t_stok_opname`;
CREATE TABLE `t_stok_opname`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_opname` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asisten_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_stok_opname_penanggung_jawab_id_foreign`(`penanggung_jawab_id`) USING BTREE,
  INDEX `t_stok_opname_asisten_id_foreign`(`asisten_id`) USING BTREE,
  INDEX `t_stok_opname_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  CONSTRAINT `t_stok_opname_asisten_id_foreign` FOREIGN KEY (`asisten_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_stok_opname_penanggung_jawab_id_foreign` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_stok_opname_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_stok_opname_obat
-- ----------------------------
DROP TABLE IF EXISTS `t_stok_opname_obat`;
CREATE TABLE `t_stok_opname_obat`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `obat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_dana` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tahun_anggaran` year NULL DEFAULT NULL,
  `harga_jual` double(8, 2) NULL DEFAULT 0.00,
  `stok_sistem` double(16, 2) NULL DEFAULT NULL,
  `stok_fisik` double(16, 2) NULL DEFAULT NULL,
  `stok_opname` double(16, 2) NULL DEFAULT NULL,
  `batch` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `barcode` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_kadaluarsa` date NULL DEFAULT NULL,
  `ruangan_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `opname_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `m_stok_obat_id` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_stok_opname_obat_obat_id_foreign`(`obat_id`) USING BTREE,
  INDEX `t_stok_opname_obat_ruangan_id_foreign`(`ruangan_id`) USING BTREE,
  INDEX `t_stok_opname_obat_opname_id_foreign`(`opname_id`) USING BTREE,
  CONSTRAINT `t_stok_opname_obat_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `m_obat` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_stok_opname_obat_opname_id_foreign` FOREIGN KEY (`opname_id`) REFERENCES `t_stok_opname` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `t_stok_opname_obat_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `m_ruangan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 634 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tahap_pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `t_tahap_pemeriksaan`;
CREATE TABLE `t_tahap_pemeriksaan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `periksatb_id` int(10) UNSIGNED NOT NULL,
  `kategori` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bentuk_oat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_tahapan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sumber_obat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kdt` double(4, 1) NULL DEFAULT NULL,
  `kdt_batch` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_obat` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_obat` double(16, 2) NULL DEFAULT NULL,
  `batch` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tahap_pemeriksaan_periksatb_id_foreign`(`periksatb_id`) USING BTREE,
  CONSTRAINT `t_tahap_pemeriksaan_periksatb_id_foreign` FOREIGN KEY (`periksatb_id`) REFERENCES `t_pemeriksaan_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tbparu
-- ----------------------------
DROP TABLE IF EXISTS `t_tbparu`;
CREATE TABLE `t_tbparu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `periksatb_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tbparu_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_tbparu_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_tbparu_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_tbparu_periksatb_id_foreign`(`periksatb_id`) USING BTREE,
  CONSTRAINT `t_tbparu_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tbparu_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tbparu_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tbparu_periksatb_id_foreign` FOREIGN KEY (`periksatb_id`) REFERENCES `t_pemeriksaan_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_terapi_gizi
-- ----------------------------
DROP TABLE IF EXISTS `t_terapi_gizi`;
CREATE TABLE `t_terapi_gizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksagizi_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `terapi_gizi_id` int(10) UNSIGNED NOT NULL,
  `lainnya` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_terapi_gizi_periksagizi_id_foreign`(`periksagizi_id`) USING BTREE,
  INDEX `t_terapi_gizi_terapi_gizi_id_foreign`(`terapi_gizi_id`) USING BTREE,
  CONSTRAINT `t_terapi_gizi_periksagizi_id_foreign` FOREIGN KEY (`periksagizi_id`) REFERENCES `t_periksagizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_terapi_gizi_terapi_gizi_id_foreign` FOREIGN KEY (`terapi_gizi_id`) REFERENCES `m_terapi_gizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tindakan
-- ----------------------------
DROP TABLE IF EXISTS `t_tindakan`;
CREATE TABLE `t_tindakan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_rencana` datetime(0) NULL DEFAULT NULL,
  `lama_tindakan` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil` int(10) UNSIGNED NULL DEFAULT 0,
  `jumlah` int(10) UNSIGNED NULL DEFAULT 0,
  `tarif` double(16, 2) NULL DEFAULT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `tindakan_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tindakan_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_tindakan_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_tindakan_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_tindakan_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  CONSTRAINT `t_tindakan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tindakan_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tindakan_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tindakan_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `m_tindakan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1680 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tindakan_bpjs
-- ----------------------------
DROP TABLE IF EXISTS `t_tindakan_bpjs`;
CREATE TABLE `t_tindakan_bpjs`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kdTindakanSK` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `noKunjungan` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kdTindakan` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hasil` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tindakan_bpjs_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  CONSTRAINT `t_tindakan_bpjs_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `t_tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tindakan_gizi
-- ----------------------------
DROP TABLE IF EXISTS `t_tindakan_gizi`;
CREATE TABLE `t_tindakan_gizi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periksagizi_id` int(10) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `jenis_tindakan` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tindakan_gizi_periksagizi_id_foreign`(`periksagizi_id`) USING BTREE,
  CONSTRAINT `t_tindakan_gizi_periksagizi_id_foreign` FOREIGN KEY (`periksagizi_id`) REFERENCES `t_periksagizi` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tindakan_informasi
-- ----------------------------
DROP TABLE IF EXISTS `t_tindakan_informasi`;
CREATE TABLE `t_tindakan_informasi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tindakan_id` int(10) UNSIGNED NOT NULL,
  `diagnosa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dasar_diagnosa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tindakan_kedokteran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `indikasi_tindakan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tata_cara` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `resiko` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `komplikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `prognosa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alternatif_resiko` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lain_lain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tindakan_informasi_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  CONSTRAINT `t_tindakan_informasi_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `t_tindakan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tindakan_penanggung_jawab
-- ----------------------------
DROP TABLE IF EXISTS `t_tindakan_penanggung_jawab`;
CREATE TABLE `t_tindakan_penanggung_jawab`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tindakan_id` int(10) UNSIGNED NOT NULL,
  `nama` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` tinyint(4) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` char(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tindakan_penanggung_jawab_tindakan_id_foreign`(`tindakan_id`) USING BTREE,
  CONSTRAINT `t_tindakan_penanggung_jawab_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `t_tindakan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tujuanrujukan
-- ----------------------------
DROP TABLE IF EXISTS `t_tujuanrujukan`;
CREATE TABLE `t_tujuanrujukan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NOT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tujuan_rujukan_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_poli` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tacc` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alasan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `faskes_rujukan` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondisi_khusus_kategori` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondisi_khusus_spesialis` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kondisi_khusus_catatan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `spesialis_spesialis1` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `spesialis_subspesialis1` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `spesialis_sarana` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_rencana_kunjungan` date NULL DEFAULT NULL,
  `status_cloud` tinyint(1) NULL DEFAULT NULL,
  `tujuanrujukan_id_cloud` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tujuanrujukan_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_tujuanrujukan_perawat_id_foreign`(`perawat_id`) USING BTREE,
  INDEX `t_tujuanrujukan_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_tujuanrujukan_tujuan_rujukan_id_foreign`(`tujuan_rujukan_id`) USING BTREE,
  CONSTRAINT `t_tujuanrujukan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tujuanrujukan_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tujuanrujukan_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tujuanrujukan_tujuan_rujukan_id_foreign` FOREIGN KEY (`tujuan_rujukan_id`) REFERENCES `m_tujuanrujukan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1370 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for t_tumbuh_kembang_anak
-- ----------------------------
DROP TABLE IF EXISTS `t_tumbuh_kembang_anak`;
CREATE TABLE `t_tumbuh_kembang_anak`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal` datetime(0) NOT NULL,
  `pelayanan_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `dokter_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `perawat_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bb_tb` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tb_u` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anam_masalah_tk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `anam_keluhan_utama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_lka` double(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `priksa_lka_u` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_pk_sesuai_ya` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_sesuai_tidak` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_meragukan_ya` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_meragukan_tidak` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_meragukan_sts` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_pk_simpan_ya_jml` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_simpan_tdk_jml` double(8, 2) UNSIGNED NULL DEFAULT 0.00,
  `priksa_pk_penyimpangan_sts` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_pk_daya_dengar` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_pk_daya_lihat` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `priksa_pk_prilaku_emosional` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `indikasi_antuisme` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `indikasi_gpph` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kesimpulan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `inter_stimulasi_ibu` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `inter_stimulasi_kembang` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `inter_tindakan_lain` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `inter_surat_rujukan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `t_tumbuh_kembang_anak_pelayanan_id_foreign`(`pelayanan_id`) USING BTREE,
  INDEX `t_tumbuh_kembang_anak_dokter_id_foreign`(`dokter_id`) USING BTREE,
  INDEX `t_tumbuh_kembang_anak_perawat_id_foreign`(`perawat_id`) USING BTREE,
  CONSTRAINT `t_tumbuh_kembang_anak_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tumbuh_kembang_anak_pelayanan_id_foreign` FOREIGN KEY (`pelayanan_id`) REFERENCES `t_pelayanan` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `t_tumbuh_kembang_anak_perawat_id_foreign` FOREIGN KEY (`perawat_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `puskesmas_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pegawai_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pasien_id` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `deleted_by` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_mobile_unique`(`mobile`) USING BTREE,
  INDEX `users_pasien_id_foreign`(`pasien_id`) USING BTREE,
  INDEX `users_pegawai_id_foreign`(`pegawai_id`) USING BTREE,
  INDEX `users_puskesmas_id_foreign`(`puskesmas_id`) USING BTREE,
  CONSTRAINT `users_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `m_pasien` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `users_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `m_pegawai` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `users_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `m_puskesmas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Triggers structure for table t_pelayanan
-- ----------------------------
DROP TRIGGER IF EXISTS `antrean`;
delimiter ;;
CREATE TRIGGER `antrean` BEFORE INSERT ON `t_pelayanan` FOR EACH ROW SET NEW.antrean = IFNULL(
                ( 
                    SELECT RIGHT(CONCAT("000",max(cast(t_pelayanan.antrean as unsigned integer))+1),4) 
                    FROM t_pelayanan LEFT JOIN t_pendaftaran ON t_pelayanan.pendaftaran_id = t_pendaftaran.id 
                    where t_pendaftaran.puskesmas_id = (SELECT puskesmas_id from t_pendaftaran where id = NEW.pendaftaran_id)     
                    AND date_format(t_pelayanan.tanggal, "%Y-%m-%d") = date_format(NEW.tanggal, "%Y-%m-%d") 
                    AND t_pelayanan.ruangan_id= NEW.ruangan_id
                )
            ,"0001")
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table t_pelayanan
-- ----------------------------
DROP TRIGGER IF EXISTS `pendaftaran_nomor`;
delimiter ;;
CREATE TRIGGER `pendaftaran_nomor` BEFORE INSERT ON `t_pelayanan` FOR EACH ROW SET NEW.no_pendaftaran = IFNULL(
            ( 
                SELECT RIGHT(CONCAT("000",max(cast(t_pelayanan.no_pendaftaran as unsigned integer))+1),4) 
                FROM t_pelayanan LEFT JOIN t_pendaftaran ON t_pelayanan.pendaftaran_id = t_pendaftaran.id
                where t_pendaftaran.puskesmas_id = (SELECT puskesmas_id from t_pendaftaran where id =NEW.pendaftaran_id)
                AND date_format(t_pelayanan.tanggal, "%Y-%m-%d") = date_format(NEW.tanggal, "%Y-%m-%d") 
            )
            ,"0001")
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
