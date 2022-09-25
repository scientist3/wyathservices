<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Placement extends CI_Controller
{
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'admin/candidate/CommonModel',
			'admin/candidate/BatchModel',
			'admin/candidate/AssessmentModel',
			'admin/candidate/BatchMappingModel',
			'admin/candidate/CertificateModel',
			'admin/candidate/PlacementModel',
			'AddressModel'
		));
	}

	public function index($b_id = null)
	{
		$this->data['title'] = ('Placement');
		$this->data['input_height'] = 'form-control-sm';
		//  Prepare Data 
		$this->prepareData($b_id);
		// dd($this->data, 1);

		// Check if Student placement form is submitted.
		// TODO: will not be executed in this case
		// if (isset($_POST['update_student_assessment_details_form']) && $_POST['update_student_assessment_details_form'] == 'update_student_assessment_details') {
		// 	dd($_POST);
		// 	$this->UpdateStudentPlacementDetails($b_id);
		// }

		$this->data['content'] = $this->load->view('admin/candidate/placement/index_view', $this->data, true);
		$this->load->view('admin/layout/wrapper', $this->data);
	}

	public function create($b_id = null, $bsm_id = null, $pd_id = null)
	{
		$this->data['paramData'] = [
			'b_id' => $b_id,
			'bsm_id' => $bsm_id,
			'pd_id' => $pd_id,

		];

		$this->data['title'] = ('Add Placement Details');
		$this->data['input_height'] = 'form-control-sm';

		$this->prepareData($b_id);
		// prepare Input Data
		$this->prepareInputData($pd_id);
		// ---------------------------------------------------------------------------------------------------------------------------------
		// dd($this->data, 1);
		/*-----------CHECK ID -----------*/
		if (empty($pd_id)) {
			/** Validation */ {
				$this->form_validation->set_rules('pd_pd_id', ('Placement ID'),  'required');
			}
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->PlacementModel->create((array) $this->data['placement_detail_tbl'])) {
					$new_pd_id = $this->db->insert_id();
					$dataForBSM = [
						'bsm_id' => $bsm_id,
						'bsm_pd_id' => $new_pd_id,
					];
					$this->BatchMappingModel->update($dataForBSM);
					#set success message
					setFlash('Saved Successfully', ['class' => 'alert-success']);
					// redirect('admin/banner/create');
				} else {
					#set exception message
					setFlash('Please Try Again', ['class' => 'alert-danger']);
					// redirect('admin/banner/create');
				}
				redirect('admin/candidate/placement/create/' . $b_id . '/' . $bsm_id . '/' . $new_pd_id);
			} else {
				#------------- Default Form Section Display ---------#
				$this->data['title'] = ('Add Placement Details');
				$this->data['input_height'] = 'form-control-sm';

				$this->data['content'] = $this->load->view('admin/candidate/placement/form_view1', $this->data, true);
				$this->load->view('admin/layout/wrapper', $this->data);
			}
		} else {
			/** Validation */ {
				$this->form_validation->set_rules('pd_pd_id', ('Placement ID'),  'required');
			}
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->PlacementModel->create((array) $this->data['placement_detail_tbl'])) {
					#set success message
					setFlash('Saved Successfully', ['class' => 'alert-success']);
					// redirect('admin/banner/create');
				} else {
					#set exception message
					setFlash('Please Try Again', ['class' => 'alert-danger']);
				}
				redirect('admin/candidate/placement/create/' . $b_id . '/' . $bsm_id . '/' . $pd_id);
			} else {
				#set exception message
				// $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
				// $this->session->set_flashdata('class_name', ('alert-danger'));
				$this->data['title'] = ('Update Placement Details');
				$this->data['input_height'] = 'form-control-sm';

				$this->data['content'] = $this->load->view('admin/candidate/placement/form_view1', $this->data, true);
				$this->load->view('admin/layout/wrapper', $this->data);
				// redirect('adzzmin/banner/edit/' . $postDataInp['b_id']);
			}
		}
	}

	// private function validation()
	// {
	// }

	private function prepareInputData($pd_id = NULL)
	{
		if ($this->data['paramData']['bsm_id'] == null) {
			setFlash('Invalid batch id.', ['class' => 'alert-danger']);
			redirect('admin/candidate/placement/index/' . $this->data['paramData']['b_id']);
		}
		// dd($this->data['paramData']);
		$this->data['input'] = (object) [
			'bsm_id' => $this->data['paramData']['bsm_id'],
			'pd_id' => $this->input->post('pd_id'),
			'pd_pd_id' => $this->input->post('pd_pd_id'),
			'pd_placement_status' => $this->input->post('pd_placement_status'),
			'pd_employment_type' => $this->input->post('pd_employment_type'),
			'pd_undertaking_self_employed' => $this->input->post('pd_undertaking_self_employed'),
			'pd_proof_of_self_employed_or_opt_higher_studies' => $this->input->post('pd_proof_of_self_employed_or_opt_higher_studies'),
			'pd_type_of_proof' => $this->input->post('pd_type_of_proof'),
			'pd_date_of_joining' => $this->input->post('pd_date_of_joining'),
			'pd_employer_name' => $this->input->post('pd_employer_name'),
			'pd_employer_contact_person_name' => $this->input->post('pd_employer_contact_person_name'),
			'pd_employer_cp_designation' => $this->input->post('pd_employer_cp_designation'),
			'pd_employer_contact_no' => $this->input->post('pd_employer_contact_no'),
			'pd_employer_address' => $this->input->post('pd_employer_address'),
			'pd_feedback_collected_employer' => $this->input->post('pd_feedback_collected_employer'),
			'pd_feedback_frequency' => $this->input->post('pd_feedback_frequency'),
			'pd_state' => $this->input->post('pd_state'),
			'pd_district' => $this->input->post('pd_district'),
			'pd_ctc_before' => $this->input->post('pd_ctc_before'),
			'pd_ctc_current' => $this->input->post('pd_ctc_current'),
			'pd_doc' => $this->input->post('pd_doc'),
		];

		// Prepare data for database
		$this->data['placement_detail_tbl'] = [
			'pd_id' 								=> $this->data['input']->pd_id,
			'pd_pd_id' 							=> $this->data['input']->pd_pd_id,
			'pd_placement_status' 	=> $this->data['input']->pd_placement_status,
			'pd_employment_type' 		=> $this->data['input']->pd_employment_type,
		];

		switch ($this->data['input']->pd_placement_status) {
			case 0: // Placement Status = NO
				/** ======================================= file upload for Self Employed or Higher Studies ===================================== */
				$file_pd_proof_of_self_employed_or_opt_higher_studies = $this->fileupload->doc_upload(
					'uploads/docs/SelfemployedHigherstudies/',
					'pd_proof_of_self_employed_or_opt_higher_studies'
				);
				$this->data['placement_detail_tbl']['pd_proof_of_self_employed_or_opt_higher_studies'] 		= (!empty($file_pd_proof_of_self_employed_or_opt_higher_studies) ? $file_pd_proof_of_self_employed_or_opt_higher_studies : $this->input->post('pd_proof_of_self_employed_or_opt_higher_studies_old'));
				// Update Input data as well 
				$this->data['input']->pd_proof_of_self_employed_or_opt_higher_studies = $this->data['placement_detail_tbl']['pd_proof_of_self_employed_or_opt_higher_studies'];
				/** ======================================= End file upload for Self Employed or Higher Studies ===================================== */
				break;
			case 1: // Placement Status = Yes
				$this->data['placement_detail_tbl']['pd_date_of_joining'] 	= $this->data['input']->pd_date_of_joining;
				$this->data['placement_detail_tbl']['pd_ctc_current'] 			= $this->data['input']->pd_ctc_current;
				// Employment Type Switched
				switch ($this->data['input']->pd_employment_type) {
					case 3: // Waged
						/** ======================================= file upload for Type of proof ===================================== */
						$file_pd_type_of_proof = $this->fileupload->doc_upload(
							'uploads/docs/typeofproof/',
							'pd_type_of_proof'
						);
						$this->data['placement_detail_tbl']['pd_type_of_proof'] 		= (!empty($file_pd_type_of_proof) ? $file_pd_type_of_proof : $this->input->post('pd_type_of_proof_old'));
						// Update Input data as well 
						$this->data['input']->pd_type_of_proof = $this->data['placement_detail_tbl']['pd_type_of_proof'];
						/** ======================================= file upload for Type of proof ===================================== */
						$this->data['placement_detail_tbl']['pd_type_of_proof'] 								= $this->data['input']->pd_type_of_proof;
						$this->data['placement_detail_tbl']['pd_employer_name'] 								= $this->data['input']->pd_employer_name;
						$this->data['placement_detail_tbl']['pd_employer_contact_person_name'] 	= $this->data['input']->pd_employer_contact_person_name;
						$this->data['placement_detail_tbl']['pd_employer_cp_designation'] 			= $this->data['input']->pd_employer_cp_designation;
						$this->data['placement_detail_tbl']['pd_employer_contact_no'] 					= $this->data['input']->pd_employer_contact_no;
						$this->data['placement_detail_tbl']['pd_employer_address'] 							= $this->data['input']->pd_employer_address;
						$this->data['placement_detail_tbl']['pd_feedback_collected_employer'] 	= $this->data['input']->pd_feedback_collected_employer;
						$this->data['placement_detail_tbl']['pd_feedback_frequency']					 	= $this->data['input']->pd_feedback_frequency;
						$this->data['placement_detail_tbl']['pd_state']					 								= $this->data['input']->pd_state;
						$this->data['placement_detail_tbl']['pd_district']										 	= $this->data['input']->pd_district;
						$this->data['placement_detail_tbl']['pd_ctc_before']										= $this->data['input']->pd_ctc_before;

						break;
					case 4: // Self Employed
						/** ======================================= file upload for undertaking ===================================== */
						$file_pd_undertaking_self_employed = $this->fileupload->doc_upload(
							'uploads/docs/undertaking/',
							'pd_undertaking_self_employed'
						);
						$this->data['placement_detail_tbl']['pd_undertaking_self_employed'] 		= (!empty($file_pd_undertaking_self_employed) ? $file_pd_undertaking_self_employed : $this->input->post('pd_undertaking_self_employed_old'));
						// Update Input data as well 
						$this->data['input']->pd_undertaking_self_employed = $this->data['placement_detail_tbl']['pd_undertaking_self_employed'];
						/** ======================================= End file upload for undertaking ===================================== */

						$this->data['placement_detail_tbl']['pd_ctc_before'] 										= $this->data['input']->pd_ctc_before;

						break;
					case 5: // Apprenticeship
						// File Upload for 
						$file_pd_undertaking_self_employed = $this->fileupload->doc_upload(
							'uploads/docs/undertaking/',
							'pd_undertaking_self_employed'
						);

						$this->data['placement_detail_tbl']['pd_undertaking_self_employed'] 		= (!empty($file_pd_undertaking_self_employed) ? $file_pd_undertaking_self_employed : $this->input->post('pd_undertaking_self_employed_old'));

						/** ======================================= file upload for Type of proof ===================================== */
						$file_pd_type_of_proof = $this->fileupload->doc_upload(
							'uploads/docs/typeofproof/',
							'pd_type_of_proof'
						);
						$this->data['placement_detail_tbl']['pd_type_of_proof'] 		= (!empty($file_pd_type_of_proof) ? $file_pd_type_of_proof : $this->input->post('pd_type_of_proof_old'));
						// Update Input data as well 
						$this->data['input']->pd_type_of_proof = $this->data['placement_detail_tbl']['pd_type_of_proof'];
						/** ======================================= file upload for Type of proof ===================================== */

						// Update Input data as well 
						$this->data['input']->pd_undertaking_self_employed = $this->data['placement_detail_tbl']['pd_undertaking_self_employed'];
						$this->data['placement_detail_tbl']['pd_type_of_proof'] 								= $this->data['input']->pd_type_of_proof;
						$this->data['placement_detail_tbl']['pd_employer_name'] 								= $this->data['input']->pd_employer_name;
						$this->data['placement_detail_tbl']['pd_employer_contact_person_name'] 	= $this->data['input']->pd_employer_contact_person_name;
						$this->data['placement_detail_tbl']['pd_employer_cp_designation'] 			= $this->data['input']->pd_employer_cp_designation;
						$this->data['placement_detail_tbl']['pd_employer_contact_no'] 					= $this->data['input']->pd_employer_contact_no;
						$this->data['placement_detail_tbl']['pd_employer_address'] 							= $this->data['input']->pd_employer_address;
						$this->data['placement_detail_tbl']['pd_feedback_collected_employer'] 	= $this->data['input']->pd_feedback_collected_employer;
						$this->data['placement_detail_tbl']['pd_feedback_frequency']					 	= $this->data['input']->pd_feedback_frequency;
						$this->data['placement_detail_tbl']['pd_state']					 								= $this->data['input']->pd_state;
						$this->data['placement_detail_tbl']['pd_district']										 	= $this->data['input']->pd_district;

						break;
				}
				break;
		}

		if (!empty($pd_id) && $pd_id != NULL) {
			$this->data['input'] = $this->PlacementModel->readById($pd_id);
			$this->data['input']->bsm_id = $this->data['paramData']['bsm_id'];
		}

		// dd($this->data['placement_detail_tbl']);
	}

	private function prepareData($b_id)
	{
		if ($b_id == null) {
			setFlash('Invalid batch id.', ['class' => 'alert-danger']);
			redirect('admin/candidate/batch/');
		}

		// Fetch Batch Details
		$this->data['batch'] = (array)$this->BatchModel->readById($b_id);

		// Check If Batch Exists or not
		if (!isset($this->data['batch']['b_id']) || empty($this->data['batch']['b_id'])) {
			setFlash('Batch doesn\'t exist.', ['class' => 'alert-danger']);
			redirect('admin/candidate/batch/');
		}

		// Convert Input array back to Object 
		$this->data['batch'] = (object)  $this->data['batch'];

		// Check if Placement is completed to all students or not (Optional)
		$this->data['placement_status'] 					=  $this->BatchMappingModel->checkIsPlacementCompletedByBatchId($b_id);

		// Read Student Placement details
		$this->data['student_placement_details'] 	= $this->BatchMappingModel->readPassedAndAssessmentAndPlacementCompletedStudentsByBatchId($b_id);

		$this->data['yes_no_list']          			= $this->CommonModel->getYesNoList();
		$this->data['employement_type_by_placement_status'] = $this->CommonModel->getEmploymentList();
		// Fetch Traimimg status list
		$this->data['training_status_list'] 			= $this->CommonModel->getTrainingStatusList();
		// Fetch Assessment status list
		$this->data['assessment_status_list'] 		= $this->CommonModel->getAssessmentStatusList();
		$this->data['frequency_feedback_list'] 		= $this->CommonModel->getFrequencyFeedback();
		// State list
		$this->data['state_list']							 		= $this->AddressModel->read_state_country_as_list(101);
		$pd_district_id 										 			= !empty($this->input->post('pd_state')) ? $this->input->post('pd_state') : 1;
		$this->data['district_list']					= $this->AddressModel->read_city_state_as_list($pd_district_id); //['' => 'Select District'];
	}

	private function UpdateStudentPlacementDetails()
	{
		// Define validation For Assessment Student Details

		$pd_id                        = $this->input->post('pd_id');
		$arr_bsm_id                   = $this->input->post('bsm_id');
		$arr_cer_id                   = $this->input->post('cer_id');
		$arr_cer_cer_id               = $this->input->post('cer_cer_id');
		$arr_cer_agency               = $this->input->post('cer_agency');
		$arr_cer_certified            = $this->input->post('cer_certified');
		$arr_cer_date                 = $this->input->post('cer_date');
		$arr_cer_certificate_issued   = $this->input->post('cer_certificate_issued');
		$arr_cer_certificate_no       = $this->input->post('cer_certificate_no');

		$postDataCertificate = [];
		$postDataBSM = [];

		if (valArr($arr_cer_id)) {
			foreach ($arr_cer_id as $bsm_c_id =>  $cer_id) {
				$postDataCertificate[$bsm_c_id] = [
					'cer_id'									=> $cer_id,
					'cer_cer_id'							=> $arr_cer_cer_id[$bsm_c_id],
					'cer_agency'							=> $arr_cer_agency[$bsm_c_id],
					'cer_certified'						=> $arr_cer_certified[$bsm_c_id],
					'cer_date'								=> $arr_cer_date[$bsm_c_id],
					'cer_certificate_issued'	=> $arr_cer_certificate_issued[$bsm_c_id],
					'cer_certificate_no'			=> $arr_cer_certificate_no[$bsm_c_id],
				];
				$postDataBSM[$bsm_c_id] = [
					'bsm_id' => $arr_bsm_id[$bsm_c_id],
					'bsm_cer_id' => null
				];
			}
		}

		// dd($postDataCertificate);
		// dd($postDataBSM);
		// Insert One By One and Update
		// $this->db->trans_begin();
		// die();
		foreach ($postDataCertificate as $bsm_c_id => $certificateData) {
			if (empty($certificateData['cer_id'])) {
				$this->CertificateModel->create($certificateData);
				$postDataBSM[$bsm_c_id]['bsm_cer_id'] = $this->db->insert_id();
			} else {
				$this->CertificateModel->update($certificateData);
				$postDataBSM[$bsm_c_id]['bsm_cer_id'] = $certificateData['cer_id'];
			}
		}
		// echo "---------------------------";
		// dd($postDataBSM);

		$this->BatchMappingModel->update_batch($postDataBSM);
		// if ($this->db->trans_status() === FALSE) {
		// $this->db->trans_rollback();
		setFlash('Student certificate details has been updated successfully.', ['class' => 'alert-success']);
		// } else {
		// dd($this->db->error());
		// 	// All transaction sucessfull
		// 	$this->db->trans_commit();
		// 	setFlash('Please try again.', ['class' => 'alert-danger']);
		// }

		redirect('admin/candidate/certificate/index/' . $pd_id);
	}
}
