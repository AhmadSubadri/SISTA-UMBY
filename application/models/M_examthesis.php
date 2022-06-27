<?php

class M_Examthesis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getdataUploadrequirement()
    {
        $major = $this->session->userdata('major');
        $this->db->select('u.id as id, u.nim as nim, u.file as file, u.status as status, u.created_at as created_at, s.fullname as name, s.image as image, s.email as email')
        ->where('u.major', $major)
        ->from('tb_uploadrequirementexam u')
        ->join('tb_student s', 's.username = u.nim');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getThesisReceived($id)
    {
        $this->db->select('t.id as id, s.fullname as nameStudent, l.fullname as nameLecturer, t.title as title, t.nim as nim, t.nidn as nidn')
        ->where('t.nim', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function getExaminer($major)
    {
        $this->db->select('*')
        ->where('id_major', $major)
        ->from('tb_lecturers');
        $query = $this->db->get();
        return $query->result();
    }

    function GetRow($namab){
        $this->db->like('fullname', $namab , 'both');
        $this->db->order_by('fullname', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tb_lecturers')->result();
    }

    public function _SetData($tabel, $array, $col, $id){
        $this->db->set($array);
        $this->db->where($col, $id);
        $query = $this->db->update($tabel);
        return $query;
    }

    public function getExaminerFix($id)
    {
        $this->db->select('t.id as id, l.fullname as nameLecturera, m.fullname as nameLecturerb, n.fullname as nameLecturerc, t.examiner_a as penguji_a, t.examiner_b as penguji_b, t.examiner_c as penguji_c, t.location as location, t.date as date, t.time as time')
        ->where('t.nim', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.examiner_a')
        ->join('tb_lecturers m', 'm.username = t.examiner_b')
        ->join('tb_lecturers n', 'n.username = t.examiner_c');
        $query = $this->db->get();
        return $query->result();
    }

    public function getScheduleexam()
    {
        $major = $this->session->userdata('major');
        $this->db->select('t.id as id, t.title as title, t.location as location, t.time as time, t.date as date, s.fullname as nameStudent')
        ->where('t.major', $major)
        ->order_by('t.date ASC')
        ->order_by('t.time ASC')
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }
}