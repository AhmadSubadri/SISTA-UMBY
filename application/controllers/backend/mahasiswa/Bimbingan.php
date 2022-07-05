<?php
/**
 * 
 */
class Bimbingan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_student');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

    public function Index()
    {
        $data = [
            'Data' => $this->M_student->_getDataGuidance(),
            'Datacard' => $this->M_student->_getDataGuidanceCard(),
            'mentor' => $this->M_student->_getsThesisReceived()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/skripsi/bimbingan',$data);
        $this->load->view('backend/partials_/footer');
    }
}