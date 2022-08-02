<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
    }
    
	public function Index()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/timeline');
		$this->load->view('frontend/partials_/footer');
	}
}