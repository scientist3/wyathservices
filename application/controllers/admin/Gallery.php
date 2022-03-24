<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model(['admin/EventGalleryModel' => 'ev_model', 'admin/GalleryModel']);

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
    $gal_id = $this->input->post('gal_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('gal_img_caption', ('Image Caption'),  'required|max_length[50]');
      $this->form_validation->set_rules('gal_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->do_upload(
      'uploads/images/gallery/',
      'gal_img_path'
    );

    $pic_thumb = '';
    if ($picture !== false && $picture != null) {
      $pic_thumb = $this->fileupload->create_thumbnail(
        $picture,
        'uploads/images/gallery/',
        370,
        130
      );
    }

    // If uploaded sucessfully do resize
    if (0 && $picture !== false && $picture != null) {
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

    /*
    gal_id
    gal_img_caption
    gal_img_path
    gal_img_thumb
    gal_event_id
    gal_status
    */

    $data['input'] = (object)$postDataInp = array(
      'gal_id'            => $this->input->post('gal_id'),
      'gal_event_id'      => $this->input->post('gal_event_id'),
      'gal_img_caption'   => $this->input->post('gal_img_caption'),
      'gal_img_path'      => (!empty($picture) ? $picture : $this->input->post('gal_img_path_old')),
      'gal_img_thumb'     => (!empty($pic_thumb) ? $pic_thumb : $this->input->post('gal_img_thumb_old')),
      'gal_status'        => ($this->input->post('gal_status')),
    );

    /*-----------CHECK ID -----------*/
    if (empty($gal_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->GalleryModel->create($postDataInp)) {
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
        $data['event_list']  = $this->ev_model->read_as_list_active_only();
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
        if ($this->GalleryModel->update($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/gallery/edit/' . $postDataInp['gal_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/gallery/edit/' . $postDataInp['gal_id']);
      }
    }
  }
  # used functional
  public function edit($gal_id = null)
  {
    if (empty($gal_id)) {
      redirect('admin/gallery/create');
    }
    $data['title'] = ('Add View Gallery');
    $data['subtitle'] = ('Add New Gallery');
    #-------------------------------#
    $input     = $this->GalleryModel->read_by_id_as_obj($gal_id);
    $data['input'] = (object)$postDataInp = array(
      'gal_id'           => $input->gal_id,
      'gal_event_id'     => $input->gal_event_id,
      'gal_img_caption'  => $input->gal_img_caption,
      'gal_img_path'     => $input->gal_img_path,
      'gal_img_thumb'    => $input->gal_img_thumb,
      'gal_status'       => $input->gal_status
    );

    $data['event_list']  = $this->ev_model->read_as_list_active_only();
    $data['gallery'] = $this->GalleryModel->read();
    $data['content'] = $this->load->view('admin/gallery/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($gal_id = null)
  {
    if (empty($gal_id)) {
      redirect('admin/gallery/create');
    }
    if ($this->GalleryModel->delete($gal_id)) {
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