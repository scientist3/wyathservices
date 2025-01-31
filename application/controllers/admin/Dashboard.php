<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 * @property CI_DB_query_builder $db
 * @property CommonModel $CommonModel
 * @property BatchModel $BatchModel
 * @property CourseModel $CourseModel
 * @property TrainingCenterModel $TrainingCenterModel
 * @property BatchModel $BatchModel
 * @property BatchMappingModel $BatchMappingModel
 * @property CandidateModel $CandidateModel
 */
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'admin/candidate/CommonModel',
			'admin/candidate/BatchModel',
			'admin/candidate/CourseModel',
			'admin/candidate/TrainingCenterModel',
			'admin/candidate/BatchMappingModel',
			'admin/candidate/CandidateModel'
		));
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
			redirect('login/logout');
		$this->user_id = $this->session->userdata('user_id');
	}
	public function index()
	{
		$this->data['title']    = ('Dashboard');
		// $this->data['subtitle']	= ('Add New Candidate');
		$candidateStats = [
			'total_students'            => $this->CandidateModel->getTotalStudents(),
			'total_enrolled_students'    => $this->CandidateModel->getTotalEnrolledStudents(),
			'total_male_students'        => $this->CandidateModel->getTotalMaleStudents(),
			'total_female_students'      => $this->CandidateModel->getTotalFemaleStudents(),
			'total_trans_students'      => $this->CandidateModel->getTotalTransagenderStudents(),
			'completed_training'        => $this->CandidateModel->getCompletedTrainingCount(),
			'completed_assessment'      => $this->CandidateModel->getCompletedAssessmentCount(),
			'completed_certified'        => $this->CandidateModel->getCompletedCertifiedCount(),
			'placement_completed'        => $this->CandidateModel->getPlacementCompletedCount(),
			'tracking_completed'        => $this->CandidateModel->getPlacementTrackingCompletedCount(),
		];
		$this->data['candidate_stats'] = $candidateStats;
		$this->data['content'] = $this->load->view('admin/dashboard_view', $this->data, true);

		$this->load->view('admin/layout/wrapper', $this->data);
	}
}
