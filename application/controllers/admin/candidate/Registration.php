<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'admin/CandidateModel',
			'admin/candidate/BatchModel',
			'common_model',
			'admin/CSD',
			'admin/candidate/StateHandleModel'
		]);

		//$this->load->library('fileupload');
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
			redirect('login/logout');
		}

		$this->user_id = $this->session->userdata('user_id');
	}

	public function index()
	{
		$data['state'] = $this->CSD->fetch_state();

		$data['title'] = ('Candidate Registration');

		$data['subtitle'] = ('Add New Candidate');

		$data['input'] = ['ab_title' => ''];
		$data['salutation'] = $this->CandidateModel->salutation();
		$data['gender'] = $this->CandidateModel->gender();
		$data['maritalstatus'] = $this->CandidateModel->maritalstatus();
		$data['education'] = $this->CandidateModel->GetEducation();
		$data['religion'] = $this->CandidateModel->religion();
		$data['category'] = $this->CandidateModel->category();
		// $data['ab_status'] = ["0"];

		$todisability = $this->CandidateModel->todisability();
		$data['todisability'] = $todisability;

		$data['idtype'] = $this->CandidateModel->idtype();
		$data['typeofalternateid'] = $this->CandidateModel->typeofalternateid();

		$data['content'] = $this->load->view('admin/candidate/registration/index', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function fetch_district()
	{
		if ($this->input->post('state_name')) {
			echo $this->CSD->fetch_district($this->StateHandleModel->getstateid($this->input->post('state_name')));
		}
	}

	public function getstateid()
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



	public function viewstudent($c_id = null)
	{
		if (empty($c_id)) {
			redirect('admin/candidate/registration/viewstudentlist');
		}
		$data['title'] = ('Edit Candidate');
		$data['subtitle'] = ('Edit Candidate');
		#-------------------------------#
		$data['salutation'] = $this->CandidateModel->salutation();
		$data['state'] = $this->CSD->fetch_state();

		$data['gender'] = $this->CandidateModel->gender();
		$data['maritalstatus'] = $this->CandidateModel->maritalstatus();
		$data['education'] = $this->CandidateModel->GetEducation();
		$data['religion'] = $this->CandidateModel->religion();
		$data['category'] = $this->CandidateModel->category();
		$todisability = $this->CandidateModel->todisability();
		$data['todisability'] = $todisability;
		$data['idtype'] = $this->CandidateModel->idtype();
		$data['typeofalternateid'] = $this->CandidateModel->typeofalternateid();

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

		$data['content'] = $this->load->view('admin/candidate/registration/viewstudent', $data, true);
		$this->load->view('admin/layout/wrapper', $data);


		// $data['title'] = ('Edit Candidate');
		// $data['subtitle'] = ('Edit Candidate');
		// $data['salutation'] = $this->CandidateModel->salutation();
		// $data['gender'] = $this->CandidateModel->gender();
		// $data['maritalstatus'] = $this->CandidateModel->maritalstatus();
		// $data['education'] = $this->CandidateModel->GetEducation();
		// $data['religion'] = $this->CandidateModel->religion();
		// $data['category'] = $this->CandidateModel->category();
		// // $data['ab_status'] = ["0"];
		// $todisability = $this->CandidateModel->todisability();
		// $data['todisability'] = $todisability;

		// $data['idtype'] = $this->CandidateModel->idtype();
		// $data['typeofalternateid'] = $this->CandidateModel->typeofalternateid();

		// // $data['aboutus'] = $this->AboutusModel->read();

		// $data['content'] = $this->load->view('admin/candidate/registration/viewstudent', $data, true);
		// $this->load->view('admin/layout/wrapper', $data);
	}

	public function viewstudentlist()
	{
		$data['stdlist'] = $this->CandidateModel->read();
		$data['title'] = ('View Candidate List');
		$data['subtitle'] = ('Subtitle');
		// $data['aboutus'] = $this->AboutusModel->read();
		$data['alldata'] = $this->CandidateModel->read();
		$data['totaldata'] = $this->CandidateModel->get_count();
		$data['content'] = $this->load->view('admin/candidate/registration/viewstudentlist', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function batch()
	{
		// $data['title'] = ('Add New Batch');
		// $data['subtitle'] = ('Subtitle');

		// $data['batch'] = $this->BatchModel->read();
		// // print($batchread['bch_id']);
		// // $data['aboutus'] = $this->AboutusModel->read();
		// // CRS-001    Ajaz Sofi    TC-001    Yes    Yes    AS-001

		// $data['trainername'] =
		//     [
		//     "Mohsin",
		//     "Riyaz",
		//     "Shahid",
		// ];
		// $data['trainingcompleted'] =
		//     [
		//     "Yes",
		//     "No",
		// ];
		// $data['assessmentcompleted'] =
		//     [
		//     "Yes",
		//     "No",
		// ];

		// $data['content'] = $this->load->view('admin/candidate/registration/batch', $data, true);
		// $this->load->view('admin/layout/wrapper', $data);
	}

	public function course()
	{
		$data['title'] = ('Add/View Course');
		$data['subtitle'] = ('Add New Course');
		// $data['aboutus'] = $this->AboutusModel->read();

		$data['content'] = $this->load->view('admin/candidate/registration/course', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function trainingcenter()
	{
		$data['title'] = ('Add/View Training Center');
		$data['subtitle'] = ('Add New Training Center');
		// $data['aboutus'] = $this->AboutusModel->read();

		$data['content'] = $this->load->view('admin/candidate/registration/trainingcenter', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function assessment()
	{
		$data['title'] = ('Add/View Assessment');
		$data['subtitle'] = ('Add New Assessment');
		// $data['aboutus'] = $this->AboutusModel->read();

		$data['content'] = $this->load->view('admin/candidate/registration/assessment', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function certification()
	{
		$data['title'] = ('Add/View Certification');
		$data['subtitle'] = ('Generate New Certification');
		// $data['aboutus'] = $this->AboutusModel->read();

		$data['content'] = $this->load->view('admin/candidate/registration/certification', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function placement()
	{
		$data['title'] = ('Add/View Placement');
		$data['subtitle'] = ('Subtitle');
		// $data['aboutus'] = $this->AboutusModel->read();
		$data['placementstatus'] = ["Yes", "No"];
		$data['content'] = $this->load->view('admin/candidate/registration/placement', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function report()
	{
		$data['title'] = ('Report');
		$data['subtitle'] = ('Subtitle');
		// $data['aboutus'] = $this->AboutusModel->read();

		$data['content'] = $this->load->view('admin/candidate/registration/report', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}
	public function insert()
	{
		$data['title'] = ('');
		$data['subtitle'] = ('');

		$this->form_validation->set_rules('salutation', ('Salutation'), 'required');
		$this->form_validation->set_rules('fullname', ('Full name'), 'required|max_length[30]');
		$this->form_validation->set_rules('gender', ('Gender'), 'required');
		$this->form_validation->set_rules('dob', ('DOB'), 'required');
		$this->form_validation->set_rules('mobilenumber', ('Mobile No'), 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email', ('Email'), 'trim|required|valid_email');
		$this->form_validation->set_rules('maritalstatus', ('Marital status'), 'required');
		$this->form_validation->set_rules('fathersname', ('Fathers Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('mothersname', ('Mothers Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('guardianname', ('Guardian Name'), 'required|max_length[30]');
		$this->form_validation->set_rules('education', ('Education'), 'required');
		$this->form_validation->set_rules('religion', ('Religion'), 'required');
		$this->form_validation->set_rules('category', ('Category'), 'required');
		$this->form_validation->set_rules('ab_status', ('Disability'), 'required');
		// $this->form_validation->set_rules('todisability', ('Type Of Disability'), 'required');
		$this->form_validation->set_rules('idtype', ('ID Type'), 'required');
		// $this->form_validation->set_rules('typeofalternateid', ('Type Of Alternate ID'), 'required');
		$this->form_validation->set_rules('idno', ('ID No'), 'required|max_length[30]');
		$this->form_validation->set_rules('permanentaddress', ('Permanent Address'), 'required|max_length[50]');
		$this->form_validation->set_rules('state', ('Permanent State'), 'required');
		$this->form_validation->set_rules('district', ('Permanent District'), 'required');
		$this->form_validation->set_rules('permanenttehsil', ('Permanent Tehsil'), 'required|max_length[30]');
		$this->form_validation->set_rules('permanentcity', ('Permanent City'), 'required|max_length[30]');
		$this->form_validation->set_rules('permanentpincode', ('Permanent PinCode'), 'required|max_length[7]');


		$this->form_validation->set_rules('permanentconstituency', ('Permanent Constituency'), 'required|max_length[50]');


		// extra
		if ($this->input->post('comm_address')) {

			//copy value for extra
			$comm_address = $this->input->post('comm_address');
			$communicationaddress = $this->input->post('permanentaddress');
			$communicationstate = $this->input->post('state');
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
				'permanentstate' => $this->input->post('state'),
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
				'permanentstate' => $this->input->post('state'),
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
		$data['state'] = $this->CSD->fetch_state();

		$data['title'] = ('Candidate Registration');

		$data['subtitle'] = ('Add New Candidate');
		$data['input'] = ['ab_title' => ''];
		$data['salutation'] = $this->CandidateModel->salutation();
		$data['gender'] = $this->CandidateModel->gender();
		$data['maritalstatus'] = $this->CandidateModel->maritalstatus();
		$data['education'] = $this->CandidateModel->GetEducation();
		$data['religion'] = $this->CandidateModel->religion();
		$data['category'] = $this->CandidateModel->category();
		// $data['ab_status'] = ["0"];

		$todisability = $this->CandidateModel->todisability();
		$data['todisability'] = $todisability;

		$data['idtype'] = $this->CandidateModel->idtype();
		$data['typeofalternateid'] = $this->CandidateModel->typeofalternateid();

		$data['content'] = $this->load->view('admin/candidate/registration/index', $data, true);
		$this->load->view('admin/layout/wrapper', $data);
	}

	public function coursevalidate()
	{
		# code...
		$this->form_validation->set_rules('coursename', 'Course Name', 'required');

		$dataa['input'] = (object) $postDataInp = array(
			'coursename' => $this->input->post('coursename'),
		);
	}

	// public function validate()
	// {

	//     // $this->form_validation->set_rules('salutation', ('Salutation'), 'required');
	//     $this->form_validation->set_rules('fullname', ('Fullname'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('gender', ('Gender'), 'required');
	//     $this->form_validation->set_rules('dob', ('DOB'), 'required');
	//     $this->form_validation->set_rules('mobilenumber', ('Mobile No'), 'required|max_length[10]');
	//     $this->form_validation->set_rules('email', ('Email'), 'trim|required|valid_email');
	//     // $this->form_validation->set_rules('maritalstatus', ('Maritalstatus'), 'required');
	//     $this->form_validation->set_rules('fathersname', ('Fathers Name'), 'required|max_length[20]');
	//     $this->form_validation->set_rules('mothersname', ('Mothers Name'), 'required|max_length[20]');
	//     $this->form_validation->set_rules('guardianname', ('Guardian Name'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('education', ('Education'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('religion', ('Religion'), 'required|max_length[30]');
	//     $this->form_validation->set_rules('category', ('Category'), 'required');
	//     // $this->form_validation->set_rules('ab_status', ('Disability'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('todisability', ('Type Of Disability'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('idtype', ('ID Type'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('typeofalternateid', ('Type Of Alternate ID'), 'required|max_length[30]');
	//     $this->form_validation->set_rules('idno', ('ID No'), 'required|max_length[30]');
	//     $this->form_validation->set_rules('permanentaddress', ('Permanent Address'), 'required|max_length[50]');
	//     // $this->form_validation->set_rules('permanentstate', ('Permanent State'), 'required|max_length[50]');
	//     // $this->form_validation->set_rules('permanentdistrict', ('Permanent District'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('permanenttehsil', ('Permanent Tehsil'), 'required|max_length[30]');
	//     // $this->form_validation->set_rules('permanentcity', ('Permanent City'), 'required|max_length[30]');
	//     $this->form_validation->set_rules('permanentpincode', ('Permanent PinCode'), 'required|max_length[7]');

	// }

}
