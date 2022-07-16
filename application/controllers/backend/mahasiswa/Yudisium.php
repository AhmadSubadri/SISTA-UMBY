<?php
/**
 * 
 */
class Yudisium extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_student');
		$this->load->model('M_yudisium');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/mahasiswa/yudisium/upload_syarat_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}
}