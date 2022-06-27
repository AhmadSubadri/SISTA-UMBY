<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chart extends CI_Model {

	//function read berfungsi mengambil/read data dari table data di database
	public function read($id=0)
	{
		$this->db->select('*');
		$this->db->from('tb_resultrabintest');
		$this->db->where('id_ideasubmission', $id);
		$this->db->order_by('id_ideasubmission DESC, result DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	public function readKaprodi($id=0)
	{
		$this->db->select('*');
		$this->db->from('tb_resultrabintest');
		$this->db->where('nim', $id);
		$this->db->order_by('id_ideasubmission DESC, result DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
}