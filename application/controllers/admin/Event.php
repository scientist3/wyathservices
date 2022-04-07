<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('fileupload');
    $this->load->model(['admin/NewsNotificationEventsModel' => 'EventModel']);
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
    $news_id = $this->input->post('news_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('news_title', ('Title'),  'required|max_length[100]');
      $this->form_validation->set_rules('news_desc', ('Description'),  'required');
      $this->form_validation->set_rules('news_type', ('Type'),    'required');
      $this->form_validation->set_rules('news_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->doc_upload(
      'uploads/images/newsdoc/',
      'news_doc_link'
    );
    $data['input'] = (object)$postDataInp = array(
      'news_id'     => $this->input->post('news_id'),
      'news_type'     => $this->input->post('news_type'),
      'news_doc_link'     => (!empty($picture) ? $picture : $this->input->post('news_doc_link_old')),
      'news_title'   => $this->input->post('news_title'),
      'news_desc'   => $this->input->post('news_desc'),
      'news_link'   => $this->input->post('news_link'),
      'news_status' => ($this->input->post('news_status')),

    );

    $input = $data['input'];

    /*-----------CHECK ID -----------*/
    if (empty($news_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->EventModel->create($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/event/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/event/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add/View News | Notification | Events');
        $data['subtitle'] = ('Add New News|Notification|Events');
        $data['news'] = $this->EventModel->read();
        $data['content'] = $this->load->view('admin/event/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->EventModel->update($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/event/edit/' . $postDataInp['news_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/event/edit/' . $postDataInp['news_id']);
      }
    }
  }
  # used functional
  public function edit($news_id = null)
  {
    if (empty($news_id)) {
      redirect('admin/event/create');
    }
    $data['title'] = ('Add/View News | Notification | Events');
    $data['subtitle'] = ('Edit News|Notification|Events');
    #-------------------------------#
    $input = $this->EventModel->read_by_id_as_obj($news_id);
    $data['input'] = (object)$postDataInp = array(
      'news_id'     => $input->news_id,
      'news_type'   => $input->news_type,
      'news_doc_link'   => $input->news_doc_link,
      'news_title'  => $input->news_title,
      'news_desc'   => $input->news_desc,
      'news_link'   => $input->news_link,
      'news_status' => $input->news_status
    );
    $data['news'] = $this->EventModel->read();
    $data['content'] = $this->load->view('admin/event/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($news_id = null)
  {
    if (empty($news_id)) {
      redirect('admin/event/create');
    }
    if ($this->EventModel->delete($news_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/event/create');
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