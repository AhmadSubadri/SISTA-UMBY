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
        $this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image, t.avarage, t.status_daftar_yudisium')
        ->where('t.status_pendadaran', '2')
        // ->where('t.avarage >= 50')
        ->where('t.major', $this->session->userdata('major'))
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
        ->where('type', "2")
        ->where('status', "1")
        ->where('major', $major)
        ->from('tb_requirements');
        $query = $this->db->get();
        return $query;
    }
}