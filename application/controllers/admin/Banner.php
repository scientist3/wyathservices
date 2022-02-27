<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/BannerModel');
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
		$b_id = $this->input->post('b_id');
		#----------- Validation ----------------#
		{
			$this->form_validation->set_rules('b_title', ('Title'),  'required|max_length[50]');
			// $this->form_validation->set_rules('b_img_path', ('Image'),    'required');
		}
		$picture = $this->fileupload->do_upload(
			'uploads/images/banner/',
			'b_img_path'
		);
		$data['input'] = (object)$postDataInp = array(
			'b_id'     => $this->input->post('b_id'),
			'b_title'   => $this->input->post('b_title'),
			'b_img_path' 	  => (!empty($picture) ? $picture : $this->input->post('b_img_path_old')),
			'b_isvisible' => ($this->input->post('b_isvisible') == 'on') ? 1 : 0,
		);

		$input = $data['input'];
		#----------------- User Object -------------#
		$data['user'] = (object)$postDataUser = array(
			'b_id'     => $input->b_id,
			'b_title'   => $input->b_title,
			'b_img_path'   => $input->b_img_path,
			'b_isvisible' => $input->b_isvisible
		);
		#----------------- Location Object -------------#

		/*-----------CHECK ID -----------*/
		if (empty($b_id)) {
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($input->b_isvisible == '1') {
					$this->BannerModel->setVisible();
				}
				if ($this->BannerModel->create($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('Saved Successfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
					redirect('admin/banner/create');
				} else {
					#set exception message
					$this->session->set_flashdata('message', ('Please Try Again'));
					$this->session->set_flashdata('class_name', ('alert-danger'));
					redirect('admin/banner/create');
				}
			} else {
				#------------- Default Form Section Display ---------#
				$data['title'] = ('Add View Banner');
				$data['subtitle'] = ('Add New Banner');
				$data['banner'] = $this->BannerModel->read();
				$data['content'] = $this->load->view('admin/banner/form', $data, true);
				$this->load->view('admin/layout/wrapper', $data);
			}
		} else {
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->BannerModel->update($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('Updated Successfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
				} else {
					#set exception message
					$this->session->set_flashdata('message', ('Please Try Again'));
					$this->session->set_flashdata('class_name', ('alert-danger'));
				}
				redirect('admin/banner/edit/' . $postDataUser['b_id']);
			} else {
				#set exception message
				$this->session->set_flashdata('exception', ('Please Try Again') . "" . validation_errors());
				$this->session->set_flashdata('class_name', ('alert-danger'));
				redirect('admin/banner/edit/' . $postDataUser['b_id']);
			}
		}
	}
	# used functional
	public function edit($b_id = null)
	{
		if (empty($b_id)) {
			redirect('admin/banner/create');
		}
		$data['title'] = ('Add View Banner');
		$data['subtitle'] = ('Add New Banner');
		#-------------------------------#
		$input     = $this->BannerModel->read_by_id_as_obj($b_id);
		$data['input'] = (object)$postDataUser = array(
			'b_id'     => $input->b_id,
			'b_title'   => $input->b_title,
			'b_img_path'   => $input->b_img_path,
			'b_isvisible' => $input->b_isvisible
		);
		$data['banner'] = $this->BannerModel->read();
		$data['content'] = $this->load->view('admin/banner/form', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	# Used
	public function delete($b_id = null)
	{
		if (empty($b_id)) {
			redirect('admin/banner/create');
		}
		if ($this->BannerModel->delete($b_id)) {
			// $this->location_model->delete($loc_id);
			$this->session->set_flashdata('message', ('Deleted Successfully'));
			$this->session->set_flashdata('class_name', ('alert-success'));
		} else {
			$this->session->set_flashdata('message', ('Please Try Again'));
			$this->session->set_flashdata('class_name', ('alert-danger'));
		}
		redirect('admin/banner/create');
	}
}

/*
	public function index()
	{
		$data['banner_details'] = $this->BannerModel->getBannerDetails();
		$banner = $data['banner_details'];

		$data['b_title'] = $banner['b_title'];
		$data['title'] = "Banner";
		$data['b_isvisible'] = $banner['b_isvisible'];
		$data['b_img_path'] =  $banner['b_img_path'];
		$this->b_img_path = $banner['b_img_path'];
		$data['content'] = $this->load->view('admin/banner/index', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}
	public function update()
	{
		$this->form_validation->set_rules('b_title', 'Title', 'required');
		$picture = $this->fileupload->do_upload(
			'upload/images/banner/',
			'b_img_path'
		);
		if ($this->form_validation->run() == true) {
			$data['input'] = [
				'b_title' => $this->input->post('b_title'),
				'b_isvisible' => ($this->input->post('b_isvisible') == 'on') ? 1 : 0,
				'b_img_path' => $picture
			];
			if (empty($data['input']['b_img_path'])) {
				$data['input']['b_img_path'] = $this->b_img_path;
			}
			if ($this->BannerModel->update($data['input'])) {
				$this->session->set_flashdata('message', 'Data Inserted Successfully');
				$this->session->set_flashdata('class_name', 'alert-success');
				redirect('Banner/index');
			} else {
				$this->session->set_flashdata('message', 'Error While Inserting Data');
				$this->session->set_flashdata('class_name', 'alert-danger');
				redirect('Banner/index');
			}
		} else {
			$this->session->set_flashdata('message', 'Error While Inserting Data Into Database');
			$this->session->set_flashdata('class_name', 'alert-danger');
			redirect('Banner/index');
		}
	}
}
*/
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