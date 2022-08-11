
CREATE TABLE `candidate_tbl` (
  `c_id` int(11) NOT NULL,
  `c_salutation` varchar(10) NOT NULL,
  `c_full_name` varchar(30) NOT NULL,
  `c_gender` varchar(13) NOT NULL,
  `c_dob` date NOT NULL,
  `c_mobile` varchar(12) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_marital_status` varchar(10) NOT NULL,
  `c_father_name` varchar(50) NOT NULL,
  `c_mother_name` varchar(50) NOT NULL,
  `c_guardian_name` varchar(50) NOT NULL,
  `c_education` varchar(50) NOT NULL,
  `c_religion` varchar(10) NOT NULL,
  `c_catagory` varchar(10) NOT NULL,
  `c_disablity` varchar(10) NOT NULL,
  `c_type_of_disablity` varchar(10) DEFAULT NULL,
  `c_id_type` varchar(70) NOT NULL,
  `c_type_of_alternate_id` varchar(100) DEFAULT NULL,
  `c_id_no` varchar(100) NOT NULL,
  `c_perm_address` varchar(200) NOT NULL,
  `c_perm_tehsil` varchar(70) NOT NULL,
  `c_perm_district` varchar(50) NOT NULL,
  `c_perm_city` varchar(50) NOT NULL,
  `c_perm_state` varchar(60) NOT NULL,
  `c_perm_pincode` varchar(10) NOT NULL,
  `c_perm_constituency` varchar(60) NOT NULL,
  `c_comm_same_as_perm` varchar(10) DEFAULT NULL,
  `c_comm_address` varchar(200) DEFAULT NULL,
  `c_comm_tehsil` varchar(70) NOT NULL,
  `c_comm_district` varchar(50) NOT NULL,
  `c_comm_city` varchar(50) NOT NULL,
  `c_comm_state` varchar(60) NOT NULL,
  `c_comm_pincode` varchar(10) NOT NULL,
  `c_comm_constituency` varchar(60) NOT NULL,
  `c_pre_traning_status` varchar(10) NOT NULL,
  `c_prev_exp_sector` text NOT NULL,
  `c_prev_exp_no_of_months` int(11) NOT NULL,
  `c_employed` tinyint(1) NOT NULL DEFAULT 0,
  `c_employment_status` int(11) NOT NULL,
  `c_employement_details` text NOT NULL,
  `c_heard_about_us` int(11) NOT NULL,
  `c_currently_enrolled` tinyint(1) NOT NULL DEFAULT 0,
  `c_training_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `candidate_tbl` ADD `c_cand_id` VARCHAR(100) NOT NULL AFTER `c_id`;
