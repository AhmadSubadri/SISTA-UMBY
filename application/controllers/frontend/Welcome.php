<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/index');
		$this->load->view('frontend/partials_/footer');
	}

	public function About()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/about');
		$this->load->view('frontend/partials_/footer');
	}

	public function Timeline()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/timeline');
		$this->load->view('frontend/partials_/footer');
	}

	public function Announcement()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/announcement');
		$this->load->view('frontend/partials_/footer');
	}

	public function Download()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/download');
		$this->load->view('frontend/partials_/footer');
	}

	public function Contact()
	{
		$this->load->view('frontend/partials_/head');
		$this->load->view('frontend/content/contact');
		$this->load->view('frontend/partials_/footer');
	}
}
