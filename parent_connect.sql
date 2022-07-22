-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2022 at 05:05 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parent_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(15) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `number_of_classes` int(11) NOT NULL,
  `no_of_cls_attended` int(11) NOT NULL,
  `attendance_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subjectId` (`subjectId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deptId` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'Password@123',
  PRIMARY KEY (`deptId`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptId`, `department_name`, `password`) VALUES
(2, '12345', 'Computer Science', 'Password@123'),
(3, '1245', 'Mechanical Engineering', 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `deptId` varchar(15) NOT NULL,
  `faculty_id` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` double NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'Password@123',
  PRIMARY KEY (`id`),
  KEY `deptId` (`deptId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `first_name`, `last_name`, `deptId`, `faculty_id`, `email`, `mobile`, `password`) VALUES
(2, 'Basavaraj', 'Sangur', '12345', '1234', 'basavaraj@gmail.com', 9739170220, 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `marks_details`
--

DROP TABLE IF EXISTS `marks_details`;
CREATE TABLE IF NOT EXISTS `marks_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(15) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `marks_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectId` (`subjectId`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_details`
--

INSERT INTO `marks_details` (`id`, `subjectId`, `total_marks`, `obtained_marks`, `student_id`, `marks_type`) VALUES
(27, '305IC', 30, 20, '202CS12013', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students_list`
--

DROP TABLE IF EXISTS `students_list`;
CREATE TABLE IF NOT EXISTS `students_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(15) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_number` double NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'Password@123',
  `father_mobile_number` double NOT NULL,
  PRIMARY KEY (`roll_no`) USING BTREE,
  UNIQUE KEY `id` (`id`),
  KEY `students_list_ibfk_1` (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_list`
--

INSERT INTO `students_list` (`id`, `roll_no`, `full_name`, `last_name`, `email_id`, `phone_number`, `father_name`, `mother_name`, `dept_id`, `semester`, `password`, `father_mobile_number`) VALUES
(4, '202CS12013', 'Basavaraj', 'Sangur', 'basavaraj@gmail.com', 1234567890, 'Mallappa', 'Laxmi', '12345', 1, 'Password@123', 973917);

-- --------------------------------------------------------

--
-- Table structure for table `student_marks_details`
--

DROP TABLE IF EXISTS `student_marks_details`;
CREATE TABLE IF NOT EXISTS `student_marks_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `CIE1` varchar(11) DEFAULT '0,0',
  `CIE2` varchar(11) DEFAULT '0,0',
  `CIE3` varchar(11) DEFAULT '0,0',
  `MCQ` varchar(11) DEFAULT '0,0',
  `OPENBOOKTEST` varchar(11) DEFAULT '0,0',
  `activity` varchar(11) DEFAULT '0,0',
  `SKTEST1` varchar(11) DEFAULT '0,0',
  `SKTEST2` varchar(11) DEFAULT '0,0',
  `portfolio` varchar(11) DEFAULT '0,0',
  `SKTEST3` varchar(11) DEFAULT '0,0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_marks_details`
--

INSERT INTO `student_marks_details` (`id`, `subjectId`, `student_id`, `CIE1`, `CIE2`, `CIE3`, `MCQ`, `OPENBOOKTEST`, `activity`, `SKTEST1`, `SKTEST2`, `portfolio`, `SKTEST3`) VALUES
(5, '203WE', '202CS12013', '30,28', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0'),
(4, '201DC', '202CS12013', '30,28', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(15) NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `deptId` varchar(30) NOT NULL,
  PRIMARY KEY (`subjectId`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `subjects_ibfk_1` (`deptId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectId`, `subjectName`, `semester`, `deptId`) VALUES
(22, '201DC', 'Digital Computer', 1, '12345'),
(23, '202PY', 'Python', 2, '12345'),
(24, '203WE', 'Web Programming', 3, '12345'),
(25, '305IC', 'Introduction to computer', 5, '12345');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students_list` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`subjectId`);

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `departments` (`deptId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks_details`
--
ALTER TABLE `marks_details`
  ADD CONSTRAINT `marks_details_ibfk_1` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_details_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students_list` (`roll_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_list`
--
ALTER TABLE `students_list`
  ADD CONSTRAINT `students_list_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`deptId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `departments` (`deptId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
