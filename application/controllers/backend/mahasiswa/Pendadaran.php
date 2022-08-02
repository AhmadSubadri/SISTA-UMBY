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
            'DataSyarat' => $this->M_student->GetRequirementPendadaran(),
            'DataDokumenAkhir' => $this->M_student->GetDokumenAkhir()
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
        $config['allowed_types'] = 'pdf|docx|xls|jpg|JPG|JPEG|jpeg|PNG|png|zip|rar';
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
            $dataNot = array(
                'pengirim' => $this->session->userdata('name'),
                'penerima' => "3",
                'pesan' => "Upload baru dokumen pendadaran",
                'url' => "TU/dashboard/cek-dokumen-pendadaran/".$username,
                'major' => $this->session->userdata('major'),
            );
            $this->db->insert('tb_notification', $dataNot);
            $this->session->set_flashdata('msg',"Document has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/syarat-pendadaran'));
        }
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
	}

    public function UploadDokumenlaporanAkhir()
    {
        $username = $this->session->userdata('username');
        mkdir ('_uploads/laporanakhir/'.$this->session->userdata('name')); 
        $name =  $this->session->userdata('name');//nama file menggunakan nama mahasiswa
        $config['file_name'] = "$username-$name-Laporan akhir-".date("Y-d-m");
        $config['upload_path'] = '_uploads/laporanakhir/'.$this->session->userdata('name');
        $config['allowed_types'] = 'pdf|docx|xls|jpg|JPG|JPEG|jpeg|PNG|png|zip|rar';
        // $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            $this->session->set_flashdata('msg',"final report document cannot be empty");
            $this->session->set_flashdata('msg_class','alert-danger');
            redirect(site_url('mhs/dashboard/syarat-pendadaran'));
        }else{
            $this->M_student->_SetData('tb_thesisreceived', ['laporan_akhir' => $this->upload->file_name], 'nim', $username);
            $this->session->set_flashdata('msg',"final report document has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('mhs/dashboard/syarat-pendadaran'));
        }
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
    }

    public function Daftarpendadaransekarang($id)
    {
        $this->M_student->_SetData('tb_thesisreceived', ['status_daftar' => "1"], 'nim', $id);
        $this->session->set_flashdata('msg',"Thesis exam registration successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
    }

    public function deleteDocumentSyarat($id)
    {
        $dt = $this->db->select('*')->where('id', $id)->from('tb_uploadrequirementexam')->get()->row();
        $path = '_uploads/pendadaran/'.$this->session->userdata('name').'/'.$dt->file;
        unlink($path);
        $this->M_requirement->delete('tb_uploadrequirementexam','id',$id);
        $this->session->set_flashdata('msg',"Delete Document successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
    }

    public function deletedokumenlaporanakhir($id)
    {
        $da = $this->db->select('*')->where('id', $id)->from('tb_thesisreceived')->get()->row();
        $path = '_uploads/laporanakhir/'.$this->session->userdata('name').'/'.$da->laporan_akhir;
        unlink($path);
        $this->M_student->_SetData('tb_thesisreceived', ['laporan_akhir' => ""], 'id', $id);
        $this->session->set_flashdata('msg',"Delete Document successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('mhs/dashboard/syarat-pendadaran'));
    }

	public function JadwalPendadaran()
	{
		$data = [
            'DataJadwal' => $this->M_student->GetDokumenAkhir(),
            'DataPenguji' => $this->M_student->GetPengujidanHasil()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/jadwal_pendadaran',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function PengumumanPendadaran()
	{
		$data = [
            'status' => $this->M_student->GetHasilUjianPendadaran(),
            'DataPenguji' => $this->M_student->GetPengujidanHasil()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/mahasiswa/pendadaran/pengumuman_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
	}
}