<?php
/**
 * 
 */
class Authentication extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function Index()
	{
		$this->load->view('backend/partials_/login');
	}

	public function DoLogin()
	{
		if ($this->input->post()) {
			if ($this->M_user->doLogin())
				redirect(site_url('Dashboard'));
		}
		redirect(site_url(''));
	}

	public function Logout()
	{
		$this->session->sess_destroy();
        redirect(site_url(''));
	}

	public function Accessforbidden()
    {
        $this->load->view('accessblock');
    }
}