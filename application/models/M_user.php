<?php

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
  
    //PROCCESS LOGIN
    public function doLogin(){
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $this->db->where('email', $email);
        $sqla = $this->db->get('tb_lecturers')->row();

        $this->db->where('email', $email);
        $sqlb = $this->db->get('tb_student')->row();

        $this->db->where('email', $email);
        $sqlc = $this->db->get('tb_staff')->row();

        $this->db->where('email', $email);
        $sqld = $this->db->get('tb_administrator')->row();

        if ($sqla) {
            $passwordTrue = password_verify($pass, $sqla->password);
            if($passwordTrue && $sqla->role_id == "2"){
                $this->session->set_userdata('username',$sqla->username);
                $this->session->set_userdata('name',$sqla->fullname);
                $this->session->set_userdata('gender',$sqla->gender);
                $this->session->set_userdata('major',$sqla->id_major);
                $this->session->set_userdata('email',$sqla->email);
                $this->session->set_userdata('password',$sqla->password);
                $this->session->set_userdata('phone',$sqla->phone);
                $this->session->set_userdata('level',$sqla->role_id);
                $this->session->set_userdata('foto',$sqla->image);
                $this->session->set_userdata('active',$sqla->is_active);
                $this->session->set_userdata(['user_logged' => $sqla]);
                return $sqla;
            }elseif($passwordTrue && $sqla->role_id == "1"){
                $this->session->set_userdata('username',$sqla->username);
                $this->session->set_userdata('name',$sqla->fullname);
                $this->session->set_userdata('gender',$sqla->gender);
                $this->session->set_userdata('major',$sqla->id_major);
                $this->session->set_userdata('email',$sqla->email);
                $this->session->set_userdata('password',$sqla->password);
                $this->session->set_userdata('phone',$sqla->phone);
                $this->session->set_userdata('level',$sqla->role_id);
                $this->session->set_userdata('foto',$sqla->image);
                $this->session->set_userdata('active',$sqla->is_active);
                $this->session->set_userdata(['user_logged' => $sqla]);
                return $sqla;
            }else{
                echo "<alert>Username/password not found</alert>";
            }
        }elseif($sqlb) {
            $password = password_verify($pass, $sqlb->password);
            if($password && $sqlb->role_id == "4"){
                $this->session->set_userdata('username',$sqlb->username);
                $this->session->set_userdata('name',$sqlb->fullname);
                $this->session->set_userdata('gender',$sqlb->gender);
                $this->session->set_userdata('major',$sqlb->id_major);
                $this->session->set_userdata('class',$sqlb->class);
                $this->session->set_userdata('year',$sqlb->year);
                $this->session->set_userdata('city',$sqlb->city);
                $this->session->set_userdata('birthdate',$sqlb->birthdate);
                $this->session->set_userdata('address',$sqlb->address);
                $this->session->set_userdata('email',$sqlb->email);
                $this->session->set_userdata('password',$sqlb->password);
                $this->session->set_userdata('phone',$sqlb->phone);
                $this->session->set_userdata('level',$sqlb->role_id);
                $this->session->set_userdata('foto',$sqlb->image);
                $this->session->set_userdata('active',$sqlb->is_active);
                $this->session->set_userdata(['user_logged' => $sqlb]);
                return $sqlb;
            }else{
                echo "<alert>Username/password not found</alert>";
            }
        }elseif($sqlc) {
            $password = password_verify($pass, $sqlc->password);
            if($password && $sqlc->role_id == "3"){
                $this->session->set_userdata('username',$sqlc->username);
                $this->session->set_userdata('name',$sqlc->fullname);
                $this->session->set_userdata('gender',$sqlc->gender);
                $this->session->set_userdata('email',$sqlc->email);
                $this->session->set_userdata('password',$sqlc->password);
                $this->session->set_userdata('faculty',$sqlc->id_faculty);
                $this->session->set_userdata('phone',$sqlc->phone);
                $this->session->set_userdata('level',$sqlc->role_id);
                $this->session->set_userdata('foto',$sqlc->image);
                $this->session->set_userdata('active',$sqlc->is_active);
                $this->session->set_userdata(['user_logged' => $sqlc]);
                return $sqlc;
            }else{
                echo "<alert>Username/password not found</alert>";
            }
        }elseif($sqld) {
            $password = password_verify($pass, $sqld->password);
            if($password && $sqld->role_id == "5"){
                $this->session->set_userdata('username',$sqld->username);
                $this->session->set_userdata('name',$sqld->fullname);
                $this->session->set_userdata('gender',$sqld->gender);
                $this->session->set_userdata('major',$sqld->id_major);
                $this->session->set_userdata('email',$sqld->email);
                $this->session->set_userdata('password',$sqld->password);
                $this->session->set_userdata('faculty',$sqld->id_faculty);
                $this->session->set_userdata('phone',$sqld->phone);
                $this->session->set_userdata('level',$sqld->role_id);
                $this->session->set_userdata('foto',$sqld->image);
                $this->session->set_userdata('active',$sqld->is_active);
                $this->session->set_userdata(['user_logged' => $sqld]);
                return $sqld;
            }else{
                echo "<alert>Username/password not found</alert>";
            }
        }else{
            echo "<alert>You are not entitled to enter on this page</alert>";
        }
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function getAllStudent()
    {
        $id = $this->session->userdata('major');
        $this->db->select('*')
        ->where('id_major', $id)
        ->from('tb_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetSumPendadaran()
    {
        $id = $this->session->userdata('major');
        $this->db->select('*')
        ->where('id_major', $id)
        ->from('tb_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetSumYudisium()
    {
        $id = $this->session->userdata('major');
        $this->db->select('*')
        ->where('id_major', $id)
        ->from('tb_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function update($tabel, $array, $col, $id){
        $this->db->set($array);
        $this->db->where($col, $id);
        $query = $this->db->update($tabel);
        return $query;
    }

    public function GetSumSiswa()
    {
        $GetSumSiswa = $this->db->select('*')->from('tb_student')->get()->result();
        return $GetSumSiswa;
    }

    public function GetSumDosen()
    {
        $GetSumDosen = $this->db->select('*')->from('tb_lecturers')->get()->result();
        return $GetSumDosen;
    }

    public function GetSumTu()
    {
        $GetSumTu = $this->db->select('*')->from('tb_staff')->get()->result();
        return $GetSumTu;
    }

    public function GetSumFaculty()
    {
        $GetSumFaculty = $this->db->select('*')->from('tb_faculty')->get()->result();
        return $GetSumFaculty;
    }

    public function GetSumMajor()
    {
        $GetSumMajor = $this->db->select('*')->from('tb_major')->get()->result();
        return $GetSumMajor;
    }

    public function GetAnnouncement()
    {
        $GetAnn = $this->db->select('*')->from('tb_announcement')->get()->result();
        return $GetAnn;
    }

    public function GetDataSettingWeb()
    {
        $GetAnna = $this->db->select('*')->from('tb_settings')->get()->result();
        return $GetAnna;
    }

    public function GetAllDataThesisApproved()
    {
        $GetIdea = $this->db->select('*')->from('tb_ideasubmission')->get()->result();
        return $GetIdea;
    }
}