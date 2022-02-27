<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		echo "Hello world";
		$this->load->view('welcome_message');
		echo "test umar";
		
	}
}


// controller_name/function/id
