-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 ديسمبر 2017 الساعة 13:03
-- إصدار الخادم: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nc_archives`
--

-- --------------------------------------------------------

--
-- بنية الجدول `archive_files`
--

CREATE TABLE `archive_files` (
  `id_files` int(11) NOT NULL,
  `file_link` varchar(255) DEFAULT NULL,
  `outgoing_no` varchar(45) DEFAULT NULL COMMENT 'رقم الصادر',
  `date_outgoing_no` varchar(45) DEFAULT NULL COMMENT 'تاريخ الصادر',
  `subject` varchar(255) DEFAULT NULL,
  `ResolutionLink` varchar(255) DEFAULT NULL COMMENT 'رابط الملف',
  `file_condition` varchar(45) DEFAULT NULL,
  `dateEnter` varchar(200) DEFAULT NULL,
  `timeEnter` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `employees`
--

CREATE TABLE `employees` (
  `id_employe` int(11) NOT NULL,
  `computer_number` int(11) DEFAULT NULL COMMENT 'رقم الحاسب',
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
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `employees`
--

INSERT INTO `employees` (`id_employe`, `computer_number`, `card_number`, `EmployeeName`, `grade`, `job_id`, `class`, `job_title`, `nationality`, `notes`, `timeEnter`, `user_type`, `user_status`, `staff`, `user_password`) VALUES
(2, 23014, '0', 'احمد علي احمد ال القبل', '', 'ناسخ آله', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(3, 24567, '0', 'احمد محمد عبدالله الدلابيح', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(4, 26199, '0', 'احمد محمد علي عسيري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(5, 27696, '0', 'اسعد محمد حسين أبو زيد', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(6, 27463, '0', 'امين محمد مشبب الاحمري', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(7, 27137, '0', 'أحمد عوض ظافر الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(8, 20576, '0', 'حمود عبدالرحمن علي ال متعب الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(9, 25681, '0', 'خلف وقيت احمد آل لتيهه الغامدي', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(10, 24340, '0', 'رابح محمد حامدي', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(11, 24934, '0', 'رياض علي محمد الروقي الشهري', '', 'كاتب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(12, 11854, '0', 'سعيد حسن عبدالله الخثيمي الشهري', '', 'مدرب ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(13, 2578, '0', 'شار ظافر عبدالله الشهري', '', 'مدرب ج', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(14, 24323, '0', 'صابر محمد الصغير جلالي', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(15, 8614, '0', 'صلاح حمود محمد الشهري', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(16, 13892, '0', 'ظافر سعد حسن العمري', '', 'مساعد صحي', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'صحي', '0'),
(17, 6203, '0', 'ظافر سعد علي الاسمري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(18, 27974, '0', 'ظافر عبدالله عبدالرحمن الوليدي', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(19, 15646, '0', 'ظافر عزالدين الرياعي الشهري', '', 'مدرب ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(20, 23901, '0', 'عبدالعزيز احمد مصلح ال فلاح القرني', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(21, 17825, '0', 'عبدالله جابر عبدالله الشهري', '', 'مدرب أول أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(22, 19329, '0', 'عبدالله حمود عبدالله البكري', '', 'كاتب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(23, 23783, '0', 'عبدالله حنش علي ال احمد الشهري', '', 'سائق', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(24, 26824, '0', 'عبدالله سعيد محمد العمري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(25, 26080, '0', 'عبدالله علي محمد العمري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(26, 25897, '0', 'عبدالمجيد فراج شبيب الدوسري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(27, 25944, '0', 'عبدالوهاب علي الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(28, 23751, '0', 'عثمان علي احمد الفقيه الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(29, 14283, '0', 'عز الدين سعد عوضه الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(30, 26948, '0', 'على عائض محمد الاسمري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(31, 23989, '0', 'علي صمي عوض آل شغيب الشهري', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(32, 24873, '0', 'عواد عوده فلاح المشاقبه', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(33, 27983, '0', 'عوض حاسن عبدالعزيز الكريمي', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(34, 23757, '0', 'عيسى احمد ابراهيم عسيري', '', 'حارس', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(35, 18355, '0', 'فايز محمد عبدالله الكناني الشهري', '', 'مسجل معلومات', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(36, 23235, '0', 'فهد ظافر مداوي ال ناصر', '', 'نجار', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(37, 10298, '0', 'فيصل هادي معدي الشهري', '', 'مدرب ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(38, 25437, '0', 'كريم محمد عطوش', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(39, 23849, '0', 'مانع ذياب ظافر آل صاحب العمري', '', 'مراسل', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', '', '0'),
(40, 17017, '0', 'مانع محمد مانع ال هندي العمري', '', 'مدقق شؤون الموظفين', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(41, 14108, '0', 'مبارك عبدالله مبارك الشهراني', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(42, 15732, '0', 'محمد حسن محمد اليوسي الشهري', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(43, 27996, '0', 'محمد سالم محمد الجهني', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(44, 27851, '0', 'محمد عائض عبدالله شائع', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(45, 14532, '0', 'محمد عبدالله سليمان البارقي', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(46, 24504, '0', 'محمد محمود عبدالكريم حمادة', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(47, 24371, '0', 'محمود طه نايف جربوع', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(48, 23015, '0', 'مساعد ذياب ظافر ال صاحب العمري', '', 'كاتب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'إداري', '0'),
(49, 16276, '0', 'مطلق ظافر صالح الشهري', '', 'مدرب ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(50, 24849, '0', 'هيثم رباح محمد راضي', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(51, 20565, '0', 'وليد سلمان عبدالله العمري', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(52, 26588, '0', 'يحيى عبدالله احمد العياشي الزهراني', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(53, 27378, '0', 'يزيد هذلول حسن الصغير', '', 'مدرب أ', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0'),
(59, 24505, '0', 'احمد عبدالقادر حسين العابد', '', 'مدرب أول ب', '0', '0', '0', '0000-00-00', '1513161101', 'member', 'Active', 'مدرب', '0');

-- --------------------------------------------------------

--
-- بنية الجدول `employees_has_archive_files`
--

CREATE TABLE `employees_has_archive_files` (
  `employees_id_employe` int(11) NOT NULL,
  `archive_files_id_files` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `user_email`, `user_password`, `create_time`, `user_type`, `user_status`, `user_name`) VALUES
(1, '0017017', 'wzw808@gmail.com', '$2y$10$NKVIX5YOngJz2A0vfBCiR.b/398dHegzd.UXKhR9PDmNdHOnWKnbq', '2017-12-06 12:19:50', 'master', 'Active', 'ALamri'),
(2, '22', 'peter_parker@gmail.com', '$2y$10$hZ0JdC/OFvDB/OSMaTItbuMPkXkS34T89LgPf4Nc9fAvT.PWCq0iW', '2017-12-10 05:47:25', 'user', 'Active', 'مارك بيتر'),
(3, '33', 'k@k.k', '$2y$10$xvFuFBiJTapeQ8UgMq05MezTuR8rbdLpAfifo7xnSBDFXBP.B53qe', '2017-12-10 06:29:21', 'user', 'Active', 'kk'),
(4, '66', 's@s.S', '$2y$10$iacVBz1a67OBN3NVt5j.KelZGIiH08KxJNu4O7Y99mMwnc.T2HfH6', '2017-12-13 06:02:07', 'user', 'Active', 'ss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_files`
--
ALTER TABLE `archive_files`
  ADD PRIMARY KEY (`id_files`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id_employe`);

--
-- Indexes for table `employees_has_archive_files`
--
ALTER TABLE `employees_has_archive_files`
  ADD PRIMARY KEY (`employees_id_employe`,`archive_files_id_files`),
  ADD KEY `fk_employees_has_archive_files_archive_files1_idx` (`archive_files_id_files`),
  ADD KEY `fk_employees_has_archive_files_employees_idx` (`employees_id_employe`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_files`
--
ALTER TABLE `archive_files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `employees_has_archive_files`
--
ALTER TABLE `employees_has_archive_files`
  ADD CONSTRAINT `fk_employees_has_archive_files_archive_files1` FOREIGN KEY (`archive_files_id_files`) REFERENCES `archive_files` (`id_files`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employees_has_archive_files_employees` FOREIGN KEY (`employees_id_employe`) REFERENCES `employees` (`id_employe`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
