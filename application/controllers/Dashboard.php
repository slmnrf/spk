<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('ModelDashboard');
        chek_seesion();
    }

	public function index()
	{
		$data['guru'] = $this->ModelDashboard->getData('nip','jnip','guru');
		$data['laki'] = $this->ModelDashboard->getDataWhere('jenisKelamin','laki','guru','jenisKelamin','L');
		$data['perempuan'] = $this->ModelDashboard->getDataWhere('jenisKelamin','perempuan','guru','jenisKelamin','P');
		$this->template->load('Template','Dashboard/ContentDashboard',$data);
	}
}
