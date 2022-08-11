<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
	private $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'admin/candidate/CandidateModel',
			'admin/candidate/CommonModel',
			'AddressModel'
		]);

		//$this->load->library('fileupload');
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
			redirect('login/logout');
		}
		// INFO: Setting the Default height for input fields.
		$this->data['input_height'] = "form-control-sm";
		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$this->listStudents();
	}

	public function listStudents()
	{
		$data['students_list'] 		= $this->CandidateModel->read();
		$data['title'] 			= ('View Registered Candidate');
		$data['subtitle'] 	= ('Subtitle');
		// $data['aboutus'] = $this->AboutusModel->read();
		$data['alldata'] 		= $this->CandidateModel->read();
		$data['totaldata'] 	= $this->CandidateModel->get_count();
		$data['content'] 		= $this->load->view('admin/candidate/registration/viewstudentlist', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function create()
	{
		$this->data['title']		= ('Registration New Candidate');
		$this->data['subtitle']	= ('Add New Candidate');
		$c_id = $this->input->post('c_id');
		// Load Common Data
		$this->loadCommonData();
		// Prepare the submitted data.
		$this->prepareData();
		// Define the validation rules.
		$this->validationRules();
		//dd($this->data['input'], true);
		$postDataUser = (array) $this->data['input'];
		// Check for validation errors.
		if ($this->form_validation->run() === true) {
			if ($this->CandidateModel->create($postDataUser)) {
				#set success message
				if (empty($c_id)) {
					$this->session->set_flashdata('message', ('Registered Sucessfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
					redirect('admin/candidate/registration/create');
				} else {
					$this->session->set_flashdata('message', ('Updated Sucessfully'));
					$this->session->set_flashdata('class_name', ('alert-success'));
					redirect('admin/candidate/registration/edit/' . $c_id);
				}
			} else {
				#set exception message
				$this->session->set_flashdata('message', ('Please Try Again'));
				$this->session->set_flashdata('class_name', ('alert-danger'));
				redirect('admin/candidate/registration/create');
			}
		} else {
			$this->data['content'] = $this->load->view('admin/candidate/registration/form_view', $this->data, true);
			$this->load->view('admin/layout/wrapper', $this->data);
		}
	}

	public function edit($c_id = null)
	{
		$this->data['title']		= ('Registration New Candidate');
		$this->data['subtitle']	= ('Add New Candidate');
		// Load Common Data
		$this->data['input'] = $this->CandidateModel->read_by_id_as_obj($c_id);
		$_POST['c_perm_state'] =	$this->data['input']->c_perm_state;
		$_POST['c_comm_state'] =	$this->data['input']->c_comm_state;
		$this->loadCommonData();

		$this->data['content'] = $this->load->view('admin/candidate/registration/form_view', $this->data, true);
		$this->load->view('admin/layout/wrapper', $this->data);
	}
	public function viewStudent($cand_id = null)
	{
		if (empty($cand_id) || $cand_id ==  null) {
			redirect('admin/candidate/registration/index');
		}
		$data['title'] = "View Student";
		$data['content'] = $this->load->view('admin/candidate/registration/view_student', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function delete()
	{
	}

	public function studentdelete($studentid = null)
	{
		if (empty($studentid)) {
			redirect('admin/candidate/registration/viewstudentlist');
		}
		if ($this->CandidateModel->studentdelete($studentid)) {
			// $this->location_model->delete($loc_id);
			$this->session->set_flashdata('message', ('Deleted Successfully'));
			$this->session->set_flashdata('class_name', ('alert-success'));
		} else {
			$this->session->set_flashdata('message', ('Please Try Again'));
			$this->session->set_flashdata('class_name', ('alert-danger'));
		}
		redirect('../admin/candidate/registration/viewstudentlist');
	}

	public function viewstudents($c_id = null)
	{
		if (empty($c_id)) {
			redirect('admin/candidate/registration/viewstudentlist');
		}
		$data['title'] = ('Edit Candidate');
		$data['subtitle'] = ('Edit Candidate');
		#-------------------------------#
		$data['salutation'] = $this->CommonModel->salutation();
		// $data['state'] = $this->AddressModel->fetch_state();
		$data['state'] = $this->AddressModel->read_state_country_as_list(101);
		$data['gender'] = $this->CommonModel->gender();
		$data['maritalstatus'] = $this->CommonModel->maritalstatus();
		$data['education'] = $this->CommonModel->GetEducation();
		$data['religion'] = $this->CommonModel->religion();
		$data['category'] = $this->CommonModel->category();
		$todisability = $this->CommonModel->todisability();
		$data['todisability'] = $todisability;
		$data['idtype'] = $this->CommonModel->idtype();
		$data['typeofalternateid'] = $this->CommonModel->typeofalternateid();

		$input = $this->CandidateModel->read_by_id_as_obj($c_id);
		$data['input'] = (object)$postDataInp = array(
			'c_id' => $input->c_id,
			'fullname' => $input->c_full_name,
			'c_salutation' => $input->c_salutation,
			'c_gender'  => $input->c_gender,
			'dob' => $input->c_dob,
			'mobile' => $input->c_mobile,
			'email' => $input->c_email,
			'maritalstatus' => $input->c_marital_status,
			'fathersname' => $input->c_father_name,
			'mothersname' => $input->c_mother_name,
			'guardianname' => $input->c_guardian_name,
			'education' => $input->c_education,
			'religion' => $input->c_religion,
			'category' => $input->c_catagory,
			'disability' => $input->c_disablity,
			'todisability' => $input->c_type_of_disablity,
			'idtype' => $input->c_idtype,
			'typeofalternateid' => $input->typeofalternateid,
			'idno' => $input->c_idno,
			'permanentaddress' => $input->c_perm_address,
			'permanentstate' => $input->c_perm_state,
			'permanentdistrict' => $input->c_perm_district,
			'permanenttehsil' => $input->c_perm_tehsil,
			'permanentcity' => $input->c_perm_city,
			'permanentpincode' => $input->c_perm_pincode,
			'permanentconstituency' => $input->c_perm_constituency,
			'comm_address' => $input->c_comm_same_as_perm,
			'communicationaddress' => $input->c_comm_address,
			'communicationstate' => $input->c_comm_state,
			'communicationdistrict' => $input->c_comm_district,
			'communicationtehsil' => $input->c_comm_tehsil,
			'communicationcity' => $input->c_comm_city,
			'communicationpincode' => $input->c_comm_pincode,
			'communicationconstituency' => $input->c_comm_constituency
			// ''=>$input->,
		);

		// $data['districts'] = $this->AddressModel->fetch_editdistrict($input->c_perm_state);
		$data['content'] = $this->load->view('admin/candidate/registration/viewstudent', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	private function validationRules()
	{
		// Basic Validation 
		$this->form_validation->set_rules('c_salutation', ('Salutation'), 'required');
		$this->form_validation->set_rules('c_full_name', ('Full name'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_gender', ('Gender'), 'required');
		$this->form_validation->set_rules('c_dob', ('DOB'), 'required');
		$this->form_validation->set_rules('c_mobile', ('Mobile No'), 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('c_email', ('Email'), 'trim|required|valid_email');
		$this->form_validation->set_rules('c_marital_status', ('Marital status'), 'required');
		$this->form_validation->set_rules('c_father_name', ('Fathers Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_mother_name', ('Mothers Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_guardian_name', ('Guardian Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_education', ('Education'), 'required');
		$this->form_validation->set_rules('c_religion', ('Religion'), 'required');
		$this->form_validation->set_rules('c_catagory', ('Category'), 'required');
		$this->form_validation->set_rules('c_disablity', ('Disability'), 'required');

		// Type of Disablity is required or not 
		if ($this->input->post('c_disablity') == 1) {
			$this->form_validation->set_rules('c_type_of_disablity', ('Type Of Disability'), 'required');
		}

		$this->form_validation->set_rules('c_id_no', ('ID No'), 'required|callback_duplicate_check');
		$this->form_validation->set_rules('c_id_type', ('ID Type'), 'required');

		// Check for alternate id is required or not
		if ($this->input->post('c_id_type') == 2) {
			$this->form_validation->set_rules('c_type_of_alternate_id', ('Type Of Alternate ID'), 'required');
		}

		// Address Validation
		$this->form_validation->set_rules('c_perm_address', ('Permanent Address'), 'required|max_length[50]');
		$this->form_validation->set_rules('c_perm_state', ('Permanent State'), 'required');
		$this->form_validation->set_rules('c_perm_district', ('Permanent District'), 'required');
		$this->form_validation->set_rules('c_perm_tehsil', ('Permanent Tehsil'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_perm_city', ('Permanent City'), 'required|max_length[30]');
		$this->form_validation->set_rules('c_perm_pincode', ('Permanent PinCode'), 'required|max_length[7]');
		$this->form_validation->set_rules('c_perm_constituency', ('Permanent Constituency'), 'required|max_length[50]');

		// Check for Communication Addres is required or not
		if ($this->input->post('c_comm_same_as_perm') == 0) {
			$this->form_validation->set_rules('c_comm_address', ('Comm Address'), 'required');
			$this->form_validation->set_rules('c_comm_tehsil', ('Comm Tehsil'), 'required');
			$this->form_validation->set_rules('c_comm_district', ('Comm District'), 'required');
			$this->form_validation->set_rules('c_comm_city', ('Comm City'), 'required');
			$this->form_validation->set_rules('c_comm_state', ('Comm State'), 'required');
			$this->form_validation->set_rules('c_comm_pincode', ('Comm Pincode'), 'required');
			$this->form_validation->set_rules('c_comm_constituency', ('Comm Constituency'), 'required');
		}


		// Check for experince details are required or not
		if ($this->input->post('c_pre_traning_status') == 2) {
			$this->form_validation->set_rules('c_prev_exp_sector', ('Prev. Exp. Sector'), 'required');
			$this->form_validation->set_rules('c_prev_exp_no_of_months', ('Experience Months'), 'required|numeric');
			$this->form_validation->set_rules('c_employed', ('Employed'), 'required');
			$this->form_validation->set_rules('c_employment_status', ('Employment Status'), 'required');
			$this->form_validation->set_rules('c_employement_details', ('Employment Details'), 'required');
		}

		// Define Validation delimiter
		$this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
	}

	private function prepareData()
	{
		$boolSameAddress = $this->input->post('c_comm_same_as_perm') == 1 ? true : false;
		$this->data['input'] = (object) [
			'c_id' 										=> $this->input->post('c_id'),
			'c_salutation'						=> $this->input->post('c_salutation'),
			'c_full_name' 						=> $this->input->post('c_full_name'),
			'c_father_name'						=> $this->input->post('c_father_name'),
			'c_mother_name'						=> $this->input->post('c_mother_name'),
			'c_guardian_name'					=> $this->input->post('c_guardian_name'),
			'c_gender' 								=> $this->input->post('c_gender'),
			'c_dob'										=> $this->input->post('c_dob'),
			'c_mobile'								=> $this->input->post('c_mobile'),
			'c_email'									=> $this->input->post('c_email'),
			'c_marital_status'				=> $this->input->post('c_marital_status'),
			'c_education'							=> $this->input->post('c_education'),
			'c_religion'							=> $this->input->post('c_religion'),
			'c_catagory'							=> $this->input->post('c_catagory'),
			'c_disablity'							=> $this->input->post('c_disablity'),
			'c_type_of_disablity'			=> $this->input->post('c_disablity') == 1 ? $this->input->post('c_type_of_disablity') : null,
			'c_id_type'								=> $this->input->post('c_id_type'),
			'c_type_of_alternate_id'	=> $this->input->post('c_id_type') == 2 ? $this->input->post('c_type_of_alternate_id') : null,
			'c_id_no'									=> $this->input->post('c_id_no'),
			'c_perm_address'					=> $this->input->post('c_perm_address'),
			'c_perm_tehsil'						=> $this->input->post('c_perm_tehsil'),
			'c_perm_district'					=> $this->input->post('c_perm_district'),
			'c_perm_city'							=> $this->input->post('c_perm_city'),
			'c_perm_state'						=> $this->input->post('c_perm_state'),
			'c_perm_pincode'					=> $this->input->post('c_perm_pincode'),
			'c_perm_constituency'			=> $this->input->post('c_perm_constituency'),
			'c_comm_same_as_perm'			=> $boolSameAddress ? 1 : 0,
			'c_comm_address'					=> $boolSameAddress ? $this->input->post('c_perm_address') : $this->input->post('c_perm_address'),
			'c_comm_tehsil'						=> $boolSameAddress ? $this->input->post('c_perm_tehsil') : $this->input->post('c_comm_tehsil'),
			'c_comm_district'					=> $boolSameAddress ? $this->input->post('c_perm_district') : $this->input->post('c_comm_district'),
			'c_comm_city'							=> $boolSameAddress ? $this->input->post('c_perm_city') : $this->input->post('c_comm_city'),
			'c_comm_state'						=> $boolSameAddress ? $this->input->post('c_perm_state') : $this->input->post('c_comm_state'),
			'c_comm_pincode'					=> $boolSameAddress ? $this->input->post('c_perm_pincode') : $this->input->post('c_comm_pincode'),
			'c_comm_constituency'			=> $boolSameAddress ? $this->input->post('c_perm_constituency') : $this->input->post('c_comm_constituency'),
			'c_pre_traning_status'		=> $this->input->post('c_pre_traning_status'),
			'c_prev_exp_sector'				=> $this->input->post('c_prev_exp_sector'),
			'c_prev_exp_no_of_months'	=> $this->input->post('c_prev_exp_no_of_months'),
			'c_employed'							=> $this->input->post('c_employed'),
			'c_employment_status'			=> $this->input->post('c_employment_status'),
			'c_employement_details'		=> $this->input->post('c_employement_details'),
			'c_heard_about_us'				=> $this->input->post('c_heard_about_us'),
			'c_currently_enrolled'		=> !empty($this->input->post('c_currently_enrolled'))  ? $this->input->post('c_currently_enrolled') : 0,
			'c_training_status'				=> !empty($this->input->post('c_training_status')) ? $this->input->post('c_training_status') : 0,
		];
	}

	private function loadCommonData()
	{
		// TODO: As of now fetching only States of india.
		$this->data['state_list']									= $this->AddressModel->read_state_country_as_list(101);
		// dd($this->data['state_list']);
		$perm_district_id 												= !empty($this->input->post('c_perm_state')) ? $this->input->post('c_perm_state') : 1;
		$comm_district_id 												= !empty($this->input->post('c_comm_state')) ? $this->input->post('c_comm_state') : 1;
		$this->data['perm_district_list']					= $this->AddressModel->read_city_state_as_list($perm_district_id); //['' => 'Select District'];
		$this->data['comm_district_list']					= $this->AddressModel->read_city_state_as_list($comm_district_id); //['' => 'Select District'];

		$this->data['yes_no_list']								=	$this->CommonModel->getYesNoList();
		$this->data['id_type_list']								= $this->CommonModel->getIdType();
		$this->data['gender_list']								= $this->CommonModel->getGender();
		$this->data['category_list']							= $this->CommonModel->getCategory();
		$this->data['religion_list']							= $this->CommonModel->getReligion();
		$this->data['education_list']							= $this->CommonModel->getEducation();
		$this->data['salutation_list']						= $this->CommonModel->getSalutation();
		$this->data['todisability_list']					= $this->CommonModel->getDisability();
		$this->data['marital_status_list']				= $this->CommonModel->getMaritalStatus();
		$this->data['pre_training_status_list']		= $this->CommonModel->getTrainingStatus();
		$this->data['type_of_alternate_id_list']	= $this->CommonModel->getTypeOfAlternateId();

		$this->data['employment_status_list']	= $this->CommonModel->getEmploymentStatusList();

		$this->data['heard_about_us_list']	= $this->CommonModel->getHearAboutUsList();
	}

	public function duplicate_check($strId)
	{
		$data['c_id_no'] = $strId;
		$data['c_id'] = $this->input->post('c_id');

		if ($this->CandidateModel->checkDuplicateStudent($data)) {
			$this->form_validation->set_message('duplicate_check', 'The {field} id already registered with another student.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}


/* 
	Database Tables
	c_id c_salutation c_full_name c_gender c_dob c_mobile c_email c_marital_status c_father_name 
	c_mother_name c_guardian_name c_education c_religion c_catagory c_disablity c_type_of_disablity 
	c_idtype c_type_of_alternate_id c_idno c_perm_address c_perm_tehsil c_perm_district c_perm_city 
	c_perm_state c_perm_pincode c_perm_constituency c_comm_same_as_perm c_comm_address c_comm_tehsil
	c_comm_district c_comm_city c_comm_state c_comm_pincode c_comm_constituency 
	c_pre_traning_status c_prev_exp_sector c_prev_exp_no_of_months c_employed c_employment_status 
	c_employement_details c_heard_about_us c_currently_enrolled c_training_status
*/