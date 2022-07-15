<?php

class Yudisium extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_examthesis');
        $this->load->model('M_requirement');
        $this->load->model('M_yudisium');
        if($this->M_user->isNotLogin()) redirect(site_url(''));
        $this->load->library('form_validation');
    }

    public function Index()
    {
    	$data = [
            'Data' => $this->M_yudisium->getRequirementYudisium()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/yudisium/dokumen_yudisium', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function updateRequirementyudisium()
    {
    	$id = $this->input->post('id');
        $this->M_requirement->update('tb_requirements',['requirements' => $this->input->post('requirement'), 'qty' => $this->input->post('qty')], 'id', $id);
        $this->session->set_flashdata('msg',"Data has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/syarat-yudisium'));
    }

    public function deleterequirementyudisium($id)
    {
    	$this->M_requirement->delete('tb_requirements','id',$id);
    	$this->session->set_flashdata('msg',"Data has been delete successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/syarat-yudisium'));
    }

    public function publishrequirementyudisium($id)
    {
    	$this->M_requirement->_SetData('tb_requirements', ['status' => "1"], 'id' ,$id);
    	$this->session->set_flashdata('msg',"Data has been published successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/syarat-yudisium'));
    }

    public function unpublishrequirementyudisium($id)
    {
        $this->M_requirement->_SetData('tb_requirements', ['status' => "0"], 'id' ,$id);
        $this->session->set_flashdata('msg',"Data has been unpublished successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/syarat-yudisium'));
    }

    public function GetMahasiswaYudisium()
    {
        $data = [
            'DataNilai' => $this->M_yudisium->GetNilaiAkhirpendadaran(),
            'DataSyarat' => $this->M_yudisium->getRequirementYudisiumBystatus()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/yudisium/mahasiswa_yudisium', $data);
        $this->load->view('backend/partials_/footer');
    }
}