<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  private $data;
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'AddressModel',
      'admin/candidate/CandidateModel',
    ]);
    //$this->load->library('fileupload');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }

    $this->user_id = $this->session->userdata('user_id');
  }
  public function fetch_district()
  {
    if ($this->input->post('state_id')) {
      echo $this->AddressModel->fetch_district($this->input->post('state_id'));
    } else {
      $this->output->set_status_header('404');
    }
  }

  public function checkDuplicateByIdNo()
  {
    $data['c_id_no'] = $this->input->post('c_id_no');
    if ($this->input->post('c_id_no')) {
      $result =  $this->CandidateModel->checkDuplicateStudent($data);
      if ($result == true) {
        $data['status'] = false;
        $data['message'] = "The Id No is already registered with another student";
      } else {
        $data['status'] = true;
      }
    } else {
      $data['status'] = false;
      $data['message'] = "Please Enter correct Id Number.";
    }
    echo json_encode($data);
  }
}
