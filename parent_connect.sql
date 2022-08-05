-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 08:04 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(2, '12345', 'Computer Science', '12345'),
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
  KEY `deptId` (`deptId`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `facultyId` varchar(30) NOT NULL,
  PRIMARY KEY (`subjectId`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `subjects_ibfk_1` (`deptId`),
  KEY `facultyId` (`facultyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjects_count`
--

CREATE TABLE IF NOT EXISTS `subjects_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sem` int(11) NOT NULL,
  `total_subjects` int(11) NOT NULL,
  `deptId` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deptId` (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

--
-- Constraints for table `subjects_count`
--
ALTER TABLE `subjects_count`
  ADD CONSTRAINT `subjects_count_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `departments` (`deptId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
