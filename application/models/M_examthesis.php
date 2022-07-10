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

    public function DetailPelaksanaanPendadaran($id)
    {
        $this->db->select('t.id, t.title, t.laporan_akhir, s.fullname as nameStudent, s.username as nim, s.image as imageMhs, s.email as emailMhs, l.username as nidn, l.fullname as nameLecturer, l.email as emailDsn, l.image as imageDsn, l.phone')
        ->where('t.id', $id)
        ->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')
        ->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataPendaranBypenguji()
    {
        $penguji = $this->session->userdata('username');
        $this->db->select('t.id, s.fullname, d.nim, t.kegiatan, t.tempat, t.date, t.time, t.title, t.status_pendadaran, t.id as id_thesisreceived, s.image')
        ->where('d.penguji', $penguji)
        // ->where('t.status_pendadaran', NULL)
        ->from('tb_detail_pendadaran d')
        ->order_by('t.date', 'ASC')
        ->join('tb_student s','s.username = d.nim')
        ->join('tb_thesisreceived t','t.id = d.id_thesisreceived');
        $query = $this->db->get();
        return $query;
    }

    public function DetailPenguji($id)
    {
        $this->db->select('l.fullname, p.nilai, p.file, p.note, p.penguji')
        ->where('p.id_thesisreceived', $id)
        ->from('tb_detail_pendadaran p')
        ->join('tb_lecturers l', 'l.username = p.penguji');
        $query = $this->db->get();
        return $query;
    }

    public function MeanNilaiPendadaran($id)
    {
        $this->db->select('p.nilai as total, p.penguji')
        ->where('p.id_thesisreceived', $id)
        ->where('p.nilai != 0')
        ->from('tb_detail_pendadaran p')
        ->join('tb_lecturers l', 'l.username = p.penguji');
        $query = $this->db->get();
        return $query;
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

    public function delete($tabel,$col,$id){
        $this->db->where($col,$id);
        $action = $this->db->delete($tabel);
        return $action;
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
        return $query;
    }
}