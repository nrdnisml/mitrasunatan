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

 Date: 10/09/2020 11:25:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_booking` datetime(0) NULL DEFAULT NULL,
  `no_rm` int(11) NULL DEFAULT NULL,
  `layanan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `n_kontrol` int(11) NULL DEFAULT NULL,
  `is_confirm` int(1) NULL DEFAULT NULL,
  `is_done` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1, '2020-09-08 00:00:00', 0, 'rumah', 0, 0, '0');

SET FOREIGN_KEY_CHECKS = 1;
