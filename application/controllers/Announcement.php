<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_frontend');
	}

	public function Index()
	{
		$data = [
			'Data' => $this->M_frontend->GetAnnouncement()
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/announcement', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function DataAnnouncement()
	{
		$data = [
			'Data' => $this->M_frontend->GetAnnouncement()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/announcement/index', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function SaveAnnouncement()
	{
		$namaFile = uniqid('Announcement_');
		$config['file_name'] = "$namaFile - ".date("Y-d-m");
		$config['upload_path'] = '_uploads/announcement';
		$config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$dataa = [
				'pengupload' => $this->input->post('pengupload'),
				'title' => $this->input->post('judul'),
				'description' => $this->input->post('announcement'),
			];
			$this->db->insert('tb_announcement', $dataa);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Announcement/data-announcement'));
		}else{
			$datab = [
				'pengupload' => $this->input->post('pengupload'),
				'title' => $this->input->post('judul'),
				'description' => $this->input->post('announcement'),
				'file' => $this->upload->file_name
			];
			$this->db->insert('tb_announcement', $datab);
			$this->session->set_flashdata('msg',"Insert data has been added successfully");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Announcement/data-announcement'));
		}
	}

	public function UpdateAnnouncement($id)
	{
		$b = $this->db->select('*')->from('tb_announcement')->where('id', $id)->get()->row();
		$namaFile = uniqid('Announcement_');
		$config['file_name'] = "$namaFile - ".date("Y-d-m");
		$config['upload_path'] = '_uploads/announcement';
		$config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload('file')){
			$dataaa = [
				'pengupload' => $this->input->post('pengupload'),
				'title' => $this->input->post('judul'),
				'description' => $this->input->post('announcement'),
			];
			$this->db->set($dataaa)->where('id', $id)->update('tb_announcement');
			$this->session->set_flashdata('msg',"Update data has been added successfully no file");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Announcement/data-announcement'));
		}else{
			$path = '_uploads/announcement/'.$b->file;
        	unlink($path);
			$databb = [
				'pengupload' => $this->input->post('pengupload'),
				'title' => $this->input->post('judul'),
				'description' => $this->input->post('announcement'),
				'file' => $this->upload->file_name
			];
			$this->db->set($databb)->where('id', $id)->update('tb_announcement');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
			$this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('Announcement/data-announcement'));
		}
	}

	public function DeleteAnnouncement($id)
	{
		$a = $this->db->select('*')->from('tb_announcement')->where('id',$id)->get()->row();
		$patshd = '_uploads/announcement/'.$a->file;
        unlink($patshd);
		$this->db->where('id', $id)->delete('tb_announcement');
		$this->session->set_flashdata('msg',"Delete data has been added successfully");
	    $this->session->set_flashdata('msg_class','alert-success');
	    redirect(site_url('Announcement/data-announcement'));
	}

	public function SearchAnnouncement()
	{
		$data = [
			'Data' => $this->M_frontend->searchDataAnn($this->input->get('keyword')),
			'keyword' => $this->input->get('keyword')
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/search_announcement', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function DetailAnnouncement($id)
	{
		$datad = [
			'Data' => $this->db->select('*')->where('id', $id)->from('tb_announcement')->get()->result()
		];
	    $this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/detail_announcement', $datad);
		$this->load->view('frontend/partials_/footer');
	}
}