<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutus extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/AboutusModel');
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
    $ab_id = $this->input->post('ab_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('ab_title', ('Title'),  'required|max_length[50]');
      $this->form_validation->set_rules('ab_subtitle', ('Subtitle'),  'required');
      $this->form_validation->set_rules('ab_desc', ('Description'),  'required');
      $this->form_validation->set_rules('ab_district_covered', ('Districts Covered'),  'required');
      $this->form_validation->set_rules('ab_centres_established', ('Centres Established'),  'required');
      $this->form_validation->set_rules('ab_students_impacted', ('Students Impacted'),  'required');
      $this->form_validation->set_rules('ab_corporate_engaged', ('Corporate Engaged'),  'required');
      $this->form_validation->set_rules('ab_vision_des', ('Vision Description'),  'required');
      $this->form_validation->set_rules('ab_mission_des', ('Mission Description'),  'required');
      $this->form_validation->set_rules('ab_status', ('Status'),    'required');
    }
    $picture = $this->fileupload->do_upload(
      'uploads/images/aboutus/',
      'ab_image_path'
    );
    $data['input'] = (object)$postDataInp = array(
      'ab_id'                   => $this->input->post('ab_id'),
      'ab_title'                => $this->input->post('ab_title'),
      'ab_subtitle'             => $this->input->post('ab_subtitle'),
      'ab_desc'                 => $this->input->post('ab_desc'),
      'ab_image_path'           => (!empty($picture) ? $picture : $this->input->post('ab_image_path_old')),
      'ab_district_covered'     => $this->input->post('ab_district_covered'),
      'ab_centres_established'  => $this->input->post('ab_centres_established'),
      'ab_students_impacted'    => $this->input->post('ab_students_impacted'),
      'ab_corporate_engaged'    => $this->input->post('ab_corporate_engaged'),
      'ab_vision_des'           => $this->input->post('ab_vision_des'),
      'ab_mission_des'          => $this->input->post('ab_mission_des'),
      'ab_status'               => ($this->input->post('ab_status')),
    );

    $input = $data['input'];
    #----------------- User Object -------------#
    $data['user'] = (object)$postDataUser = array(
      'ab_id'     => $input->ab_id,
      'ab_title'   => $input->ab_title,
      'ab_subtitle' => $input->ab_subtitle,
      'ab_desc' => $input->ab_desc,
      'ab_image_path' => $input->ab_image_path,
      'ab_district_covered' => $input->ab_district_covered,
      'ab_centres_established' => $input->ab_centres_established,
      'ab_students_impacted' => $input->ab_students_impacted,
      'ab_corporate_engaged' => $input->ab_corporate_engaged,
      'ab_vision_des' => $input->ab_vision_des,
      'ab_mission_des' => $input->ab_mission_des,
      'ab_status' => $input->ab_status
    );
    #----------------- Location Object -------------#

    /*-----------CHECK ID -----------*/
    if (empty($ab_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->AboutusModel->create($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/Aboutus/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/Aboutus/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View About Us');
        $data['subtitle'] = ('Add New About Us');
        $data['aboutus'] = $this->AboutusModel->read();
        $data['content'] = $this->load->view('admin/Aboutus/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->ab_status == '1') {
        // 	$this->AboutusModel->setVisible();
        // }
        if ($this->AboutusModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/Aboutus/edit/' . $postDataUser['ab_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/Aboutus/edit/' . $postDataUser['ab_id']);
      }
    }
  }
  # used functional
  public function edit($ab_id = null)
  {
    if (empty($ab_id)) {
      redirect('admin/Aboutus/create');
    }
    $data['title'] = ('Add View About Us');
    $data['subtitle'] = ('Add New About Us');
    #-------------------------------#
    $input     = $this->AboutusModel->read_by_id_as_obj($ab_id);
    $data['input'] = (object)$postDataUser = array(
      'ab_id'     => $input->ab_id,
      'ab_title'   => $input->ab_title,
      'ab_subtitle' => $input->ab_subtitle,
      'ab_desc' => $input->ab_desc,
      'ab_image_path' => $input->ab_image_path,
      'ab_district_covered' => $input->ab_district_covered,
      'ab_centres_established' => $input->ab_centres_established,
      'ab_students_impacted' => $input->ab_students_impacted,
      'ab_corporate_engaged' => $input->ab_corporate_engaged,
      'ab_vision_des' => $input->ab_vision_des,
      'ab_mission_des' => $input->ab_mission_des,
      'ab_status' => $input->ab_status
    );
    $data['aboutus'] = $this->AboutusModel->read();
    $data['content'] = $this->load->view('admin/aboutus/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($ab_id = null)
  {
    if (empty($ab_id)) {
      redirect('admin/Aboutus/create');
    }
    if ($this->AboutusModel->delete($ab_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/Aboutus/create');
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