<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Placementtracking extends CI_Controller
{
	private $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'admin/candidate/CommonModel',
			'admin/candidate/BatchModel',
			'admin/candidate/BatchMappingModel',
			'admin/candidate/PlacementTrackingModel',
		));

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
			redirect('login/logout');
	}

	public function index($b_id = null)
	{
		$this->data['title'] = ('Placement Tracking');
		$this->data['input_height'] = 'form-control-sm';
		//  Prepare Data 
		$this->prepareData($b_id);
		// dd($this->data, 1);

		// Check if Student placement form is submitted.
		// TODO: will not be executed in this case
		if (isset($_POST['update_student_placement_tracking_details_form']) && $_POST['update_student_placement_tracking_details_form'] == 'update_student_placement_tracking_details') {
			dd($_POST);
			$this->UpdateStudentPlacementDetails($b_id);
		}

		$this->data['content'] = $this->load->view('admin/candidate/placement_tracking/index_view', $this->data, true);
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

		// Check if Placement is completed to all students or not (Optional)
		//$this->data['placement_status'] 					=  $this->BatchMappingModel->checkIsPlacementCompletedByBatchId($b_id);

		// Read Student Placement details
		$this->data['student_placement_tracking_details'] 	= $this->BatchMappingModel->readStudentsForPlacementTrackingByBatchId($b_id);
		$this->data['yes_no_list']          			= $this->CommonModel->getYesNoNullList();
	}

	private function UpdateStudentPlacementDetails()
	{
		// Define validation For Assessment Student Details

		$b_id                        	= $this->input->post('b_id');
		$arr_bsm_id                   = $this->input->post('bsm_id');
		$arr_ptd_id                   = $this->input->post('ptd_id');

		$arr_ptd_status_1               = $this->input->post('ptd_status_1');
		$arr_ptd_date_1               = $this->input->post('ptd_date_1');

		$arr_ptd_status_2               = $this->input->post('ptd_status_2');
		$arr_ptd_date_2               = $this->input->post('ptd_date_2');

		$arr_ptd_status_3               = $this->input->post('ptd_status_3');
		$arr_ptd_date_3               = $this->input->post('ptd_date_3');

		$postDataPlacementTracking = [];
		$postDataBSM = [];

		if (valArr($arr_ptd_id)) {
			foreach ($arr_ptd_id as $bsm_c_id =>  $ptd_id) {
				$postDataPlacementTracking[$bsm_c_id] = [
					'ptd_id'						=> $ptd_id,

					'ptd_status_1'			=> !empty($arr_ptd_status_1[$bsm_c_id]) ? $arr_ptd_status_1[$bsm_c_id] : 'NULL',
					'ptd_date_1'				=> $arr_ptd_date_1[$bsm_c_id],

					'ptd_status_2'			=> $arr_ptd_status_2[$bsm_c_id],
					'ptd_date_2'				=> $arr_ptd_date_2[$bsm_c_id],

					'ptd_status_3'			=> $arr_ptd_status_3[$bsm_c_id],
					'ptd_date_3'				=> $arr_ptd_date_3[$bsm_c_id],
				];
				$postDataBSM[$bsm_c_id] = [
					'bsm_id' => $arr_bsm_id[$bsm_c_id],
					'bsm_ptd_id' => null
				];
			}
		}

		// dd($postDataPlacementTracking, 0);
		// dd($postDataBSM);
		// Insert One By One and Update
		// $this->db->trans_begin();
		// die();
		foreach ($postDataPlacementTracking as $bsm_c_id => $placementTrackingData) {
			if (empty($placementTrackingData['ptd_id'])) {
				$this->PlacementTrackingModel->create($placementTrackingData);
				$postDataBSM[$bsm_c_id]['bsm_ptd_id'] = $this->db->insert_id();
			} else {
				$this->PlacementTrackingModel->update($placementTrackingData);
				$postDataBSM[$bsm_c_id]['bsm_ptd_id'] = $placementTrackingData['ptd_id'];
			}
		}
		// echo "---------------------------";
		// dd($postDataBSM);

		$this->BatchMappingModel->update_batch($postDataBSM);
		// if ($this->db->trans_status() === FALSE) {
		// $this->db->trans_rollback();
		setFlash('Student placement tracking details has been updated successfully.', ['class' => 'alert-success']);
		// } else {
		// dd($this->db->error());
		// 	// All transaction sucessfull
		// 	$this->db->trans_commit();
		// 	setFlash('Please try again.', ['class' => 'alert-danger']);
		// }

		redirect('admin/candidate/placementtracking/index/' . $b_id);
	}
}
