<?php defined('BASEPATH') or exit('No direct script access allowed');
class BatchMappingModel extends CI_Model
{

	private $table = "batch_student_mapping_tbl";

	public function create($data = [])
	{
		return $this->db->insert($this->table, $data);
	}

	public function create_batch($data = [])
	{
		return $this->db->insert_batch($this->table, $data);
	}

	public function readStudentsByBatchId($b_id)
	{
		return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    ")
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->get()
			->result();
	}

	public function readCompleteStudentDetailsByBatchId($b_id)
	{

		// Get the predefined lists from the CommonModel
		$salutations = $this->CommonModel->getSalutation();
		$pretrainingStatus = $this->CommonModel->getTrainingStatus();
		$employmentStatus = $this->CommonModel->getEmploymentStatusList();
		$education = $this->CommonModel->getEducation();
		$categories = $this->CommonModel->getCategory();
		$gender = $this->CommonModel->getGender();
		$maritalStatus = $this->CommonModel->getMaritalStatus();
		$idTypes = $this->CommonModel->getIdType();
		$typeOfAlternateId = $this->CommonModel->getTypeOfAlternateId();
		$religions = $this->CommonModel->getReligion();
		$disabilityTypes = $this->CommonModel->getDisability();
		$trainingStatuses = $this->CommonModel->getTrainingStatusList();
		$feedbackFrequencies = $this->CommonModel->getFrequencyFeedback();
		$yesNo = $this->CommonModel->getYesNoList();

		// Start the query builder
		$this->db->select("candidate_tbl.*, ct.cer_agency,
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
            pdt.pd_feedback_frequency,
						ptdt.*,
						bt.b_bch_id")
			->from('candidate_tbl')
			->join($this->table, $this->table . '.bsm_c_id  = candidate_tbl.c_id', 'left')
			->join('certification_tbl ct', 'ct.cer_id = ' . $this->table . '.bsm_cer_id', 'left')
			->join('placement_detail_tbl pdt', 'pdt.pd_id = ' . $this->table . '.bsm_pd_id', 'left')
			->join('placement_tracking_detail_tbl ptdt', 'ptdt.ptd_id = ' . $this->table . '.bsm_ptd_id', 'left')
			->join('batch_tbl bt', 'bt.b_id = ' . $this->table . '.bsm_b_id', 'left');

		// Apply the WHERE condition only if $b_id is provided and not empty
		if (!empty($b_id)) {
			$this->db->where('bsm_b_id', $b_id);
		}

		// Execute the query and get the results
		$students = $this->db->get()->result();

		// Replace the IDs with corresponding names
		foreach ($students as $student) {

			$student->c_salutation = isset($salutations[$student->c_salutation]) ? $salutations[$student->c_salutation] : "NA";
			$student->c_disablity = isset($yesNo[$student->c_disablity]) ? $yesNo[$student->c_disablity] : "NA";
			$student->c_type_of_disablity = isset($disabilityTypes[$student->c_type_of_disablity]) ? $disabilityTypes[$student->c_type_of_disablity] : "NA";
			$student->c_employment_status = isset($employmentStatus[$student->c_employment_status]) ? $employmentStatus[$student->c_employment_status] : "NA";

			// Replace Education
			$student->c_education = isset($education[$student->c_education]) ? $education[$student->c_education] : "NA";

			// Replace Category
			$student->c_catagory = isset($categories[$student->c_catagory]) ? $categories[$student->c_catagory] : "NA";

			// Replace Gender
			$student->c_gender = isset($gender[$student->c_gender]) ? $gender[$student->c_gender] : "NA";

			// Replace Marital Status
			$student->c_marital_status = isset($maritalStatus[$student->c_marital_status]) ? $maritalStatus[$student->c_marital_status] : "NA";

			// Replace ID Type
			$student->c_id_type = isset($idTypes[$student->c_id_type]) ? $idTypes[$student->c_id_type] : "NA";

			// Replace Alternate ID Type
			$student->c_type_of_alternate_id = isset($typeOfAlternateId[$student->c_type_of_alternate_id]) ? $typeOfAlternateId[$student->c_type_of_alternate_id] : "NA";

			// Replace Religion
			$student->c_religion = isset($religions[$student->c_religion]) ? $religions[$student->c_religion] : "NA";

			// Replace Pre Training Status
			$student->c_pre_traning_status = isset($pretrainingStatus[$student->c_pre_traning_status]) ? $pretrainingStatus[$student->c_pre_traning_status] : "NA";

			// Replace Training Status
			$student->c_training_status = isset($trainingStatuses[$student->c_training_status]) ? $trainingStatuses[$student->c_training_status] : "NA";

			// Replace Feedback Frequency
			$student->pd_feedback_frequency = isset($feedbackFrequencies[$student->pd_feedback_frequency]) ? $feedbackFrequencies[$student->pd_feedback_frequency] : "NA";

			$student->c_full_name = $student->c_salutation . ' ' . $student->c_full_name;

			$student->pd_employment_type = isset($employmentStatus[$student->pd_employment_type]) ? $employmentStatus[$student->pd_employment_type] : "NA";

			$student->cer_certified = isset($yesNo[$student->cer_certified]) ? $yesNo[$student->cer_certified] : "NA";

			$student->pd_placement_status = isset($yesNo[$student->pd_placement_status]) ? $yesNo[$student->pd_placement_status] : "NA";


			$student->ptd_status_1 = isset($yesNo[$student->ptd_status_1]) ? $yesNo[$student->ptd_status_1] : "NA";
			$student->ptd_status_2 = isset($yesNo[$student->ptd_status_2]) ? $yesNo[$student->ptd_status_2] : "NA";
			$student->ptd_status_3 = isset($yesNo[$student->ptd_status_3]) ? $yesNo[$student->ptd_status_3] : "NA";
		}

		return $students;
	}

	public function readPassedStudentsByBatchId($b_id)
	{
		return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.*,
    ")
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
			->get()
			->result();
	}

	public function readPassedAndAssessmentCompletedStudentsByBatchId($b_id)
	{
		return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.*,
    ")
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->where('bsm_assessment_status', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
			->get()
			->result();
	}

	public function readPassedAndAssessmentAndPlacementCompletedStudentsByBatchId($b_id)
	{
		return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.cer_certified,
    placement_detail_tbl.*,
    ")
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->where('bsm_assessment_status', 1)
			->where('cer_certified', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
			->join('placement_detail_tbl', 'placement_detail_tbl.pd_id = ' . $this->table . '.	bsm_pd_id', "left")
			->get()
			->result();
	}

	public function readStudentsForPlacementTrackingByBatchId($intBatchId)
	{
		return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name,
    candidate_tbl.c_training_status,
    certification_tbl.cer_certified,
    placement_detail_tbl.pd_placement_status,
    placement_tracking_detail_tbl.*
    ")
			->from($this->table)
			->where('bsm_b_id', $intBatchId)
			->where('c_training_status', 1)
			->where('bsm_assessment_status', 1)
			->where('cer_certified', 1)
			->where('pd_placement_status', 1)
			->where_in('pd_employment_type', [1, 2, 3])
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
			->join('placement_detail_tbl', 'placement_detail_tbl.pd_id = ' . $this->table . '.	bsm_pd_id', "left")
			->join('placement_tracking_detail_tbl', 'placement_tracking_detail_tbl.ptd_id = ' . $this->table . '.	bsm_ptd_id', "left")
			->get()
			->result();
	}

	public function update_batch($data)
	{
		return $this->db->update_batch($this->table, $data, 'bsm_id');
	}

	public function update($data)
	{
		return $this->db->where('bsm_id', $data['bsm_id'])->update($this->table, $data);
	}

	public function delete_batch($bsm_ids = [])
	{
		$this->db->where_in('bsm_id', $bsm_ids)
			->delete($this->table);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkIsAssessmentCompletedByBatchId($b_id = null)
	{
		$result = $this->db->select('bsm_assessment_status, bsm_assessment_percentage')
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->get()
			->result();

		$data['status'] = 1;
		$data['message'] = "It looks like assessment is already completed for all student.";
		if (valArr($result)) {
			foreach ($result as $assessement) {
				if (empty($assessement->bsm_assessment_status)) {
					$data['status'] = 0;
					$data['message'] = 'Please complete the assessment of all students.';
					break;
				}
			}
		} else {
			$data['status'] = 0;
			$data['message'] = 'Please complete the assessment of all students.';
		}
		return $data;
	}

	public function checkIsCertificationCompletedByBatchId($b_id = null)
	{
		$result = $this->db->select('bsm_assessment_status, bsm_cer_id')
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->where('bsm_assessment_status', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->get()
			->result();

		$data['status'] = 1;
		$data['message'] = "It looks like certification is already completed for all student.";
		if (valArr($result)) {
			foreach ($result as $assessement) {
				if (empty($assessement->bsm_cer_id) || $assessement->bsm_cer_id == null) {
					$data['status'] = 0;
					$data['message'] = 'Please complete the certification of all students.';
					break;
				}
			}
		} else {
			$data['status'] = 0;
			$data['message'] = 'Please complete the certification of all students.';
		}
		return $data;
	}

	public function checkIsPlacementCompletedByBatchId($b_id = null)
	{
		$result = $this->db->select(
			'c_training_status,
      bsm_assessment_status, 
      bsm_cer_id, 
      cer_certified, 
      bsm_pd_id
      '
		)
			->from($this->table)
			->where('bsm_b_id', $b_id)
			->where('c_training_status', 1)
			->where('bsm_assessment_status', 1)
			->where('cer_certified', 1)
			->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
			->join('certification_tbl', 'certification_tbl.cer_id = ' . $this->table . '.	bsm_cer_id', "left")
			->join('placement_detail_tbl', 'placement_detail_tbl.pd_id = ' . $this->table . '.	bsm_pd_id', "left")
			->get()
			->result();

		$data['status'] = 1;
		$data['message'] = "It looks like placement is already completed for all student.";
		if (valArr($result)) {
			foreach ($result as $assessement) {
				if (empty($assessement->bsm_pd_id) || $assessement->bsm_pd_id == null) {
					$data['status'] = 0;
					$data['message'] = 'Please complete the placement of all students.';
					break;
				}
			}
		} else {
			$data['status'] = 0;
			$data['message'] = 'Please complete the placement of all students.';
		}
		return $data;
	}
}
