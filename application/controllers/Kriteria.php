
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
}
