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
        $this->load->model('M_bimbingan');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
            'Data' => $this->M_student->checkstatusBimbingan(),
            'DataSyarat' => $this->M_student->GetRequirementPendadaran()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/index',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function JadwalPendadaran()
	{
		$data = [
            
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/jadwal_pendadaran',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function PengumumanPendadaran()
	{
		$data = [
            
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/pengumuman_pendadaran',$data);
        $this->load->view('backend/partials_/footer');
	}
}