<?php defined('BASEPATH') or exit('No direct script access allowed');

class CandidateModel extends CI_Model
{
	private $table = "candidate_tbl";

	// Using
	public function create($data = [])
	{
		if (!empty($data['c_id'])) {
			return $this->db->where('c_id', $data['c_id'])->update($this->table, $data);
		} else {
			return $this->db->insert($this->table, $data);
		}
	}

	public function updateByColumn($data = [])
	{
		return $this->db->where_in('c_id', $data['c_ids'])->update($this->table, $data['set']);
	}

	public function read()
	{
		return $this->db->select("*")
			->from($this->table)
			->get()
			->result();
	}

	public function update_batch($data)
	{
		return $this->db->update_batch($this->table . "", $data, 'c_id');
	}

	public function read_by_id_as_obj($c_id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('c_id', $c_id)
			->get()
			->row();
	}

	public function getAllStudentDetails($student_id)
	{
		return $this->db->select('
            ct2.c_id,
            ct2.c_cand_id,
            ct2.c_salutation,
            ct2.c_full_name,
            ct2.c_gender,
            ct2.c_dob,
            ct2.c_mobile,
            ct2.c_email,
            ct2.c_marital_status,
            ct2.c_father_name,
            ct2.c_mother_name,
            ct2.c_guardian_name,
            ct2.c_education,
            ct2.c_religion,
            ct2.c_catagory,
            ct2.c_disablity,
            ct2.c_type_of_disablity,
            ct2.c_id_type,
            ct2.c_type_of_alternate_id,
            ct2.c_id_no,
            ct2.c_perm_address,
            ct2.c_perm_tehsil,
            ct2.c_perm_district,
            ct2.c_perm_city,
            ct2.c_perm_state,
            ct2.c_perm_pincode,
            ct2.c_perm_constituency,
            ct2.c_comm_same_as_perm,
            ct2.c_comm_address,
            ct2.c_comm_tehsil,
            ct2.c_comm_district,
            ct2.c_comm_city,
            ct2.c_comm_state,
            ct2.c_comm_pincode,
            ct2.c_comm_constituency,
            ct2.c_pre_traning_status,
            ct2.c_prev_exp_sector,
            ct2.c_prev_exp_no_of_months,
            ct2.c_employed,
            ct2.c_employment_status,
            ct2.c_employement_details,
            ct2.c_heard_about_us,
            ct2.c_currently_enrolled,
            ct2.c_training_status,
            ct.cer_agency,
            ct.cer_certified,
            ct.cer_date,
            ct.cer_certificate_issued,
            ct.cer_certificate_no,
            pdt.pd_placement_status,
            pdt.pd_employment_type,
            pdt.pd_date_of_joining,
            pdt.pd_employer_name,
            pdt.pd_state,
            pdt.pd_district,
            pdt.pd_feedback_collected_employer,
            pdt.pd_feedback_frequency
        ')
			->from('batch_student_mapping_tbl bsmt')
			->join('candidate_tbl ct2', 'ct2.c_id = bsmt.bsm_c_id')
			->join('certification_tbl ct', 'ct.cer_id = bsmt.bsm_cer_id', 'left')
			->join('placement_detail_tbl pdt', 'pdt.pd_id = bsmt.bsm_pd_id', 'left')
			->where('bsmt.bsm_c_id', $student_id)
			->get()
			->row();
	}

	public function checkDuplicateStudent($data = [])
	{
		if (!empty($data['c_id'])) {
			$result = $this->db->select("c_id_no")
				->from($this->table)
				->where('c_id_no', $data['c_id_no'])
				->where('c_id !=', $data['c_id'])
				->get();
		} else {
			$result = $this->db->select("c_id_no")
				->from($this->table)
				->where('c_id_no', $data['c_id_no'])
				->get();
		}
		$count_row = $result->num_rows();

		if ($count_row > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function checkDuplicateCandidateId($data = [])
	{
		$result = $this->db->select("c_cand_id")
			->from($this->table)
			->where('c_cand_id', $data['c_cand_id']) // Ensure correct key
			->get();

		$count_row = $result->num_rows();

		if ($count_row > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function delete($student_id = null)
	{
		$this->db->where('c_id', $student_id)
			->delete($this->table);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_count()
	{
		return $this->db->count_all($this->table);
	}

	public function getTotalStudents()
	{
		return $this->db->count_all($this->table);
	}

	public function getTotalEnrolledStudents()
	{
		return $this->db->where('c_currently_enrolled', 1)
			->count_all_results($this->table);
	}

	public function getTotalMaleStudents()
	{
		return $this->db->where('c_gender', 1)
			->count_all_results($this->table);
	}

	public function getTotalFemaleStudents()
	{
		return $this->db->where('c_gender', 2)
			->count_all_results($this->table);
	}

	public function getTotalTransagenderStudents()
	{
		return $this->db->where('c_gender', 3)
			->count_all_results($this->table);
	}

	public function getCompletedTrainingCount()
	{
		return $this->db->where('c_training_status', 1)
			->count_all_results($this->table);
	}

	public function getCompletedAssessmentCount()
	{
		return $this->db->where('bsm_assessment_status', 1)
			->join('batch_student_mapping_tbl', 'bsm_c_id = ' . $this->table . '.c_id')
			->count_all_results($this->table);
	}

	public function getCompletedCertifiedCount()
	{
		// Assuming there's a column for certificate status, e.g., 'c_certificate_status'.
		return $this->db->where('cer_certified', 1)
			->join('batch_student_mapping_tbl', 'bsm_c_id = ' . $this->table . '.c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = batch_student_mapping_tbl.bsm_cer_id')
			->count_all_results($this->table);
	}

	public function getPlacementCompletedCount()
	{
		// Assuming placement status is stored in 'c_employment_status' with a value of 1 indicating placement.
		return $this->db->where('pd_placement_status', 1)
			->join('batch_student_mapping_tbl', 'bsm_c_id = ' . $this->table . '.c_id')
			->join('placement_detail_tbl', 'placement_detail_tbl.pd_id = batch_student_mapping_tbl.bsm_pd_id')
			->count_all_results($this->table);
	}

	public function getPlacementTrackingCompletedCount()
	{
		// Assuming placement status is stored in 'c_employment_status' with a value of 1 indicating placement.
		return $this->db
			->where('ptd_status_1', 1)
			->where('ptd_status_2', 1)
			->where('ptd_status_3', 1)
			->join('batch_student_mapping_tbl', 'bsm_c_id = ' . $this->table . '.c_id')
			->join('placement_tracking_detail_tbl', 'placement_tracking_detail_tbl.ptd_id = batch_student_mapping_tbl.bsm_ptd_id')
			->count_all_results($this->table);
	}

	public function getNotEnrolledStudents()
	{
		return $this->db->select("c_id,c_cand_id,c_full_name,c_father_name,c_mother_name")
			->from($this->table)
			->where('c_currently_enrolled', 0)
			->get()
			->result();
	}

	public function checkIsTrainingCompletedByCandidateIds($arrCandIds = [])
	{
		$result = $this->db->select('c_training_status')
			->from($this->table)
			->where_in('c_id', $arrCandIds)
			->get()
			->result();

		$data['status'] = 1;
		$data['message'] = "It looks like training is already completed for all student.";
		if (valArr($result)) {
			foreach ($result as $student) {
				if (empty($student->c_training_status)) {
					$data['status'] = 0;
					$data['message'] = 'Please select the training details of all students.';
					break;
				}
			}
		} else {
			$data['status'] = 0;
			$data['message'] = 'Please complete the training of all students.';
		}
		return $data;
	}


	public function DemoBulkUpdateExample()
	{
		$data = array(
			array(
				'c_id' => '1',
				'c_currently_enrolled' => '11',
			),
			array(
				'c_id' => '2',
				'c_currently_enrolled' => '22',
			)
		);

		echo $this->db->update_batch('candidate_tbla', $data, 'c_id')->get_compiled_update();
	}
}
