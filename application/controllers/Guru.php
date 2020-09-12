<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('modelGuru');
        chek_seesion();
    }

	public function index()
	{
		// $data['autoNik'] = $this->modelKaryawan->autoNik();
		$this->template->load('template','guru/contentguru');
	}
	
	function get_data_guru()
    {
        $list = $this->modelGuru->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $jk = "";
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->nip;
            $row[] = $field->namaLengkap;
            $row[] = $field->mapel;
            $row[] = "<td class='text-center'><button class='btn btn-info' onclick=detailGuru('$field->nip') data-toggle='modal' data-target='#modal-detail'>Lihat</button>&nbsp;<button onclick=hapusData('$field->nip') class='btn btn-danger'>Hapus</button></td>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelGuru->count_all(),
            "recordsFiltered" => $this->modelGuru->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

	function tambah(){
		$nip = $this->input->post('nip');
		$namaLengkap = $this->input->post('namaLengkap');
		$jenisKelamin = $this->input->post('jenisKelamin');
		$tempatLahir = $this->input->post('tempatLahir');
		$tanggalLahir = $this->input->post('tanggalLahir');
		$explode = explode("-", $tanggalLahir);
		$tglLahir = $explode[2]."-".$explode[1]."-".$explode[0];
		$alamat = $this->input->post('alamat');
		$comboMapel = $this->input->post('comboMapel');

		$dataGuru = array(
			'nip' => $nip,
			'namaLengkap' => $namaLengkap,
			'jenisKelamin' => $jenisKelamin,
			'tempatLahir'     => $tempatLahir,
			'tanggalLahir' => $tglLahir,
			'mapel' => $comboMapel,
			'alamat' => $alamat,
		);
			$this->modelGuru->tambahGuru('guru', $dataGuru);
	}
	
	function hapusData(){
		$nip = $_GET['nip'];
		$this->modelGuru->hapus('guru',array('nip' => $nip));
		redirect('guru');
	}
    
	function editData(){
		$nip = $this->input->post('detailNip');
		$namaLengkap = $this->input->post('detailNamaLengkap');
		$jenisKelamin = $this->input->post('jenisKelaminEdit');
		$tempatLahir = $this->input->post('detailTempatLahir');
		$tanggalLahir = $this->input->post('detailTanggalLahir');
		$explode = explode("-", $tanggalLahir);
		$tglLahir = $explode[2]."-".$explode[1]."-".$explode[0];
		$alamat = $this->input->post('detailAlamat');
		$comboMapel = $this->input->post('editMapel');
    
		$dataGuru = array(
			'namaLengkap' => $namaLengkap,
			'jenisKelamin' => $jenisKelamin,
			'tempatLahir'     => $tempatLahir,
			'tanggalLahir' => $tglLahir,
			'mapel' => $comboMapel,
			'alamat' => $alamat,
		);

        $queryakun = $this->modelGuru->editData('guru',array('nip' => $nip),$dataGuru);
	}

	function detailGuru() {
		$detail = $this->modelGuru->detailGuru($_GET['nip']);
		$tglLahir = explode("-", $detail['tanggalLahir']);
		$tanggalLahir = $tglLahir[2]."-".$tglLahir[1]."-".$tglLahir[0];

        $data = array(
            'nip' => $detail['nip'],
            'namaLengkap' => $detail['namaLengkap'],
            'jenisKelamin' => $detail['jenisKelamin'],
            'tempatLahir' => $detail['tempatLahir'],
            'tanggalLahir' => $tanggalLahir,
            'alamat' => $detail['alamat'],
            'mapel' => $detail['mapel'],
        );
        echo json_encode($data);
	}
	
	function cmbJenisKelamin(){
		$cmb = '<select id="jenisKelaminEdit" name="jenisKelaminEdit" class="form-control">
		<option selected disabled>Pilih Satu</option>';
        $data = $this->modelGuru->cmbGuru($_GET['nip']);
        foreach ($data as $row){
        if ($row->jenisKelamin == "L") {
            $cmb .='<option value="L" selected>Laki-laki</option>
            <option value="P">Perempuan</option>';
        }else{
            $cmb .='<option value="L">Laki-laki</option>
            <option value="P" selected>Perempuan</option>';
        }
    }
    $cmb .= '</select>';
    echo $cmb;
	}
	
	function cmbMapel(){
		$cmb = '<select id="editMapel" name="editMapel" class="form-control">
		<option selected disabled>Pilih Satu</option>';
        $data = $this->modelGuru->cmbGuru($_GET['nip']);
        foreach ($data as $row){
        if ($row->mapel == "mtk") {
            $cmb .='<option value="mtk" selected>MATEMATIKA</option>
            <option value="bindo">BAHASA INDONESIA</option>
            <option value="binggris">BAHASA INGGRIS</option>
            <option value="ipa">IPA</option>
            <option value="ips">IPS</option>';
        }elseif ($row->mapel == "bindo") {
            $cmb .='<option value="mtk">MATEMATIKA</option>
            <option value="bindo" selected>BAHASA INDONESIA</option>
            <option value="binggris">BAHASA INGGRIS</option>
            <option value="ipa">IPA</option>
            <option value="ips">IPS</option>';
        }elseif ($row->mapel == "binggris") {
            $cmb .='<option value="mtk">MATEMATIKA</option>
            <option value="bindo">BAHASA INDONESIA</option>
            <option value="binggris" selected>BAHASA INGGRIS</option>
            <option value="ipa">IPA</option>
            <option value="ips">IPS</option>';
        }elseif ($row->mapel == "ipa") {
            $cmb .='<option value="mtk">MATEMATIKA</option>
            <option value="bindo">BAHASA INDONESIA</option>
            <option value="binggris">BAHASA INGGRIS</option>
            <option value="ipa" selected>IPA</option>
            <option value="ips">IPS</option>';
        }else{
			$cmb .='<option value="mtk">MATEMATIKA</option>
            <option value="bindo">BAHASA INDONESIA</option>
            <option value="binggris">BAHASA INGGRIS</option>
            <option value="ipa">IPA</option>
            <option value="ips" selected>IPS</option>';
        }
    }
    $cmb .= '</select>';
    echo $cmb;
	}
}
