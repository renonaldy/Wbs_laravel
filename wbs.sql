/*
 Navicat Premium Data Transfer

 Source Server         : reno
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : wbs

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 25/11/2022 16:38:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auto_numbers
-- ----------------------------
DROP TABLE IF EXISTS `auto_numbers`;
CREATE TABLE `auto_numbers`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auto_numbers
-- ----------------------------

-- ----------------------------
-- Table structure for bukti
-- ----------------------------
DROP TABLE IF EXISTS `bukti`;
CREATE TABLE `bukti`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `laporan_id` int NULL DEFAULT NULL,
  `file_bukti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bukti
-- ----------------------------
INSERT INTO `bukti` VALUES (1, 1, '/storage/huOXypGUrRSITmJG3uKSZtR6P7Xbm6RixscL6FF9.png', '2022-11-16 04:12:27', '2022-11-16 04:12:27');
INSERT INTO `bukti` VALUES (2, 1, '/storage/N9WqPIy3Kb4azjuqMmRFkZ7RCezXLI3UAfukohp0.png', '2022-11-16 04:12:27', '2022-11-16 04:12:27');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int NOT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (0, 'Dewan Komisaris', NULL, NULL);
INSERT INTO `jabatan` VALUES (1, 'Direksi', NULL, NULL);
INSERT INTO `jabatan` VALUES (2, '1 Level Dibawah Direksi', NULL, NULL);
INSERT INTO `jabatan` VALUES (4, '2 Level Dibawah Direksi', NULL, NULL);
INSERT INTO `jabatan` VALUES (5, '3 Level Dibawah Direksi', NULL, NULL);
INSERT INTO `jabatan` VALUES (6, '4 Level Dibawah Direksi', NULL, NULL);
INSERT INTO `jabatan` VALUES (7, 'Tidak Tahu', NULL, NULL);

-- ----------------------------
-- Table structure for jenis_pelanggaran
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pelanggaran`;
CREATE TABLE `jenis_pelanggaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis_laporan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_pelanggaran
-- ----------------------------
INSERT INTO `jenis_pelanggaran` VALUES (1, 'Korupsi, Kecurangan, Ketidakjujuran', '', NULL, NULL);
INSERT INTO `jenis_pelanggaran` VALUES (2, 'Perbuatan melanggar hukum ', NULL, NULL, NULL);
INSERT INTO `jenis_pelanggaran` VALUES (3, 'Pelanggaran ketentuan perpajakan dan perundangan lainnya', 's', NULL, NULL);
INSERT INTO `jenis_pelanggaran` VALUES (4, 'Pelanggaran Pedoman Perilaku Perusahaan ', NULL, NULL, NULL);
INSERT INTO `jenis_pelanggaran` VALUES (5, 'Perbuatan membahayakan keselamatan & kesehatan pengguna kekerasan terhadap karyawan', NULL, NULL, NULL);
INSERT INTO `jenis_pelanggaran` VALUES (6, 'Pelanggaran Standard Operating Procedure ( SOP )', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for laporan
-- ----------------------------
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_laporan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis_pelanggaran_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_laporan_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kejadian_pertama` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lokasi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal` datetime NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `nama_pelapor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kejadian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kerugian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jumlah_kerugian` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pernah` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jabatan_terlapor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `berbicara` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `posisi` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan4` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan
-- ----------------------------
INSERT INTO `laporan` VALUES (1, 'WBS-202211160001', '1,3,5,6', '1', 'Nomor 2', 'Nomor 3', '2022-11-21 08:00:54', 'Nomor 4', '{\"id\":1,\"jabatan\":\"Direksi\",\"created_at\":null,\"updated_at\":null}', '0,1,2', '4,5,6', 'Nomor 7', 'ya', '123', 'tidak', 'tidak', 'Nomor 13', 'Nomor 15', '2022-11-16 04:12:27', '2022-11-21 01:00:54', '[\"ya\"]');

-- ----------------------------
-- Table structure for laporan_saksi
-- ----------------------------
DROP TABLE IF EXISTS `laporan_saksi`;
CREATE TABLE `laporan_saksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `laporan_id` int NULL DEFAULT NULL,
  `nama_saksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_saksi_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan_saksi
-- ----------------------------
INSERT INTO `laporan_saksi` VALUES (4, 1, 'Nomor 6', 4, '2022-11-21 01:00:54', '2022-11-21 01:00:54');
INSERT INTO `laporan_saksi` VALUES (5, 1, 'Nomor 6 copy', 5, '2022-11-21 01:00:54', '2022-11-21 01:00:54');
INSERT INTO `laporan_saksi` VALUES (6, 1, 'Nomor 6 copy 1', 6, '2022-11-21 01:00:54', '2022-11-21 01:00:54');

-- ----------------------------
-- Table structure for laporan_terlibat
-- ----------------------------
DROP TABLE IF EXISTS `laporan_terlibat`;
CREATE TABLE `laporan_terlibat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `laporan_id` int NULL DEFAULT NULL,
  `nama_terlibat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan_id` int NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laporan_terlibat
-- ----------------------------
INSERT INTO `laporan_terlibat` VALUES (4, 1, 'Nomor 5', 0, '2022-11-21 01:00:54', '2022-11-21 01:00:54');
INSERT INTO `laporan_terlibat` VALUES (5, 1, 'Nomor 5 copy', 1, '2022-11-21 01:00:54', '2022-11-21 01:00:54');
INSERT INTO `laporan_terlibat` VALUES (6, 1, 'Nomor 5 Copy 2', 2, '2022-11-21 01:00:54', '2022-11-21 01:00:54');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (16, '2022_11_09_132935_laporan', 1);
INSERT INTO `migrations` VALUES (22, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (23, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (24, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` VALUES (25, '2019_12_14_000001_create_personal_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (26, '2022_11_01_073412_create_verifytokens_table', 2);
INSERT INTO `migrations` VALUES (27, '2022_11_09_140706_create_laporan_table', 3);
INSERT INTO `migrations` VALUES (28, '2017_08_03_055212_create_auto_numbers', 4);
INSERT INTO `migrations` VALUES (29, '2022_11_11_021707_create_status_laporans_table', 4);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for pilihan
-- ----------------------------
DROP TABLE IF EXISTS `pilihan`;
CREATE TABLE `pilihan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pilihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pilihan
-- ----------------------------
INSERT INTO `pilihan` VALUES (1, 'Ya', NULL, NULL);
INSERT INTO `pilihan` VALUES (2, 'Tidak', NULL, NULL);
INSERT INTO `pilihan` VALUES (3, 'Tidak Tahu', NULL, NULL);

-- ----------------------------
-- Table structure for register
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `identitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_activated` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of register
-- ----------------------------

-- ----------------------------
-- Table structure for seting
-- ----------------------------
DROP TABLE IF EXISTS `seting`;
CREATE TABLE `seting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seting
-- ----------------------------
INSERT INTO `seting` VALUES (1, 'exp', 'expire token', 'lama expire token dalam satuan detik', '60 ', NULL, NULL);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, 'kar', 'Karyawan', 'Karyawan N6', NULL, NULL);
INSERT INTO `status` VALUES (2, 'eks', 'Eksternal', 'Eksternal', NULL, NULL);

-- ----------------------------
-- Table structure for status_laporan
-- ----------------------------
DROP TABLE IF EXISTS `status_laporan`;
CREATE TABLE `status_laporan`  (
  `id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_laporan
-- ----------------------------
INSERT INTO `status_laporan` VALUES (1, 'Diterima', NULL, NULL);
INSERT INTO `status_laporan` VALUES (2, 'Proses', NULL, NULL);
INSERT INTO `status_laporan` VALUES (3, 'Selesai', NULL, NULL);

-- ----------------------------
-- Table structure for status_laporans
-- ----------------------------
DROP TABLE IF EXISTS `status_laporans`;
CREATE TABLE `status_laporans`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_laporans
-- ----------------------------

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `metode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 138 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES (72, 108, 'email', '2022-11-18 04:12:57', '2022-11-18 04:13:57', '559669', '2022-11-18 04:12:57', '2022-11-18 04:12:57', NULL);
INSERT INTO `token` VALUES (73, 109, 'wa', '2022-11-18 04:22:01', '2022-11-18 04:23:01', '277450', '2022-11-18 04:22:01', '2022-11-18 04:22:01', NULL);
INSERT INTO `token` VALUES (74, 111, 'wa', '2022-11-18 04:24:36', '2022-11-18 04:25:36', '294952', '2022-11-18 04:24:36', '2022-11-18 04:24:36', NULL);
INSERT INTO `token` VALUES (75, 112, 'wa', '2022-11-18 04:25:33', '2022-11-18 04:26:33', '229873', '2022-11-18 04:25:33', '2022-11-18 04:25:33', NULL);
INSERT INTO `token` VALUES (76, 113, 'wa', '2022-11-18 04:26:39', '2022-11-18 04:27:39', '973498', '2022-11-18 04:26:39', '2022-11-18 04:26:39', NULL);
INSERT INTO `token` VALUES (77, 114, 'wa', '2022-11-18 04:27:15', '2022-11-18 04:28:15', '416326', '2022-11-18 04:27:15', '2022-11-18 04:27:15', NULL);
INSERT INTO `token` VALUES (78, 115, 'email', '2022-11-18 04:34:28', '2022-11-18 04:35:28', '597206', '2022-11-18 04:34:28', '2022-11-18 04:34:28', NULL);
INSERT INTO `token` VALUES (79, 116, 'wa', '2022-11-18 04:37:49', '2022-11-18 04:38:49', '244832', '2022-11-18 04:37:49', '2022-11-18 04:37:49', NULL);
INSERT INTO `token` VALUES (80, 117, 'wa', '2022-11-18 04:40:57', '2022-11-18 04:41:57', '492515', '2022-11-18 04:40:57', '2022-11-18 04:40:57', NULL);
INSERT INTO `token` VALUES (81, 118, 'wa', '2022-11-18 06:35:53', '2022-11-18 06:36:53', '442698', '2022-11-18 06:35:53', '2022-11-18 06:35:53', NULL);
INSERT INTO `token` VALUES (82, 119, 'wa', '2022-11-18 06:37:18', '2022-11-18 06:38:18', '448000', '2022-11-18 06:37:18', '2022-11-18 06:37:18', NULL);
INSERT INTO `token` VALUES (83, 120, 'wa', '2022-11-18 06:45:19', '2022-11-18 06:46:19', '941817', '2022-11-18 06:45:19', '2022-11-18 06:45:19', NULL);
INSERT INTO `token` VALUES (84, 121, 'wa', '2022-11-18 06:53:39', '2022-11-18 06:54:39', '930335', '2022-11-18 06:53:39', '2022-11-18 06:53:39', NULL);
INSERT INTO `token` VALUES (85, 122, 'wa', '2022-11-18 06:54:40', '2022-11-18 06:55:40', '668990', '2022-11-18 06:54:40', '2022-11-18 06:54:40', NULL);
INSERT INTO `token` VALUES (86, 123, 'wa', '2022-11-18 15:51:00', '2022-11-18 15:52:00', '800684', '2022-11-18 15:51:00', '2022-11-18 15:51:00', NULL);
INSERT INTO `token` VALUES (87, 124, 'wa', '2022-11-18 15:51:42', '2022-11-18 15:52:42', '362633', '2022-11-18 15:51:42', '2022-11-18 15:51:42', NULL);
INSERT INTO `token` VALUES (88, 125, 'wa', '2022-11-18 15:53:20', '2022-11-18 15:54:20', '247014', '2022-11-18 15:53:20', '2022-11-18 15:53:20', NULL);
INSERT INTO `token` VALUES (89, 126, 'wa', '2022-11-18 15:55:00', '2022-11-18 15:56:00', '292436', '2022-11-18 15:55:00', '2022-11-18 15:55:00', NULL);
INSERT INTO `token` VALUES (90, 127, 'email', '2022-11-21 09:38:42', '2022-11-21 09:39:42', '158790', '2022-11-21 09:38:42', '2022-11-21 09:38:42', NULL);
INSERT INTO `token` VALUES (91, 128, 'wa', '2022-11-21 09:41:22', '2022-11-21 09:42:22', '800713', '2022-11-21 09:41:22', '2022-11-21 09:41:22', NULL);
INSERT INTO `token` VALUES (92, 129, 'wa', '2022-11-21 09:43:30', '2022-11-21 09:44:30', '620393', '2022-11-21 09:43:30', '2022-11-21 09:43:30', NULL);
INSERT INTO `token` VALUES (93, 130, 'email', '2022-11-21 09:44:47', '2022-11-21 09:45:47', '521073', '2022-11-21 09:44:47', '2022-11-21 09:44:47', NULL);
INSERT INTO `token` VALUES (94, 131, 'email', '2022-11-21 09:46:17', '2022-11-21 09:47:17', '686816', '2022-11-21 09:46:17', '2022-11-21 09:46:17', NULL);
INSERT INTO `token` VALUES (95, 132, 'email', '2022-11-21 09:52:50', '2022-11-21 09:53:50', '896364', '2022-11-21 09:52:50', '2022-11-21 09:52:50', NULL);
INSERT INTO `token` VALUES (96, 133, 'email', '2022-11-21 09:53:28', '2022-11-21 09:54:28', '507451', '2022-11-21 09:53:28', '2022-11-21 09:53:28', NULL);
INSERT INTO `token` VALUES (97, 134, 'email', '2022-11-21 09:54:27', '2022-11-21 09:55:27', '741284', '2022-11-21 09:54:27', '2022-11-21 09:54:27', NULL);
INSERT INTO `token` VALUES (98, 135, 'email', '2022-11-21 09:54:32', '2022-11-21 09:55:32', '515245', '2022-11-21 09:54:32', '2022-11-21 09:54:32', NULL);
INSERT INTO `token` VALUES (99, 136, 'email', '2022-11-21 09:55:31', '2022-11-21 09:56:31', '355449', '2022-11-21 09:55:31', '2022-11-21 09:55:31', NULL);
INSERT INTO `token` VALUES (100, 137, 'email', '2022-11-21 09:55:36', '2022-11-21 09:56:36', '283415', '2022-11-21 09:55:36', '2022-11-21 09:55:36', NULL);
INSERT INTO `token` VALUES (101, 138, 'email', '2022-11-21 09:57:27', '2022-11-21 09:58:27', '706936', '2022-11-21 09:57:27', '2022-11-21 09:57:27', NULL);
INSERT INTO `token` VALUES (102, 139, 'email', '2022-11-21 09:59:04', '2022-11-21 10:00:04', '351956', '2022-11-21 09:59:04', '2022-11-21 09:59:04', NULL);
INSERT INTO `token` VALUES (103, 140, 'email', '2022-11-21 10:06:43', '2022-11-21 10:07:43', '731611', '2022-11-21 10:06:43', '2022-11-21 10:06:43', NULL);
INSERT INTO `token` VALUES (104, 141, 'email', '2022-11-21 10:09:35', '2022-11-21 10:10:35', '278882', '2022-11-21 10:09:35', '2022-11-21 10:09:35', NULL);
INSERT INTO `token` VALUES (105, 142, 'email', '2022-11-21 20:20:15', '2022-11-21 20:21:15', '946771', '2022-11-21 20:20:15', '2022-11-21 20:20:15', NULL);
INSERT INTO `token` VALUES (106, 143, 'email', '2022-11-24 00:46:06', '2022-11-24 00:47:06', '169592', '2022-11-24 00:46:06', '2022-11-24 00:46:06', NULL);
INSERT INTO `token` VALUES (107, 144, 'email', '2022-11-24 00:46:29', '2022-11-24 00:47:29', '119132', '2022-11-24 00:46:29', '2022-11-24 00:46:29', NULL);
INSERT INTO `token` VALUES (108, 145, 'email', '2022-11-24 00:46:50', '2022-11-24 00:47:50', '462845', '2022-11-24 00:46:50', '2022-11-24 00:46:50', NULL);
INSERT INTO `token` VALUES (109, 146, 'email', '2022-11-24 00:47:12', '2022-11-24 00:48:12', '415423', '2022-11-24 00:47:12', '2022-11-24 00:47:12', NULL);
INSERT INTO `token` VALUES (110, 147, 'email', '2022-11-24 00:47:33', '2022-11-24 00:48:33', '563332', '2022-11-24 00:47:33', '2022-11-24 00:47:33', NULL);
INSERT INTO `token` VALUES (111, 148, 'email', '2022-11-24 01:08:29', '2022-11-24 01:09:29', '772539', '2022-11-24 01:08:29', '2022-11-24 01:08:29', NULL);
INSERT INTO `token` VALUES (112, 149, 'email', '2022-11-24 01:09:34', '2022-11-24 01:10:34', '836278', '2022-11-24 01:09:34', '2022-11-24 01:09:34', NULL);
INSERT INTO `token` VALUES (113, 150, 'wa', '2022-11-24 01:11:53', '2022-11-24 01:12:53', '745745', '2022-11-24 01:11:53', '2022-11-24 01:11:53', NULL);
INSERT INTO `token` VALUES (114, 151, 'wa', '2022-11-24 01:15:32', '2022-11-24 01:16:32', '574750', '2022-11-24 01:15:32', '2022-11-24 01:15:32', NULL);
INSERT INTO `token` VALUES (115, 152, 'wa', '2022-11-24 01:21:16', '2022-11-24 01:22:16', '486638', '2022-11-24 01:21:16', '2022-11-24 01:21:16', NULL);
INSERT INTO `token` VALUES (116, 153, 'wa', '2022-11-24 01:22:20', '2022-11-24 01:23:20', '723660', '2022-11-24 01:22:20', '2022-11-24 01:22:20', NULL);
INSERT INTO `token` VALUES (117, 154, 'wa', '2022-11-24 01:34:05', '2022-11-24 01:35:05', '265194', '2022-11-24 01:34:05', '2022-11-24 01:34:05', NULL);
INSERT INTO `token` VALUES (118, 155, 'wa', '2022-11-24 01:34:09', '2022-11-24 01:35:09', '802529', '2022-11-24 01:34:09', '2022-11-24 01:34:09', NULL);
INSERT INTO `token` VALUES (119, 156, 'wa', '2022-11-24 01:34:45', '2022-11-24 01:35:45', '799520', '2022-11-24 01:34:45', '2022-11-24 01:34:45', NULL);
INSERT INTO `token` VALUES (120, 157, 'wa', '2022-11-24 01:35:31', '2022-11-24 01:36:31', '772791', '2022-11-24 01:35:31', '2022-11-24 01:35:31', NULL);
INSERT INTO `token` VALUES (121, 158, 'wa', '2022-11-24 01:37:37', '2022-11-24 01:38:37', '207452', '2022-11-24 01:37:37', '2022-11-24 01:37:37', NULL);
INSERT INTO `token` VALUES (122, 159, 'wa', '2022-11-24 01:41:46', '2022-11-24 01:42:46', '507263', '2022-11-24 01:41:46', '2022-11-24 01:41:46', NULL);
INSERT INTO `token` VALUES (123, 160, 'wa', '2022-11-24 02:07:55', '2022-11-24 02:08:55', '640430', '2022-11-24 02:07:55', '2022-11-24 02:07:55', NULL);
INSERT INTO `token` VALUES (124, 161, 'wa', '2022-11-24 02:29:58', '2022-11-24 02:30:58', '662085', '2022-11-24 02:29:58', '2022-11-24 02:29:58', NULL);
INSERT INTO `token` VALUES (125, 162, 'wa', '2022-11-24 02:30:47', '2022-11-24 02:31:47', '242713', '2022-11-24 02:30:47', '2022-11-24 02:30:47', NULL);
INSERT INTO `token` VALUES (126, 163, 'wa', '2022-11-24 02:33:07', '2022-11-24 02:34:07', '522878', '2022-11-24 02:33:07', '2022-11-24 02:33:07', NULL);
INSERT INTO `token` VALUES (127, 164, 'wa', '2022-11-24 02:33:51', '2022-11-24 02:34:51', '329907', '2022-11-24 02:33:51', '2022-11-24 02:33:51', NULL);
INSERT INTO `token` VALUES (128, 165, 'wa', '2022-11-24 02:35:30', '2022-11-24 02:36:30', '131440', '2022-11-24 02:35:30', '2022-11-24 02:35:30', NULL);
INSERT INTO `token` VALUES (129, 166, 'wa', '2022-11-24 02:37:10', '2022-11-24 02:38:10', '447449', '2022-11-24 02:37:10', '2022-11-24 02:37:10', NULL);
INSERT INTO `token` VALUES (130, 167, 'wa', '2022-11-24 02:38:30', '2022-11-24 02:39:30', '834300', '2022-11-24 02:38:30', '2022-11-24 02:38:30', NULL);
INSERT INTO `token` VALUES (131, 168, 'wa', '2022-11-24 02:41:13', '2022-11-24 02:42:13', '823755', '2022-11-24 02:41:13', '2022-11-24 02:41:13', NULL);
INSERT INTO `token` VALUES (132, 169, 'wa', '2022-11-24 02:42:10', '2022-11-24 02:43:10', '891832', '2022-11-24 02:42:10', '2022-11-24 02:42:10', NULL);
INSERT INTO `token` VALUES (133, 170, 'wa', '2022-11-24 02:42:36', '2022-11-24 02:43:36', '641517', '2022-11-24 02:42:36', '2022-11-24 02:42:36', NULL);
INSERT INTO `token` VALUES (134, 171, 'wa', '2022-11-24 02:43:56', '2022-11-24 02:44:56', '540060', '2022-11-24 02:43:56', '2022-11-24 02:43:56', NULL);
INSERT INTO `token` VALUES (135, 172, 'wa', '2022-11-25 07:04:30', '2022-11-25 07:05:30', '404486', '2022-11-25 07:04:30', '2022-11-25 07:04:30', NULL);
INSERT INTO `token` VALUES (136, 173, 'wa', '2022-11-25 07:10:03', '2022-11-25 07:11:03', '787213', '2022-11-25 07:10:03', '2022-11-25 07:10:03', NULL);
INSERT INTO `token` VALUES (137, 174, 'wa', '2022-11-25 07:27:28', '2022-11-25 07:28:28', '519147', '2022-11-25 07:27:28', '2022-11-25 07:27:28', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status_kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `wa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_activated` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 175 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (108, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, NULL, 'konyetnyet28@gmail.com', 0, 'kar', NULL, NULL, '2022-11-18 04:12:57', '2022-11-18 04:12:57');
INSERT INTO `users` VALUES (109, NULL, 'reno', 'renoo', NULL, NULL, '', 0, 'kar', NULL, NULL, '2022-11-18 04:22:01', '2022-11-18 04:22:01');
INSERT INTO `users` VALUES (111, NULL, 'reno', 'renoo', NULL, NULL, NULL, 0, 'kar', NULL, NULL, '2022-11-18 04:24:36', '2022-11-18 04:24:36');
INSERT INTO `users` VALUES (112, NULL, 'reno', 'renoo', NULL, NULL, NULL, 0, 'kar', NULL, NULL, '2022-11-18 04:25:33', '2022-11-18 04:25:33');
INSERT INTO `users` VALUES (113, NULL, 'reno', 'renoo', NULL, NULL, NULL, 0, 'kar', NULL, NULL, '2022-11-18 04:26:39', '2022-11-18 04:26:39');
INSERT INTO `users` VALUES (115, NULL, 'adasdsad', 'kgngjfdng', NULL, NULL, 'budispeed2017@gmail.com', 0, 'kar', NULL, NULL, '2022-11-18 04:34:28', '2022-11-18 04:34:28');
INSERT INTO `users` VALUES (117, NULL, 'reno', 'reno', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 04:40:57', '2022-11-18 04:40:57');
INSERT INTO `users` VALUES (118, NULL, 'reno', 'reno', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 06:35:53', '2022-11-18 06:35:53');
INSERT INTO `users` VALUES (119, NULL, 'reno', 'reno', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 06:37:18', '2022-11-18 06:37:18');
INSERT INTO `users` VALUES (120, NULL, 'reno', 'reno', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 06:45:19', '2022-11-18 06:45:19');
INSERT INTO `users` VALUES (121, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 06:53:39', '2022-11-18 06:53:39');
INSERT INTO `users` VALUES (122, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-18 06:54:40', '2022-11-18 06:54:40');
INSERT INTO `users` VALUES (127, NULL, 'arbi', 'arbi', NULL, NULL, '081273136130', 0, 'kar', NULL, NULL, '2022-11-21 09:38:42', '2022-11-21 09:38:42');
INSERT INTO `users` VALUES (128, NULL, 'arbi', 'arbi', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-21 09:41:22', '2022-11-21 09:41:22');
INSERT INTO `users` VALUES (129, NULL, 'arbi', 'arbi', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-21 09:43:30', '2022-11-21 09:43:30');
INSERT INTO `users` VALUES (130, NULL, 'arbo', 'arbi', NULL, NULL, '081273136130', 0, 'kar', NULL, NULL, '2022-11-21 09:44:47', '2022-11-21 09:44:47');
INSERT INTO `users` VALUES (131, NULL, 'aij', 'alkk', NULL, NULL, 'aps@as', 0, 'kar', NULL, NULL, '2022-11-21 09:46:17', '2022-11-21 09:46:17');
INSERT INTO `users` VALUES (132, NULL, 'alsjls', 'kjald', NULL, NULL, 'kajkasj', 0, 'kar', NULL, NULL, '2022-11-21 09:52:50', '2022-11-21 09:52:50');
INSERT INTO `users` VALUES (133, NULL, 'alsjls', 'kjald', NULL, NULL, 'asdas', 0, 'kar', NULL, NULL, '2022-11-21 09:53:28', '2022-11-21 09:53:28');
INSERT INTO `users` VALUES (134, NULL, 'alsjls', 'kjald', NULL, NULL, 'asdas', 0, 'kar', NULL, NULL, '2022-11-21 09:54:27', '2022-11-21 09:54:27');
INSERT INTO `users` VALUES (135, NULL, 'alsjls', 'kjald', NULL, NULL, 'asdas', 0, 'kar', NULL, NULL, '2022-11-21 09:54:32', '2022-11-21 09:54:32');
INSERT INTO `users` VALUES (136, NULL, 'aaskjd', 'ljadlfk', NULL, NULL, 'lkadklfjs', 0, 'kar', NULL, NULL, '2022-11-21 09:55:31', '2022-11-21 09:55:31');
INSERT INTO `users` VALUES (137, NULL, 'aaskjd', 'ljadlfk', NULL, NULL, 'lkadklfjs', 0, 'kar', NULL, NULL, '2022-11-21 09:55:36', '2022-11-21 09:55:36');
INSERT INTO `users` VALUES (138, NULL, 'aslkas', 'kjfdhgjkfd', NULL, NULL, 'aksda', 0, 'kar', NULL, NULL, '2022-11-21 09:57:27', '2022-11-21 09:57:27');
INSERT INTO `users` VALUES (139, NULL, 'kjdlf', 'ajdfds', NULL, NULL, 'alksjas@alskd', 0, 'kar', NULL, NULL, '2022-11-21 09:59:04', '2022-11-21 09:59:04');
INSERT INTO `users` VALUES (140, NULL, 'jadkd', 'ksldjfsd', NULL, NULL, 'kalsjdfls', 0, 'kar', NULL, NULL, '2022-11-21 10:06:43', '2022-11-21 10:06:43');
INSERT INTO `users` VALUES (141, NULL, 'alksdsa', 'kdals', NULL, NULL, 'ksdadsa', 0, 'kar', NULL, NULL, '2022-11-21 10:09:35', '2022-11-21 10:09:35');
INSERT INTO `users` VALUES (142, NULL, 'saas', 'asd', NULL, NULL, 'konyetnyet28@gmail.com', 0, 'kar', NULL, NULL, '2022-11-21 20:20:15', '2022-11-21 20:20:15');
INSERT INTO `users` VALUES (143, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, NULL, 'asd@as', 0, 'kar', NULL, NULL, '2022-11-24 00:46:06', '2022-11-24 00:46:06');
INSERT INTO `users` VALUES (144, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, NULL, 'asd@as', 0, 'kar', NULL, NULL, '2022-11-24 00:46:29', '2022-11-24 00:46:29');
INSERT INTO `users` VALUES (145, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, NULL, 'asd@as', 0, 'kar', NULL, NULL, '2022-11-24 00:46:50', '2022-11-24 00:46:50');
INSERT INTO `users` VALUES (146, NULL, 'reno naldy', 'Jl.A.Yani Perumnas Surya Griya', NULL, NULL, 'asd@as', 0, 'kar', NULL, NULL, '2022-11-24 00:47:12', '2022-11-24 00:47:12');
INSERT INTO `users` VALUES (147, NULL, 'qwert', 'qwert', NULL, NULL, 'qwerty@wer', 0, 'eks', NULL, NULL, '2022-11-24 00:47:33', '2022-11-24 00:47:33');
INSERT INTO `users` VALUES (148, NULL, 'ahskl', 'klasdka', NULL, NULL, 'asldsa@dsada', 0, 'kar', NULL, NULL, '2022-11-24 01:08:29', '2022-11-24 01:08:29');
INSERT INTO `users` VALUES (149, NULL, 'ahskl', 'klasdka', NULL, NULL, 'konyetnyet28@gmail.com', 0, 'kar', NULL, NULL, '2022-11-24 01:09:34', '2022-11-24 01:09:34');
INSERT INTO `users` VALUES (150, NULL, 'renona', 'renona', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:11:53', '2022-11-24 01:11:53');
INSERT INTO `users` VALUES (151, NULL, 'renona', 'renona', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:15:32', '2022-11-24 01:15:32');
INSERT INTO `users` VALUES (152, NULL, 'reena', 'aras', NULL, '081273136130', NULL, 0, 'eks', NULL, NULL, '2022-11-24 01:21:16', '2022-11-24 01:21:16');
INSERT INTO `users` VALUES (153, NULL, 'adasda', 'asdasda', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:22:20', '2022-11-24 01:22:20');
INSERT INTO `users` VALUES (154, NULL, 'adasda', 'asdasda', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:34:05', '2022-11-24 01:34:05');
INSERT INTO `users` VALUES (155, NULL, 'adasda', 'asdasda', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:34:09', '2022-11-24 01:34:09');
INSERT INTO `users` VALUES (156, NULL, 'asdas', 'dasda', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:34:45', '2022-11-24 01:34:45');
INSERT INTO `users` VALUES (157, NULL, 'asdasd', 'asdasdas', NULL, '081273136130', NULL, 0, 'eks', NULL, NULL, '2022-11-24 01:35:31', '2022-11-24 01:35:31');
INSERT INTO `users` VALUES (158, NULL, 'asdasd', 'asdasd', NULL, '123213', NULL, 0, 'eks', NULL, NULL, '2022-11-24 01:37:37', '2022-11-24 01:37:37');
INSERT INTO `users` VALUES (159, NULL, 'dsfsdf', 'sdfsdfsdf', NULL, '12312', NULL, 0, 'kar', NULL, NULL, '2022-11-24 01:41:46', '2022-11-24 01:41:46');
INSERT INTO `users` VALUES (160, NULL, 'adsads', 'asdasd', NULL, '123422', NULL, 0, 'eks', NULL, NULL, '2022-11-24 02:07:55', '2022-11-24 02:07:55');
INSERT INTO `users` VALUES (161, NULL, 'asldk', 'laksd', NULL, '123', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:29:58', '2022-11-24 02:29:58');
INSERT INTO `users` VALUES (162, NULL, 'akskjd', 'lkadss', NULL, '1212', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:30:47', '2022-11-24 02:30:47');
INSERT INTO `users` VALUES (163, NULL, 'qllkq', 'lkdl;skd', NULL, '0121`', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:33:07', '2022-11-24 02:33:07');
INSERT INTO `users` VALUES (164, NULL, 'asdlka', 'dkalsd', NULL, '12312', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:33:51', '2022-11-24 02:33:51');
INSERT INTO `users` VALUES (165, NULL, 'ilsajd', 'klaskld', NULL, '0129312', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:35:30', '2022-11-24 02:35:30');
INSERT INTO `users` VALUES (166, NULL, 'daslkd', 'daksda', NULL, '1292', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:37:10', '2022-11-24 02:37:10');
INSERT INTO `users` VALUES (167, NULL, 'asdsa', 'dsada', NULL, '12323', NULL, 0, 'eks', NULL, NULL, '2022-11-24 02:38:30', '2022-11-24 02:38:30');
INSERT INTO `users` VALUES (168, NULL, 'asjjdsa', 'kalsldsa', NULL, '12312', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:41:13', '2022-11-24 02:41:13');
INSERT INTO `users` VALUES (169, NULL, 'asdsa', 'dassdas', NULL, '2912', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:42:10', '2022-11-24 02:42:10');
INSERT INTO `users` VALUES (170, NULL, 'asjdkal', 'ldksad', NULL, '123', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:42:36', '2022-11-24 02:42:36');
INSERT INTO `users` VALUES (171, NULL, 'asdasd', 'dasda', NULL, 'dasda', NULL, 0, 'kar', NULL, NULL, '2022-11-24 02:43:56', '2022-11-24 02:43:56');
INSERT INTO `users` VALUES (172, NULL, 'reno', 'reno', NULL, '09882', NULL, 0, 'kar', NULL, NULL, '2022-11-25 07:04:30', '2022-11-25 07:04:30');
INSERT INTO `users` VALUES (173, NULL, 'reno', 'reno', NULL, 'reno', NULL, 0, 'eks', NULL, NULL, '2022-11-25 07:10:03', '2022-11-25 07:10:03');
INSERT INTO `users` VALUES (174, NULL, 'reno', 'reno', NULL, '081273136130', NULL, 0, 'kar', NULL, NULL, '2022-11-25 07:27:28', '2022-11-25 07:27:28');

-- ----------------------------
-- Table structure for verifytokens
-- ----------------------------
DROP TABLE IF EXISTS `verifytokens`;
CREATE TABLE `verifytokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of verifytokens
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
