<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('admin/CandidateModel','admin/candidate/BatchModel','Common_model', 'admin/CSD'));
        //$this->load->library('fileupload');
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
            redirect('login/logout');
        }

        $this->user_id = $this->session->userdata('user_id');
    }


function index()
{
    echo "Hello";
}
}