/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : klinik

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 10/09/2020 11:25:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pasien
-- ----------------------------
DROP TABLE IF EXISTS `pasien`;
CREATE TABLE `pasien`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_domisili` int(11) NULL DEFAULT NULL,
  `id_status` int(11) NULL DEFAULT NULL,
  `id_paket` int(11) NULL DEFAULT NULL,
  `id_pj` int(11) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `s_nikah` int(1) NULL DEFAULT NULL,
  `gol_dar` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tmp_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` datetime(0) NULL DEFAULT NULL,
  `pendidikan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_tlp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_domisili`(`id_domisili`) USING BTREE,
  INDEX `id_paket`(`id_paket`) USING BTREE,
  INDEX `id_status`(`id_status`) USING BTREE,
  INDEX `id_pj`(`id_pj`) USING BTREE,
  CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`id_domisili`) REFERENCES `alamat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_4` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_5` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pasien_ibfk_6` FOREIGN KEY (`id_paket`) REFERENCES `penanggung_jawab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pasien
-- ----------------------------
INSERT INTO `pasien` VALUES (1, 9, 1, 3, 3, 'nurudin', 0, 'A', 'Islam', 'probolinggo', '1999-06-12 00:00:00', 'Diploma I', NULL, 'nurudin_2@live.com', '2020-09-09 23:16:24', '2020-09-09 23:16:24');

SET FOREIGN_KEY_CHECKS = 1;
