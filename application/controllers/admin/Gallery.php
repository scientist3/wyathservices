<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/GalleryModel');
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
    $s_id = $this->input->post('s_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('s_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('s_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->do_upload(
      'uploads/images/gallery/',
      's_img_path'
    );

    $pic_thumb = '';
    if ($picture !== false && $picture != null) {
      $pic_thumb = $this->fileupload->create_thumbnail(
        $picture,
        'uploads/images/gallery/',
        120,
        50
      );
    }

    // If uploaded sucessfully do resize
    if ($picture !== false && $picture != null) {
      $this->fileupload->do_resize(
        $picture,
        1900,
        1000
      );
    }
    //if picture is not uploaded
    if ($picture === false) {
      $this->session->set_flashdata('message', ('invalid_picture'));
    }

    $data['input'] = (object)$postDataInp = array(
      's_id'     => $this->input->post('s_id'),
      's_title'   => $this->input->post('s_title'),
      's_img_path'     => (!empty($picture) ? $picture : $this->input->post('s_img_path_old')),
      's_img_thumb'  => (!empty($pic_thumb) ? $pic_thumb : $this->input->post('s_img_thumb_old')),
      's_status' => ($this->input->post('s_status')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      's_id'     => $input->s_id,
      's_title'   => $input->s_title,
      's_img_path'   => $input->s_img_path,
      's_img_thumb'   => $input->s_img_thumb,
      's_status' => $input->s_status
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($s_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->GalleryModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/gallery/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/gallery/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Gallery');
        $data['subtitle'] = ('Add New Gallery');
        $data['gallery'] = $this->GalleryModel->read();
        $data['content'] = $this->load->view('admin/gallery/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->s_status == '1') {
        // 	$this->GalleryModel->setVisible();
        // }
        if ($this->GalleryModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/gallery/edit/' . $postDataUser['s_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/gallery/edit/' . $postDataUser['s_id']);
      }
    }
  }
  # used functional
  public function edit($s_id = null)
  {
    if (empty($s_id)) {
      redirect('admin/gallery/create');
    }
    $data['title'] = ('Add View Gallery');
    $data['subtitle'] = ('Add New Gallery');
    #-------------------------------#
    $input     = $this->GalleryModel->read_by_id_as_obj($s_id);
    $data['input'] = (object)$postDataUser = array(
      's_id'     => $input->s_id,
      's_title'   => $input->s_title,
      's_img_path'   => $input->s_img_path,
      's_img_thumb' => $input->s_img_thumb,
      's_status' => $input->s_status
    );
    $data['gallery'] = $this->GalleryModel->read();
    $data['content'] = $this->load->view('admin/gallery/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($s_id = null)
  {
    if (empty($s_id)) {
      redirect('admin/gallery/create');
    }
    if ($this->GalleryModel->delete($s_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/gallery/create');
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