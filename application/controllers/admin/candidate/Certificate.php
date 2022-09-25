<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate extends CI_Controller
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
			'admin/candidate/CertificateModel'
		));
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
			redirect('login/logout');
	}

	public function index($b_id = null)
	{
		$this->data['title'] = ('Certificate');
		$this->data['input_height'] = 'form-control-sm';
		//  Prepare Data 
		$this->prepareData($b_id);

		// Check if Student Certificate form is submitted.
		if (isset($_POST['update_student_assessment_details_form']) && $_POST['update_student_assessment_details_form'] == 'update_student_assessment_details') {
			dd($_POST);
			$this->UpdateStudentCertificateDetails($b_id);
		}

		$this->data['content'] = $this->load->view('admin/candidate/certificate/index_view', $this->data, true);
		$this->load->view('admin/layout/wrapper', $this->data);
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

		// Check if Certificate is completed to all students or not (Optional)
		$this->data['certificate_status'] =  $this->BatchMappingModel->checkIsCertificationCompletedByBatchId($b_id);

		// Read Student Certificate details
		$this->data['student_certificate_details'] = $this->BatchMappingModel->readPassedAndAssessmentCompletedStudentsByBatchId($b_id);

		$this->data['yes_no_list']          = $this->CommonModel->getYesNoList();
	}

	private function UpdateStudentCertificateDetails()
	{
		// Define validation For Assessment Student Details

		$b_id                         = $this->input->post('b_id');
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

		redirect('admin/candidate/certificate/index/' . $b_id);
	}
}
