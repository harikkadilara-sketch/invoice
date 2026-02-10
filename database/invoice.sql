/*
 Navicat Premium Dump SQL

 Source Server         : xampp
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : invoice

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 10/02/2026 21:58:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE,
  INDEX `cache_expiration_index`(`expiration` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`) USING BTREE,
  INDEX `cache_locks_expiration_index`(`expiration` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES (1, 'Indo Tama', 'indotama@gmail.com', '0819', NULL, '2026-02-01 19:41:06', '2026-02-01 19:41:06');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `vat_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `registration_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SAR',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'PT INDOTAMA', NULL, '1122', '2211', 'Jalan Jakarta Raya', 'SAR', '2026-02-01 19:43:10', '2026-02-01 19:43:10');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for invoice_items
-- ----------------------------
DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(15, 2) NOT NULL,
  `total` decimal(15, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoice_items_invoice_id_foreign`(`invoice_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice_items
-- ----------------------------
INSERT INTO `invoice_items` VALUES (7, 7, 'Thank you for your interest on Travel Time Company', 1, 4260.87, 4260.87);
INSERT INTO `invoice_items` VALUES (8, 8, 'Thank you for your interest on Travel Time Company', 1, 4260.87, 4260.87);
INSERT INTO `invoice_items` VALUES (9, 9, 'Thank you for your interest on Travel Time Company', 1, 4260.87, 4260.87);
INSERT INTO `invoice_items` VALUES (10, 10, 'Thank you for your interest on Travel Time Company', 1, 4260.87, 4260.87);

-- ----------------------------
-- Table structure for invoice_template_fields
-- ----------------------------
DROP TABLE IF EXISTS `invoice_template_fields`;
CREATE TABLE `invoice_template_fields`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_template_id` bigint UNSIGNED NOT NULL,
  `field_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_mode` enum('auto','editable','readonly') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editable',
  `is_required` tinyint(1) NOT NULL DEFAULT 0,
  `order` int NOT NULL DEFAULT 0,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `section_key` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoice_template_fields_invoice_template_id_foreign`(`invoice_template_id` ASC) USING BTREE,
  CONSTRAINT `invoice_template_fields_invoice_template_id_foreign` FOREIGN KEY (`invoice_template_id`) REFERENCES `invoice_templates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice_template_fields
-- ----------------------------
INSERT INTO `invoice_template_fields` VALUES (13, 1, 'invoice_date', 'Date', 'date', 'editable', 1, 1, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (14, 1, 'hijri_date', 'Date (Hijri)', 'text', 'auto', 0, 2, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (15, 1, 'invoice_number', 'Invoice No', 'text', 'auto', 0, 3, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (16, 1, 'to', 'To', 'text', 'auto', 0, 4, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (17, 1, 'company_name', 'From', 'text', 'readonly', 1, 5, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (18, 1, 'commercial_registration', 'Commercial Registration No', 'text', 'readonly', 1, 6, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (19, 1, 'license_number', 'License Number', 'text', 'readonly', 0, 7, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (20, 1, 'vat_number', 'VAT No', 'text', 'readonly', 1, 8, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'header');
INSERT INTO `invoice_template_fields` VALUES (21, 1, 'reservation_no', 'Res. No', 'text', 'editable', 1, 9, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'reservation_info');
INSERT INTO `invoice_template_fields` VALUES (22, 1, 'arrival_date', 'Arrival Date', 'date', 'editable', 1, 10, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'reservation_info');
INSERT INTO `invoice_template_fields` VALUES (23, 1, 'departure_date', 'Depart. Date', 'date', 'editable', 1, 11, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'reservation_info');
INSERT INTO `invoice_template_fields` VALUES (24, 1, 'guest_name', 'Guest Name', 'text', 'editable', 1, 12, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'guest_hotel_info');
INSERT INTO `invoice_template_fields` VALUES (25, 1, 'hotel_name', 'Hotel Name', 'text', 'editable', 1, 13, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'guest_hotel_info');
INSERT INTO `invoice_template_fields` VALUES (26, 1, 'room_type', 'Room Type', 'text', 'editable', 1, 14, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'guest_hotel_info');
INSERT INTO `invoice_template_fields` VALUES (27, 1, 'meal_plan', 'Meal', 'text', 'editable', 0, 15, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'guest_hotel_info');
INSERT INTO `invoice_template_fields` VALUES (28, 1, 'total', 'Total', 'money', 'auto', 0, 16, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'summary');
INSERT INTO `invoice_template_fields` VALUES (29, 1, 'vat', 'VAT', 'money', 'editable', 1, 17, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'summary');
INSERT INTO `invoice_template_fields` VALUES (30, 1, 'subtotal', 'Total Net Value', 'money', 'auto', 0, 18, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'summary');
INSERT INTO `invoice_template_fields` VALUES (31, 1, 'paid', 'Paid', 'money', 'editable', 0, 19, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'summary');
INSERT INTO `invoice_template_fields` VALUES (32, 1, 'remaining', 'Remaining', 'money', 'auto', 0, 20, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'summary');
INSERT INTO `invoice_template_fields` VALUES (33, 1, 'remarks', 'Remarks', 'textarea', 'editable', 0, 21, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'remarks');
INSERT INTO `invoice_template_fields` VALUES (34, 1, 'bank_name', 'Bank Name', 'text', 'readonly', 0, 22, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'bank_info');
INSERT INTO `invoice_template_fields` VALUES (35, 1, 'account_name', 'Account Name', 'text', 'readonly', 0, 23, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'bank_info');
INSERT INTO `invoice_template_fields` VALUES (36, 1, 'iban', 'IBAN', 'text', 'readonly', 0, 24, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'bank_info');
INSERT INTO `invoice_template_fields` VALUES (37, 1, 'swift_code', 'Swift Code', 'text', 'readonly', 0, 25, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'bank_info');
INSERT INTO `invoice_template_fields` VALUES (38, 1, 'room_rate', 'Room Rate', 'text', 'editable', 0, 15, '2026-02-01 23:27:42', '2026-02-01 23:27:42', 'guest_hotel_info');

-- ----------------------------
-- Table structure for invoice_template_sections
-- ----------------------------
DROP TABLE IF EXISTS `invoice_template_sections`;
CREATE TABLE `invoice_template_sections`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_template_id` bigint UNSIGNED NOT NULL,
  `section_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int NOT NULL DEFAULT 0,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoice_template_sections_invoice_template_id_foreign`(`invoice_template_id` ASC) USING BTREE,
  CONSTRAINT `invoice_template_sections_invoice_template_id_foreign` FOREIGN KEY (`invoice_template_id`) REFERENCES `invoice_templates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice_template_sections
-- ----------------------------
INSERT INTO `invoice_template_sections` VALUES (38, 1, 'header', 'Header & Logo', 1, 1, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (39, 1, 'company_info', 'Company Information', 0, 2, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (40, 1, 'reservation_info', 'Reservation Information', 1, 3, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (41, 1, 'guest_hotel_info', 'Guest & Hotel Information', 1, 4, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (42, 1, 'invoice_items', 'Invoice Items', 0, 5, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (43, 1, 'summary', 'Summary', 1, 6, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (44, 1, 'remarks', 'Remarks', 1, 7, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (45, 1, 'bank_info', 'Bank Information', 1, 8, '2026-02-01 23:27:42', '2026-02-01 23:27:42');
INSERT INTO `invoice_template_sections` VALUES (46, 1, 'footer', 'Footer', 1, 9, '2026-02-01 23:27:42', '2026-02-01 23:27:42');

-- ----------------------------
-- Table structure for invoice_templates
-- ----------------------------
DROP TABLE IF EXISTS `invoice_templates`;
CREATE TABLE `invoice_templates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_view` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `invoice_templates_code_unique`(`code` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice_templates
-- ----------------------------
INSERT INTO `invoice_templates` VALUES (1, 'travel', 'invoices.pdf.travel', 'Travel / Hotel', 'invoices.templates.travel', 1, NULL, NULL);
INSERT INTO `invoice_templates` VALUES (2, 'simple', 'invoices.pdf.simple', 'Simple', 'invoices.templates.simple', 1, NULL, NULL);
INSERT INTO `invoice_templates` VALUES (3, 'corporate', 'invoices.pdf.corporate', 'Corporate', 'invoices.templates.corporate', 1, NULL, NULL);

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `master_invoice_id` bigint UNSIGNED NOT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NULL DEFAULT NULL,
  `to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `guest_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `hotel_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bank_account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_iban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_swift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `info_invoice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profit` decimal(15, 2) NULL DEFAULT NULL,
  `sumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `invoices_invoice_no_unique`(`invoice_no` ASC) USING BTREE,
  UNIQUE INDEX `invoices_res_no_unique`(`res_no` ASC) USING BTREE,
  INDEX `invoices_master_invoice_id_foreign`(`master_invoice_id` ASC) USING BTREE,
  CONSTRAINT `invoices_master_invoice_id_foreign` FOREIGN KEY (`master_invoice_id`) REFERENCES `master_template_invoice` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES (1, 1, 'INV-20260210-N7T1', 'RES-20260210-VFDL', '2026-02-10', 'Aurora', 'Bluejet', 'Adzahra', 'Triple One Hotel', '<table style=\"width: 100.72%; border-collapse: collapse; border: none; background: #ffffff; height: 776.2px;\">\r\n<tbody>\r\n<tr style=\"height: 776.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 100%; text-align: center;\"><!-- ================= HEADER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #ffffff; height: 113.6px;\">\r\n<tbody>\r\n<tr style=\"height: 113.6px;\">\r\n<td style=\"text-align: center; border: none; background: #fff;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"<img src=\"http://127.0.0.1:8000/storage/logos/Cb7LqY2KTxN7qBL5qWzczsjzR0zNsBWNbiEnQ50E.png\" style=\"max-height:80px;\">\" alt=\"Logo\" width=\"96\" height=\"96\"></td>\r\n<td style=\"padding-left: 20px; border: none; background: #fff;\"><strong>Bluejet</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 15%; border: none; background: #ffffff; text-align: left;\"><strong>Date</strong><br><strong>To</strong><br><strong>From</strong></td>\r\n<td style=\"width: 45%; border: none; background: #ffffff; text-align: left;\">: 10/02/2026<br>: Aurora<br>: Bluejet</td>\r\n<td style=\"width: 40%; text-align: center; border: none; background: #fff;\">\r\n<h4>Definite Confirmation</h4>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">\r\n<p style=\"text-align: left;\">hank you for your interest on Bluejet</p>\r\n<!-- ================= GUEST INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Res. No</strong><br><strong>Arrival Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: RES-20260210-VFDL<br>: 11/02/2026</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Guest Name</strong><br><strong>Hotel Name</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: Adzahra<br>: Triple One Hotel</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Depart Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: 12/02/2026</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= ROOM TABLE ================= -->&nbsp;\r\n<table class=\"room-table\" style=\"height: 89.6px; width: 99.7961%; border-collapse: collapse; border-width: 2px; border-color: #000000;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 52.8px;\">\r\n<th style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">QTY</span></th>\r\n<th style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Type</span></th>\r\n<th style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Rate</span></th>\r\n<th style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Meal</span></th>\r\n</tr>\r\n<tr style=\"height: 36.8px;\">\r\n<td style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">1</span></td>\r\n<td style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Quad City View</span></td>\r\n<td style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">700</span></td>\r\n<td style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">RO</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= TOTAL ================= -->\r\n<table style=\"width: 18.7434%; border-collapse: collapse; border: none; background: #ffffff; height: 33.2px;\">\r\n<tbody>\r\n<tr style=\"height: 33.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 23.1224%;\"><strong>Total</strong></td>\r\n<td style=\"border: none; background: #ffffff; width: 76.8776%;\">: SAR {{ currency }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= REMARKS ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Remarks :</strong><br>* We hope that we have covered all your requests. Kindly note that we will be waiting for your reply by the option\r\ndate; otherwise, the reservation will be released automatically without prior notice.\r\nAbove Rates are net & non commision-able quoted in Saudi Riyals\r\nCheck in after 16:00 hours and check out at 12:00 hour\r\nCheck in or check out amendment for individulas should be done 72 hours prior to guest check in.\r\nCheck in or check out amendment for Group should be 7 days prior to guest check in.\r\nIn case of no-show for groups full amount will be charged.\r\nIn case of no-show for individuals first night will be charged.\r\nTriple and Quad occupancy will be through extra bed, If standard room is not available.\r\nRamdan Bookings is non ref</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= FOOTER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Our Bank Acc :</strong><br>Account Name : DIAMOND TRAVEL TIME COMPANY FOR<br>Bank Name : Riyad Bank<br>Branch : RIYAD<br>Account # : 1226628059940<br>IBAN # : SR<br>Swift Code : RIBLSAR</td>\r\n<td style=\"text-align: center; border: none; background: #fff;\">Thanks and Best Regards<br><br>{{ reservation_agent }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">https://www.bluejet.id/</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'SAR 4,260.87', '* We hope that we have covered all your requests. Kindly note that we will be waiting for your reply by the option\r\ndate; otherwise, the reservation will be released automatically without prior notice.\r\nAbove Rates are net & non commision-able quoted in Saudi Riyals\r\nCheck in after 16:00 hours and check out at 12:00 hour\r\nCheck in or check out amendment for individulas should be done 72 hours prior to guest check in.\r\nCheck in or check out amendment for Group should be 7 days prior to guest check in.\r\nIn case of no-show for groups full amount will be charged.\r\nIn case of no-show for individuals first night will be charged.\r\nTriple and Quad occupancy will be through extra bed, If standard room is not available.\r\nRamdan Bookings is non ref', 'DIAMOND TRAVEL TIME COMPANY FOR', 'Riyad Bank', 'RIYAD', '1226628059940', 'SR', 'RIBLSAR', 'Definite Confirmation', 10000.00, 'Bluejet.id', 'https://www.bluejet.id/', 1, '2026-02-10 13:18:56', '2026-02-10 13:18:56');
INSERT INTO `invoices` VALUES (2, 1, 'INV-20260210-FMA1', 'RES-20260210-YBA0', '2026-02-10', 'Aurora', 'Bluejet', 'Adzahra', 'Triple One Hotel', '<table style=\"width: 100.72%; border-collapse: collapse; border: none; background: #ffffff; height: 776.2px;\">\r\n<tbody>\r\n<tr style=\"height: 776.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 100%; text-align: center;\"><!-- ================= HEADER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #ffffff; height: 113.6px;\">\r\n<tbody>\r\n<tr style=\"height: 113.6px;\">\r\n<td style=\"text-align: center; border: none; background: #fff;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"<img src=\"http://127.0.0.1:8000/storage/logos/ZhM1pTxbHIEKvs7AhRHfcxpYh42dnEKOojAqSxUI.png\" style=\"max-height:80px;\">\" alt=\"Logo\" width=\"96\" height=\"96\"></td>\r\n<td style=\"padding-left: 20px; border: none; background: #fff;\"><strong>Bluejet</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 15%; border: none; background: #ffffff; text-align: left;\"><strong>Date</strong><br><strong>To</strong><br><strong>From</strong></td>\r\n<td style=\"width: 45%; border: none; background: #ffffff; text-align: left;\">: 10/02/2026<br>: Aurora<br>: Bluejet</td>\r\n<td style=\"width: 40%; text-align: center; border: none; background: #fff;\">\r\n<h4>Definite Confirmation</h4>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">\r\n<p style=\"text-align: left;\">hank you for your interest on Bluejet</p>\r\n<!-- ================= GUEST INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Res. No</strong><br><strong>Arrival Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: RES-20260210-YBA0<br>: 11/02/2026</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Guest Name</strong><br><strong>Hotel Name</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: Adzahra<br>: Triple One Hotel</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Depart Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: 12/02/2026</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= ROOM TABLE ================= -->&nbsp;\r\n<table class=\"room-table\" style=\"height: 89.6px; width: 99.7961%; border-collapse: collapse; border-width: 2px; border-color: #000000;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 52.8px;\">\r\n<th style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">QTY</span></th>\r\n<th style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Type</span></th>\r\n<th style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Rate</span></th>\r\n<th style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Meal</span></th>\r\n</tr>\r\n<tr style=\"height: 36.8px;\">\r\n<td style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">1</span></td>\r\n<td style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Quad City View</span></td>\r\n<td style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">700</span></td>\r\n<td style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">RO</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= TOTAL ================= -->\r\n<table style=\"width: 18.7434%; border-collapse: collapse; border: none; background: #ffffff; height: 33.2px;\">\r\n<tbody>\r\n<tr style=\"height: 33.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 23.1224%;\"><strong>Total</strong></td>\r\n<td style=\"border: none; background: #ffffff; width: 76.8776%;\">: SAR {{ currency }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= REMARKS ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Remarks :</strong><br>* We hope that we have covered all your requests. Kindly note that we will be waiting for your reply by the option\r\ndate; otherwise, the reservation will be released automatically without prior notice.\r\nAbove Rates are net & non commision-able quoted in Saudi Riyals\r\nCheck in after 16:00 hours and check out at 12:00 hour\r\nCheck in or check out amendment for individulas should be done 72 hours prior to guest check in.\r\nCheck in or check out amendment for Group should be 7 days prior to guest check in.\r\nIn case of no-show for groups full amount will be charged.\r\nIn case of no-show for individuals first night will be charged.\r\nTriple and Quad occupancy will be through extra bed, If standard room is not available.\r\nRamdan Bookings is non ref</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= FOOTER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Our Bank Acc :</strong><br>Account Name : DIAMOND TRAVEL TIME COMPANY FOR<br>Bank Name : Riyad Bank<br>Branch : RIYAD<br>Account # : 1226628059940<br>IBAN # : SR<br>Swift Code : RIBLSAR</td>\r\n<td style=\"text-align: center; border: none; background: #fff;\">Thanks and Best Regards<br><br>{{ reservation_agent }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">https://www.bluejet.id/</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 'SAR 4,260.87', '* We hope that we have covered all your requests. Kindly note that we will be waiting for your reply by the option\r\ndate; otherwise, the reservation will be released automatically without prior notice.\r\nAbove Rates are net & non commision-able quoted in Saudi Riyals\r\nCheck in after 16:00 hours and check out at 12:00 hour\r\nCheck in or check out amendment for individulas should be done 72 hours prior to guest check in.\r\nCheck in or check out amendment for Group should be 7 days prior to guest check in.\r\nIn case of no-show for groups full amount will be charged.\r\nIn case of no-show for individuals first night will be charged.\r\nTriple and Quad occupancy will be through extra bed, If standard room is not available.\r\nRamdan Bookings is non ref', 'DIAMOND TRAVEL TIME COMPANY FOR', 'Riyad Bank', 'RIYAD', '1226628059940', 'SR', 'RIBLSAR', 'Definite Confirmation', 10000.00, 'Bluejet.id', 'https://www.bluejet.id/', 1, '2026-02-10 13:18:58', '2026-02-10 13:18:58');

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of job_batches
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for master_template_invoice
-- ----------------------------
DROP TABLE IF EXISTS `master_template_invoice`;
CREATE TABLE `master_template_invoice`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `master_template_invoice_code_unique`(`code` ASC) USING BTREE,
  INDEX `master_template_invoice_created_by_foreign`(`created_by` ASC) USING BTREE,
  CONSTRAINT `master_template_invoice_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_template_invoice
-- ----------------------------
INSERT INTO `master_template_invoice` VALUES (1, 'Template 01', 'INV-TPL-2026-0001', 'ok', '<table style=\"width: 100.72%; border-collapse: collapse; border: none; background: #ffffff; height: 776.2px;\">\r\n<tbody>\r\n<tr style=\"height: 776.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 100%; text-align: center;\"><!-- ================= HEADER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: center; border: none; background: #fff;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src=\"{{company_logo}}\" alt=\"Logo\" width=\"96\" height=\"96\"></td>\r\n<td style=\"padding-left: 20px; border: none; background: #fff;\"><strong>Bluejet</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 15%; border: none; background: #ffffff; text-align: left;\"><strong>Date</strong><br><strong>To</strong><br><strong>From</strong></td>\r\n<td style=\"width: 45%; border: none; background: #ffffff; text-align: left;\">: {{ date }}<br>: {{ to }}<br>: {{ from }}</td>\r\n<td style=\"width: 40%; text-align: center; border: none; background: #fff;\">\r\n<h4>{{ info_invoice }}</h4>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">\r\n<p style=\"text-align: left;\">hank you for your interest on Bluejet</p>\r\n<!-- ================= GUEST INFO ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Res. No</strong><br><strong>Arrival Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: {{ res_no }}<br>: {{ arrival_date }}</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Guest Name</strong><br><strong>Hotel Name</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: {{ guest_name }}<br>: {{ hotel_name }}</td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Depart Date</strong></td>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\">: {{ depart_date }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= ROOM TABLE ================= -->&nbsp;\r\n<table class=\"room-table\" style=\"height: 89.6px; width: 99.7961%; border-collapse: collapse; border-width: 2px; border-color: #000000;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 52.8px;\">\r\n<th style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">QTY</span></th>\r\n<th style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Type</span></th>\r\n<th style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Room Rate</span></th>\r\n<th style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Meal</span></th>\r\n</tr>\r\n<tr style=\"height: 36.8px;\">\r\n<td style=\"width: 12.3713%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">1</span></td>\r\n<td style=\"width: 30.6179%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">Quad City View</span></td>\r\n<td style=\"width: 20.167%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">700</span></td>\r\n<td style=\"width: 36.8439%; border-width: 2px; border-color: #000000; text-align: center;\"><span style=\"font-size: 10pt;\">RO</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= TOTAL ================= -->\r\n<table style=\"width: 18.7434%; border-collapse: collapse; border: none; background: #ffffff; height: 33.2px;\">\r\n<tbody>\r\n<tr style=\"height: 33.2px;\">\r\n<td style=\"border: none; background: #ffffff; width: 23.1224%;\"><strong>Total</strong></td>\r\n<td style=\"border: none; background: #ffffff; width: 76.8776%;\">: {{ currency }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= REMARKS ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Remarks :</strong><br>{{ remarks }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br><!-- ================= FOOTER ================= -->\r\n<table style=\"width: 100%; border-collapse: collapse; border: none; background: #fff;\">\r\n<tbody>\r\n<tr>\r\n<td style=\"border: none; background: #ffffff; text-align: left;\"><strong>Our Bank Acc :</strong><br>Account Name : {{ bank_account_name }}<br>Bank Name : {{ bank_name }}<br>Branch : {{ bank_branch }}<br>Account # : {{ bank_account_number }}<br>IBAN # : {{ bank_iban }}<br>Swift Code : {{ bank_swift }}</td>\r\n<td style=\"text-align: center; border: none; background: #fff;\">Thanks and Best Regards<br><br>{{ reservation_agent }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<hr style=\"border: 2px solid #000; border-radius: 5px;\"><hr style=\"border: 2px solid #000; border-radius: 5px;\">{{ url_web }}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>', 1, 1, '2026-02-09 17:46:38', '2026-02-09 17:58:18');

-- ----------------------------
-- Table structure for menu_role
-- ----------------------------
DROP TABLE IF EXISTS `menu_role`;
CREATE TABLE `menu_role`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_role_menu_id_foreign`(`menu_id` ASC) USING BTREE,
  INDEX `menu_role_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu_role
-- ----------------------------
INSERT INTO `menu_role` VALUES (1, 1, 1);
INSERT INTO `menu_role` VALUES (2, 1, 2);
INSERT INTO `menu_role` VALUES (3, 2, 1);
INSERT INTO `menu_role` VALUES (4, 2, 2);
INSERT INTO `menu_role` VALUES (6, 3, 2);
INSERT INTO `menu_role` VALUES (7, 4, 1);
INSERT INTO `menu_role` VALUES (31, 21, 1);
INSERT INTO `menu_role` VALUES (34, 5, 2);
INSERT INTO `menu_role` VALUES (35, 21, 1);

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Dashboard', 'dashboard', 'fas fa-home', NULL, 1, 1, '2026-01-29 19:29:59', '2026-01-29 19:29:59');
INSERT INTO `menus` VALUES (2, 'Invoices', 'invoices.index', 'fas fa-file-invoice', NULL, 3, 1, '2026-01-29 19:29:59', '2026-01-29 19:29:59');
INSERT INTO `menus` VALUES (3, 'Clients', 'clients.index', 'fas fa-users', NULL, 4, 1, '2026-01-29 19:29:59', '2026-01-29 19:29:59');
INSERT INTO `menus` VALUES (4, 'Users', 'users.index', 'fas fa-user-cog', NULL, 10, 1, '2026-01-29 19:29:59', '2026-01-29 19:29:59');
INSERT INTO `menus` VALUES (5, 'Companies', 'companies.index', 'fas fa-building', NULL, 11, 1, '2026-01-29 19:29:59', '2026-01-29 19:29:59');
INSERT INTO `menus` VALUES (21, 'Master Template', 'masterinvoice.index', 'fas fa-layer-group', NULL, 2, 1, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2026_01_26_080147_create_roles_table', 1);
INSERT INTO `migrations` VALUES (5, '2026_01_26_080219_create_role_user_table', 1);
INSERT INTO `migrations` VALUES (6, '2026_01_26_080243_create_companies_table', 1);
INSERT INTO `migrations` VALUES (7, '2026_01_26_080309_create_clients_table', 1);
INSERT INTO `migrations` VALUES (8, '2026_01_26_080336_create_invoices_table', 1);
INSERT INTO `migrations` VALUES (9, '2026_01_26_080358_create_invoice_items_table', 1);
INSERT INTO `migrations` VALUES (10, '2026_01_26_080425_create_payments_table', 1);
INSERT INTO `migrations` VALUES (11, '2026_01_26_083542_create_menus_table', 1);
INSERT INTO `migrations` VALUES (12, '2026_01_26_083745_create_menu_role_table', 1);
INSERT INTO `migrations` VALUES (13, '2026_01_31_210752_create_invoice_templates', 2);
INSERT INTO `migrations` VALUES (14, '2026_01_31_210919_add_invoices_table', 2);
INSERT INTO `migrations` VALUES (15, '2026_01_31_215741_create_invoice_template_sections_table', 3);
INSERT INTO `migrations` VALUES (16, '2026_01_31_224213_create_invoice_template_fields_table', 3);
INSERT INTO `migrations` VALUES (17, '2026_01_31_233554_create_invoice_template_sections_table', 4);
INSERT INTO `migrations` VALUES (18, '2026_02_01_225449_add_input_mode_to_invoice_template_fields_table', 5);
INSERT INTO `migrations` VALUES (19, '2026_02_02_190608_add_meta_to_invoices_table', 6);
INSERT INTO `migrations` VALUES (20, '2026_02_02_202021_add_code_and_pdf_view_to_invoice_templates', 7);
INSERT INTO `migrations` VALUES (21, '2026_02_06_172859_create_master_template_invoice_table', 8);
INSERT INTO `migrations` VALUES (22, '2026_02_09_132427_create_invoice_table', 8);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_user_user_id_foreign`(`user_id` ASC) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 1);
INSERT INTO `role_user` VALUES (2, 2, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', '2026-01-29 19:29:57', '2026-01-29 19:29:57');
INSERT INTO `roles` VALUES (2, 'user', '2026-01-29 19:29:57', '2026-01-29 19:29:57');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('3nNHZ53mWHaZK5CXETpF40lUKYL9zK1GDUwmvp96', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSGcxQ3ZmRk1rd0FyZUlSWnlYVTNiZ3hmZGlSRTRId1VqamR4NlJkSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXJpbnZvaWNlLzEvZWRpdCI7czo1OiJyb3V0ZSI7czoxODoibWFzdGVyaW52b2ljZS5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE4OiJsYXN0X2FjdGl2aXR5X3RpbWUiO2k6MTc3MDczMDM3MTt9', 1770730371);
INSERT INTO `sessions` VALUES ('i7q1cNQYa0cuV3OQR1yRmz3CoUBWXVSN4aCIuPBK', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRnlCaHpYdDZKOG50elc4c2ZuVnBZWm1DSnQ0V0l6YnFWTm9GdG4zYyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaW52b2ljZXMvY3JlYXRlIjtzOjU6InJvdXRlIjtzOjE1OiJpbnZvaWNlcy5jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTg6Imxhc3RfYWN0aXZpdHlfdGltZSI7aToxNzcwNzM1NDcxO30=', 1770735471);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@invoice.test', NULL, '$2y$12$mrYHsh.uv2OAxab2bswbWO/czeejGF9yhQBu7.7PtuMYV0hJjAfmi', 'M3KkKSXLqxOvdMY0kY7HqUuaZVYjkViGKb2rx7OtPrpunIF7l2Gicz3gBo4z', '2026-01-29 19:29:58', '2026-01-29 19:29:58');
INSERT INTO `users` VALUES (2, 'User Invoice', 'user@invoice.test', NULL, '$2y$12$iIcfTg24HKKm6UBEMQvsdeebcn1YNzV7AXw4.b.xbHmZNqIg5gOAO', 'EmPqXxBhbF5k4WwDbE4yJNa88P3f5o4tf5G2Jf5xaZ40TOZBB7yyPXvA9lOs', '2026-01-29 19:29:58', '2026-01-29 19:29:58');

SET FOREIGN_KEY_CHECKS = 1;
