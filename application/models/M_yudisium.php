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
}