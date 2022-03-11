<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/ServicesModel');
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
    $init_ser_id = $this->input->post('init_ser_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('init_ser_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('init_ser_desc', ('Description'),  'required');
      $this->form_validation->set_rules('init_ser_status', ('Status'),    'required');
      $this->form_validation->set_rules('init_ser_page', ('Select Page'),    'required');
    }
    $data['input'] = (object)$postDataInp = array(
      'init_ser_id'     => $this->input->post('init_ser_id'),
      'init_ser_title'   => $this->input->post('init_ser_title'),
      'init_ser_desc'   => $this->input->post('init_ser_desc'),
      'init_ser_status' => ($this->input->post('init_ser_status')),
      'init_ser_page' => ($this->input->post('init_ser_page')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'init_ser_id'     => $input->init_ser_id,
      'init_ser_title'   => $input->init_ser_title,
      'init_ser_desc'   => $input->init_ser_desc,
      'init_ser_status' => $input->init_ser_status,
      'init_ser_page' => $input->init_ser_page,
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($init_ser_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->init_ser_status == '1') {
        // 	$this->ServicesModel->setVisible();
        // }
        if ($this->ServicesModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/Services/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/Services/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Services / Initiatives');
        $data['subtitle'] = ('Add New Services / Initiative');
        $data['Services'] = $this->ServicesModel->read();
        // print_r($data['Services']);
        // die();
        $data['content'] = $this->load->view('admin/services/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->ServicesModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/Services/edit/' . $postDataUser['init_ser_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/Services/edit/' . $postDataUser['init_ser_id']);
      }
    }
  }
  # used functional
  public function edit($init_ser_id = null)
  {
    if (empty($init_ser_id)) {
      redirect('admin/Services/create');
    }
    $data['title'] = ('Add View Services / Initiatives');
    $data['subtitle'] = ('Add New Services / Initiatives');
    #-------------------------------#
    $input = $this->ServicesModel->read_by_id_as_obj($init_ser_id);
    $data['input'] = (object)$postDataUser = array(
      'init_ser_id'     => $input->init_ser_id,
      'init_ser_title'   => $input->init_ser_title,
      'init_ser_desc'   => $input->init_ser_desc,
      'init_ser_status' => $input->init_ser_status,
      'init_ser_page' => $input->init_ser_page
    );
    $data['Services'] = $this->ServicesModel->read();
    $data['content'] = $this->load->view('admin/services/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($init_ser_id = null)
  {
    if (empty($init_ser_id)) {
      redirect('admin/Services/create');
    }
    if ($this->ServicesModel->delete($init_ser_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/Services/create');
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