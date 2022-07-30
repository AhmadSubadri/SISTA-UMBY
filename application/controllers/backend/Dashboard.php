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
            'data' => $this->M_user->getAllStudent(),
            'Pendadaran' => $this->M_user->GetSumPendadaran(),
            'Yudisium' => $this->M_user->GetSumYudisium()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/partials_/dashboard',$data);
        $this->load->view('backend/partials_/footer');
	}

	public function UserProfile()
	{
		$this->load->view('backend/partials_/head');
        $this->load->view('backend/partials_/profile');
        $this->load->view('backend/partials_/footer');
	}

	public function SettingUserProfile()
	{
		$this->load->view('backend/partials_/head');
        $this->load->view('backend/partials_/setting_profile');
        $this->load->view('backend/partials_/footer');
	}

	public function UpdateProfile()
	{
		if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2){
			$config['file_name'] = $this->session->userdata('name');
	        $config['upload_path'] = '_uploads/profile/staff';
	        $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
	        // $config['max_size'] = 5000;
	        if($this->session->userdata('foto') != null){
	        	$path = '_uploads/profile/staff/'.$this->session->userdata('foto');
        		unlink($path);
	        	$this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datae = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_lecturers', $datae, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $dataa = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_lecturers', $dataa, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
	        }else{
	        	$this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datae = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_lecturers', $datae, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $dataa = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_lecturers', $dataa, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
	        }
		}elseif($this->session->userdata('level') == 3){
			$config['file_name'] = $this->session->userdata('name');
	        $config['upload_path'] = '_uploads/profile/staff';
	        $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
	        // $config['max_size'] = 5000;
	        if($this->session->userdata('foto') != null){
	        	$path = '_uploads/profile/staff/'.$this->session->userdata('foto');
        		unlink($path);
		        $this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datac = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_staff', $datac, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $datab = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_staff', $datab, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }else{
		    	$this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datac = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_staff', $datac, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $datab = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_staff', $datab, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }
		}elseif($this->session->userdata('level') == 4){
			$config['file_name'] = $this->session->userdata('name');
	        $config['upload_path'] = '_uploads/profile/student';
	        $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
	        // $config['max_size'] = 5000;
	        if($this->session->userdata('foto') != null){
	        	$path = '_uploads/profile/student/'.$this->session->userdata('foto');
        		unlink($path);
		        $this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datad = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_student', $datad, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $dataf = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_student', $dataf, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }else{
		    	$this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datad = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_student', $datad, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $dataf = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_student', $dataf, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }
		}else{
			$config['file_name'] = $this->session->userdata('name');
	        $config['upload_path'] = '_uploads/profile/staff';
	        $config['allowed_types'] = 'jpg|png|JPG|PNG|JPEG|jpeg';
	        // $config['max_size'] = 5000;
	        if($this->session->userdata('foto') != null){
	        	$path = '_uploads/profile/staff/'.$this->session->userdata('foto');
        		unlink($path);
		        $this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datag = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_administrator', $datag, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $datah = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_administrator', $datah, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }else{
		    	$this->load->library('upload', $config);
		        if(!$this->upload->do_upload('file')){
		           	$datag = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		            );
		            $this->M_user->update('tb_administrator', $datag, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }else{
		            $datah = array(
		                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
		                'fullname' => $this->input->post('nama'),
		                'email' => $this->input->post('email'),
		                'gender' => $this->input->post('gender'),
		                'phone' => $this->input->post('phone'),
		                'image' => $this->upload->file_name
		            );
		            $this->M_user->update('tb_administrator', $datah, 'username', $this->session->userdata('username'));
		            $this->session->set_flashdata('msg',"Update data profile has been added successfully");
		            $this->session->set_flashdata('msg_class','alert-success');
		            redirect(site_url('setting-profile'));
		        }
		    }
		}
	}
}