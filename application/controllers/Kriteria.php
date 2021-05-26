
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('ModelKriteria');
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('template','kriteria/contentKriteria');
	}

	function get_data_kriteria(){
		$list = $this->ModelKriteria->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $sifat = "";
        foreach ($list as $field) {
			if($field->sifat == "b"){
				$sifat = "Benefit";
			}else{
				$sifat = "Cost";
			}
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->namaKriteria;
            $row[] = $sifat;
            $row[] = $field->bobot;
			$row[] = "<td class='text-center'><button class='btn btn-info' onclick=detailKriteria('$field->kdKriteria') data-toggle='modal' data-target='#modal-lihatData'>Lihat Kriteria</button>&nbsp;<button class='btn btn-warning text-white' onclick=detailItemKriteria('$field->kdKriteria') data-toggle='modal' data-target='#modal-editKriteria'>Edit Kriteria</button>
			&nbsp;<button onclick=detailItemSubKriteria('$field->kdKriteria') class='btn btn-success' data-toggle='modal' data-target='#modal-editSubKriteria'>Edit Item Kriteria</button>&nbsp;<button onclick=hapusData('$field->kdKriteria') class='btn btn-danger'>Hapus</button></td>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelKriteria->count_all(),
            "recordsFiltered" => $this->ModelKriteria->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	
	function cek_bobot(){
		$query = "SELECT SUM(bobot) as total FROM kriteria";
		$querysumbobot = $this->db->query($query)->row_Array();
		$valbobot = intval($_GET['bobot']);
		$cekbobot = $querysumbobot['total']+$valbobot;
		if($cekbobot <= 100){
			echo 1;
		}else{
			echo $cekbobot;
		}
	}

	function tambah(){
		$this->ModelKriteria->kriteria = str_replace(" ","_",$this->input->post('kriteria', true));
		$this->ModelKriteria->sifat = $this->input->post('sifat', true);
		$this->ModelKriteria->bobot = $this->input->post('bobot', true);
		if ($this->ModelKriteria->insert() == true) {
			$kdKriteria = $this->ModelKriteria->getLastID()->kdKriteria;
			$success = false;
			$subKriteria = array(
				array('subKriteria' => $this->input->post('v1', true),
					'value' => 1),
				array('subKriteria' => $this->input->post('v2', true),
					'value' => 2),
				array('subKriteria' => $this->input->post('v3', true),
					'value' => 3),
				array('subKriteria' => $this->input->post('v4', true),
					'value' => 4),
				array('subKriteria' => $this->input->post('v5', true),
					'value' => 5)
			);

			foreach ($subKriteria as $item) {
				$this->ModelKriteria->kdKriteria = $kdKriteria;
				$this->ModelKriteria->subKriteria = $item['subKriteria'];
				$this->ModelKriteria->value = $item['value'];
				if ($this->ModelKriteria->subinsert() == true) {
					$success = true;
				}
			}
		}
	}

	function detailKriteria(){
		$data = $this->ModelKriteria->detail($_GET['kdKriteria']);
        echo json_encode($data);
	}

	function update(){
		$this->ModelKriteria->kriteria = $this->input->post('eNamaKriteria', true);
		$this->ModelKriteria->sifat = $this->input->post('eSifat', true);
		$this->ModelKriteria->bobot = $this->input->post('eBobot', true);
		$where = array('kdKriteria' => $this->input->post('eKriteria', true));
		$this->ModelKriteria->update($where);
	}

	function updatesubkriteria(){
		$kdKriteria = $this->input->post('hiddenkdkriteria',true);
		$subKriteria = array();

		for($i = 1; $i<= 5; $i++){
			$a = $i-1;
			$subKriteria[$i] =   array( 'kdSubKriteria' => $this->input->post('kdsub'. $a, true),
										'subKriteria' => $this->input->post('esItemKriteria'. $a, true),
										'value' => $i);
		}

		foreach ($subKriteria as $item) {

			$this->ModelKriteria->kdKriteria = $kdKriteria;
			$this->ModelKriteria->kdSubKriteria = $item['kdSubKriteria'];
			$this->ModelKriteria->subKriteria = $item['subKriteria'];
			$this->ModelKriteria->value = $item['value'];
			$update = $this->ModelKriteria->updatesub();
		}
	}

	function delete(){
		$kdKriteria = $_GET['kdKriteria'];
		$this->ModelKriteria->delete($kdKriteria,"kriteria");
		$this->ModelKriteria->delete($kdKriteria,"subKriteria");
		redirect('Kriteria');
	}
}
