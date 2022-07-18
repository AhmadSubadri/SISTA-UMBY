<?php
/**
 * 
 */
class Index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('excel','session'));
		$this->load->model('M_tatausaha');
		$this->load->model('M_user');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function GetDataMahasiswa()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataMahasiswa()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function GetDataDosen()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataDosen()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_dosen', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function ImportDataDosen()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$nidn = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$password = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$level = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$temp_data[] = array(
						'username'	=> $nidn,
						'fullname'	=> $nama,
						'email'	=> $email,
						'password'	=> password_hash($password, PASSWORD_BCRYPT),
						'id_major' => $jurusan,
						'role_id'	=> $level
					); 	
				}
			}
			$insert = $this->M_tatausaha->add('tb_lecturers', $temp_data);
			if($insert){
				$this->session->set_flashdata('msg',"Import has been added successfully");
            	$this->session->set_flashdata('msg_class','alert-success');
				redirect(site_url('TU/dashboard/data-dosen'));
			}else{
				$this->session->set_flashdata('msg',"Import has been added failed");
            	$this->session->set_flashdata('msg_class','alert-danger');
				redirect(site_url('TU/dashboard/data-dosen'));
			}
		}else{
			$this->session->set_flashdata('msg',"No files uploaded");
            $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-dosen'));
		}
	}

	public function ExportFormatDosen()
	{
		force_download('_uploads/format_excel/FormatDosen.xlsx', NULL);
	}

	public function ExportFormatMahasiswa()
	{
		force_download('_uploads/format_excel/FormatMahasiswa.xlsx', NULL);
	}
}
