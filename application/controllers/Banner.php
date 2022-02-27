<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BannerModel');
		$this->load->library('fileupload');
	}


	public function index()
	{
		$this->create();
	}

	# used functional
	public function create()
	{
		$b_title = $this->input->post('b_title');

		#----------- Validation ----------------#
		{
			$this->form_validation->set_rules('b_title', ('Title'),  'required|max_length[50]');
			$this->form_validation->set_rules('dept_status', ('status'),    'required');
		}

		$data['input'] = (object)$postDataInp = array(
			'b_title'     => $this->input->post('b_title'),
			// 'dept_name'   => $this->input->post('dept_name'),
			// 'dept_status' => $this->input->post('dept_status')
		);

		$input = $data['input'];
		#----------------- User Object -------------#
		$data['user'] = (object)$postDataUser = array(
			'b_title'     => $input->b_title,
			// 'dept_name'   => $input->dept_name,
			// 'dept_status' => $input->dept_status
		);
		#----------------- Location Object -------------#

		/*-----------CHECK ID -----------*/
		if (empty($b_title)) {
			/*-----------CREATE A NEW RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->BannerModel->create($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('save_successfully'));
					redirect('banner/create');
				} else {
					#set exception message
					$this->session->set_flashdata('exception', ('please_try_again'));
					redirect('banner/create');
				}
			} else {
				#------------- Default Form Section Display ---------#
				$data['title'] = ('Add View Banner');
				$data['subtitle'] = ('Add Banner');
				// $data['user_role_list'] = $this->common_model->get_user_roles();
				$data['banner'] = $this->BannerModel->read();
				// print_r($data['departments']);
				$data['contents'] = $this->load->view('admin/banner/form', $data, true);
				$this->load->view('admin/layout/wrapper', $data);
			}
		} else {
			/*-----------UPDATE A RECORD-----------*/
			if ($this->form_validation->run() === true) {
				if ($this->BannerModel->update($postDataUser)) {
					#set success message
					$this->session->set_flashdata('message', ('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', ('please_try_again'));
				}
				redirect('admin/department/edit/' . $postDataUser['b_title']);
			} else {
				#set exception message
				$this->session->set_flashdata('exception', ('please_try_again') . "" . validation_errors());
				redirect('admin/department/edit/' . $postDataUser['b_title']);
			}
		}
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