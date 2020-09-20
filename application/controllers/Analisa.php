<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelAnalisa');
		$this->load->Model('modelKriteria');
		$this->load->Model('modelNilai');
		$this->load->Model('modelGuru');
        chek_seesion();
    }

    function index(){
        $this->template->load('template','analisa/contentPenilaian');
    }

    function get_data_guru_penilaian()
    {
        $list = $this->modelAnalisa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $jk = "";
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->nip;
            $row[] = $field->namaLengkap;
            // $row[] = "<td class='text-center'><button class='btn btn-primary' onclick=ubah('$field->nip') data-toggle='modal' data-target='#modal-xl'>Ubah</button></td>";
            $row[] = "<td class='text-center'><a href=penilaian/$field->nip>Ubah</a></td>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelAnalisa->count_all(),
            "recordsFiltered" => $this->modelAnalisa->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function ubah(){
        $detail = $this->modelAnalisa->detail($_GET['nip']);
        $data = array(
            'nip' => $detail['nip'],
            'namaLengkap' => $detail['namaLengkap'],
        );
        echo json_encode($data);
    }

    function kriteriatable(){
        $data= $this->modelAnalisa->detailkriteria();
        echo json_encode($data);
    }

    function insertNilai(){ 
        if($this->input->post('nip') > 0){
            $this->modelNilai->delete($this->input->post('nip'));
            $nip = $this->input->post('nip');
            $nilai = $this->input->post('nilai');
            $success = false;
                foreach ($nilai as $item => $value) {
                    $this->modelNilai->nip = $nip;
                    $this->modelNilai->kdKriteria = $item;
                    $this->modelNilai->nilai = $value;
                    var_dump($nip."\n".$item."\n".$value);
                    if ($this->modelNilai->insert()) {
                        $success = true;
                    }
                }
                    if ($success == true) {
                        $this->penilaian($this->input->post('nip'));
                        error_log($value);
                        redirect('Analisa/penilaian/'.$nip);
                    } else {
                        echo 'gagal';
                        
                    }   
            }     
    }
            
    public function penilaian($nip)
    {
        $data['dataView'] = $this->getDataInsert();
        if($nip == $this->uri->segment(3, 0)){
            $data['nilaiGuru'] = $this->modelNilai->getNilaiByguru($this->uri->segment(3, 0));
            $data['detailGuru'] = $this->modelGuru->detailGuru($this->uri->segment(3, 0));
        }else{
            $this->session->set_flashdata('errors', 'Berhasil mengubah data :)');
            $data['nilaiGuru'] = $this->modelNilai->getNilaiByguru($nip);
            $data['detailGuru'] = $this->modelGuru->detailGuru($nip);
        }
        $this->template->load('template','analisa/FormPenilaian',$data);
    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->modelKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->modelKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->namaKriteria,
                'data' => $this->modelKriteria->getByIdSub(),
            );
        }
        return $dataView;
    }
}
