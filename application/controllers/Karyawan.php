<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelKaryawan');
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('template','karyawan/contentKaryawan');
	}

	function tambah() {          
		$nik = $_GET['nik'];
		$namaLengkap = $_GET['namaLengkap'];
		$jenisKelamin = $_GET['jenisKelamin'];
		$tempatLahir = $_GET['tempatLahir'];
		$tanggalLahir = $_GET['tanggalLahir'];
		$alamat = $_GET['alamat'];
		$comboDepartement = $_GET['comboDepartement'];
		$tanggalMasuk = $_GET['tanggalMasuk'];
		$comboStatus = $_GET['comboStatus'];
		$tanggalMulai = $_GET['tanggalMulai'];
		$tanggalHabis = $_GET['tanggalHabis'];

		$dataKaryawan = array(
			'nik' => $nik,
			'namaLengkap' => $namaLengkap,
			'jenisKelamin' => $jenisKelamin,
			'tempatLahir'     => $tempatLahir,
			'tanggalLahir' => $tanggalLahir,
			'departement' => $comboDepartement,
			'alamat' => $alamat
		);

		$dataStatus = array(
			'nik' => $nik,
			'tanggalMasuk' => $tanggalMasuk,
			'statusKaryawan' => $comboStatus,
			'mulaiTanggal' => $tanggalMulai,
			'habisTanggal' => $tanggalHabis
		);
		$this->modelKaryawan->tambahKaryawan('karyawan', $dataKaryawan);
		$this->modelKaryawan->tambahStatus('status',$dataStatus);
	}
}
