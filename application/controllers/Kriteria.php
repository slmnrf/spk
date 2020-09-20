
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelKriteria');
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('template','kriteria/contentKriteria');
	}

	function get_data_kriteria(){
		$list = $this->modelKriteria->get_datatables();
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
            "recordsTotal" => $this->modelKriteria->count_all(),
            "recordsFiltered" => $this->modelKriteria->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}
	
	function tambah(){
		$this->modelKriteria->kriteria = $this->input->post('kriteria', true);
		$this->modelKriteria->sifat = $this->input->post('sifat', true);
		$this->modelKriteria->bobot = $this->input->post('bobot', true);
		if ($this->modelKriteria->insert() == true) {
			$kdKriteria = $this->modelKriteria->getLastID()->kdKriteria;
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
				$this->modelKriteria->kdKriteria = $kdKriteria;
				$this->modelKriteria->subKriteria = $item['subKriteria'];
				$this->modelKriteria->value = $item['value'];
				if ($this->modelKriteria->subinsert() == true) {
					$success = true;
				}
			}
		}
	}

	function detailKriteria(){
		$data = $this->modelKriteria->detail($_GET['kdKriteria']);
        echo json_encode($data);
	}

	function update(){
		$this->modelKriteria->kriteria = $this->input->post('eNamaKriteria', true);
		$this->modelKriteria->sifat = $this->input->post('eSifat', true);
		$this->modelKriteria->bobot = $this->input->post('eBobot', true);
		$where = array('kdKriteria' => $this->input->post('eKriteria', true));
		$this->modelKriteria->update($where);
	}

	function updatesubkriteria(){
		$kdKriteria = $this->input->post('hiddenkdkriteria',true);
		$subKriteria = array();

		for($i = 0; $i<= 4; $i++){

			$subKriteria[$i] =   array( 'kdSubKriteria' => $this->input->post('kdsub'. $i, true),
										'subKriteria' => $this->input->post('esItemKriteria'. $i, true),
										);
		}

		foreach ($subKriteria as $item) {

			$this->modelKriteria->kdKriteria = $kdKriteria;
			$this->modelKriteria->kdSubKriteria = $item['kdSubKriteria'];
			$this->modelKriteria->subKriteria = $item['subKriteria'];
			$update = $this->modelKriteria->updatesub();
		}
	}

	function delete(){
		$kdKriteria = $_GET['kdKriteria'];
		$this->modelKriteria->delete($kdKriteria,"kriteria");
		$this->modelKriteria->delete($kdKriteria,"subKriteria");
		redirect('Kriteria');
	}
}
