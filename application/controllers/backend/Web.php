<?php
/**
 * 
 */
class Web extends CI_Controller
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
		$data = [
			'Data' => $this->M_user->GetDataSettingWeb()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/partials_/web', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function Plagiarisme()
	{
		$data = [
			'Data' => $this->M_user->GetAllDataThesisApproved(),
			'KeyPlag' => $this->M_user->GetAllDataThesisByKey_plag()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/admin/plagiarisme', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function PublishPlagiarisme($id)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_ideasubmission', ['key_plag' => "0"]);
		redirect(site_url('Web/Plagiarisme'));
	}

	public function UnpublishPlagiarisme($id)
	{
		$this->db->where('id', $id);
		$this->db->update('tb_ideasubmission', ['key_plag' => "1"]);
		redirect(site_url('Web/Plagiarisme'));
	}

	public function PublishAllProcessPlagiarisme()
	{
		$this->db->update('tb_ideasubmission', ['key_plag' => "0"]);
		redirect(site_url('Web/Plagiarisme'));
	}

	public function UnpublishAllProcessPlagiarisme()
	{
		$this->db->update('tb_ideasubmission', ['key_plag' => "1"]);
		redirect(site_url('Web/Plagiarisme'));
	}
}