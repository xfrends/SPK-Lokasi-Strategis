/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : db_spk_wp

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 28/12/2022 16:16:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alternatives
-- ----------------------------
DROP TABLE IF EXISTS `alternatives`;
CREATE TABLE `alternatives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of alternatives
-- ----------------------------
BEGIN;
INSERT INTO `alternatives` VALUES (1, 'Frendi Triarista', '2022-12-17 10:28:10', '2022-12-18 07:46:18', NULL);
INSERT INTO `alternatives` VALUES (2, 'Izzah Ashabi Jannah', '2022-12-17 10:28:18', '2022-12-18 07:46:02', NULL);
INSERT INTO `alternatives` VALUES (3, 'Kanti Mutmainah', '2022-12-17 10:29:00', '2022-12-18 07:46:27', NULL);
INSERT INTO `alternatives` VALUES (4, 'Muhammad Latif', '2022-12-23 16:09:54', '2022-12-23 16:09:54', NULL);
INSERT INTO `alternatives` VALUES (5, 'Restu', '2022-12-24 04:12:51', '2022-12-24 04:12:51', NULL);
COMMIT;

-- ----------------------------
-- Table structure for criteria_alternatives
-- ----------------------------
DROP TABLE IF EXISTS `criteria_alternatives`;
CREATE TABLE `criteria_alternatives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `criteria_id` bigint unsigned NOT NULL,
  `alternative_id` bigint unsigned NOT NULL,
  `value` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `criteria_alternatives_criteria_id_foreign` (`criteria_id`),
  KEY `criteria_alternatives_alternative_id_foreign` (`alternative_id`),
  CONSTRAINT `criteria_alternatives_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE,
  CONSTRAINT `criteria_alternatives_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of criteria_alternatives
-- ----------------------------
BEGIN;
INSERT INTO `criteria_alternatives` VALUES (1, 1, 1, 26.00, '2022-12-18 14:56:56', '2022-12-23 15:05:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (2, 2, 1, 3.00, '2022-12-18 14:57:17', '2022-12-23 15:05:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (3, 3, 1, 12.00, '2022-12-18 14:57:42', '2022-12-18 14:57:45', NULL);
INSERT INTO `criteria_alternatives` VALUES (4, 4, 1, 5.00, '2022-12-18 08:53:34', '2022-12-23 15:05:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (5, 5, 1, 3.00, '2022-12-18 08:53:34', '2022-12-23 15:05:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (6, 1, 3, 21.00, '2022-12-18 08:53:49', '2022-12-23 15:04:46', NULL);
INSERT INTO `criteria_alternatives` VALUES (7, 2, 3, 2.00, '2022-12-18 08:53:49', '2022-12-18 08:53:49', NULL);
INSERT INTO `criteria_alternatives` VALUES (8, 3, 3, 3.00, '2022-12-18 08:53:49', '2022-12-18 08:53:49', NULL);
INSERT INTO `criteria_alternatives` VALUES (9, 4, 3, 4.00, '2022-12-18 08:53:49', '2022-12-18 08:53:49', NULL);
INSERT INTO `criteria_alternatives` VALUES (10, 5, 3, 3.00, '2022-12-18 08:53:49', '2022-12-23 15:04:46', NULL);
INSERT INTO `criteria_alternatives` VALUES (11, 1, 5, 21.00, '2022-12-24 04:13:25', '2022-12-24 04:13:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (12, 2, 5, 3.00, '2022-12-24 04:13:25', '2022-12-24 04:13:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (13, 3, 5, 10.00, '2022-12-24 04:13:25', '2022-12-24 04:13:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (14, 4, 5, 9.00, '2022-12-24 04:13:25', '2022-12-24 04:13:25', NULL);
INSERT INTO `criteria_alternatives` VALUES (15, 5, 5, 3.00, '2022-12-24 04:13:25', '2022-12-24 04:13:25', NULL);
COMMIT;

-- ----------------------------
-- Table structure for criterias
-- ----------------------------
DROP TABLE IF EXISTS `criterias`;
CREATE TABLE `criterias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `attribute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of criterias
-- ----------------------------
BEGIN;
INSERT INTO `criterias` VALUES (1, 'Usia', 3, 'cost', '2022-12-17 15:40:43', '2022-12-18 07:43:00', NULL);
INSERT INTO `criterias` VALUES (2, 'Pendidikan', 2, 'benefit', '2022-12-17 15:47:42', '2022-12-18 07:43:08', NULL);
INSERT INTO `criterias` VALUES (3, 'Pengalaman', 4, 'benefit', '2022-12-18 07:43:40', '2022-12-18 07:43:40', NULL);
INSERT INTO `criterias` VALUES (4, 'Nilai Tes', 4, 'benefit', '2022-12-18 07:45:01', '2022-12-18 07:45:01', NULL);
INSERT INTO `criterias` VALUES (5, 'IPK', 3, 'benefit', '2022-12-18 07:45:23', '2022-12-18 07:45:23', NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_12_17_091423_create_alternatives_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_12_17_091437_create_criterias_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_12_17_091648_create_criteria_alternatives_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
