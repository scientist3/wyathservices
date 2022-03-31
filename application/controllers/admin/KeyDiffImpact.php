<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeyDiffImpact extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/KeyDiffImpactModel');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
      redirect('login/logout');
    $this->user_id = $this->session->userdata('user_id');
  }

  public function index()
  {
    $this->create();
  }
  # used functional
  public function create()
  {
    $kd_id = $this->input->post('kd_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('kd_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('kd_des', ('Description'),  'required');
      $this->form_validation->set_rules('kd_status', ('Status'),    'required');
      $this->form_validation->set_rules('kd_page', ('Select Page'),    'required');
    }
    $data['input'] = (object)$postDataInp = array(
      'kd_id'     => $this->input->post('kd_id'),
      'kd_title'   => $this->input->post('kd_title'),
      'kd_des'   => $this->input->post('kd_des'),
      'kd_status' => ($this->input->post('kd_status')),
      'kd_page' => ($this->input->post('kd_page')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'kd_id'     => $input->kd_id,
      'kd_title'   => $input->kd_title,
      'kd_des'   => $input->kd_des,
      'kd_status' => $input->kd_status,
      'kd_page' => $input->kd_page,
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($kd_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->kd_status == '1') {
        // 	$this->KeyDiffImpactModel->setVisible();
        // }
        if ($this->KeyDiffImpactModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/keydiffimpact/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/keydiffimpact/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Key Differentiators / Impact');
        $data['subtitle'] = ('Add New Key Differentiators / Impacts');
        $data['keydiffimpact'] = $this->KeyDiffImpactModel->read();
        // print_r($data['KeyDiffImpact']);
        // die();
        $data['content'] = $this->load->view('admin/keydiffimpact/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->KeyDiffImpactModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/keydiffimpact/edit/' . $postDataUser['kd_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/keydiffimpact/edit/' . $postDataUser['kd_id']);
      }
    }
  }
  # used functional
  public function edit($kd_id = null)
  {
    if (empty($kd_id)) {
      redirect('admin/keydiffimpact/create');
    }
    $data['title'] = ('Add View Key Differentiators / Impact');
    $data['subtitle'] = ('Add New Key Differentiators / Impacts');
    #-------------------------------#
    $input = $this->KeyDiffImpactModel->read_by_id_as_obj($kd_id);
    $data['input'] = (object)$postDataUser = array(
      'kd_id'     => $input->kd_id,
      'kd_title'   => $input->kd_title,
      'kd_des'   => $input->kd_des,
      'kd_status' => $input->kd_status,
      'kd_page' => $input->kd_page
    );
    $data['keydiffimpact'] = $this->KeyDiffImpactModel->read();
    $data['content'] = $this->load->view('admin/keydiffimpact/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($kd_id = null)
  {
    if (empty($kd_id)) {
      redirect('admin/keydiffimpact/create');
    }
    if ($this->KeyDiffImpactModel->delete($kd_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/keydiffimpact/create');
  }
}


/*
#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/doctor/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 
				293,
				350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
		#-------------------------------# 

*/