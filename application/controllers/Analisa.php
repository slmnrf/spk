<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('ModelAnalisa');
		$this->load->Model('ModelKriteria');
		$this->load->Model('ModelNilai');
		$this->load->Model('ModelGuru');
        chek_seesion();
    }

    function index(){
        $this->template->load('Template','analisa/contentPenilaian');
    }

    function get_data_guru_penilaian()
    {
        $list = $this->ModelAnalisa->get_datatables();
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
            $row[] = "<td class='text-center'><a class='btn btn-info' href=penilaian/$field->nip>Ubah</a></td>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelAnalisa->count_all(),
            "recordsFiltered" => $this->ModelAnalisa->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function ubah(){
        $detail = $this->ModelAnalisa->detail($_GET['nip']);
        $data = array(
            'nip' => $detail['nip'],
            'namaLengkap' => $detail['namaLengkap'],
        );
        echo json_encode($data);
    }

    function kriteriatable(){
        $data= $this->ModelAnalisa->detailkriteria();
        echo json_encode($data);
    }

    function insertNilai(){ 
        if($this->input->post('nip') > 0){
            $this->ModelNilai->delete($this->input->post('nip'));
            $nip = $this->input->post('nip');
            $nilai = $this->input->post('nilai');
            $success = false;
                foreach ($nilai as $item => $value) {
                    $this->ModelNilai->nip = $nip;
                    $this->ModelNilai->kdKriteria = $item;
                    $this->ModelNilai->nilai = $value;
                    var_dump($nip."\n".$item."\n".$value);
                    if ($this->ModelNilai->insert()) {
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
            $data['nilaiGuru'] = $this->ModelNilai->getNilaiByguru($this->uri->segment(3, 0));
            $data['detailGuru'] = $this->ModelGuru->detailGuru($this->uri->segment(3, 0));
        }else{
            $this->session->set_flashdata('errors', 'Berhasil mengubah data :)');
            $data['nilaiGuru'] = $this->ModelNilai->getNilaiByguru($nip);
            $data['detailGuru'] = $this->ModelGuru->detailGuru($nip);
        }
        $this->template->load('Template','analisa/FormPenilaian',$data);
    }

    private function getDataInsert()
    {
        $dataView = array();
        $kriteria = $this->ModelKriteria->getAll();
        foreach ($kriteria as $item) {
            $this->ModelKriteria->kdKriteria = $item->kdKriteria;
            $dataView[$item->kdKriteria] = array(
                'nama' => $item->namaKriteria,
                'data' => $this->ModelKriteria->getByIdSub(),
            );
        }
        return $dataView;
    }
}
