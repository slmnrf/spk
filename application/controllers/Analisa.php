<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelAnalisa');
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('template','analisa/dataKaryawanExp');
	}

	function getDataKaryawanMagang()
    {
        $list = $this->modelAnalisa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->nik;
            $row[] = $field->namaLengkap;
            $row[] = $field->tanggalMasuk;
            $row[] = $field->mulaiTanggal;
            $row[] = $field->habisTanggal;
            $row[] = "<td class='text-center'><button class='btn btn-info' onclick=detailKaryawan('$field->nik') data-toggle='modal' data-target='#modal-detail'>Lihat</button>&nbsp;<button onclick=hapusData('$field->nik') class='btn btn-danger'>Hapus</button></td>";

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
}
