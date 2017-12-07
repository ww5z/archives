-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 ديسمبر 2017 الساعة 12:30
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

--
-- إرجاع أو استيراد بيانات الجدول `archive_files`
--

INSERT INTO `archive_files` (`id_files`, `file_link`, `outgoing_no`, `date_outgoing_no`, `subject`, `ResolutionLink`, `file_condition`, `dateEnter`, `timeEnter`) VALUES
(1, '22', '22', '22', 'kkdfdsfsafdsafdsafsda', NULL, NULL, NULL, NULL),
(2, '33', '545', NULL, '33333333333333333', '456', '1', NULL, NULL),
(9, NULL, '55', '1439', NULL, '55.png', '1', 'الأربعاء/ 19-03-1439 13:55', '1512564926'),
(10, NULL, '66', '1439', NULL, '66.png', '1', 'الأربعاء/ 19-03-1439 13:56', '1512565014'),
(11, NULL, '1', '1439', NULL, '1.png', '1', 'الأربعاء/ 19-03-1439 13:58', '1512565113'),
(12, NULL, '1', '1439', NULL, '1.png', '1', 'الأربعاء/ 19-03-1439 13:59', '1512565156'),
(13, NULL, '1', '1439', NULL, '1.png', '1', 'الأربعاء/ 19-03-1439 13:59', '1512565181'),
(14, NULL, '5446', '1439', 'post_2', '1.png', NULL, NULL, NULL),
(15, NULL, '11', '11', '111', '1.png', NULL, NULL, NULL),
(16, NULL, '22', '22', '2222', '1.png', NULL, NULL, NULL),
(17, NULL, '44', '44', '4444444444444444', '1.png', NULL, NULL, NULL);

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
  `timeEnter` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `employees`
--

INSERT INTO `employees` (`id_employe`, `computer_number`, `card_number`, `EmployeeName`, `grade`, `job_id`, `class`, `job_title`, `nationality`, `notes`, `timeEnter`) VALUES
(1, 22, '11', 'اسم عام', '21', '23', '24', '25', '26', NULL, NULL),
(2, 33, '33', '33', '33', '333', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `employees_has_archive_files`
--

CREATE TABLE `employees_has_archive_files` (
  `employees_id_employe` int(11) NOT NULL,
  `archive_files_id_files` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `employees_has_archive_files`
--

INSERT INTO `employees_has_archive_files` (`employees_id_employe`, `archive_files_id_files`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
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
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_password`, `create_time`, `user_type`, `user_status`, `user_name`) VALUES
(1, '0017017', 'wzw808@gmail.com', '$2y$10$NKVIX5YOngJz2A0vfBCiR.b/398dHegzd.UXKhR9PDmNdHOnWKnbq', '2017-12-06 12:19:50', 'master', 'Active', 'ALamri');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_files`
--
ALTER TABLE `archive_files`
  MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
