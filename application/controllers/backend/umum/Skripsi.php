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
		if($this->M_user->isNotLogin()) redirect(site_url(''));
		$this->load->library('form_validation');
	}

	public function Index()
	{
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
            $kgram = 3;
            $basis = 3;
            $this->db->select('title, nim');
            $this->db->where('id', $id);
            $submisson = $this->db->get('tb_ideasubmission')->row();
            $nim = $submisson->nim;
            $Token = hapus_simbol($submisson->title);
            $this->db->set('rabin', $Token);
            $this->db->where('id', $id);
            $upd = $this->db->update('tb_ideasubmission');
            if($upd){
                $x = $kgram;
                $y = $basis;
                $length=strlen($Token);

                $teksSplit=null;
                if(strlen($Token) < $x){
                    $teksSplit[]=$Token;
                }else{
                    for($i=0;$i<=$length-$y;$i++){
                        $teksSplit[] = substr($Token,$i,$x);
                        // $rolhas = rollingHash($teksSplit[$i], $x);
                    }

                    $juduluji = $this->M_umum->getSourcetitle('tb_sourcetitle')->result();
                    foreach($juduluji as $rowe){
                        $length2 = strlen($rowe->rabin);
                        $teksSplit2=null;
                        if(strlen($rowe->rabin) < $x){
                            $teksSplit2[] = $rowe->rabin;
                        }else{
                            for($i=0;$i<=$length2-$y;$i++){
                                $teksSplit2[] = substr($rowe->rabin,$i,$x);
                                // $rolhas2 = rollingHash($teksSplit2[$i], $x);
                            }
                        }

                        $resultintersect[] = fingerPrint($teksSplit, $teksSplit2);     
                        $totals = count($resultintersect);
                        
                        $keys1 = count($teksSplit);
                        $keys2 = count($teksSplit2);

                        $rst = ((2*$totals)/($keys1+$keys2)*100);
                        $dtal = array(
                            'id_sourcetitle' => $rowe->id,
                            'id_ideasubmission' => $id,
                            'nim' => $nim,
                            'title' => $rowe->title,
                            'name' => $rowe->name,
                            'result' => $rst
                        );
                        $this->db->insert('tb_resultrabintest', $dtal);
                    }
                }
                $result = $this->M_umum->slectmax($id);
                foreach($result as $hsl){
                    $array = array($hsl->result);
                    $maxhs = $this->M_umum->nilaiMax($array);
                    $this->db->set('result_test', $maxhs);
                    $this->db->where('id', $id);
                    $this->db->update('tb_ideasubmission');
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
                echo "gagal Token";
            }
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
            'note' => $this->input->post('note'),
            'status' => "1"
        );
        $this->db->where('id_detail', $id);
        $this->db->update('tb_detail_sempro', $data);
        $this->M_umum->_SetData('tb_ideasubmission',['status_sempro'=>"1"], 'nim', $this->input->post('nim'));

        redirect(site_url('dsn/dashboard/pelaksanaan-sempro'));
    }
}