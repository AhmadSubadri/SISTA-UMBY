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

	public function GetDataJurusan(){
		$this->db->select('*, m.id as id, m.name as major')
		->from('tb_major m')->where('f.id', $this->session->userdata('faculty'))->join('tb_faculty f','f.id = m.id_faculty');
		$query = $this->db->get();
		return $query->result();
	}
}