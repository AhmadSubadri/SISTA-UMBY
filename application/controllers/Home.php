<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
    }

	public function Index()
	{
		$data = [
			'HeroSection' => $this->M_frontend->HeroSection(),
			'Calender' => $this->M_frontend->CalendarAcademic(),
			'Testimoni' => $this->M_frontend->Testimoni()
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/index', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function Settings()
	{
		$this->load->view('backend/partials_/head');
        $this->load->view('backend/admin/home');
        $this->load->view('backend/partials_/footer');
	}

	public function SaveHeroSection()
	{
		$k = $this->db->select('*')->from('home')->where('id', $this->input->post('id'))->get()->row();
		if(count($k) > 0){
			$data = [
				'judul' => $this->input->post('judul_hitam'),
				'judul_biru' => $this->input->post('judul_biru'),
				'sub_judul' => $this->input->post('sub_judul')
			];
			$this->db->set($data)->where('id', $this->input->post('id'))->update('home');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('Home/Settings'));
		}else{
			$datas = [
				'judul' => $this->input->post('judul_hitam'),
				'judul_biru' => $this->input->post('judul_biru'),
				'sub_judul' => $this->input->post('sub_judul'),
				'type' => "1"
			];
			$this->db->insert('home', $datas);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('Home/Settings'));
		}
	}

	public function SaveCalendarAcademic()
	{
		$a = $this->db->select('*')->from('home')->where('id', $this->input->post('id'))->get()->row();
		if(count($a) > 0){
			$config['file_name'] = "Calendar_academic_".date("Y-d-m");
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
				$this->db->set($dataa)->where('id', $this->input->post('id'))->update('home');
				$this->session->set_flashdata('msg',"Update data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }else{
	        	$path = '_uploads/frontend/'.$a->file;
        		unlink($path);
	        	$datab = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'file' => $this->upload->file_name
				];
				$this->db->set($datab)->where('id', $this->input->post('id'))->update('home');
				$this->session->set_flashdata('msg',"Update data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }
	    }else{
	    	$config['file_name'] = "Calendar_academic_".date("Y-d-m");
	        $config['upload_path'] = '_uploads/frontend';
	        $config['allowed_types'] = 'pdf|jpg|JPG|PNG|png|jpeg|JPEG';
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('file')){
	        	$datac = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'type' => "2",
					'deskripsi' => $this->input->post('deskripsi')
				];
				$this->db->insert('home', $datac);
				$this->session->set_flashdata('msg',"Insert data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }else{
	        	$datad = [
					'judul' => $this->input->post('judul_hitam'),
					'judul_biru' => $this->input->post('judul_biru'),
					'sub_judul' => $this->input->post('sub_judul'),
					'deskripsi' => $this->input->post('deskripsi'),
					'type' => "2",
					'file' => $this->upload->file_name
				];
				$this->db->insert('home', $datad);
				$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }
	    }
	}

	public function SaveTestimoni()
	{
		$b = $this->db->select('*')->from('home')->where('id', $this->input->post('id'))->get()->row();
		if(count($b) > 0){
			$config['file_name'] = $this->input->post('nama')." Testimoni ".date("Y-d-m");
	        $config['upload_path'] = '_uploads/frontend';
	        $config['allowed_types'] = 'jpg|JPG|PNG|png|jpeg|JPEG';
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('file')){
	        	$datad = [
					'nama' => $this->input->post('nama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'testimoni' => $this->input->post('testi')
				];
				$this->db->set($datad)->where('id', $this->input->post('id'))->update('home');
				$this->session->set_flashdata('msg',"Update data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }else{
	        	$path = '_uploads/frontend/'.$b->image;
        		unlink($path);
	        	$datae = [
					'nama' => $this->input->post('nama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'testimoni' => $this->input->post('testi'),
					'image' => $this->upload->file_name
				];
				$this->db->set($datae)->where('id', $this->input->post('id'))->update('home');
				$this->session->set_flashdata('msg',"Update data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }
	    }else{
	    	$config['file_name'] = $this->input->post('nama')." Testimoni ".date("Y-d-m");
	        $config['upload_path'] = '_uploads/frontend';
	        $config['allowed_types'] = 'jpg|JPG|PNG|png|jpeg|JPEG';
	        $this->load->library('upload', $config);
	        if(!$this->upload->do_upload('file')){
	        	$dataf = [
					'nama' => $this->input->post('nama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'testimoni' => $this->input->post('testi'),
					'type' => "3",
				];
				$this->db->insert('home', $dataf);
				$this->session->set_flashdata('msg',"Insert data has been added successfully");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }else{
	        	$datag = [
					'nama' => $this->input->post('nama'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'testimoni' => $this->input->post('testi'),
					'type' => "3",
					'image' => $this->upload->file_name
				];
				$this->db->insert('home', $datag);
				$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
	            $this->session->set_flashdata('msg_class','alert-success');
	            redirect(site_url('Home/Settings'));
	        }
	    }
	}

	public function DeleteTestimoni($id)
	{
		$m = $this->db->select('*')->from('home')->where('id', $id)->get()->row();
		$path = '_uploads/frontend/'.$m->image;
       	unlink($path);
		$this->db->where('id', $id)->delete('home');
		$this->session->set_flashdata('msg',"Delete data has been added successfully no file");
	    $this->session->set_flashdata('msg_class','alert-success');
	    redirect(site_url('Home/Settings'));
	}
}