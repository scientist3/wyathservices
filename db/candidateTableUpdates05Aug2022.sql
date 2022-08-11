ALTER TABLE `candidate_tbl` CHANGE `typeofalternateid` `c_type_of_alternate_id` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

-- 
ALTER TABLE `candidate_tbl` CHANGE `c_idno` `c_id_no` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

--changed c_idtype

ALTER TABLE `candidate_tbl` CHANGE `c_idtype` `c_id_type` VARCHAR(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

-- Added new columns
ALTER TABLE `candidate_tbl` ADD `c_prev_exp_sector` TEXT NOT NULL AFTER `c_pre_traning_status`, ADD `c_prev_exp_no_of_months` INT NOT NULL AFTER `c_prev_exp_sector`, ADD `c_employed` TINYINT(1) NOT NULL DEFAULT '0' AFTER `c_prev_exp_no_of_months`, ADD `c_employment_status` INT NOT NULL AFTER `c_employed`, ADD `c_employement_details` TEXT NOT NULL AFTER `c_employment_status`, ADD `c_heard_about_us` INT NOT NULL AFTER `c_employement_details`, ADD `c_currently_enrolled` TINYINT(1) NOT NULL DEFAULT '0' AFTER `c_heard_about_us`, ADD `c_training_status` TINYINT(1) NOT NULL DEFAULT '0' AFTER `c_currently_enrolled`;