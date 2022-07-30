<?php
/**
 * 
 */
class Daftaryudisium extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel','session'));
		$this->load->model('M_tatausaha');
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function DaftarYudisiumMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataMahasiswaByHasilPendadaran(),
			'DataJurusan' => $this->M_tatausaha->GetDataJurusan()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function DaftarkanYudisiumMahasiswa($nim)
	{
		$this->M_tatausaha->_SetData('tb_thesisreceived', ['status_daftar_yudisium' => "1"], 'nim' ,$nim);
		$this->session->set_flashdata('msg',"Data set has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('TU/dashboard/daftar-yudisium-mahasiswa'));

	}

	public function BatalkanDaftarkanYudisiumMahasiswa($nim)
	{
		$this->M_tatausaha->_SetData('tb_thesisreceived', ['status_daftar_yudisium' => "0"], 'nim' ,$nim);
		$this->session->set_flashdata('msg',"Data set has been update successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('TU/dashboard/daftar-yudisium-mahasiswa'));
	}

	public function ProgresYudisiumMahasiswa()
	{
		$data = [
			'DataSyarat' => $this->M_tatausaha->getRequirementYudisiumByStatus(),
            'DataStudent' => $this->M_tatausaha->GetDataMahasiswaByHasilPendadaran()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/progres_dokumen_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function CekDokumenYudisium($nim)
	{
		$data = [
			'DataMhs' => $this->M_tatausaha->GetMahasiswaByNIM($nim),
			'DataDokumen' => $this->M_tatausaha->GetDokumenByNIMYudisium($nim)
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/cek_dokumen_yudisium', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function KirimRevisiDokumenYudisium()
	{
		$dt = $this->db->select('*')->where('id', $this->input->post('id'))->from('tb_uploadrequirementyudisium')->get()->row();
        $path = '_uploads/yudisium/'.$this->input->post('namamhs').'/'.$dt->file;
        unlink($path);
        
		$data = array(
			'pengirim' => $this->input->post('pengirim'),
			'penerima' => $this->input->post('penerima'),
			'pesan' => $this->input->post('pesan')." Syarat yudisium",
			'url' => "mhs/dashboard/syarat-yudisium",
		);
		$this->db->insert('tb_notification', $data);
		$this->db->where('id', $this->input->post('id'))->delete('tb_uploadrequirementyudisium');
		$this->session->set_flashdata('msg',"Revision document yudisium has been send successfully");
        $this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('TU/dashboard/cek-dokumen-yudisium/'.$this->input->post('penerima')));
	}

	public function ApprovedDokumenYudisium()
	{
		$ss = $this->db->set('status', "1")->where('id', $this->input->post('id'))->update('tb_uploadrequirementyudisium');
		echo json_encode($ss);
	}
}