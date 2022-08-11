<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
      redirect('login/logout');
    $this->user_id = $this->session->userdata('user_id');
  }
  public function index()
  {
    $this->data['title']    = ('Dashboard');
    // $this->data['subtitle']	= ('Add New Candidate');

    $this->data['content'] = $this->load->view('admin/dashboard_view', $this->data, true);

    $this->load->view('admin/layout/wrapper', $this->data);
  }
}
