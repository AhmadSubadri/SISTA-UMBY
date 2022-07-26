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
}