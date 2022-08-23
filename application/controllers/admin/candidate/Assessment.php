<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assessment extends CI_Controller
{
  private $data;
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'admin/candidate/CommonModel',
      'admin/candidate/BatchModel',
      'admin/candidate/AssessmentModel',
      'admin/candidate/BatchMappingModel'
    ));
  }

  public function index($b_id = null)
  {
    //  Prepare Data 
    $this->prepareData($b_id);

    // TODO: Buggy Find alternate solution
    // Check if Assessment form is submitted
    if (isset($_POST['save_assessment_details_form']) && $_POST['save_assessment_details_form'] == 'add_update_assessment') {
      $this->createOrUpdateAssessmentDetails($b_id);
    }
    // Check if Student Assessment form is submitted.
    if (isset($_POST['update_student_assessment_details_form']) && $_POST['update_student_assessment_details_form'] == 'update_student_assessment_details') {
      $this->UpdateStudentAssessmentDetails($b_id);
    }
    $this->data['title'] = ('Assessment');
    $this->data['input_height'] = 'form-control-sm';

    $this->data['content'] = $this->load->view('admin/candidate/assessment/index_view', $this->data, true);
    $this->load->view('admin/layout/wrapper', $this->data);
  }

  private function prepareData($b_id)
  {
    // TODO: Check Assessment Speling
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

    // If assessment completed
    if (/*$this->data['batch']['b_assessment_completed'] == 1 && */!empty($this->data['batch']['b_as_id'])) {
      // Fetch Assessment details
      $this->data['input'] = $this->AssessmentModel->readById($this->data['batch']['b_as_id']);
    } else {
      // Prepare Input Data
      $this->data['input'] = (object) array(
        'as_id'               => $this->input->post('as_id'),
        'as_as_id'            => $this->input->post('as_as_id'),
        'as_mode'             => $this->input->post('as_mode'),
        'as_agency_id'        => $this->input->post('as_agency_id'),
        'as_agency_name'      => $this->input->post('as_agency_name'),
        'as_assessor_id'      => $this->input->post('as_assessor_id'),
        'as_assessor'         => $this->input->post('as_assessor'),
        'as_from_date'        => $this->input->post('as_from_date'),
        'as_to_date'          => $this->input->post('as_to_date')
      );
    }
    // Convert Input array back to Object 
    $this->data['batch'] = (object)  $this->data['batch'];

    // Check if assessment is completed to all students or not (Optional)
    $this->data['assessment_status'] =  $this->BatchMappingModel->checkIsAssessmentCompletedByBatchId($b_id);

    // Read Student assessment details
    $this->data['student_assessment_details'] = $this->BatchMappingModel->readStudentsByBatchId($b_id);

    // Fetch Assessment status list
    $this->data['assessment_status_list'] = $this->CommonModel->getAssessmentStatusList();
  }

  private function createOrUpdateAssessmentDetails($b_id)
  {
    // Define validation For assessment details
    {
      $this->form_validation->set_rules('as_as_id', ('as_as_id'), 'required');
      $this->form_validation->set_rules('as_mode', ('as_mode'), 'required');
      $this->form_validation->set_rules('as_agency_id', ('as_agency_id'), 'required');
      $this->form_validation->set_rules('as_agency_name', ('as_agency_name'), 'required');
      $this->form_validation->set_rules('as_assessor_id', ('as_assessor_id'), 'required');
      $this->form_validation->set_rules('as_assessor', ('as_assessor'), 'required');
      $this->form_validation->set_rules('as_from_date', ('as_from_date'), 'required');
      $this->form_validation->set_rules('as_to_date', ('as_to_date'), 'required');
      $this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
    }

    // Prepare Input Data
    $this->data['input'] = (object) $postAssessmentInp = array(
      'as_id'               => $this->input->post('as_id'),
      'as_as_id'            => $this->input->post('as_as_id'),
      'as_mode'             => $this->input->post('as_mode'),
      'as_agency_id'        => $this->input->post('as_agency_id'),
      'as_agency_name'      => $this->input->post('as_agency_name'),
      'as_assessor_id'      => $this->input->post('as_assessor_id'),
      'as_assessor'         => $this->input->post('as_assessor'),
      'as_from_date'        => $this->input->post('as_from_date'),
      'as_to_date'          => $this->input->post('as_to_date')
    );
    if ($this->form_validation->run() === true) {
      if ($this->AssessmentModel->create($postAssessmentInp)) {
        $this->session->set_flashdata('class_name', ('alert-success'));
        if (empty($this->input->post('as_id'))) {
          $as_id = $this->db->insert_id();
          $batchPostData = [
            'b_id' => $b_id,
            'b_as_id' =>  $as_id
          ];
          $this->BatchModel->create($batchPostData);
          $this->session->set_flashdata('message', ('Assessment details added sucessfully.'));
          redirect('admin/candidate/assessment/index/' . $b_id);
        } else {
          $this->session->set_flashdata('message', ('Assessment details updated sucessfully.'));
          redirect('admin/candidate/assessment/index/' . $b_id);
        }
      } else {
        $this->session->set_flashdata('message', ('Please try again.'));
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/candidate/assessment/index/' . $b_id);
      }
    }
  }

  private function UpdateStudentAssessmentDetails()
  {
    // Define validation For Assessment Student Details

    $b_id                       = $this->input->post('b_id');
    $bsm_assessment_status      = $this->input->post('bsm_assessment_status');
    $bsm_assessment_percentage  = $this->input->post('bsm_assessment_percentage');

    $data = [];

    if (valArr($bsm_assessment_status) /*&& valArr($bsm_assessment_percentage)*/) {
      foreach ($bsm_assessment_status as $bsm_id =>  $bsm_status) {
        $data[] = [
          'bsm_id' => $bsm_id,
          'bsm_assessment_status' => empty($bsm_status) ? null : $bsm_status,
          'bsm_assessment_percentage' => empty($bsm_status) ? null : ($bsm_status == 1 ? (isset($bsm_assessment_percentage[$bsm_id]) ? $bsm_assessment_percentage[$bsm_id] : null) : null),
        ];
      }
    }

    if ($this->BatchMappingModel->update_batch($data)) {
      setFlash('Student assessment details has been updated successfully.', ['class' => 'alert-success']);
      $assessment_status =  (object)$this->BatchMappingModel->checkIsAssessmentCompletedByBatchId($b_id);
      // Check if 
      if ($assessment_status->status == 1) {
        $batchPostData = [
          'b_id' => $b_id,
          'b_assessment_completed' =>  "1"
        ];
        $this->BatchModel->create($batchPostData);
      } else {
        $batchPostData = [
          'b_id' => $b_id,
          'b_assessment_completed' =>  "0"
        ];
        $this->BatchModel->create($batchPostData);
      }
      redirect('admin/candidate/assessment/index/' . $b_id);
    } else {
      setFlash('Please try again.', ['class' => 'alert-danger']);
      redirect('admin/candidate/assessment/index/' . $b_id);
    }

    redirect('admin/candidate/assessment/index/' . $b_id);
  }
}
