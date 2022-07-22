<?php
/**
 * 
 */
class Skripsi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_student');
		$this->load->model('M_umum');
		$this->load->model('M_chart');
        $this->load->model('M_bimbingan');
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
        $this->db->truncate('source_pengajuan');
        $this->db->truncate('tb_resultrabintest');
        $this->db->truncate('source_pembanding');
		$data = [
			'Data' => $this->M_umum->Index()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/umum/skripsi', $data);
		$this->load->view('backend/partials_/footer');
	}

    public function ProsesSempro($id)
    {
        $cekhsl = $this->M_umum->GetSourcePembanding()->num_rows();
        $cekhs2 = $this->M_umum->GetSourcePengajuan()->num_rows();
        if($cekhsl  == 0 && $cekhs2  == 0){
            $kgram = 5;
            $basis = 3;
            $key = md5(rand());
            // source pembanding
            $this->M_umum->_SetData('tb_ideasubmission', ['keyy' => $key], 'id', $id);
            $sourceTitle = $this->M_umum->getSourcetitle('tb_sourcetitle')->result();
            foreach($sourceTitle as $source){
                $src = hapus_simbol($source->title);
                $length=strlen($src);
                $teksSplit=null;
                if(strlen($src) < $kgram){
                    $teksSplit[]=$src;
                }else{
                    for($i=0;$i<=$length-$kgram;$i++){
                        $teksSplit[]=substr($src,$i,$kgram);
                        $aaa = array(
                            'id_pembanding' => $source->id,
                            'source' => $teksSplit[$i],
                            'kunci' => $key
                        );
                        $this->db->insert('source_pembanding', $aaa);
                    }
                }
            }

            // Data title pengajuan
            $p = $this->db->select('*')->where('id', $id)->from('tb_ideasubmission')->get()->result();
            foreach($p as $pengajuan){
                $de = hapus_simbol($pengajuan->title);
                $lengthe=strlen($de);
                $teksSplite=null;
                if(strlen($de) < $kgram){
                    $teksSplite[]=$de;
                }else{
                    for($j=0;$j<=$lengthe-$kgram;$j++){
                        $teksSplite[]=substr($de,$j,$kgram);
                        $bbb = array(
                            'id_pengajuan' => $pengajuan->id,
                            'source' => $teksSplite[$j],
                            'kunci' => $key
                        );
                        $this->db->insert('source_pengajuan', $bbb);
                    }
                }
            }
            $all = [
                'DataSource' => $this->M_umum->getSourcetitle('tb_sourcetitle'),
                'DetailId' => $this->M_umum->DetailByIdIdea($id),
                // 'chartdata' => $this->M_chart->read($id),
                'data' => $this->M_umum->_getbyIdPreview($id)
                // 'resultTest' => $this->M_umum->getresultrabin($id)
            ];
            $this->load->view('backend/partials_/head');
            $this->load->view('backend/umum/proses_sempro', $all);
            $this->load->view('backend/partials_/footer');
        }else{
            redirect(site_url('dsn/dashboard/pelaksanaan-sempro'));
        }
    }

    public function SaveFeedbackSubmission()
    {
        $id = $this->input->post('iddetail');
        $data = array(
            'feedback' => $this->input->post('feedback'),
            'note' => $this->input->post('note')
        );
        $this->db->where('id_detail', $id);
        $this->db->update('tb_detail_sempro', $data);
        $this->M_umum->_SetData('tb_ideasubmission',['status_sempro'=>"1"], 'nim', $this->input->post('nim'));

        redirect(site_url('dsn/dashboard/pelaksanaan-sempro'));
    }

    public function Bimbingan()
    {
        $data = [
            'Data' => $this->M_bimbingan->_getThesisReceivedtoGuidance()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/bimbingan/bimbingan',$data);
        $this->load->view('backend/partials_/footer');
    }
}