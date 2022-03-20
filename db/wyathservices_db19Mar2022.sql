-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 06:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

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
-- Table structure for table `about_tbl`
--

CREATE TABLE `about_tbl` (
  `ab_id` int(11) NOT NULL,
  `ab_title` varchar(100) NOT NULL,
  `ab_subtitle` varchar(100) NOT NULL,
  `ab_desc` text NOT NULL,
  `ab_image_path` varchar(100) NOT NULL,
  `ab_district_covered` int(11) NOT NULL,
  `ab_centres_established` int(11) NOT NULL,
  `ab_students_impacted` int(11) NOT NULL,
  `ab_corporate_engaged` int(11) NOT NULL,
  `ab_vision_des` varchar(500) NOT NULL,
  `ab_mission_des` varchar(500) NOT NULL,
  `ab_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the about';

--
-- Dumping data for table `about_tbl`
--

INSERT INTO `about_tbl` (`ab_id`, `ab_title`, `ab_subtitle`, `ab_desc`, `ab_image_path`, `ab_district_covered`, `ab_centres_established`, `ab_students_impacted`, `ab_corporate_engaged`, `ab_vision_des`, `ab_mission_des`, `ab_status`) VALUES
(1, 'CREATING NEW GENERATION TALENT POOL', 'TO BRIDGE THE INDUSTRY-ACADEMIA SKILL GAP, AND TO DEVELOP THE NEXT GENERATION WORK FORCE, WYATH SERV', 'The setting up of Wyath Services Private Limited in 2016 was triggered by the increasing unemployment and demand for trained manpower for the jobs created in various sectors. The idea which was put into reality by 4 members, is one of Jammu and Kashmir\'s largest training companies with a goal to train 50000 students with a special focus on aspirants belonging to rural India, Vulnerable Geographies, Women, Persons With Disabilities (PwDs), SCs, OBCs & empower them with employable & entrepreneurship skill set by 2030 through a network of our institutes of skills.\r\nOur model is based on addressing the needs of the industry and is therefore focused on making students/trainees work-ready. We work extensively with various key stakeholders – government (central and state), private companies (sponsors and employers), foundations, trainees and parents - creating a vibrant mix of trainee/employer programmes both sponsored and paid with a singular objective of matching youth to jobs or self-employment opportunities.\r\nAbout Us:\r\nWyath Services Pvt. Ltd. was founded in 2016 and is located with its headquarters at Srinagar, Kashmir. The directors and team have in excess of 10 years of experience in Training, Consulting Services and Project Management in different sectors like Skill Development, Training, Hospitality, IT-ITES, Market Research Infrastructure development. As an organization we endeavor to work with clients to produce best possible results. At Wyath service we have the ability to align diversified and intricate training needs of our clients by providing reliable and strategic management solutions.\r\n\r\nServices:\r\nWyath services is a management team consisting of academicians and corporate professionals who have experience in their individuals domains for more than a decade with deep understanding of processes and knowhow of the industry verticals. “Our services are tailored to meet crucial challenges of providing quality profiles in order to build a strong talent pool for our clients.”', 'uploads/images/aboutus/2022-03-11/a.jpg', 14, 25, 5000, 50, 'We aspire to be partner of choice for our clients and talent development initiatives through our excellence of work, integrity, speed of response and dedication; leading to enduring relationships.', 'We aspire to be partner of choice for our clients and talent development initiatives through our excellence of work, integrity, speed of response and dedication; leading to enduring relationships.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_tbl`
--

CREATE TABLE `banner_tbl` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(50) DEFAULT NULL,
  `b_img_path` varchar(150) NOT NULL,
  `b_isvisible` tinyint(1) NOT NULL DEFAULT 0,
  `b_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_dou` datetime NOT NULL,
  `b_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the banner';

--
-- Dumping data for table `banner_tbl`
--

INSERT INTO `banner_tbl` (`b_id`, `b_title`, `b_img_path`, `b_isvisible`, `b_doc`, `b_dou`, `b_status`) VALUES
(65, 'Isoft', 'uploads/images/banner/2022-03-11/i1.png', 1, '2022-03-11 08:12:21', '2022-03-11 01:45:04', 1),
(66, 'Demo Banner', 'uploads/images/banner/2022-03-11/p.jpg', 1, '2022-03-11 08:14:13', '2022-03-11 01:45:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `board_members_tbl`
--

CREATE TABLE `board_members_tbl` (
  `bm_id` int(11) NOT NULL,
  `bm_name` varchar(50) NOT NULL,
  `bm_desig` varchar(50) NOT NULL,
  `bm_img_path` varchar(100) NOT NULL,
  `bm_ischairman` tinyint(1) NOT NULL DEFAULT 0,
  `bm_chairman_msg` text NOT NULL,
  `bm_status` tinyint(1) NOT NULL DEFAULT 1,
  `bm_page` enum('directors','advisory','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the board members';

-- --------------------------------------------------------

--
-- Table structure for table `contact_det_tbl`
--

CREATE TABLE `contact_det_tbl` (
  `cont_id` int(11) NOT NULL,
  `cont_address` varchar(100) NOT NULL,
  `cont_area` varchar(100) NOT NULL,
  `cont_pincode` int(100) NOT NULL,
  `cont_state` varchar(100) NOT NULL,
  `cont_country` varchar(100) NOT NULL,
  `cont_email` varchar(100) NOT NULL,
  `cont_phone_no` int(13) NOT NULL,
  `cont_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the contact';

--
-- Dumping data for table `contact_det_tbl`
--

INSERT INTO `contact_det_tbl` (`cont_id`, `cont_address`, `cont_area`, `cont_pincode`, `cont_state`, `cont_country`, `cont_email`, `cont_phone_no`, `cont_status`) VALUES
(1, 'Safapora', 'Safapora', 193504, 'Jammu & Kashmir', 'India', 'eraamirsofi@gmail.com', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_tbl`
--

CREATE TABLE `contact_us_tbl` (
  `con_us_id` int(11) NOT NULL,
  `con_us_name` varchar(50) NOT NULL,
  `con_us_email` varchar(50) NOT NULL,
  `con_us_phoneno` varchar(13) NOT NULL,
  `con_us_subject` varchar(50) NOT NULL,
  `con_us_message` text NOT NULL,
  `con_us_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the contact us';

-- --------------------------------------------------------

--
-- Table structure for table `event_gallery_tbl`
--

CREATE TABLE `event_gallery_tbl` (
  `ev_gl_id` int(11) NOT NULL,
  `ev_gl_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the event gallery';

--
-- Dumping data for table `event_gallery_tbl`
--

INSERT INTO `event_gallery_tbl` (`ev_gl_id`, `ev_gl_name`) VALUES
(1, 'new year party'),
(2, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_desc` text NOT NULL,
  `event_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `event_dou` datetime NOT NULL,
  `event_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the event';

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`event_id`, `event_title`, `event_desc`, `event_doc`, `event_dou`, `event_status`) VALUES
(1, 'This is event title 1', 'this is event description', '2022-03-03 15:07:40', '2022-03-03 08:37:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured_initiatives_tbl`
--

CREATE TABLE `featured_initiatives_tbl` (
  `fi_id` int(11) NOT NULL,
  `fi_title` varchar(50) NOT NULL,
  `fi_desc` varchar(100) NOT NULL,
  `fi_dou` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fi_doc` datetime NOT NULL DEFAULT current_timestamp(),
  `fi_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the featured initiatives';

--
-- Dumping data for table `featured_initiatives_tbl`
--

INSERT INTO `featured_initiatives_tbl` (`fi_id`, `fi_title`, `fi_desc`, `fi_dou`, `fi_doc`, `fi_status`) VALUES
(3, 'BRIDGE', 'A Large Industry-Institute Interaction Event of India', '2022-03-19 05:09:04', '2022-03-01 16:09:11', 1),
(5, 'JOURNALS', 'Peer-Reviewed International Journals', '2022-03-19 05:09:20', '2022-03-19 10:39:20', 1),
(6, 'YOUTH', 'The New Gen Leader', '2022-03-19 05:09:28', '2022-03-19 10:39:28', 1),
(7, 'WYATH SERVICES DIGITAL LITERACY MISSION', 'Creating Digitally Enabled India', '2022-03-19 05:09:38', '2022-03-19 10:39:38', 1),
(8, ' POWER SEMINAR', 'Empowering Students', '2022-03-19 05:09:46', '2022-03-19 10:39:46', 1),
(9, 'WYATH SERVICES PLACEMENT DRIVE', 'Exclusively for Wyath Services Member College Students', '2022-03-19 05:09:54', '2022-03-19 10:39:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

CREATE TABLE `gallery_tbl` (
  `gal_id` int(11) NOT NULL,
  `gal_img_caption` varchar(100) NOT NULL,
  `gal_img_path` varchar(100) NOT NULL,
  `gal_event_id` int(11) NOT NULL,
  `gal_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the gallery';

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`gal_id`, `gal_img_caption`, `gal_img_path`, `gal_event_id`, `gal_status`) VALUES
(1, 'test data', 'test data', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `init_services_tbl`
--

CREATE TABLE `init_services_tbl` (
  `init_ser_id` int(11) NOT NULL,
  `init_ser_title` varchar(100) NOT NULL,
  `init_ser_desc` text NOT NULL,
  `init_ser_status` tinyint(1) NOT NULL DEFAULT 1,
  `init_ser_page` enum('services','initiatives','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the initatives';

--
-- Dumping data for table `init_services_tbl`
--

INSERT INTO `init_services_tbl` (`init_ser_id`, `init_ser_title`, `init_ser_desc`, `init_ser_status`, `init_ser_page`) VALUES
(10, 'This is for services', 'This is for serivices description', 1, 'services');

-- --------------------------------------------------------

--
-- Table structure for table `key_differentiators_impact_tbl`
--

CREATE TABLE `key_differentiators_impact_tbl` (
  `kd_id` int(11) NOT NULL,
  `kd_title` varchar(100) NOT NULL,
  `kd_des` text NOT NULL,
  `kd_doc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kd_dou` datetime NOT NULL,
  `kd_status` tinyint(1) NOT NULL DEFAULT 1,
  `kd_page` enum('key_differentiators','our_impact','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the key differentiators';

-- --------------------------------------------------------

--
-- Table structure for table `partners_tbl`
--

CREATE TABLE `partners_tbl` (
  `par_id` int(11) NOT NULL,
  `par_img_path` varchar(100) NOT NULL,
  `par_img_thumb` varchar(200) DEFAULT NULL,
  `par_desc` varchar(200) DEFAULT NULL,
  `par_url` varchar(100) NOT NULL,
  `par_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `par_dou` datetime NOT NULL,
  `par_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the partners';

--
-- Dumping data for table `partners_tbl`
--

INSERT INTO `partners_tbl` (`par_id`, `par_img_path`, `par_img_thumb`, `par_desc`, `par_url`, `par_doc`, `par_dou`, `par_status`) VALUES
(7, 'uploads/images/partners/1.jpg', 'uploads/images/partners/1_thumb.jpg', 'NDC', '', '2022-03-19 11:48:03', '0000-00-00 00:00:00', 1),
(8, 'uploads/images/partners/2.jpg', 'uploads/images/partners/2_thumb.jpg', 'Ites', '', '2022-03-19 11:48:27', '0000-00-00 00:00:00', 1),
(9, 'uploads/images/partners/3.jpg', 'uploads/images/partners/3_thumb.jpg', 'National Urban Livelihood Mission', '', '2022-03-19 11:51:35', '0000-00-00 00:00:00', 1),
(10, 'uploads/images/partners/4.jpg', 'uploads/images/partners/4_thumb.jpg', 'RASCI', '', '2022-03-19 11:51:56', '0000-00-00 00:00:00', 1),
(11, 'uploads/images/partners/5.jpg', 'uploads/images/partners/5_thumb.jpg', 'Home Furnishing', '', '2022-03-19 11:52:26', '0000-00-00 00:00:00', 1),
(12, 'uploads/images/partners/5.png', 'uploads/images/partners/5_thumb.png', 'FICISI', '', '2022-03-19 11:52:45', '0000-00-00 00:00:00', 1),
(13, 'uploads/images/partners/6.jpg', 'uploads/images/partners/6_thumb.jpg', 'I Soft Solution', '', '2022-03-19 11:53:04', '0000-00-00 00:00:00', 1),
(14, 'uploads/images/partners/7.jpg', 'uploads/images/partners/7_thumb.jpg', 'Smart School', '', '2022-03-19 11:53:21', '0000-00-00 00:00:00', 1),
(15, 'uploads/images/partners/7.png', 'uploads/images/partners/7_thumb.png', 'SPEFL-SC', '', '2022-03-19 11:53:44', '0000-00-00 00:00:00', 1),
(16, 'uploads/images/partners/8.jpg', 'uploads/images/partners/8_thumb.jpg', 'Skill Development', '', '2022-03-19 11:54:04', '0000-00-00 00:00:00', 1),
(17, 'uploads/images/partners/9.jpg', 'uploads/images/partners/9_thumb.jpg', 'IBM', '', '2022-03-19 11:54:21', '0000-00-00 00:00:00', 1),
(18, '', '', 'Skill Development Mission', '', '2022-03-19 11:54:59', '2022-03-19 17:34:07', 1),
(19, 'uploads/images/partners/i.jpg', 'uploads/images/partners/i_thumb.jpg', 'Digital Education System', '', '2022-03-19 11:55:21', '0000-00-00 00:00:00', 1),
(20, 'uploads/images/partners/t.jpg', 'uploads/images/partners/t_thumb.jpg', 'PMKVY', '', '2022-03-19 11:55:42', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pillers_tbl`
--

CREATE TABLE `pillers_tbl` (
  `pil_id` int(11) NOT NULL,
  `pil_title` varchar(100) NOT NULL,
  `pil_desc` text NOT NULL,
  `pil_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the pillers';

-- --------------------------------------------------------

--
-- Table structure for table `projects_tbl`
--

CREATE TABLE `projects_tbl` (
  `pr_id` int(11) NOT NULL,
  `pr_caption` varchar(50) NOT NULL,
  `pr_img_path` varchar(100) NOT NULL,
  `pr_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `pr_dou` datetime NOT NULL,
  `pr_status` int(1) NOT NULL DEFAULT 1,
  `pr_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the projects';

--
-- Dumping data for table `projects_tbl`
--

INSERT INTO `projects_tbl` (`pr_id`, `pr_caption`, `pr_img_path`, `pr_doc`, `pr_dou`, `pr_status`, `pr_url`) VALUES
(2, 'Pradhan Mantri Kaushal Vikas Yojana (PMKVY)', 'uploads/images/projects/2022-03-19/t.jpg', '2022-03-01 09:11:33', '2022-03-19 10:52:42', 1, 'https://www.pmkvyofficial.org/'),
(6, 'National Urban Livelihoods Mission', 'uploads/images/projects/2022-03-19/a.jpg', '2022-03-19 05:23:33', '0000-00-00 00:00:00', 1, 'https://nulm.gov.in/'),
(7, 'J&K Skill Development Mission Society', 'uploads/images/projects/2022-03-19/edi.jpg', '2022-03-19 05:24:24', '2022-03-19 11:04:08', 1, 'https://www.jkssdm.org/'),
(8, 'DIGITAL EDUCATION SYSTEM, KASHMIR', 'uploads/images/projects/2022-03-19/i.jpg', '2022-03-19 05:25:10', '0000-00-00 00:00:00', 1, 'https://www.facebook.com/smartschoolkashmir/');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `language`, `site_align`, `footer_text`) VALUES
(1, 'Wyathservices', 'Wyathservices', 'wyathservices@gmail.com', '9906323232', 'uploads/site/logo/2022-02-25/S2.jpg', 'uploads/site/logo/2022-02-25/f.png', '0', NULL, '2022©Copy Wyathservices');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `s_id` int(11) NOT NULL,
  `s_title` varchar(500) DEFAULT NULL,
  `s_img_path` varchar(200) NOT NULL,
  `s_img_thumb` varchar(200) DEFAULT NULL,
  `s_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `s_dou` datetime DEFAULT NULL,
  `s_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the slider';

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`s_id`, `s_title`, `s_img_path`, `s_img_thumb`, `s_doc`, `s_dou`, `s_status`) VALUES
(11, 'Slider 1', 'uploads/images/slider/1.jpg', 'uploads/images/slider/1_thumb.jpg', '2022-03-19 12:54:49', NULL, 1),
(12, 'Slider 2', 'uploads/images/slider/2.jpg', 'uploads/images/slider/2_thumb.jpg', '2022-03-19 12:54:58', NULL, 1),
(13, 'Slider 3', 'uploads/images/slider/3.jpg', 'uploads/images/slider/3_thumb.jpg', '2022-03-19 12:55:56', NULL, 1),
(14, 'Slider 4', 'uploads/images/slider/4.jpg', 'uploads/images/slider/4_thumb.jpg', '2022-03-19 12:56:04', NULL, 1),
(15, 'Slider 5', 'uploads/images/slider/a.jpg', 'uploads/images/slider/a_thumb.jpg', '2022-03-19 12:56:11', NULL, 1),
(16, 'Slider 6', 'uploads/images/slider/b.jpg', 'uploads/images/slider/b_thumb.jpg', '2022-03-19 12:56:20', NULL, 1),
(17, 'Slider 7', 'uploads/images/slider/b1.jpg', 'uploads/images/slider/b1_thumb.jpg', '2022-03-19 12:56:31', NULL, 1),
(18, 'Slider 8', 'uploads/images/slider/b2.jpg', 'uploads/images/slider/b2_thumb.jpg', '2022-03-19 12:56:41', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_tbl`
--

CREATE TABLE `user_role_tbl` (
  `ur_id` int(11) NOT NULL,
  `ur_name` varchar(50) NOT NULL,
  `ur_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_tbl`
--

INSERT INTO `user_role_tbl` (`ur_id`, `ur_name`, `ur_status`) VALUES
(1, 'Admin', 1),
(2, 'Admin 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(11) NOT NULL,
  `u_user_role` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_username` varchar(11) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `u_mobile` varchar(15) DEFAULT NULL,
  `u_adress` varchar(11) NOT NULL,
  `u_picture` varchar(11) NOT NULL,
  `u_doc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_dou` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `u_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `u_user_role`, `u_name`, `u_username`, `u_email`, `u_password`, `u_mobile`, `u_adress`, `u_picture`, `u_doc`, `u_dou`, `u_status`) VALUES
(1, 1, 'Admin', 'admin', 'admin@wyath.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '', '', '2022-02-27 20:09:17', '2022-02-27 20:09:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `what_we_do_tbl`
--

CREATE TABLE `what_we_do_tbl` (
  `w_id` int(11) NOT NULL,
  `w_menu_title` varchar(100) NOT NULL,
  `w_menu_desc` text NOT NULL,
  `w_img_path` varchar(100) NOT NULL,
  `w_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `w_dou` datetime DEFAULT NULL,
  `w_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the (what we do)';

--
-- Dumping data for table `what_we_do_tbl`
--

INSERT INTO `what_we_do_tbl` (`w_id`, `w_menu_title`, `w_menu_desc`, `w_img_path`, `w_doc`, `w_dou`, `w_status`) VALUES
(1, 'SKILL DEVELOPMENT', 'Skill Development and Entrepreneurship efforts across the country have been highly fragmented so far. Though India enjoys the demographic advantage of having the youngest workforce with average age of 29 years in comparison with the advanced economies, as opposed to developed countries, where the percentage of skilled workforce is between 60% and 90% of the total workforce, India records a low 5% of workforce (20-24 years) with formal employability skills.', 'frontsite/assets/base/img/content/stock2/7.jpg', '2022-03-19 13:24:55', NULL, 1),
(2, 'FACULTY DEVELOPMENT', 'The aim of India’s higher education system is attaining sustainable development and achieving higher growth rates which could be enabled through creation, transmission and dissemination of knowledge. Higher education at all levels in the country is witnessing a consistent growth pattern marked by the setting up of new institutions and the improvement of the existing ones. Demand for qualified teachers and faculty members over the next few years would be substantial and will become extremely critical for states to expand the current institutional capacities, not only of infrastructure but also of qualified and trained faculty members.\r\n\r\n', 'frontsite/assets/base/img/content/stock2/04.jpg', '2022-03-19 13:24:55', NULL, 1),
(3, 'ENTREPRENEURSHIP DEVELOPMENT', 'Entrepreneurs play an important role in the economic development of a country. Successful entrepreneurs innovate, bring new products and concepts to the market, improve market efficiency, build wealth, create jobs, and enhance economic growth. Entrepreneurs convert ideas into economic opportunities through innovations which are considered to be major source of competitiveness in an increasingly globalizing world economy.', 'frontsite/assets/base/img/content/stock2/5.jpg', '2022-03-19 13:28:17', NULL, 1),
(4, 'YOUTH EMPOWERMENT', 'By 2020, India’s population is expected to become the world’s youngest; more than 500 million Indian citizens will be under 25 years of age and more than two thirds of the population will be eligible to work. This means that a growing number of India’s youth need the right educational infrastructure to develop skills and adequate opportunities to get employed or become entrepreneurs.', 'frontsite/assets/base/img/content/stock2/06.jpg', '2022-03-19 13:28:17', NULL, 1),
(5, 'RESEARCH & PUBLICATIONS', 'India is rapidly enlarging its research presence globally. Its output expanded nearly three times the world average over the last decade, some 146%, from 21,269 Web of Science papers in 2003 to 45,639 in 2012. It is an impressive growth and gained for the nation an increase in world share of 1.1%, from 2.5% to 3.6%.For 2008 to 2012, India captured its greatest world share of papers in engineering and technology at 4.8%.', 'frontsite/assets/base/img/content/stock2/6.jpg', '2022-03-19 13:28:17', NULL, 1),
(6, 'DIGITAL EMPOWERMENT', 'In a country with more than 6,50,000 villages, where more than half of its population live in rural areas and villages. Most are remote and too isolated to benefit from the country’s impressive economic progress. Yet there’s a growing desire among people in rural India to be part of the modern Digital India. But the last-mile delivery has always been a challenge for India due to low technology literacy among the rural citizens.', 'frontsite/assets/base/img/content/stock2/1.jpg', '2022-03-19 13:28:17', NULL, 1),
(7, 'MANUFACTURING & PROCESSING', 'With the advent of globalization and opening up of Indian economy to outside world, competition among industries has become stiff. To solve their engineering problems they look up now to engineering institutions. Similarly, there is an urgent need to prepare engineering students for jobs in multinational companies, by exposing them to newer technologies and engineering methodologies.\r\n\r\n', 'frontsite/assets/base/img/content/stock2/2.jpg', '2022-03-19 13:28:17', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tbl`
--
ALTER TABLE `about_tbl`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `banner_tbl`
--
ALTER TABLE `banner_tbl`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `contact_det_tbl`
--
ALTER TABLE `contact_det_tbl`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `contact_us_tbl`
--
ALTER TABLE `contact_us_tbl`
  ADD PRIMARY KEY (`con_us_id`);

--
-- Indexes for table `event_gallery_tbl`
--
ALTER TABLE `event_gallery_tbl`
  ADD PRIMARY KEY (`ev_gl_id`);

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `featured_initiatives_tbl`
--
ALTER TABLE `featured_initiatives_tbl`
  ADD PRIMARY KEY (`fi_id`);

--
-- Indexes for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `init_services_tbl`
--
ALTER TABLE `init_services_tbl`
  ADD PRIMARY KEY (`init_ser_id`);

--
-- Indexes for table `key_differentiators_impact_tbl`
--
ALTER TABLE `key_differentiators_impact_tbl`
  ADD PRIMARY KEY (`kd_id`);

--
-- Indexes for table `partners_tbl`
--
ALTER TABLE `partners_tbl`
  ADD PRIMARY KEY (`par_id`);

--
-- Indexes for table `pillers_tbl`
--
ALTER TABLE `pillers_tbl`
  ADD PRIMARY KEY (`pil_id`);

--
-- Indexes for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  ADD PRIMARY KEY (`ur_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `u_user_role` (`u_user_role`);

--
-- Indexes for table `what_we_do_tbl`
--
ALTER TABLE `what_we_do_tbl`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_tbl`
--
ALTER TABLE `about_tbl`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner_tbl`
--
ALTER TABLE `banner_tbl`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `contact_det_tbl`
--
ALTER TABLE `contact_det_tbl`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_tbl`
--
ALTER TABLE `contact_us_tbl`
  MODIFY `con_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_gallery_tbl`
--
ALTER TABLE `event_gallery_tbl`
  MODIFY `ev_gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `featured_initiatives_tbl`
--
ALTER TABLE `featured_initiatives_tbl`
  MODIFY `fi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `init_services_tbl`
--
ALTER TABLE `init_services_tbl`
  MODIFY `init_ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `key_differentiators_impact_tbl`
--
ALTER TABLE `key_differentiators_impact_tbl`
  MODIFY `kd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners_tbl`
--
ALTER TABLE `partners_tbl`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pillers_tbl`
--
ALTER TABLE `pillers_tbl`
  MODIFY `pil_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `what_we_do_tbl`
--
ALTER TABLE `what_we_do_tbl`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`u_user_role`) REFERENCES `user_role_tbl` (`ur_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
