<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Batch extends CI_Controller
{
  private $STUDENTS_PER_BATCH_LIMIT;
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
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }

    $this->STUDENTS_PER_BATCH_LIMIT = 3;
    $this->user_id = $this->session->userdata('user_id');
  }


  function index($edit_id = null)
  {
    $data['title'] = ('Add New Batch');
    $data['subtitle']     = (empty($edit_id)) ? 'Add Batch' : 'Edit Batch';
    $data['input_height'] = 'form-control-sm';

    // Prepare Data
    $data['batchs']               = $this->BatchModel->read();
    $data['yes_no_list']          = $this->CommonModel->getYesNoList();
    $data['course_list']          = $this->CourseModel->read_course_as_list();
    $data['training_center_list'] = $this->TrainingCenterModel->read_trainingcenter_as_list();

    // Validation 
    {
      $this->form_validation->set_rules('b_bch_id', ('Batch ID'), 'required');
      $this->form_validation->set_rules('b_batch_type', ('Batch Type'), 'required');
      $this->form_validation->set_rules('b_start_date', ('Start Date'), 'required');
      $this->form_validation->set_rules('b_end_date', ('End Date'), 'required');
      $this->form_validation->set_rules('b_course_id', ('Course ID'), 'required');
      $this->form_validation->set_rules('b_trainer_name', ('Trainer Name'), 'required');
      $this->form_validation->set_rules('b_tc_id', ('Training Center ID'), 'required');
      $this->form_validation->set_rules('b_training_completed', ('Training Completed'), 'required');
      $this->form_validation->set_rules('b_assessment_completed', ('Assessment Completed'), 'required');
      $this->form_validation->set_rules('b_as_id', ('Assessment ID'), 'required');
      $this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
    }

    // Prepare Input Data
    $data['input'] = (object) $postDataInp = array(
      'b_id'                    => $this->input->post('b_id'),
      'b_bch_id'                => $this->input->post('b_bch_id'),
      'b_batch_type'            => $this->input->post('b_batch_type'),
      'b_start_date'            => $this->input->post('b_start_date'),
      'b_end_date'              => $this->input->post('b_end_date'),
      'b_course_id'             => $this->input->post('b_course_id'),
      'b_trainer_name'          => $this->input->post('b_trainer_name'),
      'b_tc_id'                 => $this->input->post('b_tc_id'),
      'b_training_completed'    => $this->input->post('b_training_completed'),
      'b_assessment_completed'  => $this->input->post('b_assessment_completed'),
      'b_as_id'                 => $this->input->post('b_as_id')
    );

    if (!empty($edit_id)) {
      $data['input'] = $this->BatchModel->readById($edit_id);
    }

    if ($this->form_validation->run() === true) {
      if ($this->BatchModel->create($postDataInp)) {
        $this->session->set_flashdata('class_name', ('alert-success'));
        if (empty($this->input->post('b_id'))) {
          $this->session->set_flashdata('message', ('Batch added sucessfully.'));
          redirect('admin/candidate/batch/');
        } else {
          $this->session->set_flashdata('message', ('Batch updated sucessfully.'));
          redirect('admin/candidate/batch/');
        }
      } else {
        $this->session->set_flashdata('message', ('Please try again.'));
        $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/batch/');
      }
    } else {
      $data['content'] = $this->load->view('admin/candidate/batch/index_view', $data, true);
      $this->load->view('admin/layout/wrapper', $data);
    }
  }

  public function delete($b_id = null)
  {
    if (empty($b_id)) {
      redirect('admin/candidate/batch/');
    }
    if ($this->BatchModel->delete($b_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Batch Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/candidate/batch/index');
  }

  // Other Functions
  public function view($b_id)
  {
    if (empty($b_id)) {
      redirect('admin/candidate/batch/');
    }

    $data['title']              = ('View Batch');
    $data['subtitle']           = 'Add Student To Batch';
    $data['input_height']       = 'form-control-sm';
    $data['STUDENTS_PER_BATCH_LIMIT'] = $this->STUDENTS_PER_BATCH_LIMIT;
    $this->session->set_flashdata('warning', ('Removing students form the batch will delete all record of that student like Assessment, Certificate, Placement and Tracking Details.'));

    // Prepare Batch Details 
    $data['batch']                  = (array)$this->BatchModel->readById($b_id);

    // Check If Batch Exists or not
    if (!isset($data['batch']['b_id']) || empty($data['batch']['b_id'])) {
      redirect('admin/candidate/batch/');
      exit;
    }
    // Convert to object
    $data['batch']                  = (object) $data['batch'];
    $data['enrolled_students']      = $this->BatchMappingModel->readStudentsByBatchId($b_id);
    $data['not_enrolled_students']  = $this->CandidateModel->getNotEnrolledStudents();

    $data['content']      = $this->load->view('admin/candidate/batch/batch_view', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  function batchcompletereqest()
  {
    $data['b_id'] = $this->input->post('b_id');
    $data['b_training_completed'] = '1';

    $this->BatchModel->create($data);
    $url = 'admin/candidate/batch/view/' . $data['b_id'];
    redirect($url);
  }

  public function addStudentsToBatch()
  {
    $b_id =  $this->input->post('b_id');
    $data['students'] = array();

    if (is_array($this->input->post('students'))) {
      foreach ($this->input->post('students') as $c_id) {
        $data['students'][] = [
          'bsm_b_id' => $b_id,
          'bsm_c_id' => $c_id
        ];
      }
    }

    $data['update'] = [
      'c_ids' => array_keys(rekeyArray('bsm_c_id', $data['students'])),
      'set' => ['c_currently_enrolled' => 1]
    ];

    $this->db->trans_begin();

    // Add mapping of students to batch
    $this->BatchMappingModel->create_batch($data['students']);
    // Update student enrolled status to true
    $this->CandidateModel->updateByColumn($data['update']);

    // All or some transaction failed
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('class_name', ('alert-danger'));
      $this->session->set_flashdata('message', ('Student(s) failed to add the batch.'));
      redirect('admin/candidate/batch/view/' . $b_id);
    } else {
      // All transaction sucessfull
      $this->db->trans_commit();
      $this->session->set_flashdata('class_name', ('alert-success'));
      $this->session->set_flashdata('message', ('Student(s) added sucessfully to the batch.'));
      redirect('admin/candidate/batch/view/' . $b_id);
    }
  }

  public function removeStudentsFromBatch()
  {
    $data['bsm_ids'] = $this->input->post("bsm_ids");
    $b_id = $this->input->post('b_id');

    $data['update'] = [
      'c_ids' => $this->input->post("bsm_c_ids"),
      'set' => ['c_currently_enrolled' => 0]
    ];

    // Transaction Start
    $this->db->trans_begin();

    // Delete Mapping
    $this->BatchMappingModel->delete_batch($data['bsm_ids']);
    // Update student enrolled to false
    $this->CandidateModel->updateByColumn($data['update']);

    // All or some transaction failed
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      $this->session->set_flashdata('class_name', ('alert-danger'));
      $this->session->set_flashdata('message', ('Student(s) failed to remove form the batch.'));
      redirect('admin/candidate/batch/view/' . $b_id);
    } else {
      // All transaction sucessfull
      $this->db->trans_commit();
      $this->session->set_flashdata('class_name', ('alert-success'));
      $this->session->set_flashdata('message', ('Student(s) removed sucessfully from the batch.'));
      redirect('admin/candidate/batch/view/' . $b_id);
    }
  }

  function restriction_addstudent()
  {
    // if()
  }
}