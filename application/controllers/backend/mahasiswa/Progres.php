<?php
/**
 * 
 */
class Progres extends CI_Controller
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

	public function ProgresBimbingan()
	{
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/mahasiswa/Progres/progres_bimbingan');
		$this->load->view('backend/partials_/footer');
	}

	public function ProgresYudisium()
	{
		$data = [
			'DataSyarat' => $this->M_yudisium->getRequirementYudisiumByStatus(),
			'DataNilai' => $this->M_yudisium->GetNilaiAkhirForStudent()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/mahasiswa/Progres/progres_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}
}