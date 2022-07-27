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
		$this->load->model('M_umum');
		$this->load->model('M_examthesis');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			'DataPendadaran' => $this->M_umum->GetDataPendaranBypenguji()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/umum/pendadaran', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function SaveFeedbackPendadaranUmum()
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
            redirect(site_url('dsn/dashboard/data-mahasiswa-pendadaran'));
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
            redirect(site_url('dsn/dashboard/data-mahasiswa-pendadaran'));
        }
        redirect(site_url('dsn/dashboard/data-mahasiswa-pendadaran'));
    }

	public function DetailPelaksanaanPendadaranUmum($id){
		$data = [
            'Data' => $this->M_examthesis->DetailPelaksanaanPendadaran($id),
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/umum/proses_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
	}
}