<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
  public function index()
  {
    $data['title'] = "Home";
    $data['content'] = $this->load->view('frontsite/home/index', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function aboutwyathservices()
  {
    $data['title'] = "About Wyath Services";
    $data['content'] = $this->load->view('frontsite/about/aboutwyathservices', $data, true);
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
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/fourpillars', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function keydifferentiators()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/keydifferentiators', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function ourimpact()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/ourimpact', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function chairmansmessage()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/chairmansmessage', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function partners()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/partners', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function areacovered()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/areacovered', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }

  public function news()
  {
    $data['title'] = "Board of Advisors ";
    $data['content'] = $this->load->view('frontsite/about/news', $data, true);
    $this->load->view('frontsite/layout/wrapper_view', $data);
  }
}
