-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 01:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `type` enum('in_time','out_time') NOT NULL,
  `punch_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attID`, `empID`, `type`, `punch_time`) VALUES
(46, 16, 'in_time', '2021-08-01 09:00:00'),
(47, 16, 'out_time', '2021-08-01 17:00:00'),
(48, 17, 'in_time', '2021-08-02 09:00:00'),
(49, 17, 'out_time', '2021-08-02 18:00:00'),
(71, 16, 'in_time', '2021-08-10 09:00:00'),
(72, 16, 'out_time', '2021-08-10 17:39:00'),
(75, 16, 'in_time', '2021-09-07 09:00:00'),
(76, 16, 'out_time', '2021-09-07 16:00:00'),
(77, 17, 'in_time', '2021-09-07 09:00:00'),
(78, 17, 'out_time', '2021-09-07 17:03:00'),
(203, 16, 'in_time', '2021-06-01 08:31:00'),
(204, 17, 'in_time', '2021-06-01 08:31:00'),
(205, 16, 'out_time', '2021-06-01 17:31:00'),
(206, 17, 'out_time', '2021-06-01 17:31:00'),
(207, 16, 'in_time', '2021-06-02 08:31:00'),
(208, 17, 'in_time', '2021-06-02 08:31:00'),
(209, 16, 'out_time', '2021-06-02 17:31:00'),
(210, 17, 'out_time', '2021-06-02 17:31:00'),
(211, 16, 'in_time', '2021-06-03 08:31:00'),
(212, 17, 'in_time', '2021-06-03 08:31:00'),
(213, 16, 'out_time', '2021-06-03 17:31:00'),
(214, 17, 'out_time', '2021-06-03 17:31:00'),
(215, 16, 'in_time', '2021-06-05 08:31:00'),
(216, 17, 'in_time', '2021-06-05 08:31:00'),
(217, 16, 'out_time', '2021-06-05 17:31:00'),
(218, 17, 'out_time', '2021-06-05 17:31:00'),
(219, 16, 'in_time', '2021-06-06 08:31:00'),
(220, 17, 'in_time', '2021-06-06 08:31:00'),
(221, 16, 'out_time', '2021-06-06 17:31:00'),
(222, 17, 'out_time', '2021-06-06 17:31:00'),
(223, 16, 'in_time', '2021-06-07 08:31:00'),
(224, 17, 'in_time', '2021-06-07 08:31:00'),
(225, 16, 'out_time', '2021-06-07 17:31:00'),
(226, 17, 'out_time', '2021-06-07 17:31:00'),
(227, 16, 'in_time', '2021-06-08 08:31:00'),
(228, 17, 'in_time', '2021-06-08 08:31:00'),
(229, 16, 'out_time', '2021-06-08 17:31:00'),
(230, 17, 'out_time', '2021-06-08 17:31:00'),
(231, 16, 'in_time', '2021-06-09 08:31:00'),
(232, 17, 'in_time', '2021-06-09 08:31:00'),
(233, 16, 'out_time', '2021-06-09 17:31:00'),
(234, 17, 'out_time', '2021-06-09 17:31:00'),
(235, 16, 'in_time', '2021-06-10 08:31:00'),
(236, 17, 'in_time', '2021-06-10 08:31:00'),
(237, 16, 'out_time', '2021-06-10 17:31:00'),
(238, 17, 'out_time', '2021-06-10 17:31:00'),
(239, 16, 'in_time', '2021-06-12 08:31:00'),
(240, 17, 'in_time', '2021-06-12 08:31:00'),
(241, 16, 'out_time', '2021-06-12 17:31:00'),
(242, 17, 'out_time', '2021-06-12 17:31:00'),
(243, 16, 'in_time', '2021-06-13 08:31:00'),
(244, 17, 'in_time', '2021-06-13 08:31:00'),
(245, 16, 'out_time', '2021-06-13 17:31:00'),
(246, 17, 'out_time', '2021-06-13 17:31:00'),
(247, 16, 'in_time', '2021-06-14 08:31:00'),
(248, 17, 'in_time', '2021-06-14 08:31:00'),
(249, 16, 'out_time', '2021-06-14 17:31:00'),
(250, 17, 'out_time', '2021-06-14 17:31:00'),
(251, 16, 'in_time', '2021-06-15 08:31:00'),
(252, 17, 'in_time', '2021-06-15 08:31:00'),
(253, 16, 'out_time', '2021-06-15 17:31:00'),
(254, 17, 'out_time', '2021-06-15 17:31:00'),
(255, 16, 'in_time', '2021-06-16 08:31:00'),
(256, 17, 'in_time', '2021-06-16 08:31:00'),
(257, 16, 'out_time', '2021-06-16 17:31:00'),
(258, 17, 'out_time', '2021-06-16 17:31:00'),
(259, 16, 'in_time', '2021-06-17 08:31:00'),
(260, 17, 'in_time', '2021-06-17 08:31:00'),
(261, 16, 'out_time', '2021-06-17 17:31:00'),
(262, 17, 'out_time', '2021-06-17 17:31:00'),
(263, 16, 'in_time', '2021-06-19 08:31:00'),
(264, 17, 'in_time', '2021-06-19 08:31:00'),
(265, 16, 'out_time', '2021-06-19 17:31:00'),
(266, 17, 'out_time', '2021-06-19 17:31:00'),
(267, 16, 'in_time', '2021-06-20 08:31:00'),
(268, 17, 'in_time', '2021-06-20 08:31:00'),
(269, 16, 'out_time', '2021-06-20 17:31:00'),
(270, 17, 'out_time', '2021-06-20 17:31:00'),
(271, 16, 'in_time', '2021-06-21 08:31:00'),
(272, 17, 'in_time', '2021-06-21 08:31:00'),
(273, 16, 'out_time', '2021-06-21 17:31:00'),
(274, 17, 'out_time', '2021-06-21 17:31:00'),
(275, 16, 'in_time', '2021-06-22 08:31:00'),
(276, 17, 'in_time', '2021-06-22 08:31:00'),
(277, 16, 'out_time', '2021-06-22 17:31:00'),
(278, 17, 'out_time', '2021-06-22 17:31:00'),
(279, 16, 'in_time', '2021-06-23 08:31:00'),
(280, 17, 'in_time', '2021-06-23 08:31:00'),
(281, 16, 'out_time', '2021-06-23 17:31:00'),
(282, 17, 'out_time', '2021-06-23 17:31:00'),
(283, 16, 'in_time', '2021-06-24 08:31:00'),
(284, 17, 'in_time', '2021-06-24 08:31:00'),
(285, 16, 'out_time', '2021-06-24 17:31:00'),
(286, 17, 'out_time', '2021-06-24 17:31:00'),
(287, 16, 'in_time', '2021-06-26 08:31:00'),
(288, 17, 'in_time', '2021-06-26 08:31:00'),
(289, 16, 'out_time', '2021-06-26 17:31:00'),
(290, 17, 'out_time', '2021-06-26 17:31:00'),
(291, 16, 'in_time', '2021-06-27 08:31:00'),
(292, 17, 'in_time', '2021-06-27 08:31:00'),
(293, 16, 'out_time', '2021-06-27 17:31:00'),
(294, 17, 'out_time', '2021-06-27 17:31:00'),
(295, 16, 'in_time', '2021-06-28 08:31:00'),
(296, 17, 'in_time', '2021-06-28 08:31:00'),
(297, 16, 'out_time', '2021-06-28 17:31:00'),
(298, 17, 'out_time', '2021-06-28 17:31:00'),
(299, 16, 'in_time', '2021-06-29 08:31:00'),
(300, 17, 'in_time', '2021-06-29 08:31:00'),
(301, 16, 'out_time', '2021-06-29 17:31:00'),
(302, 17, 'out_time', '2021-06-29 17:31:00'),
(307, 16, 'in_time', '2021-02-01 08:31:00'),
(308, 17, 'in_time', '2021-02-01 08:31:00'),
(309, 16, 'out_time', '2021-02-01 17:31:00'),
(310, 17, 'out_time', '2021-02-01 17:31:00'),
(311, 16, 'in_time', '2021-02-02 08:31:00'),
(312, 17, 'in_time', '2021-02-02 08:31:00'),
(313, 16, 'out_time', '2021-02-02 17:31:00'),
(314, 17, 'out_time', '2021-02-02 17:31:00'),
(315, 16, 'in_time', '2021-02-03 08:31:00'),
(316, 17, 'in_time', '2021-02-03 08:31:00'),
(317, 16, 'out_time', '2021-02-03 17:31:00'),
(318, 17, 'out_time', '2021-02-03 17:31:00'),
(319, 16, 'in_time', '2021-02-04 08:31:00'),
(320, 17, 'in_time', '2021-02-04 08:31:00'),
(321, 16, 'out_time', '2021-02-04 17:31:00'),
(322, 17, 'out_time', '2021-02-04 17:31:00'),
(323, 16, 'in_time', '2021-02-06 08:31:00'),
(324, 17, 'in_time', '2021-02-06 08:31:00'),
(325, 16, 'out_time', '2021-02-06 17:31:00'),
(326, 17, 'out_time', '2021-02-06 17:31:00'),
(327, 16, 'in_time', '2021-02-07 08:31:00'),
(328, 17, 'in_time', '2021-02-07 08:31:00'),
(329, 16, 'out_time', '2021-02-07 17:31:00'),
(330, 17, 'out_time', '2021-02-07 17:31:00'),
(331, 16, 'in_time', '2021-02-08 08:31:00'),
(332, 17, 'in_time', '2021-02-08 08:31:00'),
(333, 16, 'out_time', '2021-02-08 17:31:00'),
(334, 17, 'out_time', '2021-02-08 17:31:00'),
(335, 16, 'in_time', '2021-02-09 08:31:00'),
(336, 17, 'in_time', '2021-02-09 08:31:00'),
(337, 16, 'out_time', '2021-02-09 17:31:00'),
(338, 17, 'out_time', '2021-02-09 17:31:00'),
(339, 16, 'in_time', '2021-02-10 08:31:00'),
(340, 17, 'in_time', '2021-02-10 08:31:00'),
(341, 16, 'out_time', '2021-02-10 17:31:00'),
(342, 17, 'out_time', '2021-02-10 17:31:00'),
(343, 16, 'in_time', '2021-02-11 08:31:00'),
(344, 17, 'in_time', '2021-02-11 08:31:00'),
(345, 16, 'out_time', '2021-02-11 17:31:00'),
(346, 17, 'out_time', '2021-02-11 17:31:00'),
(347, 16, 'in_time', '2021-02-13 08:31:00'),
(348, 17, 'in_time', '2021-02-13 08:31:00'),
(349, 16, 'out_time', '2021-02-13 17:31:00'),
(350, 17, 'out_time', '2021-02-13 17:31:00'),
(351, 16, 'in_time', '2021-02-14 08:31:00'),
(352, 17, 'in_time', '2021-02-14 08:31:00'),
(353, 16, 'out_time', '2021-02-14 17:31:00'),
(354, 17, 'out_time', '2021-02-14 17:31:00'),
(355, 16, 'in_time', '2021-02-15 08:31:00'),
(356, 17, 'in_time', '2021-02-15 08:31:00'),
(357, 16, 'out_time', '2021-02-15 17:31:00'),
(358, 17, 'out_time', '2021-02-15 17:31:00'),
(359, 16, 'in_time', '2021-02-16 08:31:00'),
(360, 17, 'in_time', '2021-02-16 08:31:00'),
(361, 16, 'out_time', '2021-02-16 17:31:00'),
(362, 17, 'out_time', '2021-02-16 17:31:00'),
(363, 16, 'in_time', '2021-02-17 08:31:00'),
(364, 17, 'in_time', '2021-02-17 08:31:00'),
(365, 16, 'out_time', '2021-02-17 17:31:00'),
(366, 17, 'out_time', '2021-02-17 17:31:00'),
(367, 16, 'in_time', '2021-02-18 08:31:00'),
(368, 17, 'in_time', '2021-02-18 08:31:00'),
(369, 16, 'out_time', '2021-02-18 17:31:00'),
(370, 17, 'out_time', '2021-02-18 17:31:00'),
(371, 16, 'in_time', '2021-02-20 08:31:00'),
(372, 17, 'in_time', '2021-02-20 08:31:00'),
(373, 16, 'out_time', '2021-02-20 17:31:00'),
(374, 17, 'out_time', '2021-02-20 17:31:00'),
(375, 16, 'in_time', '2021-02-21 08:31:00'),
(376, 17, 'in_time', '2021-02-21 08:31:00'),
(377, 16, 'out_time', '2021-02-21 17:31:00'),
(378, 17, 'out_time', '2021-02-21 17:31:00'),
(379, 16, 'in_time', '2021-02-22 08:31:00'),
(380, 17, 'in_time', '2021-02-22 08:31:00'),
(381, 16, 'out_time', '2021-02-22 17:31:00'),
(382, 17, 'out_time', '2021-02-22 17:31:00'),
(383, 16, 'in_time', '2021-02-23 08:31:00'),
(384, 17, 'in_time', '2021-02-23 08:31:00'),
(385, 16, 'out_time', '2021-02-23 17:31:00'),
(386, 17, 'out_time', '2021-02-23 17:31:00'),
(387, 16, 'in_time', '2021-02-24 08:31:00'),
(388, 17, 'in_time', '2021-02-24 08:31:00'),
(389, 16, 'out_time', '2021-02-24 17:31:00'),
(390, 17, 'out_time', '2021-02-24 17:31:00'),
(391, 16, 'in_time', '2021-02-25 08:31:00'),
(392, 17, 'in_time', '2021-02-25 08:31:00'),
(393, 16, 'out_time', '2021-02-25 17:31:00'),
(394, 17, 'out_time', '2021-02-25 17:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bankID` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankID`, `bank_name`, `status`) VALUES
(1, 'HSBC Bank', 'active'),
(2, 'Standard Chartered Bank ', 'active'),
(5, 'Agrani Bank', 'active'),
(6, 'Al-Arafah Islami Bank', 'active'),
(7, 'Bangladesh Commerce Bank', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('add','deduct') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `title`, `amount`, `type`) VALUES
(8, 'Profident Fund', '5.00', 'deduct'),
(9, 'Company income Profit', '3.00', 'add');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `shortlisted` enum('yes','no') NOT NULL DEFAULT 'no',
  `status` enum('employee','candidate','','') NOT NULL DEFAULT 'candidate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `name`, `email`, `phone`, `address`, `photo`, `dob`, `gender`, `shortlisted`, `status`) VALUES
(19, 'রিমা ', 'rima@gmail.com', '+986876476', 'মিরপুর', '2021-09-06-11-10-048.png', '1992-12-06', 'male', 'yes', 'employee'),
(20, 'নাহার', 'tania@gmail.com', '+75348297592', 'ধানমন্ডি', '2021-09-06-11-07-337.png', '1990-12-06', 'female', 'yes', 'employee'),
(22, 'সিরাজুল ', 'sirazul@gmail.com', '+986876476 ', 'মিরপুর', '2021-09-06-11-13-533.png', '1990-12-06', 'male', 'yes', 'employee'),
(24, 'মানিক ', 'manik@gmail.com', '+৮৫৬৪৩', 'হাজারিবাগ  ', '2021-09-06-11-19-0812.png', '1989-12-06', 'male', 'yes', 'candidate'),
(25, 'শান্তা ', 'santa@gmail.com', '+৮২৪৬৮২', 'বারিধারা ', '2021-09-06-11-22-249.png', '1996-12-06', 'female', 'yes', 'candidate'),
(26, 'রিয়াদ ', 'riyad@gmail.com', '+৬৫৪৩৮২৫', 'মিরপুর ', '2021-09-06-11-39-5315.png', '1991-12-06', 'male', 'yes', 'candidate'),
(56, 'আবু সায়েম ', 'info.abushaim@gmail.com', '+৭৮২৬৪৮২৩', 'গ্যান্ড অ্যাভিনিউ পার্ক ', '2021-09-08-04-45-0116.png', '2001-12-08', 'male', 'yes', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `eduID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `board` varchar(255) NOT NULL,
  `result` varchar(10) NOT NULL,
  `candidateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`eduID`, `title`, `year`, `board`, `result`, `candidateID`) VALUES
(18, 'Computer Science', '2012', 'Comilla Board', '5.00', 19),
(19, 'Engineering', '2000', 'Barisal Bord', '3.50', 20),
(21, 'Diploma in Engineering', '2009', 'Dhaka Board', '5.00', 22),
(23, 'Arts and creativity ', '2005', 'Jessore Board', '5.00', 24),
(24, 'Economics', '2005', 'Mymensingh Board', '4.00', 25),
(25, 'Finance and Banking ', '2005', 'Rajshahi Board', '4.00', 26),
(36, 'Master of Business Administration-MBA', '2011', 'Dhaka Board', '4.50', 56);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dptID` int(11) NOT NULL,
  `dptName` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dptID`, `dptName`, `status`) VALUES
(13, 'Staff recruitment and selection.', 'active'),
(14, 'Onboarding of new recruits.', 'active'),
(15, 'Staff training and development.', 'active'),
(16, 'Managing salaries, benefits and allowances.', 'active'),
(17, 'Absence, annual leave and time-off tracking.', 'active'),
(18, 'Employee performance evaluation.', 'active'),
(19, 'Creation of well-being policies.', 'active'),
(20, 'Creation of career paths and promotions.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `dptID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `hire_date` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `dptID`, `name`, `email`, `phone`, `dob`, `gender`, `address`, `photo`, `hire_date`, `designation`, `basic_salary`, `password`) VALUES
(16, 13, ' আলী ছাত্তার ', 'sattar@gmail.com', '+৯৮৬৮৭৬৪৭৬ ', '1990-12-06', 'male', 'মিরপুর  ', '2021-09-06-06-41-531.png', '2010-12-06', ' Human Resources Manager', '0.00', '  12345'),
(17, 14, ' নাহার', 'nahar@gmail.com', '+৭৮৫৩৪৮২৯৭৫৯২ ', '1991-12-06', 'female', 'ধানমন্ডি ', '2021-09-06-06-44-004.png', '2011-12-06', ' Recruitment specialist', '0.00', '  123'),
(35, 15, ' আবু সায়েম ', 'info.abushaim@gmail.com', '+৬৫৭৬', '2001-12-08', 'male', 'আজিমপুর', '2021-09-08-04-46-3116.png', '2021-09-06', ' HR Manager', '0.00', ' 123'),
(36, 14, 'নাহার', 'tania@gmail.com', '+75348297592', '1990-12-06', 'female', 'ধানমন্ডি', '2021-09-10-09-33-30', '2021-08-02', ' office executive', '0.00', '123');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `exoenseID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('cash','bank') NOT NULL,
  `bankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`exoenseID`, `categoryID`, `date`, `amount`, `method`, `bankID`) VALUES
(9, 4, '2021-08-04', '8000.00', 'cash', 0),
(10, 5, '2021-08-02', '20000.00', 'cash', 0),
(11, 4, '2021-08-04', '5000.00', 'cash', 1),
(12, 6, '2021-08-18', '3000.00', 'bank', 4),
(13, 4, '2021-09-03', '10.00', 'cash', 1),
(14, 4, '2021-08-04', '1000.00', 'bank', 1),
(15, 4, '2021-08-10', '5000.00', 'bank', 4),
(16, 4, '2021-08-10', '5000.00', 'bank', 4),
(17, 5, '2021-08-13', '3000.00', 'cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category_name`, `status`) VALUES
(4, 'Mobile Bill', 'active'),
(5, 'salary payment', 'active'),
(6, 'Net bill', 'active'),
(8, 'demo Expense ', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holidayID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holidayID`, `title`, `start_date`, `end_date`) VALUES
(7, 'National Mourning Day', '2021-08-11', '2021-08-12'),
(8, 'Janmashtami', '2021-09-30', '2021-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `incomeID` int(11) NOT NULL,
  `sourceID` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('cash','bank') NOT NULL,
  `bankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`incomeID`, `sourceID`, `date`, `amount`, `method`, `bankID`) VALUES
(2, 2, '2021-08-03', '40000.00', 'bank', 1),
(8, 9, '2021-08-12', '70000.00', 'bank', 7),
(9, 8, '2021-09-07', '5000.00', 'cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `income_source`
--

CREATE TABLE `income_source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_source`
--

INSERT INTO `income_source` (`id`, `name`, `status`) VALUES
(2, 'Software sale', 'active'),
(8, 'service', 'active'),
(9, 'Consultancy ', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `job_experience`
--

CREATE TABLE `job_experience` (
  `jobID` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `organization` text NOT NULL,
  `joining_date` date NOT NULL,
  `resign_date` date NOT NULL,
  `candidateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_experience`
--

INSERT INTO `job_experience` (`jobID`, `designation`, `organization`, `joining_date`, `resign_date`, `candidateID`) VALUES
(17, 'Brand Marketing Manager', ' PRAN-RFL Group.', '2011-12-06', '2013-12-06', 19),
(18, 'Communications Specialist', 'ACI Group Limited.', '2010-12-06', '2012-12-06', 20),
(19, 'Marketing Specialist', 'Bashundhara Group.', '2009-12-06', '2011-12-06', 22),
(21, 'Brand Ambassador', 'Square Group.', '2015-12-06', '2016-12-06', 24),
(22, 'Financial risk analyst.', 'Abul Khair Group.', '2017-12-06', '2018-07-06', 25),
(23, 'Economic Researcher.', 'Akij Group.', '2017-12-06', '2018-12-06', 26),
(43, 'Product Manager', 'Aarong.', '2018-12-08', '2020-12-08', 56),
(44, 'Digital Marketing Manager', 'Yellow.', '2014-12-08', '2018-12-08', 56);

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `applicationID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comment` text NOT NULL,
  `status` enum('applied','approved','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`applicationID`, `empID`, `typeID`, `start_date`, `end_date`, `comment`, `status`) VALUES
(10, 16, 5, '2021-09-07', '2021-09-08', 'sick', 'approved'),
(15, 17, 5, '2021-08-10', '2021-08-11', 'Sick', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `typeID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `allowed_leave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`typeID`, `title`, `allowed_leave`) VALUES
(5, 'Casual leave', 5),
(8, 'Maternity leave', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `date`, `details`) VALUES
(2, '   corona Virus   ', '2021-01-20', 'corona virus is ...'),
(3, 'Holiday', '2021-05-20', 'Many desktop pub...'),
(4, ' Demoo notice	    ', '2021-07-15', 'Some Description......');

-- --------------------------------------------------------

--
-- Table structure for table `salary_month`
--

CREATE TABLE `salary_month` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `generate_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_month`
--

INSERT INTO `salary_month` (`id`, `month`, `generate_date`) VALUES
(2, '2021-05', '2021-07-01'),
(4, '2021-08', '2021-08-02'),
(19, '2021-07', '2021-09-08'),
(20, '2021-06', '2021-09-08'),
(21, '2021-02', '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment`
--

CREATE TABLE `salary_payment` (
  `paymentID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `bankID` int(11) NOT NULL,
  `monthID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_payment`
--

INSERT INTO `salary_payment` (`paymentID`, `empID`, `payment_date`, `amount`, `payment_method`, `bankID`, `monthID`) VALUES
(16, 16, '2021-09-07', '10950.00', 'cash', 0, 4),
(17, 17, '2021-09-07', '9210.00', 'cash', 0, 4),
(18, 16, '2021-09-08', '14300.00', 'cash', 0, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`eduID`),
  ADD KEY `candidateID` (`candidateID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dptID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `dptID` (`dptID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`exoenseID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `bankID` (`bankID`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`incomeID`),
  ADD KEY `sourceID` (`sourceID`),
  ADD KEY `bankID` (`bankID`);

--
-- Indexes for table `income_source`
--
ALTER TABLE `income_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `candidateID` (`candidateID`);

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_month`
--
ALTER TABLE `salary_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `bankID` (`bankID`),
  ADD KEY `monthID` (`monthID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bankID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `candidate_education`
--
ALTER TABLE `candidate_education`
  MODIFY `eduID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `exoenseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holidayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `incomeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `income_source`
--
ALTER TABLE `income_source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_experience`
--
ALTER TABLE `job_experience`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_month`
--
ALTER TABLE `salary_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salary_payment`
--
ALTER TABLE `salary_payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD CONSTRAINT `candidate_education_ibfk_1` FOREIGN KEY (`candidateID`) REFERENCES `candidate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dptID`) REFERENCES `department` (`dptID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `expense_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_ibfk_2` FOREIGN KEY (`sourceID`) REFERENCES `income_source` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_experience`
--
ALTER TABLE `job_experience`
  ADD CONSTRAINT `job_experience_ibfk_1` FOREIGN KEY (`candidateID`) REFERENCES `candidate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD CONSTRAINT `leave_application_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_application_ibfk_2` FOREIGN KEY (`typeID`) REFERENCES `leave_type` (`typeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD CONSTRAINT `salary_payment_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_payment_ibfk_2` FOREIGN KEY (`monthID`) REFERENCES `salary_month` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
