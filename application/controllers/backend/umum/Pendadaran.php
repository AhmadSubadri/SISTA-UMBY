<?php
/**
 * 
 */
class Pendadaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_student');
		$this->load->model('M_umum');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			'DataPendadaran' => $this->M_umum->GetDataPendaranBypenguji()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/umum/pendadaran', $data);
		$this->load->view('backend/partials_/footer');
	}
}