<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/ProjectsModel');
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
    $pr_id = $this->input->post('pr_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('pr_caption', ('Caption'),  'required|max_length[50]');
      $this->form_validation->set_rules('pr_url', ('URL'),  'required');
      $this->form_validation->set_rules('pr_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->do_upload(
      'uploads/images/projects/',
      'pr_img_path'
    );
    $data['input'] = (object)$postDataInp = array(
      'pr_id'        => $this->input->post('pr_id'),
      'pr_caption'   => $this->input->post('pr_caption'),
      'pr_img_path'  => (!empty($picture) ? $picture : $this->input->post('pr_img_path_old')),
      'pr_status'    => ($this->input->post('pr_status')),
      'pr_url'       => $this->input->post('pr_url'),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'pr_id'        => $input->pr_id,
      'pr_caption'   => $input->pr_caption,
      'pr_url'       => $input->pr_url,
      'pr_img_path'  => $input->pr_img_path,
      'pr_status'    => $input->pr_status
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($pr_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->ProjectsModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/projects/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/projects/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Projects');
        $data['subtitle'] = ('Add New Project');
        $data['projects'] = $this->ProjectsModel->read();
        $data['content'] = $this->load->view('admin/projects/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->pr_status == '1') {
        // 	$this->ProjectsModel->setVisible();
        // }
        if ($this->ProjectsModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/projects/edit/' . $postDataUser['pr_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/projects/edit/' . $postDataUser['pr_id']);
      }
    }
  }
  # used functional
  public function edit($pr_id = null)
  {
    if (empty($pr_id)) {
      redirect('admin/projects/create');
    }
    $data['title'] = ('Add View projects');
    $data['subtitle'] = ('Add New projects');
    #-------------------------------#
    $input     = $this->ProjectsModel->read_by_id_as_obj($pr_id);
    $data['input'] = (object)$postDataUser = array(
      'pr_id'     => $input->pr_id,
      'pr_caption'   => $input->pr_caption,
      'pr_img_path'   => $input->pr_img_path,
      'pr_url'   => $input->pr_url,
      'pr_status' => $input->pr_status
    );
    $data['projects'] = $this->ProjectsModel->read();
    $data['content'] = $this->load->view('admin/projects/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($pr_id = null)
  {
    if (empty($pr_id)) {
      redirect('admin/projects/create');
    }
    if ($this->ProjectsModel->delete($pr_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/projects/create');
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