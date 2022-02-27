<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeaturedInitiatives extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Featured Initiatives";
        $data['content'] = $this->load->view('admin/featured_initiatives/index', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
    }
    public function create()
    {
        $this->load->model('FeaturedInitiativesModel');
        $data['input'] = [
            'fi_title' => $this->input->post('fi_title'),
            'fi_desc' => $this->input->post('fi_desc'),
        ];
        if ($this->FeaturedInitiativesModel->insert($data['input'])) {
            $this->session->set_flashdata('message', 'Data Inserted Successfully');
            redirect('FeaturedInitiatives/index');
        } else {
            $this->session->set_flashdata('message', 'Error While Inserting Data');
            redirect('FeaturedInitiatives/index');
        }
    }
}
