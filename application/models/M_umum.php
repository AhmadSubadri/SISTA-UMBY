<?php

class M_umum extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $username = $this->session->userdata('username');
        $this->db->select('d.id_detail as id, s.fullname as name, i.title as title, i.tanggal as tanggal, i.jam as jam, i.tempat as tempat, s.image as image, d.nim_student as nim, i.kegiatan as kegiatan, d.feedback as feedback, i.id as ididea, d.note as note')
        ->where('d.nidn_lecturer', $username)
        ->order_by('i.tanggal', 'ASC')
        ->order_by('i.jam', 'ASC')
        ->join('tb_student s', 's.username = d.nim_student')
        ->join('tb_ideasubmission i', 'i.nim = d.nim_student')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

    public function DetailByIdIdea($id)
    {
        $username = $this->session->userdata('username');
        $this->db->select('d.nim_student as nim, d.id_detail as id_detail')
        ->where('d.id_submission', $id)
        ->where('d.nidn_lecturer', $username)
        ->join('tb_student s', 's.username = d.nim_student')
        ->join('tb_ideasubmission i', 'i.nim = d.nim_student')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

    public function getresultrabin($id)
    {
        $this->db->select('*')
        ->where('id_ideasubmission', $id)
        ->order_by('result', 'DESC')
        ->from('tb_resultrabintest');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query;
    }

    public function GetSourcePembanding()
    {
        $this->db->select('*');
        $query = $this->db->get('source_pembanding');
        return $query;
    }

    public function GetSourcePengajuan()
    {
        $this->db->select('*');
        $query = $this->db->get('source_pengajuan');
        return $query;
    }

    public function getresultrabinKaprodi($id)
    {
        $this->db->select('*')
        ->where('nim', $id)
        ->order_by('result', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('tb_resultrabintest');
        return $query;
    }

    public function getSourcetitle()
    {
        $this->db->where('id', $this->session->userdata('major'));
        $sqlc = $this->db->get('tb_major')->row();
        $this->db->select('tb_sourcetitle.id, tb_sourcetitle.title, tb_sourcetitle.id_major, tb_sourcetitle.name')
        ->where('tb_faculty.id', $sqlc->id_faculty)->join('tb_major', 'tb_major.id = tb_sourcetitle.id_major')
        ->join('tb_faculty', 'tb_faculty.id = tb_major.id_faculty');
        $query = $this->db->get('tb_sourcetitle');
        return $query;
    }

    public function slectmax($id)
    {
        $this->db->select_max('result');
        $this->db->where('id_ideasubmission', $id);
        $query = $this->db->get('tb_resultrabintest');
        return $query->result();
    }

    public function nilaiMax($array)
    { 
        $n = count($array);  
        $max = $array[0]; 
        for ($i = 1; $i < $n; $i++)  
            if ($max < $array[$i]) 
                $max = $array[$i]; 
            return $max;
    }

    public function _getbyIdPreview($id=0)
    {
        $this->db->select('i.id as id, i.title as title, i.file as file, s.fullname as nameStudent, l.fullname as nameLecturer, m.name as nameMajor, i.status as status, i.nim as nim, i.nidn as nidn, i.id_major as major, s.image as image, i.key_plag');
        $this->db->where('i.id', $id);
        $this->db->from('tb_ideasubmission i');
        $this->db->join('tb_lecturers l', 'l.username = i.nidn');
        $this->db->join('tb_student s', 's.username = i.nim');
        $this->db->join('tb_major m', 'm.id = i.id_major');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataPendaranBypenguji()
    {
        $penguji = $this->session->userdata('username');
        $this->db->select('t.id, s.fullname, d.nim, t.kegiatan, t.tempat, t.date, t.time, t.title, t.status_pendadaran, t.id as id_thesisreceived, s.image, d.status')
        ->where('d.penguji', $penguji)
        ->from('tb_detail_pendadaran d')
        ->order_by('t.date', 'ASC')
        ->join('tb_student s','s.username = d.nim')
        ->join('tb_thesisreceived t','t.id = d.id_thesisreceived');
        $query = $this->db->get();
        return $query;
    }

    public function delete($tabel,$col,$id)
    {
        $this->db->where($col,$id);
        $action = $this->db->delete($tabel);
        return $action;
    }

    public function _SetData($tabel, $array, $col, $id)
    {
        $this->db->set($array);
        $this->db->where($col, $id);
        $query = $this->db->update($tabel);
        return $query;
    }

    public function add($tabel,$data)
    {
        $Q =$this->db->insert($tabel,$data);
        return $Q;
    }
}