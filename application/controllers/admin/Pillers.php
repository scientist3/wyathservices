<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pillers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/PillersModel');
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
    $pil_id = $this->input->post('pil_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('pil_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('pil_desc', ('Description'),  'required');
      $this->form_validation->set_rules('pil_status', ('Status'),    'required');
    }
    $data['input'] = (object)$postDataInp = array(
      'pil_id'     => $this->input->post('pil_id'),
      'pil_title'   => $this->input->post('pil_title'),
      'pil_desc'   => $this->input->post('pil_desc'),
      'pil_status' => ($this->input->post('pil_status')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'pil_id'     => $input->pil_id,
      'pil_title'   => $input->pil_title,
      'pil_desc'   => $input->pil_desc,
      'pil_status' => $input->pil_status,
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($pil_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->pil_status == '1') {
        // 	$this->PillersModel->setVisible();
        // }
        if ($this->PillersModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/Pillers/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/Pillers/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Pillers');
        $data['subtitle'] = ('Add New Piller');
        $data['pillers'] = $this->PillersModel->read();
        $data['content'] = $this->load->view('admin/pillers/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->PillersModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/Pillers/edit/' . $postDataUser['pil_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/Pillers/edit/' . $postDataUser['pil_id']);
      }
    }
  }
  # used functional
  public function edit($pil_id = null)
  {
    if (empty($pil_id)) {
      redirect('admin/Pillers/create');
    }
    $data['title'] = ('Add View Pillers');
    $data['subtitle'] = ('Add New Piller');
    #-------------------------------#
    $input = $this->PillersModel->read_by_id_as_obj($pil_id);
    $data['input'] = (object)$postDataUser = array(
      'pil_id'     => $input->pil_id,
      'pil_title'   => $input->pil_title,
      'pil_desc'   => $input->pil_desc,
      'pil_status' => $input->pil_status
    );
    $data['event'] = $this->PillersModel->read();
    $data['pillers'] = $this->load->view('admin/pillers/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($pil_id = null)
  {
    if (empty($pil_id)) {
      redirect('admin/Pillers/create');
    }
    if ($this->PillersModel->delete($pil_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/Pillers/create');
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