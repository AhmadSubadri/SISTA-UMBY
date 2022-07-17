<?php
/**
 * 
 */
class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_tatausaha');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu', $data);
		$this->load->view('backend/partials_/footer');
	}
}
