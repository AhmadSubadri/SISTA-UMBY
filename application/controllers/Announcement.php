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
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/announcement');
		$this->load->view('frontend/partials_/footer');
	}
}