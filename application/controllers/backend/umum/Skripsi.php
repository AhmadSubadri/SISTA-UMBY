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
		$data = [
			'Data' => $this->M_umum->Index()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/umum/skripsi', $data);
		$this->load->view('backend/partials_/footer');
	}

    public function ProsesSempro($id=0)
    {
        $cekhsl = $this->M_umum->getresultrabin($id)->num_rows();
        if($cekhsl == 0){
            $kgram = 5;
            $basis = 3;
            $this->db->select('title, nim, id');
            $this->db->where('id', $id);
            $submisson = $this->db->get('tb_ideasubmission')->row();
            $nim = $submisson->nim;
            $Token = hapus_simbol($submisson->title);
            // $x2 = katahubung($dq); 
            $readngram2 = hasing("$Token","$kgram","$basis");

            $juduluji = $this->M_umum->getSourcetitle('tb_sourcetitle')->result_array();
            $array_abstrak = array();
            foreach($juduluji as $key => $value){
                // $id_dokumen = $value["id"];
                $keys=   $array_abstrak[$key] = $value["rabin"];
                $readngram1 = hasing("$keys","$kgram","$basis");            
                $resultintersect = array_intersect($readngram1,$readngram2);  
                $totals=count($resultintersect);

                $jtotalarray=count($readngram1);
                $jtotalarray2=count($readngram2); 
                $x=((2*$totals)/($jtotalarray+$jtotalarray2)*100);
                // var_dump($x);
                $dtal = array(
                    'id_sourcetitle' => $value["id"],
                    'id_ideasubmission' => $id,
                    'nim' => $nim,
                    'title' => $value["title"],
                    'name' => $value["name"],
                    'result' => $x
                );
                $this->db->insert('tb_resultrabintest', $dtal);
            }
            $this->M_umum->_SetData('tb_ideasubmission', ['rabin'=>$Token], 'id' ,$id);
            $result = $this->M_umum->slectmax($id);
            foreach($result as $hsl){
                $array = array($hsl->result);
                $maxhs = $this->M_umum->nilaiMax($array);
                $this->M_umum->_SetData('tb_ideasubmission', ['result_test'=>$maxhs], 'id' ,$id);
            }

            $chart_data = $this->M_chart->read($id);
            $all = [
                'DetailId' => $this->M_umum->DetailByIdIdea($id),
                'chart_data' => $chart_data,
                'data' => $this->M_umum->_getbyIdPreview($id),
                'resultTest' => $this->M_umum->getresultrabin($id)->result()
            ];
            $this->load->view('backend/partials_/head');
            $this->load->view('backend/umum/proses_sempro', $all);
            $this->load->view('backend/partials_/footer');
        }else{
            $this->M_umum->delete('tb_resultrabintest','id_ideasubmission', $id);
            redirect(site_url('dsn/dashboard/proses-sempro/'.$id));
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