<?php

class Pendadaran extends CI_Controller {

public $result = [
        'status'  => false,
        'data'    => []
    ];
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_examthesis');
        $this->load->model('M_requirement');
        if($this->M_user->isNotLogin()) redirect(site_url(''));
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $data = [
            'Data' => $this->M_requirement->getAllRequirement()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/syarat_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }
}