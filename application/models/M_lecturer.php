<?php

class M_lecturer extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function GetDataAjuanJudul($id){
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date, i.to_check as to_check')
        ->where('i.id_major', $id)
        ->where('i.status', '0')
        ->join('tb_student s', 's.username = i.nim')
        ->order_by('i.created_at', 'DESC')
        ->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataByToCheck($id)
    {
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date')
        ->where('i.id_major', $id)
        ->where('i.to_check', '0')
        ->join('tb_student s', 's.username = i.nim')
        ->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    function GetRow($namab){
        $major = $this->session->userdata('major');
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date');
        $this->db->like('s.fullname', $namab , 'both');
        $this->db->order_by('i.nim', 'ASC');
        $this->db->where('i.id_major', $major);
        $this->db->where('i.to_check', '0');
        $this->db->join('tb_student s', 's.username = i.nim');
        $this->db->limit(10);
        $this->db->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataSempro()
    {
        $major = $this->session->userdata('major');
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date, i.to_check as to_check, i.kegiatan as kegiatan, i.tempat as tempat, i.tanggal as tanggal, i.jam as jam, i.status_sempro as status_sempro, i.status as status')
        ->where('i.id_major', $major)
        ->where('i.to_check', '1')
        ->order_by('i.tanggal', 'ASC')
        ->order_by('i.jam', 'ASC')
        ->join('tb_student s', 's.username = i.nim')
        ->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataByIdAjuan($id)
    {
        $this->db->select('i.id as id, i.nim as nim, i.title as title, s.fullname as name, i.file as file, s.image as image, i.created_at as date, i.to_check as to_check')
        ->where('i.nim', $id)
        ->join('tb_student s', 's.username = i.nim')
        ->order_by('i.created_at', 'DESC')
        ->from('tb_ideasubmission i');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDataPengujiSempro($id)
    {
        $this->db->select('d.id_detail as id, d.nidn_lecturer as nidn, l.fullname as name')
        ->where('d.nim_student', $id)
        ->join('tb_lecturers l', 'l.username = d.nidn_lecturer')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetDetailHasilSempro($id)
    {
        $this->db->select('d.id_detail as id, d.nidn_lecturer as nidn, l.fullname as name, d.feedback as feedback, d.note as note')
        ->where('d.nim_student', $id)
        ->join('tb_student s', 's.username = d.nim_student')
        ->join('tb_lecturers l', 'l.username = d.nidn_lecturer')
        ->from('tb_detail_sempro d');
        $query = $this->db->get();
        return $query->result();
    }

    //GET DOSEN BY JURUSAN
    public function _getallLecturers(){
        $id = $this->session->userdata('major');
        $this->db->select('*');
        $this->db->where('id_major', $id);
        $this->db->from('tb_lecturers');
        $query = $this->db->get();
        return $query;
    }

    public function _getThesisAcctoPlot(){
        $id = $this->session->userdata('major');
        $this->db->select('s.id as id, s.nim as nim, s.title as title, m.fullname as nameStudent, s.status as status');
        $this->db->where('s.major', $id);
        $this->db->where('s.status', '0');
        $this->db->from('tb_thesisreceived s');
        $this->db->join('tb_student m','m.username = s.nim');
        $query = $this->db->get();
        return $query;
    }

    public function _getThesisReceived(){
        $id = $this->session->userdata('major');
        $this->db->select('s.id as id, s.nim as nim, s.title as title, m.fullname as nameStudent, s.status as status, m.image as image, l.fullname as nameLecturer')
        ->where('s.major', $id)
        ->from('tb_thesisreceived s')
        ->join('tb_student m','m.username = s.nim')
        ->join('tb_lecturers l','l.username = s.nidn');
        $query = $this->db->get();
        return $query;
    }

    public function _getThesisReceivedtoGuidance(){
        $id = $this->session->userdata('username');
        $this->db->select('s.id as id, s.nim as nim, s.title as title, m.fullname as nameStudent, s.status as status, m.image as image')
        ->where('s.nidn', $id)
        ->from('tb_thesisreceived s')
        ->join('tb_student m','m.username = s.nim');
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

    public function getGuidanceChat($sender)
    {
        $receiver = $this->session->userdata('username');
        $this->db->select('g.id as id, g.message as message, g.file as file,g.sender as sender, g.receiver as receiver, g.created_at as created_at, s.fullname as nameStudent, l.fullname as nameLecturer, s.image as image, s.username as usernameStudent')
        ->order_by('g.created_at', 'asc')
        ->where('l.username', $receiver)
        ->where('s.username', $sender)
        ->from('tb_guidance g')
        ->join('tb_student s', 's.username = g.sender OR s.username = g.receiver')
        ->join('tb_lecturers l', 'l.username = g.sender OR l.username = g.receiver');
        $query = $this->db->get();
        return $query->result();
    }

    public function getStudentbyid($id)
    {
        $this->db->select('*')
        ->where('username', $id)
        ->from('tb_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertChat($in)
    {
        $this->db->insert('tb_guidance', $in);
    }

    public function _getDataGuidance($id)
    {
        $username = $this->session->userdata('username');
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name, g.message as message, g.file as file, g.created_at as created_at')
        ->from('tb_guidance g')
        ->where('g.sender', $id, 'AND g.receiver', $username)
        ->join('tb_student s', 's.username = g.sender')
        ->order_by('g.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidanceCard($id)
    {
        // $username = $this->session->userdata('username');
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name, g.message as message, g.file as file, g.created_at as created_at, g.status as status, g.file as file')
        ->from('tb_guidancecard g')
        ->where('g.receiver', $id)
        ->join('tb_student s', 's.username = g.receiver')
        ->order_by('g.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getsThesisReceived($id)
    {
        $this->db->select('t.id as id, t.title as title, s.fullname as name, t.nim as nim, s.email as email, s.image as image, t.status_exam as status_exam')
        ->from('tb_thesisreceived t')
        ->where('nim', $id)
        ->join('tb_student s', 's.username = t.nim');
        $query = $this->db->get();
        return $query->result();
    }

    public function _getDataGuidanceById($id)
    {
        $this->db->select('g.id as id, g.sender as sender, g.receiver as receiver, s.fullname as name')
        ->from('tb_guidance g')
        ->where('g.id', $id)
        ->join('tb_student s', 's.username = g.sender')
        ->order_by('g.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}