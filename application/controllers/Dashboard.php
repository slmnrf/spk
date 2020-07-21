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
		$data['karyawan'] = $this->modelDashboard->getData('nik','jnik','karyawan');
		$data['laki'] = $this->modelDashboard->getDataWhere('jenisKelamin','laki','karyawan','jenisKelamin','L');
		$data['perempuan'] = $this->modelDashboard->getDataWhere('jenisKelamin','perempuan','karyawan','jenisKelamin','P');
		$data['magang'] = $this->modelDashboard->getDataWhere('statusKaryawan','magang','status','statusKaryawan','magang');
		$data['tetap'] = $this->modelDashboard->getDataWhere('statusKaryawan','tetap','status','statusKaryawan','tetap');
		$this->template->load('template','dashboard/contentDashboard',$data);
	}
}
