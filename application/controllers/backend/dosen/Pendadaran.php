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
            'Data' => $this->M_requirement->getRequirementPendadaran()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/syarat_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function insertrequirementexam()
    {
        $i = 0; // untuk loopingn
        $a = $this->input->post('major');
        $b = $this->input->post('type');
        $c = $this->input->post('requirement');
        $d = $this->input->post('qty');
        if ($c[0] !== null) {
            foreach ($c as $row) {
                $data = [
                    'requirements'=>$row,
                    'qty'=>$d[$i],
                    'type'=>$b,
                    'major'=>$a,
                ];
                $insert = $this->M_requirement->insert('tb_requirements', $data);
                if ($insert) {
                    $i++;
                }
            }
            redirect(site_url('dsn/dashboard/syarat-pendadaran'));
        }
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }

    public function deleterequirementexam($id)
    {
        $this->M_requirement->delete('tb_requirements','id',$id);
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }
}