<?php

class M_tatausaha extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function _SetData($tabel, $array, $col, $id){
		$this->db->set($array);
		$this->db->where($col, $id);
		$query = $this->db->update($tabel);
		return $query;
	}

	public function update($tabel, $array, $col, $id){
		$this->db->where($col, $id);
		$query = $this->db->update($tabel, $array);
		return $query;
	}

	public function add($tabel,$data){
		$Q =$this->db->insert_batch($tabel,$data);
		return $Q;
	}

	public function save($tabel,$data){
        $Q =$this->db->insert($tabel,$data);
        return $Q;
    }

	public function GetAll($tabel){
		$Q =$this->db->get($tabel);
		return $Q->result();
	}

	public function delete($tabel,$col,$id){
		$this->db->where($col,$id);
		$action = $this->db->delete($tabel);
		return $action;
	}

	public function insert($data){
		$insert = $this->db->insert_batch('tb_mahasiswa', $data);
		if($insert){
			return true;
		}
	}
	
	public function GetDataMahasiswa(){
		$this->db->select('*,s.id as id, m.name as major, f.name as fac')
		->from('tb_student s')->where('f.id', $this->session->userdata('faculty'))->join('tb_major m','m.id = s.id_major')->join('tb_faculty f','f.id = m.id_faculty');
		$query = $this->db->get();
		return $query;
	}

	public function GetDataDosen(){
		$this->db->select('*, l.id as id, m.name as major, f.name as fac')
		->from('tb_lecturers l')->where('f.id', $this->session->userdata('faculty'))->join('tb_major m','m.id = l.id_major')->join('tb_faculty f','f.id = m.id_faculty');
		$query = $this->db->get();
		return $query;
	}

	public function GetDataTatausaha(){
		$this->db->select('*, l.id as id, f.name as fac, f.id as facid')
		->from('tb_staff l')->where('l.id_faculty', $this->session->userdata('faculty'))->join('tb_faculty f','f.id = l.id_faculty');
		$query = $this->db->get();
		return $query;
	}

	public function GetDataJurusan(){
		$this->db->select('*, m.id as id, m.name as major')
		->from('tb_major m')->where('f.id', $this->session->userdata('faculty'))->join('tb_faculty f','f.id = m.id_faculty');
		$query = $this->db->get();
		return $query->result();
	}

	public function GetDataByDaftarpendadaran()
	{
		$this->db->where('id_faculty', $this->session->userdata('faculty'));
        $sqlb = $this->db->get('tb_major')->row();
        $this->db->select('t.id, s.fullname, s.username, s.email, s.image, s.class, m.name as major, t.status_daftar')->where('t.major', $sqlb->id)->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')->join('tb_major m', 'm.id = t.major');
        $query = $this->db->get();
        return $query;
	}

	public function GetDataMahasiswaByHasilPendadaran()
	{
		$this->db->where('id_faculty', $this->session->userdata('faculty'));
        $sqlb = $this->db->get('tb_major')->row();
        $this->db->select('t.id, s.fullname, s.username, s.email, s.image, s.class, m.name as major, t.status_daftar, t.pernyataan')->where('t.major', $sqlb->id)->from('tb_thesisreceived t')
        ->join('tb_student s', 's.username = t.nim')->join('tb_major m', 'm.id = t.major');
        $query = $this->db->get();
        return $query;
	}

	public function GetMahasiswaByNIM($nim)
	{
		$query = $this->db->select('*')->from('tb_student')->where('username', $nim)->get();
		return $query->result();
	}

	public function GetDokumenByNIM($nim)
	{
		$query = $this->db->select('u.id as idoc, r.requirements, u.file, s.username, s.fullname, u.status')->from('tb_uploadrequirementexam u')->where('u.nim', $nim)->join('tb_requirements r', 'r.id = u.id_requirement')->join('tb_student s', 's.username = u.nim')->get();
		return $query;
	}

	public function GetDokumenByNIMYudisium($nim)
	{
		$query = $this->db->select('u.id as idoc, r.requirements, u.file, s.username, s.fullname, u.status')->from('tb_uploadrequirementyudisium u')->where('u.nim', $nim)->join('tb_requirements r', 'r.id = u.id_requirement')->join('tb_student s', 's.username = u.nim')->get();
		return $query;
	}

	public function GetDataHasilPendadaran()
	{
		$major = $this->db->select('*')->where('id_faculty', $this->session->userdata('faculty'))->from('tb_major')->get()->row();
		$this->db->select('t.id, t.status_bimbingan, t.title, t.nim, t.nidn, t.status_daftar, t.status_pendadaran, s.fullname, s.image')
        ->where('t.status_bimbingan', '1')->where('t.major', $major->id)->from('tb_thesisreceived t')->join('tb_student s', 's.username = t.nim')->join('tb_lecturers l', 'l.username = t.nidn');
        $query = $this->db->get();
        return $query->result();
	}

	public function GetMahasiswaDaftarYudisium()
	{
		$this->db->where('id_faculty', $this->session->userdata('faculty'));
        $sqlc = $this->db->get('tb_major')->row();
		$this->db->select('t.id, t.status_daftar_yudisium, t.title, t.nim, t.nidn, s.fullname, s.image, l.fullname as nameLecturer, s.email')->where('t.status_daftar_yudisium', "1")->where('t.major', $sqlc->id)->from('tb_thesisreceived t')
		->join('tb_student s', 's.username = t.nim')->join('tb_lecturers l', 'l.username = t.nidn');
		$query = $this->db->get();
        return $query->result();
	}

	public function getRequirementYudisiumBystatus()
    {
        $this->db->where('id_faculty', $this->session->userdata('faculty'));
        $sqld = $this->db->get('tb_major')->row();
        $this->db->select('*')
        ->where('type', "2")->where('status', "1")->where('major', $sqld->id)->order_by('id', 'ASC')
        ->from('tb_requirements');
        $query = $this->db->get();
        return $query;
    }
}