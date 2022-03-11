-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 09:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `ab_tbl` int(11) NOT NULL,
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
(26, 'This is simple title 1', 'uploads/images/banner/2022-02-27/a14.jpg', 0, '2022-02-27 06:34:36', '0000-00-00 00:00:00', 1),
(58, 'This is simple title 1123', 'uploads/images/banner/2022-02-27/a13.jpg', 0, '2022-02-27 17:21:18', '0000-00-00 00:00:00', 1),
(59, 'this is done', 'uploads/images/banner/2022-02-27/b9.jpg', 0, '2022-02-27 17:21:59', '0000-00-00 00:00:00', 1),
(61, 'This is simple title123', 'uploads/images/banner/2022-02-27/b10.jpg', 1, '2022-02-27 17:22:51', '0000-00-00 00:00:00', 1);

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
  `cont_addres` varchar(100) NOT NULL,
  `cont_area` varchar(100) NOT NULL,
  `cont_pincode` int(100) NOT NULL,
  `cont_state` varchar(100) NOT NULL,
  `cont_country` varchar(100) NOT NULL,
  `cont_email` varchar(100) NOT NULL,
  `cont_phone_no` int(13) NOT NULL,
  `cont_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the contact';

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
(1, 'This is title', 'this is description', '2022-02-23 20:01:23', '2022-02-24 01:31:23', 0),
(2, 'This is title 1', 'this is description 1', '2022-02-23 20:02:03', '2022-02-24 01:32:03', 0);

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
  `init_ser_page` enum('initiatives','services','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the initatives';

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
  `par_url` varchar(100) NOT NULL,
  `par_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `par_dou` datetime NOT NULL,
  `par_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the partners';

-- --------------------------------------------------------

--
-- Table structure for table `pillers_tbl`
--

CREATE TABLE `pillers_tbl` (
  `pil_id` int(11) NOT NULL,
  `pil_tiitle` varchar(100) NOT NULL,
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
  `s_doc` timestamp NOT NULL DEFAULT current_timestamp(),
  `s_dou` datetime DEFAULT NULL,
  `s_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the slider';

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
(2, 'Admin 1', 0);

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
  `w_dou` datetime NOT NULL,
  `w_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table contains the data about the (what we do)';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tbl`
--
ALTER TABLE `about_tbl`
  ADD PRIMARY KEY (`ab_tbl`);

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
  MODIFY `ab_tbl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner_tbl`
--
ALTER TABLE `banner_tbl`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `contact_det_tbl`
--
ALTER TABLE `contact_det_tbl`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_initiatives_tbl`
--
ALTER TABLE `featured_initiatives_tbl`
  MODIFY `fi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery_tbl`
--
ALTER TABLE `gallery_tbl`
  MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `init_services_tbl`
--
ALTER TABLE `init_services_tbl`
  MODIFY `init_ser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `key_differentiators_impact_tbl`
--
ALTER TABLE `key_differentiators_impact_tbl`
  MODIFY `kd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners_tbl`
--
ALTER TABLE `partners_tbl`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pillers_tbl`
--
ALTER TABLE `pillers_tbl`
  MODIFY `pil_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `what_we_do_tbl`
--
ALTER TABLE `what_we_do_tbl`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;

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
