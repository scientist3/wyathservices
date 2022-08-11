<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
  private $data;
  public function __construct()
  {
    parent::__construct();
    $this->load->model([
      'AddressModel'
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
}
