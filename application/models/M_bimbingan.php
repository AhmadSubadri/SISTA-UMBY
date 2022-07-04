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
}