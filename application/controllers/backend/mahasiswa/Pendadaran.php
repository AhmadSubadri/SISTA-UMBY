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
        $this->load->model('M_bimbingan');
        $this->load->model('M_requirement');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
            'Data' => $this->M_student->checkstatusBimbingan(),
            'DataSyarat' => $this->M_student->GetRequirementPendadaran()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/index',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function UploadDokumenPendadaran()
	{
		$username = $this->session->userdata('username');
		$id_syarat = $this->input->post('id_syarat');
		mkdir ('_uploads/pendadaran/'.$this->session->userdata('name')); 
        $name =  $this->session->userdata('name');//nama file menggunakan nama mahasiswa
        $config['file_name'] = "$username-$name-Syarat-$id_syarat-".date("Y-d-m");
        $config['upload_path'] = '_uploads/pendadaran/'.$this->session->userdata('name');
        $config['allowed_types'] = 'pdf|docx|xls';
        // $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $this->session->set_flashdata('msg',"Document cannot be empty");
            $this->session->set_flashdata('msg_class','alert-danger');
            redirect(site_url('mhs/dashboard/syarat-pendadaran'));
        }else{
            $datae = array(
                'id_requirement' => $id_syarat,
                'nim' => $username,
                'major' => $this->session->userdata('major'),
                'file' => $this->upload->file_name
            );
            $this->M_bimbingan->add('tb_uploadrequirementexam',$datae);
            $this->session->set_flashdata('msg',"Document has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/syarat-pendadaran'));
        }
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
	}

    public function deleteDocumentSyarat($id)
    {
        $dt = $this->db->select('*')->where('id', $id)->from('tb_uploadrequirementexam')->get()->row();
        $path = '_uploads/pendadaran/'.$this->session->userdata('name').'/'.$dt->file;
        unlink($path);
        $this->M_requirement->delete('tb_uploadrequirementexam','id',$id);
        $this->session->set_flashdata('msg',"Delete Document successfully");
        $this->session->set_flashdata('msg_class','alert-danger');
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
    }

	public function JadwalPendadaran()
	{
		$data = [
            
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/jadwal_pendadaran',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function PengumumanPendadaran()
	{
		$data = [
            
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/pengumuman_pendadaran',$data);
        $this->load->view('backend/partials_/footer');
	}
}