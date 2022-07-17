-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 02:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wyathservices_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment_tbl`
--

CREATE TABLE `assessment_tbl` (
  `id` int(99) NOT NULL,
  `as_id` int(50) NOT NULL,
  `assessment_mode` int(50) NOT NULL,
  `agency_id` int(50) NOT NULL,
  `agency_name` int(50) NOT NULL,
  `assessor_id` int(50) NOT NULL,
  `assessor` int(50) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `batch_tbl`
--

CREATE TABLE `batch_tbl` (
  `id` int(11) NOT NULL,
  `bch_id` varchar(99) NOT NULL,
  `batch_type` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `course_id` varchar(25) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `tc_id` varchar(25) NOT NULL,
  `training_completed` tinyint(1) NOT NULL DEFAULT 0,
  `assessment_completed` tinyint(1) NOT NULL DEFAULT 0,
  `as_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_tbl`
--

INSERT INTO `batch_tbl` (`id`, `bch_id`, `batch_type`, `start_date`, `end_date`, `course_id`, `trainer_name`, `tc_id`, `training_completed`, `assessment_completed`, `as_id`) VALUES
(3, 'BCH-3', 'Exercitationem molli', '1976-03-08', '1996-03-08', 'Ut nulla suscipit do', 'Dora Mckenzie', 'Ex eos velit blandi', 0, 0, 'Dolorem in ea placea'),
(5, 'BCH-4', 'Nobis nihil sint dol', '2012-01-17', '1976-07-01', 'Quod autem veritatis', 'Tanya Sawyer', 'Amet fuga Obcaecat', 0, 0, 'Excepteur eos hic vo');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_tbl`
--

CREATE TABLE `candidate_tbl` (
  `c_id` int(11) NOT NULL,
  `c_salutation` enum('Mr','Ms','Mrs','Mx') NOT NULL,
  `c_full_name` varchar(30) NOT NULL,
  `c_gender` enum('Male','Female','Transgender','') NOT NULL,
  `c_dob` date NOT NULL,
  `c_mobile` varchar(12) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_marital_status` enum('Single/Unmarried','Married','Widowed','Divorced','Separated','Not to be Disclosed') NOT NULL,
  `c_father_name` varchar(50) NOT NULL,
  `c_mother_name` varchar(50) NOT NULL,
  `c_guardian_name` varchar(50) NOT NULL,
  `c_education` varchar(50) NOT NULL,
  `c_religion` enum('Atheist','Hindu','Sikh','Muslim','Christian','Buddhist','Jews','Other','Not to be Disclosed') NOT NULL,
  `c_catagory` enum('General','OBC','SC','ST','Not to be Disclosed') NOT NULL,
  `c_disablity` enum('Yes','No') NOT NULL,
  `c_type_of_disablity` enum('Locomotor Disability','Leprosy Cured Person','Dwarfism','Acid Attack Victims','Blindness/Visual Impairment','Low-vision (Visual Impairment)','Deaf','Hard of Hearing','Speech and Language Disability','Intellectual Disability /Mental Retardation','Autism Spectrum Disorder','Specific Learning Disabilities','Mental Behavior-Mental Illness','Haemophilia','Thalassemia','Sickle Cell Disease','Deaf Blindness','Cerebral Palsy','Multiple Sclerosis','Muscular Dystrophy') DEFAULT NULL,
  `c_idtype` varchar(70) NOT NULL,
  `typeofalternateid` varchar(100) DEFAULT NULL,
  `c_idno` varchar(100) NOT NULL,
  `c_perm_address` varchar(200) NOT NULL,
  `c_perm_tehsil` varchar(70) NOT NULL,
  `c_perm_district` varchar(50) NOT NULL,
  `c_perm_city` varchar(50) NOT NULL,
  `c_perm_state` varchar(60) NOT NULL,
  `c_perm_pincode` varchar(10) NOT NULL,
  `c_perm_constituency` varchar(60) NOT NULL,
  `c_comm_same_as_perm` enum('Yes','No') DEFAULT NULL,
  `c_comm_address` varchar(200) DEFAULT NULL,
  `c_comm_tehsil` varchar(70) NOT NULL,
  `c_comm_district` varchar(50) NOT NULL,
  `c_comm_city` varchar(50) NOT NULL,
  `c_comm_state` varchar(60) NOT NULL,
  `c_comm_pincode` varchar(10) NOT NULL,
  `c_comm_constituency` varchar(60) NOT NULL,
  `c_pre_traning_status` enum('Fresher','Experienced') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_tbl`
--

INSERT INTO `candidate_tbl` (`c_id`, `c_salutation`, `c_full_name`, `c_gender`, `c_dob`, `c_mobile`, `c_email`, `c_marital_status`, `c_father_name`, `c_mother_name`, `c_guardian_name`, `c_education`, `c_religion`, `c_catagory`, `c_disablity`, `c_type_of_disablity`, `c_idtype`, `typeofalternateid`, `c_idno`, `c_perm_address`, `c_perm_tehsil`, `c_perm_district`, `c_perm_city`, `c_perm_state`, `c_perm_pincode`, `c_perm_constituency`, `c_comm_same_as_perm`, `c_comm_address`, `c_comm_tehsil`, `c_comm_district`, `c_comm_city`, `c_comm_state`, `c_comm_pincode`, `c_comm_constituency`, `c_pre_traning_status`) VALUES
(2, 'Mrs', 'Margaret Leon', 'Transgender', '1990-09-12', '1282525365', 'bucohequ@mailinator.com', 'Single/Unmarried', 'Noah Padilla', 'Hayes Joyner', 'Barbara Chambers', '12th', 'Christian', 'SC', 'No', '', 'Alternate ID', 'Ration Card', 'wddwdwd', 'Dolore doloremque co', 'Voluptate id quis mi', 'DUMKA', 'Nulla laboris impedi', 'JHARKHAND', '191131', 'Vitae error asperior', 'Yes', 'Dolore doloremque co', 'Voluptate id quis mi', 'DUMKA', 'Nulla laboris impedi', 'JHARKHAND', '191131', 'Vitae error asperior', 'Fresher'),
(3, 'Mr', 'Dahlia Nguyen', 'Male', '2009-07-08', '6325625252', 'tasikal@mailinator.com', 'Single/Unmarried', 'Zeus Ward', 'Harper Dunn', 'Kermit Hutchinson', '12th', 'Sikh', 'OBC', 'No', 'Deaf Blindness', 'Alternate ID', 'PAN Card', 'efsfesfwdawdwa', 'Enim cillum tenetur ', 'adwdadawdawd', 'GANDERBAL', 'Sapiente non cupidat', 'JAMMU AND KASHMIR', '191131', 'In deserunt deserunt', 'Yes', 'Enim cillum tenetur ', 'adwdadawdawd', 'GANDERBAL', 'Sapiente non cupidat', 'JAMMU AND KASHMIR', '191131', 'In deserunt deserunt', 'Fresher');

-- --------------------------------------------------------

--
-- Table structure for table `certification_tbl`
--

CREATE TABLE `certification_tbl` (
  `id` int(11) NOT NULL,
  `crt_id` varchar(50) NOT NULL,
  `agency` varchar(50) NOT NULL,
  `certified` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `certificate_issued` varchar(50) NOT NULL,
  `certificate_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(99) NOT NULL,
  `course_id` varchar(50) DEFAULT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `sector_covered` varchar(50) NOT NULL,
  `course_fee` varchar(50) NOT NULL,
  `fee_paid_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `course_id`, `course_name`, `course_type`, `sector_covered`, `course_fee`, `fee_paid_by`) VALUES
(1, 'CR-1', 'Alvin Lindsay', 'Error consequatur mi', 'Et aut sint quia ne', 'Tenetur quos quaerat', 'Hic ad rerum sint sa'),
(2, 'CR-2', 'Miriam Goodman', 'Nihil est fugiat r', 'Ipsum veniam eu dol', 'Laudantium eaque pl', 'Non illum incididun'),
(3, 'CR-3', 'Brianna Glass', 'Sunt in consequatur', 'Fugit commodi velit', 'Qui aperiam velit po', 'Ut vel dolor volupta'),
(4, 'CR-4', 'Brianna Glass', 'Sunt in consequatur', 'Fugit commodi velit', 'Qui aperiam velit po', 'Ut vel dolor volupta'),
(5, 'CR-5', 'Alisa Hartman', 'Ullam odio ab vel fa', 'Est in mollit incidu', 'Porro quisquam ipsum', 'Id earum consectetur'),
(6, 'CR-6', 'Perry Underwood', 'Esse perferendis aut', 'Sed aut iure aliquip', 'Sed id sequi et sae', 'Quia non veniam mol'),
(7, 'CR-7', 'Sharon Madden', 'Non amet laborum S', 'Ipsum repudiandae l', 'In est magna molliti', 'Aliqua In sed incid'),
(8, 'CR-8', 'Karleigh Dominguez', 'Molestias qui volupt', 'Est iste est eos ad', 'Fugiat voluptatibus ', 'Architecto corrupti'),
(9, 'CR-9', 'Cole Clark', 'Est aut quaerat quae', 'In praesentium omnis', 'At in nihil placeat', 'Sint sequi qui molli');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `state_id`, `district_name`) VALUES
(1, 15, 'ANANTNAG'),
(2, 15, 'BADGAM'),
(3, 15, 'BANDIPORA'),
(4, 15, 'BARAMULLA'),
(5, 15, 'DODA'),
(6, 15, 'GANDERBAL'),
(7, 15, 'JAMMU'),
(8, 15, 'KARGIL'),
(9, 15, 'KATHUA'),
(10, 15, 'KISHTWAR'),
(11, 15, 'KULGAM'),
(12, 15, 'KUPWARA'),
(13, 15, 'LEH LADAKH'),
(14, 15, 'POONCH'),
(15, 15, 'PULWAMA'),
(16, 15, 'RAJAURI'),
(17, 15, 'RAMBAN'),
(18, 15, 'REASI'),
(19, 15, 'SAMBA'),
(20, 15, 'SHOPIAN'),
(21, 15, 'SRINAGAR'),
(22, 15, 'UDHAMPUR'),
(23, 1, 'NICOBARS'),
(24, 1, 'NORTH AND MIDDLE ANDAMAN'),
(25, 1, 'SOUTH ANDAMANS'),
(26, 2, 'ANANTAPUR'),
(27, 2, 'CHITTOOR'),
(28, 2, 'EAST GODAVARI'),
(29, 2, 'GUNTUR'),
(30, 2, 'KRISHNA'),
(31, 2, 'KURNOOL'),
(32, 2, 'PRAKASAM'),
(33, 2, 'SPSR NELLORE'),
(34, 2, 'SRIKAKULAM'),
(35, 2, 'VISAKHAPATANAM'),
(36, 2, 'VIZIANAGARAM'),
(37, 2, 'WEST GODAVARI'),
(38, 2, 'Y.S.R.'),
(39, 3, 'ANJAW'),
(40, 3, 'CHANGLANG'),
(41, 3, 'DIBANG VALLEY'),
(42, 3, 'EAST KAMENG'),
(43, 3, 'EAST SIANG'),
(44, 3, 'KAMLE'),
(45, 3, 'KURUNG KUMEY'),
(46, 3, 'Kra Daadi'),
(47, 3, 'LOHIT'),
(48, 3, 'LONGDING'),
(49, 3, 'LOWER DIBANG VALLEY'),
(50, 3, 'LOWER SIANG'),
(51, 3, 'LOWER SUBANSIRI'),
(52, 3, 'NAMSAI'),
(53, 3, 'PAPUM PARE'),
(54, 3, 'SIANG'),
(55, 3, 'TAWANG'),
(56, 3, 'TIRAP'),
(57, 3, 'UPPER SIANG'),
(58, 3, 'UPPER SUBANSIRI'),
(59, 3, 'WEST KAMENG'),
(60, 3, 'WEST SIANG'),
(61, 4, 'BAKSA'),
(62, 4, 'BARPETA'),
(63, 4, 'BONGAIGAON'),
(64, 4, 'Biswanath'),
(65, 4, 'CACHAR'),
(66, 4, 'CHARAIDEO'),
(67, 4, 'CHIRANG'),
(68, 4, 'DARRANG'),
(69, 4, 'DHEMAJI'),
(70, 4, 'DHUBRI'),
(71, 4, 'DIBRUGARH'),
(72, 4, 'DIMA HASAO'),
(73, 4, 'GOALPARA'),
(74, 4, 'GOLAGHAT'),
(75, 4, 'HAILAKANDI'),
(76, 4, 'HOJAI'),
(77, 4, 'JORHAT'),
(78, 4, 'KAMRUP'),
(79, 4, 'KAMRUP METRO'),
(80, 4, 'KARBI ANGLONG'),
(81, 4, 'KARIMGANJ'),
(82, 4, 'KOKRAJHAR'),
(83, 4, 'LAKHIMPUR'),
(84, 4, 'MAJULI'),
(85, 4, 'MARIGAON'),
(86, 4, 'NAGAON'),
(87, 4, 'NALBARI'),
(88, 4, 'SIVASAGAR'),
(89, 4, 'SONITPUR'),
(90, 4, 'SOUTH SALMARA MANCACHAR'),
(91, 4, 'TINSUKIA'),
(92, 4, 'UDALGURI'),
(93, 4, 'WEST KARBI ANGLONG'),
(94, 5, 'ARARIA'),
(95, 5, 'ARWAL'),
(96, 5, 'AURANGABAD'),
(97, 5, 'BANKA'),
(98, 5, 'BEGUSARAI'),
(99, 5, 'BHAGALPUR'),
(100, 5, 'BHOJPUR'),
(101, 5, 'BUXAR'),
(102, 5, 'DARBHANGA'),
(103, 5, 'GAYA'),
(104, 5, 'GOPALGANJ'),
(105, 5, 'JAMUI'),
(106, 5, 'JEHANABAD'),
(107, 5, 'KAIMUR (BHABUA)'),
(108, 5, 'KATIHAR'),
(109, 5, 'KHAGARIA'),
(110, 5, 'KISHANGANJ'),
(111, 5, 'LAKHISARAI'),
(112, 5, 'MADHEPURA'),
(113, 5, 'MADHUBANI'),
(114, 5, 'MUNGER'),
(115, 5, 'MUZAFFARPUR'),
(116, 5, 'NALANDA'),
(117, 5, 'NAWADA'),
(118, 5, 'PASHCHIM CHAMPARAN'),
(119, 5, 'PATNA'),
(120, 5, 'PURBI CHAMPARAN'),
(121, 5, 'PURNIA'),
(122, 5, 'ROHTAS'),
(123, 5, 'SAHARSA'),
(124, 5, 'SAMASTIPUR'),
(125, 5, 'SARAN'),
(126, 5, 'SHEIKHPURA'),
(127, 5, 'SHEOHAR'),
(128, 5, 'SITAMARHI'),
(129, 5, 'SIWAN'),
(130, 5, 'SUPAUL'),
(131, 5, 'VAISHALI'),
(132, 6, 'CHANDIGARH'),
(133, 7, 'BALOD'),
(134, 7, 'BALODA BAZAR'),
(135, 7, 'BALRAMPUR'),
(136, 7, 'BASTAR'),
(137, 7, 'BEMETARA'),
(138, 7, 'BIJAPUR'),
(139, 7, 'BILASPUR'),
(140, 7, 'DANTEWADA'),
(141, 7, 'DHAMTARI'),
(142, 7, 'DURG'),
(143, 7, 'GARIYABAND'),
(144, 7, 'JANJGIR-CHAMPA'),
(145, 7, 'JASHPUR'),
(146, 7, 'KABIRDHAM'),
(147, 7, 'KANKER'),
(148, 7, 'KONDAGAON'),
(149, 7, 'KORBA'),
(150, 7, 'KOREA'),
(151, 7, 'MAHASAMUND'),
(152, 7, 'MUNGELI'),
(153, 7, 'NARAYANPUR'),
(154, 7, 'RAIGARH'),
(155, 7, 'RAIPUR'),
(156, 7, 'RAJNANDGAON'),
(157, 7, 'SUKMA'),
(158, 7, 'SURAJPUR'),
(159, 7, 'SURGUJA'),
(160, 8, 'DADRA AND NAGAR HAVELI'),
(161, 9, 'DAMAN'),
(162, 9, 'DIU'),
(163, 10, 'CENTRAL'),
(164, 10, 'EAST'),
(165, 10, 'NEW DELHI'),
(166, 10, 'NORTH'),
(167, 10, 'NORTH EAST'),
(168, 10, 'NORTH WEST'),
(169, 10, 'SHAHDARA'),
(170, 10, 'SOUTH'),
(171, 10, 'SOUTH WEST'),
(172, 10, 'South East'),
(173, 10, 'WEST'),
(174, 11, 'NORTH GOA'),
(175, 11, 'SOUTH GOA'),
(176, 12, 'AHMADABAD'),
(177, 12, 'AMRELI'),
(178, 12, 'ANAND'),
(179, 12, 'ARVALLI'),
(180, 12, 'BANAS KANTHA'),
(181, 12, 'BHARUCH'),
(182, 12, 'BHAVNAGAR'),
(183, 12, 'BOTAD'),
(184, 12, 'CHHOTAUDEPUR'),
(185, 12, 'DANG'),
(186, 12, 'DEVBHUMI DWARKA'),
(187, 12, 'DOHAD'),
(188, 12, 'GANDHINAGAR'),
(189, 12, 'GIR SOMNATH'),
(190, 12, 'JAMNAGAR'),
(191, 12, 'JUNAGADH'),
(192, 12, 'KACHCHH'),
(193, 12, 'KHEDA'),
(194, 12, 'MAHESANA'),
(195, 12, 'MORBI'),
(196, 12, 'Mahisagar'),
(197, 12, 'NARMADA'),
(198, 12, 'NAVSARI'),
(199, 12, 'PANCH MAHALS'),
(200, 12, 'PATAN'),
(201, 12, 'PORBANDAR'),
(202, 12, 'RAJKOT'),
(203, 12, 'SABAR KANTHA'),
(204, 12, 'SURAT'),
(205, 12, 'SURENDRANAGAR'),
(206, 12, 'TAPI'),
(207, 12, 'VADODARA'),
(208, 12, 'VALSAD'),
(209, 13, 'AMBALA'),
(210, 13, 'BHIWANI'),
(211, 13, 'CHARKI DADRI'),
(212, 13, 'FARIDABAD'),
(213, 13, 'FATEHABAD'),
(214, 13, 'GURUGRAM'),
(215, 13, 'HISAR'),
(216, 13, 'JHAJJAR'),
(217, 13, 'JIND'),
(218, 13, 'KAITHAL'),
(219, 13, 'KARNAL'),
(220, 13, 'KURUKSHETRA'),
(221, 13, 'MAHENDRAGARH'),
(222, 13, 'MEWAT'),
(223, 13, 'PALWAL'),
(224, 13, 'PANCHKULA'),
(225, 13, 'PANIPAT'),
(226, 13, 'REWARI'),
(227, 13, 'ROHTAK'),
(228, 13, 'SIRSA'),
(229, 13, 'SONIPAT'),
(230, 13, 'YAMUNANAGAR'),
(231, 14, 'BILASPUR'),
(232, 14, 'CHAMBA'),
(233, 14, 'HAMIRPUR'),
(234, 14, 'KANGRA'),
(235, 14, 'KINNAUR'),
(236, 14, 'KULLU'),
(237, 14, 'LAHUL AND SPITI'),
(238, 14, 'MANDI'),
(239, 14, 'SHIMLA'),
(240, 14, 'SIRMAUR'),
(241, 14, 'SOLAN'),
(242, 14, 'UNA'),
(243, 16, 'BOKARO'),
(244, 16, 'CHATRA'),
(245, 16, 'DEOGHAR'),
(246, 16, 'DHANBAD'),
(247, 16, 'DUMKA'),
(248, 16, 'EAST SINGHBUM'),
(249, 16, 'GARHWA'),
(250, 16, 'GIRIDIH'),
(251, 16, 'GODDA'),
(252, 16, 'GUMLA'),
(253, 16, 'HAZARIBAGH'),
(254, 16, 'JAMTARA'),
(255, 16, 'KHUNTI'),
(256, 16, 'KODERMA'),
(257, 16, 'LATEHAR'),
(258, 16, 'LOHARDAGA'),
(259, 16, 'PAKUR'),
(260, 16, 'PALAMU'),
(261, 16, 'RAMGARH'),
(262, 16, 'RANCHI'),
(263, 16, 'SAHEBGANJ'),
(264, 16, 'SARAIKELA KHARSAWAN'),
(265, 16, 'SIMDEGA'),
(266, 16, 'WEST SINGHBHUM'),
(267, 17, 'BAGALKOT'),
(268, 17, 'BALLARI'),
(269, 17, 'BELAGAVI'),
(270, 17, 'BENGALURU RURAL'),
(271, 17, 'BENGALURU URBAN'),
(272, 17, 'BIDAR'),
(273, 17, 'CHAMARAJANAGAR'),
(274, 17, 'CHIKBALLAPUR'),
(275, 17, 'CHIKKAMAGALURU'),
(276, 17, 'CHITRADURGA'),
(277, 17, 'DAKSHIN KANNAD'),
(278, 17, 'DAVANGERE'),
(279, 17, 'DHARWAD'),
(280, 17, 'GADAG'),
(281, 17, 'HASSAN'),
(282, 17, 'HAVERI'),
(283, 17, 'KALABURAGI'),
(284, 17, 'KODAGU'),
(285, 17, 'KOLAR'),
(286, 17, 'KOPPAL'),
(287, 17, 'MANDYA'),
(288, 17, 'MYSURU'),
(289, 17, 'RAICHUR'),
(290, 17, 'RAMANAGARA'),
(291, 17, 'SHIVAMOGGA'),
(292, 17, 'TUMAKURU'),
(293, 17, 'UDUPI'),
(294, 17, 'UTTAR KANNAD'),
(295, 17, 'VIJAYAPURA'),
(296, 17, 'YADGIR'),
(297, 18, 'ALAPPUZHA'),
(298, 18, 'ERNAKULAM'),
(299, 18, 'IDUKKI'),
(300, 18, 'KANNUR'),
(301, 18, 'KASARAGOD'),
(302, 18, 'KOLLAM'),
(303, 18, 'KOTTAYAM'),
(304, 18, 'KOZHIKODE'),
(305, 18, 'MALAPPURAM'),
(306, 18, 'PALAKKAD'),
(307, 18, 'PATHANAMTHITTA'),
(308, 18, 'THIRUVANANTHAPURAM'),
(309, 18, 'THRISSUR'),
(310, 18, 'WAYANAD'),
(311, 19, 'LAKSHADWEEP DISTRICT'),
(312, 20, 'AGAR MALWA'),
(313, 20, 'ALIRAJPUR'),
(314, 20, 'ANUPPUR'),
(315, 20, 'ASHOKNAGAR'),
(316, 20, 'BALAGHAT'),
(317, 20, 'BARWANI'),
(318, 20, 'BETUL'),
(319, 20, 'BHIND'),
(320, 20, 'BHOPAL'),
(321, 20, 'BURHANPUR'),
(322, 20, 'CHHATARPUR'),
(323, 20, 'CHHINDWARA'),
(324, 20, 'DAMOH'),
(325, 20, 'DATIA'),
(326, 20, 'DEWAS'),
(327, 20, 'DHAR'),
(328, 20, 'DINDORI'),
(329, 20, 'EAST NIMAR'),
(330, 20, 'GUNA'),
(331, 20, 'GWALIOR'),
(332, 20, 'HARDA'),
(333, 20, 'HOSHANGABAD'),
(334, 20, 'INDORE'),
(335, 20, 'JABALPUR'),
(336, 20, 'JHABUA'),
(337, 20, 'KATNI'),
(338, 20, 'KHARGONE'),
(339, 20, 'MANDLA'),
(340, 20, 'MANDSAUR'),
(341, 20, 'MORENA'),
(342, 20, 'NARSINGHPUR'),
(343, 20, 'NEEMUCH'),
(344, 20, 'PANNA'),
(345, 20, 'RAISEN'),
(346, 20, 'RAJGARH'),
(347, 20, 'RATLAM'),
(348, 20, 'REWA'),
(349, 20, 'SAGAR'),
(350, 20, 'SATNA'),
(351, 20, 'SEHORE'),
(352, 20, 'SEONI'),
(353, 20, 'SHAHDOL'),
(354, 20, 'SHAJAPUR'),
(355, 20, 'SHEOPUR'),
(356, 20, 'SHIVPURI'),
(357, 20, 'SIDHI'),
(358, 20, 'SINGRAULI'),
(359, 20, 'TIKAMGARH'),
(360, 20, 'UJJAIN'),
(361, 20, 'UMARIA'),
(362, 20, 'VIDISHA'),
(363, 21, 'AHMEDNAGAR'),
(364, 21, 'AKOLA'),
(365, 21, 'AMRAVATI'),
(366, 21, 'AURANGABAD'),
(367, 21, 'BEED'),
(368, 21, 'BHANDARA'),
(369, 21, 'BULDHANA'),
(370, 21, 'CHANDRAPUR'),
(371, 21, 'DHULE'),
(372, 21, 'GADCHIROLI'),
(373, 21, 'GONDIA'),
(374, 21, 'HINGOLI'),
(375, 21, 'JALGAON'),
(376, 21, 'JALNA'),
(377, 21, 'KOLHAPUR'),
(378, 21, 'LATUR'),
(379, 21, 'MUMBAI'),
(380, 21, 'MUMBAI SUBURBAN'),
(381, 21, 'NAGPUR'),
(382, 21, 'NANDED'),
(383, 21, 'NANDURBAR'),
(384, 21, 'NASHIK'),
(385, 21, 'OSMANABAD'),
(386, 21, 'PALGHAR'),
(387, 21, 'PARBHANI'),
(388, 21, 'PUNE'),
(389, 21, 'RAIGAD'),
(390, 21, 'RATNAGIRI'),
(391, 21, 'SANGLI'),
(392, 21, 'SATARA'),
(393, 21, 'SINDHUDURG'),
(394, 21, 'SOLAPUR'),
(395, 21, 'THANE'),
(396, 21, 'WARDHA'),
(397, 21, 'WASHIM'),
(398, 21, 'YAVATMAL'),
(399, 22, 'BISHNUPUR'),
(400, 22, 'CHANDEL'),
(401, 22, 'CHURACHANDPUR'),
(402, 22, 'IMPHAL EAST'),
(403, 22, 'IMPHAL WEST'),
(404, 22, 'JIRIBAM'),
(405, 22, 'KAKCHING'),
(406, 22, 'KAMJONG'),
(407, 22, 'KANGPOKPI'),
(408, 22, 'NONEY'),
(409, 22, 'PHERZAWL'),
(410, 22, 'SENAPATI'),
(411, 22, 'TAMENGLONG'),
(412, 22, 'TENGNOUPAL'),
(413, 22, 'THOUBAL'),
(414, 22, 'UKHRUL'),
(415, 23, 'EAST GARO HILLS'),
(416, 23, 'EAST JAINTIA HILLS'),
(417, 23, 'EAST KHASI HILLS'),
(418, 23, 'NORTH GARO HILLS'),
(419, 23, 'RI BHOI'),
(420, 23, 'SOUTH GARO HILLS'),
(421, 23, 'SOUTH WEST GARO HILLS'),
(422, 23, 'SOUTH WEST KHASI HILLS'),
(423, 23, 'WEST GARO HILLS'),
(424, 23, 'WEST JAINTIA HILLS'),
(425, 23, 'WEST KHASI HILLS'),
(426, 24, 'AIZAWL'),
(427, 24, 'CHAMPHAI'),
(428, 24, 'KOLASIB'),
(429, 24, 'LAWNGTLAI'),
(430, 24, 'LUNGLEI'),
(431, 24, 'MAMIT'),
(432, 24, 'SAIHA'),
(433, 24, 'SERCHHIP'),
(434, 25, 'DIMAPUR'),
(435, 25, 'KIPHIRE'),
(436, 25, 'KOHIMA'),
(437, 25, 'LONGLENG'),
(438, 25, 'MOKOKCHUNG'),
(439, 25, 'MON'),
(440, 25, 'PEREN'),
(441, 25, 'PHEK'),
(442, 25, 'TUENSANG'),
(443, 25, 'WOKHA'),
(444, 25, 'ZUNHEBOTO'),
(445, 26, 'ANUGUL'),
(446, 26, 'BALANGIR'),
(447, 26, 'BALESHWAR'),
(448, 26, 'BARGARH'),
(449, 26, 'BHADRAK'),
(450, 26, 'BOUDH'),
(451, 26, 'CUTTACK'),
(452, 26, 'DEOGARH'),
(453, 26, 'DHENKANAL'),
(454, 26, 'GAJAPATI'),
(455, 26, 'GANJAM'),
(456, 26, 'JAGATSINGHAPUR'),
(457, 26, 'JAJAPUR'),
(458, 26, 'JHARSUGUDA'),
(459, 26, 'KALAHANDI'),
(460, 26, 'KANDHAMAL'),
(461, 26, 'KENDRAPARA'),
(462, 26, 'KENDUJHAR'),
(463, 26, 'KHORDHA'),
(464, 26, 'KORAPUT'),
(465, 26, 'MALKANGIRI'),
(466, 26, 'MAYURBHANJ'),
(467, 26, 'NABARANGPUR'),
(468, 26, 'NAYAGARH'),
(469, 26, 'NUAPADA'),
(470, 26, 'PURI'),
(471, 26, 'RAYAGADA'),
(472, 26, 'SAMBALPUR'),
(473, 26, 'SONEPUR'),
(474, 26, 'SUNDARGARH'),
(475, 27, 'KARAIKAL'),
(476, 27, 'MAHE'),
(477, 27, 'PONDICHERRY'),
(478, 27, 'YANAM'),
(479, 28, 'AMRITSAR'),
(480, 28, 'BARNALA'),
(481, 28, 'BATHINDA'),
(482, 28, 'FARIDKOT'),
(483, 28, 'FATEHGARH SAHIB'),
(484, 28, 'FAZILKA'),
(485, 28, 'FIROZEPUR'),
(486, 28, 'GURDASPUR'),
(487, 28, 'HOSHIARPUR'),
(488, 28, 'JALANDHAR'),
(489, 28, 'KAPURTHALA'),
(490, 28, 'LUDHIANA'),
(491, 28, 'MANSA'),
(492, 28, 'MOGA'),
(493, 28, 'PATHANKOT'),
(494, 28, 'PATIALA'),
(495, 28, 'RUPNAGAR'),
(496, 28, 'S.A.S Nagar'),
(497, 28, 'SANGRUR'),
(498, 28, 'SRI MUKTSAR SAHIB'),
(499, 28, 'Shahid Bhagat Singh Nagar'),
(500, 28, 'Tarn Taran'),
(501, 29, 'AJMER'),
(502, 29, 'ALWAR'),
(503, 29, 'BANSWARA'),
(504, 29, 'BARAN'),
(505, 29, 'BARMER'),
(506, 29, 'BHARATPUR'),
(507, 29, 'BHILWARA'),
(508, 29, 'BIKANER'),
(509, 29, 'BUNDI'),
(510, 29, 'CHITTORGARH'),
(511, 29, 'CHURU'),
(512, 29, 'DAUSA'),
(513, 29, 'DHOLPUR'),
(514, 29, 'DUNGARPUR'),
(515, 29, 'GANGANAGAR'),
(516, 29, 'HANUMANGARH'),
(517, 29, 'JAIPUR'),
(518, 29, 'JAISALMER'),
(519, 29, 'JALORE'),
(520, 29, 'JHALAWAR'),
(521, 29, 'JHUNJHUNU'),
(522, 29, 'JODHPUR'),
(523, 29, 'KARAULI'),
(524, 29, 'KOTA'),
(525, 29, 'NAGAUR'),
(526, 29, 'PALI'),
(527, 29, 'PRATAPGARH'),
(528, 29, 'RAJSAMAND'),
(529, 29, 'SAWAI MADHOPUR'),
(530, 29, 'SIKAR'),
(531, 29, 'SIROHI'),
(532, 29, 'TONK'),
(533, 29, 'UDAIPUR'),
(534, 30, 'EAST DISTRICT'),
(535, 30, 'NORTH DISTRICT'),
(536, 30, 'SOUTH DISTRICT'),
(537, 30, 'WEST DISTRICT'),
(538, 31, 'Ariyalur'),
(539, 31, 'CHENNAI'),
(540, 31, 'COIMBATORE'),
(541, 31, 'CUDDALORE'),
(542, 31, 'DHARMAPURI'),
(543, 31, 'DINDIGUL'),
(544, 31, 'ERODE'),
(545, 31, 'KANCHIPURAM'),
(546, 31, 'KANNIYAKUMARI'),
(547, 31, 'KARUR'),
(548, 31, 'KRISHNAGIRI'),
(549, 31, 'MADURAI'),
(550, 31, 'NAGAPATTINAM'),
(551, 31, 'NAMAKKAL'),
(552, 31, 'PERAMBALUR'),
(553, 31, 'PUDUKKOTTAI'),
(554, 31, 'RAMANATHAPURAM'),
(555, 31, 'SALEM'),
(556, 31, 'SIVAGANGA'),
(557, 31, 'THANJAVUR'),
(558, 31, 'THE NILGIRIS'),
(559, 31, 'THENI'),
(560, 31, 'THIRUVALLUR'),
(561, 31, 'THIRUVARUR'),
(562, 31, 'TIRUCHIRAPPALLI'),
(563, 31, 'TIRUNELVELI'),
(564, 31, 'TIRUPPUR'),
(565, 31, 'TIRUVANNAMALAI'),
(566, 31, 'TUTICORIN'),
(567, 31, 'VELLORE'),
(568, 31, 'VILLUPURAM'),
(569, 31, 'VIRUDHUNAGAR'),
(570, 32, 'ADILABAD'),
(571, 32, 'BHADRADRI KOTHAGUDEM'),
(572, 32, 'HYDERABAD'),
(573, 32, 'JANGOAN'),
(574, 32, 'JAYASHANKAR BHUPALAPALLY'),
(575, 32, 'JOGULAMBA GADWAL'),
(576, 32, 'Jagitial'),
(577, 32, 'KAMAREDDY'),
(578, 32, 'KARIMNAGAR'),
(579, 32, 'KHAMMAM'),
(580, 32, 'KUMURAM BHEEM ASIFABAD'),
(581, 32, 'MAHABUBABAD'),
(582, 32, 'MAHABUBNAGAR'),
(583, 32, 'MANCHERIAL'),
(584, 32, 'MEDAK'),
(585, 32, 'MEDCHAL MALKAJGIRI'),
(586, 32, 'NAGARKURNOOL'),
(587, 32, 'NALGONDA'),
(588, 32, 'NIZAMABAD'),
(589, 32, 'Nirmal'),
(590, 32, 'PEDDAPALLI'),
(591, 32, 'RAJANNA SIRCILLA'),
(592, 32, 'RANGA REDDY'),
(593, 32, 'SANGAREDDY'),
(594, 32, 'SIDDIPET'),
(595, 32, 'SURYAPET'),
(596, 32, 'VIKARABAD'),
(597, 32, 'WANAPARTHY'),
(598, 32, 'WARANGAL RURAL'),
(599, 32, 'WARANGAL URBAN'),
(600, 32, 'YADADRI BHUVANAGIRI'),
(601, 33, 'Dhalai'),
(602, 33, 'Gomati'),
(603, 33, 'Khowai'),
(604, 33, 'North Tripura'),
(605, 33, 'Sepahijala'),
(606, 33, 'South Tripura'),
(607, 33, 'Unakoti'),
(608, 33, 'West Tripura'),
(609, 34, 'AGRA'),
(610, 34, 'ALIGARH'),
(611, 34, 'ALLAHABAD'),
(612, 34, 'AMBEDKAR NAGAR'),
(613, 34, 'AMROHA'),
(614, 34, 'AURAIYA'),
(615, 34, 'AZAMGARH'),
(616, 34, 'Amethi'),
(617, 34, 'BAGHPAT'),
(618, 34, 'BAHRAICH'),
(619, 34, 'BALLIA'),
(620, 34, 'BALRAMPUR'),
(621, 34, 'BANDA'),
(622, 34, 'BARABANKI'),
(623, 34, 'BAREILLY'),
(624, 34, 'BASTI'),
(625, 34, 'BHADOHI'),
(626, 34, 'BIJNOR'),
(627, 34, 'BUDAUN'),
(628, 34, 'BULANDSHAHR'),
(629, 34, 'CHANDAULI'),
(630, 34, 'CHITRAKOOT'),
(631, 34, 'DEORIA'),
(632, 34, 'ETAH'),
(633, 34, 'ETAWAH'),
(634, 34, 'FAIZABAD'),
(635, 34, 'FARRUKHABAD'),
(636, 34, 'FATEHPUR'),
(637, 34, 'FIROZABAD'),
(638, 34, 'GAUTAM BUDDHA NAGAR'),
(639, 34, 'GHAZIABAD'),
(640, 34, 'GHAZIPUR'),
(641, 34, 'GONDA'),
(642, 34, 'GORAKHPUR'),
(643, 34, 'HAMIRPUR'),
(644, 34, 'HAPUR'),
(645, 34, 'HARDOI'),
(646, 34, 'HATHRAS'),
(647, 34, 'JALAUN'),
(648, 34, 'JAUNPUR'),
(649, 34, 'JHANSI'),
(650, 34, 'KANNAUJ'),
(651, 34, 'KANPUR DEHAT'),
(652, 34, 'KANPUR NAGAR'),
(653, 34, 'KAUSHAMBI'),
(654, 34, 'KHERI'),
(655, 34, 'KUSHI NAGAR'),
(656, 34, 'Kasganj'),
(657, 34, 'LALITPUR'),
(658, 34, 'LUCKNOW'),
(659, 34, 'MAHARAJGANJ'),
(660, 34, 'MAHOBA'),
(661, 34, 'MAINPURI'),
(662, 34, 'MATHURA'),
(663, 34, 'MAU'),
(664, 34, 'MEERUT'),
(665, 34, 'MIRZAPUR'),
(666, 34, 'MORADABAD'),
(667, 34, 'MUZAFFARNAGAR'),
(668, 34, 'PILIBHIT'),
(669, 34, 'PRATAPGARH'),
(670, 34, 'RAE BARELI'),
(671, 34, 'RAMPUR'),
(672, 34, 'SAHARANPUR'),
(673, 34, 'SAMBHAL'),
(674, 34, 'SANT KABEER NAGAR'),
(675, 34, 'SHAHJAHANPUR'),
(676, 34, 'SHAMLI'),
(677, 34, 'SHRAVASTI'),
(678, 34, 'SIDDHARTH NAGAR'),
(679, 34, 'SITAPUR'),
(680, 34, 'SONBHADRA'),
(681, 34, 'SULTANPUR'),
(682, 34, 'UNNAO'),
(683, 34, 'VARANASI'),
(684, 35, 'ALMORA'),
(685, 35, 'BAGESHWAR'),
(686, 35, 'CHAMOLI'),
(687, 35, 'CHAMPAWAT'),
(688, 35, 'DEHRADUN'),
(689, 35, 'HARIDWAR'),
(690, 35, 'NAINITAL'),
(691, 35, 'PAURI GARHWAL'),
(692, 35, 'PITHORAGARH'),
(693, 35, 'RUDRA PRAYAG'),
(694, 35, 'TEHRI GARHWAL'),
(695, 35, 'UDAM SINGH NAGAR'),
(696, 35, 'UTTAR KASHI'),
(697, 36, '24 PARAGANAS NORTH'),
(698, 36, '24 PARAGANAS SOUTH'),
(699, 36, 'Alipurduar'),
(700, 36, 'BANKURA'),
(701, 36, 'BIRBHUM'),
(702, 36, 'COOCHBEHAR'),
(703, 36, 'DARJEELING'),
(704, 36, 'DINAJPUR DAKSHIN'),
(705, 36, 'DINAJPUR UTTAR'),
(706, 36, 'HOOGHLY'),
(707, 36, 'HOWRAH'),
(708, 36, 'JALPAIGURI'),
(709, 36, 'Jhargram'),
(710, 36, 'KALIMPONG'),
(711, 36, 'KOLKATA'),
(712, 36, 'MALDAH'),
(713, 36, 'MEDINIPUR EAST'),
(714, 36, 'MEDINIPUR WEST'),
(715, 36, 'MURSHIDABAD'),
(716, 36, 'NADIA'),
(717, 36, 'PASCHIM BARDHAMAN'),
(718, 36, 'PURBA BARDHAMAN'),
(719, 36, 'PURULIA');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHANDIGARH'),
(7, 'CHHATTISGARH'),
(8, 'DADRA AND NAGAR HAVELI'),
(9, 'DAMAN AND DIU'),
(10, 'DELHI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HARYANA'),
(14, 'HIMACHAL PRADESH'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KARNATAKA'),
(18, 'KERALA'),
(19, 'LAKSHADWEEP'),
(20, 'MADHYA PRADESH'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MEGHALAYA'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ODISHA'),
(27, 'PUDUCHERRY'),
(28, 'PUNJAB'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TELANGANA'),
(33, 'TRIPURA'),
(34, 'UTTAR PRADESH'),
(35, 'UTTARAKHAND'),
(36, 'WEST BENGAL');

-- --------------------------------------------------------

--
-- Table structure for table `training_center_tbl`
--

CREATE TABLE `training_center_tbl` (
  `id` int(25) NOT NULL,
  `tc_id` varchar(50) NOT NULL,
  `training_center_name` varchar(50) NOT NULL,
  `training_center_address` varchar(50) NOT NULL,
  `training_center_district` varchar(50) NOT NULL,
  `training_center_pincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `training_center_tbl`
--

INSERT INTO `training_center_tbl` (`id`, `tc_id`, `training_center_name`, `training_center_address`, `training_center_district`, `training_center_pincode`) VALUES
(6, 'TRC-6', 'safaporadsefesfesfsf', 'skjfhkjfkshfk', 'kjsfkksfsefse', '191131'),
(7, 'TRC-7', 'Karyn Barry', 'Aliquip aspernatur o', 'Dolorum ipsum in id', 'Laudantium quis ess'),
(8, 'TRC-8', 'Althea Curry', 'Quod cillum sit bea', 'Eaque nostrum do dol', 'Odit molestiae dolor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment_tbl`
--
ALTER TABLE `assessment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_tbl`
--
ALTER TABLE `candidate_tbl`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `certification_tbl`
--
ALTER TABLE `certification_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `training_center_tbl`
--
ALTER TABLE `training_center_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment_tbl`
--
ALTER TABLE `assessment_tbl`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_tbl`
--
ALTER TABLE `batch_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `candidate_tbl`
--
ALTER TABLE `candidate_tbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certification_tbl`
--
ALTER TABLE `certification_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `training_center_tbl`
--
ALTER TABLE `training_center_tbl`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
