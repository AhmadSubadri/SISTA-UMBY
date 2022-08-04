<?php

class M_frontend extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function Faculty()
    {
    	$faculty = $this->db->select('*')->from('tb_faculty')->get()->result();
    	return $faculty;
    }

    public function HeroSection()
    {
        $dataA = $this->db->select('*')->where('type', 1)->from('home')->get()->result();
        return $dataA;
    }

    public function CalendarAcademic()
    {
        $dataB = $this->db->select('*')->where('type', 2)->from('home')->get()->result();
        return $dataB;
    }

    public function Testimoni()
    {
        $dataC = $this->db->select('*')->where('type', 3)->from('home')->get()->result();
        return $dataC;
    }

    public function kontenAbout()
    {
        $datad = $this->db->select('*')->where('type', 1)->from('about')->get()->result();
        return $datad;
    }

    public function GetIcon()
    {
        $datae = $this->db->select('*')->where('type', 2)->from('about')->get()->result();
        return $datae;
    }

    public function GetContentwo()
    {
        $dataf = $this->db->select('*')->where('type', 3)->from('about')->get()->result();
        return $dataf;
    }

    public function GetContact()
    {
        $datag = $this->db->select('*')->from('contact')->get()->result();
        return $datag;
    }

    public function GetAnnouncement()
    {
        $datah = $this->db->select('*')->from('tb_announcement')->get()->result();
        return $datah;
    }

    public function GetDownload()
    {
        $datai = $this->db->select('*')->from('tb_download')->get()->result();
        return $datai;
    }

    public function searchData($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('tb_download');
        if(!empty($keyword)){
            $this->db->like('judul',$keyword);
            $this->db->or_like('deskripsi',$keyword);
        }
        return $this->db->get()->result();
    }

    public function searchDataAnn($keyword=null)
    {
        $this->db->select('title as judul, description as deskripsi, pengupload as uploader, created_at');
        $this->db->from('tb_announcement');
        if(!empty($keyword)){
            $this->db->like('title',$keyword);
            $this->db->or_like('description',$keyword);
        }
        return $this->db->get()->result();
    }
}