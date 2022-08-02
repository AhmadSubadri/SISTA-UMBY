<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
    }
    
	public function Index()
	{
		$data = [
			'konten' => $this->M_frontend->kontenAbout(),
			'icon' => $this->M_frontend->GetIcon(),
			'konlagi' => $this->M_frontend->GetContentwo()
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/about', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function Settings()
	{
		$this->load->view('backend/partials_/head');
        $this->load->view('backend/admin/about');
        $this->load->view('backend/partials_/footer');
	}

	public function SaveAbout()
	{
		$a = $this->db->select('*')->from('about')->where('id', $this->input->post('id'))->get()->row();
		if(count($a) > 0){
			$config['file_name'] = "About_image".date("Y-d-m");
	        $config['upload_path'] = '_uploads/frontend';
	        $config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('file')){
	        	$dataa = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'deskripsi' => $this->input->post('deskripsi')
				];
				$this->db->set($dataa)->where('id', $this->input->post('id'))->update('about');
				$this->session->set_flashdata('msg',"Update data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('About/Settings'));
	        }else{
	        	$path = '_uploads/frontend/'.$a->image;
        		unlink($path);
	        	$datab = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'image' => $this->upload->file_name
				];
				$this->db->set($datab)->where('id', $this->input->post('id'))->update('about');
				$this->session->set_flashdata('msg',"Update data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('About/Settings'));
	        }
	    }else{
	    	$config['file_name'] = "About_image".date("Y-d-m");
	        $config['upload_path'] = '_uploads/frontend';
	        $config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('file')){
	        	$datac = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'type' => "1",
					'deskripsi' => $this->input->post('deskripsi')
				];
				$this->db->insert('about', $datac);
				$this->session->set_flashdata('msg',"Insert data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('About/Settings'));
	        }else{
	        	$datad = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'type' => "1",
					'file' => $this->upload->file_name
				];
				$this->db->insert('about', $datad);
				$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('About/Settings'));
	        }
	    }
	}

	public function SaveIconContent()
	{
		$k = $this->db->select('*')->from('about')->where('id', $this->input->post('id'))->get()->row();
		if(count($k) > 0){
			$data = [
				'judul' => $this->input->post('judul'),
				'icon' => $this->input->post('icon'),
				'deskripsi' => $this->input->post('deskripsi')
			];
			$this->db->set($data)->where('id', $this->input->post('id'))->update('about');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('About/Settings'));
		}else{
			$datas = [
				'judul' => $this->input->post('judul'),
				'icon' => $this->input->post('icon'),
				'deskripsi' => $this->input->post('deskripsi'),
				'type' => "2"
			];
			$this->db->insert('about', $datas);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('About/Settings'));
		}
	}

	public function SaveAbout2()
	{
		$l = $this->db->select('*')->from('about')->where('id', $this->input->post('id'))->get()->row();
		if(count($l) > 0){
			$datadf = [
				'deskripsi' => $this->input->post('deskripsi')
			];
			$this->db->set($datadf)->where('id', $this->input->post('id'))->update('about');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('About/Settings'));
		}else{
			$dataqs = [
				'deskripsi' => $this->input->post('deskripsi'),
				'type' => "3"
			];
			$this->db->insert('about', $dataqs);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('About/Settings'));
		}
	}

	public function DeleteIcon($id)
	{
		$this->db->where('id', $id)->delete('about');
		$this->session->set_flashdata('msg',"Delete data has been added successfully no file");
	    $this->session->set_flashdata('msg_class','alert-success');
	    redirect(site_url('About/Settings'));
	}
}