<?php
/**
 * 
 */
class Skripsi extends CI_Controller
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
		$username = $this->session->userdata('username');
		$major = $this->session->userdata('major');
		$data = [
			'DataDosen' => $this->M_student->GetDosenByMajor($major),
			'CountThesisAcc' => $this->M_student->_getsThesisReceived(),
			'DataUpload' => $this->M_student->getdatasubmission($username),
			'DataCard' => $this->M_student->getdataCaed($username)
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/mahasiswa/skripsi/skripsi', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function UploadPengajuan()
	{
		$detail = $this->db->get_where('tb_detail_sempro',['nim_student' => $this->input->post('nim')])->row();
		$notPenerima = $this->db->select('*')->where('id_major', $this->session->userdata('major'))->where('role_id', 1)->from('tb_lecturers')->get()->row();
		$this->db->select('title, nim');
		$this->db->where('nim', $this->input->post('nim'));
		$submisson = $this->db->get('tb_ideasubmission')->row();
		if($submisson->nim > 0){
			mkdir ('_uploads/submission/'.$this->input->post('name')); 
	        $name =  $this->input->post('name');//nama file menggunakan nama mahasiswa
	        $nim = $this->input->post('nim');
	        $config['file_name'] = "$nim-$name-".date("Y-d-m");
	        $config['upload_path'] = '_uploads/submission/'.$name;
	        $config['allowed_types'] = 'pdf|docx|xls';
	        // $config['max_size'] = 5000;
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload('file')){
	        	$error = array('error' => $this->upload->display_errors());
	        	redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi',$error));
	        }else{
	        	$data = array(
	        		// 'nim' => $nim,
	        		'title' => $this->input->post('title'),
	        		'nidn' => $this->input->post('nidn'),
	        		'status' => "0",
					'note' => " ",
					'to_check' => "0",
					'kegiatan' => "0",
					'tempat' => "0",
					'tanggal' => "0",
					'jam' => "0",
					'status_sempro' => "0",
	        		'id_major' => $this->input->post('major'),
	        		'file' => $this->upload->file_name
	        	);
	        	$this->db->where('nim', $nim);
        		$this->db->update('tb_ideasubmission', $data);
	        	$dataNot = array(
	                'pengirim' => $this->session->userdata('name'),
	                'penerima' => $notPenerima->username,
	                'pesan' => "Upload baru pengajuan judul dan proposal skripsi",
	                'url' => "dsn/dashboard/data-pengajuan-skripsi",
	                'major' => $this->session->userdata('major'),
	            );
	            $this->db->insert('tb_notification', $dataNot);
	        	if ($this->db->affected_rows() > 0) {
					if($detail->nim_student > 0){
						$this->M_student->delete('tb_detail_sempro','nim_student', $nim);
					}
					$this->session->set_flashdata('msg',"Submission of title & document has been added successfully");
            		$this->session->set_flashdata('msg_class','alert-success');
	        		redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi'));
	        	}
	        	redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi'));
	        }
		} else {
			mkdir ('_uploads/submission/'.$this->input->post('name')); 
	        $name =  $this->input->post('name');//nama file menggunakan nama mahasiswa
	        $nim = $this->input->post('nim');
	        $config['file_name'] = "$nim-$name";
	        $config['upload_path'] = '_uploads/submission/'.$name;
	        $config['allowed_types'] = 'pdf|docx|xls';
	        // $config['max_size'] = 5000;
	        $this->load->library('upload', $config);
	        if (!$this->upload->do_upload('file')){
	        	$error = array('error' => $this->upload->display_errors());
	        	redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi',$error));
	        }else{
	        	$data = array(
	        		'nim' => $nim,
	        		'title' => $this->input->post('title'),
	        		'nidn' => $this->input->post('nidn'),
	        		'status' => "0",
					'status' => "0",
					'note' => " ",
					'to_check' => "0",
					'kegiatan' => "0",
					'tempat' => "0",
					'tanggal' => "0",
					'jam' => "0",
					'status_sempro' => "0",
	        		'id_major' => $this->input->post('major'),
	        		'file' => $this->upload->file_name
	        	);
	        	$this->M_student->insertData('tb_ideasubmission',$data);
	        	$dataNota = array(
	                'pengirim' => $this->session->userdata('name'),
	                'penerima' => $notPenerima->username,
	                'pesan' => "Upload baru pengajuan judul dan proposal skripsi",
	                'url' => "dsn/dashboard/data-pengajuan-skripsi",
	                'major' => $this->session->userdata('major'),
	            );
	            $this->db->insert('tb_notification', $dataNota);
	        	if ($this->db->affected_rows() > 0) {
	        		$this->session->set_flashdata('msg',"Submission of title & document has been added successfully");
            		$this->session->set_flashdata('msg_class','alert-success');
	        		redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi'));
	        	}
	        	redirect(site_url('mhs/dashboard/pengajuan-judul-skripsi'));
	        }
		}
    }

    public function Sempro()
    {
    	$data = [
            'DataPengujiSempro' => $this->M_student->GetDataPengujiSempro(),
            'DataDataSempro' => $this->M_student->GetDataSempro(),
			'GetFeedbackSempro' => $this->M_student->GetFeedbackSempro()
        ];
    	$this->load->view('backend/partials_/head');
    	$this->load->view('backend/mahasiswa/skripsi/sempro', $data);
    	$this->load->view('backend/partials_/footer');
    }
}