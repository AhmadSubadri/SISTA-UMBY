<?php

class M_requirement extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRequirementPendadaran()
    {
        $major = $this->session->userdata('major');
        $this->db->select('*')
        ->where('type', "1")
        ->where('major', $major)
        ->from('tb_requirements');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function delete($tabel,$col,$id)
    {
        $this->db->where($col,$id);
        $action = $this->db->delete($tabel);
        return $action;
    }

    public function update($tabel, $array, $col, $id){
        $this->db->set($array);
        $this->db->where($col, $id);
        $query = $this->db->update($tabel);
        return $query;
    }

    public function getById($id)
    {
       $this->db->select('*')
        ->where('id', $id)
        ->from('tb_requirements');
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