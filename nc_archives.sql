-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: nc_archives
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `PersonalData`
--

DROP TABLE IF EXISTS `PersonalData`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PersonalData` (
  `id_PersonalData` int(11) NOT NULL,
  `place_birth` varchar(45) DEFAULT NULL COMMENT 'مكان الميلاد',
  `Date_Birth` varchar(45) DEFAULT NULL COMMENT 'تاريخ الميلاد',
  `Nationality` varchar(45) DEFAULT NULL COMMENT 'الجنسية',
  `card_number` varchar(45) DEFAULT NULL COMMENT 'رقم البطاقة',
  `date_card` varchar(45) DEFAULT NULL COMMENT 'تاريخ اصدار البطاقة',
  `Issuing_card` varchar(45) DEFAULT NULL COMMENT 'جهة اصدار البطاقة',
  `Passport_number` varchar(45) DEFAULT NULL COMMENT 'رقم جواز السفر',
  `date_passport` varchar(45) DEFAULT NULL COMMENT 'تاريخ اصدار الجواز',
  `expiry_passport` varchar(45) DEFAULT NULL COMMENT 'تاريخ انتهاء الجواز',
  `Issuing_passport` varchar(45) DEFAULT NULL COMMENT 'جهة اصدار الجواز',
  `status_update` enum('Active','Inactive') DEFAULT 'Inactive' COMMENT 'حالة التحديث',
  PRIMARY KEY (`id_PersonalData`),
  CONSTRAINT `fk_PersonalData_employees1` FOREIGN KEY (`id_PersonalData`) REFERENCES `employees` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PersonalData`
--

LOCK TABLES `PersonalData` WRITE;
/*!40000 ALTER TABLE `PersonalData` DISABLE KEYS */;
INSERT INTO `PersonalData` VALUES (17017,'99','17/22/2222','سعودي','1015385865','','','','','','','Active');
/*!40000 ALTER TABLE `PersonalData` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archive_files`
--

DROP TABLE IF EXISTS `archive_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archive_files` (
  `id_files` int(11) NOT NULL AUTO_INCREMENT,
  `outgoing_no` varchar(45) DEFAULT NULL COMMENT 'رقم الصادر',
  `date_outgoing_no` varchar(45) DEFAULT NULL COMMENT 'تاريخ الصادر',
  `file_type` varchar(255) DEFAULT NULL COMMENT 'نوع الملف',
  `subject` varchar(255) DEFAULT NULL,
  `ResolutionLink` varchar(255) DEFAULT NULL COMMENT 'رابط الملف',
  `file_condition` varchar(45) DEFAULT NULL,
  `dateEnter` varchar(200) DEFAULT NULL,
  `timeEnter` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_files`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archive_files`
--

LOCK TABLES `archive_files` WRITE;
/*!40000 ALTER TABLE `archive_files` DISABLE KEYS */;
INSERT INTO `archive_files` VALUES (1,'66','1437','2','تميتميسبتمينبتسينمبتسيم','c71075435ad71bb3f592c4ddb754d3ec.pdf',NULL,'الأحد/ 30-03-1439 12:42','1513510969'),(2,'12','1439','1','24505','94cc53825e5390099dc3e8761808347d.pdf',NULL,'الثلاثاء/ 02-04-1439 11:09','1513678165'),(3,'22','1439','1','بيسبيس','38243460d64220aea0ae87f1ca77e9a9.pdf',NULL,'الثلاثاء/ 02-04-1439 11:49','1513680595'),(4,'49586','1439','2','قرار تكليف رقم (6/39) للمدرب/ أمين محمد مشبب الأحمري بتكليفه مدير العلاقات العامة لمدة عام اعتبارا من 15/03/1439هـ','71635412abb416c61642d7f33f57a65c.pdf',NULL,'الثلاثاء/ 02-04-1439 12:08','1513681684');
/*!40000 ALTER TABLE `archive_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id_employe` int(11) NOT NULL,
  `card_number` varchar(45) DEFAULT NULL COMMENT 'رقم السجل المدني',
  `EmployeeName` varchar(255) DEFAULT NULL COMMENT 'اسم الموظف',
  `grade` varchar(45) DEFAULT NULL COMMENT 'المرتبة',
  `job_id` varchar(45) DEFAULT NULL COMMENT 'رقم الوظيفة',
  `class` varchar(45) CHARACTER SET big5 DEFAULT NULL COMMENT 'الدرجة',
  `job_title` varchar(45) DEFAULT NULL COMMENT 'مسمى الوظيفة',
  `nationality` varchar(45) DEFAULT NULL COMMENT 'الجنسية',
  `notes` date DEFAULT NULL,
  `timeEnter` varchar(200) DEFAULT NULL,
  `user_type` enum('master','user','member') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `staff` enum('مدرب','إداري','صحي') NOT NULL,
  `user_password` varchar(200) NOT NULL COMMENT 'كلمة المرور',
  PRIMARY KEY (`id_employe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (22,'2222','اسم تجريبي','','','','','',NULL,'1513680548','master','Active','صحي','$2y$10$NKVIX5YOngJz2A0vfBCiR.b/398dHegzd.UXKhR9PDmNdHOnWKnbq'),(2578,'0','شار ظافر عبدالله الشهري','','مدرب ج','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(6203,'0','ظافر سعد علي الاسمري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(8614,'0','صلاح حمود محمد الشهري','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(10298,'0','فيصل هادي معدي الشهري','','مدرب ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(11854,'0','سعيد حسن عبدالله الخثيمي الشهري','','مدرب ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(13892,'0','ظافر سعد حسن العمري','','مساعد صحي','0','0','0','0000-00-00','1513161101','member','Active','صحي','0'),(14108,'0','مبارك عبدالله مبارك الشهراني','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(14283,'0','عز الدين سعد عوضه الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(14532,'0','محمد عبدالله سليمان البارقي','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(15646,'0','ظافر عزالدين الرياعي الشهري','','مدرب ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(15732,'0','محمد حسن محمد اليوسي الشهري','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(16276,'0','مطلق ظافر صالح الشهري','','مدرب ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(17017,'0','مانع محمد مانع ال هندي العمري','','مدقق شؤون الموظفين','0','0','0','0000-00-00','1513161101','master','Active','إداري','$2y$10$NKVIX5YOngJz2A0vfBCiR.b/398dHegzd.UXKhR9PDmNdHOnWKnbq'),(17825,'0','عبدالله جابر عبدالله الشهري','','مدرب أول أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(18355,'0','فايز محمد عبدالله الكناني الشهري','','مسجل معلومات','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(19329,'0','عبدالله حمود عبدالله البكري','','كاتب','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(20565,'0','وليد سلمان عبدالله العمري','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(20576,'0','حمود عبدالرحمن علي ال متعب الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(23014,'0','احمد علي احمد ال القبل','','ناسخ آله','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(23015,'0','مساعد ذياب ظافر ال صاحب العمري','','كاتب','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(23235,'0','فهد ظافر مداوي ال ناصر','','نجار','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(23751,'0','عثمان علي احمد الفقيه الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(23757,'0','عيسى احمد ابراهيم عسيري','','حارس','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(23783,'0','عبدالله حنش علي ال احمد الشهري','','سائق','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(23849,'0','مانع ذياب ظافر آل صاحب العمري','','مراسل','0','0','0','0000-00-00','1513161101','member','Active','','0'),(23901,'0','عبدالعزيز احمد مصلح ال فلاح القرني','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(23989,'0','علي صمي عوض آل شغيب الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24323,'0','صابر محمد الصغير جلالي','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24340,'0','رابح محمد حامدي','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24371,'0','محمود طه نايف جربوع','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24504,'0','محمد محمود عبدالكريم حمادة','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24505,'0','احمد عبدالقادر حسين العابد','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24567,'0','احمد محمد عبدالله الدلابيح','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24849,'0','هيثم رباح محمد راضي','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24873,'0','عواد عوده فلاح المشاقبه','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(24934,'0','رياض علي محمد الروقي الشهري','','كاتب','0','0','0','0000-00-00','1513161101','member','Active','إداري','0'),(25437,'0','كريم محمد عطوش','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(25681,'0','خلف وقيت احمد آل لتيهه الغامدي','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(25897,'0','عبدالمجيد فراج شبيب الدوسري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(25944,'0','عبدالوهاب علي الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(26080,'0','عبدالله علي محمد العمري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(26199,'0','احمد محمد علي عسيري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(26588,'0','يحيى عبدالله احمد العياشي الزهراني','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(26824,'0','عبدالله سعيد محمد العمري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(26948,'0','على عائض محمد الاسمري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27137,'0','أحمد عوض ظافر الشهري','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27378,'0','يزيد هذلول حسن الصغير','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27463,'0','امين محمد مشبب الاحمري','','مدرب أول ب','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27696,'0','اسعد محمد حسين أبو زيد','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27851,'0','محمد عائض عبدالله شائع','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27974,'0','ظافر عبدالله عبدالرحمن الوليدي','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27983,'0','عوض حاسن عبدالعزيز الكريمي','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0'),(27996,'0','محمد سالم محمد الجهني','','مدرب أ','0','0','0','0000-00-00','1513161101','member','Active','مدرب','0');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees_has_archive_files`
--

DROP TABLE IF EXISTS `employees_has_archive_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees_has_archive_files` (
  `employees_id_employe` int(11) NOT NULL,
  `archive_files_id_files` int(11) NOT NULL,
  PRIMARY KEY (`employees_id_employe`,`archive_files_id_files`),
  KEY `fk_employees_has_archive_files_archive_files1_idx` (`archive_files_id_files`),
  KEY `fk_employees_has_archive_files_employees_idx` (`employees_id_employe`),
  CONSTRAINT `fk_employees_has_archive_files_archive_files1` FOREIGN KEY (`archive_files_id_files`) REFERENCES `archive_files` (`id_files`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employees_has_archive_files_employees` FOREIGN KEY (`employees_id_employe`) REFERENCES `employees` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees_has_archive_files`
--

LOCK TABLES `employees_has_archive_files` WRITE;
/*!40000 ALTER TABLE `employees_has_archive_files` DISABLE KEYS */;
INSERT INTO `employees_has_archive_files` VALUES (24505,2),(22,3),(27463,4);
/*!40000 ALTER TABLE `employees_has_archive_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_data`
--

DROP TABLE IF EXISTS `job_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_data` (
  `id_job_data` int(11) NOT NULL,
  `Staff` varchar(45) DEFAULT NULL COMMENT 'الكادر',
  `Ranked` varchar(45) DEFAULT NULL COMMENT 'المرتبة',
  `Job_number` varchar(45) DEFAULT NULL COMMENT 'رقم الوظيفة',
  `JobTitle` varchar(45) DEFAULT NULL COMMENT 'مسمى الوظيفة',
  `Level_Class` varchar(45) DEFAULT NULL COMMENT 'المستوى / الدرجة',
  `Employer` varchar(45) DEFAULT NULL COMMENT 'جهة العمل',
  `AppointmentDecision` varchar(45) DEFAULT NULL COMMENT 'رقم قرار التعيين',
  `Date_appointment` varchar(45) DEFAULT NULL COMMENT 'تاريخ قرار التعيين',
  `EntryState` varchar(45) DEFAULT NULL COMMENT 'الالتحاق بالدولة',
  `Enrollment_institution` varchar(45) DEFAULT NULL COMMENT 'الالتحاق بالمؤسسة',
  `First_direct_date` varchar(45) DEFAULT NULL COMMENT 'تاريخ المباشرة الاولى',
  `Date_commencement_college` varchar(45) DEFAULT NULL COMMENT 'تاريخ المباشرة بالكلية',
  `status_update_copy1` enum('Active','Inactive') DEFAULT 'Inactive' COMMENT 'حالة التحديث',
  PRIMARY KEY (`id_job_data`),
  CONSTRAINT `fk_job_data_employees1` FOREIGN KEY (`id_job_data`) REFERENCES `employees` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='بيانات الوظيفة';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_data`
--

LOCK TABLES `job_data` WRITE;
/*!40000 ALTER TABLE `job_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,'0017017','wzw808@gmail.com','$2y$10$NKVIX5YOngJz2A0vfBCiR.b/398dHegzd.UXKhR9PDmNdHOnWKnbq','2017-12-06 12:19:50','master','Active','ALamri'),(3,'33','k@k.k','$2y$10$xvFuFBiJTapeQ8UgMq05MezTuR8rbdLpAfifo7xnSBDFXBP.B53qe','2017-12-10 06:29:21','user','Active','kk'),(4,'66','s@s.S','$2y$10$iacVBz1a67OBN3NVt5j.KelZGIiH08KxJNu4O7Y99mMwnc.T2HfH6','2017-12-13 06:02:07','user','Active','ss');
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-23 22:17:54
