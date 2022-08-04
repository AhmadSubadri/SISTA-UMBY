<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirement extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_frontend');
    }

	public function Index()
	{
		$data = [
			'Faculty' => $this->M_frontend->Faculty()
		];
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/requirement', $data);
		$this->load->view('frontend/partials_/footer');
	}

}