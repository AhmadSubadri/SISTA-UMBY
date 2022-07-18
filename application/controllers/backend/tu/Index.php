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
			'Data' => $this->M_tatausaha->GetDataMahasiswa(),
			'DataJurusan' => $this->M_tatausaha->GetDataJurusan()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/tu/data_mahasiswa', $data);
		$this->load->view('backend/partials_/footer');
	}

	public function GetDataDosen()
	{
		$data = [
			'Data' => $this->M_tatausaha->GetDataDosen(),
			'DataJurusan' => $this->M_tatausaha->GetDataJurusan()
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
				$this->session->set_flashdata('msg',"Import file lecturer has been added successfully");
            	$this->session->set_flashdata('msg_class','alert-success');
				redirect(site_url('TU/dashboard/data-dosen'));
			}else{
				$this->session->set_flashdata('msg',"Import file lecturer has been added failed");
            	$this->session->set_flashdata('msg_class','alert-danger');
				redirect(site_url('TU/dashboard/data-dosen'));
			}
		}else{
			$this->session->set_flashdata('msg',"No files uploaded");
            $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-dosen'));
		}
	}

	public function ImportDataMahasiswa()
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
					$nim = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$password = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$class = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$role = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$temp_data[] = array(
						'username'	=> $nim,
						'fullname'	=> $nama,
						'email'	=> $email,
						'password'	=> password_hash($password, PASSWORD_BCRYPT),
						'id_major' => $jurusan,
						'class' => $class,
						'role_id'	=> $role
					);
				}
			}
			$insert = $this->M_tatausaha->add('tb_student',$temp_data);
			if($insert){
				$this->session->set_flashdata('msg',"Import file lecturer has been added successfully");
            	$this->session->set_flashdata('msg_class','alert-success');
				redirect(site_url('TU/dashboard/data-mahasiswa'));
			}else{
				$this->session->set_flashdata('msg',"Import file lecturer has been added failed");
            	$this->session->set_flashdata('msg_class','alert-danger');
				redirect(site_url('TU/dashboard/data-mahasiswa'));
			}
		}else{
			$this->session->set_flashdata('msg',"No files uploaded");
            $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-mahasiswa'));
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

	public function DeleteDataDosen($id)
	{
		$this->M_tatausaha->delete('tb_lecturers', 'id', $id);
		$this->session->set_flashdata('msg',"Delete data lecturer has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('TU/dashboard/data-dosen'));
	}

	public function DeleteDataMahasiswa($id)
	{
		$this->M_tatausaha->delete('tb_student', 'id', $id);
		$this->session->set_flashdata('msg',"Delete data student has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');
		redirect(site_url('TU/dashboard/data-mahasiswa'));
	}

	public function InsertDataDosenMaster()
	{
		$dataa = array(
			'username' => $this->input->post('nidn'),
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('nidn'), PASSWORD_BCRYPT),
			'id_major' => $this->input->post('major'),
			'role_id' => $this->input->post('level'),
		);
		$insert = $this->M_tatausaha->save('tb_lecturers', $dataa);
		if($insert){
			$this->session->set_flashdata('msg',"Insert data lecturer has been added successfully");
	        $this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('TU/dashboard/data-dosen'));
		}else{
			$this->session->set_flashdata('msg',"Insert data lecturer has been added failed");
	        $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-dosen'));
		}
	}

	public function UpdateDataDosenMaster($nidn)
	{
		$dataa = array(
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('nidn'), PASSWORD_BCRYPT),
			'id_major' => $this->input->post('major'),
			'role_id' => $this->input->post('level'),
		);
		$update = $this->M_tatausaha->update('tb_lecturers', $dataa, 'username', $nidn);
		if($update){
			$this->session->set_flashdata('msg',"Update data lecturer has been added successfully");
	        $this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('TU/dashboard/data-dosen'));
		}else{
			$this->session->set_flashdata('msg',"Update data lecturer has been added failed");
	        $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-dosen'));
		}
	}

	public function InsertDataMahasiswaMaster()
	{
		$data = array(
			'username' => $this->input->post('nim'),
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('nim'), PASSWORD_BCRYPT),
			'id_major' => $this->input->post('major'),
			'role_id' => "4",
			'class' => $this->input->post('Angkatan')
		);
		$insert = $this->M_tatausaha->save('tb_student', $data);
		if($insert){
			$this->session->set_flashdata('msg',"Insert data student has been added successfully");
	        $this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('TU/dashboard/data-mahasiswa'));
		}else{
			$this->session->set_flashdata('msg',"Insert data student has been added failed");
	        $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-mahasiswa'));
		}
	}

	public function UpdateDataMahasiswaMaster($nim)
	{
		$data = array(
			'fullname' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('nim'), PASSWORD_BCRYPT),
			'id_major' => $this->input->post('major'),
			'role_id' => "4",
			'class' => $this->input->post('Angkatan')
		);
		$update = $this->M_tatausaha->update('tb_student', $data, 'username', $nim);
		if($update){
			$this->session->set_flashdata('msg',"Update data student has been added successfully");
	        $this->session->set_flashdata('msg_class','alert-success');
			redirect(site_url('TU/dashboard/data-mahasiswa'));
		}else{
			$this->session->set_flashdata('msg',"Update data student has been added failed");
	        $this->session->set_flashdata('msg_class','alert-danger');
			redirect(site_url('TU/dashboard/data-mahasiswa'));
		}
	}
}
