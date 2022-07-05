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
        $this->load->model('M_bimbingan');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

    public function Index()
    {
        $data = [
            'Data' => $this->M_bimbingan->GetPembimbing(),
            'DataChat' => $this->M_bimbingan->_getDataGuidanceMhs(),
            'DataChatCard' => $this->M_bimbingan->_getDataGuidanceCardMhs(),
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/skripsi/bimbingan',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function GuidanceSave()
    {
        mkdir ('_uploads/guidance/'.$this->input->post('name')); 
        $name =  $this->input->post('name');//nama file menggunakan nama mahasiswa
        $nim = $this->input->post('receiver');
        $config['file_name'] = "$nim-$name-Laporan-".date("Y-d-m");
        $config['upload_path'] = '_uploads/guidance/'.$this->input->post('name');
        $config['allowed_types'] = 'pdf|docx|xls';
        // $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $data = array(
                'sender' => $this->input->post('sender'),
                'receiver' => $this->input->post('receiver'),
                'message' => $this->input->post('message'),
                // 'status' => $this->input->post('status')

            );
            $this->M_bimbingan->add('tb_guidance',$data);
            $this->session->set_flashdata('msg',"Feedback of guidance has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/Bimbingan'));
        }else{
            $datae = array(
                'sender' => $this->input->post('sender'),
                'receiver' => $this->input->post('receiver'),
                'message' => $this->input->post('message'),
                'file' => $this->upload->file_name
            );
            $this->M_bimbingan->add('tb_guidance',$datae);
            $this->session->set_flashdata('msg',"Feedback of guidance has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/Bimbingan'));
        }
        redirect(site_url('mhs/dashboard/Bimbingan'));
    }
}