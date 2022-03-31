<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FeaturedInitiatives extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/FeaturedInitiativesModel');
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
		$fi_id = $this->input->post('fi_id');
		#----------- Validation ----------------#
		{
			$this->form_validation->set_rules('fi_title', ('Title'),  'required|max_length[50]');
			$this->form_validation->set_rules('fi_desc', ('Description'),  'required');
			$this->form_validation->set_rules('fi_status', ('Status'),    'required');
		}
		$data['input'] = (object)$postDataInp = array(
			'fi_id'     => $this->input->post('fi_id'),
			'fi_title'   => $this->input->post('fi_title'),
			'fi_desc'   => $this->input->post('fi_desc'),
			'fi_status' => ($this->input->post('fi_status')),
		);

		$input = $data['input'];
		#----------------- User Object -------------#
		$data['user'] = (object)$postDataUser = array(
			'fi_id'     => $input->fi_id,
			'fi_title'   => $input->fi_title,
			'fi_desc'   => $input->fi_desc,
			'fi_status' => $input->fi_status,
		);
		#----------------- Location Object -------------#

		/*-----------CHECK ID -----------*/
		if (empty($fi_id)) {
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				// if ($input->fi_status == '1') {
				// 	$this->FeaturedInitiativesModel->setVisible();
				// }
				if ($this->FeaturedInitiativesModel->create($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('Saved Successfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
					redirect('admin/featuredinitiatives/create');
				} else {
					#set exception message
					$this->session->set_flashdata('message', ('Please Try Again'));
					$this->session->set_flashdata('class_name', ('alert-danger'));
					redirect('admin/featuredinitiatives/create');
				}
			} else {
				#------------- Default Form Section Display ---------#
				$data['title'] = ('Add View Featured Initiatives');
				$data['subtitle'] = ('Add New Featured Initiative');
				$data['featuredfnitiatives'] = $this->FeaturedInitiativesModel->read();
				$data['content'] = $this->load->view('admin/featured_initiatives/form', $data, true);
				$this->load->view('admin/layout/wrapper', $data);
			}
		} else {
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->FeaturedInitiativesModel->update($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('Updated Successfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
				} else {
					#set exception message
					$this->session->set_flashdata('message', ('Please Try Again'));
					$this->session->set_flashdata('class_name', ('alert-danger'));
				}
				redirect('admin/featuredinitiatives/edit/' . $postDataUser['fi_id']);
			} else {
				#set exception message
				$this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
				$this->session->set_flashdata('class_name', ('alert-danger'));
				redirect('admin/featuredinitiatives/edit/' . $postDataUser['fi_id']);
			}
		}
	}
	# used functional
	public function edit($fi_id = null)
	{
		if (empty($fi_id)) {
			redirect('admin/featuredinitiatives/create');
		}
		$data['title'] = ('Add View Featured Initiatives');
		$data['subtitle'] = ('Add New Featured Initiatives');
		#-------------------------------#
		$input = $this->FeaturedInitiativesModel->read_by_id_as_obj($fi_id);
		$data['input'] = (object)$postDataUser = array(
			'fi_id'     => $input->fi_id,
			'fi_title'   => $input->fi_title,
			'fi_desc'   => $input->fi_desc,
			'fi_status' => $input->fi_status
		);
		$data['featuredfnitiatives'] = $this->FeaturedInitiativesModel->read();
		$data['content'] = $this->load->view('admin/featured_initiatives/form', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	# Used
	public function delete($fi_id = null)
	{
		if (empty($fi_id)) {
			redirect('admin/featuredinitiatives/create');
		}
		if ($this->FeaturedInitiativesModel->delete($fi_id)) {
			// $this->location_model->delete($loc_id);
			$this->session->set_flashdata('message', ('Deleted Successfully'));
			$this->session->set_flashdata('class_name', ('alert-success'));
		} else {
			$this->session->set_flashdata('message', ('Please Try Again'));
			$this->session->set_flashdata('class_name', ('alert-danger'));
		}
		redirect('admin/featuredinitiatives/create');
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