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

    public function updateRequirementexam()
    {
        $id = $this->input->post('id');
        $this->M_requirement->update('tb_requirements',['requirements' => $this->input->post('requirement'), 'qty' => $this->input->post('qty')], 'id', $id);
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }

    // Get data mahasiswa siap daftar pendadaran setelah acc bimbingan
    public function GetPendadaran()
    {
        $data = [
            'Data' => $this->M_examthesis->Index()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/data_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function DetailDataPendadaran($id)
    {
        
        $data = [
            'Data' => $this->M_examthesis->DetailDataPendadaran($id),
            'DetailPenguji' => $this->M_examthesis->DetailPenguji($id),
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/detail_data_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function PenjadwalanPendadaran()
    {
        $major = $this->session->userdata('major');
        $data = [
            'Data' => $this->M_examthesis->getPengujiFix(),
            'DataDosen' => $this->M_examthesis->getExaminer($major)
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/penjadwalan_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function InsertPengujiPendadaran()
    {
        $nim = $this->input->post('nim');
        $penguji = $this->input->post('penguji');
        for($i=0; $i < sizeof($penguji); $i++){
            $Datapenguji = array(
                'id_thesisreceived' => $this->input->post('id_Thesis'),
                'nim' => $nim,
                'penguji' => $penguji[$i],
                'id_major' => $this->input->post('major')
            );
            $this->db->insert('tb_detail_pendadaran', $Datapenguji);
        }
        $DataDetail = array(
            'kegiatan' => $this->input->post('kegiatan'),
            'tempat' => $this->input->post('tempat'),
            'date' => $this->input->post('tanggal'),
            'time' => $this->input->post('jam'),
            'time' => $this->input->post('jam')
        );
        $this->db->where('nim', $nim);
        $this->db->update('tb_thesisreceived', $DataDetail);
        $this->session->set_flashdata('msg',"Ploting examiner has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');

    return redirect('dsn/dashboard/penentuan-jadwal-pendadaran');
    }

    public function deleterequirementexam($id)
    {
        $this->M_requirement->delete('tb_requirements','id',$id);
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }

    public function publishrequirement($id)
    {
        $this->M_requirement->_SetData('tb_requirements', ['status' => "1"], 'id' ,$id);
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }

    public function unpublishrequirement($id)
    {
        $this->M_requirement->_SetData('tb_requirements', ['status' => "0"], 'id' ,$id);
        redirect(site_url('dsn/dashboard/syarat-pendadaran'));
    }
}