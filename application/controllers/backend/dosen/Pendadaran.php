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
            $this->session->set_flashdata('msg',"Data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/syarat-pendadaran'));
        }
        $this->session->set_flashdata('msg',"Data has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');
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
            'DetailPenguji' => $this->M_examthesis->DetailPenguji($id)->result(),
            'MeanNilai' => $this->M_examthesis->MeanNilaiPendadaran($id)->result()
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

    public function UpdatePengujiPendadaran()
    {
        $nim = $this->input->post('nim');
        $penguji = $this->input->post('penguji');
        $this->M_examthesis->delete('tb_detail_pendadaran', 'nim', $nim);
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
        $this->session->set_flashdata('msg',"update Ploting examiner has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');

    return redirect('dsn/dashboard/penentuan-jadwal-pendadaran');
    }

    public function PelaksanaanPendadaran()
    {
        $data = [
            'DataPendadaran' => $this->M_examthesis->GetDataPendaranBypenguji()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/pelaksanaan_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function DetailPelaksanaanPendadaran($id)
    {
        $data = [
            'Data' => $this->M_examthesis->DetailPelaksanaanPendadaran($id),
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/pendadaran/detail_pelaksanaan_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function SaveFeedbackPendadaran()
    {
        $nim = $this->input->post('nim');
        $penguji = $this->session->userdata('username');
        $name =  $this->input->post('name');//nama file menggunakan nama mahasiswa
        mkdir ('_uploads/pendadaran/'.$name); 
        $config['file_name'] = "$nim-$name-Feedback-pendadaran-($this->session->userdata('username'))".date("Y-d-m");
        $config['upload_path'] = '_uploads/pendadaran/'.$name;
        $config['allowed_types'] = 'pdf|docx|xls';
        // $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $Data = array(
                'nilai' => $this->input->post('nilai'),
                'note' => $this->input->post('note'),
                'status' => $this->input->post('status')
            );
            $this->db->where('penguji', $penguji);
            $this->db->where('nim', $nim);
            $this->db->update('tb_detail_pendadaran', $Data);
            $this->M_examthesis->_SetData('tb_thesisreceived',['status_pendadaran'=>"1"], 'nim', $nim);
            $this->session->set_flashdata('msg',"Feedback of exam thesis not file has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/pelaksanaan-pendadaran'));
        }else{
            $datae = array(
                'nilai' => $this->input->post('nilai'),
                'note' => $this->input->post('note'),
                'status' => $this->input->post('status'),
                'file' => $this->upload->file_name
            );
            $this->db->where('penguji', $penguji);
            $this->db->where('nim', $nim);
            $this->db->update('tb_detail_pendadaran', $datae);
            $this->M_examthesis->_SetData('tb_thesisreceived',['status_pendadaran'=>"1"], 'nim', $nim);
            $this->session->set_flashdata('msg',"Feedback of exam thesis has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/pelaksanaan-pendadaran'));
        }
        redirect(site_url('dsn/dashboard/pelaksanaan-pendadaran'));
    }

    public function SavePengumumanPendadaran()
    {
        $nim = $this->input->post('nim');
        $Data = array(
            'avarage' => $this->input->post('nilaiangka'),
            'letter_value' => $this->input->post('nilaihuruf'),
            'catatan_akhir' => $this->input->post('note'),
            'pernyataan' => $this->input->post('hasilnyakan'),
            'status_pendadaran' => "2"
        );
        $this->db->insert('tb_notification', ['pengirim' => $this->session->userdata('name'), 'penerima' => $nim, 'pesan' => $this->input->post('note'), 'url' => "mhs/dashboard/pengumuman-pendadaran"]);
        $this->M_examthesis->_SetData('tb_thesisreceived',$Data, 'nim', $nim);
        $this->session->set_flashdata('msg',"Announcement of exam thesis has been added successfully no file");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/mahasiswa-pendadaran'));
    }

    public function deleterequirementexam($id)
    {
        $this->M_requirement->delete('tb_requirements','id',$id);
        $this->session->set_flashdata('msg',"Data has been delete successfully");
        $this->session->set_flashdata('msg_class','alert-success');
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