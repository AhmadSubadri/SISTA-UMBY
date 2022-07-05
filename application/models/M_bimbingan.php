<?php

class M_bimbingan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function _getThesisReceivedtoGuidance(){
        $id = $this->session->userdata('username');
        $this->db->select('t.id as id, t.nim as nim, t.title as title, s.fullname as nameStudent, t.status as status, s.image as image')
        ->where('t.nidn', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s','s.username = t.nim');
        $query = $this->db->get();
        return $query;
    }

    public function _getDataGuidanceById($id)
    {
        $username = $this->session->userdata('username');
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name, s.image as image, g.message, l.fullname as nameLecturer, g.created_at, g.file')
        ->from('tb_guidance g')
        ->where('g.sender= '.$username.' and g.receiver='.$id .' or g.sender= ' . $id . ' and g.receiver=' . $username)
        ->join('tb_student s', 's.username = g.sender OR s.username = g.receiver')
        ->join('tb_lecturers l', 'l.username = g.sender OR l.username = g.receiver');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetMahasiswa($id)
    {
        $this->db->select('s.fullname, s.username, s.image, t.status_exam')
        ->where('t.nim', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim');
        $query = $this->db->get();
        return $query->result();
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

    public function GetPembimbing()
    {
        $id = $this->session->userdata('username');
        $this->db->select('l.fullname, l.username, s.fullname as name, l.image, t.status_exam, l.email, l.phone')
        ->where('t.nim', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_lecturers l', 'l.username = t.nidn')
        ->join('tb_student s', 's.username = t.nim');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidanceMhs()
    {
        $username = $this->session->userdata('username');
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name, s.image as image, g.message, l.fullname as nameLecturer, g.created_at, g.file')
        ->from('tb_guidance g')
        ->where('g.sender= '.$username.' and g.receiver= l.username or g.sender= l.username and g.receiver=' . $username)
        ->join('tb_student s', 's.username = g.sender OR s.username = g.receiver')
        ->join('tb_lecturers l', 'l.username = g.sender OR l.username = g.receiver');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidanceCardMhs()
    {
        $username = $this->session->userdata('username');
        $this->db->select('*')
        ->where('receiver', $username)
        ->order_by('created_at', 'ASC')
        ->from('tb_guidancecard');
        $query = $this->db->get();
        return $query->result();
    }
}