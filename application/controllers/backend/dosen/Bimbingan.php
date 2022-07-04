<?php

class Bimbingan extends CI_Controller {

public $result = [
        'status'  => false,
        'data'    => []
    ];
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_bimbingan');
        if($this->M_user->isNotLogin()) redirect(site_url(''));
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $data = [
            'Data' => $this->M_bimbingan->_getThesisReceivedtoGuidance()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/bimbingan/bimbingan',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function formfedbackGuidance()
    {
        $id = $this->input->post('id');
        $data = [
            'Data' => $this->M_bimbingan->_getDataGuidanceById($id),
            'Mahasiswa' => $this->M_bimbingan->GetMahasiswa($id)
        ];
        $this->load->view('backend/dosen/bimbingan/form_feedback',$data);
    }
}