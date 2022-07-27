<?php
/**
 * 
 */
class Daftarpendadaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel','session'));
		$this->load->model('M_tatausaha');
		$this->load->model('M_examthesis');
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function DaftarPendadaranMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataByDaftarpendadaran(),
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa_pendadaran', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function CekDokumenPendadaran($nim)
	{
		$data = [
			'DataMhs' => $this->M_tatausaha->GetMahasiswaByNIM($nim),
			'DataDokumen' => $this->M_tatausaha->GetDokumenByNIM($nim)
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/cek_dokumen_pendadaran', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function ApprovedDokumen()
	{
		$ss = $this->db->set('status', "1")->where('id', $this->input->post('id'))->update('tb_uploadrequirementexam');
		echo json_encode($ss);
	}

	public function KirimRevisiDokumen()
	{
		$dt = $this->db->select('*')->where('id', $this->input->post('id'))->from('tb_uploadrequirementexam')->get()->row();
        $path = '_uploads/pendadaran/'.$this->input->post('namamhs').'/'.$dt->file;
        unlink($path);
        
		$data = array(
			'pengirim' => $this->input->post('pengirim'),
			'penerima' => $this->input->post('penerima'),
			'pesan' => $this->input->post('pesan'),
			'url' => "mhs/dashboard/syarat-pendadaran",
		);
		$this->db->insert('tb_notification', $data);
		$this->db->where('id', $this->input->post('id'))->delete('tb_uploadrequirementexam');
		$this->session->set_flashdata('msg',"Revision document has been send successfully");
        $this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('TU/dashboard/cek-dokumen-pendadaran/'.$this->input->post('penerima')));
	}

	public function DeleteByIdNotif()
	{
		$arr = $this->db->where('id', $this->input->post('id'))->delete('tb_notification');
		echo json_encode($arr);
	}

	public function DaftarkanMahasiswaIni()
	{
		$arr = $this->db->set('status_daftar', "2")->where('nim', $this->input->post('id'))->update('tb_thesisreceived');
		echo json_encode($arr);
	}

	public function BatalkanDaftarkanPendadaranMahasiswa($nim)
	{
		$this->M_tatausaha->_SetData('tb_thesisreceived', ['status_daftar' => "1"], 'nim' ,$nim);
		$this->session->set_flashdata('msg',"Data set has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('TU/dashboard/daftar-pendadaran-mahasiswa'));
	}

	public function HasilPendadaran()
	{
		 $data = [
            'Data' => $this->M_tatausaha->GetDataHasilPendadaran()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/tu/data_hasil_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
	}

	public function DetailHasilPendadaran($id)
	{
		 $data = [
            'Data' => $this->M_examthesis->DetailDataPendadaran($id),
            'DetailPenguji' => $this->M_examthesis->DetailPenguji($id)->result(),
            'MeanNilai' => $this->M_examthesis->MeanNilaiPendadaran($id)->result()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/tu/detail_hasil_pendadaran', $data);
        $this->load->view('backend/partials_/footer');
	}

	public function SavePengumumanPendadaranTU()
	{
		if($this->input->post('status') == 1){
			$nim = $this->input->post('nim');
	        $Data = array(
	            'status_pendadaran' => "4",
	            'hasil_pendadaran' => $this->input->post('status'),
	            'catatan_akhir' => $this->input->post('note')
	        );
	        $this->db->insert('tb_notification', ['pengirim' => $this->session->userdata('name'), 'penerima' => $nim, 'pesan' => $this->input->post('note'), 'url' => "mhs/dashboard/pengumuman-pendadaran"]);
	        $this->M_examthesis->_SetData('tb_thesisreceived',$Data, 'nim', $nim);
			$this->session->set_flashdata('msg',"Announcement of exam thesis has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
	        redirect(site_url('TU/dashboard/hasil-pendadaran'));
		}elseif($this->input->post('status') == 3){
			$nim = $this->input->post('nim');
	        $Data = array(
	            'status_pendadaran' => "3",
	            'hasil_pendadaran' => $this->input->post('status'),
	            'catatan_akhir' => $this->input->post('note')
	        );
	        $this->db->insert('tb_notification', ['pengirim' => $this->session->userdata('name'), 'penerima' => $nim, 'pesan' => $this->input->post('note'), 'url' => "mhs/dashboard/pengumuman-pendadaran"]);
	        $this->M_examthesis->_SetData('tb_thesisreceived',$Data, 'nim', $nim);
			$this->session->set_flashdata('msg',"Announcement of exam thesis has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
	        redirect(site_url('TU/dashboard/hasil-pendadaran'));
		}else{
			$nim = $this->input->post('nim');
	        $Data = array(
	            'status_pendadaran' => "2",
	            'hasil_pendadaran' => $this->input->post('status'),
	            'catatan_akhir' => $this->input->post('note')
	        );
	        $this->db->insert('tb_notification', ['pengirim' => $this->session->userdata('name'), 'penerima' => $nim, 'pesan' => $this->input->post('note'), 'url' => "mhs/dashboard/pengumuman-pendadaran"]);
	        $this->M_examthesis->_SetData('tb_thesisreceived',$Data, 'nim', $nim);
			$this->session->set_flashdata('msg',"Announcement of exam thesis has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
	        redirect(site_url('TU/dashboard/hasil-pendadaran'));
		}
	}
}