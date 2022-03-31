<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eventgallery extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['admin/EventGalleryModel' => 'ev_model']);
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
    $ev_gl_id = $this->input->post('ev_gl_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('ev_gl_name', ('Event Name'),  'required|max_length[50]');
      // $this->form_validation->set_rules('gal_status', ('Status'),    'required');
    }

    $data['input'] = (object)$postDataInp = array(
      'ev_gl_id'      => $this->input->post('ev_gl_id'),
      'ev_gl_name'    => $this->input->post('ev_gl_name'),
    );

    /*-----------CHECK ID -----------*/
    if (empty($ev_gl_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->ev_model->create($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/eventgallery/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/eventgallery/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Gallery');
        $data['subtitle'] = ('Add New Gallery');
        $data['eventgallery'] = $this->ev_model->read();
        $data['content'] = $this->load->view('admin/eventgallery/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->s_status == '1') {
        // 	$this->ev_model->setVisible();
        // }
        if ($this->ev_model->update($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/eventgallery/edit/' . $postDataInp['ev_gl_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/eventgallery/edit/' . $postDataInp['ev_gl_id']);
      }
    }
  }
  # used functional
  public function edit($ev_gl_id = null)
  {
    if (empty($ev_gl_id)) {
      redirect('admin/eventgallery/create');
    }
    $data['title'] = ('Add View Gallery');
    $data['subtitle'] = ('Add New Gallery');
    #-------------------------------#
    $input     = $this->ev_model->read_by_id_as_obj($ev_gl_id);
    $data['input'] = (object)$postDataInp = array(
      'ev_gl_id'    => $input->ev_gl_id,
      'ev_gl_name'  => $input->ev_gl_name,
    );
    $data['eventgallery'] = $this->ev_model->read();
    $data['content'] = $this->load->view('admin/eventgallery/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($ev_gl_id = null)
  {
    if (empty($ev_gl_id)) {
      redirect('admin/eventgallery/create');
    }
    if ($this->ev_model->delete($ev_gl_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/eventgallery/create');
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