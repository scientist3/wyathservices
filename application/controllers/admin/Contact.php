<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/ContactModel');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
      redirect('login/logout');
    $this->cont_id = $this->session->userdata('cont_id');
  }

  public function index()
  {
    #------------- Default Form Section Display ---------#
    $data['title'] = ('Contact / Messages');
    // $data['subtitle'] = ('');
    $data['messages'] = $this->ContactModel->read();

    $data['content'] = $this->load->view('admin/contact/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }
}
