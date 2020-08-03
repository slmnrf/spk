<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelDashboard');
        chek_seesion();
    }

	public function index()
	{
		$data['guru'] = $this->modelDashboard->getData('nip','jnip','guru');
		$data['laki'] = $this->modelDashboard->getDataWhere('jenisKelamin','laki','guru','jenisKelamin','L');
		$data['perempuan'] = $this->modelDashboard->getDataWhere('jenisKelamin','perempuan','guru','jenisKelamin','P');
		$this->template->load('template','dashboard/contentDashboard',$data);
	}
}
