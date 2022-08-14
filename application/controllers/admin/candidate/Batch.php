<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Batch extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'admin/candidate/BatchModel',
      'admin/candidate/CourseModel',
      'admin/candidate/TrainingCenterModel',
      'admin/candidate/CommonModel'
    ));
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }
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
}
