<?php

class M_student extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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

    public function getdataByid($id=0)
    {
        $this->db->select('*')
        ->where('username', $id)
        ->from('tb_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDosenByMajor($id=0)
    {
        $this->db->select('*')
        ->where('id_major', $id)
        ->from('tb_lecturers');
        $query = $this->db->get();
        return $query->result();
    }

    public function getdatasubmission($id=0)
    {
        $this->db->select('*')
        ->where('nim', $id)
        ->order_by('id','DESC')
        ->from('tb_ideasubmission');
        $query = $this->db->get();
        return $query->result();
    }

    public function getdatasubmissioncard($id=0)
    {
        $this->db->select('t.id as id, t.nim as nim, t.note as note, t.file as file, t.status as status, t.created_at as created_at, s.fullname as name')
        ->where('t.nim', $id)
        ->order_by('t.id','DESC')
        ->join('tb_student s','s.username = t.nim')
        ->from('tb_submissioncard t');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataPengujiSempro()
    {
        $id = $this->session->userdata('username');
        $this->db->select('d.id_detail as id, d.nidn_lecturer as nidn, l.fullname as name, d.nim_student as nim')
        ->where('d.nim_student', $id)
        ->join('tb_lecturers l', 'l.username = d.nidn_lecturer')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

     public function GetDataSempro()
    {
        $username = $this->session->userdata('username');
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date, i.to_check as to_check, i.kegiatan as kegiatan, i.tempat as tempat, i.tanggal as tanggal, i.jam as jam, i.status_sempro as status_sempro, i.status as status, i.note as note')
        ->where('i.nim', $username)
        ->join('tb_student s', 's.username = i.nim')
        ->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetFeedbackSempro()
    {
        $username = $this->session->userdata('username');
        $this->db->select('d.id_detail as id, d.nidn_lecturer as nidn, l.fullname as name, d.note as note')
        ->where('d.nim_student', $username)
        ->where('d.status', "1")
        ->join('tb_lecturers l', 'l.username = d.nidn_lecturer')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function _getsThesisReceived()
    {
        $id = $this->session->userdata('username');
        $this->db->select('*')
        ->where('nim', $id)
        ->from('tb_thesisreceived');
        $query = $this->db->get()->result();
        return $query;
    }

    public function GetmentorFix()
    {
        $id = $this->session->userdata('username');
        $this->db->select('t.id as id, t.nim as nim, t.nidn as nidn, t.title as title, m.name as major, l.fullname as nameLecturer, l.email as email, l.phone as phone, l.image as image')
        ->where('t.nim', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_major m', 'm.id = t.major')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidance()
    {
        $id = $this->session->userdata('username');
        $this->db->select('*')
        ->from('tb_guidance')
        ->where('sender', $id)
        ->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidanceCard()
    {
        $id = $this->session->userdata('username');
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name, g.message as message, g.file as file, g.created_at as created_at, g.status as status, g.file as file')
        ->from('tb_guidancecard g')
        ->where('g.receiver', $id)
        ->join('tb_student s', 's.username = g.receiver')
        ->order_by('g.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function checkstatusExam()
    {
        $id = $this->session->userdata('username');
        $this->db->select('*')
        ->where('nim', $id)
        ->where('status_exam', "1")
        ->from('tb_thesisreceived');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getRequirementThesisExam()
    {
        $id = $this->session->userdata('major');
        $this->db->select('*')
        ->where('major', $id)
        ->where('status', "1")
        ->where('type', "2")
        ->from('tb_requirements');
        $query = $this->db->get()->result();
        return $query;
    }

    public function _getDatauploadexam()
    {
        $id = $this->session->userdata('username');
        $this->db->select('*')
        ->where('nim', $id)
        ->from('tb_uploadrequirementexam');
        $query = $this->db->get()->result();
        return $query;
    }
}