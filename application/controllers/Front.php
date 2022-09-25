<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'FrontModel' => 'front_model',
		));
	}
	public function index()
	{
		$data['title']                = "Home";
		$data['banner']								= $this->front_model->get_banner();
		$data['featured_initatives']  = $this->front_model->get_featured_initatives();
		$data['projects']             = $this->front_model->get_projects();
		$data['partners']             = $this->front_model->get_partners();
		$data['sliders']              = $this->front_model->get_sliders();
		$data['what_we_dos']          = $this->front_model->get_what_we_do();
		$data['students_impacted']    = $this->front_model->get_students_impacted();
		// print_r($data['banner']);
		$data['content'] = $this->load->view('frontsite/home/index', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function aboutwyathservices()
	{
		$data['title']			= "About Wyath Services";
		$data['about_us']		= $this->front_model->get_about_us();
		$data['content']		= $this->load->view('frontsite/about/aboutwyathservices', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function boardofdirectors()
	{
		$data['title']				= "Board Of Directors";
		$data['boardmembers'] = $this->front_model->get_board_members();
		$data['content']			= $this->load->view('frontsite/about/boardofdirectors', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function boardofadvisors()
	{
		$data['title']						= "Board of Advisors ";
		$data['advisorymembers'] 	= $this->front_model->get_advisory_members();
		$data['content']					= $this->load->view('frontsite/about/boardofadvisors', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function pillars()
	{
		$data['title']		= "5 Core Pillars";
		$data['pillars']  = $this->front_model->get_pillars();
		$data['content']	= $this->load->view('frontsite/about/pillars', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function keydifferentiators()
	{
		$data['title']		= "Key Differentiators";
		$data['key_differentiators']		= $this->front_model->get_key_differentiators();
		$data['students_impacted']    = $this->front_model->get_students_impacted();
		$data['content']	= $this->load->view('frontsite/about/keydifferentiators', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function ourimpact()
	{
		$data['title'] = "Our Impact";
		$data['our_impact']		= $this->front_model->get_our_impact();
		$data['students_impacted']    = $this->front_model->get_students_impacted();
		$data['content'] = $this->load->view('frontsite/about/ourimpact', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function chairmansmessage()
	{
		$data['title']		= "Chairman's Message";
		$data['chairman_msg']		= $this->front_model->get_chairman_msg();
		$data['content']	= $this->load->view('frontsite/about/chairmansmessage', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function partners()
	{
		$data['title']		= "Partners";
		$data['partners'] = $this->front_model->get_partners();
		$data['content']	= $this->load->view('frontsite/about/partners', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function areacovered()
	{
		$data['title']		= "Area Covered";
		$data['content']	= $this->load->view('frontsite/about/areacovered', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function news()
	{
		$data['title']		= "News & Notification";
		$data['content']	= $this->load->view('frontsite/about/news', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function initiatives()
	{
		$data['title']        = "Initiatives";
		$data['pageTitle'] 		= "Initiatives";
		$data['initiatives']  = $this->front_model->get_initiatives();
		$data['content']      = $this->load->view('frontsite/initiatives/initiatives', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function services()
	{
		$data['title'] 			= "Services";
		$data['pageTitle']	= "Services";
		$data['services']		= $this->front_model->get_services();
		$data['content']		= $this->load->view('frontsite/services/services', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public  function verify_captcha($inputCaptcha = null)
	{
		$isValidCaptcha =  $inputCaptcha == $this->session->userdata('captchaWord') ? true : false;
		if (false == $isValidCaptcha) {
			$this->form_validation->set_message('verify_captcha', 'The {field} is invalid');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function contact()
	{
		$this->load->helper(array('captcha'));

		#----------- Validation ----------------#
		{
			$this->form_validation->set_rules('con_us_name', ('Name'),  'required');
			$this->form_validation->set_rules('con_us_email', ('Email'),  'required');
			$this->form_validation->set_rules('con_us_phoneno', ('Phone No'),  'required');
			$this->form_validation->set_rules('con_us_subject', ('Subject'),  'required');
			$this->form_validation->set_rules('con_us_message', ('Message'),  'required');
			$this->form_validation->set_rules('input_captcha', ('Captcha'),  'required|callback_verify_captcha');
		}

		// ?con_us_name=&con_us_email=&con_us_phoneno=&con_us_subject=&con_us_message=
		// Prepare date
		$data['input'] = (object)$postDataInp = array(
			'con_us_id'				=> $this->input->post('con_us_id', true),
			'con_us_name'			=> $this->input->post('con_us_name', true),
			'con_us_email'		=> $this->input->post('con_us_email', true),
			'con_us_phoneno'	=> $this->input->post('con_us_phoneno', true),
			'con_us_subject'	=> $this->input->post('con_us_subject', true),
			'con_us_message'	=> $this->input->post('con_us_message', true),
			'con_us_status'		=> 1,
		);
		if ($this->form_validation->run() === true) {
			if ($this->front_model->save_message($postDataInp)) {
				#set success message
				$this->session->set_flashdata('message', ('Message Sent Successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('message', ('Please Try Again'));
			}
			redirect('front/contact');
		} else {
			$data['captcha'] = _generateCaptcha($this);
			$data['title']		= "Contact";
			$data['contact_details'] = $this->front_model->get_contact_details();
			$data['content']	= $this->load->view('frontsite/contact/contact', $data, true);
			$this->load->view('frontsite/layout/wrapper_view', $data);
		}
	}

	public function gallery()
	{
		$data['title']		= "Gallery";
		$data['event_list']  = $this->front_model->get_event_gallery_as_list_active_only();
		$data['event_gallery']  	= $this->front_model->get_gallery_by_events();

		$data['content']	= $this->load->view('frontsite/gallery/gallery_view', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function notification()
	{
		$data['title']		= "News / Notification / Events";

		$data['news']  		= $this->front_model->get_news();
		$data['notices']	= $this->front_model->get_notification();
		$data['events'] 	= $this->front_model->get_events();

		$data['content']	= $this->load->view('frontsite/notification/notification_view', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function carrier()
	{
		$data['title']		= "Carriers";
		$data['carriers']	= $this->front_model->get_carriers();
		$data['content']	= $this->load->view('frontsite/carrier/carriers_view', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}
}
