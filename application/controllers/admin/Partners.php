<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/PartnersModel');
    $this->load->library('fileupload');
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
    $par_id = $this->input->post('par_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('par_url', ('URL'),  'required');
      $this->form_validation->set_rules('par_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->do_upload(
      'uploads/images/partners/',
      'par_img_path'
    );
    $data['input'] = (object)$postDataInp = array(
      'par_id'        => $this->input->post('par_id'),
      'par_img_path'  => (!empty($picture) ? $picture : $this->input->post('par_img_path_old')),
      'par_status'    => ($this->input->post('par_status')),
      'par_url'       => $this->input->post('par_url'),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'par_id'        => $input->par_id,
      'par_url'       => $input->par_url,
      'par_img_path'  => $input->par_img_path,
      'par_status'    => $input->par_status
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($par_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->PartnersModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/partners/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/partners/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Partners');
        $data['subtitle'] = ('Add New Partner');
        $data['partners'] = $this->PartnersModel->read();
        $data['content'] = $this->load->view('admin/partners/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->par_status == '1') {
        // 	$this->PartnersModel->setVisible();
        // }
        if ($this->PartnersModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/partners/edit/' . $postDataUser['par_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/partners/edit/' . $postDataUser['par_id']);
      }
    }
  }
  # used functional
  public function edit($par_id = null)
  {
    if (empty($par_id)) {
      redirect('admin/partners/create');
    }
    $data['title'] = ('Add View partners');
    $data['subtitle'] = ('Add New partners');
    #-------------------------------#
    $input     = $this->PartnersModel->read_by_id_as_obj($par_id);
    $data['input'] = (object)$postDataUser = array(
      'par_id'     => $input->par_id,
      'par_img_path'   => $input->par_img_path,
      'par_url'   => $input->par_url,
      'par_status' => $input->par_status
    );
    $data['partners'] = $this->PartnersModel->read();
    $data['content'] = $this->load->view('admin/partners/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($par_id = null)
  {
    if (empty($par_id)) {
      redirect('admin/partners/create');
    }
    if ($this->PartnersModel->delete($par_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/partners/create');
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