<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainingcenter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/candidate/TrainingCenterModel');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }
    $this->user_id = $this->session->userdata('user_id');
  }

  function index($edit_id = null)
  {
    $data['title']        = "";
    $data['subtitle']     = (empty($edit_id)) ? 'Add New Training Center' : 'Edit Training Center';
    $data['input_height'] = 'form-control-sm';
    // Validation

    {
      $this->form_validation->set_rules('tc_tc_id', ('Training Center ID'), 'required');
      $this->form_validation->set_rules('tc_name', ('Training Center Name'), 'required');
      $this->form_validation->set_rules('tc_address', ('Training Center Address'), 'required');
      $this->form_validation->set_rules('tc_district', ('Training CenterDistrict'), 'required');
      $this->form_validation->set_rules('tc_pincode', ('Training CenterPincode'), 'required', 'required|regex_match[/^[0-9]{6}$/]');
      // Define Validation delimiter

      $this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
    }
    // Prepare Data for Listing

    $data['trainingcenters'] = $this->TrainingCenterModel->read();
    // Prepare input Data
    $data['input'] = (object)$postDataInp = [
      'tc_id'        => $this->input->post('tc_id'),
      'tc_tc_id'        => $this->input->post('tc_tc_id'),
      'tc_name'         => $this->input->post('tc_name'),
      'tc_address'      => $this->input->post('tc_address'),
      'tc_district'     => $this->input->post('tc_district'),
      'tc_pincode'      => $this->input->post('tc_pincode'),
    ];

    // Prepare Data form database if edit mode
    if (!empty($edit_id)) {
      $data['input'] = $this->TrainingCenterModel->readById($edit_id);
    }

    if ($this->form_validation->run() === true) {
      if ($this->TrainingCenterModel->create($postDataInp)) {
        $this->session->set_flashdata('class_name', ('alert-success'));
        if (empty($this->input->post('tc_id'))) {
          $this->session->set_flashdata('message', ('Training Center added sucessfully.'));
          redirect('admin/candidate/trainingcenter/index');
        } else {
          $this->session->set_flashdata('message', ('Training Center updated sucessfully.'));
          redirect('admin/candidate/trainingcenter/');
        }
      } else {
        $this->session->set_flashdata('message', ('Please try again.'));
        $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/trainingcenter/');
      }
    } else {
      $data['content'] = $this->load->view('admin/candidate/trainingcenter/index', $data, true);
      $this->load->view('admin/layout/wrapper', $data);
    }
  }

  public function delete($tc_id = null)
  {
    if (empty($tc_id)) {
      redirect('admin/candidate/trainingcenter/');
    }
    if ($this->TrainingCenterModel->delete($tc_id)) {
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/candidate/trainingcenter/index');
  }
}
