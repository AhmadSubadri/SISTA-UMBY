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
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function GetDataMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataMahasiswa()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function GetDataDosen()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataDosen()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_dosen', $data);
		$this->load->view('backend/partials_/footer');
	}
}
