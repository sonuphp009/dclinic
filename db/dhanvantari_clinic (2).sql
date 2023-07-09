-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 05:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhanvantari_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `rid` int(11) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `mobileno` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `student_type` varchar(30) NOT NULL,
  `clinic_reg_id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `stud_marks` varchar(10) NOT NULL,
  `std_language` varchar(20) NOT NULL,
  `std_board` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `paid_status` varchar(10) NOT NULL,
  `live_status` varchar(10) NOT NULL,
  `active_status` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`rid`, `profile_pic`, `name`, `address`, `mobileno`, `email`, `password`, `user_id`, `user_type`, `student_type`, `clinic_reg_id`, `class`, `stud_marks`, `std_language`, `std_board`, `user_email`, `patient_id`, `paid_status`, `live_status`, `active_status`, `time`, `is_delete`) VALUES
(2, '', 'OM CLINIC', '', '9021205731`', 'sonu.thakare009@gmail.com', 'sonu1234', 0, 'super_admin', '', 1, '', '', '', '', '', 0, '', '', '', '2021-02-04 18:01:38', 0),
(9, 'asset/user_pic/vlcsnap-2020-07-01-09h53m57s146.png', 'DHANVANTARI CLINIC', 'Nashik', '9021205731', 'dr.sachin@gmail.com', 'sachin1234', 0, 'admin', '', 5, '', '', '', '', '', 0, '', 'online', 'active', '2021-06-28 16:51:22', 0),
(20, 'asset/user_pic/download.jfif', 'sumit  pawar', '', '9021205731', 'sumit@1234', '9021205731', 0, 'patient', '', 0, '', '', '', '', '', 1, '', '', '', '2021-08-31 09:53:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_content`
--

CREATE TABLE `tbl_add_content` (
  `content_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `content_type` varchar(20) NOT NULL,
  `content_title` varchar(100) NOT NULL,
  `content_desc` text NOT NULL,
  `content_path` varchar(200) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_add_content`
--

INSERT INTO `tbl_add_content` (`content_id`, `clinic_id`, `content_type`, `content_title`, `content_desc`, `content_path`, `is_delete`) VALUES
(1, 5, 'services', 'demo', 'demo service rs 300', 'asset/content/download.jfif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment_schedule`
--

CREATE TABLE `tbl_appointment_schedule` (
  `schedule_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `appointment_date` varchar(30) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `time_slot` varchar(5) NOT NULL,
  `day` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment_schedule`
--

INSERT INTO `tbl_appointment_schedule` (`schedule_id`, `clinic_id`, `appointment_date`, `start_time`, `end_time`, `time_slot`, `day`, `status`, `is_delete`) VALUES
(1, 5, '2021-09-01', '09:43', '21:43', '15', 'Wed', 'Available', 0),
(2, 5, '2021-09-02', '09:43', '21:43', '15', 'Thu', 'Available', 0),
(3, 5, '2021-09-03', '09:43', '21:43', '15', 'Fri', 'Available', 0),
(4, 5, '2021-09-04', '09:43', '21:43', '15', 'Sat', 'Available', 0),
(5, 5, '2021-09-05', '09:43', '21:43', '15', 'Sun', 'Available', 0),
(6, 5, '2021-09-06', '09:43', '21:43', '15', 'Mon', 'Available', 0),
(7, 5, '2021-09-07', '09:43', '21:43', '15', 'Tue', 'Available', 0),
(8, 5, '2021-09-08', '09:43', '21:43', '15', 'Wed', 'Available', 0),
(9, 5, '2021-09-09', '09:43', '21:43', '15', 'Thu', 'Available', 0),
(10, 5, '2021-09-10', '09:43', '21:43', '15', 'Fri', 'Available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chief_complaints`
--

CREATE TABLE `tbl_chief_complaints` (
  `chief_id` int(11) NOT NULL,
  `complaint` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chief_complaints`
--

INSERT INTO `tbl_chief_complaints` (`chief_id`, `complaint`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 'fever', 5, '2021-08-31 09:54:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chief_complaints_details`
--

CREATE TABLE `tbl_chief_complaints_details` (
  `chief_detail_id` int(11) NOT NULL,
  `chief_complaint_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chief_complaints_details`
--

INSERT INTO `tbl_chief_complaints_details` (`chief_detail_id`, `chief_complaint_id`, `patient_id`, `opd_id`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 1, 1, 1, 5, '2021-08-31 09:54:34', 0),
(2, 1, 0, 0, 5, '2021-09-06 09:35:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic_master`
--

CREATE TABLE `tbl_clinic_master` (
  `clinic_id` int(11) NOT NULL,
  `clinic_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `mobile_no` varchar(20) CHARACTER SET utf8 NOT NULL,
  `reg_date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `expiry_date` varchar(20) NOT NULL,
  `reg_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `reg_count` int(11) NOT NULL,
  `clinic_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `clinic_address` text CHARACTER SET utf8 NOT NULL,
  `clinic_password` varchar(20) CHARACTER SET utf8 NOT NULL,
  `clinic_image` varchar(150) CHARACTER SET utf8 NOT NULL,
  `clinic_active_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `clinic_emr` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_clinic_master`
--

INSERT INTO `tbl_clinic_master` (`clinic_id`, `clinic_name`, `mobile_no`, `reg_date`, `expiry_date`, `reg_status`, `reg_count`, `clinic_email`, `clinic_address`, `clinic_password`, `clinic_image`, `clinic_active_status`, `clinic_emr`, `time`, `is_delete`) VALUES
(1, 'OM CLINIC', '9021205731`', '2021-02-20', '', 'Online', 0, 'sonu.thakare009@gmail.com', 'nashik', 'sonu1234', 'asset/clinic_logo/fbf.png', 'activated', '', '2021-02-04 18:01:38', 0),
(5, 'DHANVANTARI CLINIC', '9021205731', '2021-06-29', '2022-06-29', 'Offline', 0, 'dr.sachin@gmail.com', 'nashik', 'sachin1234', 'asset/clinic_logo/vlcsnap-2020-07-01-17h54m52s855.jpg', 'activated', 'Generel EMR', '2021-06-28 16:51:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_master`
--

CREATE TABLE `tbl_contact_master` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `contact_note` text NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosis`
--

CREATE TABLE `tbl_diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diagnosis`
--

INSERT INTO `tbl_diagnosis` (`diagnosis_id`, `diagnosis`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 'headech', 5, '2021-08-31 09:54:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosis_details`
--

CREATE TABLE `tbl_diagnosis_details` (
  `diagnosis_detail_id` int(11) NOT NULL,
  `diagnosis_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diagnosis_details`
--

INSERT INTO `tbl_diagnosis_details` (`diagnosis_detail_id`, `diagnosis_id`, `patient_id`, `opd_id`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 1, 1, 1, 5, '2021-08-31 09:54:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dose_master`
--

CREATE TABLE `tbl_dose_master` (
  `dose_id` int(11) NOT NULL,
  `dose_name` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dose_time`
--

CREATE TABLE `tbl_dose_time` (
  `fld_dose_id` int(11) NOT NULL,
  `fld_dose` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fld_ins_mar` text CHARACTER SET utf8 NOT NULL,
  `fld_ins_hin` text CHARACTER SET utf8 NOT NULL,
  `fld_ins_other` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dose_time`
--

INSERT INTO `tbl_dose_time` (`fld_dose_id`, `fld_dose`, `fld_ins_mar`, `fld_ins_hin`, `fld_ins_other`, `clinic_id`, `fld_user_id`, `is_delete`) VALUES
(2, '0 - 1 - 0', 'दुपारी ', '', '', 2, 2, 0),
(3, '0 - 0 - 1', 'रात्री ', '', '', 2, 2, 0),
(4, '1 - 1 - 0', 'सकाळी - दुपारी ', '', '', 2, 2, 0),
(5, '1 - 0 - 1', 'सकाळी - रात्री ', '', '', 2, 2, 0),
(6, '0 - 1 - 1', 'दुपारी - रात्री ', '', '', 2, 2, 0),
(7, '1 - 1 - 1', 'सकाळी - दुपारी - रात्री ', '', '', 2, 2, 0),
(8, '1/5-1/5-1/5', '', '', '', 3, 0, 0),
(9, '1-0-0', '', '', '', 3, 0, 0),
(10, '1-1-1-1', '', '', '', 3, 0, 0),
(11, '1 जेवणानंतर - 0 - 1 ', '', '', '', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fees_master`
--

CREATE TABLE `tbl_fees_master` (
  `id` int(11) NOT NULL,
  `fees` varchar(10) NOT NULL,
  `clinic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fees_master`
--

INSERT INTO `tbl_fees_master` (`id`, `fees`, `clinic_id`) VALUES
(1, '100', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_examination`
--

CREATE TABLE `tbl_general_examination` (
  `gen_exam_id` int(11) NOT NULL,
  `general_examination` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general_examination_details`
--

CREATE TABLE `tbl_general_examination_details` (
  `ge_detail_id` int(11) NOT NULL,
  `ge_id` int(11) NOT NULL,
  `ge_value` varchar(100) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruction`
--

CREATE TABLE `tbl_instruction` (
  `instruction_id` int(11) NOT NULL,
  `fld_instruction` varchar(200) CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instruction`
--

INSERT INTO `tbl_instruction` (`instruction_id`, `fld_instruction`, `clinic_id`, `fld_user_id`, `timestamp`) VALUES
(1, 'Before Dinner', 12, 0, '2017-08-02 16:08:18'),
(2, 'After Dinner', 12, 0, '2017-08-02 16:08:18'),
(3, 'After Breakfast ', 12, 0, '2017-08-02 16:08:18'),
(4, 'Before Breakfast', 12, 0, '2017-08-02 16:08:18'),
(5, 'With Half Water', 12, 0, '2017-08-02 16:08:18'),
(6, ' जेवणाआधी', 12, 21, '2017-08-02 16:08:18'),
(7, ' जेवणानंतर', 12, 21, '2017-08-02 16:08:18'),
(8, ' उपाशीपोटी', 12, 21, '2017-08-02 16:08:18'),
(9, ' नाश्तानंतर', 12, 21, '2017-08-02 16:08:18'),
(10, 'नाश्ताआधी', 12, 20, '2017-08-02 16:08:18'),
(11, 'दुपारी जेवणाआधी', 12, 20, '2017-08-02 16:08:18'),
(12, 'दुपारी जेवणानंतर', 12, 20, '2017-08-02 16:08:18'),
(13, 'रात्री जेवणाआधी', 12, 20, '2017-08-02 16:08:18'),
(14, 'रात्री जेवणानंतर', 12, 20, '2017-08-02 16:08:18'),
(15, 'संध्याकाळी जेवणानंतर', 12, 20, '2017-08-02 16:08:18'),
(16, 'रात्री झोपताना\r\n', 12, 20, '2017-08-02 16:08:18'),
(17, 'सकाळी उपाशीपोटी', 12, 20, '2017-08-02 16:08:18'),
(18, 'एक तास जेवणाआधी', 12, 20, '2017-08-02 16:08:18'),
(19, 'उल्टी झाल्यास', 12, 20, '2017-08-02 16:08:18'),
(20, 'आठवड्यातून एकदा', 12, 20, '2017-08-02 16:08:18'),
(21, 'एक ग्लास पाण्यासोबत', 12, 20, '2017-08-02 16:08:18'),
(22, 'एक कप पाण्यासोबत', 12, 20, '2017-08-02 16:08:18'),
(23, 'दुधाबरोबर', 12, 20, '2017-08-02 16:08:18'),
(24, ' सकाळी--रात्री जेवणानंतर', 12, 0, '2017-08-02 16:08:18'),
(25, ' गरजेनुसार', 12, 0, '2017-08-02 16:08:18'),
(26, 'लावण्यासाठी', 12, 0, '2017-08-02 16:08:18'),
(27, ' अंघोळीसाठी', 12, 0, '2017-08-02 16:08:18'),
(28, ' एक ग्लास कोमट पाण्यात टाकून गुळण्या घेणे', 12, 0, '2017-08-02 16:08:18'),
(29, '  ताप आल्यास,अंग दुखल्यास,डोके दुखल्यास गरजेनुसार', 12, 0, '2017-08-02 16:08:18'),
(30, '२ -२ थेंब टाकणे', 12, 0, '2017-08-02 16:08:18'),
(34, '1 tab after lunch', 2, 0, '2021-05-19 15:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruction_accu`
--

CREATE TABLE `tbl_instruction_accu` (
  `instruction_id` int(11) NOT NULL,
  `fld_instruction` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instruction_accu`
--

INSERT INTO `tbl_instruction_accu` (`instruction_id`, `fld_instruction`, `clinic_id`, `fld_user_id`, `timestamp`) VALUES
(1, ' रोज लवकर झोपने ', 4, 0, '2021-06-08 00:18:49'),
(2, 'सकाळी लवकर उठने ', 4, 0, '2021-06-08 01:13:42'),
(4, 'बंद - दुध / शक्कर / बेकरी प्रॉडक्ट / कोल्ड्रिंक्स ', 5, 0, '2021-06-28 16:54:31'),
(5, 'बंद वात बढ़ानेवाली चीजे जैसे -  मैदा / चना / बैंगन ', 5, 0, '2021-06-28 16:56:10'),
(6, 'पित्त बढ़ाने वाली चीजे जैसे -  तली हुई चीजे / मिर्च मसाला इ.', 5, 0, '2021-06-28 16:57:58'),
(7, 'आपकी जरुरी दवाइया जैसे  - बीपी / शुगर / हृदयरोग आदी.... आपके फिजिशियन  सलाह से लेनी है | ', 5, 0, '2021-06-28 17:00:12'),
(8, 'आपको कोनसी थेरेपी देनी है ये थेरेपिस्ट या डॉक्टर तय करेंगे ', 5, 0, '2021-06-28 17:01:47'),
(9, 'आपको दी हुई चीजे जैसे की - रिंग / मसाजर आदी का प्रयोग जैसे कहा हे वैसे और उतनी बार करना है ', 5, 0, '2021-06-28 17:04:39'),
(10, 'अगर व्यायाम कहा होगा तोहि करना है ', 5, 0, '2021-06-28 17:05:47'),
(11, 'आपको अच्छे परिणाम के लिए सकारात्मक रहना  ये बहुत जरुरी है ', 5, 0, '2021-06-28 17:07:13'),
(12, 'ज्यादा अच्छे परिणाम के लिए आपको नियमित रूपसे थेरेपी लेना आवश्यक है ', 5, 0, '2021-06-28 17:08:22'),
(13, 'हर पेशंट की तकलीफ और वो आनेका समय अलग - अलग है इसिलिए परिणामोका समयभी अलग रहेगा ', 5, 0, '2021-06-28 17:12:49'),
(14, 'कमसे-कम ३ - ४ महीना थेरेपी लेना जरुरी है ', 5, 0, '2021-06-28 17:17:20'),
(15, 'आते समय फोन पर अपॉइंटमेन्ट लेने से आपका  समय बचेगा ', 5, 0, '2021-06-28 17:19:52'),
(16, 'इमरजेंसी पेशंट को ज्यादा वक्त लग सकता है ', 5, 0, '2021-06-28 17:20:57'),
(17, 'अच्छी भावना , अच्छा आहार , अच्छा व्यवहार , सकारात्मकता और नियमित थेरेपी आपको अच्छा परिणाम दे सकती है ', 5, 0, '2021-06-28 17:22:53'),
(18, 'हर समय सहयोग के लिए तयार रहे ', 5, 0, '2021-06-28 17:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruction_accu_details`
--

CREATE TABLE `tbl_instruction_accu_details` (
  `instruction_detail_id` int(11) NOT NULL,
  `instruction_id` int(11) NOT NULL,
  `instruction_details` text CHARACTER SET utf8 NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_instruction_accu_details`
--

INSERT INTO `tbl_instruction_accu_details` (`instruction_detail_id`, `instruction_id`, `instruction_details`, `patient_id`, `opd_id`, `clinic_id`, `time`, `is_delete`) VALUES
(2, 4, 'बंद - दुध / शक्कर / बेकरी प्रॉडक्ट / कोल्ड्रिंक्स ', 1, 1, 5, '2021-06-28 17:28:29', 0),
(3, 5, 'बंद वात बढ़ानेवाली चीजे जैसे -  मैदा / चना / बैंगन ', 1, 1, 5, '2021-06-28 17:28:32', 0),
(14, 18, 'हर समय सहयोग के लिए तयार रहे ', 0, 0, 5, '2021-08-17 13:15:37', 0),
(15, 10, 'अगर व्यायाम कहा होगा तोहि करना है ', 3, 15, 5, '2021-08-17 13:52:00', 0),
(16, 6, 'पित्त बढ़ाने वाली चीजे जैसे -  तली हुई चीजे / मिर्च मसाला इ.', 3, 15, 5, '2021-08-24 06:41:22', 0),
(17, 4, 'बंद - दुध / शक्कर / बेकरी प्रॉडक्ट / कोल्ड्रिंक्स ', 1, 1, 5, '2021-08-31 09:55:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instruction_new_add`
--

CREATE TABLE `tbl_instruction_new_add` (
  `instrucntion_id` int(11) NOT NULL,
  `fld_instruction` varchar(200) CHARACTER SET utf8 NOT NULL,
  `hos_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_investigation`
--

CREATE TABLE `tbl_investigation` (
  `investigation_id` int(11) NOT NULL,
  `investigation` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_investigation_details`
--

CREATE TABLE `tbl_investigation_details` (
  `investigation_detail_id` int(11) NOT NULL,
  `investigation_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_chat`
--

CREATE TABLE `tbl_master_chat` (
  `chat_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_msg` text NOT NULL,
  `patient_msg` text NOT NULL,
  `msg_date` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_medicine`
--

CREATE TABLE `tbl_master_medicine` (
  `medicine_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `medicine_name` text DEFAULT NULL,
  `qty` varchar(3) NOT NULL,
  `instruction_id` int(11) NOT NULL,
  `dose_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_medicine`
--

INSERT INTO `tbl_master_medicine` (`medicine_id`, `clinic_id`, `medicine_name`, `qty`, `instruction_id`, `dose_id`, `is_delete`) VALUES
(1, 5, 'demo 1', '2', 12, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_medicine_add`
--

CREATE TABLE `tbl_master_medicine_add` (
  `medicine_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `medicine_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_master_medicine_add`
--

INSERT INTO `tbl_master_medicine_add` (`medicine_id`, `hos_id`, `medicine_name`) VALUES
(1, 2, '1 AL TAB'),
(2, 2, '3WAY STOP COCK'),
(3, 2, '5 % DEXTROSE 500ML'),
(4, 2, '7-LA SUSP. 200ML'),
(5, 2, 'A TO Z NS TAB'),
(6, 2, 'ABSOLUT WOMEN TAB.'),
(7, 2, 'ACECLO MR TAB'),
(8, 2, 'ACECLO PLUS TAB'),
(9, 2, 'ACECLO TAB'),
(10, 2, 'ACITROM 1MG TAB'),
(11, 2, 'ACITROM 2MG TAB'),
(12, 2, 'ACIVIR 200 DT TAB'),
(13, 2, 'ACIVIR 400 DT TAB'),
(14, 2, 'ACIVIR 800 DT TAB'),
(15, 2, 'ACIVIR CREAM 5GM'),
(16, 2, 'ACIVIR EYE OINT 5 GM'),
(17, 2, 'ACIVIR IV'),
(18, 2, 'ACNESTAR GEL'),
(19, 2, 'ACUCAL TAB'),
(20, 2, 'ADESAM 200MG TAB'),
(21, 2, 'AEROCORT FORTE ROTACAPS'),
(22, 2, 'AEROCORT INHALER'),
(23, 2, 'AEROCORT ROTACAPS'),
(24, 2, 'AGINAL AT TAB'),
(25, 2, 'AKT 3 KIT'),
(26, 2, 'AKT 4 KIT'),
(27, 2, 'AKURIT 3 TAB'),
(28, 2, 'AKURIT-4'),
(29, 2, 'ALBUMEN CARE 200GM'),
(30, 2, 'ALBUREL IV 20GM 100ML'),
(31, 2, 'ALBUTAMOL TABLET'),
(32, 2, 'ALDACTONE 25MG TAB'),
(33, 2, 'ALDACTONE 50 TAB'),
(34, 2, 'ALERID D TAB'),
(35, 2, 'ALERID TAB'),
(36, 2, 'ALEVO 250MG TAB'),
(37, 2, 'ALLEGRA 120MG TAB'),
(38, 2, 'ALLEGRA 180MG TAB'),
(39, 2, 'ALLEGRA 30MG TAB'),
(40, 2, 'ALLERCET COLD TAB'),
(41, 2, 'ALLERCET DC TAB'),
(42, 2, 'ALOES COMPOUND TAB'),
(43, 2, 'ALPRAX 0.25MG TAB'),
(44, 2, 'ALPRAX 0.5MG TAB'),
(45, 2, 'ALTHROCIN 250MG TAB'),
(46, 2, 'ALUPENT 10MG TAB'),
(47, 2, 'AMARYL 1MG TAB'),
(48, 2, 'AMARYL 2MG TAB'),
(49, 2, 'AMARYL M 1MG TAB'),
(50, 2, 'AMBACTUM 1.5gm'),
(51, 2, 'AMBRODIL S 100ML SYP'),
(52, 2, 'AMIKAMAC 500 ING.'),
(53, 2, 'AMINOPHYLLINE INJ 10ML'),
(54, 2, 'AMIXIDE H TAB'),
(55, 2, 'AMIXIDE TAB'),
(56, 2, 'AMLODAC 2.5'),
(57, 2, 'AMLOKATH L TAB'),
(58, 2, 'AMLOKIND  H TAB'),
(59, 2, 'AMLOKIND 10MG TAB'),
(60, 2, 'AMLOKIND 5 TAB'),
(61, 2, 'AMLOKIND AT TAB'),
(62, 2, 'AMLONG 10MG TAB'),
(63, 2, 'AMLONG 2.5MG TAB'),
(64, 2, 'AMLOPIN 5MG TAB'),
(65, 2, 'AMLOPRES 5MG TAB'),
(66, 2, 'AMLOPRES AT 25MG TAB'),
(67, 2, 'AMLOPRES AT TAB'),
(68, 2, 'AMLOPRES-L TAB'),
(69, 2, 'AMLOSAFE H TAB'),
(70, 2, 'AMLOVAS  AT'),
(71, 2, 'AMLOVAS 2.5 MG  15 TAB'),
(72, 2, 'AMLOVAS 5  15 TAB'),
(73, 2, 'AMLOVAS H TAB'),
(74, 2, 'AMLOVAS L TAB'),
(75, 2, 'AMLOVAS OL TAB'),
(76, 2, 'AMLOVAS-10MG'),
(77, 2, 'AMLOVAS-XM 5/50 TAB'),
(78, 2, 'AMODEP 5 TAB'),
(79, 2, 'AMPHOTRET 50 INJ'),
(80, 2, 'AMTAS E TAB'),
(81, 2, 'AMTAS H 25MG.'),
(82, 2, 'AMTAS H 50MG.'),
(83, 2, 'AMTAS M 50MG TAB'),
(84, 2, 'ANAWIN 0.5% INJ 20ML'),
(85, 2, 'ANEKET INJ 10ML'),
(86, 2, 'ANEKET INJ 2ML'),
(87, 2, 'ANGIZEM CD 120 TAB'),
(88, 2, 'ANGIZEM CD 90 CAP'),
(89, 2, 'ANOVATE CREAM 20GM'),
(90, 2, 'ANTIDEP 25MG TAB'),
(91, 2, 'ANXIT 0.25'),
(92, 2, 'ANXIT PLUS TAB'),
(93, 2, 'ANXIT-0.5'),
(94, 2, 'APIMORE 200ML SYP'),
(95, 2, 'APTIMUST SYRUP 200ML'),
(96, 2, 'APTIVATE SYP 200ML'),
(97, 2, 'AQUAVIRON INJ 1ML'),
(98, 2, 'ARACHITOL 3 LAC INJ'),
(99, 2, 'ARACHITOL 6 LAC INJ'),
(100, 2, 'ARKAMIN H TAB'),
(101, 2, 'ARKAMIN TAB'),
(102, 2, 'ARM SLING POUCH (LARGE)'),
(103, 2, 'ARM SLING POUCH (MEDIUM)'),
(104, 2, 'ARNOPEN CAP'),
(105, 2, 'ARSHONYT FORTE TAB'),
(106, 2, 'ASA 50MG TAB'),
(107, 2, 'ASOMEX 2.5 MG TAB'),
(108, 2, 'ASOMEX 5MG TAB'),
(109, 2, 'ASOMEX AT TAB'),
(110, 2, 'ASOMEX D TAB'),
(111, 2, 'ASOMEX-D 5MG TAB'),
(112, 2, 'ASTHALIN 100ML SYP'),
(113, 2, 'ASTHALIN 2MG'),
(114, 2, 'ASTHALIN 4  30TAB'),
(115, 2, 'ASTHALIN INHALER 200METER'),
(116, 2, 'ASTHALIN RESPULES 2.5 ML'),
(117, 2, 'ASTHALIN ROTACAPS'),
(118, 2, 'ASTHALIN SA 4MG TAB'),
(119, 2, 'ATARAX 100ML SYP'),
(120, 2, 'ATARAX 10MG TAB'),
(121, 2, 'ATARAX 25MG TAB'),
(122, 2, 'ATARAX DROPS 15ML'),
(123, 2, 'ATCHOL-10mg'),
(124, 2, 'ATEN 25MG TAB'),
(125, 2, 'ATIVAN 1MG'),
(126, 2, 'ATIVAN 2MG TAB'),
(127, 2, 'ATOCOR 10MG TAB'),
(128, 2, 'ATOCOR 40MG TAB'),
(129, 2, 'ATORLIP 10MG TAB'),
(130, 2, 'ATORLIP 20MG TAB'),
(131, 2, 'ATORVA 10 TAB'),
(132, 2, 'ATORVA 20 TAB'),
(133, 2, 'AUGMENTIN 625 DUO TAB'),
(134, 2, 'AUTRIN CAP'),
(135, 2, 'AVIL 25MG TAB'),
(136, 2, 'AVIL 50MG TAB'),
(137, 2, 'AVIL INJ (10ML)'),
(138, 2, 'AVIL INJ (2ML)'),
(139, 2, 'AZEE 500 TAB'),
(140, 2, 'AZEE 500MG INJ'),
(141, 2, 'AZITHRAL 200 LIQ. 15ML'),
(142, 2, 'AZITHRAL 250MG TAB'),
(143, 2, 'AZITHRAL 500 TAB'),
(144, 2, 'AZORAN TAB'),
(145, 2, 'AZTOR ASP 150 TAB'),
(146, 2, 'AZTOR ASP 75 CAP'),
(147, 2, 'B-BACT OINTMENT 5GM'),
(148, 2, 'B-PROTIN 200GM POWDER CHOCOLAT'),
(149, 2, 'BACTRIM DS TAB'),
(150, 2, 'BAMBUDIL 10MG TAB'),
(151, 2, 'BANDAGE 4INCH'),
(152, 2, 'BANDAGE 6INCH'),
(153, 2, 'BANDY PLUS SUSP 10ML'),
(154, 2, 'BANDY PLUS-6 TAB'),
(155, 2, 'BANGSHIL TAB'),
(156, 2, 'BASALOG 1ML INJ'),
(157, 2, 'BASALOG 5ML INJ'),
(158, 2, 'BASALOG REFIL'),
(159, 2, 'BD 2ML EMERALD SYRING'),
(160, 2, 'BD DISCARDIT 10ML'),
(161, 2, 'BD DISCARDIT 5ML'),
(162, 2, 'BD EMERALD SYRIN 10ML'),
(163, 2, 'BECLATE 200 ROTACAP'),
(164, 2, 'BECOSULES CAP'),
(165, 2, 'BECOZINC CAP'),
(166, 2, 'BECOZYME C FORTE TAB'),
(167, 2, 'BENADON 40MG TAB'),
(168, 2, 'BENICORT 4MG ING.'),
(169, 2, 'BENZOSED'),
(170, 2, 'BEPLEX FORTE TAB'),
(171, 2, 'BETA NICARDIA CAPS'),
(172, 2, 'BETACAP 10MG TAB'),
(173, 2, 'BETACAP 20 TAB'),
(174, 2, 'BETACAP PLUS 10 CAP'),
(175, 2, 'BETACAP TR 40MG CAP'),
(176, 2, 'BETACARD 25 TAB'),
(177, 2, 'BETACARD 50 TAB'),
(178, 2, 'BETACARD AM TAB'),
(179, 2, 'BETADINE GERMICIDE GARGLE 50ML'),
(180, 2, 'BETADINE OINT 125GM'),
(181, 2, 'BETADINE OINT 15GM'),
(182, 2, 'BETADINE VAGINAL PESSARIES'),
(183, 2, 'BETALOC 25 MG'),
(184, 2, 'BETALOC 50MG TAB'),
(185, 2, 'BETAVERT 16MG TAB'),
(186, 2, 'BETAVERT 8MG TAB'),
(187, 2, 'BETNESOL 0.5MG TAB'),
(188, 2, 'BETNOVATE C SK OINT'),
(189, 2, 'BETNOVATE CREAM (20GM)'),
(190, 2, 'BETNOVATE GM SK OINT'),
(191, 2, 'BETNOVATE N SK OINT'),
(192, 2, 'BETONIN 170ML SYP'),
(193, 2, 'BIGOMET 250 TAB'),
(194, 2, 'BIGOMET 500 TAB'),
(195, 2, 'BIGOMET 850MG TAB'),
(196, 2, 'BIGOMET SR 500 TAB'),
(197, 2, 'BILOVAS TAB'),
(198, 2, 'BONNISAN 120ML SYP'),
(199, 2, 'BONNISAN DROPS 30ML'),
(200, 2, 'BRESOL TAB'),
(201, 2, 'BRITEMIN-D3 SACHET'),
(202, 2, 'BRO ZEET SYP 100ML'),
(203, 2, 'BRO-ZEDEX 100ML SYP'),
(204, 2, 'BRUFEN 200MG TAB'),
(205, 2, 'BRUFEN 400MG TAB'),
(206, 2, 'BRUFEN 600MG TAB'),
(207, 2, 'BRUFEN MR CAP'),
(208, 2, 'BUDAMATE 200 TRANSCAPS'),
(209, 2, 'BUDAMATE 400 TRANSCAP'),
(210, 2, 'BUDAMATE FORTE TRANSCAP'),
(211, 2, 'BUDECORT 0.5MG RESPULES 2ML'),
(212, 2, 'BUDECORT 100 INHALER'),
(213, 2, 'BUDECORT 200 ROTACAPS'),
(214, 2, 'BUDECORT 400 ROTACAPS'),
(215, 2, 'BURNHEAL CREAM 15GM'),
(216, 2, 'BUSCOPAN INJ 1ML'),
(217, 2, 'BUSCOPAN TAB'),
(218, 2, 'C-FURO 1.5gm'),
(219, 2, 'CABERLIN 0.25MG TAB'),
(220, 2, 'CABGOLIN 0.25 TAB'),
(221, 2, 'CALAPTIN 40MG TAB'),
(222, 2, 'CALAPTIN 80MG TAB'),
(223, 2, 'CALCIMAX 500 TAB'),
(224, 2, 'CALCIMAX FORTE TAB'),
(225, 2, 'CALCIMAX ISO CAP'),
(226, 2, 'CALCIUM SANDOZ 10% 10ML INJ'),
(227, 2, 'CALCURY TAB'),
(228, 2, 'CALDIKIND SACHET 1G'),
(229, 2, 'CALMPOSE 2ML INJECTION'),
(230, 2, 'CALPOL 500MG TAB'),
(231, 2, 'CANDID V GEL 30GM'),
(232, 2, 'CANESTEN 6 TAB'),
(233, 2, 'CANESTEN CREAM 15GM'),
(234, 2, 'CANESTEN VAGINAL CREAM 30GM'),
(235, 2, 'CANULA FIXATOR'),
(236, 2, 'CAPRIN 1000 INJ'),
(237, 2, 'CAPRIN 5000 INJ'),
(238, 2, 'CARDACE 1.25MG CAP'),
(239, 2, 'CARDACE 5 TAB'),
(240, 2, 'CARDACE H 5MG TAB'),
(241, 2, 'CARDIVAS 12.5 TAB'),
(242, 2, 'CARDIVAS 3.125 TAB'),
(243, 2, 'CARDIVAS 6.25 TAB'),
(244, 2, 'CARMICIDE ADULTS SYP 100ML'),
(245, 2, 'CARMICIDE PED SYP 100ML'),
(246, 2, 'CARNISURE 500MG TAB'),
(247, 2, 'CARNISURE ING'),
(248, 2, 'CARTIGEN 1500 TAB'),
(249, 2, 'CARTIGEN CAPS'),
(250, 2, 'CATASPA TAB'),
(251, 2, 'CEFADROX 125MG DRY SYP 30ML'),
(252, 2, 'CEFBACT 1000 ING.'),
(253, 2, 'CEFEXE 200'),
(254, 2, 'CEGAVA 1.5GM'),
(255, 2, 'CEGAVA 1GM'),
(256, 2, 'CELIN 500MG TAB'),
(257, 2, 'CELOL CAP'),
(258, 2, 'CENTRAL VENOUS  CATHETERIZATIO'),
(259, 2, 'CENTRAL VENOUS  CATHETERIZATIO'),
(260, 2, 'CEPODEM 200 TAB'),
(261, 2, 'CERUVIN A 75+75 CAP'),
(262, 2, 'CERUVIN AF 75+150 CAP.'),
(263, 2, 'CERVICAL COLLAR M'),
(264, 2, 'CERVICAL COLLAR S'),
(265, 2, 'CERVIPRIME GEL 0.5MG 30GM'),
(266, 2, 'CETIL 500 TAB.'),
(267, 2, 'CHERICOF 60ML SYP'),
(268, 2, 'CHYMORAL FORTE TAB'),
(269, 2, 'CHYMORAL TAB'),
(270, 2, 'CIFRAN 500 TAB'),
(271, 2, 'CIFRAN OD 500MG TAB'),
(272, 2, 'CILACAR 10MG TAB'),
(273, 2, 'CILADUO 10MG TAB'),
(274, 2, 'CIPLACTIN TAB'),
(275, 2, 'CIPLAR LA 40 TAB'),
(276, 2, 'CIPLAR-10  15TAB'),
(277, 2, 'CIPLAR-40 MG  15TAB'),
(278, 2, 'CIPLOX 100MG TAB'),
(279, 2, 'CIPLOX 250MG TAB'),
(280, 2, 'CIPLOX 500MG TAB'),
(281, 2, 'CIPLOX D E/E DROPS 10ML'),
(282, 2, 'CIPLOX E/E DROP 5ML'),
(283, 2, 'CIPLOX-TZ TAB'),
(284, 2, 'CIPROLET 500MG TAB'),
(285, 2, 'CIPROLET TAB'),
(286, 2, 'CITAL LIQ 100ML'),
(287, 2, 'CITISTAR PM'),
(288, 2, 'CITRAVITE TAB'),
(289, 2, 'CITRO SODA SACHET'),
(290, 2, 'CLARIBID 500 TAB'),
(291, 2, 'CLARINA CREAM 30GM'),
(292, 2, 'CLAVAM 1.2GM INJ'),
(293, 2, 'CLAVAM 625 TAB'),
(294, 2, 'CLAVAM DRY SYRUP 30ML'),
(295, 2, 'CLAVIX TAB'),
(296, 2, 'CLAVIX-AS 75TAB'),
(297, 2, 'CLINAXON-P TAB'),
(298, 2, 'CLINGEN VAGINAL SUPPO.'),
(299, 2, 'CLOFERT 100MG TAB'),
(300, 2, 'CLOFERT 25MG TAB'),
(301, 2, 'CLOHEX PLUS 150ML MOUTHWASH'),
(302, 2, 'CLOPITAB A 150 CAP'),
(303, 2, 'CLOPITAB A 75 CAP'),
(304, 2, 'CLOPITAB TAB'),
(305, 2, 'CLOPIVAS 300'),
(306, 2, 'CLOPIVAS 75'),
(307, 2, 'CLOPIVAS AP 150MG TAB'),
(308, 2, 'CLOPIVAS AP 75 TAB'),
(309, 2, 'COBADEX CZS TAB'),
(310, 2, 'COBADEX FORTE CAP'),
(311, 2, 'COGNIPRO 60MG ING'),
(312, 2, 'COLIMEX TAB'),
(313, 2, 'COLIRID TAB'),
(314, 2, 'COMBIFLAM 60ML SUSP'),
(315, 2, 'COMBIFLAM TAB'),
(316, 2, 'COMBUTOL 1000 TAB'),
(317, 2, 'COMPLAMINA RETARD 500MG TAB'),
(318, 2, 'COMPLAMINA TAB'),
(319, 2, 'CONCOR COR 2.5 TAB'),
(320, 2, 'CONFIDO TAB'),
(321, 2, 'CONTRAPAQUE 350'),
(322, 2, 'CORDARONE 150MG/3ML INJ'),
(323, 2, 'CORDARONE X TAB'),
(324, 2, 'CORDERONE TAB'),
(325, 2, 'COREX COUGH SYP 100 ML'),
(326, 2, 'COREX COUGH SYP 50 ML'),
(327, 2, 'CORT-S 100MG INJ'),
(328, 2, 'CORVELA TAB'),
(329, 2, 'COTTON WOOL  200GM'),
(330, 2, 'CRANMED CAP'),
(331, 2, 'CREMAFFIN LAXATIVE 170ML (MINT'),
(332, 2, 'CREMALAX TAB'),
(333, 2, 'CREON 10000 CAP'),
(334, 2, 'CREON 25000 CAP'),
(335, 2, 'CREPE BANDAGE 15CM X 4MTR'),
(336, 2, 'CREPE BANDAGE 5CM X 4MTR.'),
(337, 2, 'CREPE BANDAGE 6CM X 4M'),
(338, 2, 'CRESAR AM TAB'),
(339, 2, 'CUTINORM CREAM 40GM'),
(340, 2, 'CYCLO-MEFF TAB'),
(341, 2, 'CYCLOPAM 2ML INJ'),
(342, 2, 'CYCLOPAM SYP 30ML'),
(343, 2, 'CYCLOPAM TAB'),
(344, 2, 'CYPON CAPS'),
(345, 2, 'CYRA D CAP'),
(346, 2, 'CYSTONE SYP 200ML'),
(347, 2, 'CYSTONE TAB'),
(348, 2, 'CZ 3 TAB'),
(349, 2, 'D-PROTIN 200GM CHOCLATE FLAVOU'),
(350, 2, 'D3 SHOT 60K CAP'),
(351, 2, 'D3 SHOT SACHETS'),
(352, 2, 'DABUR LAL DANTMANJAN 60GM'),
(353, 2, 'DAFLON 500 TAB'),
(354, 2, 'DAKTARIN GEL 20GM'),
(355, 2, 'DALACIN C 150MG CAP'),
(356, 2, 'DALACIN C 300MG CAP'),
(357, 2, 'DALACIN C 300MG INJ 2ML'),
(358, 2, 'DAONIL'),
(359, 2, 'DAONIL M TAB'),
(360, 2, 'DAYO OD 500 TAB'),
(361, 2, 'DECA-DURABOLIN 25MG INJ'),
(362, 2, 'DECA-DURABOLIN 50MG INJ'),
(363, 2, 'DECDAN TAB'),
(364, 2, 'DEFCORT 1 TAB'),
(365, 2, 'DEFCORT 6 TAB'),
(366, 2, 'DEFCORT TM'),
(367, 2, 'DEFSTAR 6'),
(368, 2, 'DEFZA 6MG TAB'),
(369, 2, 'DELCON SYP 60ML'),
(370, 2, 'DELCON TAB'),
(371, 2, 'DENTACAIN GEL 10GM'),
(372, 2, 'DEPIN 10MG CAP'),
(373, 2, 'DEPIN 5MG CAP'),
(374, 2, 'DEPLATT A 150 TAB'),
(375, 2, 'DEPLATT A 75 TAB'),
(376, 2, 'DEPO-MEDROL 40MG INJ 1ML'),
(377, 2, 'DEPO-MEDROL 40MG INJ 2ML'),
(378, 2, 'DEPO-PROVERA 150MG INJ'),
(379, 2, 'DEPRAN TAB'),
(380, 2, 'DEPSONIL 25MG TAB'),
(381, 2, 'DEPSONIL DZ TAB'),
(382, 2, 'DEPSONIL PM 75 CAP'),
(383, 2, 'DERICIP RETARD 300'),
(384, 2, 'DERIPHYLLIN  TAB'),
(385, 2, 'DERIPHYLLIN INJ 2ML'),
(386, 2, 'DERIPHYLLIN RETARD 150MG TAB'),
(387, 2, 'DERIPHYLLIN RETARD 300MG TAB'),
(388, 2, 'DERISONE FORTE RESPICAPS'),
(389, 2, 'DERISONE RESPICAPS'),
(390, 2, 'DESENSE Dental gel'),
(391, 2, 'DETTOL ORIGINAL SOAP 35GM'),
(392, 2, 'DEXONA 2ML INJ'),
(393, 2, 'DEXTROSE 25% INJ'),
(394, 2, 'DEZACOR 6MG TAB'),
(395, 2, 'DIABECON TAB'),
(396, 2, 'DIAMICRON MR TAB'),
(397, 2, 'DIAMOX 0.25 TAB'),
(398, 2, 'DIANORM M'),
(399, 2, 'DIAPER ADULT 2 PAD (LARGE)'),
(400, 2, 'DIAPER ADULT 2 PAD (MEDIUM)'),
(401, 2, 'DIAPER ADULT 5 PAD (LARGE)'),
(402, 2, 'DIAREX TAB'),
(403, 2, 'DICLOMOL TAB'),
(404, 2, 'DICLORAN A TAB'),
(405, 2, 'DICORATE ER 250 TAB'),
(406, 2, 'DIGENE ORENGE'),
(407, 2, 'DILCONTIN 60 TAB'),
(408, 2, 'DILZEM 30MG TAB'),
(409, 2, 'DILZEM 60MG TAB'),
(410, 2, 'DIOVOL SUSP. 170ML (MINT)'),
(411, 2, 'DISOGEL 175ML (CARDAMOM)'),
(412, 2, 'DISPO VAN 20ML'),
(413, 2, 'DISPO VAN 2ML'),
(414, 2, 'DISPO VAN 50ML'),
(415, 2, 'DISPOSABLE NO 21 1'),
(416, 2, 'DISPOSABLE NO 22'),
(417, 2, 'DISPOVAN NEEDLE NO23'),
(418, 2, 'DITIDE TAB'),
(419, 2, 'DIVAA 500MG TAB'),
(420, 2, 'DIVAA OD 250MG TAB'),
(421, 2, 'DK2'),
(422, 2, 'DNS 500ML (FRE-KABI)'),
(423, 2, 'DOLO 650MG TAB'),
(424, 2, 'DOLOGEL CT GEL (10GM)'),
(425, 2, 'DOLOGEL GEL 15GM'),
(426, 2, 'DOLONEX 2ML INJ'),
(427, 2, 'DOLONEX DT 20MG TAB'),
(428, 2, 'DOMIN INJ 5ML'),
(429, 2, 'DOMSTAL 10MG TAB'),
(430, 2, 'DOTAMIN INJ 5ML'),
(431, 2, 'DOXINATE  PLUS  TAB'),
(432, 2, 'DOXINATE OD'),
(433, 2, 'DOXINATE TAB'),
(434, 2, 'DOXOLIN TAB'),
(435, 2, 'DOXT-S TAB'),
(436, 2, 'DOXY-1 L-DR FORTE CAP'),
(437, 2, 'DROTIN A TAB'),
(438, 2, 'DROTIN DS TAB'),
(439, 2, 'DROTIN INJ 2ML'),
(440, 2, 'DROTIN M TAB'),
(441, 2, 'DROTIN TAB'),
(442, 2, 'DROVERA INJ'),
(443, 2, 'DULCOLAX SUPP CHILDREN'),
(444, 2, 'DULCOLAX TAB'),
(445, 2, 'DUOFLAM  TAB'),
(446, 2, 'DUOFLAM GEL 10GM'),
(447, 2, 'DUOFLAM KID TAB'),
(448, 2, 'DUOFLAM PLUS TAB'),
(449, 2, 'DUOLIN RESPULES 2.5ML'),
(450, 2, 'DUOLIN ROTACAPS'),
(451, 2, 'DUOLUTON L TAB'),
(452, 2, 'DUOVA ROTACAPS'),
(453, 2, 'DUOVIR N TAB'),
(454, 2, 'DUOVIR TAB (10 TAB)'),
(455, 2, 'DUPHALAC 100ML SOLUTION'),
(456, 2, 'DUPHALAC 200ML SOLUTION'),
(457, 2, 'DUPHASTON 10MG TAB'),
(458, 2, 'DURAPAIN TAB'),
(459, 2, 'DUTAS CAP'),
(460, 2, 'DUTAS T'),
(461, 2, 'DUVADILAN 2ML INJ'),
(462, 2, 'DUVADILAN RETARD CAPS'),
(463, 2, 'DUZELA 20MG CAP'),
(464, 2, 'DUZELA M 20 CAP'),
(465, 2, 'DVION SACHET'),
(466, 2, 'DYNAPAR AQ 1ML INJ'),
(467, 2, 'DYNAPAR TABS'),
(468, 2, 'DYNAPLAST BANDAGE 10CM X 1M'),
(469, 2, 'DYSMEN TABS'),
(470, 2, 'DYTOR 10 15TAB'),
(471, 2, 'DYTOR 100MG TAB'),
(472, 2, 'DYTOR 20MG TAB'),
(473, 2, 'DYTOR 40MG TAB'),
(474, 2, 'DYTOR 5MG TAB'),
(475, 2, 'DYTOR INJ 2ML'),
(476, 2, 'DYTOR PLUS 10'),
(477, 2, 'DYTOR PLUS 10 TAB'),
(478, 2, 'DYTOR PLUS 5 TAB'),
(479, 2, 'DYTOR PLUS LS'),
(480, 2, 'E-COD PLUS CAP'),
(481, 2, 'E.T. TUBE NO.8 (PROTEX)'),
(482, 2, 'EBUDENSE-HD TAB'),
(483, 2, 'Ebufer XT SUSP.'),
(484, 2, 'ECG CHESTLEADS'),
(485, 2, 'ECONORM SACHET'),
(486, 2, 'ECOSPRIN 150MG TAB'),
(487, 2, 'ECOSPRIN 325 TAB'),
(488, 2, 'ECOSPRIN 75MG TAB'),
(489, 2, 'ECOSPRIN AV 150MG CAPS'),
(490, 2, 'ECOSPRIN AV 75MG CAP'),
(491, 2, 'ECOSPRIN GOLD 10'),
(492, 2, 'EDASTAR INJ. 20ML'),
(493, 2, 'ELECTRAL 21.80G SACHET'),
(494, 2, 'ELOCON 5GM CREAM'),
(495, 2, 'ELTROXIN 100MCG TAB'),
(496, 2, 'ELTROXIN 50MCG TAB'),
(497, 2, 'EMANZEN FORTE TAB'),
(498, 2, 'EMANZEN-D  TAB'),
(499, 2, 'EMESET 8 MG TAB'),
(500, 2, 'EMIDOXYN 5MG TAB'),
(501, 2, 'EMSET 2ML INJ'),
(502, 2, 'EMSET 4 TAB'),
(503, 2, 'ENAM 5MG TAB'),
(504, 2, 'ENAPRIL HT TAB'),
(505, 2, 'ENCEPHABOL 100 TAB'),
(506, 2, 'ENCEPHABOL 200 TAB'),
(507, 2, 'ENCLEX 40'),
(508, 2, 'ENCLEX 40MG INJ'),
(509, 2, 'ENCLEX 60MG.ING'),
(510, 2, 'ENCORATE 300 TAB'),
(511, 2, 'ENCORATE 500 TAB'),
(512, 2, 'ENCORATE CHRONO 200 TAB'),
(513, 2, 'ENCORATE CHRONO 300 TAB'),
(514, 2, 'ENCORATE CHRONO 500 TAB'),
(515, 2, 'ENO SACHET LEMON'),
(516, 2, 'ENTEROQUINOL TAB'),
(517, 2, 'ENUFF 100 CAP'),
(518, 2, 'ENVAS 10MG TAB'),
(519, 2, 'ENZAR FORTE TAB'),
(520, 2, 'ENZOFLAM TAB'),
(521, 2, 'ENZOMAC TAB'),
(522, 2, 'EPIDOSIN 1ML INJ'),
(523, 2, 'EPILIVE 250MG TAB'),
(524, 2, 'EPILIVE 500MG TAB'),
(525, 2, 'EPILIVE INJ'),
(526, 2, 'EPINEURON'),
(527, 2, 'EPORISE 4000 INJ'),
(528, 2, 'EPTOIN'),
(529, 2, 'EPTOIN 50MG INJ 2ML'),
(530, 2, 'EQUILIBRIUM 10MG TAB'),
(531, 2, 'ESGIPYRIN TAB'),
(532, 2, 'ESOMAC IV'),
(533, 2, 'ESOSTED TAB'),
(534, 2, 'ESPAZINE 1 MG TAB'),
(535, 2, 'ESPAZINE 5MG TAB'),
(536, 2, 'ESPAZINE PLUS TAB'),
(537, 2, 'ETHASYL 250 TAB'),
(538, 2, 'ETHASYL 2ML INJ'),
(539, 2, 'ETIZALA 0.25MG'),
(540, 2, 'ETIZOLA 0.5MG TAB'),
(541, 2, 'ETO-SALBETOL TAB'),
(542, 2, 'ETRIK 90MG TAB'),
(543, 2, 'EVALON CREAM 15GM'),
(544, 2, 'EVALON FORTE TAB'),
(545, 2, 'EVALON TAB'),
(546, 2, 'EVATOCIN 1ML INJ'),
(547, 2, 'EVECARE 200ML SYP'),
(548, 2, 'EVECARE CAPS'),
(549, 2, 'EVION 200MG CAP'),
(550, 2, 'EVION 400MG CAP'),
(551, 2, 'EVION LC TAB'),
(552, 2, 'EVOCORT ROTACAPS 200'),
(553, 2, 'EVOCORT ROTACAPS 400'),
(554, 2, 'EXAMINATION GLOVES (M)'),
(555, 2, 'EXELYTE ORAL SALINE'),
(556, 2, 'EXERMET 500 TAB'),
(557, 2, 'EXERMET 850'),
(558, 2, 'EXERMET GM 501 TAB'),
(559, 2, 'EXERMET GM 502 TAB'),
(560, 2, 'EXTENSION LINE 100CM'),
(561, 2, 'F-HEEL CUSHION(FEMALE'),
(562, 2, 'FALCIGO ING 60mg'),
(563, 2, 'FALCIGO SP KIT'),
(564, 2, 'FARONEM 200 TAB'),
(565, 2, 'FASIGYN 500 TABS'),
(566, 2, 'FASIGYN DS TAB'),
(567, 2, 'FEBREX PLUS DS 60ML SYP'),
(568, 2, 'FEBREX PLUS TAB'),
(569, 2, 'FEBRINIL 15ML INJ'),
(570, 2, 'FEBRINIL 2ML INJ'),
(571, 2, 'FEEDING TUBE NO 8'),
(572, 2, 'FEEDING TUBE NO 9'),
(573, 2, 'FEFOL-Z CAP'),
(574, 2, 'FEMILON  TAB'),
(575, 2, 'FEMIX HERBAL CAPS'),
(576, 2, 'FERIUM ING. 10ML'),
(577, 2, 'FERIUM SYP 150ML'),
(578, 2, 'FERSOFT Z TAB'),
(579, 2, 'FERSOLATE CM TAB'),
(580, 2, 'FIBRIL POWDER 100GM'),
(581, 2, 'FLAGYL  200  TAB'),
(582, 2, 'FLAGYL 400 TAB'),
(583, 2, 'FLAMAR-MX TAB'),
(584, 2, 'FLANZEN -D TAB'),
(585, 2, 'FLATUNA TAB'),
(586, 2, 'FLAVEDON MR TAB'),
(587, 2, 'FLAVOSPAS-O TAB'),
(588, 2, 'FLEXON 60ML SUSP'),
(589, 2, 'FLEXON MR TAB'),
(590, 2, 'FLEXON TAB'),
(591, 2, 'FLODART PLUS CAP'),
(592, 2, 'FLOMIST NASAL SPRAY 10ML'),
(593, 2, 'FLORICOT TAB'),
(594, 2, 'FLOVITE 5MG TAB'),
(595, 2, 'FLUCOS 150MG TAB'),
(596, 2, 'FLUCOS GEL 15GM'),
(597, 2, 'FLUDAC 10 CAPS'),
(598, 2, 'FLUNARIN 10 TAB'),
(599, 2, 'FLUNARIN 5 TAB'),
(600, 2, 'FLUTIVATE SKIN CREAM 10GM'),
(601, 2, 'FLUWEL TAB'),
(602, 2, 'FOL 123'),
(603, 2, 'FOLEY BALLOON CATHETER NO.14'),
(604, 2, 'FOLIMUST D'),
(605, 2, 'FOLINEXT D'),
(606, 2, 'FOLVITE TAB'),
(607, 2, 'FOLYES CATHETAR NO 14'),
(608, 2, 'FOLYES CATHETAR NO 16'),
(609, 2, 'FONDAFLO SOLUTON'),
(610, 2, 'FORACORT 200 INHALER'),
(611, 2, 'FORACORT 200 ROTACAPS'),
(612, 2, 'FORACORT 400 ROTACAPS'),
(613, 2, 'FORACORT FORTE INHALER'),
(614, 2, 'FORACORT FORTE ROTACAPS'),
(615, 2, 'FORCAN 100ML IV'),
(616, 2, 'FORCAN 150 TAB'),
(617, 2, 'FORCAN 200MG TAB'),
(618, 2, 'FORECOX TAB'),
(619, 2, 'FORTEGE TAB'),
(620, 2, 'FORTICAL M'),
(621, 2, 'FORTUM 1GM INJ'),
(622, 2, 'FORTWIN ING'),
(623, 2, 'FOSOLIN INJ 10ML'),
(624, 2, 'FOSOLIN INJ 2ML'),
(625, 2, 'FRISIUM 10MG TAB'),
(626, 2, 'FRISIUM 5MG TAB'),
(627, 2, 'FRUMIL TAB'),
(628, 2, 'FRUSELAC DS TAB'),
(629, 2, 'FRUSELAC TAB'),
(630, 2, 'FULSED 1MG/ML 10ML INJ'),
(631, 2, 'FUSIGEN OINT 10GM'),
(632, 2, 'G32 TAB'),
(633, 2, 'GABAMIN TAB'),
(634, 2, 'GABANTIN 300 CAP'),
(635, 2, 'GABAPIN 100MG TAB'),
(636, 2, 'GABAPIN 300MG CAP'),
(637, 2, 'GALACT GRANULES 200GM'),
(638, 2, 'GANATON 50MG TAB'),
(639, 2, 'GARDENAL 30MG TAB'),
(640, 2, 'GARDENAL-60  TAB'),
(641, 2, 'GAROIN TAB'),
(642, 2, 'GASEX SYP 200ML'),
(643, 2, 'GASEX TAB'),
(644, 2, 'GELUSIL MPS 200 ML'),
(645, 2, 'GELUSIL MPS TAB'),
(646, 2, 'GEMCAL CAP'),
(647, 2, 'GEMCAL D3 CAP'),
(648, 2, 'GEMCAL DS CAP'),
(649, 2, 'GEMER 1 TAB'),
(650, 2, 'GEMER 2 TAB'),
(651, 2, 'GEMIDRO TAB'),
(652, 2, 'GEMINOR 1MG TAB'),
(653, 2, 'GEMITROL CAP'),
(654, 2, 'GENEVAC B INJ 1DOSE'),
(655, 2, 'GENTICYN 80MG 2ML INJ'),
(656, 2, 'GERBISA SUPP'),
(657, 2, 'GERBISA TAB'),
(658, 2, 'GERIFLO CAP'),
(659, 2, 'GLIMER 1MG TAB'),
(660, 2, 'GLIMESTAR M2 TAB'),
(661, 2, 'GLIMESTAR PM2 TAB'),
(662, 2, 'GLIMY 1 TAB'),
(663, 2, 'GLIMY MP2 TAB'),
(664, 2, 'GLIMY-2'),
(665, 2, 'GLIZID  M  TAB'),
(666, 2, 'GLIZID 80MG TAB'),
(667, 2, 'GLIZID M OD 60'),
(668, 2, 'GLIZID M TAB'),
(669, 2, 'GLOVES NO  6'),
(670, 2, 'GLOVES NO  61/2'),
(671, 2, 'GLOVES NO  7'),
(672, 2, 'GLOVES NO  71/2'),
(673, 2, 'GLUCOBAY 25MG TAB'),
(674, 2, 'GLUCOBAY 50MG TAB'),
(675, 2, 'GLUCONORM G 1'),
(676, 2, 'GLUCONORM G PLUS 1TAB.'),
(677, 2, 'GLUCONORM G1 TAB'),
(678, 2, 'GLUCONORM G2 FORTE TAB'),
(679, 2, 'GLUCONORM VG 1'),
(680, 2, 'GLUCONORM-G 2'),
(681, 2, 'GLUCONORM-VG 2'),
(682, 2, 'GLUFORMIN 500 TAB'),
(683, 2, 'GLUFORMIN 850 TABS'),
(684, 2, 'GLUFORMIN G1 TAB'),
(685, 2, 'GLUFORMIN G2 TAB'),
(686, 2, 'GLUFORMIN XL 500 TAB'),
(687, 2, 'GLYCINORM 40 TAB'),
(688, 2, 'GLYCINORM 80 TAB'),
(689, 2, 'GLYCINORM M 40 TAB'),
(690, 2, 'GLYCIPHAGE 250MG TAB'),
(691, 2, 'GLYCIPHAGE 500 TAB'),
(692, 2, 'GLYCIPHAGE 850MG TAB'),
(693, 2, 'GLYCIPHAGE G1 TAB'),
(694, 2, 'GLYCIPHAGE G2 TAB'),
(695, 2, 'GLYCIPHAGE SR 500MG'),
(696, 2, 'GLYCIPHAGE SR1 TAB'),
(697, 2, 'GLYCODIN COUGH SYP 50ML'),
(698, 2, 'GLYCOMET 1GM TAB'),
(699, 2, 'GLYCOMET 250MG TAB'),
(700, 2, 'GLYCOMET 500 SR'),
(701, 2, 'GLYCOMET 500MG TAB'),
(702, 2, 'GLYCOMET 850 SR TAB'),
(703, 2, 'GLYCOMET 850MG TAB'),
(704, 2, 'GLYCOMET GP 0.5'),
(705, 2, 'GLYCOMET GP 1'),
(706, 2, 'GLYCOMET GP 1 FORTE TAB'),
(707, 2, 'GLYCOMET GP 2 FORTE TAB'),
(708, 2, 'GLYCOMET GP-2'),
(709, 2, 'GLYCOMET-GP 2'),
(710, 2, 'GLYKIND M TAB'),
(711, 2, 'GLYNASE MF TAB'),
(712, 2, 'GLYRED M TAB'),
(713, 2, 'GLYREE-M  1 TAB'),
(714, 2, 'GLYREE-M  2 TAB'),
(715, 2, 'GLYTOP 10SR TAB'),
(716, 2, 'GRANDEM 1ML ING.'),
(717, 2, 'GRANISET 1MG TAB'),
(718, 2, 'GRD SMART POWDER 200GM {SWISS'),
(719, 2, 'GRILINCTUS SYP 100ML'),
(720, 2, 'GRILINCTUS-CD SYRUP 100ML'),
(721, 2, 'GRISOVIN FP TAB'),
(722, 2, 'GUDCEF 100MG TAB'),
(723, 2, 'GUDCEF 200MG TAB'),
(724, 2, 'GUM TONE GEL 50GM'),
(725, 2, 'GYANE CVP CAPS'),
(726, 2, 'GYPSONA 15CM X 2.7M'),
(727, 2, 'HAEM UP LIQ 200ML'),
(728, 2, 'HAES STERIL 6% 500ML IV'),
(729, 2, 'HAES-STERIL 3%'),
(730, 2, 'HAJMOLA SACHET'),
(731, 2, 'HALLENS ADULT SUPPO.'),
(732, 2, 'HALLENS SUPPOSITORIES INFANT'),
(733, 2, 'HALOTHANE I.P. 85 30ML'),
(734, 2, 'HARPOON 200MG TAB'),
(735, 2, 'HCQS TAB'),
(736, 2, 'HEMFER CAPS'),
(737, 2, 'HEMSI SYP. 200ML'),
(738, 2, 'HEPAMERZ 10ML AMP'),
(739, 2, 'HEPAMERZ GRANULES 5GM'),
(740, 2, 'HERMIN INJ 200ML'),
(741, 2, 'HERPEX 200 TAB'),
(742, 2, 'HETRAZAN 100'),
(743, 2, 'HIFEN 200DT TAB'),
(744, 2, 'HIFEN 50 SUSP 30ML'),
(745, 2, 'HIFEN 50DT TAB'),
(746, 2, 'HIFEN AZ 125 MG TAB.'),
(747, 2, 'HIFEN-AZ 250'),
(748, 2, 'HIMCOCID 200ML SYP'),
(749, 2, 'HIORA MOUTH WASH REGULER'),
(750, 2, 'HIORA-SG'),
(751, 2, 'HISTAC EVT TAB'),
(752, 2, 'HOMOCHEK CAP'),
(753, 2, 'HOSIT 1ML INJ'),
(754, 2, 'HP-KIT TAB'),
(755, 2, 'HUMAN ACTRAPID 40IU ML'),
(756, 2, 'HUMAN INSULATARD 40 INSULIN IN'),
(757, 2, 'HUMAN MIXACT H INJ'),
(758, 2, 'HUMAN MIXTARD 40 INSULIN INJ.'),
(759, 2, 'HUMAN MIXTARD 50 INSULIN INJ'),
(760, 2, 'HUMINSULIN 30/70 CARTRIDGES'),
(761, 2, 'HUMINSULIN R 10ML INJ'),
(762, 2, 'HYDROHEAL AM'),
(763, 2, 'HYDROHEAL AM.'),
(764, 2, 'HYOCIMAX ING'),
(765, 2, 'HYPOTHANE'),
(766, 2, 'IBUGESIC 200MG TAB'),
(767, 2, 'IBUGESIC 400 TAB'),
(768, 2, 'IBUGESIC 600 TAB'),
(769, 2, 'ICIKINASE INJ 1500000'),
(770, 2, 'IMICELUM 500+500'),
(771, 2, 'IMODIUM CAP'),
(772, 2, 'IMOL PLUS TAB'),
(773, 2, 'INDERAL 10MG TAB'),
(774, 2, 'INDERAL 40MG TAB'),
(775, 2, 'INFLACHEK-D'),
(776, 2, 'INOSERT 50MG TAB'),
(777, 2, 'INSUGEN-R INSULIN INJ 10ML'),
(778, 2, 'INSUPEN EASE INJ'),
(779, 2, 'IODEX 20GM'),
(780, 2, 'IPRAVENT ROTACAPS'),
(781, 2, 'ISMO 10 TAB'),
(782, 2, 'ISMO 20 TAB'),
(783, 2, 'ISOKIN-300 TAB'),
(784, 2, 'ISOLAZINE TAB.'),
(785, 2, 'ISONORM 10MG TAB'),
(786, 2, 'ISONORM 30 SR TAB'),
(787, 2, 'ISORDIL 5MG TAB'),
(788, 2, 'ISTAVEL  50mg. TAB.'),
(789, 2, 'IV METRONIDAZOLE 100'),
(790, 2, 'IV SET POLYMED'),
(791, 2, 'JANUMET 50/500 TAB.'),
(792, 2, 'JONAC SUPPOSITORIES 100MG'),
(793, 2, 'JUSTIN SUPPOSITORIES 100MG'),
(794, 2, 'KEFBACTAM 1GM INJ'),
(795, 2, 'KENACORT 1% PASTE 5GM'),
(796, 2, 'KENACORT 40MG INJ 1ML'),
(797, 2, 'KENADION 10MG ING'),
(798, 2, 'KENADION-1 INJ'),
(799, 2, 'KESOL-20 SYP 200ML'),
(800, 2, 'KETOROL 1ML INJ'),
(801, 2, 'KIDICARE PLUS 200ML SYP'),
(802, 2, 'KIT KATH NO 20'),
(803, 2, 'KIT KATH NO 22'),
(804, 2, 'KOFAREST SF SYRUP'),
(805, 2, 'KOFAREST-DX LINCTUS 60ML'),
(806, 2, 'KOFOL 100ML SYP'),
(807, 2, 'KYRAB 10MG TAB'),
(808, 2, 'KYRAB-D TAB'),
(809, 2, 'LACTIFIBER GRANULES 90GM'),
(810, 2, 'LAMIVIR 150MG TAB'),
(811, 2, 'LANOXIN 0.25MG TAB'),
(812, 2, 'LANTUS 10ML INJ'),
(813, 2, 'LARINATE'),
(814, 2, 'LASILACTONE 50MG TAB'),
(815, 2, 'LASIX 40MG TAB'),
(816, 2, 'LEDER-CATH 2 (REF 81266017I)'),
(817, 2, 'LEPTADEN TAB'),
(818, 2, 'LESURIDE ING.'),
(819, 2, 'LEVEMIR FLEXPEN 3ML'),
(820, 2, 'LEVEPSY ING.'),
(821, 2, 'LEVOCET M TAB'),
(822, 2, 'LEVOFLOX 250MG TAB'),
(823, 2, 'LEVOFLOX 500MG IV 100ML'),
(824, 2, 'LEVOFLOX 500MG TAB'),
(825, 2, 'LEVOFLOX 750 TAB'),
(826, 2, 'LEXANOX 5GM PASTE'),
(827, 2, 'LIBOTRIP DS TAB'),
(828, 2, 'LIBOTRYP TAB'),
(829, 2, 'LIBRIUM 10MG TAB'),
(830, 2, 'LIBRIUM 25MG TAB'),
(831, 2, 'LIV 52 DS SYP 100ML'),
(832, 2, 'LIV 52 DS TAB'),
(833, 2, 'LIV 52 SYP (100ML)'),
(834, 2, 'LIV 52 TAB'),
(835, 2, 'LIVOGEN Z TAB.'),
(836, 2, 'LIVOMYN SYP 100ML'),
(837, 2, 'LIVOMYN SYP 60ML'),
(838, 2, 'LIVOSIL UD FORTE TAB.'),
(839, 2, 'LIZOMAC-CX'),
(840, 2, 'LOBATE GM NEO CREAM 15GM'),
(841, 2, 'LONAZEP 0.5MG TAB'),
(842, 2, 'LORA INJ 2ML'),
(843, 2, 'LORI 2ML INJ'),
(844, 2, 'LORNIT INJ 10ML'),
(845, 2, 'LORSAID OD TAB'),
(846, 2, 'LOSANORM 50 H TAB'),
(847, 2, 'LOSAR A TAB'),
(848, 2, 'LOSIUM 25MG TAB'),
(849, 2, 'LOSIUM 50MG TAB'),
(850, 2, 'LOSTAT 50 TAB'),
(851, 2, 'LOSTAT H TAB'),
(852, 2, 'LOX 10% SPRAY 50ML'),
(853, 2, 'LOX 2% INJ 30ML'),
(854, 2, 'LOX 2% JELLY 30GM'),
(855, 2, 'LUBRIJOINT 500 TAB'),
(856, 2, 'LUKOL TAB'),
(857, 2, 'LUMBAR SACRO BELT(S)'),
(858, 2, 'LUPENOX 40MG/0.4ML SYRINGES'),
(859, 2, 'LUPENOX 60MG/0.6ML INJ'),
(860, 2, 'LUPIBOSE 62.5MG TAB'),
(861, 2, 'LUPIFLO 1500000IU INJ'),
(862, 2, 'LUPISULIN-M 30/70-40IV'),
(863, 2, 'M2 TONE TAB'),
(864, 2, 'MACALVIT 500 TABS'),
(865, 2, 'MACROZIDE 500 TAB'),
(866, 2, 'MACROZIDE 750 TAB'),
(867, 2, 'MACSART 20MG TAB'),
(868, 2, 'MACSART 40MG TAB'),
(869, 2, 'MACSART AM TAB'),
(870, 2, 'MACSART H TAB'),
(871, 2, 'MACTOR 10MG TAB'),
(872, 2, 'MACTOR 20MG TAB'),
(873, 2, 'MACTOR EZ TAB'),
(874, 2, 'MACVESTIN 250MG TAB'),
(875, 2, 'MACZEAL CAP'),
(876, 2, 'MAHACEF OZ TAB'),
(877, 2, 'MAHAGABA-M 75 CAP'),
(878, 2, 'MAHANARAYAN TAILA 100ML'),
(879, 2, 'MAINTANE 250 INJ 1ML'),
(880, 2, 'MAINTANE 500 INJ 1ML'),
(881, 2, 'MALIRID  TAB'),
(882, 2, 'MALIRID DS TAB'),
(883, 2, 'MALIRID TAB'),
(884, 2, 'MANITOL 100ML IV'),
(885, 2, 'MANNITOL 20% 100ML INJ'),
(886, 2, 'MATILDA FORTE CAP'),
(887, 2, 'MAXERON 10ML INJ'),
(888, 2, 'MAXIFLO 250 ROTACAPS'),
(889, 2, 'MAXOTAZ 4.5 INJ'),
(890, 2, 'MAZETOL 200 TAB'),
(891, 2, 'MCBM-DHA CAP'),
(892, 2, 'MEBASPA TAB'),
(893, 2, 'MEBEX TAB'),
(894, 2, 'MEFTAL P TAB'),
(895, 2, 'MEFTAL- SPAS TAB'),
(896, 2, 'MEFTAL-TX TAB'),
(897, 2, 'MEGAPEN 1000MG INJ'),
(898, 2, 'MENABOL 2MG TAB'),
(899, 2, 'MENTAT 200ML SYP'),
(900, 2, 'MEPRATE 2.5 MG TAB'),
(901, 2, 'MEPRESSO 1GM INJ'),
(902, 2, 'MEPRESSO 500MG INJ'),
(903, 2, 'MESACOL 400MG TAB'),
(904, 2, 'METADOZE-IPR 500 TAB'),
(905, 2, 'METGLAR 1MG TAB'),
(906, 2, 'METHARGIN 1ML INJ'),
(907, 2, 'METHARGIN TAB'),
(908, 2, 'METHYCOBAL 1 ML INJ'),
(909, 2, 'METO ER 12.5 TAB'),
(910, 2, 'METOCARD AM TAB'),
(911, 2, 'METOCARD XL 12.5MG TAB'),
(912, 2, 'METOCARD XL 25 TAB'),
(913, 2, 'METOCARD XL 50 TAB'),
(914, 2, 'METOLAR 25MG TAB'),
(915, 2, 'METOLAR 50 TAB'),
(916, 2, 'METOLAR XR 100 TAB'),
(917, 2, 'METOLAR XR 2.5MG CAPS'),
(918, 2, 'METOLAR XR 25 CAPS'),
(919, 2, 'METOLAR XR 50MG CAPS'),
(920, 2, 'METOLAR-AM 50MG TAB'),
(921, 2, 'METOSARTAN 25MG TAB.'),
(922, 2, 'METOSARTAN 50 TAB'),
(923, 2, 'METOZ 2.5 TAB'),
(924, 2, 'METOZ 5 TAB'),
(925, 2, 'METPOWER CAP'),
(926, 2, 'METPURE H 50MG TAB'),
(927, 2, 'METPURE H TAB'),
(928, 2, 'METPURE XL 12.5 TAB'),
(929, 2, 'METPURE XL 25 TAB'),
(930, 2, 'METPURE XL 50 TAB'),
(931, 2, 'METPURE-AM 2.5MG TAB'),
(932, 2, 'METPURE-AM 5MG TAB'),
(933, 2, 'METPURE-TEL 40 TAB'),
(934, 2, 'METROGYL 200MG TAB'),
(935, 2, 'METROGYL 400MG TAB'),
(936, 2, 'METROGYL GEL 30GM'),
(937, 2, 'METROGYL INJ 100ML'),
(938, 2, 'MEZOLAM 10ML INJ'),
(939, 2, 'MEZOLAM 5ML INJ'),
(940, 2, 'MICOGEL CREAM 15GM'),
(941, 2, 'MIKACIN 250MG INJ'),
(942, 2, 'MIKACIN 500MG INJ'),
(943, 2, 'MIKASTAR 500MG INJ'),
(944, 2, 'MINIPRESS XL 2.5MG TAB'),
(945, 2, 'MINIPRESS XL 5MG TAB'),
(946, 2, 'MIRTAZ 15 TAB'),
(947, 2, 'MIRTAZ 30 TAB'),
(948, 2, 'MISOPROST 200MG TAB'),
(949, 2, 'MIXOGEN TAB'),
(950, 2, 'MIXTARD 30 HM PENFILL 3ML INJ'),
(951, 2, 'MODLIP 20MG TAB'),
(952, 2, 'MODLIP ASG 20MG'),
(953, 2, 'MONOCEF 1G INJ'),
(954, 2, 'MONOCEF 500MG INJ'),
(955, 2, 'MONOCEF O 100 SYP 30ML'),
(956, 2, 'MONOCEF O 200 TAB'),
(957, 2, 'MONOTRATE 20MG TAB'),
(958, 2, 'MONTAIR 4 TAB'),
(959, 2, 'MONTAIR FX TAB'),
(960, 2, 'MOOV NEEK-SHOLDER SPRAY'),
(961, 2, 'MOTINORM DT 10MG TAB'),
(962, 2, 'MOTIZA 50MG'),
(963, 2, 'MOX 500MG TAB'),
(964, 2, 'MOXCLAV 1.2G INJ'),
(965, 2, 'MOXICIP 400MG TAB'),
(966, 2, 'MOXIF IV 100ML'),
(967, 2, 'MOXIFLOX IV 400MG.'),
(968, 2, 'MOXOVAS 0.2MG TAB'),
(969, 2, 'MOXOVAS 0.3MG TAB'),
(970, 2, 'MPENEX 500 INJ'),
(971, 2, 'MTNL TAB'),
(972, 2, 'MUCAINE GEL MINT'),
(973, 2, 'MUCAINE GEL ORANGE'),
(974, 2, 'MUCINAC 5ML ING.'),
(975, 2, 'MUCINAC 600MG TAB'),
(976, 2, 'MUCINAC INJ 2ML'),
(977, 2, 'MUCOLITE SYP 100ML'),
(978, 2, 'MUSKEL TABS'),
(979, 2, 'MVI INJ'),
(980, 2, 'MYLAMIN CAP'),
(981, 2, 'MYOLAXIN-D GEL 15GM'),
(982, 2, 'MYORIL 4MG CAP'),
(983, 2, 'MYOSPAZ TABS'),
(984, 2, 'MYOSTIGMIN 1ML INJ'),
(985, 2, 'N.S.SALINE 500 ML'),
(986, 2, 'NACHANI SATVA'),
(987, 2, 'NADOXIN CREAM 10GM'),
(988, 2, 'NAPROSYN 250 TAB'),
(989, 2, 'NAPROSYN 500 TAB'),
(990, 2, 'NASIVION 0.01% (MINI) 10ML'),
(991, 2, 'NASIVION 0.05% NASAL DROPS 10M'),
(992, 2, 'NASOMIST NASAL SPRAY 20ML'),
(993, 2, 'NATRILIX SR TAB'),
(994, 2, 'NEBULIZER WITH MASK (ADULT)'),
(995, 2, 'NEERI 100ML SYP'),
(996, 2, 'NEO TAB (SILVER)'),
(997, 2, 'NEOCURON 2ML INJ'),
(998, 2, 'NEOGADINE ELIXER 300ML'),
(999, 2, 'NEOROF 10ML INJ'),
(1000, 2, 'NEOROF 20ML INJ'),
(1001, 2, 'NEOSPORIN OINT 20GM'),
(1002, 2, 'NEOSPORIN OINT 5GM'),
(1003, 2, 'NEOSPORIN POWDER 10GM'),
(1004, 2, 'NERVIJEN PLUS 2ML INJ'),
(1005, 2, 'NERVIJEN-P CAP'),
(1006, 2, 'NEUCITI PLUS TAB'),
(1007, 2, 'NEUROBION FORTE INJ 3ML'),
(1008, 2, 'NEUROBION PLUS TAB'),
(1009, 2, 'NEUROCETAM 400MG TAB'),
(1010, 2, 'NEUROCETAM 800 TAB'),
(1011, 2, 'NEXIPRIDE 25MG TAB'),
(1012, 2, 'NEXITO 10 TAB'),
(1013, 2, 'NEXITO 20 TAB'),
(1014, 2, 'NEXPRO RD 20MG CAP'),
(1015, 2, 'NEXPRO RD 40MG CAP'),
(1016, 2, 'NICARDIA CD RETARD 30MG TAB'),
(1017, 2, 'NICARDIA RETARD 10MG TAB'),
(1018, 2, 'NICIP PLUS TAB'),
(1019, 2, 'NICOSTAR 10MG TAB'),
(1020, 2, 'NICOSTAR 5MG TAB'),
(1021, 2, 'NIFEDINE 10 TABS'),
(1022, 2, 'NIKORAN 10MG TAB'),
(1023, 2, 'NIKORAN 5 MG TAB'),
(1024, 2, 'NIKORAN IV 48 INJ'),
(1025, 2, 'NIMEGESIC IR TAB'),
(1026, 2, 'NIMEK PARA TAB'),
(1027, 2, 'NIMEK SPAS TAB'),
(1028, 2, 'NIMODIP TAB'),
(1029, 2, 'NIMSAID P TAB'),
(1030, 2, 'NIMUFLEX MR TAB'),
(1031, 2, 'NIMULID MR TAB'),
(1032, 2, 'NIRMET INJ 100ML'),
(1033, 2, 'NIRMIN 10 PLUS'),
(1034, 2, 'NIRMIN HEPA 8% 500ML INJ'),
(1035, 2, 'NISE MDT TAB'),
(1036, 2, 'NISE MR TAB'),
(1037, 2, 'NISE TAB'),
(1038, 2, 'NITA O TAB'),
(1039, 2, 'NITRAVET 10MG TAB'),
(1040, 2, 'NITRAVET 5MG TAB'),
(1041, 2, 'NITREST 10 TAB'),
(1042, 2, 'NIZER GEL'),
(1043, 2, 'NIZONIDE-O TAB'),
(1044, 2, 'NOBEL  PLUS TAB'),
(1045, 2, 'NOOTROPIL 15ML INJ'),
(1046, 2, 'NORAD ING 2ml'),
(1047, 2, 'NORFLOX 400MG TAB'),
(1048, 2, 'NOSIC TAB'),
(1049, 2, 'NOVA PLUS 75 CAP'),
(1050, 2, 'NOVACLOX 500MG CAPS'),
(1051, 2, 'NOVACLOX LB 500MG CAP'),
(1052, 2, 'NOVAMOX 500 TAB'),
(1053, 2, 'NOVELON TAB'),
(1054, 2, 'NOVOFINE NEEDLE'),
(1055, 2, 'NOVORAPID FLEXPEN 3ML'),
(1056, 2, 'NOVORAPID PENFILL'),
(1057, 2, 'NOVORAPID PENFILL 3ML INJ'),
(1058, 2, 'NS 100ML (FK)'),
(1059, 2, 'NS 500ML (FK)'),
(1060, 2, 'NUFORCE 150 TAB'),
(1061, 2, 'NUROKIND FORTE TAB'),
(1062, 2, 'NUROKIND G TAB'),
(1063, 2, 'NUSAM 200 TAB'),
(1064, 2, 'NUTRIMUNE TAB'),
(1065, 2, 'O2 TAB'),
(1066, 2, 'O2H TAB'),
(1067, 2, 'OCID-D CAP'),
(1068, 2, 'OCTRIDE 100 INJ'),
(1069, 2, 'OCTRIDE 50 INJ'),
(1070, 2, 'OCUVIR EYE OINT 5GM'),
(1071, 2, 'ODOXIL 250MG DT TAB'),
(1072, 2, 'ODOXIL 500 TAB'),
(1073, 2, 'ODOXIL DS 250MG 30 ML SUSP'),
(1074, 2, 'OFLOMAC 200 TAB'),
(1075, 2, 'OFLOMAC 400 TAB'),
(1076, 2, 'OFLOMAC OZ IV'),
(1077, 2, 'OFLOX 200MG TAB'),
(1078, 2, 'OFLOX 400 TAB'),
(1079, 2, 'OJUS 200 ML SYP'),
(1080, 2, 'OLEANZ 5 TAB'),
(1081, 2, 'OLEANZ PLUS TAB'),
(1082, 2, 'OLIMELT 2.5MG TAB'),
(1083, 2, 'OLMESAR 40MG TAB'),
(1084, 2, 'OLMESAR H 40 TAB'),
(1085, 2, 'OLMESAR-H'),
(1086, 2, 'OLMEZEST AM TAB'),
(1087, 2, 'OLVANCE 20MG TAB'),
(1088, 2, 'OME-PPI 20MG CAP'),
(1089, 2, 'OMEZ 10MG CAP'),
(1090, 2, 'OMEZ 20MG CAP'),
(1091, 2, 'OMEZ 40MG INJ'),
(1092, 2, 'OMEZ 40MG TAB'),
(1093, 2, 'OMNACORTIL 5 TAB'),
(1094, 2, 'OMNIGEL 30GM'),
(1095, 2, 'ONDEM 4MG TAB'),
(1096, 2, 'ONDEM 8MG TAB'),
(1097, 2, 'ONDEM INJ 2ML'),
(1098, 2, 'ONDEM MD 4 TAB'),
(1099, 2, 'ONECAN 150MG'),
(1100, 2, 'OPIPROL 50MG.'),
(1101, 2, 'OPOX 100 DT TAB'),
(1102, 2, 'OPOX 100MG DRY SUSP 30ML'),
(1103, 2, 'OPOX PAEDIATRIC DROPS 10ML'),
(1104, 2, 'OPTINEURON INJ 3ML'),
(1105, 2, 'OPTISULIN CAP'),
(1106, 2, 'ORASEP GEL 15ML'),
(1107, 2, 'ORATIL 250MG TAB'),
(1108, 2, 'ORATIL 500MG TAB'),
(1109, 2, 'ORAXIN SYP 200ML'),
(1110, 2, 'ORCIBEST TAB.'),
(1111, 2, 'OREX CREAM 10GM'),
(1112, 2, 'ORLICA 60MG CAP'),
(1113, 2, 'ORNI-O TAB'),
(1114, 2, 'OROFER XT SUSP 150ML'),
(1115, 2, 'ORS  SACHET 21GM'),
(1116, 2, 'ORS-L APPLE DRINK 200ML'),
(1117, 2, 'ORS-L LEMON DRINK 200ML'),
(1118, 2, 'ORS-L PLUS ORANGE DRINK 200ML'),
(1119, 2, 'OSKAR 20 CAP'),
(1120, 2, 'OTRIVIN NASAL DROP 10ML (ADULT'),
(1121, 2, 'OTRIVIN NASAL DROP 10ML (PEAD)'),
(1122, 2, 'OVRAL G TAB'),
(1123, 2, 'OVRAL L TAB'),
(1124, 2, 'OXEPTAL 150 TAB'),
(1125, 2, 'OXEPTAL 300 TAB'),
(1126, 2, 'OXERUTE CD TAB'),
(1127, 2, 'OXETOL 150 TAB'),
(1128, 2, 'OXETOL 300 TAB'),
(1129, 2, 'OXETOL 600MG TAB'),
(1130, 2, 'OZEPAM 0.5MG TAB'),
(1131, 2, 'PACIMOL 500MG TAB'),
(1132, 2, 'PACITANE 2MG TAB'),
(1133, 2, 'PALSINURON CAP'),
(1134, 2, 'PAN 20MG TAB'),
(1135, 2, 'PAN 40IV'),
(1136, 2, 'PAN 40MG TAB'),
(1137, 2, 'PAN D CAPS'),
(1138, 2, 'PANKREOFLAT TAB'),
(1139, 2, 'PANSEC IV 10ML'),
(1140, 2, 'PANTIN 20 TAB'),
(1141, 2, 'PANTOCID 40MG TAB'),
(1142, 2, 'PANZYNORM HS'),
(1143, 2, 'PANZYNORM-N TAB'),
(1144, 2, 'PARI CR 12.5MG TAB'),
(1145, 2, 'PAUSE 500 TAB'),
(1146, 2, 'PAUSE 5ML INJ'),
(1147, 2, 'PAUSE MF TAB'),
(1148, 2, 'PERCIN 600MG TAB'),
(1149, 2, 'PERINORM INJ 2ML'),
(1150, 2, 'PERINORM TAB'),
(1151, 2, 'PERMIN CREAM'),
(1152, 2, 'PHENERGAN 10MG TAB'),
(1153, 2, 'PHENERGAN 25MG TAB'),
(1154, 2, 'PHENERGAN INJ 2ML'),
(1155, 2, 'PHENSEDYL 100ML SYP'),
(1156, 2, 'PHENSEDYL 50ML SYP'),
(1157, 2, 'PILEX OINT 30GM'),
(1158, 2, 'PILEX TAB'),
(1159, 2, 'PILON TAB'),
(1160, 2, 'PIN OM 20'),
(1161, 2, 'PIN OM-40'),
(1162, 2, 'PIN OM-H 40'),
(1163, 2, 'PINOM 20 MG TAB'),
(1164, 2, 'PINOM 40mg'),
(1165, 2, 'PINOM H 20 TAB'),
(1166, 2, 'PIRANULIN TAB'),
(1167, 2, 'PIRFETAB TAB.'),
(1168, 2, 'PIROX 20MG CAP'),
(1169, 2, 'PITOCIN 0.5ML INJ'),
(1170, 2, 'PLACIDOX 2MG TAB'),
(1171, 2, 'PLACIDOX 5 TAB'),
(1172, 2, 'POLARAMINE 2MG TAB'),
(1173, 2, 'POLYBION CZS TAB'),
(1174, 2, 'POLYBION INJ 2ML'),
(1175, 2, 'POLYWAY 3 WAX STOP'),
(1176, 2, 'POWERGESIC MR TAB'),
(1177, 2, 'POWERGESIC TAB'),
(1178, 2, 'PRACTIN 4MG TAB'),
(1179, 2, 'PRANDIAL 0.2MG TAB'),
(1180, 2, 'PRANDIAL 0.3MG TAB'),
(1181, 2, 'PRAZOPILL XL 5MG TAB'),
(1182, 2, 'PRE REJOINT TAB'),
(1183, 2, 'PREDMET 4MG TAB'),
(1184, 2, 'PREDMET 8MG TAB'),
(1185, 2, 'PREGA NEWS KIT'),
(1186, 2, 'PREGABID NT'),
(1187, 2, 'PREGASTAR PLUS CAP'),
(1188, 2, 'PREGMATE 50 TAB'),
(1189, 2, 'PREGMATE M TABS'),
(1190, 2, 'PREGNIDOXIN TAB'),
(1191, 2, 'PRIMODIL 5 TAB'),
(1192, 2, 'PRIMODIL AT TAB'),
(1193, 2, 'PRIMOLUT N 10MG TAB'),
(1194, 2, 'PRIMOX TAB'),
(1195, 2, 'PROCTO CLYSIS ENEMA'),
(1196, 2, 'PRODEP 10 CAP'),
(1197, 2, 'PRODEP 20 CAP'),
(1198, 2, 'PROLUTON DEPOT 250MG INJ'),
(1199, 2, 'PROLUTON DEPOT 500MG INJ'),
(1200, 2, 'PROMISEC 20MG CAPS'),
(1201, 2, 'PROPYSALIC NF 6 OINT 20GM'),
(1202, 2, 'PROSTODIN 125MCG INJ 1ML'),
(1203, 2, 'PROSTODIN 250MCG INJ 1ML'),
(1204, 2, 'PROTINEX ORIGINAL POWDER 200GM'),
(1205, 2, 'PROTOBEX PLUS SYP 200ML'),
(1206, 2, 'PROTOBID MPS TAB'),
(1207, 2, 'PROXYM 300MG TAB'),
(1208, 2, 'PROXYM XT TAB'),
(1209, 2, 'PROXYM-MR TAB'),
(1210, 2, 'PYRICONTIN TAB'),
(1211, 2, 'PYRIGESIC 650MG TAB'),
(1212, 2, 'PYZINA 1000 TAB'),
(1213, 2, 'PYZINA 500MG TAB'),
(1214, 2, 'PYZINA 750MG TAB'),
(1215, 2, 'QINARSOL 300 TAB'),
(1216, 2, 'QUADRIDERM RF CREAM 5GM'),
(1217, 2, 'R-CIN 300 CAP'),
(1218, 2, 'R-CIN 450 CAP'),
(1219, 2, 'R-CIN 600 CAP'),
(1220, 2, 'R-CINEX 600 TAB'),
(1221, 2, 'R-CINEX CAP'),
(1222, 2, 'R. B. TONE SYP 200ML'),
(1223, 2, 'R.COMPOUND TAB'),
(1224, 2, 'RA THERMOSEAL 50GM TOOTH PASTE'),
(1225, 2, 'RABEMAC DSR CAP'),
(1226, 2, 'RABIVAX VACCINE'),
(1227, 2, 'RACIPER D CAP'),
(1228, 2, 'RAMCET 2ML INJ'),
(1229, 2, 'RAMCET D'),
(1230, 2, 'RAMCET INJ 1ML'),
(1231, 2, 'RAMCET TAB'),
(1232, 2, 'RAMCOR 2.5 CAPS'),
(1233, 2, 'RAMCOR 5MG CAP'),
(1234, 2, 'RAMIHART 5MG CAP'),
(1235, 2, 'RAMIHART-H 2.5'),
(1236, 2, 'RAMIPRES 2.5MG TAB'),
(1237, 2, 'RAMISTAR 1.25 CAP'),
(1238, 2, 'RAMISTAR 10 CAPS'),
(1239, 2, 'RAMISTAR 2.5 CAPS'),
(1240, 2, 'RAMISTAR 5 CAPS'),
(1241, 2, 'RAMISTAR-H 2.5  CAP'),
(1242, 2, 'RANTAC 150MG TAB'),
(1243, 2, 'RANTAC 300MG TAB'),
(1244, 2, 'RANTAC D TAB'),
(1245, 2, 'RANTAC INJ 2ML'),
(1246, 2, 'RAZO I.V 20MG INJ'),
(1247, 2, 'RCIFAX 400MG TAB'),
(1248, 2, 'RCIFAX DT TAB'),
(1249, 2, 'REBAGEN TAB'),
(1250, 2, 'RECLIDE 80MG TAB'),
(1251, 2, 'RECLIDE MR 30MG TAB'),
(1252, 2, 'RECLIMET OD 30MG TAB'),
(1253, 2, 'RECLIMET OD 60MG TAB'),
(1254, 2, 'RECLIMET TAB'),
(1255, 2, 'RECOVIT CAPS'),
(1256, 2, 'REDOTIL 100MG CAPS'),
(1257, 2, 'REGESTRONE 5MG TAB'),
(1258, 2, 'REGLAN 10 ML VIAL'),
(1259, 2, 'REGLAN 2ML INJ'),
(1260, 2, 'REGLAN TAB'),
(1261, 2, 'REGULAR COUGH DROP'),
(1262, 2, 'REJOINT TAB'),
(1263, 2, 'REJUSPERMIN CAPS'),
(1264, 2, 'REMYLIN-D TAB'),
(1265, 2, 'RENALI CAP.'),
(1266, 2, 'RENALKA SYP 100ML'),
(1267, 2, 'RESINI GEL 50GM'),
(1268, 2, 'RESTYL 0.25MG TAB'),
(1269, 2, 'RESTYL 0.5MG TAB'),
(1270, 2, 'RESTYL 1MG TAB'),
(1271, 2, 'RESWAS COUGH SYRUP 120ML'),
(1272, 2, 'RETINO A 0.025% CREAM 20GM'),
(1273, 2, 'RETINO A 0.05% CREAM 20GM'),
(1274, 2, 'RETOZ 90 TAB'),
(1275, 2, 'RHINO TAB'),
(1276, 2, 'RHOCLONE 150 INJ'),
(1277, 2, 'RIFAGUT 400MG TAB'),
(1278, 2, 'RIFAGUT TAB'),
(1279, 2, 'RIMACTAZID 450/300 TAB'),
(1280, 2, 'RIMACTAZID E KIT'),
(1281, 2, 'RINITRIN TAB'),
(1282, 2, 'RINOSTAT TAB'),
(1283, 2, 'RIVOTRIL 0.5MG TAB'),
(1284, 2, 'RL IV 500ML (F.K)'),
(1285, 2, 'ROMOVAC NO 12'),
(1286, 2, 'ROSUVAS 10MG TAB'),
(1287, 2, 'ROSUVAS 20MG TAB'),
(1288, 2, 'ROSUVAS 40MG TAB'),
(1289, 2, 'ROSUVAS 5MG TAB'),
(1290, 2, 'ROXID 100MG 30ML LIQ'),
(1291, 2, 'ROZAT 10 TAB'),
(1292, 2, 'ROZAT 20MG TAB'),
(1293, 2, 'ROZAT 40MG TAB'),
(1294, 2, 'ROZAT 5 TAB'),
(1295, 2, 'ROZAT F'),
(1296, 2, 'ROZAVEL 10 TAB'),
(1297, 2, 'ROZAVEL 20MG TAB'),
(1298, 2, 'ROZAVEL 40MG TAB'),
(1299, 2, 'ROZAVEL A 75CAP.'),
(1300, 2, 'ROZUCOR F TAB'),
(1301, 2, 'RUMALAYA FORTE TAB'),
(1302, 2, 'RUMALAYA GEL 30GM'),
(1303, 2, 'RUTIN TAB'),
(1304, 2, 'RYLES TUBE NO.16'),
(1305, 2, 'RYLES TUBES NO 14'),
(1306, 2, 'S-GEL'),
(1307, 2, 'SATROGYL 300MG TAB'),
(1308, 2, 'SATROGYL O TAB'),
(1309, 2, 'SCALP VEIN SET NO 20'),
(1310, 2, 'SECNIL FORTE TAB'),
(1311, 2, 'SELOKEN XL 25 TAB'),
(1312, 2, 'SELOKEN XL 50MG TAB'),
(1313, 2, 'SENSODENT K PASTE 50GM'),
(1314, 2, 'SENSORCAINE HEAVY 4ML INJ'),
(1315, 2, 'SEPMAX TAB'),
(1316, 2, 'SEPTILIN SYP 200ML'),
(1317, 2, 'SEPTILIN TAB'),
(1318, 2, 'SEPTRAN TAB'),
(1319, 2, 'SERENACE 0.25MG TAB'),
(1320, 2, 'SERENACE 0.5MG TAB'),
(1321, 2, 'SERENACE 1.5 TAB'),
(1322, 2, 'SERENACE 10 TAB'),
(1323, 2, 'SERENACE 1ML INJ'),
(1324, 2, 'SERENACE 5 TAB'),
(1325, 2, 'SEROFLO 250 ROTACAPS'),
(1326, 2, 'SERTA 25 TAB'),
(1327, 2, 'SERTA 50 TAB'),
(1328, 2, 'SHELCAL 500MG TAB'),
(1329, 2, 'SHIE KIT'),
(1330, 2, 'SIBELIUM 10MG TAB'),
(1331, 2, 'SIBELIUM 5MG TAB'),
(1332, 2, 'SIGMA CT TAB'),
(1333, 2, 'SIGNOFLAM  TAB'),
(1334, 2, 'SILODERM 20GM CREAM'),
(1335, 2, 'SILVEREX CREAM 12GM'),
(1336, 2, 'SILYBON 140 TAB'),
(1337, 2, 'SILYBON 70 TAB'),
(1338, 2, 'SIMPALE RUBER CATHETER'),
(1339, 2, 'SINAREST LP TAB'),
(1340, 2, 'SINAREST VAPOCAPS'),
(1341, 2, 'SIPHENE 100 TAB'),
(1342, 2, 'SITCOM CREAM 30GM'),
(1343, 2, 'SITCOM LD cream'),
(1344, 2, 'SITCOM TAB'),
(1345, 2, 'SIZODON 1 TAB'),
(1346, 2, 'SMUTH CREAM 30GM'),
(1347, 2, 'SMYLE GEL 10G'),
(1348, 2, 'SODIUM BICARBONATE INJ 25ML'),
(1349, 2, 'SOFRAMYCIN SKIN CREAM'),
(1350, 2, 'SOFTOVAC POWDER 100GM'),
(1351, 2, 'SOFTOVAC SF POWDER 100GM'),
(1352, 2, 'SOLIWAX EAR DROPS 10ML'),
(1353, 2, 'SOLU-MEDROL 125MG INJ'),
(1354, 2, 'SOLU-MEDROL 500MG INJ'),
(1355, 2, 'SOMAZINA 1GM ING.'),
(1356, 2, 'SOMPRAZ HP KIT TAB'),
(1357, 2, 'SOOKTYN TAB'),
(1358, 2, 'SORBITRATE 10MG TAB'),
(1359, 2, 'SORBITRATE 5MG TAB'),
(1360, 2, 'SPASMO PROXYVON CAP'),
(1361, 2, '3WAY STOP COCK'),
(1362, 2, '5 % DEXTROSE 500ML'),
(1363, 2, '7-LA SUSP. 200ML'),
(1364, 2, 'A TO Z NS TAB'),
(1365, 2, 'ABSOLUT WOMEN TAB.'),
(1366, 2, 'ACECLO MR TAB'),
(1367, 2, 'ACECLO PLUS TAB'),
(1368, 2, 'ACECLO TAB'),
(1369, 2, 'ACITROM 1MG TAB'),
(1370, 2, 'ACITROM 2MG TAB'),
(1371, 2, 'ACIVIR 200 DT TAB'),
(1372, 2, 'ACIVIR 400 DT TAB'),
(1373, 2, 'ACIVIR 800 DT TAB'),
(1374, 2, 'ACIVIR CREAM 5GM'),
(1375, 2, 'ACIVIR EYE OINT 5 GM'),
(1376, 2, 'ACIVIR IV'),
(1377, 2, 'ACNESTAR GEL'),
(1378, 2, 'ACUCAL TAB'),
(1379, 2, 'ADESAM 200MG TAB'),
(1380, 2, 'AEROCORT FORTE ROTACAPS'),
(1381, 2, 'AEROCORT INHALER'),
(1382, 2, 'AEROCORT ROTACAPS'),
(1383, 2, 'AGINAL AT TAB'),
(1384, 2, 'AKT 3 KIT'),
(1385, 2, 'AKT 4 KIT'),
(1386, 2, 'AKURIT 3 TAB'),
(1387, 2, 'AKURIT-4'),
(1388, 2, 'ALBUMEN CARE 200GM'),
(1389, 2, 'ALBUREL IV 20GM 100ML'),
(1390, 2, 'ALBUTAMOL TABLET'),
(1391, 2, 'ALDACTONE 25MG TAB'),
(1392, 2, 'ALDACTONE 50 TAB'),
(1393, 2, 'ALERID D TAB'),
(1394, 2, 'ALERID TAB'),
(1395, 2, 'ALEVO 250MG TAB'),
(1396, 2, 'ALLEGRA 120MG TAB'),
(1397, 2, 'ALLEGRA 180MG TAB'),
(1398, 2, 'ALLEGRA 30MG TAB'),
(1399, 2, 'ALLERCET COLD TAB'),
(1400, 2, 'ALLERCET DC TAB'),
(1401, 2, 'ALOES COMPOUND TAB'),
(1402, 2, 'ALPRAX 0.25MG TAB'),
(1403, 2, 'ALPRAX 0.5MG TAB'),
(1404, 2, 'ALTHROCIN 250MG TAB'),
(1405, 2, 'ALUPENT 10MG TAB'),
(1406, 2, 'AMARYL 1MG TAB'),
(1407, 2, 'AMARYL 2MG TAB'),
(1408, 2, 'AMARYL M 1MG TAB'),
(1409, 2, 'AMBACTUM 1.5gm'),
(1410, 2, 'AMBRODIL S 100ML SYP'),
(1411, 2, 'AMIKAMAC 500 ING.'),
(1412, 2, 'AMINOPHYLLINE INJ 10ML'),
(1413, 2, 'AMIXIDE H TAB'),
(1414, 2, 'AMIXIDE TAB'),
(1415, 2, 'AMLODAC 2.5'),
(1416, 2, 'AMLOKATH L TAB'),
(1417, 2, 'AMLOKIND  H TAB'),
(1418, 2, 'AMLOKIND 10MG TAB'),
(1419, 2, 'AMLOKIND 5 TAB'),
(1420, 2, 'AMLOKIND AT TAB'),
(1421, 2, 'AMLONG 10MG TAB'),
(1422, 2, 'AMLONG 2.5MG TAB'),
(1423, 2, 'AMLOPIN 5MG TAB'),
(1424, 2, 'AMLOPRES 5MG TAB'),
(1425, 2, 'AMLOPRES AT 25MG TAB'),
(1426, 2, 'AMLOPRES AT TAB'),
(1427, 2, 'AMLOPRES-L TAB'),
(1428, 2, 'AMLOSAFE H TAB'),
(1429, 2, 'AMLOVAS  AT'),
(1430, 2, 'AMLOVAS 2.5 MG  15 TAB'),
(1431, 2, 'AMLOVAS 5  15 TAB'),
(1432, 2, 'AMLOVAS H TAB'),
(1433, 2, 'AMLOVAS L TAB'),
(1434, 2, 'AMLOVAS OL TAB'),
(1435, 2, 'AMLOVAS-10MG'),
(1436, 2, 'AMLOVAS-XM 5/50 TAB'),
(1437, 2, 'AMODEP 5 TAB'),
(1438, 2, 'AMPHOTRET 50 INJ'),
(1439, 2, 'AMTAS E TAB'),
(1440, 2, 'AMTAS H 25MG.'),
(1441, 2, 'AMTAS H 50MG.'),
(1442, 2, 'AMTAS M 50MG TAB'),
(1443, 2, 'ANAWIN 0.5% INJ 20ML'),
(1444, 2, 'ANEKET INJ 10ML'),
(1445, 2, 'ANEKET INJ 2ML'),
(1446, 2, 'ANGIZEM CD 120 TAB'),
(1447, 2, 'ANGIZEM CD 90 CAP'),
(1448, 2, 'ANOVATE CREAM 20GM'),
(1449, 2, 'ANTIDEP 25MG TAB'),
(1450, 2, 'ANXIT 0.25'),
(1451, 2, 'ANXIT PLUS TAB'),
(1452, 2, 'ANXIT-0.5'),
(1453, 2, 'APIMORE 200ML SYP'),
(1454, 2, 'APTIMUST SYRUP 200ML'),
(1455, 2, 'APTIVATE SYP 200ML'),
(1456, 2, 'AQUAVIRON INJ 1ML'),
(1457, 2, 'ARACHITOL 3 LAC INJ'),
(1458, 2, 'ARACHITOL 6 LAC INJ'),
(1459, 2, 'ARKAMIN H TAB'),
(1460, 2, 'ARKAMIN TAB'),
(1461, 2, 'ARM SLING POUCH (LARGE)'),
(1462, 2, 'ARM SLING POUCH (MEDIUM)'),
(1463, 2, 'ARNOPEN CAP'),
(1464, 2, 'ARSHONYT FORTE TAB'),
(1465, 2, 'ASA 50MG TAB'),
(1466, 2, 'ASOMEX 2.5 MG TAB'),
(1467, 2, 'ASOMEX 5MG TAB'),
(1468, 2, 'ASOMEX AT TAB'),
(1469, 2, 'ASOMEX D TAB'),
(1470, 2, 'ASOMEX-D 5MG TAB'),
(1471, 2, 'ASTHALIN 100ML SYP'),
(1472, 2, 'ASTHALIN 2MG'),
(1473, 2, 'ASTHALIN 4  30TAB'),
(1474, 2, 'ASTHALIN INHALER 200METER'),
(1475, 2, 'ASTHALIN RESPULES 2.5 ML'),
(1476, 2, 'ASTHALIN ROTACAPS'),
(1477, 2, 'ASTHALIN SA 4MG TAB'),
(1478, 2, 'ATARAX 100ML SYP'),
(1479, 2, 'ATARAX 10MG TAB'),
(1480, 2, 'ATARAX 25MG TAB'),
(1481, 2, 'ATARAX DROPS 15ML'),
(1482, 2, 'ATCHOL-10mg'),
(1483, 2, 'ATEN 25MG TAB'),
(1484, 2, 'ATIVAN 1MG'),
(1485, 2, 'ATIVAN 2MG TAB'),
(1486, 2, 'ATOCOR 10MG TAB'),
(1487, 2, 'ATOCOR 40MG TAB'),
(1488, 2, 'ATORLIP 10MG TAB'),
(1489, 2, 'ATORLIP 20MG TAB'),
(1490, 2, 'ATORVA 10 TAB'),
(1491, 2, 'ATORVA 20 TAB'),
(1492, 2, 'AUGMENTIN 625 DUO TAB'),
(1493, 2, 'AUTRIN CAP'),
(1494, 2, 'AVIL 25MG TAB'),
(1495, 2, 'AVIL 50MG TAB'),
(1496, 2, 'AVIL INJ (10ML)'),
(1497, 2, 'AVIL INJ (2ML)'),
(1498, 2, 'AZEE 500 TAB'),
(1499, 2, 'AZEE 500MG INJ'),
(1500, 2, 'AZITHRAL 200 LIQ. 15ML'),
(1501, 2, 'AZITHRAL 250MG TAB'),
(1502, 2, 'AZITHRAL 500 TAB'),
(1503, 2, 'AZORAN TAB'),
(1504, 2, 'AZTOR ASP 150 TAB'),
(1505, 2, 'AZTOR ASP 75 CAP'),
(1506, 2, 'B-BACT OINTMENT 5GM'),
(1507, 2, 'B-PROTIN 200GM POWDER CHOCOLAT'),
(1508, 2, 'BACTRIM DS TAB'),
(1509, 2, 'BAMBUDIL 10MG TAB'),
(1510, 2, 'BANDAGE 4INCH'),
(1511, 2, 'BANDAGE 6INCH'),
(1512, 2, 'BANDY PLUS SUSP 10ML'),
(1513, 2, 'BANDY PLUS-6 TAB'),
(1514, 2, 'BANGSHIL TAB'),
(1515, 2, 'BASALOG 1ML INJ'),
(1516, 2, 'BASALOG 5ML INJ'),
(1517, 2, 'BASALOG REFIL'),
(1518, 2, 'BD 2ML EMERALD SYRING'),
(1519, 2, 'BD DISCARDIT 10ML'),
(1520, 2, 'BD DISCARDIT 5ML'),
(1521, 2, 'BD EMERALD SYRIN 10ML'),
(1522, 2, 'BECLATE 200 ROTACAP'),
(1523, 2, 'BECOSULES CAP'),
(1524, 2, 'BECOZINC CAP'),
(1525, 2, 'BECOZYME C FORTE TAB'),
(1526, 2, 'BENADON 40MG TAB'),
(1527, 2, 'BENICORT 4MG ING.'),
(1528, 2, 'BENZOSED'),
(1529, 2, 'BEPLEX FORTE TAB'),
(1530, 2, 'BETA NICARDIA CAPS'),
(1531, 2, 'BETACAP 10MG TAB'),
(1532, 2, 'BETACAP 20 TAB'),
(1533, 2, 'BETACAP PLUS 10 CAP'),
(1534, 2, 'BETACAP TR 40MG CAP'),
(1535, 2, 'BETACARD 25 TAB'),
(1536, 2, 'BETACARD 50 TAB'),
(1537, 2, 'BETACARD AM TAB'),
(1538, 2, 'BETADINE GERMICIDE GARGLE 50ML'),
(1539, 2, 'BETADINE OINT 125GM'),
(1540, 2, 'BETADINE OINT 15GM'),
(1541, 2, 'BETADINE VAGINAL PESSARIES'),
(1542, 2, 'BETALOC 25 MG'),
(1543, 2, 'BETALOC 50MG TAB'),
(1544, 2, 'BETAVERT 16MG TAB'),
(1545, 2, 'BETAVERT 8MG TAB'),
(1546, 2, 'BETNESOL 0.5MG TAB'),
(1547, 2, 'BETNOVATE C SK OINT'),
(1548, 2, 'BETNOVATE CREAM (20GM)'),
(1549, 2, 'BETNOVATE GM SK OINT'),
(1550, 2, 'BETNOVATE N SK OINT'),
(1551, 2, 'BETONIN 170ML SYP'),
(1552, 2, 'BIGOMET 250 TAB'),
(1553, 2, 'BIGOMET 500 TAB'),
(1554, 2, 'BIGOMET 850MG TAB'),
(1555, 2, 'BIGOMET SR 500 TAB'),
(1556, 2, 'BILOVAS TAB'),
(1557, 2, 'BONNISAN 120ML SYP'),
(1558, 2, 'BONNISAN DROPS 30ML'),
(1559, 2, 'BRESOL TAB'),
(1560, 2, 'BRITEMIN-D3 SACHET'),
(1561, 2, 'BRO ZEET SYP 100ML'),
(1562, 2, 'BRO-ZEDEX 100ML SYP'),
(1563, 2, 'BRUFEN 200MG TAB'),
(1564, 2, 'BRUFEN 400MG TAB'),
(1565, 2, 'BRUFEN 600MG TAB'),
(1566, 2, 'BRUFEN MR CAP'),
(1567, 2, 'BUDAMATE 200 TRANSCAPS'),
(1568, 2, 'BUDAMATE 400 TRANSCAP'),
(1569, 2, 'BUDAMATE FORTE TRANSCAP'),
(1570, 2, 'BUDECORT 0.5MG RESPULES 2ML'),
(1571, 2, 'BUDECORT 100 INHALER'),
(1572, 2, 'BUDECORT 200 ROTACAPS'),
(1573, 2, 'BUDECORT 400 ROTACAPS'),
(1574, 2, 'BURNHEAL CREAM 15GM'),
(1575, 2, 'BUSCOPAN INJ 1ML'),
(1576, 2, 'BUSCOPAN TAB'),
(1577, 2, 'C-FURO 1.5gm'),
(1578, 2, 'CABERLIN 0.25MG TAB'),
(1579, 2, 'CABGOLIN 0.25 TAB'),
(1580, 2, 'CALAPTIN 40MG TAB'),
(1581, 2, 'CALAPTIN 80MG TAB'),
(1582, 2, 'CALCIMAX 500 TAB'),
(1583, 2, 'CALCIMAX FORTE TAB'),
(1584, 2, 'CALCIMAX ISO CAP'),
(1585, 2, 'CALCIUM SANDOZ 10% 10ML INJ'),
(1586, 2, 'CALCURY TAB'),
(1587, 2, 'CALDIKIND SACHET 1G'),
(1588, 2, 'CALMPOSE 2ML INJECTION'),
(1589, 2, 'CALPOL 500MG TAB'),
(1590, 2, 'CANDID V GEL 30GM'),
(1591, 2, 'CANESTEN 6 TAB'),
(1592, 2, 'CANESTEN CREAM 15GM'),
(1593, 2, 'CANESTEN VAGINAL CREAM 30GM'),
(1594, 2, 'CANULA FIXATOR'),
(1595, 2, 'CAPRIN 1000 INJ'),
(1596, 2, 'CAPRIN 5000 INJ'),
(1597, 2, 'CARDACE 1.25MG CAP'),
(1598, 2, 'CARDACE 5 TAB'),
(1599, 2, 'CARDACE H 5MG TAB'),
(1600, 2, 'CARDIVAS 12.5 TAB'),
(1601, 2, 'CARDIVAS 3.125 TAB'),
(1602, 2, 'CARDIVAS 6.25 TAB'),
(1603, 2, 'CARMICIDE ADULTS SYP 100ML'),
(1604, 2, 'CARMICIDE PED SYP 100ML'),
(1605, 2, 'CARNISURE 500MG TAB'),
(1606, 2, 'CARNISURE ING'),
(1607, 2, 'CARTIGEN 1500 TAB'),
(1608, 2, 'CARTIGEN CAPS'),
(1609, 2, 'CATASPA TAB'),
(1610, 2, 'CEFADROX 125MG DRY SYP 30ML'),
(1611, 2, 'CEFBACT 1000 ING.'),
(1612, 2, 'CEFEXE 200'),
(1613, 2, 'CEGAVA 1.5GM'),
(1614, 2, 'CEGAVA 1GM'),
(1615, 2, 'CELIN 500MG TAB'),
(1616, 2, 'CELOL CAP'),
(1617, 2, 'CENTRAL VENOUS  CATHETERIZATIO'),
(1618, 2, 'CENTRAL VENOUS  CATHETERIZATIO'),
(1619, 2, 'CEPODEM 200 TAB'),
(1620, 2, 'CERUVIN A 75+75 CAP'),
(1621, 2, 'CERUVIN AF 75+150 CAP.'),
(1622, 2, 'CERVICAL COLLAR M'),
(1623, 2, 'CERVICAL COLLAR S'),
(1624, 2, 'CERVIPRIME GEL 0.5MG 30GM'),
(1625, 2, 'CETIL 500 TAB.'),
(1626, 2, 'CHERICOF 60ML SYP'),
(1627, 2, 'CHYMORAL FORTE TAB'),
(1628, 2, 'CHYMORAL TAB'),
(1629, 2, 'CIFRAN 500 TAB'),
(1630, 2, 'CIFRAN OD 500MG TAB'),
(1631, 2, 'CILACAR 10MG TAB'),
(1632, 2, 'CILADUO 10MG TAB'),
(1633, 2, 'CIPLACTIN TAB'),
(1634, 2, 'CIPLAR LA 40 TAB'),
(1635, 2, 'CIPLAR-10  15TAB'),
(1636, 2, 'CIPLAR-40 MG  15TAB'),
(1637, 2, 'CIPLOX 100MG TAB'),
(1638, 2, 'CIPLOX 250MG TAB'),
(1639, 2, 'CIPLOX 500MG TAB'),
(1640, 2, 'CIPLOX D E/E DROPS 10ML'),
(1641, 2, 'CIPLOX E/E DROP 5ML'),
(1642, 2, 'CIPLOX-TZ TAB'),
(1643, 2, 'CIPROLET 500MG TAB'),
(1644, 2, 'CIPROLET TAB'),
(1645, 2, 'CITAL LIQ 100ML'),
(1646, 2, 'CITISTAR PM'),
(1647, 2, 'CITRAVITE TAB'),
(1648, 2, 'CITRO SODA SACHET'),
(1649, 2, 'CLARIBID 500 TAB'),
(1650, 2, 'CLARINA CREAM 30GM'),
(1651, 2, 'CLAVAM 1.2GM INJ'),
(1652, 2, 'CLAVAM 625 TAB'),
(1653, 2, 'CLAVAM DRY SYRUP 30ML'),
(1654, 2, 'CLAVIX TAB'),
(1655, 2, 'CLAVIX-AS 75TAB'),
(1656, 2, 'CLINAXON-P TAB'),
(1657, 2, 'CLINGEN VAGINAL SUPPO.'),
(1658, 2, 'CLOFERT 100MG TAB'),
(1659, 2, 'CLOFERT 25MG TAB'),
(1660, 2, 'CLOHEX PLUS 150ML MOUTHWASH'),
(1661, 2, 'CLOPITAB A 150 CAP'),
(1662, 2, 'CLOPITAB A 75 CAP'),
(1663, 2, 'CLOPITAB TAB'),
(1664, 2, 'CLOPIVAS 300'),
(1665, 2, 'CLOPIVAS 75'),
(1666, 2, 'CLOPIVAS AP 150MG TAB'),
(1667, 2, 'CLOPIVAS AP 75 TAB'),
(1668, 2, 'COBADEX CZS TAB'),
(1669, 2, 'COBADEX FORTE CAP'),
(1670, 2, 'COGNIPRO 60MG ING'),
(1671, 2, 'COLIMEX TAB'),
(1672, 2, 'COLIRID TAB'),
(1673, 2, 'COMBIFLAM 60ML SUSP'),
(1674, 2, 'COMBIFLAM TAB'),
(1675, 2, 'COMBUTOL 1000 TAB'),
(1676, 2, 'COMPLAMINA RETARD 500MG TAB'),
(1677, 2, 'COMPLAMINA TAB'),
(1678, 2, 'CONCOR COR 2.5 TAB'),
(1679, 2, 'CONFIDO TAB'),
(1680, 2, 'CONTRAPAQUE 350'),
(1681, 2, 'CORDARONE 150MG/3ML INJ'),
(1682, 2, 'CORDARONE X TAB'),
(1683, 2, 'CORDERONE TAB'),
(1684, 2, 'COREX COUGH SYP 100 ML'),
(1685, 2, 'COREX COUGH SYP 50 ML'),
(1686, 2, 'CORT-S 100MG INJ'),
(1687, 2, 'CORVELA TAB'),
(1688, 2, 'COTTON WOOL  200GM'),
(1689, 2, 'CRANMED CAP'),
(1690, 2, 'CREMAFFIN LAXATIVE 170ML (MINT'),
(1691, 2, 'CREMALAX TAB'),
(1692, 2, 'CREON 10000 CAP'),
(1693, 2, 'CREON 25000 CAP'),
(1694, 2, 'CREPE BANDAGE 15CM X 4MTR'),
(1695, 2, 'CREPE BANDAGE 5CM X 4MTR.'),
(1696, 2, 'CREPE BANDAGE 6CM X 4M'),
(1697, 2, 'CRESAR AM TAB'),
(1698, 2, 'CUTINORM CREAM 40GM'),
(1699, 2, 'CYCLO-MEFF TAB'),
(1700, 2, 'CYCLOPAM 2ML INJ'),
(1701, 2, 'CYCLOPAM SYP 30ML'),
(1702, 2, 'CYCLOPAM TAB'),
(1703, 2, 'CYPON CAPS'),
(1704, 2, 'CYRA D CAP'),
(1705, 2, 'CYSTONE SYP 200ML'),
(1706, 2, 'CYSTONE TAB'),
(1707, 2, 'CZ 3 TAB'),
(1708, 2, 'D-PROTIN 200GM CHOCLATE FLAVOU'),
(1709, 2, 'D3 SHOT 60K CAP'),
(1710, 2, 'D3 SHOT SACHETS'),
(1711, 2, 'DABUR LAL DANTMANJAN 60GM'),
(1712, 2, 'DAFLON 500 TAB'),
(1713, 2, 'DAKTARIN GEL 20GM'),
(1714, 2, 'DALACIN C 150MG CAP'),
(1715, 2, 'DALACIN C 300MG CAP'),
(1716, 2, 'DALACIN C 300MG INJ 2ML'),
(1717, 2, 'DAONIL'),
(1718, 2, 'DAONIL M TAB'),
(1719, 2, 'DAYO OD 500 TAB'),
(1720, 2, 'DECA-DURABOLIN 25MG INJ'),
(1721, 2, 'DECA-DURABOLIN 50MG INJ'),
(1722, 2, 'DECDAN TAB'),
(1723, 2, 'DEFCORT 1 TAB'),
(1724, 2, 'DEFCORT 6 TAB'),
(1725, 2, 'DEFCORT TM'),
(1726, 2, 'DEFSTAR 6'),
(1727, 2, 'DEFZA 6MG TAB'),
(1728, 2, 'DELCON SYP 60ML'),
(1729, 2, 'DELCON TAB'),
(1730, 2, 'DENTACAIN GEL 10GM'),
(1731, 2, 'DEPIN 10MG CAP'),
(1732, 2, 'DEPIN 5MG CAP'),
(1733, 2, 'DEPLATT A 150 TAB'),
(1734, 2, 'DEPLATT A 75 TAB'),
(1735, 2, 'DEPO-MEDROL 40MG INJ 1ML'),
(1736, 2, 'DEPO-MEDROL 40MG INJ 2ML'),
(1737, 2, 'DEPO-PROVERA 150MG INJ'),
(1738, 2, 'DEPRAN TAB'),
(1739, 2, 'DEPSONIL 25MG TAB'),
(1740, 2, 'DEPSONIL DZ TAB'),
(1741, 2, 'DEPSONIL PM 75 CAP'),
(1742, 2, 'DERICIP RETARD 300'),
(1743, 2, 'DERIPHYLLIN  TAB'),
(1744, 2, 'DERIPHYLLIN INJ 2ML'),
(1745, 2, 'DERIPHYLLIN RETARD 150MG TAB'),
(1746, 2, 'DERIPHYLLIN RETARD 300MG TAB'),
(1747, 2, 'DERISONE FORTE RESPICAPS'),
(1748, 2, 'DERISONE RESPICAPS'),
(1749, 2, 'DESENSE Dental gel'),
(1750, 2, 'DETTOL ORIGINAL SOAP 35GM'),
(1751, 2, 'DEXONA 2ML INJ');
INSERT INTO `tbl_master_medicine_add` (`medicine_id`, `hos_id`, `medicine_name`) VALUES
(1752, 2, 'DEXTROSE 25% INJ'),
(1753, 2, 'DEZACOR 6MG TAB'),
(1754, 2, 'DIABECON TAB'),
(1755, 2, 'DIAMICRON MR TAB'),
(1756, 2, 'DIAMOX 0.25 TAB'),
(1757, 2, 'DIANORM M'),
(1758, 2, 'DIAPER ADULT 2 PAD (LARGE)'),
(1759, 2, 'DIAPER ADULT 2 PAD (MEDIUM)'),
(1760, 2, 'DIAPER ADULT 5 PAD (LARGE)'),
(1761, 2, 'DIAREX TAB'),
(1762, 2, 'DICLOMOL TAB'),
(1763, 2, 'DICLORAN A TAB'),
(1764, 2, 'DICORATE ER 250 TAB'),
(1765, 2, 'DIGENE ORENGE'),
(1766, 2, 'DILCONTIN 60 TAB'),
(1767, 2, 'DILZEM 30MG TAB'),
(1768, 2, 'DILZEM 60MG TAB'),
(1769, 2, 'DIOVOL SUSP. 170ML (MINT)'),
(1770, 2, 'DISOGEL 175ML (CARDAMOM)'),
(1771, 2, 'DISPO VAN 20ML'),
(1772, 2, 'DISPO VAN 2ML'),
(1773, 2, 'DISPO VAN 50ML'),
(1774, 2, 'DISPOSABLE NO 21 1'),
(1775, 2, 'DISPOSABLE NO 22'),
(1776, 2, 'DISPOVAN NEEDLE NO23'),
(1777, 2, 'DITIDE TAB'),
(1778, 2, 'DIVAA 500MG TAB'),
(1779, 2, 'DIVAA OD 250MG TAB'),
(1780, 2, 'DK2'),
(1781, 2, 'DNS 500ML (FRE-KABI)'),
(1782, 2, 'DOLO 650MG TAB'),
(1783, 2, 'DOLOGEL CT GEL (10GM)'),
(1784, 2, 'DOLOGEL GEL 15GM'),
(1785, 2, 'DOLONEX 2ML INJ'),
(1786, 2, 'DOLONEX DT 20MG TAB'),
(1787, 2, 'DOMIN INJ 5ML'),
(1788, 2, 'DOMSTAL 10MG TAB'),
(1789, 2, 'DOTAMIN INJ 5ML'),
(1790, 2, 'DOXINATE  PLUS  TAB'),
(1791, 2, 'DOXINATE OD'),
(1792, 2, 'DOXINATE TAB'),
(1793, 2, 'DOXOLIN TAB'),
(1794, 2, 'DOXT-S TAB'),
(1795, 2, 'DOXY-1 L-DR FORTE CAP'),
(1796, 2, 'DROTIN A TAB'),
(1797, 2, 'DROTIN DS TAB'),
(1798, 2, 'DROTIN INJ 2ML'),
(1799, 2, 'DROTIN M TAB'),
(1800, 2, 'DROTIN TAB'),
(1801, 2, 'DROVERA INJ'),
(1802, 2, 'DULCOLAX SUPP CHILDREN'),
(1803, 2, 'DULCOLAX TAB'),
(1804, 2, 'DUOFLAM  TAB'),
(1805, 2, 'DUOFLAM GEL 10GM'),
(1806, 2, 'DUOFLAM KID TAB'),
(1807, 2, 'DUOFLAM PLUS TAB'),
(1808, 2, 'DUOLIN RESPULES 2.5ML'),
(1809, 2, 'DUOLIN ROTACAPS'),
(1810, 2, 'DUOLUTON L TAB'),
(1811, 2, 'DUOVA ROTACAPS'),
(1812, 2, 'DUOVIR N TAB'),
(1813, 2, 'DUOVIR TAB (10 TAB)'),
(1814, 2, 'DUPHALAC 100ML SOLUTION'),
(1815, 2, 'DUPHALAC 200ML SOLUTION'),
(1816, 2, 'DUPHASTON 10MG TAB'),
(1817, 2, 'DURAPAIN TAB'),
(1818, 2, 'DUTAS CAP'),
(1819, 2, 'DUTAS T'),
(1820, 2, 'DUVADILAN 2ML INJ'),
(1821, 2, 'DUVADILAN RETARD CAPS'),
(1822, 2, 'DUZELA 20MG CAP'),
(1823, 2, 'DUZELA M 20 CAP'),
(1824, 2, 'DVION SACHET'),
(1825, 2, 'DYNAPAR AQ 1ML INJ'),
(1826, 2, 'DYNAPAR TABS'),
(1827, 2, 'DYNAPLAST BANDAGE 10CM X 1M'),
(1828, 2, 'DYSMEN TABS'),
(1829, 2, 'DYTOR 10 15TAB'),
(1830, 2, 'DYTOR 100MG TAB'),
(1831, 2, 'DYTOR 20MG TAB'),
(1832, 2, 'DYTOR 40MG TAB'),
(1833, 2, 'DYTOR 5MG TAB'),
(1834, 2, 'DYTOR INJ 2ML'),
(1835, 2, 'DYTOR PLUS 10'),
(1836, 2, 'DYTOR PLUS 10 TAB'),
(1837, 2, 'DYTOR PLUS 5 TAB'),
(1838, 2, 'DYTOR PLUS LS'),
(1839, 2, 'E-COD PLUS CAP'),
(1840, 2, 'E.T. TUBE NO.8 (PROTEX)'),
(1841, 2, 'EBUDENSE-HD TAB'),
(1842, 2, 'Ebufer XT SUSP.'),
(1843, 2, 'ECG CHESTLEADS'),
(1844, 2, 'ECONORM SACHET'),
(1845, 2, 'ECOSPRIN 150MG TAB'),
(1846, 2, 'ECOSPRIN 325 TAB'),
(1847, 2, 'ECOSPRIN 75MG TAB'),
(1848, 2, 'ECOSPRIN AV 150MG CAPS'),
(1849, 2, 'ECOSPRIN AV 75MG CAP'),
(1850, 2, 'ECOSPRIN GOLD 10'),
(1851, 2, 'EDASTAR INJ. 20ML'),
(1852, 2, 'ELECTRAL 21.80G SACHET'),
(1853, 2, 'ELOCON 5GM CREAM'),
(1854, 2, 'ELTROXIN 100MCG TAB'),
(1855, 2, 'ELTROXIN 50MCG TAB'),
(1856, 2, 'EMANZEN FORTE TAB'),
(1857, 2, 'EMANZEN-D  TAB'),
(1858, 2, 'EMESET 8 MG TAB'),
(1859, 2, 'EMIDOXYN 5MG TAB'),
(1860, 2, 'EMSET 2ML INJ'),
(1861, 2, 'EMSET 4 TAB'),
(1862, 2, 'ENAM 5MG TAB'),
(1863, 2, 'ENAPRIL HT TAB'),
(1864, 2, 'ENCEPHABOL 100 TAB'),
(1865, 2, 'ENCEPHABOL 200 TAB'),
(1866, 2, 'ENCLEX 40'),
(1867, 2, 'ENCLEX 40MG INJ'),
(1868, 2, 'ENCLEX 60MG.ING'),
(1869, 2, 'ENCORATE 300 TAB'),
(1870, 2, 'ENCORATE 500 TAB'),
(1871, 2, 'ENCORATE CHRONO 200 TAB'),
(1872, 2, 'ENCORATE CHRONO 300 TAB'),
(1873, 2, 'ENCORATE CHRONO 500 TAB'),
(1874, 2, 'ENO SACHET LEMON'),
(1875, 2, 'ENTEROQUINOL TAB'),
(1876, 2, 'ENUFF 100 CAP'),
(1877, 2, 'ENVAS 10MG TAB'),
(1878, 2, 'ENZAR FORTE TAB'),
(1879, 2, 'ENZOFLAM TAB'),
(1880, 2, 'ENZOMAC TAB'),
(1881, 2, 'EPIDOSIN 1ML INJ'),
(1882, 2, 'EPILIVE 250MG TAB'),
(1883, 2, 'EPILIVE 500MG TAB'),
(1884, 2, 'EPILIVE INJ'),
(1885, 2, 'EPINEURON'),
(1886, 2, 'EPORISE 4000 INJ'),
(1887, 2, 'EPTOIN'),
(1888, 2, 'EPTOIN 50MG INJ 2ML'),
(1889, 2, 'EQUILIBRIUM 10MG TAB'),
(1890, 2, 'ESGIPYRIN TAB'),
(1891, 2, 'ESOMAC IV'),
(1892, 2, 'ESOSTED TAB'),
(1893, 2, 'ESPAZINE 1 MG TAB'),
(1894, 2, 'ESPAZINE 5MG TAB'),
(1895, 2, 'ESPAZINE PLUS TAB'),
(1896, 2, 'ETHASYL 250 TAB'),
(1897, 2, 'ETHASYL 2ML INJ'),
(1898, 2, 'ETIZALA 0.25MG'),
(1899, 2, 'ETIZOLA 0.5MG TAB'),
(1900, 2, 'ETO-SALBETOL TAB'),
(1901, 2, 'ETRIK 90MG TAB'),
(1902, 2, 'EVALON CREAM 15GM'),
(1903, 2, 'EVALON FORTE TAB'),
(1904, 2, 'EVALON TAB'),
(1905, 2, 'EVATOCIN 1ML INJ'),
(1906, 2, 'EVECARE 200ML SYP'),
(1907, 2, 'EVECARE CAPS'),
(1908, 2, 'EVION 200MG CAP'),
(1909, 2, 'EVION 400MG CAP'),
(1910, 2, 'EVION LC TAB'),
(1911, 2, 'EVOCORT ROTACAPS 200'),
(1912, 2, 'EVOCORT ROTACAPS 400'),
(1913, 2, 'EXAMINATION GLOVES (M)'),
(1914, 2, 'EXELYTE ORAL SALINE'),
(1915, 2, 'EXERMET 500 TAB'),
(1916, 2, 'EXERMET 850'),
(1917, 2, 'EXERMET GM 501 TAB'),
(1918, 2, 'EXERMET GM 502 TAB'),
(1919, 2, 'EXTENSION LINE 100CM'),
(1920, 2, 'F-HEEL CUSHION(FEMALE'),
(1921, 2, 'FALCIGO ING 60mg'),
(1922, 2, 'FALCIGO SP KIT'),
(1923, 2, 'FARONEM 200 TAB'),
(1924, 2, 'FASIGYN 500 TABS'),
(1925, 2, 'FASIGYN DS TAB'),
(1926, 2, 'FEBREX PLUS DS 60ML SYP'),
(1927, 2, 'FEBREX PLUS TAB'),
(1928, 2, 'FEBRINIL 15ML INJ'),
(1929, 2, 'FEBRINIL 2ML INJ'),
(1930, 2, 'FEEDING TUBE NO 8'),
(1931, 2, 'FEEDING TUBE NO 9'),
(1932, 2, 'FEFOL-Z CAP'),
(1933, 2, 'FEMILON  TAB'),
(1934, 2, 'FEMIX HERBAL CAPS'),
(1935, 2, 'FERIUM ING. 10ML'),
(1936, 2, 'FERIUM SYP 150ML'),
(1937, 2, 'FERSOFT Z TAB'),
(1938, 2, 'FERSOLATE CM TAB'),
(1939, 2, 'FIBRIL POWDER 100GM'),
(1940, 2, 'FLAGYL  200  TAB'),
(1941, 2, 'FLAGYL 400 TAB'),
(1942, 2, 'FLAMAR-MX TAB'),
(1943, 2, 'FLANZEN -D TAB'),
(1944, 2, 'FLATUNA TAB'),
(1945, 2, 'FLAVEDON MR TAB'),
(1946, 2, 'FLAVOSPAS-O TAB'),
(1947, 2, 'FLEXON 60ML SUSP'),
(1948, 2, 'FLEXON MR TAB'),
(1949, 2, 'FLEXON TAB'),
(1950, 2, 'FLODART PLUS CAP'),
(1951, 2, 'FLOMIST NASAL SPRAY 10ML'),
(1952, 2, 'FLORICOT TAB'),
(1953, 2, 'FLOVITE 5MG TAB'),
(1954, 2, 'FLUCOS 150MG TAB'),
(1955, 2, 'FLUCOS GEL 15GM'),
(1956, 2, 'FLUDAC 10 CAPS'),
(1957, 2, 'FLUNARIN 10 TAB'),
(1958, 2, 'FLUNARIN 5 TAB'),
(1959, 2, 'FLUTIVATE SKIN CREAM 10GM'),
(1960, 2, 'FLUWEL TAB'),
(1961, 2, 'FOL 123'),
(1962, 2, 'FOLEY BALLOON CATHETER NO.14'),
(1963, 2, 'FOLIMUST D'),
(1964, 2, 'FOLINEXT D'),
(1965, 2, 'FOLVITE TAB'),
(1966, 2, 'FOLYES CATHETAR NO 14'),
(1967, 2, 'FOLYES CATHETAR NO 16'),
(1968, 2, 'FONDAFLO SOLUTON'),
(1969, 2, 'FORACORT 200 INHALER'),
(1970, 2, 'FORACORT 200 ROTACAPS'),
(1971, 2, 'FORACORT 400 ROTACAPS'),
(1972, 2, 'FORACORT FORTE INHALER'),
(1973, 2, 'FORACORT FORTE ROTACAPS'),
(1974, 2, 'FORCAN 100ML IV'),
(1975, 2, 'FORCAN 150 TAB'),
(1976, 2, 'FORCAN 200MG TAB'),
(1977, 2, 'FORECOX TAB'),
(1978, 2, 'FORTEGE TAB'),
(1979, 2, 'FORTICAL M'),
(1980, 2, 'FORTUM 1GM INJ'),
(1981, 2, 'FORTWIN ING'),
(1982, 2, 'FOSOLIN INJ 10ML'),
(1983, 2, 'FOSOLIN INJ 2ML'),
(1984, 2, 'FRISIUM 10MG TAB'),
(1985, 2, 'FRISIUM 5MG TAB'),
(1986, 2, 'FRUMIL TAB'),
(1987, 2, 'FRUSELAC DS TAB'),
(1988, 2, 'FRUSELAC TAB'),
(1989, 2, 'FULSED 1MG/ML 10ML INJ'),
(1990, 2, 'FUSIGEN OINT 10GM'),
(1991, 2, 'G32 TAB'),
(1992, 2, 'GABAMIN TAB'),
(1993, 2, 'GABANTIN 300 CAP'),
(1994, 2, 'GABAPIN 100MG TAB'),
(1995, 2, 'GABAPIN 300MG CAP'),
(1996, 2, 'GALACT GRANULES 200GM'),
(1997, 2, 'GANATON 50MG TAB'),
(1998, 2, 'GARDENAL 30MG TAB'),
(1999, 2, 'GARDENAL-60  TAB'),
(2000, 2, 'GAROIN TAB'),
(2001, 2, 'GASEX SYP 200ML'),
(2002, 2, 'GASEX TAB'),
(2003, 2, 'GELUSIL MPS 200 ML'),
(2004, 2, 'GELUSIL MPS TAB'),
(2005, 2, 'GEMCAL CAP'),
(2006, 2, 'GEMCAL D3 CAP'),
(2007, 2, 'GEMCAL DS CAP'),
(2008, 2, 'GEMER 1 TAB'),
(2009, 2, 'GEMER 2 TAB'),
(2010, 2, 'GEMIDRO TAB'),
(2011, 2, 'GEMINOR 1MG TAB'),
(2012, 2, 'GEMITROL CAP'),
(2013, 2, 'GENEVAC B INJ 1DOSE'),
(2014, 2, 'GENTICYN 80MG 2ML INJ'),
(2015, 2, 'GERBISA SUPP'),
(2016, 2, 'GERBISA TAB'),
(2017, 2, 'GERIFLO CAP'),
(2018, 2, 'GLIMER 1MG TAB'),
(2019, 2, 'GLIMESTAR M2 TAB'),
(2020, 2, 'GLIMESTAR PM2 TAB'),
(2021, 2, 'GLIMY 1 TAB'),
(2022, 2, 'GLIMY MP2 TAB'),
(2023, 2, 'GLIMY-2'),
(2024, 2, 'GLIZID  M  TAB'),
(2025, 2, 'GLIZID 80MG TAB'),
(2026, 2, 'GLIZID M OD 60'),
(2027, 2, 'GLIZID M TAB'),
(2028, 2, 'GLOVES NO  6'),
(2029, 2, 'GLOVES NO  61/2'),
(2030, 2, 'GLOVES NO  7'),
(2031, 2, 'GLOVES NO  71/2'),
(2032, 2, 'GLUCOBAY 25MG TAB'),
(2033, 2, 'GLUCOBAY 50MG TAB'),
(2034, 2, 'GLUCONORM G 1'),
(2035, 2, 'GLUCONORM G PLUS 1TAB.'),
(2036, 2, 'GLUCONORM G1 TAB'),
(2037, 2, 'GLUCONORM G2 FORTE TAB'),
(2038, 2, 'GLUCONORM VG 1'),
(2039, 2, 'GLUCONORM-G 2'),
(2040, 2, 'GLUCONORM-VG 2'),
(2041, 2, 'GLUFORMIN 500 TAB'),
(2042, 2, 'GLUFORMIN 850 TABS'),
(2043, 2, 'GLUFORMIN G1 TAB'),
(2044, 2, 'GLUFORMIN G2 TAB'),
(2045, 2, 'GLUFORMIN XL 500 TAB'),
(2046, 2, 'GLYCINORM 40 TAB'),
(2047, 2, 'GLYCINORM 80 TAB'),
(2048, 2, 'GLYCINORM M 40 TAB'),
(2049, 2, 'GLYCIPHAGE 250MG TAB'),
(2050, 2, 'GLYCIPHAGE 500 TAB'),
(2051, 2, 'GLYCIPHAGE 850MG TAB'),
(2052, 2, 'GLYCIPHAGE G1 TAB'),
(2053, 2, 'GLYCIPHAGE G2 TAB'),
(2054, 2, 'GLYCIPHAGE SR 500MG'),
(2055, 2, 'GLYCIPHAGE SR1 TAB'),
(2056, 2, 'GLYCODIN COUGH SYP 50ML'),
(2057, 2, 'GLYCOMET 1GM TAB'),
(2058, 2, 'GLYCOMET 250MG TAB'),
(2059, 2, 'GLYCOMET 500 SR'),
(2060, 2, 'GLYCOMET 500MG TAB'),
(2061, 2, 'GLYCOMET 850 SR TAB'),
(2062, 2, 'GLYCOMET 850MG TAB'),
(2063, 2, 'GLYCOMET GP 0.5'),
(2064, 2, 'GLYCOMET GP 1'),
(2065, 2, 'GLYCOMET GP 1 FORTE TAB'),
(2066, 2, 'GLYCOMET GP 2 FORTE TAB'),
(2067, 2, 'GLYCOMET GP-2'),
(2068, 2, 'GLYCOMET-GP 2'),
(2069, 2, 'GLYKIND M TAB'),
(2070, 2, 'GLYNASE MF TAB'),
(2071, 2, 'GLYRED M TAB'),
(2072, 2, 'GLYREE-M  1 TAB'),
(2073, 2, 'GLYREE-M  2 TAB'),
(2074, 2, 'GLYTOP 10SR TAB'),
(2075, 2, 'GRANDEM 1ML ING.'),
(2076, 2, 'GRANISET 1MG TAB'),
(2077, 2, 'GRD SMART POWDER 200GM {SWISS'),
(2078, 2, 'GRILINCTUS SYP 100ML'),
(2079, 2, 'GRILINCTUS-CD SYRUP 100ML'),
(2080, 2, 'GRISOVIN FP TAB'),
(2081, 2, 'GUDCEF 100MG TAB'),
(2082, 2, 'GUDCEF 200MG TAB'),
(2083, 2, 'GUM TONE GEL 50GM'),
(2084, 2, 'GYANE CVP CAPS'),
(2085, 2, 'GYPSONA 15CM X 2.7M'),
(2086, 2, 'HAEM UP LIQ 200ML'),
(2087, 2, 'HAES STERIL 6% 500ML IV'),
(2088, 2, 'HAES-STERIL 3%'),
(2089, 2, 'HAJMOLA SACHET'),
(2090, 2, 'HALLENS ADULT SUPPO.'),
(2091, 2, 'HALLENS SUPPOSITORIES INFANT'),
(2092, 2, 'HALOTHANE I.P. 85 30ML'),
(2093, 2, 'HARPOON 200MG TAB'),
(2094, 2, 'HCQS TAB'),
(2095, 2, 'HEMFER CAPS'),
(2096, 2, 'HEMSI SYP. 200ML'),
(2097, 2, 'HEPAMERZ 10ML AMP'),
(2098, 2, 'HEPAMERZ GRANULES 5GM'),
(2099, 2, 'HERMIN INJ 200ML'),
(2100, 2, 'HERPEX 200 TAB'),
(2101, 2, 'HETRAZAN 100'),
(2102, 2, 'HIFEN 200DT TAB'),
(2103, 2, 'HIFEN 50 SUSP 30ML'),
(2104, 2, 'HIFEN 50DT TAB'),
(2105, 2, 'HIFEN AZ 125 MG TAB.'),
(2106, 2, 'HIFEN-AZ 250'),
(2107, 2, 'HIMCOCID 200ML SYP'),
(2108, 2, 'HIORA MOUTH WASH REGULER'),
(2109, 2, 'HIORA-SG'),
(2110, 2, 'HISTAC EVT TAB'),
(2111, 2, 'HOMOCHEK CAP'),
(2112, 2, 'HOSIT 1ML INJ'),
(2113, 2, 'HP-KIT TAB'),
(2114, 2, 'HUMAN ACTRAPID 40IU ML'),
(2115, 2, 'HUMAN INSULATARD 40 INSULIN IN'),
(2116, 2, 'HUMAN MIXACT H INJ'),
(2117, 2, 'HUMAN MIXTARD 40 INSULIN INJ.'),
(2118, 2, 'HUMAN MIXTARD 50 INSULIN INJ'),
(2119, 2, 'HUMINSULIN 30/70 CARTRIDGES'),
(2120, 2, 'HUMINSULIN R 10ML INJ'),
(2121, 2, 'HYDROHEAL AM'),
(2122, 2, 'HYDROHEAL AM.'),
(2123, 2, 'HYOCIMAX ING'),
(2124, 2, 'HYPOTHANE'),
(2125, 2, 'IBUGESIC 200MG TAB'),
(2126, 2, 'IBUGESIC 400 TAB'),
(2127, 2, 'IBUGESIC 600 TAB'),
(2128, 2, 'ICIKINASE INJ 1500000'),
(2129, 2, 'IMICELUM 500+500'),
(2130, 2, 'IMODIUM CAP'),
(2131, 2, 'IMOL PLUS TAB'),
(2132, 2, 'INDERAL 10MG TAB'),
(2133, 2, 'INDERAL 40MG TAB'),
(2134, 2, 'INFLACHEK-D'),
(2135, 2, 'INOSERT 50MG TAB'),
(2136, 2, 'INSUGEN-R INSULIN INJ 10ML'),
(2137, 2, 'INSUPEN EASE INJ'),
(2138, 2, 'IODEX 20GM'),
(2139, 2, 'IPRAVENT ROTACAPS'),
(2140, 2, 'ISMO 10 TAB'),
(2141, 2, 'ISMO 20 TAB'),
(2142, 2, 'ISOKIN-300 TAB'),
(2143, 2, 'ISOLAZINE TAB.'),
(2144, 2, 'ISONORM 10MG TAB'),
(2145, 2, 'ISONORM 30 SR TAB'),
(2146, 2, 'ISORDIL 5MG TAB'),
(2147, 2, 'ISTAVEL  50mg. TAB.'),
(2148, 2, 'IV METRONIDAZOLE 100'),
(2149, 2, 'IV SET POLYMED'),
(2150, 2, 'JANUMET 50/500 TAB.'),
(2151, 2, 'JONAC SUPPOSITORIES 100MG'),
(2152, 2, 'JUSTIN SUPPOSITORIES 100MG'),
(2153, 2, 'KEFBACTAM 1GM INJ'),
(2154, 2, 'KENACORT 1% PASTE 5GM'),
(2155, 2, 'KENACORT 40MG INJ 1ML'),
(2156, 2, 'KENADION 10MG ING'),
(2157, 2, 'KENADION-1 INJ'),
(2158, 2, 'KESOL-20 SYP 200ML'),
(2159, 2, 'KETOROL 1ML INJ'),
(2160, 2, 'KIDICARE PLUS 200ML SYP'),
(2161, 2, 'KIT KATH NO 20'),
(2162, 2, 'KIT KATH NO 22'),
(2163, 2, 'KOFAREST SF SYRUP'),
(2164, 2, 'KOFAREST-DX LINCTUS 60ML'),
(2165, 2, 'KOFOL 100ML SYP'),
(2166, 2, 'KYRAB 10MG TAB'),
(2167, 2, 'KYRAB-D TAB'),
(2168, 2, 'LACTIFIBER GRANULES 90GM'),
(2169, 2, 'LAMIVIR 150MG TAB'),
(2170, 2, 'LANOXIN 0.25MG TAB'),
(2171, 2, 'LANTUS 10ML INJ'),
(2172, 2, 'LARINATE'),
(2173, 2, 'LASILACTONE 50MG TAB'),
(2174, 2, 'LASIX 40MG TAB'),
(2175, 2, 'LEDER-CATH 2 (REF 81266017I)'),
(2176, 2, 'LEPTADEN TAB'),
(2177, 2, 'LESURIDE ING.'),
(2178, 2, 'LEVEMIR FLEXPEN 3ML'),
(2179, 2, 'LEVEPSY ING.'),
(2180, 2, 'LEVOCET M TAB'),
(2181, 2, 'LEVOFLOX 250MG TAB'),
(2182, 2, 'LEVOFLOX 500MG IV 100ML'),
(2183, 2, 'LEVOFLOX 500MG TAB'),
(2184, 2, 'LEVOFLOX 750 TAB'),
(2185, 2, 'LEXANOX 5GM PASTE'),
(2186, 2, 'LIBOTRIP DS TAB'),
(2187, 2, 'LIBOTRYP TAB'),
(2188, 2, 'LIBRIUM 10MG TAB'),
(2189, 2, 'LIBRIUM 25MG TAB'),
(2190, 2, 'LIV 52 DS SYP 100ML'),
(2191, 2, 'LIV 52 DS TAB'),
(2192, 2, 'LIV 52 SYP (100ML)'),
(2193, 2, 'LIV 52 TAB'),
(2194, 2, 'LIVOGEN Z TAB.'),
(2195, 2, 'LIVOMYN SYP 100ML'),
(2196, 2, 'LIVOMYN SYP 60ML'),
(2197, 2, 'LIVOSIL UD FORTE TAB.'),
(2198, 2, 'LIZOMAC-CX'),
(2199, 2, 'LOBATE GM NEO CREAM 15GM'),
(2200, 2, 'LONAZEP 0.5MG TAB'),
(2201, 2, 'LORA INJ 2ML'),
(2202, 2, 'LORI 2ML INJ'),
(2203, 2, 'LORNIT INJ 10ML'),
(2204, 2, 'LORSAID OD TAB'),
(2205, 2, 'LOSANORM 50 H TAB'),
(2206, 2, 'LOSAR A TAB'),
(2207, 2, 'LOSIUM 25MG TAB'),
(2208, 2, 'LOSIUM 50MG TAB'),
(2209, 2, 'LOSTAT 50 TAB'),
(2210, 2, 'LOSTAT H TAB'),
(2211, 2, 'LOX 10% SPRAY 50ML'),
(2212, 2, 'LOX 2% INJ 30ML'),
(2213, 2, 'LOX 2% JELLY 30GM'),
(2214, 2, 'LUBRIJOINT 500 TAB'),
(2215, 2, 'LUKOL TAB'),
(2216, 2, 'LUMBAR SACRO BELT(S)'),
(2217, 2, 'LUPENOX 40MG/0.4ML SYRINGES'),
(2218, 2, 'LUPENOX 60MG/0.6ML INJ'),
(2219, 2, 'LUPIBOSE 62.5MG TAB'),
(2220, 2, 'LUPIFLO 1500000IU INJ'),
(2221, 2, 'LUPISULIN-M 30/70-40IV'),
(2222, 2, 'M2 TONE TAB'),
(2223, 2, 'MACALVIT 500 TABS'),
(2224, 2, 'MACROZIDE 500 TAB'),
(2225, 2, 'MACROZIDE 750 TAB'),
(2226, 2, 'MACSART 20MG TAB'),
(2227, 2, 'MACSART 40MG TAB'),
(2228, 2, 'MACSART AM TAB'),
(2229, 2, 'MACSART H TAB'),
(2230, 2, 'MACTOR 10MG TAB'),
(2231, 2, 'MACTOR 20MG TAB'),
(2232, 2, 'MACTOR EZ TAB'),
(2233, 2, 'MACVESTIN 250MG TAB'),
(2234, 2, 'MACZEAL CAP'),
(2235, 2, 'MAHACEF OZ TAB'),
(2236, 2, 'MAHAGABA-M 75 CAP'),
(2237, 2, 'MAHANARAYAN TAILA 100ML'),
(2238, 2, 'MAINTANE 250 INJ 1ML'),
(2239, 2, 'MAINTANE 500 INJ 1ML'),
(2240, 2, 'MALIRID  TAB'),
(2241, 2, 'MALIRID DS TAB'),
(2242, 2, 'MALIRID TAB'),
(2243, 2, 'MANITOL 100ML IV'),
(2244, 2, 'MANNITOL 20% 100ML INJ'),
(2245, 2, 'MATILDA FORTE CAP'),
(2246, 2, 'MAXERON 10ML INJ'),
(2247, 2, 'MAXIFLO 250 ROTACAPS'),
(2248, 2, 'MAXOTAZ 4.5 INJ'),
(2249, 2, 'MAZETOL 200 TAB'),
(2250, 2, 'MCBM-DHA CAP'),
(2251, 2, 'MEBASPA TAB'),
(2252, 2, 'MEBEX TAB'),
(2253, 2, 'MEFTAL P TAB'),
(2254, 2, 'MEFTAL- SPAS TAB'),
(2255, 2, 'MEFTAL-TX TAB'),
(2256, 2, 'MEGAPEN 1000MG INJ'),
(2257, 2, 'MENABOL 2MG TAB'),
(2258, 2, 'MENTAT 200ML SYP'),
(2259, 2, 'MEPRATE 2.5 MG TAB'),
(2260, 2, 'MEPRESSO 1GM INJ'),
(2261, 2, 'MEPRESSO 500MG INJ'),
(2262, 2, 'MESACOL 400MG TAB'),
(2263, 2, 'METADOZE-IPR 500 TAB'),
(2264, 2, 'METGLAR 1MG TAB'),
(2265, 2, 'METHARGIN 1ML INJ'),
(2266, 2, 'METHARGIN TAB'),
(2267, 2, 'METHYCOBAL 1 ML INJ'),
(2268, 2, 'METO ER 12.5 TAB'),
(2269, 2, 'METOCARD AM TAB'),
(2270, 2, 'METOCARD XL 12.5MG TAB'),
(2271, 2, 'METOCARD XL 25 TAB'),
(2272, 2, 'METOCARD XL 50 TAB'),
(2273, 2, 'METOLAR 25MG TAB'),
(2274, 2, 'METOLAR 50 TAB'),
(2275, 2, 'METOLAR XR 100 TAB'),
(2276, 2, 'METOLAR XR 2.5MG CAPS'),
(2277, 2, 'METOLAR XR 25 CAPS'),
(2278, 2, 'METOLAR XR 50MG CAPS'),
(2279, 2, 'METOLAR-AM 50MG TAB'),
(2280, 2, 'METOSARTAN 25MG TAB.'),
(2281, 2, 'METOSARTAN 50 TAB'),
(2282, 2, 'METOZ 2.5 TAB'),
(2283, 2, 'METOZ 5 TAB'),
(2284, 2, 'METPOWER CAP'),
(2285, 2, 'METPURE H 50MG TAB'),
(2286, 2, 'METPURE H TAB'),
(2287, 2, 'METPURE XL 12.5 TAB'),
(2288, 2, 'METPURE XL 25 TAB'),
(2289, 2, 'METPURE XL 50 TAB'),
(2290, 2, 'METPURE-AM 2.5MG TAB'),
(2291, 2, 'METPURE-AM 5MG TAB'),
(2292, 2, 'METPURE-TEL 40 TAB'),
(2293, 2, 'METROGYL 200MG TAB'),
(2294, 2, 'METROGYL 400MG TAB'),
(2295, 2, 'METROGYL GEL 30GM'),
(2296, 2, 'METROGYL INJ 100ML'),
(2297, 2, 'MEZOLAM 10ML INJ'),
(2298, 2, 'MEZOLAM 5ML INJ'),
(2299, 2, 'MICOGEL CREAM 15GM'),
(2300, 2, 'MIKACIN 250MG INJ'),
(2301, 2, 'MIKACIN 500MG INJ'),
(2302, 2, 'MIKASTAR 500MG INJ'),
(2303, 2, 'MINIPRESS XL 2.5MG TAB'),
(2304, 2, 'MINIPRESS XL 5MG TAB'),
(2305, 2, 'MIRTAZ 15 TAB'),
(2306, 2, 'MIRTAZ 30 TAB'),
(2307, 2, 'MISOPROST 200MG TAB'),
(2308, 2, 'MIXOGEN TAB'),
(2309, 2, 'MIXTARD 30 HM PENFILL 3ML INJ'),
(2310, 2, 'MODLIP 20MG TAB'),
(2311, 2, 'MODLIP ASG 20MG'),
(2312, 2, 'MONOCEF 1G INJ'),
(2313, 2, 'MONOCEF 500MG INJ'),
(2314, 2, 'MONOCEF O 100 SYP 30ML'),
(2315, 2, 'MONOCEF O 200 TAB'),
(2316, 2, 'MONOTRATE 20MG TAB'),
(2317, 2, 'MONTAIR 4 TAB'),
(2318, 2, 'MONTAIR FX TAB'),
(2319, 2, 'MOOV NEEK-SHOLDER SPRAY'),
(2320, 2, 'MOTINORM DT 10MG TAB'),
(2321, 2, 'MOTIZA 50MG'),
(2322, 2, 'MOX 500MG TAB'),
(2323, 2, 'MOXCLAV 1.2G INJ'),
(2324, 2, 'MOXICIP 400MG TAB'),
(2325, 2, 'MOXIF IV 100ML'),
(2326, 2, 'MOXIFLOX IV 400MG.'),
(2327, 2, 'MOXOVAS 0.2MG TAB'),
(2328, 2, 'MOXOVAS 0.3MG TAB'),
(2329, 2, 'MPENEX 500 INJ'),
(2330, 2, 'MTNL TAB'),
(2331, 2, 'MUCAINE GEL MINT'),
(2332, 2, 'MUCAINE GEL ORANGE'),
(2333, 2, 'MUCINAC 5ML ING.'),
(2334, 2, 'MUCINAC 600MG TAB'),
(2335, 2, 'MUCINAC INJ 2ML'),
(2336, 2, 'MUCOLITE SYP 100ML'),
(2337, 2, 'MUSKEL TABS'),
(2338, 2, 'MVI INJ'),
(2339, 2, 'MYLAMIN CAP'),
(2340, 2, 'MYOLAXIN-D GEL 15GM'),
(2341, 2, 'MYORIL 4MG CAP'),
(2342, 2, 'MYOSPAZ TABS'),
(2343, 2, 'MYOSTIGMIN 1ML INJ'),
(2344, 2, 'N.S.SALINE 500 ML'),
(2345, 2, 'NACHANI SATVA'),
(2346, 2, 'NADOXIN CREAM 10GM'),
(2347, 2, 'NAPROSYN 250 TAB'),
(2348, 2, 'NAPROSYN 500 TAB'),
(2349, 2, 'NASIVION 0.01% (MINI) 10ML'),
(2350, 2, 'NASIVION 0.05% NASAL DROPS 10M'),
(2351, 2, 'NASOMIST NASAL SPRAY 20ML'),
(2352, 2, 'NATRILIX SR TAB'),
(2353, 2, 'NEBULIZER WITH MASK (ADULT)'),
(2354, 2, 'NEERI 100ML SYP'),
(2355, 2, 'NEO TAB (SILVER)'),
(2356, 2, 'NEOCURON 2ML INJ'),
(2357, 2, 'NEOGADINE ELIXER 300ML'),
(2358, 2, 'NEOROF 10ML INJ'),
(2359, 2, 'NEOROF 20ML INJ'),
(2360, 2, 'NEOSPORIN OINT 20GM'),
(2361, 2, 'NEOSPORIN OINT 5GM'),
(2362, 2, 'NEOSPORIN POWDER 10GM'),
(2363, 2, 'NERVIJEN PLUS 2ML INJ'),
(2364, 2, 'NERVIJEN-P CAP'),
(2365, 2, 'NEUCITI PLUS TAB'),
(2366, 2, 'NEUROBION FORTE INJ 3ML'),
(2367, 2, 'NEUROBION PLUS TAB'),
(2368, 2, 'NEUROCETAM 400MG TAB'),
(2369, 2, 'NEUROCETAM 800 TAB'),
(2370, 2, 'NEXIPRIDE 25MG TAB'),
(2371, 2, 'NEXITO 10 TAB'),
(2372, 2, 'NEXITO 20 TAB'),
(2373, 2, 'NEXPRO RD 20MG CAP'),
(2374, 2, 'NEXPRO RD 40MG CAP'),
(2375, 2, 'NICARDIA CD RETARD 30MG TAB'),
(2376, 2, 'NICARDIA RETARD 10MG TAB'),
(2377, 2, 'NICIP PLUS TAB'),
(2378, 2, 'NICOSTAR 10MG TAB'),
(2379, 2, 'NICOSTAR 5MG TAB'),
(2380, 2, 'NIFEDINE 10 TABS'),
(2381, 2, 'NIKORAN 10MG TAB'),
(2382, 2, 'NIKORAN 5 MG TAB'),
(2383, 2, 'NIKORAN IV 48 INJ'),
(2384, 2, 'NIMEGESIC IR TAB'),
(2385, 2, 'NIMEK PARA TAB'),
(2386, 2, 'NIMEK SPAS TAB'),
(2387, 2, 'NIMODIP TAB'),
(2388, 2, 'NIMSAID P TAB'),
(2389, 2, 'NIMUFLEX MR TAB'),
(2390, 2, 'NIMULID MR TAB'),
(2391, 2, 'NIRMET INJ 100ML'),
(2392, 2, 'NIRMIN 10 PLUS'),
(2393, 2, 'NIRMIN HEPA 8% 500ML INJ'),
(2394, 2, 'NISE MDT TAB'),
(2395, 2, 'NISE MR TAB'),
(2396, 2, 'NISE TAB'),
(2397, 2, 'NITA O TAB'),
(2398, 2, 'NITRAVET 10MG TAB'),
(2399, 2, 'NITRAVET 5MG TAB'),
(2400, 2, 'NITREST 10 TAB'),
(2401, 2, 'NIZER GEL'),
(2402, 2, 'NIZONIDE-O TAB'),
(2403, 2, 'NOBEL  PLUS TAB'),
(2404, 2, 'NOOTROPIL 15ML INJ'),
(2405, 2, 'NORAD ING 2ml'),
(2406, 2, 'NORFLOX 400MG TAB'),
(2407, 2, 'NOSIC TAB'),
(2408, 2, 'NOVA PLUS 75 CAP'),
(2409, 2, 'NOVACLOX 500MG CAPS'),
(2410, 2, 'NOVACLOX LB 500MG CAP'),
(2411, 2, 'NOVAMOX 500 TAB'),
(2412, 2, 'NOVELON TAB'),
(2413, 2, 'NOVOFINE NEEDLE'),
(2414, 2, 'NOVORAPID FLEXPEN 3ML'),
(2415, 2, 'NOVORAPID PENFILL'),
(2416, 2, 'NOVORAPID PENFILL 3ML INJ'),
(2417, 2, 'NS 100ML (FK)'),
(2418, 2, 'NS 500ML (FK)'),
(2419, 2, 'NUFORCE 150 TAB'),
(2420, 2, 'NUROKIND FORTE TAB'),
(2421, 2, 'NUROKIND G TAB'),
(2422, 2, 'NUSAM 200 TAB'),
(2423, 2, 'NUTRIMUNE TAB'),
(2424, 2, 'O2 TAB'),
(2425, 2, 'O2H TAB'),
(2426, 2, 'OCID-D CAP'),
(2427, 2, 'OCTRIDE 100 INJ'),
(2428, 2, 'OCTRIDE 50 INJ'),
(2429, 2, 'OCUVIR EYE OINT 5GM'),
(2430, 2, 'ODOXIL 250MG DT TAB'),
(2431, 2, 'ODOXIL 500 TAB'),
(2432, 2, 'ODOXIL DS 250MG 30 ML SUSP'),
(2433, 2, 'OFLOMAC 200 TAB'),
(2434, 2, 'OFLOMAC 400 TAB'),
(2435, 2, 'OFLOMAC OZ IV'),
(2436, 2, 'OFLOX 200MG TAB'),
(2437, 2, 'OFLOX 400 TAB'),
(2438, 2, 'OJUS 200 ML SYP'),
(2439, 2, 'OLEANZ 5 TAB'),
(2440, 2, 'OLEANZ PLUS TAB'),
(2441, 2, 'OLIMELT 2.5MG TAB'),
(2442, 2, 'OLMESAR 40MG TAB'),
(2443, 2, 'OLMESAR H 40 TAB'),
(2444, 2, 'OLMESAR-H'),
(2445, 2, 'OLMEZEST AM TAB'),
(2446, 2, 'OLVANCE 20MG TAB'),
(2447, 2, 'OME-PPI 20MG CAP'),
(2448, 2, 'OMEZ 10MG CAP'),
(2449, 2, 'OMEZ 20MG CAP'),
(2450, 2, 'OMEZ 40MG INJ'),
(2451, 2, 'OMEZ 40MG TAB'),
(2452, 2, 'OMNACORTIL 5 TAB'),
(2453, 2, 'OMNIGEL 30GM'),
(2454, 2, 'ONDEM 4MG TAB'),
(2455, 2, 'ONDEM 8MG TAB'),
(2456, 2, 'ONDEM INJ 2ML'),
(2457, 2, 'ONDEM MD 4 TAB'),
(2458, 2, 'ONECAN 150MG'),
(2459, 2, 'OPIPROL 50MG.'),
(2460, 2, 'OPOX 100 DT TAB'),
(2461, 2, 'OPOX 100MG DRY SUSP 30ML'),
(2462, 2, 'OPOX PAEDIATRIC DROPS 10ML'),
(2463, 2, 'OPTINEURON INJ 3ML'),
(2464, 2, 'OPTISULIN CAP'),
(2465, 2, 'ORASEP GEL 15ML'),
(2466, 2, 'ORATIL 250MG TAB'),
(2467, 2, 'ORATIL 500MG TAB'),
(2468, 2, 'ORAXIN SYP 200ML'),
(2469, 2, 'ORCIBEST TAB.'),
(2470, 2, 'OREX CREAM 10GM'),
(2471, 2, 'ORLICA 60MG CAP'),
(2472, 2, 'ORNI-O TAB'),
(2473, 2, 'OROFER XT SUSP 150ML'),
(2474, 2, 'ORS  SACHET 21GM'),
(2475, 2, 'ORS-L APPLE DRINK 200ML'),
(2476, 2, 'ORS-L LEMON DRINK 200ML'),
(2477, 2, 'ORS-L PLUS ORANGE DRINK 200ML'),
(2478, 2, 'OSKAR 20 CAP'),
(2479, 2, 'OTRIVIN NASAL DROP 10ML (ADULT'),
(2480, 2, 'OTRIVIN NASAL DROP 10ML (PEAD)'),
(2481, 2, 'OVRAL G TAB'),
(2482, 2, 'OVRAL L TAB'),
(2483, 2, 'OXEPTAL 150 TAB'),
(2484, 2, 'OXEPTAL 300 TAB'),
(2485, 2, 'OXERUTE CD TAB'),
(2486, 2, 'OXETOL 150 TAB'),
(2487, 2, 'OXETOL 300 TAB'),
(2488, 2, 'OXETOL 600MG TAB'),
(2489, 2, 'OZEPAM 0.5MG TAB'),
(2490, 2, 'PACIMOL 500MG TAB'),
(2491, 2, 'PACITANE 2MG TAB'),
(2492, 2, 'PALSINURON CAP'),
(2493, 2, 'PAN 20MG TAB'),
(2494, 2, 'PAN 40IV'),
(2495, 2, 'PAN 40MG TAB'),
(2496, 2, 'PAN D CAPS'),
(2497, 2, 'PANKREOFLAT TAB'),
(2498, 2, 'PANSEC IV 10ML'),
(2499, 2, 'PANTIN 20 TAB'),
(2500, 2, 'PANTOCID 40MG TAB'),
(2501, 2, 'PANZYNORM HS'),
(2502, 2, 'PANZYNORM-N TAB'),
(2503, 2, 'PARI CR 12.5MG TAB'),
(2504, 2, 'PAUSE 500 TAB'),
(2505, 2, 'PAUSE 5ML INJ'),
(2506, 2, 'PAUSE MF TAB'),
(2507, 2, 'PERCIN 600MG TAB'),
(2508, 2, 'PERINORM INJ 2ML'),
(2509, 2, 'PERINORM TAB'),
(2510, 2, 'PERMIN CREAM'),
(2511, 2, 'PHENERGAN 10MG TAB'),
(2512, 2, 'PHENERGAN 25MG TAB'),
(2513, 2, 'PHENERGAN INJ 2ML'),
(2514, 2, 'PHENSEDYL 100ML SYP'),
(2515, 2, 'PHENSEDYL 50ML SYP'),
(2516, 2, 'PILEX OINT 30GM'),
(2517, 2, 'PILEX TAB'),
(2518, 2, 'PILON TAB'),
(2519, 2, 'PIN OM 20'),
(2520, 2, 'PIN OM-40'),
(2521, 2, 'PIN OM-H 40'),
(2522, 2, 'PINOM 20 MG TAB'),
(2523, 2, 'PINOM 40mg'),
(2524, 2, 'PINOM H 20 TAB'),
(2525, 2, 'PIRANULIN TAB'),
(2526, 2, 'PIRFETAB TAB.'),
(2527, 2, 'PIROX 20MG CAP'),
(2528, 2, 'PITOCIN 0.5ML INJ'),
(2529, 2, 'PLACIDOX 2MG TAB'),
(2530, 2, 'PLACIDOX 5 TAB'),
(2531, 2, 'POLARAMINE 2MG TAB'),
(2532, 2, 'POLYBION CZS TAB'),
(2533, 2, 'POLYBION INJ 2ML'),
(2534, 2, 'POLYWAY 3 WAX STOP'),
(2535, 2, 'POWERGESIC MR TAB'),
(2536, 2, 'POWERGESIC TAB'),
(2537, 2, 'PRACTIN 4MG TAB'),
(2538, 2, 'PRANDIAL 0.2MG TAB'),
(2539, 2, 'PRANDIAL 0.3MG TAB'),
(2540, 2, 'PRAZOPILL XL 5MG TAB'),
(2541, 2, 'PRE REJOINT TAB'),
(2542, 2, 'PREDMET 4MG TAB'),
(2543, 2, 'PREDMET 8MG TAB'),
(2544, 2, 'PREGA NEWS KIT'),
(2545, 2, 'PREGABID NT'),
(2546, 2, 'PREGASTAR PLUS CAP'),
(2547, 2, 'PREGMATE 50 TAB'),
(2548, 2, 'PREGMATE M TABS'),
(2549, 2, 'PREGNIDOXIN TAB'),
(2550, 2, 'PRIMODIL 5 TAB'),
(2551, 2, 'PRIMODIL AT TAB'),
(2552, 2, 'PRIMOLUT N 10MG TAB'),
(2553, 2, 'PRIMOX TAB'),
(2554, 2, 'PROCTO CLYSIS ENEMA'),
(2555, 2, 'PRODEP 10 CAP'),
(2556, 2, 'PRODEP 20 CAP'),
(2557, 2, 'PROLUTON DEPOT 250MG INJ'),
(2558, 2, 'PROLUTON DEPOT 500MG INJ'),
(2559, 2, 'PROMISEC 20MG CAPS'),
(2560, 2, 'PROPYSALIC NF 6 OINT 20GM'),
(2561, 2, 'PROSTODIN 125MCG INJ 1ML'),
(2562, 2, 'PROSTODIN 250MCG INJ 1ML'),
(2563, 2, 'PROTINEX ORIGINAL POWDER 200GM'),
(2564, 2, 'PROTOBEX PLUS SYP 200ML'),
(2565, 2, 'PROTOBID MPS TAB'),
(2566, 2, 'PROXYM 300MG TAB'),
(2567, 2, 'PROXYM XT TAB'),
(2568, 2, 'PROXYM-MR TAB'),
(2569, 2, 'PYRICONTIN TAB'),
(2570, 2, 'PYRIGESIC 650MG TAB'),
(2571, 2, 'PYZINA 1000 TAB'),
(2572, 2, 'PYZINA 500MG TAB'),
(2573, 2, 'PYZINA 750MG TAB'),
(2574, 2, 'QINARSOL 300 TAB'),
(2575, 2, 'QUADRIDERM RF CREAM 5GM'),
(2576, 2, 'R-CIN 300 CAP'),
(2577, 2, 'R-CIN 450 CAP'),
(2578, 2, 'R-CIN 600 CAP'),
(2579, 2, 'R-CINEX 600 TAB'),
(2580, 2, 'R-CINEX CAP'),
(2581, 2, 'R. B. TONE SYP 200ML'),
(2582, 2, 'R.COMPOUND TAB'),
(2583, 2, 'RA THERMOSEAL 50GM TOOTH PASTE'),
(2584, 2, 'RABEMAC DSR CAP'),
(2585, 2, 'RABIVAX VACCINE'),
(2586, 2, 'RACIPER D CAP'),
(2587, 2, 'RAMCET 2ML INJ'),
(2588, 2, 'RAMCET D'),
(2589, 2, 'RAMCET INJ 1ML'),
(2590, 2, 'RAMCET TAB'),
(2591, 2, 'RAMCOR 2.5 CAPS'),
(2592, 2, 'RAMCOR 5MG CAP'),
(2593, 2, 'RAMIHART 5MG CAP'),
(2594, 2, 'RAMIHART-H 2.5'),
(2595, 2, 'RAMIPRES 2.5MG TAB'),
(2596, 2, 'RAMISTAR 1.25 CAP'),
(2597, 2, 'RAMISTAR 10 CAPS'),
(2598, 2, 'RAMISTAR 2.5 CAPS'),
(2599, 2, 'RAMISTAR 5 CAPS'),
(2600, 2, 'RAMISTAR-H 2.5  CAP'),
(2601, 2, 'RANTAC 150MG TAB'),
(2602, 2, 'RANTAC 300MG TAB'),
(2603, 2, 'RANTAC D TAB'),
(2604, 2, 'RANTAC INJ 2ML'),
(2605, 2, 'RAZO I.V 20MG INJ'),
(2606, 2, 'RCIFAX 400MG TAB'),
(2607, 2, 'RCIFAX DT TAB'),
(2608, 2, 'REBAGEN TAB'),
(2609, 2, 'RECLIDE 80MG TAB'),
(2610, 2, 'RECLIDE MR 30MG TAB'),
(2611, 2, 'RECLIMET OD 30MG TAB'),
(2612, 2, 'RECLIMET OD 60MG TAB'),
(2613, 2, 'RECLIMET TAB'),
(2614, 2, 'RECOVIT CAPS'),
(2615, 2, 'REDOTIL 100MG CAPS'),
(2616, 2, 'REGESTRONE 5MG TAB'),
(2617, 2, 'REGLAN 10 ML VIAL'),
(2618, 2, 'REGLAN 2ML INJ'),
(2619, 2, 'REGLAN TAB'),
(2620, 2, 'REGULAR COUGH DROP'),
(2621, 2, 'REJOINT TAB'),
(2622, 2, 'REJUSPERMIN CAPS'),
(2623, 2, 'REMYLIN-D TAB'),
(2624, 2, 'RENALI CAP.'),
(2625, 2, 'RENALKA SYP 100ML'),
(2626, 2, 'RESINI GEL 50GM'),
(2627, 2, 'RESTYL 0.25MG TAB'),
(2628, 2, 'RESTYL 0.5MG TAB'),
(2629, 2, 'RESTYL 1MG TAB'),
(2630, 2, 'RESWAS COUGH SYRUP 120ML'),
(2631, 2, 'RETINO A 0.025% CREAM 20GM'),
(2632, 2, 'RETINO A 0.05% CREAM 20GM'),
(2633, 2, 'RETOZ 90 TAB'),
(2634, 2, 'RHINO TAB'),
(2635, 2, 'RHOCLONE 150 INJ'),
(2636, 2, 'RIFAGUT 400MG TAB'),
(2637, 2, 'RIFAGUT TAB'),
(2638, 2, 'RIMACTAZID 450/300 TAB'),
(2639, 2, 'RIMACTAZID E KIT'),
(2640, 2, 'RINITRIN TAB'),
(2641, 2, 'RINOSTAT TAB'),
(2642, 2, 'RIVOTRIL 0.5MG TAB'),
(2643, 2, 'RL IV 500ML (F.K)'),
(2644, 2, 'ROMOVAC NO 12'),
(2645, 2, 'ROSUVAS 10MG TAB'),
(2646, 2, 'ROSUVAS 20MG TAB'),
(2647, 2, 'ROSUVAS 40MG TAB'),
(2648, 2, 'ROSUVAS 5MG TAB'),
(2649, 2, 'ROXID 100MG 30ML LIQ'),
(2650, 2, 'ROZAT 10 TAB'),
(2651, 2, 'ROZAT 20MG TAB'),
(2652, 2, 'ROZAT 40MG TAB'),
(2653, 2, 'ROZAT 5 TAB'),
(2654, 2, 'ROZAT F'),
(2655, 2, 'ROZAVEL 10 TAB'),
(2656, 2, 'ROZAVEL 20MG TAB'),
(2657, 2, 'ROZAVEL 40MG TAB'),
(2658, 2, 'ROZAVEL A 75CAP.'),
(2659, 2, 'ROZUCOR F TAB'),
(2660, 2, 'RUMALAYA FORTE TAB'),
(2661, 2, 'RUMALAYA GEL 30GM'),
(2662, 2, 'RUTIN TAB'),
(2663, 2, 'RYLES TUBE NO.16'),
(2664, 2, 'RYLES TUBES NO 14'),
(2665, 2, 'S-GEL'),
(2666, 2, 'SATROGYL 300MG TAB'),
(2667, 2, 'SATROGYL O TAB'),
(2668, 2, 'SCALP VEIN SET NO 20'),
(2669, 2, 'SECNIL FORTE TAB'),
(2670, 2, 'SELOKEN XL 25 TAB'),
(2671, 2, 'SELOKEN XL 50MG TAB'),
(2672, 2, 'SENSODENT K PASTE 50GM'),
(2673, 2, 'SENSORCAINE HEAVY 4ML INJ'),
(2674, 2, 'SEPMAX TAB'),
(2675, 2, 'SEPTILIN SYP 200ML'),
(2676, 2, 'SEPTILIN TAB'),
(2677, 2, 'SEPTRAN TAB'),
(2678, 2, 'SERENACE 0.25MG TAB'),
(2679, 2, 'SERENACE 0.5MG TAB'),
(2680, 2, 'SERENACE 1.5 TAB'),
(2681, 2, 'SERENACE 10 TAB'),
(2682, 2, 'SERENACE 1ML INJ'),
(2683, 2, 'SERENACE 5 TAB'),
(2684, 2, 'SEROFLO 250 ROTACAPS'),
(2685, 2, 'SERTA 25 TAB'),
(2686, 2, 'SERTA 50 TAB'),
(2687, 2, 'SHELCAL 500MG TAB'),
(2688, 2, 'SHIE KIT'),
(2689, 2, 'SIBELIUM 10MG TAB'),
(2690, 2, 'SIBELIUM 5MG TAB'),
(2691, 2, 'SIGMA CT TAB'),
(2692, 2, 'SIGNOFLAM  TAB'),
(2693, 2, 'SILODERM 20GM CREAM'),
(2694, 2, 'SILVEREX CREAM 12GM'),
(2695, 2, 'SILYBON 140 TAB'),
(2696, 2, 'SILYBON 70 TAB'),
(2697, 2, 'SIMPALE RUBER CATHETER'),
(2698, 2, 'SINAREST LP TAB'),
(2699, 2, 'SINAREST VAPOCAPS'),
(2700, 2, 'SIPHENE 100 TAB'),
(2701, 2, 'SITCOM CREAM 30GM'),
(2702, 2, 'SITCOM LD cream'),
(2703, 2, 'SITCOM TAB'),
(2704, 2, 'SIZODON 1 TAB'),
(2705, 2, 'SMUTH CREAM 30GM'),
(2706, 2, 'SMYLE GEL 10G'),
(2707, 2, 'SODIUM BICARBONATE INJ 25ML'),
(2708, 2, 'SOFRAMYCIN SKIN CREAM'),
(2709, 2, 'SOFTOVAC POWDER 100GM'),
(2710, 2, 'SOFTOVAC SF POWDER 100GM'),
(2711, 2, 'SOLIWAX EAR DROPS 10ML'),
(2712, 2, 'SOLU-MEDROL 125MG INJ'),
(2713, 2, 'SOLU-MEDROL 500MG INJ'),
(2714, 2, 'SOMAZINA 1GM ING.'),
(2715, 2, 'SOMPRAZ HP KIT TAB'),
(2716, 2, 'SOOKTYN TAB'),
(2717, 2, 'SORBITRATE 10MG TAB'),
(2718, 2, 'SORBITRATE 5MG TAB'),
(2719, 2, 'SPASMO PROXYVON CAP'),
(2720, 2, 'SPEMAN TAB'),
(2721, 2, 'SPINAL NEEDLE NO 25'),
(2722, 2, 'SPORIDEX 500MG CAP'),
(2723, 2, 'SPORLAC TAB'),
(2724, 2, 'STALOPAM 10 TAB'),
(2725, 2, 'STALOPAM 5MG TAB'),
(2726, 2, 'STALOPAM MINI PLUS'),
(2727, 2, 'STALOPAM PLUS TAB'),
(2728, 2, 'STAMLO 10MG TAB'),
(2729, 2, 'STAMLO 2.5MG TAB'),
(2730, 2, 'STAMLO 5MG TAB'),
(2731, 2, 'STAMLO BETA TAB'),
(2732, 2, 'STAMLO D TAB'),
(2733, 2, 'STARPRESS -XL 12.5 TAB'),
(2734, 2, 'STARPRESS XL 25MG TAB'),
(2735, 2, 'STARPRESS XL 50MG TAB'),
(2736, 2, 'STATOR 20MG TAB'),
(2737, 2, 'STELBID 2MG TAB'),
(2738, 2, 'STELBID TAB'),
(2739, 2, 'STEMETIL 1ML INJ'),
(2740, 2, 'STEMETIL MD'),
(2741, 2, 'STILOZ 100 TAB'),
(2742, 2, 'STILOZ 50 TAB'),
(2743, 2, 'STOLIN GUM PAINT 15ML'),
(2744, 2, 'STORAX PR 500+800'),
(2745, 2, 'STORVAS 10MG TAB'),
(2746, 2, 'STORVAS EZ 10 TAB'),
(2747, 2, 'STPASE 1500000IU INJ'),
(2748, 2, 'STRESNIL 0.25 TAB'),
(2749, 2, 'STRESNIL 0.5MG TAB'),
(2750, 2, 'STROCIT 2ML INJ.'),
(2751, 2, 'STROCIT 4ML INJ.'),
(2752, 2, 'STUGERON FORTE TAB'),
(2753, 2, 'STUGERON TAB'),
(2754, 2, 'STUGIL TAB'),
(2755, 2, 'SUBSYDE CR CAP'),
(2756, 2, 'SUCOL 10ML INJ'),
(2757, 2, 'SUCTION CATHETAR NO 14'),
(2758, 2, 'SUGAR FREE 100  PELLETS'),
(2759, 2, 'SULCEF 1GM INJ'),
(2760, 2, 'SULCEF FORTE 1.5GM'),
(2761, 2, 'SUMO TAB'),
(2762, 2, 'SUMOCOLD TAB'),
(2763, 2, 'SUPACEF 1.5GM INJ'),
(2764, 2, 'SUPACEF 750MG INJ'),
(2765, 2, 'SUPPOL BABY SUPPOS 80MG'),
(2766, 2, 'SUPRACAL TAB  15TAB'),
(2767, 2, 'SUPRADYN TAB'),
(2768, 2, 'SURFAZ CREAM 15GM'),
(2769, 2, 'SURGICAL BLADE NO 12'),
(2770, 2, 'SUSTEN 100MG 1ML INJ.'),
(2771, 2, 'SUSTEN 200 INJ 2ML'),
(2772, 2, 'SUSTEN 200MG CAPS'),
(2773, 2, 'SYLATE-CVP TAB.'),
(2774, 2, 'SYLKAM 0.5mg'),
(2775, 2, 'SYNDOPA 110 TAB'),
(2776, 2, 'SYNDOPA PLUS TAB'),
(2777, 2, 'SZETALO PLUS TAB'),
(2778, 2, 'T-BACT CREAM 7.5GM'),
(2779, 2, 'T-BACT OINT (5GM)'),
(2780, 2, 'T-MINIC 60ML SYP'),
(2781, 2, 'T-MINIC DROPS 15ML'),
(2782, 2, 'TAF GM CREAM 10GM'),
(2783, 2, 'TANCODEP 2 TAB'),
(2784, 2, 'TANCODEP TAB'),
(2785, 2, 'TARGOCID 400 INJ'),
(2786, 2, 'TARGOCID I.M./I.V. 200MG'),
(2787, 2, 'TAXIM 1GM INJ'),
(2788, 2, 'TAXIM 250MG INJ'),
(2789, 2, 'TAXIM 500MG INJ'),
(2790, 2, 'TAXIM-O 200MG TAB'),
(2791, 2, 'TAZACT 2.25 GM'),
(2792, 2, 'TAZLOC 20MG TAB'),
(2793, 2, 'TAZLOC 40MG TAB'),
(2794, 2, 'TAZLOC-H TAB'),
(2795, 2, 'TEGADERM 1626W'),
(2796, 2, 'TEGRITAL 100MG TAB'),
(2797, 2, 'TEGRITAL 200MG TAB'),
(2798, 2, 'TEGRITAL 400MG TAB'),
(2799, 2, 'TEGRITAL CR 400 DIVITABS'),
(2800, 2, 'TEL REVELOL 40/50 TAB.'),
(2801, 2, 'TEL REVOLOL 40/25 MG.'),
(2802, 2, 'TELEACT 40MG TAB'),
(2803, 2, 'TELEKAST F TAB.'),
(2804, 2, 'TELEKAST L TAB'),
(2805, 2, 'TELMA-H TAB'),
(2806, 2, 'TELMINORM CH 40/12.50 TAB.'),
(2807, 2, 'TELPRES CT 40/12.50MG'),
(2808, 2, 'TELPRES CT 40/6.25MG.'),
(2809, 2, 'TELPRES H TAB'),
(2810, 2, 'TELPRES-AM TAB'),
(2811, 2, 'TELSAR 20MG TAB'),
(2812, 2, 'TELSAR 40MG TAB'),
(2813, 2, 'TELSAR H'),
(2814, 2, 'TELSARTAN 20MG TAB'),
(2815, 2, 'TELSARTAN AM TAB'),
(2816, 2, 'TELSARTAN H 80 TAB'),
(2817, 2, 'TELSARTAN H ACTIVE'),
(2818, 2, 'TEMPTAL 500MG TAB'),
(2819, 2, 'TENOCLOR 50 TAB'),
(2820, 2, 'TENOLOL 25 TAB'),
(2821, 2, 'TENOLOL 50 TAB'),
(2822, 2, 'TENOLOL-D 25 SR TAB'),
(2823, 2, 'TENOVATE CREAM (15GM)'),
(2824, 2, 'TENOVATE CREAM 30GM'),
(2825, 2, 'TENOVATE GN CREAM 10GM'),
(2826, 2, 'TERLISTAT 1MG/10ML INJ'),
(2827, 2, 'TERMIN 300MG 10ML INJ'),
(2828, 2, 'TEROL LA 4 CAP'),
(2829, 2, 'TETANUS TOXID 0.5ML INJ (SERUM'),
(2830, 2, 'TETANUS TOXOID 5ML INJ (SERUM)'),
(2831, 2, 'TG TOR 10 TAB'),
(2832, 2, 'TG TOR 5 TAB'),
(2833, 2, 'THANK OD TAB'),
(2834, 2, 'THEO ASTHALIN SYP 100ML'),
(2835, 2, 'THEO ASTHALIN TAB'),
(2836, 2, 'THIAMIN ING'),
(2837, 2, 'THINWES 1MG/10ML'),
(2838, 2, 'THIORIL 10 TAB'),
(2839, 2, 'THIORIL 25 TAB'),
(2840, 2, 'THIOSOL 1GM INJ'),
(2841, 2, 'THIOSOL 500MG INJ'),
(2842, 2, 'THROMBIFLO 40 INJ'),
(2843, 2, 'THROMBIFLO 60 INJ'),
(2844, 2, 'THROMBOMARK OINT.'),
(2845, 2, 'TIDILAN 10MG TAB'),
(2846, 2, 'TIDILAN 20MG TAB'),
(2847, 2, 'TINILOX MPS TAB'),
(2848, 2, 'TIOVA ROTACAPS'),
(2849, 2, 'TOPCEF 200MG TAB'),
(2850, 2, 'TOPDIP 2.5MG TAB'),
(2851, 2, 'TOPDIP 5MG TAB'),
(2852, 2, 'TOPDIP AT TAB'),
(2853, 2, 'TORQ SR 4MG CAP'),
(2854, 2, 'TRAMACIP 50MG/2ML INJ'),
(2855, 2, 'TRAMADIN ING.100MG'),
(2856, 2, 'TRAMAZAC CAP'),
(2857, 2, 'TRAPEX 1 TAB'),
(2858, 2, 'TRAPEX 2 TAB'),
(2859, 2, 'TRAZOGRAF 76%'),
(2860, 2, 'TRENAXA 500 TAB'),
(2861, 2, 'TRENAXA INJ 5ML'),
(2862, 2, 'TRENAXA MF TAB'),
(2863, 2, 'TRENTAL 400 TAB'),
(2864, 2, 'TRI VOBIT 1'),
(2865, 2, 'TRI VOBIT 2'),
(2866, 2, 'TRIBEN B LOTION 30ML'),
(2867, 2, 'TRIBETROL 2 FORTE TAB.'),
(2868, 2, 'TRIGLYNASE V2 TAB.'),
(2869, 2, 'TRIMACSART'),
(2870, 2, 'TRIOHALE ROTACAPS'),
(2871, 2, 'TRIOLMESAR 20 TAB.'),
(2872, 2, 'TRIOLMESAR 40TAB'),
(2873, 2, 'TRIPINOM TAB'),
(2874, 2, 'TRIPLEACAL CAP'),
(2875, 2, 'TRIQUILAR TAB'),
(2876, 2, 'TRIVOBIT 2 TAB'),
(2877, 2, 'TRIVOLIB FORTE 1 MG TAB.'),
(2878, 2, 'TRIVOLIB FORTE 2'),
(2879, 2, 'TROPINE 1ML INJ'),
(2880, 2, 'TRUGLYDE 0 (SN 2346)'),
(2881, 2, 'TRYPTOMER 10MG TAB'),
(2882, 2, 'TRYPTOMER 25MG TAB'),
(2883, 2, 'TRYPTOMER 75MG TAB'),
(2884, 2, 'TUSQ D LOZENGES'),
(2885, 2, 'TUSQ DX SYP 100ML'),
(2886, 2, 'TUSQ TAB'),
(2887, 2, 'TUSQ X EXPT 100ML'),
(2888, 2, 'TYDOL 50 TAB'),
(2889, 2, 'UDILIV 150 TAB'),
(2890, 2, 'UDILIV 300MG TAB'),
(2891, 2, 'UGESIC 10 TAB'),
(2892, 2, 'ULGEL A LIQUID 170ML'),
(2893, 2, 'ULTRACET SEMI TAB'),
(2894, 2, 'ULTRACET TAB'),
(2895, 2, 'UPRISE D3 6L ING'),
(2896, 2, 'URIFAST TAB'),
(2897, 2, 'URILISER ORAL SOLU. 200ML'),
(2898, 2, 'URIMAX 0.4 CAPS'),
(2899, 2, 'URIMAX D TAB'),
(2900, 2, 'URIMAX F CAP'),
(2901, 2, 'URINE BAG'),
(2902, 2, 'URISPAS TAB'),
(2903, 2, 'URIVOID 25MG TAB'),
(2904, 2, 'URSOKEM PLUS TAB'),
(2905, 2, 'VALIUM 10 TAB'),
(2906, 2, 'VALIUM 2 TAB'),
(2907, 2, 'VALIUM 5 TAB'),
(2908, 2, 'VALOSIN 1ML INJ'),
(2909, 2, 'VALPARIN 200 TABS'),
(2910, 2, 'VALPARIN 200MG 100ML SYRUP'),
(2911, 2, 'VALPARIN 500 TABS'),
(2912, 2, 'VALPARIN CHRONO 300 TAB'),
(2913, 2, 'VANCOWAR CP 500 INJ'),
(2914, 2, 'VANKING 500 INJ'),
(2915, 2, 'VAPORUB'),
(2916, 2, 'VAPORUB.'),
(2917, 2, 'VASOCON ING.'),
(2918, 2, 'VAXIGRIP VACCINE'),
(2919, 2, 'VELIX 30 INJ'),
(2920, 2, 'VELTAM  PLUS  15 TAB'),
(2921, 2, 'VELTAM F TAB'),
(2922, 2, 'VENIZ XR 75 CAP'),
(2923, 2, 'VENLOR-XR 75 CAP'),
(2924, 2, 'VEPAN 500 TAB'),
(2925, 2, 'VERTIGON 25MG TAB'),
(2926, 2, 'VERTIGON FORTE TAB'),
(2927, 2, 'VERTIN 16MG TAB'),
(2928, 2, 'VERTIN 24MG TAB'),
(2929, 2, 'VERTIN 8MG TAB'),
(2930, 2, 'VERTIPRESS 8'),
(2931, 2, 'VERTISTAR 16MG TAB'),
(2932, 2, 'VERTISTAR-PLUS 8'),
(2933, 2, 'VIBACT SACHET 0.5GM'),
(2934, 2, 'VIBOLIV 500MG TAB'),
(2935, 2, 'VISYNERAL DROPS 15ML'),
(2936, 2, 'VITCOFOL C INJ AMP'),
(2937, 2, 'VITCOFOL INJ 10ML'),
(2938, 2, 'VITEXID SYRUP 150ML'),
(2939, 2, 'VOBIT M 0.2MG TAB'),
(2940, 2, 'VOBIT M 0.3MG TAB'),
(2941, 2, 'VOGLIMAC 0.2MG TAB'),
(2942, 2, 'VOGLIMAC 0.3MG TAB'),
(2943, 2, 'VOGLIMAC MD 0.2MG TAB'),
(2944, 2, 'VOGLITAB 0.3MG TAB'),
(2945, 2, 'VOGLITAB-M 0.2mg'),
(2946, 2, 'VOGLITOR MF 0.2MG TAB'),
(2947, 2, 'VOLIBO M 0.3MG TAB'),
(2948, 2, 'VOLINI GEL 30GM'),
(2949, 2, 'VOLIX 0.2MG TAB'),
(2950, 2, 'VOLIX M 0.3MG.TAB'),
(2951, 2, 'VOVERAN 3ML INJ'),
(2952, 2, 'VOVERAN 50 TAB'),
(2953, 2, 'VOVERAN EMULGEL 30GM'),
(2954, 2, 'VOVERAN SR 100 TAB'),
(2955, 2, 'VPRESS INJ'),
(2956, 2, 'WALAMYCIN SUSP 30ML'),
(2957, 2, 'WARF-2 TAB'),
(2958, 2, 'WATER FOR INJ 10ML'),
(2959, 2, 'WHITEFIELDS OINT 10GM'),
(2960, 2, 'WIKORIL 60ML SYP'),
(2961, 2, 'WIKORYL ORAL DROPS 10ML'),
(2962, 2, 'WYSOLONE 5'),
(2963, 2, 'XYLOCAINE 2% 30ML INJ'),
(2964, 2, 'ZAART H TAB'),
(2965, 2, 'ZANOCIN 100MG TAB'),
(2966, 2, 'ZANOCIN 200MG TAB'),
(2967, 2, 'ZAPIZ 0.25 TAB'),
(2968, 2, 'ZAPIZ 0.5 TAB'),
(2969, 2, 'ZATHRIN 200MG READYMIX SUSP 15'),
(2970, 2, 'ZATHRIN 250 TAB'),
(2971, 2, 'ZEDEX COUGH SYRUP 100ML'),
(2972, 2, 'ZEN 100MG TAB'),
(2973, 2, 'ZEN 200MG TAB'),
(2974, 2, 'ZEN RETARD 200 TAB'),
(2975, 2, 'ZENFLOX OZ TAB'),
(2976, 2, 'ZENFLOX-UTI TAB'),
(2977, 2, 'ZENTEL TAB'),
(2978, 2, 'ZERODOL CR TAB'),
(2979, 2, 'ZERODOL MR TAB'),
(2980, 2, 'ZERODOL P TAB'),
(2981, 2, 'ZERODOL SP TAB'),
(2982, 2, 'ZERODOL TH TAB'),
(2983, 2, 'ZESTCAL SUSP 100ML'),
(2984, 2, 'ZEVERT 16MG TAB'),
(2985, 2, 'ZEVERT 8MG TAB'),
(2986, 2, 'ZICAM 0.25MG TAB'),
(2987, 2, 'ZIFEXIM 200+200'),
(2988, 2, 'ZIFI 200 TAB'),
(2989, 2, 'ZIFI 50 DT TAB'),
(2990, 2, 'ZIFI CV 100'),
(2991, 2, 'ZIFI CV 50 ORAL SUSP. 30ML'),
(2992, 2, 'ZIFI-AZ'),
(2993, 2, 'ZIFI-LBX 200 TAB'),
(2994, 2, 'ZIFI-O TAB'),
(2995, 2, 'ZIG ZAG COTTON'),
(2996, 2, 'ZIG-ZAG COTTON 200GM'),
(2997, 2, 'ZIMNIC-AZ TAB'),
(2998, 2, 'ZIPOD 100 DT TAB'),
(2999, 2, 'ZIPOD 200MG TAB'),
(3000, 2, 'ZIVAST 10 TAB'),
(3001, 2, 'ZIX TAB'),
(3002, 2, 'ZOCEF 500 TAB'),
(3003, 2, 'ZOCON 150 TAB'),
(3004, 2, 'ZOLDEM 10'),
(3005, 2, 'ZOLDEM 10 TAB'),
(3006, 2, 'ZOLE 15GM OINT'),
(3007, 2, 'ZOLE F OINT 15GM'),
(3008, 2, 'ZOLFRESH 10MG TAB'),
(3009, 2, 'ZOLFRESH 5MG TAB'),
(3010, 2, 'ZOSERT 25 TAB'),
(3011, 2, 'ZOSPAR 200MG TAB'),
(3012, 2, 'ZYLORIC 100MG TAB'),
(3013, 2, 'sample2'),
(3014, 2, 'NIRMIN 10 PLUS'),
(3015, 2, 'NERVIJEN-P CAP'),
(3016, 2, 'NERVIJEN-P CAP'),
(3017, 2, 'NIRMIN 10 PLUS'),
(3018, 2, 'inj pan 40'),
(3019, 2, 'inj emset'),
(3020, 2, 'inj metro'),
(3021, 2, 'inj tramedol'),
(3022, 2, 'IV NS 100ML '),
(3023, 2, 'INJ OPTINEUNE +NS 100'),
(3024, 2, 'INJ TAXIM '),
(3025, 2, 'TAb BALVIN FORT'),
(3026, 2, 'TAB BELALGERIC'),
(3027, 2, 'SYP CYPON'),
(3028, 2, 'TAB ATIVAN'),
(3029, 2, 'TAB CIPLAR'),
(3030, 2, 'TAB CIPLAR LA'),
(3031, 2, 'MONOCEF '),
(3032, 2, 'MONOCEF 2GM'),
(3033, 2, 'inj taxim 1gm bd  iv metro 100ml  tds inj pan 40mg inj emset 4mg  inj buscopan bd  tab geristat  iv '),
(3034, 2, 'inj clavidur 1.2 gm'),
(3035, 2, 'inj advent 1.22'),
(3036, 2, 'TAB AKT $'),
(3037, 2, 'TAB AKT 4'),
(3038, 2, 'NOVACEF '),
(3039, 2, 'TAB NOVACEF '),
(3040, 2, 'TAB BELONG'),
(3041, 2, 'TAB MOXI '),
(3042, 2, 'TAB PANSEC DSR'),
(3043, 2, 'SYP COREX '),
(3044, 2, 'Tab Levera'),
(3045, 2, 'TAB TAXIM O'),
(3046, 2, 'TAB PANSEC 40'),
(3047, 2, 'TAB PANSEC '),
(3048, 2, 'TAB DYTOR 10MG'),
(3049, 2, 'TAB URIMAX '),
(3050, 2, 'SYP CITAL '),
(3051, 2, 'TAB EPSOLIN'),
(3052, 2, 'TAB ZAPIZ '),
(3053, 2, 'TAB ETIZOLA PLUS '),
(3054, 2, 'TAB VIBACT DS'),
(3055, 2, 'TAB O2'),
(3056, 2, 'SYP SPARACID'),
(3057, 2, 'TAB ETIZOLA PLUS '),
(3058, 2, 'TAB OROFER XT'),
(3059, 2, 'IM VITCOFOL'),
(3060, 2, 'TAB RANTAC '),
(3061, 2, 'TAB IBUGESIC ASP'),
(3062, 2, 'TAB LINIZOLID '),
(3063, 2, 'TAB PANSEC'),
(3064, 2, 'TAB MERTO '),
(3065, 2, 'TAB EMSET ODT'),
(3066, 2, 'BETADIB GARGER'),
(3067, 2, 'CANDID MOUTH PAIN'),
(3068, 2, 'CANDID MOUTH PAIN'),
(3069, 2, 'SYP Z & D '),
(3070, 2, 'SYP CALCIMAX '),
(3071, 2, 'TAB A TO Z'),
(3072, 2, 'TAB A LEVERA'),
(3073, 2, 'TAB  LEVERA'),
(3074, 2, 'TAB BENALGIS'),
(3075, 2, 'TAB BENALGIS'),
(3076, 2, 'TAB GUTNIL '),
(3077, 2, 'IV OROFER 10ML + NS 500ML'),
(3078, 2, 'TAB SHELCAL CT '),
(3079, 2, 'TAB METPUER AM'),
(3080, 2, 'TAB CILNDAMYCIN '),
(3081, 2, 'SEROFLO ROTA INHALER'),
(3082, 2, 'SEROFLO ROTA INHALER'),
(3083, 2, 'TAB TELECAST PLUS'),
(3084, 2, 'TAB ABFLO SR'),
(3085, 2, 'TAB CLAVUM'),
(3086, 2, 'TAB CHYMORAL FORT '),
(3087, 2, 'TAB CALCIMAX FORT '),
(3088, 2, 'TAB TEMSAN CT'),
(3089, 2, 'TAB NEUROBION FORT'),
(3090, 2, 'SYP ZENTOP'),
(3091, 2, 'TAB NUROKIND'),
(3092, 2, 'TAB ULTRASET '),
(3093, 2, 'TAB SAZO '),
(3094, 2, 'TAB HCQS '),
(3095, 2, 'TAB CLOPITAB A '),
(3096, 2, 'CAP HOMOCHEK'),
(3097, 2, 'TAB FEROSE XT'),
(3098, 2, 'TAB STROCIT '),
(3099, 2, 'TAB AZERTOR '),
(3100, 2, 'TA TELMA AH '),
(3101, 2, 'TAB STROCIT PLUS'),
(3102, 2, 'CAP NEUROSMART '),
(3103, 2, 'CAP URISC D3 60K '),
(3104, 2, 'TAB ZOCEF CV '),
(3105, 2, 'TAB EMANZAN-D'),
(3106, 2, 'TAB CIPLAR LA'),
(3107, 2, 'IV FALCIGO'),
(3108, 2, 'IV ZOSTUM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_appointment`
--

CREATE TABLE `tbl_new_appointment` (
  `ap_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `appointment_date` varchar(10) NOT NULL,
  `appointment_time` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ap_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_report`
--

CREATE TABLE `tbl_new_report` (
  `new_report_id` int(11) NOT NULL,
  `new_report` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_report_details`
--

CREATE TABLE `tbl_new_report_details` (
  `nr_detail_id` int(11) NOT NULL,
  `nr_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `report_img` varchar(100) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_old_report`
--

CREATE TABLE `tbl_old_report` (
  `old_report_id` int(11) NOT NULL,
  `old_report` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_old_report`
--

INSERT INTO `tbl_old_report` (`old_report_id`, `old_report`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 'blood', 5, '2021-09-08 10:40:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_old_report_details`
--

CREATE TABLE `tbl_old_report_details` (
  `or_detail_id` int(11) NOT NULL,
  `or_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `report_img` varchar(100) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_old_report_details`
--

INSERT INTO `tbl_old_report_details` (`or_detail_id`, `or_id`, `patient_id`, `opd_id`, `report_img`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 1, 1, 1, 'asset/old_reports/download.jfif', 5, '2021-09-08 10:40:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opd_master`
--

CREATE TABLE `tbl_opd_master` (
  `opd_id` int(11) NOT NULL,
  `opd_date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `followup_date` varchar(20) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `opd_status` varchar(20) NOT NULL,
  `fees` int(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_opd_master`
--

INSERT INTO `tbl_opd_master` (`opd_id`, `opd_date`, `followup_date`, `patient_id`, `clinic_id`, `opd_status`, `fees`, `time`, `is_delete`) VALUES
(1, '2021-08-31', '2021-08-31', 1, 5, '1', 100, '2021-08-31 09:53:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_past_history`
--

CREATE TABLE `tbl_past_history` (
  `past_history_id` int(11) NOT NULL,
  `past_history` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_past_history_details`
--

CREATE TABLE `tbl_past_history_details` (
  `ps_detail_id` int(11) NOT NULL,
  `ps_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_emr`
--

CREATE TABLE `tbl_patient_emr` (
  `emr_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `chief_complaints` text CHARACTER SET utf8 NOT NULL,
  `past_history` text CHARACTER SET utf16 NOT NULL,
  `personal_history` text CHARACTER SET utf8 NOT NULL,
  `general_examination` text CHARACTER SET utf8 NOT NULL,
  `systemic_examination` text CHARACTER SET utf8 NOT NULL,
  `diagnosis` text CHARACTER SET utf8 NOT NULL,
  `old_reports` text NOT NULL,
  `new_reports` text NOT NULL,
  `Investigation` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient_master`
--

CREATE TABLE `tbl_patient_master` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) NOT NULL,
  `p_mobile` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) NOT NULL,
  `p_address` text CHARACTER SET utf8 NOT NULL,
  `p_dob` varchar(20) NOT NULL,
  `p_age` varchar(20) NOT NULL,
  `p_bg` varchar(10) NOT NULL,
  `opd_status` int(11) NOT NULL DEFAULT 0,
  `profile_pic` varchar(200) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `live_status` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `check_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient_master`
--

INSERT INTO `tbl_patient_master` (`patient_id`, `first_name`, `middle_name`, `last_name`, `username`, `p_mobile`, `gender`, `p_address`, `p_dob`, `p_age`, `p_bg`, `opd_status`, `profile_pic`, `clinic_id`, `opd_id`, `reg_date`, `live_status`, `time`, `is_delete`, `check_status`) VALUES
(1, 'sumit', '', 'pawar', '', '9021205731', 'Male', 'nashik', '2021-08-31', '0 years', 'O+', 1, 'asset/user_pic/download.jfif', 5, 1, '2021-08-31', '', '2021-08-31 09:53:46', 0, 'check_out');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_history`
--

CREATE TABLE `tbl_personal_history` (
  `per_history_id` int(11) NOT NULL,
  `personal_history` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personal_history_details`
--

CREATE TABLE `tbl_personal_history_details` (
  `ph_detail_id` int(11) NOT NULL,
  `ph_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescription_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `medicine_name` text DEFAULT NULL,
  `qty` varchar(3) NOT NULL,
  `instruction_id` int(11) NOT NULL,
  `dose_id` int(11) NOT NULL,
  `txt_day` varchar(3) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescription_id`, `clinic_id`, `medicine_name`, `qty`, `instruction_id`, `dose_id`, `txt_day`, `patient_id`, `opd_id`, `medicine_id`, `is_delete`) VALUES
(1, 5, NULL, '2', 7, 5, '1', 1, 1, 1, 0),
(2, 5, NULL, '2', 2, 5, '1', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_print_instruction`
--

CREATE TABLE `tbl_print_instruction` (
  `instruction_id` int(11) NOT NULL,
  `fld_instruction` varchar(200) CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_print_instruction`
--

INSERT INTO `tbl_print_instruction` (`instruction_id`, `fld_instruction`, `clinic_id`, `fld_user_id`, `timestamp`) VALUES
(1, 'बंद - दुध / शक्कर / बेकरी प्रॉडक्ट / कोल्ड्रिंक्स ', 5, 0, '2021-06-28 17:31:37'),
(2, 'बंद वात बढ़ानेवाली चीजे जैसे -  मैदा / चना / बैंगन ', 5, 0, '2021-06-28 17:31:50'),
(3, 'पित्त बढ़ाने वाली चीजे जैसे -  तली हुई चीजे / मिर्च मसाला इ.', 5, 0, '2021-06-28 17:32:08'),
(4, 'आपकी जरुरी दवाइया जैसे  - बीपी / शुगर / हृदयरोग आदी.... आपके फिजिशियन  सलाह से लेनी है | ', 5, 0, '2021-06-28 17:32:21'),
(5, 'आपको कोनसी थेरेपी देनी है ये थेरेपिस्ट या डॉक्टर तय करेंगे ', 5, 0, '2021-06-28 17:32:34'),
(6, 'आपको दी हुई चीजे जैसे की - रिंग / मसाजर आदी का प्रयोग जैसे कहा हे वैसे और उतनी बार करना है ', 5, 0, '2021-06-28 17:32:46'),
(7, 'अगर व्यायाम कहा होगा तोहि करना है ', 5, 0, '2021-06-28 17:33:05'),
(8, 'आपको अच्छे परिणाम के लिए सकारात्मक रहना  ये बहुत जरुरी है ', 5, 0, '2021-06-28 17:33:15'),
(9, 'ज्यादा अच्छे परिणाम के लिए आपको नियमित रूपसे थेरेपी लेना आवश्यक है ', 5, 0, '2021-06-28 17:33:26'),
(10, 'हर पेशंट की तकलीफ और वो आनेका समय अलग - अलग है इसिलिए परिणामोका समयभी अलग रहेगा ', 5, 0, '2021-06-28 17:33:37'),
(11, 'कमसे-कम ३ - ४ महीना थेरेपी लेना जरुरी है ', 5, 0, '2021-06-28 17:33:47'),
(12, 'आते समय फोन पर अपॉइंटमेन्ट लेने से आपका  समय बचेगा ', 5, 0, '2021-06-28 17:34:01'),
(13, 'इमरजेंसी पेशंट को ज्यादा वक्त लग सकता है ', 5, 0, '2021-06-28 17:34:11'),
(14, 'अच्छी भावना , अच्छा आहार , अच्छा व्यवहार , सकारात्मकता और नियमित थेरेपी आपको अच्छा परिणाम दे सकती है ', 5, 0, '2021-06-28 17:34:21'),
(15, 'हर समय सहयोग के लिए तयार रहे ', 5, 0, '2021-06-28 17:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services_master`
--

CREATE TABLE `tbl_services_master` (
  `service_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` int(11) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_systemic_examination`
--

CREATE TABLE `tbl_systemic_examination` (
  `syst_exam_id` int(11) NOT NULL,
  `systemic_examination` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_systemic_examination_details`
--

CREATE TABLE `tbl_systemic_examination_details` (
  `se_detail_id` int(11) NOT NULL,
  `se_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_slot`
--

CREATE TABLE `tbl_time_slot` (
  `slot_id` int(11) NOT NULL,
  `slot_date` varchar(20) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `slot_status` varchar(10) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_time_slot`
--

INSERT INTO `tbl_time_slot` (`slot_id`, `slot_date`, `start_time`, `end_time`, `patient_id`, `clinic_id`, `slot_status`, `time_stamp`) VALUES
(1, '2021-09-01', '09:43:00', '09:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(2, '2021-09-01', '09:58:00', '10:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(3, '2021-09-01', '10:13:00', '10:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(4, '2021-09-01', '10:28:00', '10:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(5, '2021-09-01', '10:43:00', '10:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(6, '2021-09-01', '10:58:00', '11:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(7, '2021-09-01', '11:13:00', '11:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(8, '2021-09-01', '11:28:00', '11:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(9, '2021-09-01', '11:43:00', '11:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(10, '2021-09-01', '11:58:00', '12:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(11, '2021-09-01', '12:13:00', '12:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(12, '2021-09-01', '12:28:00', '12:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(13, '2021-09-01', '12:43:00', '12:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(14, '2021-09-01', '12:58:00', '13:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(15, '2021-09-01', '13:13:00', '13:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(16, '2021-09-01', '13:28:00', '13:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(17, '2021-09-01', '13:43:00', '13:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(18, '2021-09-01', '13:58:00', '14:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(19, '2021-09-01', '14:13:00', '14:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(20, '2021-09-01', '14:28:00', '14:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(21, '2021-09-01', '14:43:00', '14:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(22, '2021-09-01', '14:58:00', '15:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(23, '2021-09-01', '15:13:00', '15:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(24, '2021-09-01', '15:28:00', '15:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(25, '2021-09-01', '15:43:00', '15:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(26, '2021-09-01', '15:58:00', '16:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(27, '2021-09-01', '16:13:00', '16:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(28, '2021-09-01', '16:28:00', '16:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(29, '2021-09-01', '16:43:00', '16:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(30, '2021-09-01', '16:58:00', '17:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(31, '2021-09-01', '17:13:00', '17:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(32, '2021-09-01', '17:28:00', '17:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(33, '2021-09-01', '17:43:00', '17:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(34, '2021-09-01', '17:58:00', '18:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(35, '2021-09-01', '18:13:00', '18:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(36, '2021-09-01', '18:28:00', '18:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(37, '2021-09-01', '18:43:00', '18:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(38, '2021-09-01', '18:58:00', '19:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(39, '2021-09-01', '19:13:00', '19:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(40, '2021-09-01', '19:28:00', '19:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(41, '2021-09-01', '19:43:00', '19:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(42, '2021-09-01', '19:58:00', '20:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(43, '2021-09-01', '20:13:00', '20:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(44, '2021-09-01', '20:28:00', '20:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(45, '2021-09-01', '20:43:00', '20:58:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(46, '2021-09-01', '20:58:00', '21:13:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(47, '2021-09-01', '21:13:00', '21:28:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(48, '2021-09-01', '21:28:00', '21:43:00', 0, 5, 'free', '2021-08-31 10:14:04'),
(49, '2021-09-01', '21:43:00', '21:58:00', 0, 5, 'free', '2021-08-31 10:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment`
--

CREATE TABLE `tbl_treatment` (
  `treatment_id` int(11) NOT NULL,
  `treatment` text CHARACTER SET utf8 NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_treatment`
--

INSERT INTO `tbl_treatment` (`treatment_id`, `treatment`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 'demo', 5, '2021-08-31 09:55:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatment_details`
--

CREATE TABLE `tbl_treatment_details` (
  `treatment_detail_id` int(11) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_time` varchar(10) NOT NULL,
  `remark` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_treatment_details`
--

INSERT INTO `tbl_treatment_details` (`treatment_detail_id`, `treatment_id`, `t_date`, `t_time`, `remark`, `patient_id`, `opd_id`, `clinic_id`, `time`, `is_delete`) VALUES
(1, 1, '2021-08-31', '15:25', 'demo', 1, 1, 5, '2021-08-31 09:55:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_master`
--

CREATE TABLE `tbl_user_master` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) NOT NULL,
  `p_mobile` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) NOT NULL,
  `p_address` text CHARACTER SET utf8 NOT NULL,
  `p_dob` varchar(20) NOT NULL,
  `p_age` varchar(20) NOT NULL,
  `p_bg` varchar(10) NOT NULL,
  `opd_status` int(11) NOT NULL DEFAULT 0,
  `profile_pic` varchar(200) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `opd_id` int(11) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `live_status` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `user_type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_add_content`
--
ALTER TABLE `tbl_add_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_appointment_schedule`
--
ALTER TABLE `tbl_appointment_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_chief_complaints`
--
ALTER TABLE `tbl_chief_complaints`
  ADD PRIMARY KEY (`chief_id`);

--
-- Indexes for table `tbl_chief_complaints_details`
--
ALTER TABLE `tbl_chief_complaints_details`
  ADD PRIMARY KEY (`chief_detail_id`);

--
-- Indexes for table `tbl_clinic_master`
--
ALTER TABLE `tbl_clinic_master`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `tbl_contact_master`
--
ALTER TABLE `tbl_contact_master`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`);

--
-- Indexes for table `tbl_diagnosis_details`
--
ALTER TABLE `tbl_diagnosis_details`
  ADD PRIMARY KEY (`diagnosis_detail_id`);

--
-- Indexes for table `tbl_dose_master`
--
ALTER TABLE `tbl_dose_master`
  ADD PRIMARY KEY (`dose_id`);

--
-- Indexes for table `tbl_dose_time`
--
ALTER TABLE `tbl_dose_time`
  ADD PRIMARY KEY (`fld_dose_id`);

--
-- Indexes for table `tbl_fees_master`
--
ALTER TABLE `tbl_fees_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_general_examination`
--
ALTER TABLE `tbl_general_examination`
  ADD PRIMARY KEY (`gen_exam_id`);

--
-- Indexes for table `tbl_general_examination_details`
--
ALTER TABLE `tbl_general_examination_details`
  ADD PRIMARY KEY (`ge_detail_id`);

--
-- Indexes for table `tbl_instruction`
--
ALTER TABLE `tbl_instruction`
  ADD PRIMARY KEY (`instruction_id`);

--
-- Indexes for table `tbl_instruction_accu`
--
ALTER TABLE `tbl_instruction_accu`
  ADD PRIMARY KEY (`instruction_id`);

--
-- Indexes for table `tbl_instruction_accu_details`
--
ALTER TABLE `tbl_instruction_accu_details`
  ADD PRIMARY KEY (`instruction_detail_id`);

--
-- Indexes for table `tbl_instruction_new_add`
--
ALTER TABLE `tbl_instruction_new_add`
  ADD PRIMARY KEY (`instrucntion_id`);

--
-- Indexes for table `tbl_investigation`
--
ALTER TABLE `tbl_investigation`
  ADD PRIMARY KEY (`investigation_id`);

--
-- Indexes for table `tbl_investigation_details`
--
ALTER TABLE `tbl_investigation_details`
  ADD PRIMARY KEY (`investigation_detail_id`);

--
-- Indexes for table `tbl_master_chat`
--
ALTER TABLE `tbl_master_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_master_medicine`
--
ALTER TABLE `tbl_master_medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `tbl_master_medicine_add`
--
ALTER TABLE `tbl_master_medicine_add`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `tbl_new_appointment`
--
ALTER TABLE `tbl_new_appointment`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `tbl_new_report`
--
ALTER TABLE `tbl_new_report`
  ADD PRIMARY KEY (`new_report_id`);

--
-- Indexes for table `tbl_new_report_details`
--
ALTER TABLE `tbl_new_report_details`
  ADD PRIMARY KEY (`nr_detail_id`);

--
-- Indexes for table `tbl_old_report`
--
ALTER TABLE `tbl_old_report`
  ADD PRIMARY KEY (`old_report_id`);

--
-- Indexes for table `tbl_old_report_details`
--
ALTER TABLE `tbl_old_report_details`
  ADD PRIMARY KEY (`or_detail_id`);

--
-- Indexes for table `tbl_opd_master`
--
ALTER TABLE `tbl_opd_master`
  ADD PRIMARY KEY (`opd_id`);

--
-- Indexes for table `tbl_past_history`
--
ALTER TABLE `tbl_past_history`
  ADD PRIMARY KEY (`past_history_id`);

--
-- Indexes for table `tbl_past_history_details`
--
ALTER TABLE `tbl_past_history_details`
  ADD PRIMARY KEY (`ps_detail_id`);

--
-- Indexes for table `tbl_patient_emr`
--
ALTER TABLE `tbl_patient_emr`
  ADD PRIMARY KEY (`emr_id`);

--
-- Indexes for table `tbl_patient_master`
--
ALTER TABLE `tbl_patient_master`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_personal_history`
--
ALTER TABLE `tbl_personal_history`
  ADD PRIMARY KEY (`per_history_id`);

--
-- Indexes for table `tbl_personal_history_details`
--
ALTER TABLE `tbl_personal_history_details`
  ADD PRIMARY KEY (`ph_detail_id`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_print_instruction`
--
ALTER TABLE `tbl_print_instruction`
  ADD PRIMARY KEY (`instruction_id`);

--
-- Indexes for table `tbl_services_master`
--
ALTER TABLE `tbl_services_master`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_systemic_examination`
--
ALTER TABLE `tbl_systemic_examination`
  ADD PRIMARY KEY (`syst_exam_id`);

--
-- Indexes for table `tbl_systemic_examination_details`
--
ALTER TABLE `tbl_systemic_examination_details`
  ADD PRIMARY KEY (`se_detail_id`);

--
-- Indexes for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `tbl_treatment_details`
--
ALTER TABLE `tbl_treatment_details`
  ADD PRIMARY KEY (`treatment_detail_id`);

--
-- Indexes for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_add_content`
--
ALTER TABLE `tbl_add_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appointment_schedule`
--
ALTER TABLE `tbl_appointment_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_chief_complaints`
--
ALTER TABLE `tbl_chief_complaints`
  MODIFY `chief_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_chief_complaints_details`
--
ALTER TABLE `tbl_chief_complaints_details`
  MODIFY `chief_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_clinic_master`
--
ALTER TABLE `tbl_clinic_master`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact_master`
--
ALTER TABLE `tbl_contact_master`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_diagnosis`
--
ALTER TABLE `tbl_diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_diagnosis_details`
--
ALTER TABLE `tbl_diagnosis_details`
  MODIFY `diagnosis_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_dose_master`
--
ALTER TABLE `tbl_dose_master`
  MODIFY `dose_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dose_time`
--
ALTER TABLE `tbl_dose_time`
  MODIFY `fld_dose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_fees_master`
--
ALTER TABLE `tbl_fees_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_general_examination`
--
ALTER TABLE `tbl_general_examination`
  MODIFY `gen_exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_general_examination_details`
--
ALTER TABLE `tbl_general_examination_details`
  MODIFY `ge_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_instruction`
--
ALTER TABLE `tbl_instruction`
  MODIFY `instruction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_instruction_accu`
--
ALTER TABLE `tbl_instruction_accu`
  MODIFY `instruction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_instruction_accu_details`
--
ALTER TABLE `tbl_instruction_accu_details`
  MODIFY `instruction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_instruction_new_add`
--
ALTER TABLE `tbl_instruction_new_add`
  MODIFY `instrucntion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_investigation`
--
ALTER TABLE `tbl_investigation`
  MODIFY `investigation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_investigation_details`
--
ALTER TABLE `tbl_investigation_details`
  MODIFY `investigation_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_chat`
--
ALTER TABLE `tbl_master_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_master_medicine`
--
ALTER TABLE `tbl_master_medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_master_medicine_add`
--
ALTER TABLE `tbl_master_medicine_add`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3109;

--
-- AUTO_INCREMENT for table `tbl_new_appointment`
--
ALTER TABLE `tbl_new_appointment`
  MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_new_report`
--
ALTER TABLE `tbl_new_report`
  MODIFY `new_report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_new_report_details`
--
ALTER TABLE `tbl_new_report_details`
  MODIFY `nr_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_old_report`
--
ALTER TABLE `tbl_old_report`
  MODIFY `old_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_old_report_details`
--
ALTER TABLE `tbl_old_report_details`
  MODIFY `or_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_opd_master`
--
ALTER TABLE `tbl_opd_master`
  MODIFY `opd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_past_history`
--
ALTER TABLE `tbl_past_history`
  MODIFY `past_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_past_history_details`
--
ALTER TABLE `tbl_past_history_details`
  MODIFY `ps_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient_emr`
--
ALTER TABLE `tbl_patient_emr`
  MODIFY `emr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient_master`
--
ALTER TABLE `tbl_patient_master`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_personal_history`
--
ALTER TABLE `tbl_personal_history`
  MODIFY `per_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_personal_history_details`
--
ALTER TABLE `tbl_personal_history_details`
  MODIFY `ph_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_print_instruction`
--
ALTER TABLE `tbl_print_instruction`
  MODIFY `instruction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_services_master`
--
ALTER TABLE `tbl_services_master`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_systemic_examination`
--
ALTER TABLE `tbl_systemic_examination`
  MODIFY `syst_exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_systemic_examination_details`
--
ALTER TABLE `tbl_systemic_examination_details`
  MODIFY `se_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_time_slot`
--
ALTER TABLE `tbl_time_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_treatment`
--
ALTER TABLE `tbl_treatment`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_treatment_details`
--
ALTER TABLE `tbl_treatment_details`
  MODIFY `treatment_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_master`
--
ALTER TABLE `tbl_user_master`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
