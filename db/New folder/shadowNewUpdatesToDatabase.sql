ALTER TABLE `course_tbl` CHANGE `crs_id` `crs_id` INT(99) NOT NULL AUTO_INCREMENT, CHANGE `course_id` `crs_course_id` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL, CHANGE `course_name` `crs_course_name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `course_type` `crs_course_type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `sector_covered` `crs_sector_covered` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `course_fee` `crs_course_fee` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `fee_paid_by` `crs_fee_paid_by` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL;

ALTER TABLE `training_center_tbl` CHANGE `id` `tc_id` INT(25) NOT NULL AUTO_INCREMENT, CHANGE `tc_id` `tc_tc_id` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;


-- 2022-08-12 16:17:27
ALTER TABLE `training_center_tbl` CHANGE `tc_id` `tc_id` INT(25) NOT NULL AUTO_INCREMENT, CHANGE `training_center_name` `tc_name` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `training_center_address` `tc_address` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `training_center_district` `tc_district` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, CHANGE `training_center_pincode` `tc_pincode` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

