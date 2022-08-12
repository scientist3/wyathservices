<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('admin/candidate/CourseModel'));
    //$this->load->library('fileupload');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }

    $this->user_id = $this->session->userdata('user_id');
  }


  function index($edit_id = null)
  {
    $data['title']        = ('Add/View Course');
    $data['subtitle']     = (empty($edit_id)) ? 'Add New Course' : 'Edit Course';
    $data['input_height'] = 'form-control-sm';

    // Validation
    {
      $this->form_validation->set_rules('crs_course_id', ('Course ID'), 'required');
      $this->form_validation->set_rules('crs_course_name', ('Course Name'), 'required');
      $this->form_validation->set_rules('crs_course_type', ('Course Type'), 'required');
      $this->form_validation->set_rules('crs_sector_covered', ('Sector Covered'), 'required');
      $this->form_validation->set_rules('crs_course_fee', ('Course Fee'), 'required');
      $this->form_validation->set_rules('crs_fee_paid_by', ('Fee Paid By'), 'required');
      // Define Validation delimiter
      $this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
    }

    // Prepare Data for Listing
    $data['courses'] = $this->CourseModel->read();

    // Prepare input Data
    $data['input'] = (object)$postDataInp = [
      'crs_id'              => $this->input->post('crs_id'),
      'crs_course_id'       => $this->input->post('crs_course_id'),
      'crs_course_name'     => $this->input->post('crs_course_name'),
      'crs_course_type'     => $this->input->post('crs_course_type'),
      'crs_sector_covered'  => $this->input->post('crs_sector_covered'),
      'crs_course_fee'      => $this->input->post('crs_course_fee'),
      'crs_fee_paid_by'     => $this->input->post('crs_fee_paid_by'),
    ];

    // Prepare Data form database if edit mode
    if (!empty($edit_id)) {
      $data['input'] = $this->CourseModel->readById($edit_id);
    }

    if ($this->form_validation->run() === true) {
      if ($this->CourseModel->create($postDataInp)) {
        $this->session->set_flashdata('class_name', ('alert-success'));
        if (empty($this->input->post('crs_id'))) {
          $this->session->set_flashdata('message', ('Course added sucessfully.'));
          redirect('admin/candidate/course/');
        } else {
          $this->session->set_flashdata('message', ('Course updated sucessfully.'));
          redirect('admin/candidate/course/');
        }
      } else {
        $this->session->set_flashdata('message', ('Please try again.'));
        $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/course/');
      }
    } else {
      $data['content'] = $this->load->view('admin/candidate/course/index_view', $data, true);
      $this->load->view('admin/layout/wrapper', $data);
    }
  }

  public function delete($crs_id = null)
  {
    if (empty($crs_id)) {
      redirect('admin/candidate/course/');
    }
    if ($this->CourseModel->delete($crs_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/candidate/course/index');
  }
}
