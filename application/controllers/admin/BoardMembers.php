<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Boardmembers extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/BoardMembersModel');
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
    $bm_id = $this->input->post('bm_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('bm_name', ('Name'),  'required|max_length[50]');
      $this->form_validation->set_rules('bm_desig', ('Designation'),  'required');
      // $this->form_validation->set_rules('bm_chairman_msg	', ('Message'),  'required');
      $this->form_validation->set_rules('bm_status', ('Status'),    'required');
      $this->form_validation->set_rules('bm_page', ('Select Page'),    'required');
    }

    $picture = $this->fileupload->do_upload(
      'uploads/images/boardmembers/',
      'bm_img_path'
    );

    $pic_thumb = '';
    if ($picture !== false && $picture != null) {
      $pic_thumb = $this->fileupload->create_thumbnail(
        $picture,
        'uploads/images/boardmembers/',
        120,
        50
      );
    }

    // set this size according to front site

    // If uploaded sucessfully do resize
    if ($picture !== false && $picture != null) {
      $this->fileupload->do_resize(
        $picture,
        320,
        320
      );
    }
    //if picture is not uploaded
    if ($picture === false) {
      $this->session->set_flashdata('message', ('invalid picture'));
    }

    $data['input'] = (object)$postDataInp = array(
      'bm_id'     => $this->input->post('bm_id'),
      'bm_name'   => $this->input->post('bm_name'),
      'bm_desig'   => $this->input->post('bm_desig'),
      'bm_img_path'  => (!empty($picture) ? $picture : $this->input->post('bm_img_path_old')),
      'bm_img_thumb'  => (!empty($pic_thumb) ? $pic_thumb : $this->input->post('bm_img_thumb_old')),
      'bm_chairman_msg'   => $this->input->post('bm_chairman_msg'),
      'bm_ischairman' => ($this->input->post('bm_ischairman') == 'on') ? 1 : 0,
      'bm_status' => ($this->input->post('bm_status')),
      'bm_page' => ($this->input->post('bm_page')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'bm_id'           => $input->bm_id,
      'bm_name'         => $input->bm_name,
      'bm_desig'        => $input->bm_desig,
      'bm_img_path'     => $input->bm_img_path,
      'bm_img_thumb'    => $input->bm_img_thumb,
      'bm_chairman_msg' => $input->bm_chairman_msg,
      'bm_ischairman' => $input->bm_ischairman,
      'bm_status'       => $input->bm_status,
      'bm_page'         => $input->bm_page,

    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($bm_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->BoardMembersModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/boardmembers/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/boardmembers/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Board Members');
        $data['subtitle'] = ('Add New Board Member');
        $data['boardmember'] = $this->BoardMembersModel->read();
        $data['content'] = $this->load->view('admin/boardmembers/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->BoardMembersModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try  database'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/boardmembers/edit/' . $postDataUser['bm_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again Form') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/boardmembers/edit/' . $postDataUser['bm_id']);
      }
    }
  }
  # used functional
  public function edit($bm_id = null)
  {
    if (empty($bm_id)) {
      redirect('admin/boardmembers/create');
    }
    $data['title'] = ('Add View Board Members');
    $data['subtitle'] = ('Add New Board Member');
    #-------------------------------#
    $input = $this->BoardMembersModel->read_by_id_as_obj($bm_id);
    $data['input'] = (object)$postDataUser = array(
      'bm_id'           => $input->bm_id,
      'bm_name'         => $input->bm_name,
      'bm_desig'        => $input->bm_desig,
      'bm_img_path'     => $input->bm_img_path,
      'bm_img_thumb'    => $input->bm_img_thumb,
      'bm_chairman_msg' => $input->bm_chairman_msg,
      'bm_ischairman'   => $input->bm_ischairman,
      'bm_status'       => $input->bm_status,
      'bm_page'         => $input->bm_page,
    );
    $data['boardmember'] = $this->BoardMembersModel->read();
    $data['content'] = $this->load->view('admin/boardmembers/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($bm_id = null)
  {
    if (empty($bm_id)) {
      redirect('admin/boardmembers/create');
    }
    if ($this->BoardMembersModel->delete($bm_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/boardmembers/create');
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