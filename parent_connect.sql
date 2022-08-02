-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 03:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parent_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `subjectId`, `student_id`, `number_of_classes`, `no_of_cls_attended`, `attendance_type`) VALUES
(1, '202PY', '202CS12013', 30, 28, 'January'),
(2, '203WE', '202CS12013', 30, 26, 'January'),
(3, '202PY', '202CS12013', 30, 22, 'February'),
(4, '202PY', '202CS12013', 20, 12, 'March'),
(5, '202PY', '202CS12013', 30, 27, 'April');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deptId` varchar(10) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'Password@123',
  PRIMARY KEY (`deptId`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptId`, `department_name`, `password`) VALUES
(2, '1234', 'Computer Science', '12345'),
(3, '1245', 'Mechanical Engineering', 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `first_name`, `last_name`, `deptId`, `faculty_id`, `email`, `mobile`, `password`) VALUES
(6, 'Basavaraj', 'S', '1234', '12345', 'basavaraj@gmail.com', 9739170220, 'Password@123');

-- --------------------------------------------------------

--
-- Table structure for table `marks_details`
--

CREATE TABLE IF NOT EXISTS `marks_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(15) NOT NULL,
  `total_marks` int(11) NOT NULL DEFAULT '0',
  `obtained_marks` int(11) NOT NULL DEFAULT '0',
  `student_id` varchar(15) NOT NULL,
  `marks_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectId` (`subjectId`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `marks_details`
--

INSERT INTO `marks_details` (`id`, `subjectId`, `total_marks`, `obtained_marks`, `student_id`, `marks_type`) VALUES
(32, '201CS', -1, -1, '202CS12013', '1'),
(43, '305IC', 30, 28, '202CS12013', '1');

-- --------------------------------------------------------

--
-- Table structure for table `students_list`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students_list`
--

INSERT INTO `students_list` (`id`, `roll_no`, `full_name`, `last_name`, `email_id`, `phone_number`, `father_name`, `mother_name`, `dept_id`, `semester`, `password`, `father_mobile_number`) VALUES
(4, '202CS12013', 'Basavaraj', 'Sangur', 'basavaraj@gmail.com', 1234567890, 'Mallappa', 'Laxmi', '1234', 1, 'Password@123', 9739170220);

-- --------------------------------------------------------

--
-- Table structure for table `student_marks_details`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `student_marks_details`
--

INSERT INTO `student_marks_details` (`id`, `subjectId`, `student_id`, `CIE1`, `CIE2`, `CIE3`, `MCQ`, `OPENBOOKTEST`, `activity`, `SKTEST1`, `SKTEST2`, `portfolio`, `SKTEST3`) VALUES
(11, '203WE', '202CS12013', '30,28', '30,28', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0'),
(10, '202PY', '202CS12013', '30,28', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0', '0,0');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectId` varchar(15) NOT NULL,
  `subjectName` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `deptId` varchar(30) NOT NULL,
  PRIMARY KEY (`subjectId`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `subjects_ibfk_1` (`deptId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subjectId`, `subjectName`, `semester`, `deptId`) VALUES
(26, '201CS', 'Software Engineering', 5, '1234'),
(23, '202PY', 'Python', 3, '1234'),
(24, '203WE', 'Web Programming', 3, '1234'),
(25, '305IC', 'Introduction to computer', 5, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_count`
--

CREATE TABLE IF NOT EXISTS `subjects_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sem` int(11) NOT NULL,
  `total_subjects` int(11) NOT NULL,
  `deptId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `subjects_count`
--

INSERT INTO `subjects_count` (`id`, `sem`, `total_subjects`, `deptId`) VALUES
(2, 3, 2, 1234),
(3, 5, 2, 1234);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
