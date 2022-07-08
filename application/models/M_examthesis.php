<?php

class M_examthesis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image')
        ->where('t.status_bimbingan', '1')
        ->where('t.major', $this->session->userdata('major'))
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function DetailDataPendadaran($id)
    {
        $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image, t.kegiatan, t.tempat, t.date, t.time, l.fullname as nameLecturer, l.image as imageDosen, l.username as nidn, l.email, l.phone')
        ->where('t.id', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function DetailPenguji($id)
    {
        $this->db->select('l.fullname, p.nilai, p.note, p.penguji')
        ->where('p.id_thesisreceived', $id)
        ->from('tb_detail_pendadaran p')
        ->join('tb_lecturers l', 'l.username = p.penguji');
        $query = $this->db->get();
        return $query->result();
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

    // public function _getThesisReceived($id)
    // {
    //     $this->db->select('t.id as id, s.fullname as nameStudent, l.fullname as nameLecturer, t.title as title, t.nim as nim, t.nidn as nidn')
    //     ->where('t.nim', $id)
    //     ->from('tb_thesisreceived t')
    //     ->join('tb_student s', 's.username = t.nim')
    //     ->join('tb_lecturers l', 'l.username = t.nidn');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

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

    public function getPengujiFix()
    {
        $major = $this->session->userdata('major');
        $this->db->select('t.id, s.fullname as nameStudent, s.username, t.kegiatan, t.tempat, t.date, t.time, s.image')
        ->where('t.major', $major)
        ->where('t.status_daftar', 1)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim');
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