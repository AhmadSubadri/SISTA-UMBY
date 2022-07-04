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
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name')
        ->from('tb_guidance g')
        ->where('g.sender', $username)
        ->where('g.receiver', $id)
        ->join('tb_student s', 's.username = g.sender')
        ->order_by('g.id', 'DESC');
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
}