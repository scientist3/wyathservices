<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactdetails extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/ContactdetailsModel');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1)
      redirect('login/logout');
    $this->cont_id = $this->session->userdata('cont_id');
  }

  public function index()
  {
    $this->create();
  }
  # used functional
  public function create()
  {
    $cont_id = $this->input->post('cont_id');
    #----------- Validation ----------------#
    {
      $this->form_validation->set_rules('cont_address', ('Contact Address'),  'required');
      $this->form_validation->set_rules('cont_area', ('Contact Area'),  'required');
      $this->form_validation->set_rules('cont_pincode', ('Contact Pincode'),  'required');
      $this->form_validation->set_rules('cont_state', ('Contact State'),  'required');
      $this->form_validation->set_rules('cont_country', ('Contact Country'),  'required');
      $this->form_validation->set_rules('cont_email', ('Contact Email'),  'required');
      $this->form_validation->set_rules('cont_phone_no', ('Contact Phone Number'),  'required');
      $this->form_validation->set_rules('cont_status', ('Status'),    'required');
    }
    $data['input'] = (object)$postDataInp = array(
      'cont_id'     => $this->input->post('cont_id'),
      'cont_address'   => $this->input->post('cont_address'),
      'cont_area' => ($this->input->post('cont_area')),
      'cont_pincode' => ($this->input->post('cont_pincode')),
      'cont_state' => ($this->input->post('cont_state')),
      'cont_country' => ($this->input->post('cont_country')),
      'cont_email' => ($this->input->post('cont_email')),
      'cont_phone_no' => ($this->input->post('cont_phone_no')),
      'cont_status' => ($this->input->post('cont_status')),
    );

    // $input = $data['input'];
    // #----------------- User Object -------------#
    // $data['user'] = (object)$postDataInp = array(
    //   'cont_id'     => $input->cont_id,
    //   'cont_address'   => $input->cont_address,
    //   'cont_area'   => $input->cont_area,
    //   'cont_pincode	'   => $input->cont_pincode,
    //   'cont_state'   => $input->cont_state,
    //   'cont_country'   => $input->cont_country,
    //   'cont_email	'   => $input->cont_email,
    //   'cont_phone_no'   => $input->cont_phone_no,
    //   'cont_status' => $input->cont_status,
    // );


    /*-----------CHECK ID -----------*/
    if (empty($cont_id)) {
      /*-----------CREATE A NEW RECORD-----------*/
      if ($this->form_validation->run() === true) {
        // if ($input->cont_status == '1') {
        // 	$this->ContactdetailsModel->setVisible();
        // }
        if ($this->ContactdetailsModel->create($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Saved Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
          redirect('admin/Contactdetails/create');
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
          redirect('admin/Contactdetails/create');
        }
      } else {
        #------------- Default Form Section Display ---------#
        $data['title'] = ('Add View Contact Details');
        $data['subtitle'] = ('Add New Contact Detail');
        $data['contactdetails'] = $this->ContactdetailsModel->read();
        $data['content'] = $this->load->view('admin/contactdetails/form', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
      }
    } else {
      /*-----------UPDATE A RECORD-----------*/
      if ($this->form_validation->run() === true) {
        if ($this->ContactdetailsModel->update($postDataInp)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('admin/Contactdetails/edit/' . $postDataInp['cont_id']);
      } else {
        #set exception message
        $this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
        $this->session->set_flashdata('class_name', ('alert-danger'));
        redirect('admin/Contactdetails/edit/' . $postDataInp['cont_id']);
      }
    }
  }
  # used functional
  public function edit($cont_id = null)
  {
    if (empty($cont_id)) {
      redirect('admin/Contactdetails/create');
    }
    $data['title'] = ('Add View Contact Details');
    $data['subtitle'] = ('Add New Contact Detail');
    #-------------------------------#
    $_input = $this->ContactdetailsModel->read_by_id_as_obj($cont_id);

    $data['input'] = (object)array(
      'cont_id'         => $_input->cont_id,
      'cont_address'    => $_input->cont_address,
      'cont_area'       => $_input->cont_area,
      'cont_pincode'    => $_input->cont_pincode,
      'cont_state'      => $_input->cont_state,
      'cont_country'    => $_input->cont_country,
      'cont_email'      => $_input->cont_email,
      'cont_phone_no'   => $_input->cont_phone_no,
      'cont_status'     => $_input->cont_status,
    );
    $data['contactdetails'] = $this->ContactdetailsModel->read();
    $data['content'] = $this->load->view('admin/contactdetails/form', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  # Used
  public function delete($cont_id = null)
  {
    if (empty($cont_id)) {
      redirect('admin/Contactdetails/create');
    }
    if ($this->ContactdetailsModel->delete($cont_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/Contactdetails/create');
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