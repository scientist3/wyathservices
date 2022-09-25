-- select c_id ,c_full_name  ,c_training_status ,c_currently_enrolled  from candidate_tbl ct where c_id  in(8,13)
-- 
-- 
-- select *from batch_student_mapping_tbl bsmt
-- 
-- 
-- select ct.cer_certified , bsmt.* FROM batch_student_mapping_tbl bsmt
-- left join certification_tbl ct on ct.cer_id = bsmt .bsm_cer_id 
-- WHERE (bsm_cer_id IN (5)) AND (bsm_pd_id IN (6)) and ct.cer_certified =0



select
	bsmt.bsm_b_id as BatchId, 
	bt.b_bch_id as BCHID,
	case
		when bt.b_training_completed = 1 then "Completed"
		when bt.b_training_completed = 2 then "Incomplete"
		else bt.b_training_completed
	end as BatchTrainingCompledted,
	case
		when bt.b_assessment_completed = 1 then "Completed"
		when bt.b_assessment_completed = 0 then "Incomplete"
		else bt.b_assessment_completed
	end as BatchAssessmentCompleted,
	ct.c_full_name as CandName,
	case
		when ct.c_training_status = 2 then "Dropout"
		when ct.c_training_status = 1 then "Completed"
		else ct.c_training_status
	end as CandTraining, 
	case
		when bsmt.bsm_assessment_status = 1 then "Pass"
		when bsmt.bsm_assessment_status = 2 then "Fail"
		else bsmt.bsm_assessment_status
	end as CandAssessmentStatus,
	bsmt.bsm_cer_id as CertificateID,
	case
		when certt.cer_certified = 1 then "Certified"
		when certt.cer_certified = 0 then "Not Certified"
		else certt.cer_certified
	end as Certified,
	bsmt.bsm_pd_id as PlacementID,
	case
		when pdt.pd_placement_status = 0 then "Yes"
		when pdt.pd_placement_status = 1 then "No"
		else pdt.pd_placement_status
	end as PlacementStatus,
	case
		when pdt.pd_employment_type = 1 then "Upskilled"
		when pdt.pd_employment_type = 2 then "Opted for Higher Studies"
		when pdt.pd_employment_type = 3 then "Salaried or Waged"
		when pdt.pd_employment_type = 4 then "Self Employed"
		when pdt.pd_employment_type = 5 then "Apprenticeship"
		else pdt.pd_employment_type
	end as EmployementType
	-- 	pdt.pd_employment_type 
	-- 	bsmt.bsm_ptd_id as PlaceTrackingID
	-- 	bsmt.*,
	-- 	bt.b_as_id as BatchAssessmentId
from
	batch_student_mapping_tbl bsmt
join batch_tbl bt on
	bt.b_id = bsmt.bsm_b_id
join candidate_tbl ct on
	ct.c_id = bsmt.bsm_c_id
left join certification_tbl certt on
	certt.cer_id = bsmt.bsm_cer_id
left join placement_detail_tbl pdt on
	pdt.pd_id = bsmt.bsm_pd_id 
where
	bsmt.bsm_b_id = 8
