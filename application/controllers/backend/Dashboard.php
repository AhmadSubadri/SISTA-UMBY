<?php
/**
 * 
 */
class Dashboard extends CI_Controller
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
            'data' => $this->M_student->getAllStudent()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/partials_/dashboard',$data);
        $this->load->view('backend/partials_/footer');
	}
}