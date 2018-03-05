/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : johnatar

 Target Server Type    : MySQL
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 16/02/2018 15:17:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for companny
-- ----------------------------
DROP TABLE IF EXISTS `companny`;
CREATE TABLE `companny`  (
  `co_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `co_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`co_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of companny
-- ----------------------------
INSERT INTO `companny` VALUES (1, 'บริษัท เทเวศประกันภัย จำกัด (มหาชน)');
INSERT INTO `companny` VALUES (2, 'บริษัท แอร์โค จำกัด');
INSERT INTO `companny` VALUES (38, 'บริษัท จ้า จำกัก');

-- ----------------------------
-- Table structure for dep
-- ----------------------------
DROP TABLE IF EXISTS `dep`;
CREATE TABLE `dep`  (
  `dep_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dep_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dep
-- ----------------------------
INSERT INTO `dep` VALUES (1, 'ฝ่ายบริหาร');
INSERT INTO `dep` VALUES (2, 'ฝ่ายสารสนเทศ');
INSERT INTO `dep` VALUES (3, 'PA & Marketing');
INSERT INTO `dep` VALUES (4, 'ฝ่ายบัญชีและการเงิน');
INSERT INTO `dep` VALUES (5, 'ฝ่ายบุคคลและธุรการ');
INSERT INTO `dep` VALUES (6, 'Staff & Labor Outsourcing BKK');
INSERT INTO `dep` VALUES (7, 'Staff & Labor Outsourcing CHON');
INSERT INTO `dep` VALUES (8, 'Staff & Labor Outsourcing PTY');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `dep_co_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `co_id` int(10) UNSIGNED NOT NULL,
  `dep_co_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dep_co_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 72 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 1, 'ผลิตกรมธรรม์');
INSERT INTO `department` VALUES (2, 1, 'สินไหมรถยนต์');
INSERT INTO `department` VALUES (3, 1, 'ธุรกิจเครือซีเมนต์ไทย');
INSERT INTO `department` VALUES (4, 1, 'บัญชีและการเงิน');
INSERT INTO `department` VALUES (5, 1, 'รับประกันภัยทรัพย์สิน');
INSERT INTO `department` VALUES (6, 1, 'ธุรกิจสถาบันการเงิน');
INSERT INTO `department` VALUES (7, 1, 'บริการลูกค้า');
INSERT INTO `department` VALUES (8, 1, 'บริหารจัดการเบี้ยประกันภัย');
INSERT INTO `department` VALUES (9, 1, 'ประกันทรัพย์สินทางทะเล');
INSERT INTO `department` VALUES (10, 1, 'ธุรกิจตัวแทนและลูกค้ารายย่อย');
INSERT INTO `department` VALUES (11, 1, 'ธุรกิจสาขาและพรบ.ขนส่ง');
INSERT INTO `department` VALUES (12, 1, 'ธุรกิจพลังงาน');
INSERT INTO `department` VALUES (13, 1, 'บุคคลและธุรการ');
INSERT INTO `department` VALUES (14, 1, 'นิติกรรมประกันภัย');
INSERT INTO `department` VALUES (15, 1, 'พิษณุโลก');
INSERT INTO `department` VALUES (16, 2, 'Unitary Sale Support');
INSERT INTO `department` VALUES (17, 2, 'Store Administrative');
INSERT INTO `department` VALUES (18, 2, 'Store Keeper');
INSERT INTO `department` VALUES (19, 2, 'Trane Part Sales Support');
INSERT INTO `department` VALUES (20, 2, 'Marketing Officer');
INSERT INTO `department` VALUES (21, 2, 'Applied Sales Support');
INSERT INTO `department` VALUES (22, 2, 'Service Support');
INSERT INTO `department` VALUES (60, 33, 'it');
INSERT INTO `department` VALUES (61, 33, 'ma');
INSERT INTO `department` VALUES (62, 33, 'pa');
INSERT INTO `department` VALUES (63, 34, 'sadasd');
INSERT INTO `department` VALUES (64, 35, 'dd');
INSERT INTO `department` VALUES (65, 35, 'dddd');
INSERT INTO `department` VALUES (66, 36, 'sd');
INSERT INTO `department` VALUES (67, 36, '');
INSERT INTO `department` VALUES (68, 37, 'hhh');
INSERT INTO `department` VALUES (69, 38, 'it');
INSERT INTO `department` VALUES (70, 38, 'ab');
INSERT INTO `department` VALUES (71, 38, 'cd');

-- ----------------------------
-- Table structure for outsrouce
-- ----------------------------
DROP TABLE IF EXISTS `outsrouce`;
CREATE TABLE `outsrouce`  (
  `oc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `oc_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resign` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `start` date NOT NULL,
  `co_id` int(10) UNSIGNED NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dep_co_id` int(10) NOT NULL,
  PRIMARY KEY (`oc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of outsrouce
-- ----------------------------
INSERT INTO `outsrouce` VALUES (26, 'นายณัฐวุฒิ พิริยะสถิต   (แบงค์)', 2, '2011-01-25', 1, '0922628125', 1);
INSERT INTO `outsrouce` VALUES (27, 'นายพิษณุ สุขสำราญ (ขวัญ)', 1, '2011-05-11', 1, '0984915370', 1);
INSERT INTO `outsrouce` VALUES (28, 'นายจตุพร อาระวิล (หนึ่ง)', 1, '2011-07-04', 1, '0806037993', 1);
INSERT INTO `outsrouce` VALUES (29, 'นายฉัตรชัย พลายงาม', 1, '2013-08-15', 1, '0908928997', 1);
INSERT INTO `outsrouce` VALUES (30, 'นางสาวสุดารัตน์ นุ่มเกลี้ยง', 1, '2015-07-27', 1, '0616817156', 1);
INSERT INTO `outsrouce` VALUES (31, 'นางสาวนันทวรรณ หมู่คำ', 1, '2015-10-19', 1, '0904182056', 1);
INSERT INTO `outsrouce` VALUES (32, 'นายศรายุทธ  รักนาค', 1, '2016-04-18', 1, '0820862721', 1);
INSERT INTO `outsrouce` VALUES (33, 'นายณัฐวุฒิ บุตรรัตน์', 1, '2016-08-18', 1, '0889197365', 1);
INSERT INTO `outsrouce` VALUES (34, 'นางสาวดลพร สังข์นิ่ม', 1, '2016-08-29', 1, '0917267588', 1);
INSERT INTO `outsrouce` VALUES (35, 'นางสาววิลาวัณย์ แพรช่วง', 1, '2017-09-11', 1, '0949257190', 1);
INSERT INTO `outsrouce` VALUES (36, 'นางสาวกชวรรณ วรรณม่วง', 1, '2017-09-16', 1, '0956145559', 1);
INSERT INTO `outsrouce` VALUES (37, 'นายศุภกรณ์ อรศรี (แบงค์)', 1, '2011-09-11', 1, '0942413067', 2);
INSERT INTO `outsrouce` VALUES (38, 'นางสาวปาริฉัตร ไวยสุกรี', 1, '2016-04-18', 1, '0993204186', 2);
INSERT INTO `outsrouce` VALUES (39, 'นางสาวโสธิดา ศิษฐ์เมธากุล', 1, '2016-08-03', 1, '0998184365', 2);
INSERT INTO `outsrouce` VALUES (40, 'นายสิทธิพร  กิจสินธพชัย', 1, '2016-08-03', 1, '0967050691', 2);
INSERT INTO `outsrouce` VALUES (41, 'นางธิดารัตน์ มีคำเพราะ', 1, '2017-05-03', 1, '0616368728', 2);
INSERT INTO `outsrouce` VALUES (42, 'นางสาวขนิษฐา มะรุม', 1, '2017-08-01', 1, '0925292453', 2);
INSERT INTO `outsrouce` VALUES (43, 'นางสาวปัทมวรรณ เสงี่ยมโคกกรวด', 1, '2011-08-01', 1, '0928144494', 3);
INSERT INTO `outsrouce` VALUES (44, 'นางสาวจุฬารัตน์ ภูการุณ', 1, '2017-06-05', 1, '0915952212', 3);
INSERT INTO `outsrouce` VALUES (45, 'นางสาวพรกนก ตุ้มทอง', 1, '2017-10-02', 1, '0642805769', 2);
INSERT INTO `outsrouce` VALUES (46, 'นางสาววารินธรณ์  สังข์ทอง', 1, '2015-09-01', 1, '0836065650', 4);
INSERT INTO `outsrouce` VALUES (47, 'นางสาวศิริกาญจน์  ศุภมณี', 1, '2015-11-23', 1, '0802971297', 4);
INSERT INTO `outsrouce` VALUES (48, 'นางสาวกริชสุดา  จันทวี', 1, '2016-01-21', 1, '0999839556', 4);
INSERT INTO `outsrouce` VALUES (49, 'นางสาวขวัญทรัพย์ ดัดถุยวัฒน์', 1, '2016-06-16', 1, '0961620926', 4);
INSERT INTO `outsrouce` VALUES (50, 'นางสาววราภรณ์ บัวยัง', 1, '2016-07-04', 1, '0809642426', 4);
INSERT INTO `outsrouce` VALUES (51, 'นางสาวอรนุช วงษ์มี', 1, '2017-02-20', 1, '0997950363', 4);
INSERT INTO `outsrouce` VALUES (52, 'นางสาวเสาวรส แซ่ตัน (ก้อย)', 1, '2011-08-25', 1, '0886421489', 5);
INSERT INTO `outsrouce` VALUES (53, 'นางสาววัชรี  สาตจีนพงษ์', 1, '2013-09-09', 1, '0879793856', 5);
INSERT INTO `outsrouce` VALUES (54, 'นางสาวริศรา  ว่องไว (น้อย)', 1, '2012-11-12', 1, '0942437755', 6);
INSERT INTO `outsrouce` VALUES (55, 'นางสาวสุชาดา ไชยรัตน์', 1, '2017-02-01', 1, '0944861024', 6);
INSERT INTO `outsrouce` VALUES (56, 'นางสาววิมลรัตน์ สังฆทิพย์', 1, '2017-07-12', 1, '0954795085', 7);
INSERT INTO `outsrouce` VALUES (57, 'นางสาวมณฑิรา บางกรวย', 1, '2014-10-15', 1, '0888513752', 8);
INSERT INTO `outsrouce` VALUES (58, 'นางสาวรัตนาภรณ์ กระถินทอง', 1, '2015-07-27', 1, '0863804413', 8);
INSERT INTO `outsrouce` VALUES (59, 'นางสาวปิยะธิดา  หิรัญคำ', 1, '2017-03-01', 1, '0990955292', 8);
INSERT INTO `outsrouce` VALUES (60, 'นางสาววิกานดา  แซ่โค้ว', 1, '2015-03-03', 1, '0938211766', 8);
INSERT INTO `outsrouce` VALUES (61, 'นางสาวสุทธิดา  เนื่องสุมาลย์', 1, '2016-01-04', 1, '0920158043', 8);
INSERT INTO `outsrouce` VALUES (62, 'นายธนกร พันธมิตร', 1, '2017-07-12', 1, '0865191858', 8);
INSERT INTO `outsrouce` VALUES (63, 'นางสาวนัทธิดา คงสิทธิ์', 1, '2017-09-19', 1, '0956255698', 8);
INSERT INTO `outsrouce` VALUES (64, 'นางสาวณปภา   ธนานงค์รักษ์', 1, '2014-10-01', 1, '0825851230', 9);
INSERT INTO `outsrouce` VALUES (65, 'นางสาวกานดา วิเศษรัต', 1, '2015-10-19', 1, '0958489939', 9);
INSERT INTO `outsrouce` VALUES (66, 'นางสาวพรไพลิน สุตาสุข', 1, '2016-07-20', 1, '0927459211', 9);
INSERT INTO `outsrouce` VALUES (67, 'นางสาวฉัตริกา ศรีเมืองธน', 1, '2017-03-01', 1, '0996784372', 9);
INSERT INTO `outsrouce` VALUES (68, 'นายเฉลิมชัย ขจรเดชกูล', 1, '2017-05-15', 1, '0837592217', 9);
INSERT INTO `outsrouce` VALUES (69, 'นางสาวจุฑามาศ แสงนุ่มพงศ์', 1, '2015-10-11', 1, '0942321491', 10);
INSERT INTO `outsrouce` VALUES (70, 'นางสาวทัศนีย์ ศรีสุโพธิ์', 1, '2016-04-01', 1, '0928618064', 10);
INSERT INTO `outsrouce` VALUES (71, 'นางสาวศิริพร อินทวัฒ', 1, '2016-04-01', 1, '0998290234', 10);
INSERT INTO `outsrouce` VALUES (72, 'นายชนิตร์นันท์ ธรรมเนียมดี', 1, '2017-05-15', 1, '0945535206', 10);
INSERT INTO `outsrouce` VALUES (73, 'นางสาวสุธาวรรณ กลางพอน', 1, '2017-09-19', 1, '0837535194', 10);
INSERT INTO `outsrouce` VALUES (74, 'นายอานนท์ แสงสุขใส', 1, '2015-10-30', 1, '0844366083', 11);
INSERT INTO `outsrouce` VALUES (75, 'นายไทคม  จักกรม', 1, '2016-08-22', 1, '0950148249', 11);
INSERT INTO `outsrouce` VALUES (76, 'นางสาวมยุรีย์ เอื้อเฟื้อ', 1, '2017-03-17', 1, '0896630651', 12);
INSERT INTO `outsrouce` VALUES (77, 'นางสาวชรินทร์ทิพย์ ยอดยิ่ง', 1, '2017-06-05', 1, '0988626966', 13);
INSERT INTO `outsrouce` VALUES (78, 'นางสาวไอรดา ทิพชัย', 1, '2017-09-11', 1, '0959893471', 14);
INSERT INTO `outsrouce` VALUES (79, 'นางสาวสิริพร อิ่มใจ', 1, '2017-03-20', 1, '0934341149', 15);
INSERT INTO `outsrouce` VALUES (93, 'ddd', 1, '2017-02-14', 38, 'dd', 69);
INSERT INTO `outsrouce` VALUES (94, 'dasdas', 1, '2017-02-14', 2, 'dasdsada', 18);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status`  (
  `id_s` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `sum_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_s`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1326 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES (1258, 146, 1264);
INSERT INTO `status` VALUES (1259, 146, 1265);
INSERT INTO `status` VALUES (1260, 146, 1266);
INSERT INTO `status` VALUES (1261, 146, 1267);
INSERT INTO `status` VALUES (1262, 146, 1268);
INSERT INTO `status` VALUES (1263, 146, 1269);
INSERT INTO `status` VALUES (1264, 146, 1270);
INSERT INTO `status` VALUES (1265, 146, 1271);
INSERT INTO `status` VALUES (1266, 146, 1272);
INSERT INTO `status` VALUES (1267, 146, 1273);
INSERT INTO `status` VALUES (1268, 146, 1274);
INSERT INTO `status` VALUES (1269, 146, 1275);
INSERT INTO `status` VALUES (1270, 146, 1276);
INSERT INTO `status` VALUES (1271, 146, 1277);
INSERT INTO `status` VALUES (1272, 146, 1278);
INSERT INTO `status` VALUES (1273, 137, 1279);
INSERT INTO `status` VALUES (1274, 146, 1280);
INSERT INTO `status` VALUES (1275, 136, 1281);
INSERT INTO `status` VALUES (1276, 146, 1282);
INSERT INTO `status` VALUES (1277, 144, 1283);
INSERT INTO `status` VALUES (1278, 146, 1284);
INSERT INTO `status` VALUES (1279, 141, 1285);
INSERT INTO `status` VALUES (1280, 146, 1286);
INSERT INTO `status` VALUES (1281, 146, 1287);
INSERT INTO `status` VALUES (1282, 146, 1288);
INSERT INTO `status` VALUES (1283, 146, 1289);
INSERT INTO `status` VALUES (1284, 146, 1290);
INSERT INTO `status` VALUES (1285, 146, 1291);
INSERT INTO `status` VALUES (1286, 146, 1292);
INSERT INTO `status` VALUES (1287, 145, 1293);
INSERT INTO `status` VALUES (1288, 145, 1294);
INSERT INTO `status` VALUES (1289, 146, 1295);
INSERT INTO `status` VALUES (1290, 146, 1296);
INSERT INTO `status` VALUES (1291, 146, 1297);
INSERT INTO `status` VALUES (1292, 146, 1298);
INSERT INTO `status` VALUES (1293, 146, 1299);
INSERT INTO `status` VALUES (1294, 146, 1300);
INSERT INTO `status` VALUES (1295, 146, 1301);
INSERT INTO `status` VALUES (1296, 146, 1302);
INSERT INTO `status` VALUES (1297, 146, 1303);
INSERT INTO `status` VALUES (1298, 146, 1304);
INSERT INTO `status` VALUES (1299, 146, 1305);
INSERT INTO `status` VALUES (1300, 146, 1306);
INSERT INTO `status` VALUES (1301, 146, 1307);
INSERT INTO `status` VALUES (1302, 139, 1308);
INSERT INTO `status` VALUES (1303, 141, 1309);
INSERT INTO `status` VALUES (1304, 141, 1310);
INSERT INTO `status` VALUES (1305, 146, 1311);
INSERT INTO `status` VALUES (1306, 146, 1312);
INSERT INTO `status` VALUES (1307, 146, 1313);
INSERT INTO `status` VALUES (1308, 146, 1314);
INSERT INTO `status` VALUES (1309, 146, 1315);
INSERT INTO `status` VALUES (1310, 146, 1316);
INSERT INTO `status` VALUES (1311, 146, 1317);
INSERT INTO `status` VALUES (1312, 137, 1318);
INSERT INTO `status` VALUES (1313, 146, 1319);
INSERT INTO `status` VALUES (1314, 146, 1320);
INSERT INTO `status` VALUES (1315, 146, 1321);
INSERT INTO `status` VALUES (1316, 146, 1322);
INSERT INTO `status` VALUES (1317, 146, 1323);
INSERT INTO `status` VALUES (1318, 146, 1324);
INSERT INTO `status` VALUES (1319, 0, 1325);
INSERT INTO `status` VALUES (1320, 0, 1326);
INSERT INTO `status` VALUES (1321, 0, 1327);
INSERT INTO `status` VALUES (1322, 0, 1328);
INSERT INTO `status` VALUES (1323, 0, 1329);
INSERT INTO `status` VALUES (1324, 146, 1330);
INSERT INTO `status` VALUES (1325, 146, 1331);

-- ----------------------------
-- Table structure for status_oc
-- ----------------------------
DROP TABLE IF EXISTS `status_oc`;
CREATE TABLE `status_oc`  (
  `id_s` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `oc_id` int(10) UNSIGNED NOT NULL,
  `sum_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_s`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2626 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of status_oc
-- ----------------------------
INSERT INTO `status_oc` VALUES (2558, 35, 2577);
INSERT INTO `status_oc` VALUES (2559, 0, 2578);
INSERT INTO `status_oc` VALUES (2560, 0, 2579);
INSERT INTO `status_oc` VALUES (2561, 88, 2580);
INSERT INTO `status_oc` VALUES (2562, 88, 2581);
INSERT INTO `status_oc` VALUES (2563, 88, 2582);
INSERT INTO `status_oc` VALUES (2574, 32, 2593);
INSERT INTO `status_oc` VALUES (2575, 32, 2594);
INSERT INTO `status_oc` VALUES (2583, 73, 2602);
INSERT INTO `status_oc` VALUES (2584, 73, 2603);
INSERT INTO `status_oc` VALUES (2585, 73, 2604);
INSERT INTO `status_oc` VALUES (2586, 73, 2605);
INSERT INTO `status_oc` VALUES (2587, 73, 2606);
INSERT INTO `status_oc` VALUES (2588, 73, 2607);
INSERT INTO `status_oc` VALUES (2589, 73, 2608);
INSERT INTO `status_oc` VALUES (2590, 73, 2609);
INSERT INTO `status_oc` VALUES (2591, 73, 2610);
INSERT INTO `status_oc` VALUES (2592, 73, 2611);
INSERT INTO `status_oc` VALUES (2594, 73, 2613);
INSERT INTO `status_oc` VALUES (2595, 73, 2614);
INSERT INTO `status_oc` VALUES (2596, 73, 2615);
INSERT INTO `status_oc` VALUES (2597, 73, 2616);
INSERT INTO `status_oc` VALUES (2598, 73, 2617);
INSERT INTO `status_oc` VALUES (2599, 73, 2618);
INSERT INTO `status_oc` VALUES (2600, 73, 2619);
INSERT INTO `status_oc` VALUES (2601, 73, 2620);
INSERT INTO `status_oc` VALUES (2602, 73, 2621);
INSERT INTO `status_oc` VALUES (2604, 36, 2623);
INSERT INTO `status_oc` VALUES (2607, 35, 2626);
INSERT INTO `status_oc` VALUES (2624, 46, 2643);
INSERT INTO `status_oc` VALUES (2625, 46, 2644);

-- ----------------------------
-- Table structure for sum
-- ----------------------------
DROP TABLE IF EXISTS `sum`;
CREATE TABLE `sum`  (
  `sum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day_n` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ty_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `add_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sum_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1332 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sum
-- ----------------------------
INSERT INTO `sum` VALUES (1264, '480', 8, '2017-12-19', 119, '');
INSERT INTO `sum` VALUES (1265, '480', 8, '2017-12-20', 119, '');
INSERT INTO `sum` VALUES (1266, '480', 9, '2017-12-19', 119, '');
INSERT INTO `sum` VALUES (1267, '480', 9, '2017-12-20', 119, '');
INSERT INTO `sum` VALUES (1268, '480', 9, '2017-12-21', 119, '');
INSERT INTO `sum` VALUES (1269, '480', 10, '2017-12-19', 119, '');
INSERT INTO `sum` VALUES (1270, '480', 10, '2017-12-20', 119, '');
INSERT INTO `sum` VALUES (1271, '480', 10, '2017-12-21', 119, '');
INSERT INTO `sum` VALUES (1272, '480', 10, '2017-12-22', 119, '');
INSERT INTO `sum` VALUES (1273, '480', 11, '2017-12-19', 119, '');
INSERT INTO `sum` VALUES (1274, '480', 11, '2017-12-20', 119, '');
INSERT INTO `sum` VALUES (1275, '480', 11, '2017-12-21', 119, '');
INSERT INTO `sum` VALUES (1276, '480', 11, '2017-12-22', 119, '');
INSERT INTO `sum` VALUES (1277, '480', 11, '2017-12-25', 119, '');
INSERT INTO `sum` VALUES (1278, '30', 1, '2017-12-13', 119, '');
INSERT INTO `sum` VALUES (1279, '60', 1, '2017-12-13', 119, '');
INSERT INTO `sum` VALUES (1280, '114', 3, '2017-12-14', 119, '');
INSERT INTO `sum` VALUES (1281, '114', 3, '2017-12-14', 119, '');
INSERT INTO `sum` VALUES (1282, '95', 4, '2017-12-11', 119, '');
INSERT INTO `sum` VALUES (1283, '95', 4, '2017-12-11', 119, '');
INSERT INTO `sum` VALUES (1284, '240', 5, '2017-12-11', 119, '');
INSERT INTO `sum` VALUES (1285, '240', 5, '2017-12-11', 119, '');
INSERT INTO `sum` VALUES (1286, '240', 5, '2017-12-04', 119, '');
INSERT INTO `sum` VALUES (1287, '240', 6, '2017-12-04', 119, '');
INSERT INTO `sum` VALUES (1288, '480', 7, '2017-12-11', 119, '');
INSERT INTO `sum` VALUES (1289, '480', 7, '2017-12-12', 119, '');
INSERT INTO `sum` VALUES (1290, '480', 7, '2017-12-13', 119, '');
INSERT INTO `sum` VALUES (1291, '480', 7, '2017-12-14', 119, '');
INSERT INTO `sum` VALUES (1292, '480', 7, '2017-12-15', 119, '');
INSERT INTO `sum` VALUES (1293, '480', 11, '2017-12-20', 119, '');
INSERT INTO `sum` VALUES (1294, '480', 11, '2017-12-21', 119, '');
INSERT INTO `sum` VALUES (1295, '30', 1, '2018-01-16', 119, '');
INSERT INTO `sum` VALUES (1296, '1', 2, '2018-01-18', 119, '');
INSERT INTO `sum` VALUES (1297, '1', 2, '2018-01-17', 119, '');
INSERT INTO `sum` VALUES (1298, '480', 4, '2018-02-13', 119, '');
INSERT INTO `sum` VALUES (1299, '480', 4, '2018-02-14', 119, '');
INSERT INTO `sum` VALUES (1300, '480', 4, '2018-02-15', 119, '');
INSERT INTO `sum` VALUES (1301, '480', 6, '2018-02-21', 119, '');
INSERT INTO `sum` VALUES (1302, '480', 5, '2018-02-21', 119, '');
INSERT INTO `sum` VALUES (1303, '480', 5, '2018-02-22', 119, '');
INSERT INTO `sum` VALUES (1304, '30', 1, '2018-02-06', 119, '');
INSERT INTO `sum` VALUES (1305, '30', 1, '2018-02-06', 119, '');
INSERT INTO `sum` VALUES (1306, '2', 2, '2018-02-13', 119, '');
INSERT INTO `sum` VALUES (1307, '8', 3, '2018-02-21', 119, '');
INSERT INTO `sum` VALUES (1308, '1', 12, '2018-02-02', 139, NULL);
INSERT INTO `sum` VALUES (1309, '1', 12, '2018-02-01', 141, NULL);
INSERT INTO `sum` VALUES (1310, '1', 12, '2017-09-20', 141, NULL);
INSERT INTO `sum` VALUES (1311, '30', 1, '2018-02-01', 119, 'รถติด');
INSERT INTO `sum` VALUES (1312, '30', 1, '2018-02-20', 119, 'รถติด');
INSERT INTO `sum` VALUES (1313, '30', 1, '2018-03-27', 119, 'รถติด');
INSERT INTO `sum` VALUES (1314, '2', 2, '2018-02-14', 119, '');
INSERT INTO `sum` VALUES (1315, '480', 5, '2018-02-07', 119, '');
INSERT INTO `sum` VALUES (1316, '480', 5, '2018-02-08', 119, '');
INSERT INTO `sum` VALUES (1317, '480', 5, '2018-02-09', 119, '');
INSERT INTO `sum` VALUES (1318, '0.5', 12, '2018-02-08', 137, NULL);
INSERT INTO `sum` VALUES (1319, '30', 1, '2017-12-25', 119, '');
INSERT INTO `sum` VALUES (1320, '1', 2, '2018-07-12', 119, '');
INSERT INTO `sum` VALUES (1321, '360', 1, '2018-01-30', 119, '');
INSERT INTO `sum` VALUES (1322, '560', 1, '2018-02-14', 119, '');
INSERT INTO `sum` VALUES (1323, '480', 8, '2018-02-13', 119, '');
INSERT INTO `sum` VALUES (1324, '480', 8, '2018-02-15', 119, '');
INSERT INTO `sum` VALUES (1325, '30', 1, '2018-02-21', 119, '55');
INSERT INTO `sum` VALUES (1326, '30', 1, '2018-02-14', 119, '');
INSERT INTO `sum` VALUES (1327, '30', 1, '2018-02-21', 119, 'dd');
INSERT INTO `sum` VALUES (1328, '30', 1, '2018-02-21', 119, 'dd');
INSERT INTO `sum` VALUES (1329, '30', 1, '2018-02-21', 119, 'dd');
INSERT INTO `sum` VALUES (1330, '480', 11, '2018-02-15', 119, '111\r\n');
INSERT INTO `sum` VALUES (1331, '1', 2, '2018-02-14', 119, '');

-- ----------------------------
-- Table structure for sum_oc
-- ----------------------------
DROP TABLE IF EXISTS `sum_oc`;
CREATE TABLE `sum_oc`  (
  `sum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `day_n` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ty_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `add_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sum_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2645 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sum_oc
-- ----------------------------
INSERT INTO `sum_oc` VALUES (2574, '1', 2, '2018-02-20', 119, '');
INSERT INTO `sum_oc` VALUES (2577, '1', 2, '2018-02-22', 119, '');
INSERT INTO `sum_oc` VALUES (2578, '30', 3, '2018-02-14', 119, '');
INSERT INTO `sum_oc` VALUES (2579, '30', 3, '2018-02-15', 119, '');
INSERT INTO `sum_oc` VALUES (2580, '20', 3, '2018-02-14', 119, '');
INSERT INTO `sum_oc` VALUES (2581, '30', 1, '2018-02-08', 119, '');
INSERT INTO `sum_oc` VALUES (2582, '2', 2, '2018-02-15', 119, '');
INSERT INTO `sum_oc` VALUES (2593, '480', 7, '2018-02-07', 119, '');
INSERT INTO `sum_oc` VALUES (2594, '480', 7, '2018-02-23', 119, '');
INSERT INTO `sum_oc` VALUES (2602, '480', 9, '2018-02-01', 119, '');
INSERT INTO `sum_oc` VALUES (2603, '480', 9, '2018-02-02', 119, '');
INSERT INTO `sum_oc` VALUES (2604, '480', 9, '2018-02-03', 119, '');
INSERT INTO `sum_oc` VALUES (2605, '480', 9, '2018-02-04', 119, '');
INSERT INTO `sum_oc` VALUES (2606, '480', 9, '2018-02-05', 119, '');
INSERT INTO `sum_oc` VALUES (2607, '480', 9, '2018-02-06', 119, '');
INSERT INTO `sum_oc` VALUES (2608, '480', 9, '2018-02-07', 119, '');
INSERT INTO `sum_oc` VALUES (2609, '480', 9, '2018-02-08', 119, '');
INSERT INTO `sum_oc` VALUES (2610, '480', 9, '2018-02-09', 119, '');
INSERT INTO `sum_oc` VALUES (2611, '480', 9, '2018-02-10', 119, '');
INSERT INTO `sum_oc` VALUES (2613, '480', 9, '2018-02-02', 119, '');
INSERT INTO `sum_oc` VALUES (2614, '480', 9, '2018-02-03', 119, '');
INSERT INTO `sum_oc` VALUES (2615, '480', 9, '2018-02-04', 119, '');
INSERT INTO `sum_oc` VALUES (2616, '480', 9, '2018-02-05', 119, '');
INSERT INTO `sum_oc` VALUES (2617, '480', 9, '2018-02-06', 119, '');
INSERT INTO `sum_oc` VALUES (2618, '480', 9, '2018-02-07', 119, '');
INSERT INTO `sum_oc` VALUES (2619, '480', 9, '2018-02-08', 119, '');
INSERT INTO `sum_oc` VALUES (2620, '480', 9, '2018-02-09', 119, '');
INSERT INTO `sum_oc` VALUES (2621, '480', 9, '2018-02-10', 119, '');
INSERT INTO `sum_oc` VALUES (2623, '1', 12, '2018-02-14', 36, NULL);
INSERT INTO `sum_oc` VALUES (2626, '0.5', 12, '2018-02-01', 35, NULL);
INSERT INTO `sum_oc` VALUES (2643, '1', 12, '2018-02-16', 46, NULL);
INSERT INTO `sum_oc` VALUES (2644, '0.5', 12, '2018-02-07', 46, NULL);

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `ty_id` int(10) NOT NULL AUTO_INCREMENT,
  `ty_n` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ty_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (1, 'สาย');
INSERT INTO `type` VALUES (2, 'ลืมแสกน');
INSERT INTO `type` VALUES (3, 'ออกก่อน');
INSERT INTO `type` VALUES (4, 'ขาดงาน');
INSERT INTO `type` VALUES (5, 'ลาป่วย (ไม่มีใบรับร้องแพทย์)');
INSERT INTO `type` VALUES (6, 'ลาป่วย (มีใบรับร้องแพทย์)');
INSERT INTO `type` VALUES (7, 'ลาป่วย (จากการทำงาน)');
INSERT INTO `type` VALUES (8, 'ลากิจ (ได้ค่าจ้าง)');
INSERT INTO `type` VALUES (9, 'ลากิจ (ไม่ได้ค่าจ้าง)');
INSERT INTO `type` VALUES (10, 'ลากิจพิเศษ (ได้ค่าจ้าง)');
INSERT INTO `type` VALUES (11, 'ลาอื่นๆ');
INSERT INTO `type` VALUES (12, 'พักร้อน');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resign` int(2) UNSIGNED NOT NULL,
  `start` date NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 165 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (136, 'น.ส. ปิยะวรรณ อินทรตุล', 1, '2017-06-12', 3);
INSERT INTO `user` VALUES (137, 'น.ส. ภัทราพร สุขคุ้ม', 1, '2011-11-07', 4);
INSERT INTO `user` VALUES (138, 'นาง อรอุบล ภูครองทอง', 1, '2011-03-10', 5);
INSERT INTO `user` VALUES (139, 'นาย นภสกร ยืนยงทวีกร', 1, '2012-05-23', 4);
INSERT INTO `user` VALUES (140, 'น.ส. ขณัฎา พลเหตุ', 1, '2010-02-01', 5);
INSERT INTO `user` VALUES (141, 'นาง เกศรินทร์ ชูเชื้อ', 1, '2014-05-02', 4);
INSERT INTO `user` VALUES (142, 'น.ส. นิดา แซ่โค้ว', 1, '2015-02-02', 5);
INSERT INTO `user` VALUES (143, 'นาย ณัฐวุฒิ แดงอินทวัฒน์', 1, '2015-02-20', 5);
INSERT INTO `user` VALUES (144, 'น.ส. ฉวี สืบสำราญ', 1, '2015-11-02', 4);
INSERT INTO `user` VALUES (145, 'น.ส. ดลยา ตั้งจิตพิชิตภ้ย', 1, '2016-08-16', 5);
INSERT INTO `user` VALUES (146, 'นาย นิวัติ์ ไทยประถม', 1, '2017-05-11', 2);
INSERT INTO `user` VALUES (147, 'บาย ชยพล ไพบูลย์วงศ์', 1, '2017-09-01', 5);
INSERT INTO `user` VALUES (148, 'นาย ปัญญา ไข่ลือนาม', 1, '2017-10-24', 4);
INSERT INTO `user` VALUES (149, 'น.ส. นัทธิดา เขียวขจี', 1, '2015-10-19', 6);
INSERT INTO `user` VALUES (150, 'น.ส. ปณตพร ประเสริฐศรี', 1, '2015-07-19', 6);
INSERT INTO `user` VALUES (151, 'น.ส. นลิน วรฤทธิ์', 1, '2016-07-04', 6);
INSERT INTO `user` VALUES (152, 'น.ส. ภัทรา กาญจนกันติกะ', 1, '2017-08-01', 6);
INSERT INTO `user` VALUES (153, 'น.ส. อรอุมา สาหร่ายทอง', 1, '2007-07-24', 8);
INSERT INTO `user` VALUES (154, 'น.ส. ชไมพร บุดดี', 1, '2008-05-12', 8);
INSERT INTO `user` VALUES (155, 'น.ส. แสงเดือน จิตต์ประวัติ', 1, '2011-03-07', 8);
INSERT INTO `user` VALUES (156, 'น.ส. ขนิษฐา มะลิ', 1, '2013-09-02', 8);
INSERT INTO `user` VALUES (157, 'น.ส. วัลภา ตั้นศิริ ', 1, '2014-08-27', 7);
INSERT INTO `user` VALUES (158, 'น.ส. ฤทธิ์ฤดี เรืองฤทธ์', 1, '2015-01-24', 7);
INSERT INTO `user` VALUES (159, 'น.ส. นิรมล พรบรรเจิดศักดิ์', 1, '2016-01-18', 7);
INSERT INTO `user` VALUES (160, 'น.ส. วลัยลักษณ์ หนูขาว', 1, '2016-01-06', 7);
INSERT INTO `user` VALUES (162, 'น.ส. สุพรรณี หลีประเสริฐ', 1, '2017-05-22', 7);
INSERT INTO `user` VALUES (163, 'น.ส. นฤมล เจริญวัย', 1, '2010-09-01', 8);
INSERT INTO `user` VALUES (164, 'นาย ภัทรพงศ์ โต๊ะจงมล', 1, '2013-05-27', 8);

-- ----------------------------
-- Table structure for vacation_last_year
-- ----------------------------
DROP TABLE IF EXISTS `vacation_last_year`;
CREATE TABLE `vacation_last_year`  (
  `user_id` int(10) UNSIGNED NOT NULL,
  `va_num` int(10) UNSIGNED NOT NULL,
  `add_id` int(10) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of vacation_last_year
-- ----------------------------
INSERT INTO `vacation_last_year` VALUES (146, 0, 119);
INSERT INTO `vacation_last_year` VALUES (139, 0, 119);
INSERT INTO `vacation_last_year` VALUES (136, 0, 119);
INSERT INTO `vacation_last_year` VALUES (137, 0, 119);
INSERT INTO `vacation_last_year` VALUES (141, 0, 119);
INSERT INTO `vacation_last_year` VALUES (144, 0, 119);

SET FOREIGN_KEY_CHECKS = 1;
