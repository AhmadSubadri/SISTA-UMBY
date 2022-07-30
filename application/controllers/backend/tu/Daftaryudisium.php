<?php
/**
 * 
 */
class Daftaryudisium extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel','session'));
		$this->load->model('M_tatausaha');
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function DaftarYudisiumMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataMahasiswaByHasilPendadaran(),
			'DataJurusan' => $this->M_tatausaha->GetDataJurusan()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function DaftarkanYudisiumMahasiswa($nim)
	{
		$this->M_tatausaha->_SetData('tb_thesisreceived', ['status_daftar_yudisium' => "1"], 'nim' ,$nim);
		$this->session->set_flashdata('msg',"Data set has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('TU/dashboard/daftar-yudisium-mahasiswa'));

	}

	public function BatalkanDaftarkanYudisiumMahasiswa($nim)
	{
		$this->M_tatausaha->_SetData('tb_thesisreceived', ['status_daftar_yudisium' => "0"], 'nim' ,$nim);
		$this->session->set_flashdata('msg',"Data set has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('TU/dashboard/daftar-yudisium-mahasiswa'));
	}

	public function ProgresYudisiumMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataMahasiswaByHasilPendadaran(),
			'DataJurusan' => $this->M_tatausaha->GetDataJurusan()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/progres_dokumen_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}
}