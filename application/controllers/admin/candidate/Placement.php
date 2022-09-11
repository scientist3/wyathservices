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
			'admin/candidate/PlacementModel'
		));
	}

	public function index($b_id = null)
	{
		$this->data['title'] = ('Placement');
		$this->data['input_height'] = 'form-control-sm';
		//  Prepare Data 
		$this->prepareData($b_id);

		// Check if Student placement form is submitted.
		// TODO: will not be executed in this case
		// if (isset($_POST['update_student_assessment_details_form']) && $_POST['update_student_assessment_details_form'] == 'update_student_assessment_details') {
		// 	dd($_POST);
		// 	$this->UpdateStudentPlacementDetails($b_id);
		// }

		$this->data['content'] = $this->load->view('admin/candidate/placement/index_view', $this->data, true);
		$this->load->view('admin/layout/wrapper', $this->data);
	}

	public function create($b_id = null, $pd_id = null)
	{
		$this->data['title'] = ('Add Placement Details');
		$this->data['input_height'] = 'form-control-sm';

		$this->prepareData($b_id);
		// prepare Input Data
		$this->prepareInputData();
		dd($this->data, 1);
		/*-----------CHECK ID -----------*/
		if (empty($pd_id)) {
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->PlacementModel->create((array) $this->data['input'])) {
					#set success message
					setFlash('Saved Successfully', ['class' => 'alert-success']);
					// redirect('admin/banner/create');
				} else {
					#set exception message
					setFlash('Please Try Again', ['class' => 'alert-danger']);
					// redirect('admin/banner/create');
				}
			} else {
				#------------- Default Form Section Display ---------#
				$this->data['title'] = ('Add Placement Details');
				$this->data['input_height'] = 'form-control-sm';

				$this->data['content'] = $this->load->view('admin/candidate/placement/form_view1', $this->data, true);
				$this->load->view('admin/layout/wrapper', $this->data);
			}
		} else {
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->BannerModel->update((array) $this->data['input'])) {
					#set success message
					$this->session->set_flashdata('message', ('Updated Successfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
				} else {
					#set exception message
					$this->session->set_flashdata('message', ('Please Try Again'));
					$this->session->set_flashdata('class_name', ('alert-danger'));
				}
				// redirect('admin/banner/edit/' . $postDataInp['b_id']);
			} else {
				#set exception message
				$this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
				$this->session->set_flashdata('class_name', ('alert-danger'));
				// redirect('adzzmin/banner/edit/' . $postDataInp['b_id']);
			}
		}
	}

	private function validation()
	{
	}

	private function prepareInputData()
	{
		$this->data['input'] = (object) [
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
			'pd_feesback_collected_employer' => $this->input->post('pd_feesback_collected_employer'),
			'pd_feedback_frequency' => $this->input->post('pd_feedback_frequency'),
			'pd_state' => $this->input->post('pd_state'),
			'pd_district' => $this->input->post('pd_district'),
			'pd_ctc_before' => $this->input->post('pd_ctc_before'),
			'pd_ctc_current' => $this->input->post('pd_ctc_current'),
			'pd_doc' => $this->input->post('pd_doc'),
		];
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
		$this->data['placement_status'] =  $this->BatchMappingModel->checkIsPlacementCompletedByBatchId($b_id);

		// Read Student Placement details
		$this->data['student_placement_details'] = $this->BatchMappingModel->readPassedAndAssessmentAndPlacementCompletedStudentsByBatchId($b_id);

		$this->data['yes_no_list']          = $this->CommonModel->getYesNoList();
		$this->data['employement_type_by_placement_status'] = $this->CommonModel->getEmploymentList();
		// Fetch Traimimg status list
		$this->data['training_status_list'] = $this->CommonModel->getTrainingStatusList();
		// Fetch Assessment status list
		$this->data['assessment_status_list'] = $this->CommonModel->getAssessmentStatusList();
	}

	private function UpdateStudentPlacementDetails()
	{
		// Define validation For Assessment Student Details

		$pd_id                         = $this->input->post('pd_id');
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
