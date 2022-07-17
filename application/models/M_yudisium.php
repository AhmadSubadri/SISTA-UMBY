<?php

class M_yudisium extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRequirementYudisium()
    {
        $major = $this->session->userdata('major');
        $this->db->select('*')
        ->where('type', "2")
        ->where('major', $major)
        ->from('tb_requirements');
        $query = $this->db->get();
        return $query;
    }

    public function GetNilaiAkhirpendadaran()
    {
        $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image, t.avarage, t.letter_value, t.status_daftar_yudisium')
        ->where('t.status_pendadaran', '2')
        ->where('t.major', $this->session->userdata('major'))
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetNilaiAkhirForStudent()
    {
        $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image, t.avarage, t.letter_value, t.status_daftar_yudisium')
        ->where('t.status_pendadaran', '2')
        ->where('t.nim', $this->session->userdata('username'))
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function getRequirementYudisiumBystatus()
    {
        $major = $this->session->userdata('major');
        $this->db->select('*')
        ->where('type', "2")->where('status', "1")->where('major', $major)->order_by('id', 'ASC')
        ->from('tb_requirements');
        $query = $this->db->get();
        return $query;
    }

    public function GetDataStudent($nim)
    {
        $this->db->select('*')
        ->where('username', $nim)
        ->from('tb_student');
        $query = $this->db->get();
        return $query;
    }

    public function GetAllStudentByMajor($major)
    {
         $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image, t.avarage, t.letter_value, t.status_daftar_yudisium')
        ->where('t.status_daftar_yudisium', '1')
        ->where('t.major', $this->session->userdata('major'))
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetMyDatastudent()
    {
        $nim = $this->session->userdata('username');
        $this->db->select('*')
        ->where('username', $nim)
        ->from('tb_student');
        $query = $this->db->get();
        return $query;
    }

    public function _SetData($tabel, $array, $col, $id){
        $this->db->set($array);
        $this->db->where($col, $id);
        $query = $this->db->update($tabel);
        return $query;
    }

    public function add($tabel,$data){
        $Q =$this->db->insert($tabel,$data);
        return $Q;
    }

    public function delete($tabel,$col,$id){
        $this->db->where($col,$id);
        $action = $this->db->delete($tabel);
        return $action;
    }
}