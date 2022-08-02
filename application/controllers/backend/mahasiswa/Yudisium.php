<?php
/**
 * 
 */
class Yudisium extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_student');
		$this->load->model('M_yudisium');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			'DataSyarat' => $this->M_yudisium->getRequirementYudisiumByStatus(),
			'DataStudent' => $this->M_yudisium->GetMyDatastudent(),
			'DataNilai' => $this->M_yudisium->GetNilaiAkhirForStudent()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/mahasiswa/yudisium/upload_syarat_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function SaveDokumenYudisium()
	{
		$username = $this->session->userdata('username');
        $id_syarat = $this->input->post('id_syarat');
		mkdir ('_uploads/yudisium/'.$this->session->userdata('name')); 
        $name =  $this->session->userdata('name');//nama file menggunakan nama mahasiswa
        $config['file_name'] = "$username-$name-Syarat-$id_syarat-".date("Y-d-m");
        $config['upload_path'] = '_uploads/yudisium/'.$this->session->userdata('name');
        $config['allowed_types'] = 'pdf|docx|xls|jpg|JPG|JPEG|jpeg|PNG|png|zip|rar';
        // $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $this->session->set_flashdata('msg',"Document cannot be empty");
            $this->session->set_flashdata('msg_class','alert-danger');
            redirect(site_url('mhs/dashboard/syarat-yudisium'));
        }else{
            $datae = array(
                'id_requirement' => $id_syarat,
                'nim' => $username,
                'major' => $this->session->userdata('major'),
                'file' => $this->upload->file_name
            );
            $dataNot = array(
                'pengirim' => $this->session->userdata('name'),
                'penerima' => "3",
                'pesan' => "Upload baru dokumen yudisium",
                'url' => "TU/dashboard/cek-dokumen-yudisium/".$username,
                'major' => $this->session->userdata('major'),
            );
            $this->db->insert('tb_notification', $dataNot);
            $this->M_yudisium->add('tb_uploadrequirementyudisium',$datae);
            $this->session->set_flashdata('msg',"Document has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/syarat-yudisium'));
        }
        redirect(site_url('mhs/dashboard/syarat-yudisium'));
	}

	public function DeleteDokumenYudisium($id)
	{
		$dt = $this->db->select('*')->where('id', $id)->from('tb_uploadrequirementyudisium')->get()->row();
        $path = '_uploads/yudisium/'.$this->session->userdata('name').'/'.$dt->file;
        unlink($path);
        $this->M_yudisium->delete('tb_uploadrequirementyudisium','id',$id);
        $this->session->set_flashdata('msg',"Delete Document successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('mhs/dashboard/syarat-yudisium'));
	}
}