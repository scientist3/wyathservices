<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/EventModel');
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
    $event_id = $this->input->post('event_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('event_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('event_desc', ('Description'),  'required');
      $this->form_validation->set_rules('event_status', ('Status'),    'required');
    }
    $data['input'] = (object)$postDataInp = array(
      'event_id'     => $this->input->post('event_id'),
      'event_title'   => $this->input->post('event_title'),
      'event_desc'   => $this->input->post('event_desc'),
      'event_status' => ($this->input->post('event_status')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'event_id'     => $input->event_id,
      'event_title'   => $input->event_title,
      'event_desc'   => $input->event_desc,
      'event_status' => $input->event_status,
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($event_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->event_status == '1') {
        // 	$this->EventModel->setVisible();
        // }
        if ($this->EventModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/Event/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/Event/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Events');
        $data['subtitle'] = ('Add New Event');
        $data['event'] = $this->EventModel->read();
        $data['content'] = $this->load->view('admin/event/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->EventModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/Event/edit/' . $postDataUser['event_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/Event/edit/' . $postDataUser['event_id']);
      }
    }
  }
  # used functional
  public function edit($event_id = null)
  {
    if (empty($event_id)) {
      redirect('admin/Event/create');
    }
    $data['title'] = ('Add View Events');
    $data['subtitle'] = ('Add New Event');
    #-------------------------------#
    $input = $this->EventModel->read_by_id_as_obj($event_id);
    $data['input'] = (object)$postDataUser = array(
      'event_id'     => $input->event_id,
      'event_title'   => $input->event_title,
      'event_desc'   => $input->event_desc,
      'event_status' => $input->event_status
    );
    $data['event'] = $this->EventModel->read();
    $data['content'] = $this->load->view('admin/event/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($event_id = null)
  {
    if (empty($event_id)) {
      redirect('admin/Event/create');
    }
    if ($this->EventModel->delete($event_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/Event/create');
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