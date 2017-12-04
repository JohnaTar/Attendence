/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : johnatar

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-04 13:29:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for companny
-- ----------------------------
DROP TABLE IF EXISTS `companny`;
CREATE TABLE `companny` (
  `co_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `co_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `first_y` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_y` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of companny
-- ----------------------------
INSERT INTO `companny` VALUES ('1', 'บริษัท เทเวศประกันภัย จำกัด (มหาชน)', '', '');
INSERT INTO `companny` VALUES ('2', 'บริษัท แอร์โค จำกัด', '10-01', '09-30');

-- ----------------------------
-- Table structure for dep
-- ----------------------------
DROP TABLE IF EXISTS `dep`;
CREATE TABLE `dep` (
  `dep_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dep
-- ----------------------------
INSERT INTO `dep` VALUES ('1', 'ฝ่ายบริหาร');
INSERT INTO `dep` VALUES ('2', 'ฝ่ายสารสนเทศ');
INSERT INTO `dep` VALUES ('3', 'PA & Marketing');
INSERT INTO `dep` VALUES ('4', 'ฝ่ายบัญชีและการเงิน');
INSERT INTO `dep` VALUES ('5', 'ฝ่ายบุคคลและธุรการ');
INSERT INTO `dep` VALUES ('6', 'Staff & Labor Outsourcing BKK');
INSERT INTO `dep` VALUES ('7', 'Staff & Labor Outsourcing CHON');
INSERT INTO `dep` VALUES ('8', 'Staff & Labor Outsourcing PTY');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dep_co_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `co_id` int(10) unsigned NOT NULL,
  `dep_co_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dep_co_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', '1', 'ผลิตกรมธรรม์');
INSERT INTO `department` VALUES ('2', '1', 'สินไหมรถยนต์');
INSERT INTO `department` VALUES ('3', '1', 'ธุรกิจเครือซีเมนต์ไทย');
INSERT INTO `department` VALUES ('4', '1', 'บัญชีและการเงิน');
INSERT INTO `department` VALUES ('5', '1', 'รับประกันภัยทรัพย์สิน');
INSERT INTO `department` VALUES ('6', '1', 'ธุรกิจสถาบันการเงิน');
INSERT INTO `department` VALUES ('7', '1', 'บริการลูกค้า');
INSERT INTO `department` VALUES ('8', '1', 'บริหารจัดการเบี้ยประกันภัย');
INSERT INTO `department` VALUES ('9', '1', 'ประกันทรัพย์สินทางทะเล');
INSERT INTO `department` VALUES ('10', '1', 'ธุรกิจตัวแทนและลูกค้ารายย่อย');
INSERT INTO `department` VALUES ('11', '1', 'ธุรกิจสาขาและพรบ.ขนส่ง');
INSERT INTO `department` VALUES ('12', '1', 'ธุรกิจพลังงาน');
INSERT INTO `department` VALUES ('13', '1', 'บุคคลและธุรการ');
INSERT INTO `department` VALUES ('14', '1', 'นิติกรรมประกันภัย');
INSERT INTO `department` VALUES ('15', '1', 'พิษณุโลก');
INSERT INTO `department` VALUES ('16', '2', 'Unitary Sale Support');
INSERT INTO `department` VALUES ('17', '2', 'Store Administrative');
INSERT INTO `department` VALUES ('18', '2', 'Store Keeper');
INSERT INTO `department` VALUES ('19', '2', 'Trane Part Sales Support');
INSERT INTO `department` VALUES ('20', '2', 'Marketing Officer');
INSERT INTO `department` VALUES ('21', '2', 'Applied Sales Support');
INSERT INTO `department` VALUES ('22', '2', 'Service Support');
INSERT INTO `department` VALUES ('23', '0', null);

-- ----------------------------
-- Table structure for outsrouce
-- ----------------------------
DROP TABLE IF EXISTS `outsrouce`;
CREATE TABLE `outsrouce` (
  `oc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oc_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `resign` int(10) unsigned NOT NULL DEFAULT '1',
  `start` date NOT NULL,
  `co_id` int(10) unsigned NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_co_id` int(10) NOT NULL,
  PRIMARY KEY (`oc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of outsrouce
-- ----------------------------
INSERT INTO `outsrouce` VALUES ('26', 'นายณัฐวุฒิ พิริยะสถิต   (แบงค์)', '1', '2011-01-25', '1', '0922628125', '1');
INSERT INTO `outsrouce` VALUES ('27', 'นายพิษณุ สุขสำราญ (ขวัญ)', '1', '2011-05-11', '1', '0984915370', '1');
INSERT INTO `outsrouce` VALUES ('28', 'นายจตุพร อาระวิล (หนึ่ง)', '1', '2011-07-04', '1', '0806037993', '1');
INSERT INTO `outsrouce` VALUES ('29', 'นายฉัตรชัย พลายงาม', '1', '2013-08-15', '1', '0908928997', '1');
INSERT INTO `outsrouce` VALUES ('30', 'นางสาวสุดารัตน์ นุ่มเกลี้ยง', '1', '2015-07-27', '1', '0616817156', '1');
INSERT INTO `outsrouce` VALUES ('31', 'นางสาวนันทวรรณ หมู่คำ', '1', '2015-10-19', '1', '0904182056', '1');
INSERT INTO `outsrouce` VALUES ('32', 'นายศรายุทธ  รักนาค', '1', '2016-04-18', '1', '0820862721', '1');
INSERT INTO `outsrouce` VALUES ('33', 'นายณัฐวุฒิ บุตรรัตน์', '1', '2016-08-18', '1', '0889197365', '1');
INSERT INTO `outsrouce` VALUES ('34', 'นางสาวดลพร สังข์นิ่ม', '1', '2016-08-29', '1', '0917267588', '1');
INSERT INTO `outsrouce` VALUES ('35', 'นางสาววิลาวัณย์ แพรช่วง', '1', '2017-09-11', '1', '0949257190', '1');
INSERT INTO `outsrouce` VALUES ('36', 'นางสาวกชวรรณ วรรณม่วง', '1', '2017-09-16', '1', '0956145559', '1');
INSERT INTO `outsrouce` VALUES ('37', 'นายศุภกรณ์ อรศรี (แบงค์)', '1', '2011-09-11', '1', '0942413067', '2');
INSERT INTO `outsrouce` VALUES ('38', 'นางสาวปาริฉัตร ไวยสุกรี', '1', '2016-04-18', '1', '0993204186', '2');
INSERT INTO `outsrouce` VALUES ('39', 'นางสาวโสธิดา ศิษฐ์เมธากุล', '1', '2016-08-03', '1', '0998184365', '2');
INSERT INTO `outsrouce` VALUES ('40', 'นายสิทธิพร  กิจสินธพชัย', '1', '2016-08-03', '1', '0967050691', '2');
INSERT INTO `outsrouce` VALUES ('41', 'นางธิดารัตน์ มีคำเพราะ', '1', '2017-05-03', '1', '0616368728', '2');
INSERT INTO `outsrouce` VALUES ('42', 'นางสาวขนิษฐา มะรุม', '1', '2017-08-01', '1', '0925292453', '2');
INSERT INTO `outsrouce` VALUES ('43', 'นางสาวปัทมวรรณ เสงี่ยมโคกกรวด', '1', '2011-08-01', '1', '0928144494', '3');
INSERT INTO `outsrouce` VALUES ('44', 'นางสาวจุฬารัตน์ ภูการุณ', '1', '2017-06-05', '1', '0915952212', '3');
INSERT INTO `outsrouce` VALUES ('45', 'นางสาวพรกนก ตุ้มทอง', '1', '2017-10-02', '1', '0642805769', '2');
INSERT INTO `outsrouce` VALUES ('46', 'นางสาววารินธรณ์  สังข์ทอง', '1', '2015-09-01', '1', '0836065650', '4');
INSERT INTO `outsrouce` VALUES ('47', 'นางสาวศิริกาญจน์  ศุภมณี', '1', '2015-11-23', '1', '0802971297', '4');
INSERT INTO `outsrouce` VALUES ('48', 'นางสาวกริชสุดา  จันทวี', '1', '2016-01-21', '1', '0999839556', '4');
INSERT INTO `outsrouce` VALUES ('49', 'นางสาวขวัญทรัพย์ ดัดถุยวัฒน์', '1', '2016-06-16', '1', '0961620926', '4');
INSERT INTO `outsrouce` VALUES ('50', 'นางสาววราภรณ์ บัวยัง', '1', '2016-07-04', '1', '0809642426', '4');
INSERT INTO `outsrouce` VALUES ('51', 'นางสาวอรนุช วงษ์มี', '1', '2017-02-20', '1', '0997950363', '4');
INSERT INTO `outsrouce` VALUES ('52', 'นางสาวเสาวรส แซ่ตัน (ก้อย)', '1', '2011-08-25', '1', '0886421489', '5');
INSERT INTO `outsrouce` VALUES ('53', 'นางสาววัชรี  สาตจีนพงษ์', '1', '2013-09-09', '1', '0879793856', '5');
INSERT INTO `outsrouce` VALUES ('54', 'นางสาวริศรา  ว่องไว (น้อย)', '1', '2012-11-12', '1', '0942437755', '6');
INSERT INTO `outsrouce` VALUES ('55', 'นางสาวสุชาดา ไชยรัตน์', '1', '2017-02-01', '1', '0944861024', '6');
INSERT INTO `outsrouce` VALUES ('56', 'นางสาววิมลรัตน์ สังฆทิพย์', '1', '2017-07-12', '1', '0954795085', '7');
INSERT INTO `outsrouce` VALUES ('57', 'นางสาวมณฑิรา บางกรวย', '1', '2014-10-15', '1', '0888513752', '8');
INSERT INTO `outsrouce` VALUES ('58', 'นางสาวรัตนาภรณ์ กระถินทอง', '1', '2015-07-27', '1', '0863804413', '8');
INSERT INTO `outsrouce` VALUES ('59', 'นางสาวปิยะธิดา  หิรัญคำ', '1', '2017-03-01', '1', '0990955292', '8');
INSERT INTO `outsrouce` VALUES ('60', 'นางสาววิกานดา  แซ่โค้ว', '1', '2015-03-03', '1', '0938211766', '8');
INSERT INTO `outsrouce` VALUES ('61', 'นางสาวสุทธิดา  เนื่องสุมาลย์', '1', '2016-01-04', '1', '0920158043', '8');
INSERT INTO `outsrouce` VALUES ('62', 'นายธนกร พันธมิตร', '1', '2017-07-12', '1', '0865191858', '8');
INSERT INTO `outsrouce` VALUES ('63', 'นางสาวนัทธิดา คงสิทธิ์', '1', '2017-09-19', '1', '0956255698', '8');
INSERT INTO `outsrouce` VALUES ('64', 'นางสาวณปภา   ธนานงค์รักษ์', '1', '2014-10-01', '1', '0825851230', '9');
INSERT INTO `outsrouce` VALUES ('65', 'นางสาวกานดา วิเศษรัต', '1', '2015-10-19', '1', '0958489939', '9');
INSERT INTO `outsrouce` VALUES ('66', 'นางสาวพรไพลิน สุตาสุข', '1', '2016-07-20', '1', '0927459211', '9');
INSERT INTO `outsrouce` VALUES ('67', 'นางสาวฉัตริกา ศรีเมืองธน', '1', '2017-03-01', '1', '0996784372', '9');
INSERT INTO `outsrouce` VALUES ('68', 'นายเฉลิมชัย ขจรเดชกูล', '1', '2017-05-15', '1', '0837592217', '9');
INSERT INTO `outsrouce` VALUES ('69', 'นางสาวจุฑามาศ แสงนุ่มพงศ์', '1', '2015-10-11', '1', '0942321491', '10');
INSERT INTO `outsrouce` VALUES ('70', 'นางสาวทัศนีย์ ศรีสุโพธิ์', '1', '2016-04-01', '1', '0928618064', '10');
INSERT INTO `outsrouce` VALUES ('71', 'นางสาวศิริพร อินทวัฒ', '1', '2016-04-01', '1', '0998290234', '10');
INSERT INTO `outsrouce` VALUES ('72', 'นายชนิตร์นันท์ ธรรมเนียมดี', '1', '2017-05-15', '1', '0945535206', '10');
INSERT INTO `outsrouce` VALUES ('73', 'นางสาวสุธาวรรณ กลางพอน', '1', '2017-09-19', '1', '0837535194', '10');
INSERT INTO `outsrouce` VALUES ('74', 'นายอานนท์ แสงสุขใส', '1', '2015-10-30', '1', '0844366083', '11');
INSERT INTO `outsrouce` VALUES ('75', 'นายไทคม  จักกรม', '1', '2016-08-22', '1', '0950148249', '11');
INSERT INTO `outsrouce` VALUES ('76', 'นางสาวมยุรีย์ เอื้อเฟื้อ', '1', '2017-03-17', '1', '0896630651', '12');
INSERT INTO `outsrouce` VALUES ('77', 'นางสาวชรินทร์ทิพย์ ยอดยิ่ง', '1', '2017-06-05', '1', '0988626966', '13');
INSERT INTO `outsrouce` VALUES ('78', 'นางสาวไอรดา ทิพชัย', '1', '2017-09-11', '1', '0959893471', '14');
INSERT INTO `outsrouce` VALUES ('79', 'นางสาวสิริพร อิ่มใจ', '1', '2017-03-20', '1', '0934341149', '15');
INSERT INTO `outsrouce` VALUES ('86', 'ต้านะจะ', '1', '2016-03-15', '2', '0944174005', '16');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id_s` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `sum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=1057 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('949', '144', '955');
INSERT INTO `status` VALUES ('950', '144', '956');
INSERT INTO `status` VALUES ('951', '144', '957');
INSERT INTO `status` VALUES ('952', '144', '958');
INSERT INTO `status` VALUES ('953', '144', '959');
INSERT INTO `status` VALUES ('954', '144', '960');
INSERT INTO `status` VALUES ('955', '144', '961');
INSERT INTO `status` VALUES ('956', '144', '962');
INSERT INTO `status` VALUES ('957', '144', '963');
INSERT INTO `status` VALUES ('958', '137', '964');
INSERT INTO `status` VALUES ('959', '137', '965');
INSERT INTO `status` VALUES ('960', '137', '966');
INSERT INTO `status` VALUES ('961', '137', '967');
INSERT INTO `status` VALUES ('962', '137', '968');
INSERT INTO `status` VALUES ('963', '137', '969');
INSERT INTO `status` VALUES ('964', '137', '970');
INSERT INTO `status` VALUES ('965', '137', '971');
INSERT INTO `status` VALUES ('966', '137', '972');
INSERT INTO `status` VALUES ('967', '137', '973');
INSERT INTO `status` VALUES ('968', '137', '974');
INSERT INTO `status` VALUES ('969', '141', '975');
INSERT INTO `status` VALUES ('970', '141', '976');
INSERT INTO `status` VALUES ('971', '141', '977');
INSERT INTO `status` VALUES ('972', '141', '978');
INSERT INTO `status` VALUES ('973', '141', '979');
INSERT INTO `status` VALUES ('974', '141', '980');
INSERT INTO `status` VALUES ('975', '141', '981');
INSERT INTO `status` VALUES ('976', '141', '982');
INSERT INTO `status` VALUES ('984', '143', '990');
INSERT INTO `status` VALUES ('985', '143', '991');
INSERT INTO `status` VALUES ('986', '143', '992');
INSERT INTO `status` VALUES ('987', '143', '993');
INSERT INTO `status` VALUES ('988', '143', '994');
INSERT INTO `status` VALUES ('989', '143', '995');
INSERT INTO `status` VALUES ('991', '143', '997');
INSERT INTO `status` VALUES ('992', '143', '998');
INSERT INTO `status` VALUES ('993', '143', '999');
INSERT INTO `status` VALUES ('994', '143', '1000');
INSERT INTO `status` VALUES ('995', '143', '1001');
INSERT INTO `status` VALUES ('996', '143', '1002');
INSERT INTO `status` VALUES ('997', '145', '1003');
INSERT INTO `status` VALUES ('998', '145', '1004');
INSERT INTO `status` VALUES ('999', '142', '1005');
INSERT INTO `status` VALUES ('1000', '142', '1006');
INSERT INTO `status` VALUES ('1001', '142', '1007');
INSERT INTO `status` VALUES ('1002', '142', '1008');
INSERT INTO `status` VALUES ('1003', '142', '1009');
INSERT INTO `status` VALUES ('1004', '142', '1010');
INSERT INTO `status` VALUES ('1005', '142', '1011');
INSERT INTO `status` VALUES ('1006', '142', '1012');
INSERT INTO `status` VALUES ('1007', '142', '1013');
INSERT INTO `status` VALUES ('1008', '142', '1014');
INSERT INTO `status` VALUES ('1009', '142', '1015');
INSERT INTO `status` VALUES ('1010', '142', '1016');
INSERT INTO `status` VALUES ('1011', '142', '1017');
INSERT INTO `status` VALUES ('1012', '138', '1018');
INSERT INTO `status` VALUES ('1013', '138', '1019');
INSERT INTO `status` VALUES ('1014', '138', '1020');
INSERT INTO `status` VALUES ('1015', '138', '1021');
INSERT INTO `status` VALUES ('1016', '138', '1022');
INSERT INTO `status` VALUES ('1017', '138', '1023');
INSERT INTO `status` VALUES ('1018', '138', '1024');
INSERT INTO `status` VALUES ('1019', '138', '1025');
INSERT INTO `status` VALUES ('1020', '142', '1026');
INSERT INTO `status` VALUES ('1021', '138', '1027');
INSERT INTO `status` VALUES ('1022', '138', '1028');
INSERT INTO `status` VALUES ('1023', '138', '1029');
INSERT INTO `status` VALUES ('1024', '138', '1030');
INSERT INTO `status` VALUES ('1025', '138', '1031');
INSERT INTO `status` VALUES ('1026', '140', '1032');
INSERT INTO `status` VALUES ('1027', '140', '1033');
INSERT INTO `status` VALUES ('1028', '140', '1034');
INSERT INTO `status` VALUES ('1029', '140', '1035');
INSERT INTO `status` VALUES ('1030', '140', '1036');
INSERT INTO `status` VALUES ('1031', '140', '1037');
INSERT INTO `status` VALUES ('1032', '140', '1038');
INSERT INTO `status` VALUES ('1033', '140', '1039');
INSERT INTO `status` VALUES ('1034', '140', '1040');
INSERT INTO `status` VALUES ('1035', '140', '1041');
INSERT INTO `status` VALUES ('1036', '140', '1042');
INSERT INTO `status` VALUES ('1037', '149', '1043');
INSERT INTO `status` VALUES ('1038', '149', '1044');
INSERT INTO `status` VALUES ('1039', '149', '1045');
INSERT INTO `status` VALUES ('1040', '149', '1046');
INSERT INTO `status` VALUES ('1041', '149', '1047');
INSERT INTO `status` VALUES ('1042', '149', '1048');
INSERT INTO `status` VALUES ('1043', '149', '1049');
INSERT INTO `status` VALUES ('1044', '149', '1050');
INSERT INTO `status` VALUES ('1045', '149', '1051');
INSERT INTO `status` VALUES ('1046', '150', '1052');
INSERT INTO `status` VALUES ('1047', '150', '1053');
INSERT INTO `status` VALUES ('1048', '150', '1054');
INSERT INTO `status` VALUES ('1049', '150', '1055');
INSERT INTO `status` VALUES ('1050', '150', '1056');
INSERT INTO `status` VALUES ('1051', '150', '1057');
INSERT INTO `status` VALUES ('1052', '150', '1058');
INSERT INTO `status` VALUES ('1053', '150', '1059');
INSERT INTO `status` VALUES ('1054', '150', '1060');
INSERT INTO `status` VALUES ('1055', '150', '1061');
INSERT INTO `status` VALUES ('1056', '151', '1062');

-- ----------------------------
-- Table structure for status_oc
-- ----------------------------
DROP TABLE IF EXISTS `status_oc`;
CREATE TABLE `status_oc` (
  `id_s` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oc_id` int(10) unsigned NOT NULL,
  `sum_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=InnoDB AUTO_INCREMENT=2546 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of status_oc
-- ----------------------------
INSERT INTO `status_oc` VALUES ('2403', '34', '2416');
INSERT INTO `status_oc` VALUES ('2405', '36', '2418');
INSERT INTO `status_oc` VALUES ('2406', '36', '2419');
INSERT INTO `status_oc` VALUES ('2407', '36', '2420');
INSERT INTO `status_oc` VALUES ('2408', '36', '2421');
INSERT INTO `status_oc` VALUES ('2409', '36', '2422');
INSERT INTO `status_oc` VALUES ('2411', '86', '2424');
INSERT INTO `status_oc` VALUES ('2412', '86', '2425');
INSERT INTO `status_oc` VALUES ('2413', '86', '2426');
INSERT INTO `status_oc` VALUES ('2414', '86', '2427');
INSERT INTO `status_oc` VALUES ('2415', '86', '2428');
INSERT INTO `status_oc` VALUES ('2416', '86', '2429');
INSERT INTO `status_oc` VALUES ('2417', '86', '2430');
INSERT INTO `status_oc` VALUES ('2418', '86', '2431');
INSERT INTO `status_oc` VALUES ('2419', '28', '2432');
INSERT INTO `status_oc` VALUES ('2420', '28', '2433');
INSERT INTO `status_oc` VALUES ('2421', '28', '2434');
INSERT INTO `status_oc` VALUES ('2422', '28', '2435');
INSERT INTO `status_oc` VALUES ('2423', '28', '2436');
INSERT INTO `status_oc` VALUES ('2424', '28', '2437');
INSERT INTO `status_oc` VALUES ('2425', '28', '2438');
INSERT INTO `status_oc` VALUES ('2426', '28', '2439');
INSERT INTO `status_oc` VALUES ('2427', '28', '2440');
INSERT INTO `status_oc` VALUES ('2428', '28', '2441');
INSERT INTO `status_oc` VALUES ('2429', '28', '2442');
INSERT INTO `status_oc` VALUES ('2430', '28', '2443');
INSERT INTO `status_oc` VALUES ('2431', '28', '2444');
INSERT INTO `status_oc` VALUES ('2432', '28', '2445');
INSERT INTO `status_oc` VALUES ('2433', '28', '2446');
INSERT INTO `status_oc` VALUES ('2434', '28', '2447');
INSERT INTO `status_oc` VALUES ('2435', '28', '2448');
INSERT INTO `status_oc` VALUES ('2436', '28', '2449');
INSERT INTO `status_oc` VALUES ('2437', '28', '2450');
INSERT INTO `status_oc` VALUES ('2438', '28', '2451');
INSERT INTO `status_oc` VALUES ('2439', '28', '2452');
INSERT INTO `status_oc` VALUES ('2440', '28', '2453');
INSERT INTO `status_oc` VALUES ('2441', '28', '2454');
INSERT INTO `status_oc` VALUES ('2442', '28', '2455');
INSERT INTO `status_oc` VALUES ('2443', '28', '2456');
INSERT INTO `status_oc` VALUES ('2444', '28', '2457');
INSERT INTO `status_oc` VALUES ('2445', '28', '2458');
INSERT INTO `status_oc` VALUES ('2446', '28', '2459');
INSERT INTO `status_oc` VALUES ('2447', '28', '2460');
INSERT INTO `status_oc` VALUES ('2448', '28', '2461');
INSERT INTO `status_oc` VALUES ('2449', '31', '2462');
INSERT INTO `status_oc` VALUES ('2450', '31', '2463');
INSERT INTO `status_oc` VALUES ('2451', '31', '2464');
INSERT INTO `status_oc` VALUES ('2452', '31', '2465');
INSERT INTO `status_oc` VALUES ('2453', '31', '2466');
INSERT INTO `status_oc` VALUES ('2454', '31', '2467');
INSERT INTO `status_oc` VALUES ('2455', '31', '2468');
INSERT INTO `status_oc` VALUES ('2456', '31', '2469');
INSERT INTO `status_oc` VALUES ('2457', '31', '2470');
INSERT INTO `status_oc` VALUES ('2458', '31', '2471');
INSERT INTO `status_oc` VALUES ('2459', '31', '2472');
INSERT INTO `status_oc` VALUES ('2460', '31', '2473');
INSERT INTO `status_oc` VALUES ('2461', '31', '2474');
INSERT INTO `status_oc` VALUES ('2462', '31', '2475');
INSERT INTO `status_oc` VALUES ('2463', '31', '2476');
INSERT INTO `status_oc` VALUES ('2464', '31', '2477');
INSERT INTO `status_oc` VALUES ('2465', '31', '2478');
INSERT INTO `status_oc` VALUES ('2466', '31', '2479');
INSERT INTO `status_oc` VALUES ('2467', '31', '2480');
INSERT INTO `status_oc` VALUES ('2468', '31', '2481');
INSERT INTO `status_oc` VALUES ('2469', '31', '2482');
INSERT INTO `status_oc` VALUES ('2470', '31', '2483');
INSERT INTO `status_oc` VALUES ('2471', '31', '2484');
INSERT INTO `status_oc` VALUES ('2472', '31', '2485');
INSERT INTO `status_oc` VALUES ('2473', '31', '2486');
INSERT INTO `status_oc` VALUES ('2474', '31', '2487');
INSERT INTO `status_oc` VALUES ('2475', '31', '2488');
INSERT INTO `status_oc` VALUES ('2476', '31', '2489');
INSERT INTO `status_oc` VALUES ('2477', '31', '2490');
INSERT INTO `status_oc` VALUES ('2478', '31', '2491');
INSERT INTO `status_oc` VALUES ('2479', '31', '2492');
INSERT INTO `status_oc` VALUES ('2480', '29', '2493');
INSERT INTO `status_oc` VALUES ('2481', '29', '2494');
INSERT INTO `status_oc` VALUES ('2482', '29', '2495');
INSERT INTO `status_oc` VALUES ('2483', '29', '2496');
INSERT INTO `status_oc` VALUES ('2484', '29', '2497');
INSERT INTO `status_oc` VALUES ('2485', '29', '2498');
INSERT INTO `status_oc` VALUES ('2486', '29', '2499');
INSERT INTO `status_oc` VALUES ('2487', '29', '2500');
INSERT INTO `status_oc` VALUES ('2488', '29', '2501');
INSERT INTO `status_oc` VALUES ('2489', '29', '2502');
INSERT INTO `status_oc` VALUES ('2490', '29', '2503');
INSERT INTO `status_oc` VALUES ('2491', '29', '2504');
INSERT INTO `status_oc` VALUES ('2492', '29', '2505');
INSERT INTO `status_oc` VALUES ('2493', '29', '2506');
INSERT INTO `status_oc` VALUES ('2494', '29', '2507');
INSERT INTO `status_oc` VALUES ('2495', '29', '2508');
INSERT INTO `status_oc` VALUES ('2496', '29', '2509');
INSERT INTO `status_oc` VALUES ('2497', '29', '2510');
INSERT INTO `status_oc` VALUES ('2498', '29', '2511');
INSERT INTO `status_oc` VALUES ('2499', '29', '2512');
INSERT INTO `status_oc` VALUES ('2500', '29', '2513');
INSERT INTO `status_oc` VALUES ('2501', '29', '2514');
INSERT INTO `status_oc` VALUES ('2502', '29', '2515');
INSERT INTO `status_oc` VALUES ('2503', '29', '2516');
INSERT INTO `status_oc` VALUES ('2504', '29', '2517');
INSERT INTO `status_oc` VALUES ('2505', '29', '2518');
INSERT INTO `status_oc` VALUES ('2506', '29', '2519');
INSERT INTO `status_oc` VALUES ('2507', '29', '2520');
INSERT INTO `status_oc` VALUES ('2508', '29', '2521');
INSERT INTO `status_oc` VALUES ('2509', '29', '2522');
INSERT INTO `status_oc` VALUES ('2510', '29', '2523');
INSERT INTO `status_oc` VALUES ('2511', '29', '2524');
INSERT INTO `status_oc` VALUES ('2512', '29', '2525');
INSERT INTO `status_oc` VALUES ('2513', '29', '2526');
INSERT INTO `status_oc` VALUES ('2514', '29', '2527');
INSERT INTO `status_oc` VALUES ('2515', '29', '2528');
INSERT INTO `status_oc` VALUES ('2516', '29', '2529');
INSERT INTO `status_oc` VALUES ('2517', '29', '2530');
INSERT INTO `status_oc` VALUES ('2518', '29', '2531');
INSERT INTO `status_oc` VALUES ('2519', '29', '2532');
INSERT INTO `status_oc` VALUES ('2520', '29', '2533');
INSERT INTO `status_oc` VALUES ('2521', '29', '2534');
INSERT INTO `status_oc` VALUES ('2522', '29', '2535');
INSERT INTO `status_oc` VALUES ('2523', '29', '2536');
INSERT INTO `status_oc` VALUES ('2524', '29', '2537');
INSERT INTO `status_oc` VALUES ('2525', '29', '2538');
INSERT INTO `status_oc` VALUES ('2526', '29', '2539');
INSERT INTO `status_oc` VALUES ('2527', '29', '2540');
INSERT INTO `status_oc` VALUES ('2528', '29', '2541');
INSERT INTO `status_oc` VALUES ('2529', '29', '2542');
INSERT INTO `status_oc` VALUES ('2530', '29', '2543');
INSERT INTO `status_oc` VALUES ('2531', '29', '2544');
INSERT INTO `status_oc` VALUES ('2532', '29', '2545');
INSERT INTO `status_oc` VALUES ('2533', '29', '2546');
INSERT INTO `status_oc` VALUES ('2534', '29', '2547');
INSERT INTO `status_oc` VALUES ('2535', '29', '2548');
INSERT INTO `status_oc` VALUES ('2536', '29', '2549');
INSERT INTO `status_oc` VALUES ('2537', '29', '2550');
INSERT INTO `status_oc` VALUES ('2538', '29', '2551');
INSERT INTO `status_oc` VALUES ('2539', '29', '2552');
INSERT INTO `status_oc` VALUES ('2540', '29', '2553');
INSERT INTO `status_oc` VALUES ('2541', '29', '2554');
INSERT INTO `status_oc` VALUES ('2542', '32', '2555');
INSERT INTO `status_oc` VALUES ('2543', '32', '2556');
INSERT INTO `status_oc` VALUES ('2544', '32', '2557');
INSERT INTO `status_oc` VALUES ('2545', '32', '2558');

-- ----------------------------
-- Table structure for sum
-- ----------------------------
DROP TABLE IF EXISTS `sum`;
CREATE TABLE `sum` (
  `sum_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_n` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ty_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `add_id` int(10) unsigned NOT NULL,
  `comment` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1063 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sum
-- ----------------------------
INSERT INTO `sum` VALUES ('955', '1', '5', '2016-10-20', '144', null);
INSERT INTO `sum` VALUES ('956', '1', '5', '2016-12-29', '144', null);
INSERT INTO `sum` VALUES ('957', '1', '5', '2017-01-03', '144', null);
INSERT INTO `sum` VALUES ('958', '1', '5', '2017-01-04', '144', null);
INSERT INTO `sum` VALUES ('959', '1', '5', '2017-02-25', '144', null);
INSERT INTO `sum` VALUES ('960', '1', '5', '2017-05-22', '144', null);
INSERT INTO `sum` VALUES ('961', '1', '5', '2017-05-23', '144', null);
INSERT INTO `sum` VALUES ('962', '1', '5', '2017-09-22', '144', null);
INSERT INTO `sum` VALUES ('963', '1', '5', '2017-09-29', '144', null);
INSERT INTO `sum` VALUES ('964', '8', '5', '2016-10-20', '137', null);
INSERT INTO `sum` VALUES ('965', '1', '5', '2017-03-20', '137', null);
INSERT INTO `sum` VALUES ('966', '1', '5', '2017-04-10', '137', null);
INSERT INTO `sum` VALUES ('967', '1', '5', '2017-04-11', '137', null);
INSERT INTO `sum` VALUES ('968', '1', '5', '2017-04-12', '137', null);
INSERT INTO `sum` VALUES ('969', '1', '5', '2017-05-08', '137', null);
INSERT INTO `sum` VALUES ('970', '1', '5', '2017-05-09', '137', null);
INSERT INTO `sum` VALUES ('971', '1', '5', '2017-06-05', '137', null);
INSERT INTO `sum` VALUES ('972', '1', '5', '2017-08-15', '137', null);
INSERT INTO `sum` VALUES ('973', '1', '5', '2017-08-15', '137', null);
INSERT INTO `sum` VALUES ('974', '1', '5', '2017-09-11', '137', null);
INSERT INTO `sum` VALUES ('975', '7', '5', '2016-10-13', '141', null);
INSERT INTO `sum` VALUES ('976', '1', '5', '2017-01-27', '141', null);
INSERT INTO `sum` VALUES ('977', '1', '5', '2017-04-11', '141', null);
INSERT INTO `sum` VALUES ('978', '1', '5', '2017-04-12', '141', null);
INSERT INTO `sum` VALUES ('979', '1', '5', '2017-05-27', '141', null);
INSERT INTO `sum` VALUES ('980', '1', '5', '2017-06-02', '141', null);
INSERT INTO `sum` VALUES ('981', '1', '5', '2017-09-05', '141', null);
INSERT INTO `sum` VALUES ('982', '1', '5', '2017-09-11', '141', null);
INSERT INTO `sum` VALUES ('990', '1', '5', '2016-04-20', '143', null);
INSERT INTO `sum` VALUES ('991', '1', '5', '2016-05-18', '143', null);
INSERT INTO `sum` VALUES ('992', '1', '5', '2016-06-13', '143', null);
INSERT INTO `sum` VALUES ('993', '1', '5', '2016-07-20', '143', null);
INSERT INTO `sum` VALUES ('994', '0.5', '5', '2016-08-10', '143', null);
INSERT INTO `sum` VALUES ('995', '0.5', '5', '2016-11-26', '143', null);
INSERT INTO `sum` VALUES ('997', '1', '5', '2017-04-22', '143', null);
INSERT INTO `sum` VALUES ('998', '1', '5', '2017-06-12', '143', null);
INSERT INTO `sum` VALUES ('999', '1', '5', '2017-07-31', '143', null);
INSERT INTO `sum` VALUES ('1000', '1', '5', '2017-09-23', '143', null);
INSERT INTO `sum` VALUES ('1001', '1', '5', '2017-10-16', '143', null);
INSERT INTO `sum` VALUES ('1002', '1', '5', '2017-11-27', '143', null);
INSERT INTO `sum` VALUES ('1003', '1', '5', '2017-12-25', '145', null);
INSERT INTO `sum` VALUES ('1004', '1', '5', '2017-11-07', '145', null);
INSERT INTO `sum` VALUES ('1005', '1', '5', '2016-05-06', '142', null);
INSERT INTO `sum` VALUES ('1006', '0.5', '5', '2016-05-27', '142', null);
INSERT INTO `sum` VALUES ('1007', '0.5', '5', '2016-06-01', '142', null);
INSERT INTO `sum` VALUES ('1008', '1', '5', '2016-07-23', '142', null);
INSERT INTO `sum` VALUES ('1010', '1', '5', '2016-09-05', '142', null);
INSERT INTO `sum` VALUES ('1011', '1', '5', '2016-09-06', '142', null);
INSERT INTO `sum` VALUES ('1012', '1', '5', '2016-12-27', '142', null);
INSERT INTO `sum` VALUES ('1013', '1', '5', '2017-03-06', '142', null);
INSERT INTO `sum` VALUES ('1014', '1', '5', '2017-05-08', '142', null);
INSERT INTO `sum` VALUES ('1015', '1', '5', '2017-05-23', '142', null);
INSERT INTO `sum` VALUES ('1016', '1', '5', '2017-06-08', '142', null);
INSERT INTO `sum` VALUES ('1017', '1', '5', '2017-12-04', '142', null);
INSERT INTO `sum` VALUES ('1018', '8', '5', '2016-12-14', '138', null);
INSERT INTO `sum` VALUES ('1019', '1', '5', '2017-01-03', '138', null);
INSERT INTO `sum` VALUES ('1020', '1', '5', '2017-01-04', '138', null);
INSERT INTO `sum` VALUES ('1021', '1', '5', '2017-02-01', '138', null);
INSERT INTO `sum` VALUES ('1022', '1', '5', '2017-02-25', '138', null);
INSERT INTO `sum` VALUES ('1023', '1', '5', '2017-03-13', '138', null);
INSERT INTO `sum` VALUES ('1024', '1', '5', '2017-04-12', '138', null);
INSERT INTO `sum` VALUES ('1025', '1', '5', '2017-07-07', '138', null);
INSERT INTO `sum` VALUES ('1026', '0.5', '5', '2017-07-18', '142', null);
INSERT INTO `sum` VALUES ('1027', '0.5', '5', '2017-07-18', '138', null);
INSERT INTO `sum` VALUES ('1028', '1', '5', '2017-08-26', '138', null);
INSERT INTO `sum` VALUES ('1029', '0.5', '5', '2017-09-15', '138', null);
INSERT INTO `sum` VALUES ('1030', '0.5', '5', '2017-11-03', '138', null);
INSERT INTO `sum` VALUES ('1031', '0.5', '5', '2017-11-17', '138', null);
INSERT INTO `sum` VALUES ('1032', '8', '5', '2016-12-01', '140', null);
INSERT INTO `sum` VALUES ('1033', '1', '5', '2017-01-03', '140', null);
INSERT INTO `sum` VALUES ('1034', '1', '5', '2017-01-20', '140', null);
INSERT INTO `sum` VALUES ('1035', '1', '5', '2017-03-06', '140', null);
INSERT INTO `sum` VALUES ('1036', '1', '5', '2017-04-04', '140', null);
INSERT INTO `sum` VALUES ('1037', '1', '5', '2017-04-05', '140', null);
INSERT INTO `sum` VALUES ('1038', '1', '5', '2017-04-07', '140', null);
INSERT INTO `sum` VALUES ('1039', '1', '5', '2017-07-11', '140', null);
INSERT INTO `sum` VALUES ('1040', '1', '5', '2017-08-11', '140', null);
INSERT INTO `sum` VALUES ('1041', '1', '5', '2017-10-05', '140', null);
INSERT INTO `sum` VALUES ('1042', '1', '5', '2017-10-10', '140', null);
INSERT INTO `sum` VALUES ('1043', '1', '5', '2016-10-13', '149', null);
INSERT INTO `sum` VALUES ('1044', '1', '5', '2017-01-23', '149', null);
INSERT INTO `sum` VALUES ('1045', '1', '5', '2017-02-25', '149', null);
INSERT INTO `sum` VALUES ('1046', '1', '5', '2017-04-03', '149', null);
INSERT INTO `sum` VALUES ('1047', '1', '5', '2017-06-09', '149', null);
INSERT INTO `sum` VALUES ('1048', '1', '5', '2017-11-13', '149', null);
INSERT INTO `sum` VALUES ('1049', '1', '5', '2017-11-14', '149', null);
INSERT INTO `sum` VALUES ('1050', '1', '5', '2017-11-15', '149', null);
INSERT INTO `sum` VALUES ('1051', '1', '5', '2017-11-18', '149', null);
INSERT INTO `sum` VALUES ('1052', '3', '5', '2016-12-21', '150', null);
INSERT INTO `sum` VALUES ('1053', '1', '5', '2017-01-03', '150', null);
INSERT INTO `sum` VALUES ('1054', '1', '5', '2017-01-25', '150', null);
INSERT INTO `sum` VALUES ('1055', '1', '5', '2017-03-20', '150', null);
INSERT INTO `sum` VALUES ('1056', '1', '5', '2017-04-11', '150', null);
INSERT INTO `sum` VALUES ('1057', '0.5', '5', '2017-05-02', '150', null);
INSERT INTO `sum` VALUES ('1058', '1', '5', '2017-08-11', '150', null);
INSERT INTO `sum` VALUES ('1059', '1', '5', '2017-08-16', '150', null);
INSERT INTO `sum` VALUES ('1060', '1', '5', '2017-08-15', '150', null);
INSERT INTO `sum` VALUES ('1061', '0.5', '5', '2017-11-13', '150', null);
INSERT INTO `sum` VALUES ('1062', '1', '5', '2017-09-01', '151', null);

-- ----------------------------
-- Table structure for sum_oc
-- ----------------------------
DROP TABLE IF EXISTS `sum_oc`;
CREATE TABLE `sum_oc` (
  `sum_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day_n` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ty_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `add_id` int(10) unsigned NOT NULL,
  `comment` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sum_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2559 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sum_oc
-- ----------------------------
INSERT INTO `sum_oc` VALUES ('2416', '1', '5', '2017-11-01', '119', 'ไปเที่ยว');
INSERT INTO `sum_oc` VALUES ('2418', '1', '7', '2017-11-01', '119', '');
INSERT INTO `sum_oc` VALUES ('2419', '1', '7', '2017-11-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2420', '1', '7', '2017-11-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2421', '1', '7', '2017-11-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2422', '1', '7', '2017-11-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2424', '1', '8', '2017-11-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2425', '1', '8', '2017-11-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2426', '1', '8', '2017-11-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2427', '1', '7', '2017-11-01', '119', 'sss');
INSERT INTO `sum_oc` VALUES ('2428', '1', '7', '2017-11-02', '119', 'sss');
INSERT INTO `sum_oc` VALUES ('2429', '1', '7', '2017-11-03', '119', 'sss');
INSERT INTO `sum_oc` VALUES ('2430', '1', '7', '2017-11-04', '119', 'sss');
INSERT INTO `sum_oc` VALUES ('2431', '1', '7', '2017-11-05', '119', 'sss');
INSERT INTO `sum_oc` VALUES ('2432', '1', '7', '2017-11-01', '119', '');
INSERT INTO `sum_oc` VALUES ('2433', '1', '7', '2017-11-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2434', '1', '7', '2017-11-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2435', '1', '7', '2017-11-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2436', '1', '7', '2017-11-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2437', '1', '7', '2017-11-06', '119', '');
INSERT INTO `sum_oc` VALUES ('2438', '1', '7', '2017-11-07', '119', '');
INSERT INTO `sum_oc` VALUES ('2439', '1', '7', '2017-11-08', '119', '');
INSERT INTO `sum_oc` VALUES ('2440', '1', '7', '2017-11-09', '119', '');
INSERT INTO `sum_oc` VALUES ('2441', '1', '7', '2017-11-10', '119', '');
INSERT INTO `sum_oc` VALUES ('2442', '1', '7', '2017-11-11', '119', '');
INSERT INTO `sum_oc` VALUES ('2443', '1', '7', '2017-11-12', '119', '');
INSERT INTO `sum_oc` VALUES ('2444', '1', '7', '2017-11-13', '119', '');
INSERT INTO `sum_oc` VALUES ('2445', '1', '7', '2017-11-14', '119', '');
INSERT INTO `sum_oc` VALUES ('2446', '1', '7', '2017-11-15', '119', '');
INSERT INTO `sum_oc` VALUES ('2447', '1', '7', '2017-11-16', '119', '');
INSERT INTO `sum_oc` VALUES ('2448', '1', '7', '2017-11-17', '119', '');
INSERT INTO `sum_oc` VALUES ('2449', '1', '7', '2017-11-18', '119', '');
INSERT INTO `sum_oc` VALUES ('2450', '1', '7', '2017-11-19', '119', '');
INSERT INTO `sum_oc` VALUES ('2451', '1', '7', '2017-11-20', '119', '');
INSERT INTO `sum_oc` VALUES ('2452', '1', '7', '2017-11-21', '119', '');
INSERT INTO `sum_oc` VALUES ('2453', '1', '7', '2017-11-22', '119', '');
INSERT INTO `sum_oc` VALUES ('2454', '1', '7', '2017-11-23', '119', '');
INSERT INTO `sum_oc` VALUES ('2455', '1', '7', '2017-11-24', '119', '');
INSERT INTO `sum_oc` VALUES ('2456', '1', '7', '2017-11-25', '119', '');
INSERT INTO `sum_oc` VALUES ('2457', '1', '7', '2017-11-26', '119', '');
INSERT INTO `sum_oc` VALUES ('2458', '1', '7', '2017-11-27', '119', '');
INSERT INTO `sum_oc` VALUES ('2459', '1', '7', '2017-11-28', '119', '');
INSERT INTO `sum_oc` VALUES ('2460', '1', '7', '2017-11-29', '119', '');
INSERT INTO `sum_oc` VALUES ('2461', '1', '7', '2017-11-30', '119', '');
INSERT INTO `sum_oc` VALUES ('2462', '1', '7', '2017-12-01', '119', '');
INSERT INTO `sum_oc` VALUES ('2463', '1', '7', '2017-12-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2464', '1', '7', '2017-12-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2465', '1', '7', '2017-12-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2466', '1', '7', '2017-12-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2467', '1', '7', '2017-12-06', '119', '');
INSERT INTO `sum_oc` VALUES ('2468', '1', '7', '2017-12-07', '119', '');
INSERT INTO `sum_oc` VALUES ('2469', '1', '7', '2017-12-08', '119', '');
INSERT INTO `sum_oc` VALUES ('2470', '1', '7', '2017-12-09', '119', '');
INSERT INTO `sum_oc` VALUES ('2471', '1', '7', '2017-12-10', '119', '');
INSERT INTO `sum_oc` VALUES ('2472', '1', '7', '2017-12-11', '119', '');
INSERT INTO `sum_oc` VALUES ('2473', '1', '7', '2017-12-12', '119', '');
INSERT INTO `sum_oc` VALUES ('2474', '1', '7', '2017-12-13', '119', '');
INSERT INTO `sum_oc` VALUES ('2475', '1', '7', '2017-12-14', '119', '');
INSERT INTO `sum_oc` VALUES ('2476', '1', '7', '2017-12-15', '119', '');
INSERT INTO `sum_oc` VALUES ('2477', '1', '7', '2017-12-16', '119', '');
INSERT INTO `sum_oc` VALUES ('2478', '1', '7', '2017-12-17', '119', '');
INSERT INTO `sum_oc` VALUES ('2479', '1', '7', '2017-12-18', '119', '');
INSERT INTO `sum_oc` VALUES ('2480', '1', '7', '2017-12-19', '119', '');
INSERT INTO `sum_oc` VALUES ('2481', '1', '7', '2017-12-20', '119', '');
INSERT INTO `sum_oc` VALUES ('2482', '1', '7', '2017-12-21', '119', '');
INSERT INTO `sum_oc` VALUES ('2483', '1', '7', '2017-12-22', '119', '');
INSERT INTO `sum_oc` VALUES ('2484', '1', '7', '2017-12-23', '119', '');
INSERT INTO `sum_oc` VALUES ('2485', '1', '7', '2017-12-24', '119', '');
INSERT INTO `sum_oc` VALUES ('2486', '1', '7', '2017-12-25', '119', '');
INSERT INTO `sum_oc` VALUES ('2487', '1', '7', '2017-12-26', '119', '');
INSERT INTO `sum_oc` VALUES ('2488', '1', '7', '2017-12-27', '119', '');
INSERT INTO `sum_oc` VALUES ('2489', '1', '7', '2017-12-28', '119', '');
INSERT INTO `sum_oc` VALUES ('2490', '1', '7', '2017-12-29', '119', '');
INSERT INTO `sum_oc` VALUES ('2491', '1', '7', '2017-12-30', '119', '');
INSERT INTO `sum_oc` VALUES ('2492', '1', '7', '2017-12-31', '119', '');
INSERT INTO `sum_oc` VALUES ('2493', '1', '7', '2017-12-01', '119', '');
INSERT INTO `sum_oc` VALUES ('2494', '1', '7', '2017-12-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2495', '1', '7', '2017-12-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2496', '1', '7', '2017-12-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2497', '1', '7', '2017-12-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2498', '1', '7', '2017-12-06', '119', '');
INSERT INTO `sum_oc` VALUES ('2499', '1', '7', '2017-12-07', '119', '');
INSERT INTO `sum_oc` VALUES ('2500', '1', '7', '2017-12-08', '119', '');
INSERT INTO `sum_oc` VALUES ('2501', '1', '7', '2017-12-09', '119', '');
INSERT INTO `sum_oc` VALUES ('2502', '1', '7', '2017-12-10', '119', '');
INSERT INTO `sum_oc` VALUES ('2503', '1', '7', '2017-12-11', '119', '');
INSERT INTO `sum_oc` VALUES ('2504', '1', '7', '2017-12-12', '119', '');
INSERT INTO `sum_oc` VALUES ('2505', '1', '7', '2017-12-13', '119', '');
INSERT INTO `sum_oc` VALUES ('2506', '1', '7', '2017-12-14', '119', '');
INSERT INTO `sum_oc` VALUES ('2507', '1', '7', '2017-12-15', '119', '');
INSERT INTO `sum_oc` VALUES ('2508', '1', '7', '2017-12-16', '119', '');
INSERT INTO `sum_oc` VALUES ('2509', '1', '7', '2017-12-17', '119', '');
INSERT INTO `sum_oc` VALUES ('2510', '1', '7', '2017-12-18', '119', '');
INSERT INTO `sum_oc` VALUES ('2511', '1', '7', '2017-12-19', '119', '');
INSERT INTO `sum_oc` VALUES ('2512', '1', '7', '2017-12-20', '119', '');
INSERT INTO `sum_oc` VALUES ('2513', '1', '7', '2017-12-21', '119', '');
INSERT INTO `sum_oc` VALUES ('2514', '1', '7', '2017-12-22', '119', '');
INSERT INTO `sum_oc` VALUES ('2515', '1', '7', '2017-12-23', '119', '');
INSERT INTO `sum_oc` VALUES ('2516', '1', '7', '2017-12-24', '119', '');
INSERT INTO `sum_oc` VALUES ('2517', '1', '7', '2017-12-25', '119', '');
INSERT INTO `sum_oc` VALUES ('2518', '1', '7', '2017-12-26', '119', '');
INSERT INTO `sum_oc` VALUES ('2519', '1', '7', '2017-12-27', '119', '');
INSERT INTO `sum_oc` VALUES ('2520', '1', '7', '2017-12-28', '119', '');
INSERT INTO `sum_oc` VALUES ('2521', '1', '7', '2017-12-29', '119', '');
INSERT INTO `sum_oc` VALUES ('2522', '1', '7', '2017-12-30', '119', '');
INSERT INTO `sum_oc` VALUES ('2523', '1', '7', '2017-12-31', '119', '');
INSERT INTO `sum_oc` VALUES ('2524', '1', '7', '2017-12-01', '119', '');
INSERT INTO `sum_oc` VALUES ('2525', '1', '7', '2017-12-02', '119', '');
INSERT INTO `sum_oc` VALUES ('2526', '1', '7', '2017-12-03', '119', '');
INSERT INTO `sum_oc` VALUES ('2527', '1', '7', '2017-12-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2528', '1', '7', '2017-12-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2529', '1', '7', '2017-12-06', '119', '');
INSERT INTO `sum_oc` VALUES ('2530', '1', '7', '2017-12-07', '119', '');
INSERT INTO `sum_oc` VALUES ('2531', '1', '7', '2017-12-08', '119', '');
INSERT INTO `sum_oc` VALUES ('2532', '1', '7', '2017-12-09', '119', '');
INSERT INTO `sum_oc` VALUES ('2533', '1', '7', '2017-12-10', '119', '');
INSERT INTO `sum_oc` VALUES ('2534', '1', '7', '2017-12-11', '119', '');
INSERT INTO `sum_oc` VALUES ('2535', '1', '7', '2017-12-12', '119', '');
INSERT INTO `sum_oc` VALUES ('2536', '1', '7', '2017-12-13', '119', '');
INSERT INTO `sum_oc` VALUES ('2537', '1', '7', '2017-12-14', '119', '');
INSERT INTO `sum_oc` VALUES ('2538', '1', '7', '2017-12-15', '119', '');
INSERT INTO `sum_oc` VALUES ('2539', '1', '7', '2017-12-16', '119', '');
INSERT INTO `sum_oc` VALUES ('2540', '1', '7', '2017-12-17', '119', '');
INSERT INTO `sum_oc` VALUES ('2541', '1', '7', '2017-12-18', '119', '');
INSERT INTO `sum_oc` VALUES ('2542', '1', '7', '2017-12-19', '119', '');
INSERT INTO `sum_oc` VALUES ('2543', '1', '7', '2017-12-20', '119', '');
INSERT INTO `sum_oc` VALUES ('2544', '1', '7', '2017-12-21', '119', '');
INSERT INTO `sum_oc` VALUES ('2545', '1', '7', '2017-12-22', '119', '');
INSERT INTO `sum_oc` VALUES ('2546', '1', '7', '2017-12-23', '119', '');
INSERT INTO `sum_oc` VALUES ('2547', '1', '7', '2017-12-24', '119', '');
INSERT INTO `sum_oc` VALUES ('2548', '1', '7', '2017-12-25', '119', '');
INSERT INTO `sum_oc` VALUES ('2549', '1', '7', '2017-12-26', '119', '');
INSERT INTO `sum_oc` VALUES ('2550', '1', '7', '2017-12-27', '119', '');
INSERT INTO `sum_oc` VALUES ('2551', '1', '7', '2017-12-28', '119', '');
INSERT INTO `sum_oc` VALUES ('2552', '1', '7', '2017-12-29', '119', '');
INSERT INTO `sum_oc` VALUES ('2553', '1', '7', '2017-12-30', '119', '');
INSERT INTO `sum_oc` VALUES ('2554', '1', '7', '2017-12-31', '119', '');
INSERT INTO `sum_oc` VALUES ('2555', '1', '7', '2017-12-04', '119', '');
INSERT INTO `sum_oc` VALUES ('2556', '1', '7', '2017-12-05', '119', '');
INSERT INTO `sum_oc` VALUES ('2557', '1', '7', '2017-12-06', '119', '');
INSERT INTO `sum_oc` VALUES ('2558', '1', '7', '2017-12-07', '119', '');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `ty_id` int(10) NOT NULL AUTO_INCREMENT,
  `ty_n` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ty_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'ขาดงาน');
INSERT INTO `type` VALUES ('2', 'ลาป่วย');
INSERT INTO `type` VALUES ('3', 'ลากิจ');
INSERT INTO `type` VALUES ('4', 'ลาอื่น');
INSERT INTO `type` VALUES ('5', 'พักร้อน');
INSERT INTO `type` VALUES ('6', 'ลากิจพิเศษ');
INSERT INTO `type` VALUES ('7', 'สาย');
INSERT INTO `type` VALUES ('8', 'ลาผิดระเบียบ');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `resign` int(2) unsigned NOT NULL,
  `start` date NOT NULL,
  `dep_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('136', 'น.ส. ปิยะวรรณ อินทรตุล', '1', '2017-06-12', '3');
INSERT INTO `user` VALUES ('137', 'น.ส. ภัทราพร สุขคุ้ม', '1', '2011-11-07', '4');
INSERT INTO `user` VALUES ('138', 'นาง อรอุบล ภูครองทอง', '1', '2011-03-10', '5');
INSERT INTO `user` VALUES ('139', 'นาย นภสกร ยืนยงทวีกร', '1', '2012-05-23', '4');
INSERT INTO `user` VALUES ('140', 'น.ส. ขณัฎา พลเหตุ', '1', '2010-02-01', '5');
INSERT INTO `user` VALUES ('141', 'นาง เกศรินทร์ ชูเชื้อ', '1', '2014-05-02', '4');
INSERT INTO `user` VALUES ('142', 'น.ส. นิดา แซ่โค้ว', '1', '2015-02-02', '5');
INSERT INTO `user` VALUES ('143', 'นาย ณัฐวุฒิ แดงอินทวัฒน์', '1', '2015-02-20', '5');
INSERT INTO `user` VALUES ('144', 'น.ส. ฉวี สืบสำราญ', '1', '2015-11-02', '4');
INSERT INTO `user` VALUES ('145', 'น.ส. ดลยา ตั้งจิตพิชิตภ้ย', '1', '2016-08-16', '5');
INSERT INTO `user` VALUES ('146', 'นาย นิวัติ์ ไทยประถม', '1', '2017-05-11', '2');
INSERT INTO `user` VALUES ('147', 'บาย ชยพล ไพบูลย์วงศ์', '1', '2017-09-01', '5');
INSERT INTO `user` VALUES ('148', 'นาย ปัญญา ไข่ลือนาม', '1', '2017-10-24', '4');
INSERT INTO `user` VALUES ('149', 'น.ส. นัทธิดา เขียวขจี', '1', '2015-10-19', '6');
INSERT INTO `user` VALUES ('150', 'น.ส. ปณตพร ประเสริฐศรี', '1', '2015-07-19', '6');
INSERT INTO `user` VALUES ('151', 'น.ส. นลิน วรฤทธิ์', '1', '2016-07-04', '6');
INSERT INTO `user` VALUES ('152', 'น.ส. ภัทรา กาญจนกันติกะ', '1', '2017-08-01', '6');
INSERT INTO `user` VALUES ('153', 'น.ส. อรอุมา สาหร่ายทอง', '1', '2007-07-24', '8');
INSERT INTO `user` VALUES ('154', 'น.ส. ชไมพร บุดดี', '1', '2008-05-12', '8');
INSERT INTO `user` VALUES ('155', 'น.ส. แสงเดือน จิตต์ประวัติ', '1', '2011-03-07', '8');
INSERT INTO `user` VALUES ('156', 'น.ส. ขนิษฐา มะลิ', '1', '2013-09-02', '8');
INSERT INTO `user` VALUES ('157', 'น.ส. วัลภา ตั้นศิริ ', '1', '2014-08-27', '7');
INSERT INTO `user` VALUES ('158', 'น.ส. ฤทธิ์ฤดี เรืองฤทธ์', '1', '2015-01-24', '7');
INSERT INTO `user` VALUES ('159', 'น.ส. นิรมล พรบรรเจิดศักดิ์', '1', '2016-01-18', '7');
INSERT INTO `user` VALUES ('160', 'น.ส. วลัยลักษณ์ หนูขาว', '1', '2016-01-06', '7');
INSERT INTO `user` VALUES ('162', 'น.ส. สุพรรณี หลีประเสริฐ', '1', '2017-05-22', '7');
INSERT INTO `user` VALUES ('163', 'น.ส. นฤมล เจริญวัย', '1', '2010-09-01', '8');
INSERT INTO `user` VALUES ('164', 'นาย ภัทรพงศ์ โต๊ะจงมล', '1', '2013-05-27', '8');
