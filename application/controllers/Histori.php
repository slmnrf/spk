<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->Model('ModelSaw');
		$this->load->Model('ModelHistory');
		$this->load->Model('ModelGuru');
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('Template','ranking/vHistoryTabel');
	}

    function get_data_histori(){
		$list = $this->ModelHistory->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $ex = "";
        foreach ($list as $field) {
            if($this->session->userdata('role') == "KS" OR $this->session->userdata('role') == "AA"){
                $ex = "<td class='text-center'><a class='btn btn-info' href=histori/viewhistori/$field->datePrint>Lihat </a>&nbsp;<button onclick=hapusData('$field->datePrint') class='btn btn-danger'>Hapus</button></td>";
            }else{
                $ex = "<td class='text-center'><a class='btn btn-info' href=histori/viewhistori/$field->datePrint>Lihat </a></td>";
            }
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $field->datePrint;
			$row[] = $ex;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelHistory->count_all(),
            "recordsFiltered" => $this->ModelHistory->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
	}

    public function viewhistori($ex)
    {
        $this->HistoryView($ex);
        $this->template->load('Template','ranking/vHistory');
    }

    public function HistoryView($item){
        /**
         * Menghapus table SAW jika ada
         */
        $this->ModelSaw->dropTable();
    
        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->ModelHistory->getAllHistoryKriteria($item);

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->ModelSaw->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($item);
        $this->page->setData('table1', $table1);


        /**
         * mengambil sifat kriteria
         * @var $dataSifat array
         */
        $dataSifat = $this->getDataSifat();
        $this->page->setData('dataSifat', $dataSifat);

        /**
         * Mengambil nilai maksimal dan minimal berdasarkan sifat
         */
        $dataValueMinMax = $this->getVlueMinMax($dataSifat, $item);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->ModelHistory->getBobotKriteria($item);
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->ModelSaw->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        // Tanggal Cetak
        $tanggalcetak = $item;
        $this->page->setData('tanggalcetak', $tanggalcetak);
        /**
         * Menghapus table SAW
         */
		$this->ModelSaw->dropTable();
    }

		
		private function initialTableSAW($item)
		{
			$nilai = $this->ModelHistory->getAllHistory($item);
			$guru = $this->ModelGuru->getAllHistoryGuru();
			$dataInput = array();
			$no = 0;

            foreach ($guru as $item => $itemGuru) {
                foreach ($nilai as $index => $itemModelNilai) {
                    if($itemGuru->namaLengkap == $itemModelNilai->Guru){
                        $dataInput[$no]['guru'] = $itemModelNilai->Guru;
                        $dataInput[$no][$itemModelNilai->namaKriteria] = $itemModelNilai->nilai;
                    }
                }
                $no++;
            }
			
			foreach ($dataInput as $data => $s){
				$this->ModelSaw->insert($s);
			}
			return $this->ModelSaw->getAll();
		}

		
	private function getDataSifat()
    {
		$sawData = $this->ModelSaw->getAll();
        $dataSifat = array();
        foreach ($sawData as $item => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                $dataSifat[$x] = $this->ModelSaw->getStatus($x);
            }
        }
        return $dataSifat;
    }
	
    private function getVlueMinMax($dataSifat)
    {
		$sawData = $this->ModelSaw->getAll();
        $dataValueMinMax = array();
        foreach ($sawData as $point => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                foreach ($dataSifat as $item => $itemX) {
					if ($x == $item) {
						
						if ($x == $item && $itemX->sifat == 'b') {
							if (!isset($dataValueMinMax['max' . $x])) {
								$dataValueMinMax['namaKriteria'.$x] = $x;
                                $dataValueMinMax['max' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Benefit';
                            } elseif ($z > $dataValueMinMax['max' . $x]) {
								$dataValueMinMax['max' . $x] = $z;
                            }
                        } else {
							if (!isset($dataValueMinMax['min' . $x])) {
								$dataValueMinMax['namaKriteria'.$x] = $x;
                                $dataValueMinMax['min' . $x] = $z;
                                $dataValueMinMax['sifat' . $x] = 'Cost';
                            } elseif ($z < $dataValueMinMax['min' . $x]) {
								$dataValueMinMax['min' . $x] = $z;
                            }
                        }
                    }
                }
            }
        }
		
        return $dataValueMinMax;
    }
	
    private function getCountBySifat($dataSifat, $dataValueMinMax)
    {
		$sawData = $this->ModelSaw->getAll();
        foreach ($sawData as $point => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                foreach ($dataSifat as $item => $sifat) {
					if ($x == $item) {
						if($sifat->sifat == 'b'){
							
							$newData = $z / $dataValueMinMax['max'.$x];
                            $dataUpdate = array(
								$x => $newData
                            );
                            $where = array(
								
								'guru' => $value->Guru
                            );
							
                            $this->ModelSaw->update($dataUpdate, $where);
                        }else{
							$newData = $dataValueMinMax['min'.$x] / $z ;
                            $dataUpdate = array(
								$x => $newData
                            );
                            $where = array(
								'guru' => $value->Guru
                            );
							
                            $this->ModelSaw->update($dataUpdate, $where);
                        }
                    }
                }
            }
        }
		
        return $this->ModelSaw->getAll();
    }
	
    private function countTotal()
    {
		$sawData = $this->ModelSaw->getAll();
		
        foreach ($sawData as $item => $value) {
			$total = 0;
            foreach ($value as $item => $itemData) {
				if($item == 'Guru'){
					continue;
                }elseif($item == 'Total'){
					$dataUpdate = array(
						'Total'=> $total
                    );
					
                    $where = array(
						'guru' => $value->Guru
                    );
					
                    $this->ModelSaw->update($dataUpdate, $where);
                }else{
					$total = $total + $itemData;
                }
            }
        }
    }
	
    private function getCountByBobot($bobot)
    {
		
		$sawData = $this->ModelSaw->getAll();
        foreach ($sawData as $point => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                foreach ($bobot as $item => $iteModelKriteria) {
					
					if ($x == $iteModelKriteria->namaKriteria) {
						
						$sawData[$point]->$x =  $z * $iteModelKriteria->bobot ;
                        $newData = $z * $iteModelKriteria->bobot;
                        $dataUpdate = array(
							$x => $newData
                        );
                        $where = array(
							'guru' => $value->Guru
                        );
						
                        $this->ModelSaw->update($dataUpdate, $where);
						
                    }
                }
            }
        }
		
        return $this->ModelSaw->getAll();
    }
	
    private function getDataRangking()
    {
		$sawData = $this->ModelSaw->getSortTotalByDesc();
        $no = 1;
        foreach ($sawData as $item => $value) {
			$dataUpdate = array(
				'Rangking' => $no
            );
            $where = array(
				'guru' => $value->Guru
            );
			
            $this->ModelSaw->update($dataUpdate, $where);
            $no++;
        }
        return $this->ModelSaw->getAll();
	}
   
    public function hapusData(){
		$dp = $_GET['dp'];
		$this->ModelHistory->deleteHistory('history',$dp);
		$this->ModelHistory->deleteHistory('historykriteria',$dp);
		redirect('histori');
	}
}
