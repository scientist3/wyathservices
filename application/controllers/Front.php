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
		$data['featured_initatives']  = $this->front_model->get_featured_initatives();
		$data['projects']             = $this->front_model->get_projects();
		$data['partners']             = $this->front_model->get_partners();
		$data['sliders']              = $this->front_model->get_sliders();
		$data['what_we_dos']          = $this->front_model->get_what_we_do();
		$data['students_impacted']    = $this->front_model->get_students_impacted();

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
		$data['title'] = "Board Of Directors";
		$data['content'] = $this->load->view('frontsite/about/boardofdirectors', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function boardofadvisors()
	{
		$data['title'] = "Board of Advisors ";
		$data['content'] = $this->load->view('frontsite/about/boardofadvisors', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function fourpillars()
	{
		$data['title'] = "5 Core Pillars";
		$data['content'] = $this->load->view('frontsite/about/fourpillars', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function keydifferentiators()
	{
		$data['title'] = "Key Differentiators";
		$data['content'] = $this->load->view('frontsite/about/keydifferentiators', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function ourimpact()
	{
		$data['title'] = "Our Impact";
		$data['content'] = $this->load->view('frontsite/about/ourimpact', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function chairmansmessage()
	{
		$data['title'] = "Chairman's Message";
		$data['content'] = $this->load->view('frontsite/about/chairmansmessage', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function partners()
	{
		$data['title'] = "Partners";
		$data['content'] = $this->load->view('frontsite/about/partners', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function areacovered()
	{
		$data['title'] = "Area Covered";
		$data['content'] = $this->load->view('frontsite/about/areacovered', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function news()
	{
		$data['title'] = "News & Notification";
		$data['content'] = $this->load->view('frontsite/about/news', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function initiatives()
	{
		$data['title']				= "Initiatives";
		$data['initiatives']  = $this->front_model->get_initiatives();
		$data['content']			= $this->load->view('frontsite/initiatives/initiatives', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function services()
	{
		$data['title'] = "Services";
		$data['services']  = $this->front_model->get_services();
		$data['content'] = $this->load->view('frontsite/services/services', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}

	public function contact()
	{
		$data['title'] = "Contact";
		$data['content'] = $this->load->view('frontsite/contact/contact', $data, true);
		$this->load->view('frontsite/layout/wrapper_view', $data);
	}
}
