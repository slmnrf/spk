<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelKaryawan');
		$this->load->library('upload');
        chek_seesion();
    }

	public function index()
	{
		$data['autoNik'] = $this->modelKaryawan->autoNik();
		$this->template->load('template','karyawan/contentKaryawan',$data);
	}
	
	function get_data_karyawan()
    {
        $list = $this->modelKaryawan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $jk = "";
        foreach ($list as $field) {
            if ($field->jenisKelamin == "L") {
                $jk = "Laki-laki";
            }else{
                $jk = "Perempuan";
            }
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->nik;
            $row[] = $field->namaLengkap;
            $row[] = $jk;
            $row[] = $field->tempatLahir;
            $row[] = $field->tanggalLahir;
            $row[] = $field->departement;
            $row[] = "<td class='text-center'><button class='btn btn-info' onclick=detailKaryawan('$field->nik') data-toggle='modal' data-target='#modal-detail'>Lihat</button>&nbsp;<button onclick=delnokk('$field->nik') class='btn btn-danger'>Hapus</button></td>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelKaryawan->count_all(),
            "recordsFiltered" => $this->modelKaryawan->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function tambah(){
		$nik = $this->input->post('nik');
		$namaLengkap = $this->input->post('namaLengkap');
		$jenisKelamin = $this->input->post('jenisKelamin');
		$tempatLahir = $this->input->post('tempatLahir');
		$tanggalLahir = $this->input->post('tanggalLahir');
		$explode = explode("-", $tanggalLahir);
		$tglLahir = $explode[2]."-".$explode[1]."-".$explode[0];
		$alamat = $this->input->post('alamat');
		$comboDepartement = $this->input->post('comboDepartement');
		$tanggalMasuk = $this->input->post('tanggalMasuk');
		$explode1 = explode("-", $tanggalMasuk);
		$tglMasuk = $explode1[2]."-".$explode1[1]."-".$explode1[0];
		$comboStatus = $this->input->post('comboStatus');
		$tanggalMulai = $this->input->post('tanggalMulai');
		$explode2 = explode("-", $tanggalMulai);
		$tglMulai = $explode2[2]."-".$explode2[1]."-".$explode2[0];
		$tanggalHabis = $this->input->post('tanggalHabis');
		$explode3 = explode("-", $tanggalHabis);
		$tglHabis = $explode3[2]."-".$explode3[1]."-".$explode3[0];

		$config['upload_path']="./assets/photo/"; //path folder file upload
		$config['allowed_types']='jpg|png'; //type file yang boleh di upload
		$config['file_name'] = $nik;
        $this->upload->initialize($config);
    
		if(!$this->upload->do_upload('file_gambar')){ //upload file
			echo 0;
        }else{
			echo 1;
			$gambar = $this->upload->data();
			
			$dataKaryawan = array(
				'nik' => $nik,
				'namaLengkap' => $namaLengkap,
				'jenisKelamin' => $jenisKelamin,
				'tempatLahir'     => $tempatLahir,
				'tanggalLahir' => $tglLahir,
				'departement' => $comboDepartement,
				'alamat' => $alamat,
				'foto' => $gambar['file_name']
			);
	
			$dataStatus = array(
				'nik' => $nik,
				'tanggalMasuk' => $tglMasuk,
				'statusKaryawan' => $comboStatus,
				'mulaiTanggal' => $tglMulai,
				'habisTanggal' => $tglHabis
			);
			$this->modelKaryawan->tambahKaryawan('karyawan', $dataKaryawan);
			$this->modelKaryawan->tambahStatus('status',$dataStatus);
		}
	}
}
