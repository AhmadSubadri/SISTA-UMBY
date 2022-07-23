<?php

class Skripsi extends CI_Controller {

public $result = [
        'status'  => false,
        'data'    => []
    ];
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_student');
        $this->load->model('M_lecturer');
        $this->load->model('M_chart');
        $this->load->model('M_umum');
        if($this->M_user->isNotLogin()) redirect(site_url(''));
        $this->load->library('form_validation');
    }

    public function Index()
    {
        $major = $this->session->userdata('major');
        $data = [
            'Data' => $this->M_lecturer->GetDataAjuanJudul($major),
            'DataDosen' => $this->M_lecturer->_getallLecturers(),
            'DataDataSempro' => $this->M_lecturer->GetDataSempro(),
            'AllDataMahasiswa' => $this->M_lecturer->_getallStudent()->result(),
            'Major' => $this->M_lecturer->GetIdMajor($major)->result(),
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/skripsi/skripsi',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function getautocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->M_lecturer->GetRow($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->name,
                        'description' => $row->id,
                        'nim' => $row->nim
                    );
                    echo json_encode($arr_result);
            }
        }
    }

    public function PlotingDosenSempro()
    {
        $major = $this->session->userdata('major');
        $nim = $this->input->post('nim');
        $nidn = $this->input->post('nidn');
        for($i=0; $i < sizeof($nidn); $i++){
            $data = array(
                'id_submission' => $this->input->post('ididea'),
                'nim_student' => $nim,
                'nidn_lecturer' => $nidn[$i],
                'id_major' => $major
            );
            $this->db->insert('tb_detail_sempro', $data);
            $this->db->set('to_check', "1");
            $this->db->where('nim', $nim);
            $this->db->update('tb_ideasubmission');
        }
        $this->session->set_flashdata('msg',"Ploting details has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');

    return redirect('dsn/dashboard/data-sempro-skripsi');
    }

    public function DataSemproSkripsi()
    {
        $major = $this->session->userdata('major');
        $data = [
            'Data' => $this->M_lecturer->GetDataAjuanJudul($major),
            'DataByToCheck' => $this->M_lecturer->GetDataByToCheck($major),
            'DataDosen' => $this->M_lecturer->_getallLecturers(),
            'DataDataSempro' => $this->M_lecturer->GetDataSempro()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/skripsi/sempro',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function JadwalSempro($id=0)
    {
        $data = [
            'Data' => $this->M_lecturer->GetDataByIdAjuan($id),
            'DataPengujiSempro' => $this->M_lecturer->GetDataPengujiSempro($id)
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/skripsi/jadwal_sempro',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function SaveJadwalSempro()
    {
        $nim = $this->input->post('nim');
         $data = array(
            'kegiatan' => $this->input->post('kegiatan'),
            'tempat' => $this->input->post('tempat'),
            'tanggal' => $this->input->post('tanggal'),
            'jam' => $this->input->post('jam')

        );
        $this->db->where('nim', $nim);
        $this->db->update('tb_ideasubmission', $data);

        $this->session->set_flashdata('msg',"schedule details has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');

    return redirect('dsn/dashboard/data-sempro-skripsi');
    }

    public function DetailHasilSempro($id=0)
    {
        $chart_data = $this->M_chart->readKaprodi($id);
        $data = [
            'chart_data' => $chart_data,
            'resultTest' => $this->M_umum->getresultrabinKaprodi($id)->result(),
            'Data' => $this->M_lecturer->GetDetailHasilSempro($id),
            'DataTitle' => $this->M_lecturer->GetDataRabinResult($id)
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/skripsi/detail_sempro',$data);
        $this->load->view('backend/partials_/footer');
    }

    public function SavePengumumansempro()
    {
        $nim = $this->input->post('nim');
        if($this->input->post('status') == '1'){
            $data = array(
                'status' => $this->input->post('status'),
                'note' => $this->input->post('note'),
                'status_sempro' => "2"
            );
            $this->db->where('nim', $nim);
            $this->db->update('tb_ideasubmission', $data);

            $this->M_lecturer->add('tb_sourcetitle',['title' => $this->input->post('title'), 'name' => $this->input->post('name'), 'year' => $this->input->post('year'), 'id_major' => $this->input->post('id_major')]);

            $this->M_lecturer->add('tb_submissioncard',['nim' => $nim, 'title' => $this->input->post('title'), 'status'=> $this->input->post('status')]);

            $this->db->set('status', "1");
            $this->db->where('nim_student', $nim);
            $this->db->update('tb_detail_sempro');
            $this->M_lecturer->add('tb_thesisreceived',['nim' => $this->input->post('nim'), 'title' => $this->input->post('title'), 'major' => $this->input->post('id_major'), 'status' => "0"]);

            $this->session->set_flashdata('msg',"Announcement details sempro has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/detail-hasil-sempro/'.$nim));
        } elseif($this->input->post('status') == '2') {
            $data = array(
                'status' => $this->input->post('status'),
                'note' => $this->input->post('note'),
                'status_sempro' => "2"
            );
            $this->db->where('nim', $nim);
            $this->db->update('tb_ideasubmission', $data);

            $this->M_lecturer->add('tb_sourcetitle',['title' => $this->input->post('title'), 'name' => $this->input->post('name'), 'year' => $this->input->post('year'), 'id_major' => $this->input->post('id_major')]);

            $this->M_lecturer->add('tb_submissioncard',['nim' => $nim, 'title' => $this->input->post('title'), 'status'=> $this->input->post('status')]);

            $this->db->set('status', "1");
            $this->db->where('nim_student', $nim);
            $this->db->update('tb_detail_sempro');
            $this->M_lecturer->add('tb_thesisreceived',['nim' => $this->input->post('nim'), 'title' => $this->input->post('title'), 'major' => $this->input->post('id_major'), 'status' => "0"]);

            $this->session->set_flashdata('msg',"Announcement details sempro has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/detail-hasil-sempro/'.$nim));
        } else {
            $data = array(
                'status' => $this->input->post('status'),
                'note' => $this->input->post('note'),
                'status_sempro' => "2"
            );
            $this->db->where('nim', $nim);
            $this->db->update('tb_ideasubmission', $data);

            $this->db->set('status', "1");
            $this->db->where('nim_student', $nim);
            $this->db->update('tb_detail_sempro');

            $this->M_lecturer->add('tb_submissioncard',['nim' => $nim, 'title' => $this->input->post('title'), 'status'=> $this->input->post('status')]);
            $this->session->set_flashdata('msg',"Announcement details sempro has been added successfully");
            $this->session->set_flashdata('msg_class','alert-success');
            redirect(site_url('dsn/dashboard/detail-hasil-sempro/'.$nim));
        }
    }

    public function Sempro()
    {
        $data = [
			'Data' => $this->M_lecturer->SemproSaya()
		];
		$this->load->view('backend/partials_/head');
		$this->load->view('backend/dosen/skripsi/mahasiswa_sempro', $data);
		$this->load->view('backend/partials_/footer');
    }

    public function PlotingDosesnPembimbing()
    {
        $data = [
            'Datamentor' => $this->M_lecturer->_getallLecturers(),
            'thesisFix' => $this->M_lecturer->_getThesisAcctoPlot(),
            'DataThesis' => $this->M_lecturer->_getThesisReceived()
        ];
        $this->load->view('backend/partials_/head');
        $this->load->view('backend/dosen/skripsi/ploting_pembimbing', $data);
        $this->load->view('backend/partials_/footer');
    }

    public function SavePlotingDospem(){
        $id = $this->input->post('id[]');
        $dospem = $this->input->post('nidn');
        for($i = 0; $i < count($id); $i++){
            $record = array(
                'nidn' => $dospem,
                'status' => '1'
            );
            $this->M_lecturer->_SetData('tb_thesisreceived', $record, 'nim', $id[$i]);
        }
        $this->session->set_flashdata('msg',"Ploting pembimbing has been added successfully");
        $this->session->set_flashdata('msg_class','alert-success');
        redirect(site_url('dsn/dashboard/ploting-dosen-pembimbing'));
    }
}