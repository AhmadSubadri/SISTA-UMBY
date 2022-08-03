<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_frontend');
	}

	public function Index()
	{
		$data = [
			'Data' => $this->M_frontend->GetDownload(),
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/download', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function DataDownload()
	{
		$data = [
			'Data' => $this->M_frontend->GetDownload()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/admin/download', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function SaveDownload()
	{
		$namaFile = uniqid('Download_');
		$config['file_name'] = "$namaFile - ".date("Y-d-m");
		$config['upload_path'] = '_uploads/download';
		$config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$dataa = [
				'uploader' => $this->input->post('pengupload'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('announcement'),
			];
			$this->db->insert('tb_download', $dataa);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Download/data-download'));
		}else{
			$datab = [
				'uploader' => $this->input->post('pengupload'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('announcement'),
				'file' => $this->upload->file_name
			];
			$this->db->insert('tb_download', $datab);
			$this->session->set_flashdata('msg',"Insert data has been added successfully");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Download/data-download'));
		}
	}

	public function UpdateDownload($id)
	{
		$b = $this->db->select('*')->from('tb_download')->where('id', $id)->get()->row();
		$namaFilea = uniqid('Download_');
		$config['file_name'] = "$namaFilea - ".date("Y-d-m");
		$config['upload_path'] = '_uploads/download';
		$config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$dataaaa = [
				'uploader' => $this->input->post('pengupload'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('announcement'),
			];
			$this->db->set($dataaaa)->where('id', $id)->update('tb_download');
			$this->session->set_flashdata('msg',"Update data has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Download/data-download'));
		}else{
			$path = '_uploads/download/'.$b->file;
			unlink($path);
			$databbb = [
				'uploader' => $this->input->post('pengupload'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('announcement'),
				'file' => $this->upload->file_name
			];
			$this->db->set($databbb)->where('id', $id)->update('tb_download');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Download/data-download'));
		}
	}

	public function DeleteDownload($id)
	{
		$af = $this->db->select('*')->from('tb_download')->where('id',$id)->get()->row();
		$patshdf = '_uploads/download/'.$af->file;
		unlink($patshdf);
		$this->db->where('id', $id)->delete('tb_download');
		$this->session->set_flashdata('msg',"Delete data has been added successfully");
		$this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('Download/data-download'));
	}

	public function search()
	{
		$data = [
			'Data' => $this->M_frontend->GetDownload(),
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/search', $data);
		$this->load->view('frontend/partials_/footer');
	}

	// public function search()
	// {
	// 	$this->load->view('frontend/partials_/head');
	// 	$this->load->view('frontend/content/download');
	// 	$this->load->view('frontend/partials_/footer');
	// 	// $keyword = $this->input->post('keyword');
	// 	// $dataa = [
	// 	// 	'Data' => $this->M_frontend->search($this->input->post('keyword'))
	// 	// ];
	// 	// $this->load->view('frontend/partials_/head');
	// 	// $this->load->view('frontend/content/search', $dataa);
	// 	// $this->load->view('frontend/partials_/footer');
	// }
}