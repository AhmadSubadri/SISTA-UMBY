<?php
/**
 * 
 */
class Timeline extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_tatausaha');
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
		$data = [
			'major' => $this->M_tatausaha->GetMajorByFaculty(),
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/timeline/index', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function InsertTimeLine()
	{
	    $i = 0; // untuk loopingn
	    $a = $this->input->post('judul');
	    $b = $this->input->post('keterangan');
	    $c = $this->input->post('start');
	    $d = $this->input->post('end');
	    $e = $this->input->post('major');
	    if ($a[0] !== null) {
	    	foreach ($a as $row) {
	    		$datasd = [
	    			'judul'=>$row,
	    			'start_date'=>$c[$i],
	    			'end_date'=>$d[$i],
	    			'konten'=>$b[$i],
	    			'major'=>$e
	    		];
	    		$insert = $this->db->insert('tb_timeline', $datasd);
	    		if ($insert) {
	    			$i++;
	    		}
	    	}
	    	$this->session->set_flashdata('msg',"Insert Data has been added successfully");
	    	$this->session->set_flashdata('msg_class','alert-success');
	    	redirect(site_url('TU/dashboard/timeline'));
	    }
	    $this->session->set_flashdata('msg',"Insert Data has been added successfully");
	    $this->session->set_flashdata('msg_class','alert-success');
	    redirect(site_url('TU/dashboard/timeline'));
	}

	public function UpdateTimelineById()
	{
		$datasda = [
			'judul'=>$this->input->post('judul'),
			'start_date'=>$this->input->post('start'),
			'end_date'=>$this->input->post('end'),
			'konten'=>$this->input->post('keterangan'),
		];

		$this->db->set($datasda)->where('id', $this->input->post('id'))->update('tb_timeline');
			$this->session->set_flashdata('msg',"Update data has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('TU/dashboard/timeline'));
	}

	public function DeleteTimelineById($id)
	{
		$this->db->where('id', $id)->delete('tb_timeline');
		$this->session->set_flashdata('msg',"Delete data has been added successfully");
		$this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('TU/dashboard/timeline'));
	}
}