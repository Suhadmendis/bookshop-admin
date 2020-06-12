/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100131
 Source Host           : localhost:3306
 Source Schema         : ges

 Target Server Type    : MySQL
 Target Server Version : 100131
 File Encoding         : 65001

 Date: 03/04/2020 21:42:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_batch
-- ----------------------------
DROP TABLE IF EXISTS `m_batch`;
CREATE TABLE `m_batch`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batch_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batch_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `course_ref` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `course_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `course_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `des` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `start_date` date NULL DEFAULT NULL,
  `day` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `s_time` time(0) NULL DEFAULT NULL,
  `e_time` time(0) NULL DEFAULT NULL,
  `amount` decimal(12, 2) NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_batch
-- ----------------------------
INSERT INTO `m_batch` VALUES (11, 'PAY/0000005', 'ddfsdfs', NULL, '2020-04-02', '5345345.00', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `m_batch` VALUES (12, 'BAT/0000001', 'dfdxscx', NULL, '2020-04-02', '0.00', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `m_batch` VALUES (13, 'BAT/0000002', 'fsd', 'fsd', 'fsdf', 'sdf', 'sdfsdf', 'sd', '2020-04-22', 'sdf', '02:00:00', '23:00:00', 253654.00, NULL, '', '1', NULL);
INSERT INTO `m_batch` VALUES (14, 'BAT/0000003', 'fsd', 'fsd', 'fsdf', 'sdf', 'sdfsdf', 'sd', '0000-00-00', 'sdf', '00:00:00', '00:00:00', 253654.00, NULL, 'user', '1', NULL);
INSERT INTO `m_batch` VALUES (15, 'BAT/0000004', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0.00, NULL, '', '1', NULL);
INSERT INTO `m_batch` VALUES (16, 'BAT/0000005', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0.00, NULL, '', '1', NULL);
INSERT INTO `m_batch` VALUES (18, 'BAT/0000006', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0.00, NULL, 'user', '1', NULL);
INSERT INTO `m_batch` VALUES (19, 'BAT/0000007', '', '', '', '', '', '', '0000-00-00', '', '00:00:00', '00:00:00', 0.00, NULL, 'user', '1', NULL);

-- ----------------------------
-- Table structure for m_content
-- ----------------------------
DROP TABLE IF EXISTS `m_content`;
CREATE TABLE `m_content`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `content_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `content_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_content
-- ----------------------------
INSERT INTO `m_content` VALUES (11, 'PAY/0000005', 'fsdfs', 'dfsdf', NULL, '2020-04-02 00:41:09', NULL);
INSERT INTO `m_content` VALUES (12, 'CON/0000001', 'fdsf', 'fsd', NULL, '2020-04-02 19:09:15', NULL);

-- ----------------------------
-- Table structure for m_course
-- ----------------------------
DROP TABLE IF EXISTS `m_course`;
CREATE TABLE `m_course`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `course_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `course_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faculty_ref` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faculty_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batch_ref` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batch_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `des` varchar(3000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `requirement_1` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement_2` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement_3` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement_4` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `requirement_5` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `duration` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `amount` decimal(15, 2) NULL DEFAULT NULL,
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_course
-- ----------------------------
INSERT INTO `m_course` VALUES (1, 'COR/0000002', 'fsds', 'fsdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdfddsf', 'fsdf', 'sdf', 'fds', 'fsdf', 'sdfsd', 'fsdf', 'sdf', 'fdsf', 423423.00, '1', NULL, 'user', '2020-04-03 20:07:56');
INSERT INTO `m_course` VALUES (2, 'COR/0000003', 'fd', 'tuv', 'fvu', 'fv', 'uv', 'yuv', 'fsdfsd', 'uykvuykv', 'ku', 'yv', 'uykv', 'ukyvyukv', 'uykv', 'yuk', 'vukyv', 54768.00, '1', NULL, 'user', '2020-04-03 20:08:35');

-- ----------------------------
-- Table structure for m_faculty
-- ----------------------------
DROP TABLE IF EXISTS `m_faculty`;
CREATE TABLE `m_faculty`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faculty_code` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `faculty_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_faculty
-- ----------------------------
INSERT INTO `m_faculty` VALUES (11, 'PAY/0000005', NULL, NULL, NULL, '2020-04-02 00:41:09', NULL);
INSERT INTO `m_faculty` VALUES (12, 'CON/0000001', NULL, NULL, NULL, '2020-04-02 19:09:15', NULL);
INSERT INTO `m_faculty` VALUES (13, 'CON/0000001', 'fsdf', 'sdfsd', NULL, '2020-04-03 20:59:13', '1');
INSERT INTO `m_faculty` VALUES (14, 'CON/0000002', 'fsdf', 'sdfs', NULL, '2020-04-03 20:59:37', '1');

-- ----------------------------
-- Table structure for m_lecturer
-- ----------------------------
DROP TABLE IF EXISTS `m_lecturer`;
CREATE TABLE `m_lecturer`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lecturer_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `des` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tel_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `tel_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_lecturer
-- ----------------------------
INSERT INTO `m_lecturer` VALUES (1, 'CON/0000001', 'fsdf', 'sdfsdf', 'fsdfs', 'dfsdf', 'sdfsd', 'f', 'fsdf', '1', '2020-04-03 19:52:47', NULL);

-- ----------------------------
-- Table structure for m_payment
-- ----------------------------
DROP TABLE IF EXISTS `m_payment`;
CREATE TABLE `m_payment`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `player_ref` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `player_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mdate` date NULL DEFAULT NULL,
  `amount` decimal(12, 2) NULL DEFAULT NULL,
  `cancel` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_payment
-- ----------------------------
INSERT INTO `m_payment` VALUES (11, 'PAY/0000005', 'ddfsdfs', 'fsdfsdf', '2020-04-02', 5345345.00, '0', NULL, '2020-04-02 00:41:09');

-- ----------------------------
-- Table structure for m_registration
-- ----------------------------
DROP TABLE IF EXISTS `m_registration`;
CREATE TABLE `m_registration`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `REF` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guardian_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `guardian_tel` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address_1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address_2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tel_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tel_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dob` date NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `remark` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `joineddate` date NULL DEFAULT NULL,
  `active` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `black_list` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `approve` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `platform` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sys_time` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_registration
-- ----------------------------
INSERT INTO `m_registration` VALUES (43, 'REG/0000022', 'fsdfsd', 'fsdf', 'sdfsd', '4345345', '534gfdfg', '5435ergfdg', '543534', '5345', 'gdfg', '2020-04-14', '5435345', '5345345', '2020-04-02', '1', '0', '0', '0', NULL, NULL, '2020-04-02 00:31:55');
INSERT INTO `m_registration` VALUES (44, 'REG/0000022', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '2020-04-02', '1', '0', '0', '0', NULL, NULL, '2020-04-02 00:33:22');
INSERT INTO `m_registration` VALUES (45, 'REG/0000022', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '2020-04-02', '1', '0', '0', '0', NULL, NULL, '2020-04-02 00:33:49');
INSERT INTO `m_registration` VALUES (46, 'REG/0000022', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '2020-04-02', '1', '0', '0', '0', NULL, NULL, '2020-04-02 00:34:19');
INSERT INTO `m_registration` VALUES (48, 'REG/0000022', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '2020-04-02', '1', '0', '0', '0', NULL, NULL, '2020-04-02 00:37:18');

-- ----------------------------
-- Table structure for sys_entry
-- ----------------------------
DROP TABLE IF EXISTS `sys_entry`;
CREATE TABLE `sys_entry`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `des` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `super` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `main` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class_1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class_2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `block` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sys_entry
-- ----------------------------
INSERT INTO `sys_entry` VALUES (2, 'Registration', 'registration', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (3, 'Payment', 'pay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (5, 'Batch', 'batch', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (6, 'Course', 'course', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (7, 'Content', 'content', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (8, 'Faculty', 'faculty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `sys_entry` VALUES (9, 'Lecturer', 'lecturer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for sys_info
-- ----------------------------
DROP TABLE IF EXISTS `sys_info`;
CREATE TABLE `sys_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `COM_NAME` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_EMAIL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_ADD1` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_ADD2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_TEL1` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_TEL2` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `COM_FAX` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `registration_ref` int(12) NULL DEFAULT NULL,
  `payment_ref` int(12) NULL DEFAULT NULL,
  `batch_ref` int(12) NULL DEFAULT NULL,
  `content_ref` int(12) NULL DEFAULT NULL,
  `course_ref` int(12) NULL DEFAULT NULL,
  `faculty_ref` int(12) NULL DEFAULT NULL,
  `lecturer_ref` int(12) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sys_info
-- ----------------------------
INSERT INTO `sys_info` VALUES (1, 'Quotro', NULL, NULL, NULL, NULL, NULL, NULL, 23, 6, 8, 2, 4, 3, 2);

-- ----------------------------
-- Table structure for user_mast
-- ----------------------------
DROP TABLE IF EXISTS `user_mast`;
CREATE TABLE `user_mast`  (
  `user_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_type` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_depart` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `U_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `R_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `dev` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0'
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_mast
-- ----------------------------
INSERT INTO `user_mast` VALUES ('admin', '123', 'ADMIN', 'HR', NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akila', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akidla', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akiddla', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akiladsfds', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('dsfsdfsd', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akiladsfsdfsdf', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('akilaew', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('mmmy', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('mmy', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('sanjaya', '123', NULL, NULL, NULL, NULL, '0', '0');
INSERT INTO `user_mast` VALUES ('qeew', '963', NULL, NULL, NULL, NULL, '0', '0');

SET FOREIGN_KEY_CHECKS = 1;
