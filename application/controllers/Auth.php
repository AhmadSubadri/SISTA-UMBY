<?php
/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function Index()
	{
		$this->load->view('frontend/partials_/login');
	}
}