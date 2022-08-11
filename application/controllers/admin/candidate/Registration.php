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
		// dd($this->AddressModel->read_state_country_as_list(), false);
		$this->data['title']		= ('Registration New Candidate');
		$this->data['subtitle']	= ('Add New Candidate');
		// Load Common Data
		$this->loadCommonData();
		// Prepare the submitted data.
		$this->prepareData();
		// Define the validation rules.
		$this->validationRules();
		// dd($this->data['input'], true);
		$postDataUser = (array) $this->data['input'];
		// Check for validation errors.
		if ($this->form_validation->run() === true) {
			if ($this->CandidateModel->create($postDataUser)) {
				#set success message
				$this->session->set_flashdata('message', ('Registered Sucessfully'));
				$this->session->set_flashdata('class_name', ('alert-success'));
				redirect('admin/candidate/registration/create');
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


	public function insert()
	{
		$data['title'] = ('');
		$data['subtitle'] = ('');

		$this->validationRules();
		// extra
		if ($this->input->post('comm_address')) {

			//copy value for extra
			$comm_address = $this->input->post('comm_address');
			$communicationaddress = $this->input->post('permanentaddress');
			$communicationstate = $this->input->post('permanentstate');
			$communicationdistrict = $this->input->post('district');
			$communicationtehsil = $this->input->post('permanenttehsil');
			$communicationcity = $this->input->post('permanentcity');
			$communicationpincode = $this->input->post('permanentpincode');
			$communicationconstituency = $this->input->post('permanentconstituency');


			$dataa['input'] = (object) $postDataInp = array(
				'salutation' => $this->input->post('salutation'),
				'username' => $this->input->post('fullname'),
				'gender' => $this->input->post('gender'),
				'dob' => $this->input->post('dob'),
				'mobilenumber' => $this->input->post('mobilenumber'),
				'email' => $this->input->post('email'),
				'maritalstatus' => $this->input->post('maritalstatus'),
				'fathersname' => $this->input->post('fathersname'),
				'mothersname' => $this->input->post('mothersname'),
				'guardianname' => $this->input->post('guardianname'),
				'education' => $this->input->post('education'),
				'religion' => $this->input->post('religion'),
				'category' => $this->input->post('category'),
				'ab_status' => $this->input->post('ab_status'),
				'todisability' => $this->input->post('todisability'),
				'idtype' => $this->input->post('idtype'),
				'typeofalternateid' => $this->input->post('typeofalternateid'),
				'idno' => $this->input->post('idno'),
				'permanentaddress' => $this->input->post('permanentaddress'),
				'permanentstate' => $this->input->post('permanentstate'),
				'permanentdistrict' => $this->input->post('district'),
				'permanenttehsil' => $this->input->post('permanenttehsil'),
				'permanentcity' => $this->input->post('permanentcity'),
				'permanentpincode' => $this->input->post('permanentpincode'),
				// extra
				'permanentconstituency' => $this->input->post('permanentconstituency'),
				'comm_address' => $this->input->post('comm_address'),
				'communicationaddress' => $communicationaddress,
				'communicationstate' => $communicationstate,
				'communicationdistrict' => $communicationdistrict,
				'communicationtehsil' => $communicationtehsil,
				'communicationcity' => $communicationcity,
				'communicationpincode' => $communicationpincode,
				'communicationconstituency' => $communicationconstituency
			);
		} else {
			$this->form_validation->set_rules('comm_address', ('Communication Sameas Permanent Address'), 'required');
			$this->form_validation->set_rules('communicationaddress', ('Communication Address'), 'required|max_length[50]');
			$this->form_validation->set_rules('state', ('Communication State'), 'required');
			$this->form_validation->set_rules('district', ('Communication District'), 'required');
			$this->form_validation->set_rules('communicationtehsil', ('Communication Tehsil'), 'required|max_length[30]');
			$this->form_validation->set_rules('communicationcity', ('Communication City'), 'required|max_length[30]');
			$this->form_validation->set_rules('communicationpincode', ('Communication PinCode'), 'required|max_length[7]');
			$this->form_validation->set_rules('communicationconstituency', ('Communication Constituency'), 'required|max_length[50]');

			$dataa['input'] = (object) $postDataInp = array(
				'salutation' => $this->input->post('salutation'),
				'username' => $this->input->post('fullname'),
				'gender' => $this->input->post('gender'),
				'dob' => $this->input->post('dob'),
				'mobilenumber' => $this->input->post('mobilenumber'),
				'email' => $this->input->post('email'),
				'maritalstatus' => $this->input->post('maritalstatus'),
				'fathersname' => $this->input->post('fathersname'),
				'mothersname' => $this->input->post('mothersname'),
				'guardianname' => $this->input->post('guardianname'),
				'education' => $this->input->post('education'),
				'religion' => $this->input->post('religion'),
				'category' => $this->input->post('category'),
				'ab_status' => $this->input->post('ab_status'),
				'todisability' => $this->input->post('todisability'),
				'idtype' => $this->input->post('idtype'),
				'typeofalternateid' => $this->input->post('typeofalternateid'),
				'idno' => $this->input->post('idno'),
				'permanentaddress' => $this->input->post('permanentaddress'),
				'permanentstate' => $this->input->post('permanentstate'),
				'permanentdistrict' => $this->input->post('district'),
				'permanenttehsil' => $this->input->post('permanenttehsil'),
				'permanentcity' => $this->input->post('permanentcity'),
				'permanentpincode' => $this->input->post('permanentpincode'),
				// extra
				'permanentconstituency' => $this->input->post('permanentconstituency'),
				'comm_address' => $this->input->post('comm_address'),
				'communicationaddress' => $this->input->post('communicationaddress'),
				'communicationstate' => $this->input->post('communicationstate'),
				'communicationdistrict' => $this->input->post('communicationdistrict'),
				'communicationtehsil' => $this->input->post('communicationtehsil'),
				'communicationcity' => $this->input->post('communicationcity'),
				'communicationpincode' => $this->input->post('communicationpincode'),
				'communicationconstituency' => $this->input->post('communicationconstituency')

			);
		}


		$input = $dataa['input'];
		#----------------- User Object -------------#
		$data['user'] = (object) $postDataUser = array(
			'c_salutation' => $input->salutation,
			'c_full_name' => $input->username,
			'c_gender' => $input->gender,
			'c_dob' => $input->dob,
			'c_mobile' => $input->mobilenumber,
			'c_email' => $input->email,
			'c_marital_status' => $input->maritalstatus,
			'c_father_name' => $input->fathersname,
			'c_mother_name' => $input->mothersname,
			'c_guardian_name' => $input->guardianname,
			'c_education' => $input->education,
			'c_religion' => $input->religion,
			'c_catagory' => $input->category,
			'c_disablity' => $input->ab_status,
			'c_type_of_disablity' => $input->todisability,
			'c_idtype' => $input->idtype,
			'typeofalternateid' => $input->typeofalternateid,
			'c_idno' => $input->idno,
			'c_perm_address' => $input->permanentaddress,
			'c_perm_tehsil' => $input->permanenttehsil,
			'c_perm_district' => $input->permanentdistrict,
			'c_perm_city' => $input->permanentcity,
			'c_perm_state' => $input->permanentstate,
			'c_perm_pincode' => $input->permanentpincode,

			// extra
			'c_perm_constituency' => $input->permanentconstituency,
			'c_comm_same_as_perm' => $input->comm_address,
			'c_comm_address' => $input->communicationaddress,
			'c_comm_tehsil' => $input->communicationtehsil,
			'c_comm_district' => $input->communicationdistrict,
			'c_comm_city' => $input->communicationcity,
			'c_comm_state' => $input->communicationstate,
			'c_comm_pincode' => $input->communicationpincode,
			'c_comm_constituency' => $input->communicationconstituency,

		);

		if ($this->form_validation->run() === true) {

			$this->db->insert('candidate_tbl', $postDataUser);
			$this->session->set_flashdata('message', ('Candidate Added Successfully'));
			$this->session->set_flashdata('class_name', ('alert-success'));
			redirect('admin/candidate/registration/insert');
		}
		// // ############################
		// $data['state'] = $this->CSD->fetch_state();
		$data['state'] = $this->AddressModel->read_state_country_as_list(101); //passed indian country id


		$data['title'] = ('Candidate Registration');

		$data['subtitle'] = ('Add New Candidate');
		$this->loadCommonData();
		$data = array_unique(array_merge($data, $this->data), SORT_REGULAR);
		$data['content'] = $this->load->view('admin/candidate/registration/index', $data, true);
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
		if ($this->input->post('c_disablity') == '1') {
			$this->form_validation->set_rules('c_type_of_disablity', ('Type Of Disability'), 'required');
		}

		$this->form_validation->set_rules('c_id_no', ('ID No'), 'required|max_length[30]');
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
			'c_type_of_disablity'			=> $this->input->post('c_type_of_disablity'),
			'c_id_type'								=> $this->input->post('c_id_type'),
			'c_type_of_alternate_id'	=> $this->input->post('c_type_of_alternate_id'),
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
		$perm_district_id 															= $this->input->post('c_perm_state') ? $this->input->post('c_perm_state') : 1;
		$comm_district_id 															= $this->input->post('c_comm_state') ? $this->input->post('c_comm_state') : 1;
		$this->data['perm_district_list']							= $this->AddressModel->read_city_state_as_list($perm_district_id); //['' => 'Select District'];
		$this->data['comm_district_list']							= $this->AddressModel->read_city_state_as_list($comm_district_id); //['' => 'Select District'];

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