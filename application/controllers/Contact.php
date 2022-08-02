<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
    }

	public function Index()
	{
		$data = [
			'contact' => $this->M_frontend->GetContact()
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/contact', $data);
		$this->load->view('frontend/partials_/footer');
	}

	public function Settings()
	{
		$this->load->view('backend/partials_/head');
        $this->load->view('backend/admin/contact');
        $this->load->view('backend/partials_/footer');
	}

	public function SaveContact()
	{
		$a = $this->db->select('*')->from('contact')->where('id', $this->input->post('id'))->get()->row();
		if(count($a) > 0){
			$data = [
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'fax' => $this->input->post('fax'),
				'maps' => $this->input->post('maps'),
				'phone' => $this->input->post('phone')
			];
			$this->db->set($data)->where('id', $this->input->post('id'))->update('contact');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('Contact/Settings'));
		}else{
			$datas = [
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'fax' => $this->input->post('fax'),
				'maps' => $this->input->post('maps'),
				'phone' => $this->input->post('phone')
			];
			$this->db->insert('contact', $datas);
			$this->session->set_flashdata('msg',"Insert data has been added successfully no file");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('Contact/Settings'));
		}
	}
}
