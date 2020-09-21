<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('modelKriteria');
        $this->load->model('modelNilai');
        $this->load->model('modelGuru');
        $this->load->model('modelSaw');
    }

    public function index()
    {
		$guru = $this->modelGuru->getAll();
	
        /**
         * Menghapus table SAW jika ada
         */
        $this->modelSaw->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->modelKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->modelSaw->createTable($kriteria);

        /**
         * Ambil data dari table SAW untuk perhitungan awal
         */
        $table1 = $this->initialTableSAW($guru);
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
        $dataValueMinMax = $this->getVlueMinMax($dataSifat);
        $this->page->setData('valueMinMax', $dataValueMinMax);

        /**
         * Proses 1 ubah data berdasarkan sifat
         */

        $table2 = $this->getCountBySifat($dataSifat,$dataValueMinMax);
        $this->page->setData('table2', $table2);

        /**
         * Hitung perkalian bobot dengan nilai kriteria
         */
        $bobot = $this->modelKriteria->getBobotKriteria();
        $this->page->setData('bobot', $bobot);
        $table3 = $this->getCountByBobot($bobot);
        $this->page->setData('table3', $table3);

        /**
         * Add kolom total dan rangking
         */
        $this->modelSaw->addColumnTotalRangking();

        /**
         * Menghitung nilai total
         */
        $this->countTotal();

        /**
         * Mengambil data yang sudah di rangking
         */
        $tableFinal = $this->getDataRangking();
        $this->page->setData('tableFinal', $tableFinal);

        /**
         * Menghapus table SAW
         */
		$this->modelSaw->dropTable();
        $this->template->load('template','ranking/vRanking');
    }
	
    // public function noData()
    // {
		//     loadPage('saw/noData');
		// }
		
		private function initialTableSAW($guru)
		{
			$nilai = $this->modelNilai->getNilaiGuru();
			
			$dataInput = array();
			$no = 0;
			foreach ($guru as $item => $itemGuru) {
				foreach ($nilai as $index => $itemmodelNilai) {
					if ($itemGuru->nip == $itemmodelNilai->nip) {
						$dataInput[$no]['guru'] = $itemGuru->namaLengkap;
						$dataInput[$no][$itemmodelNilai->namaKriteria] = $itemmodelNilai->nilai;
					}
				}
				$no++;
			}
			
			foreach ($dataInput as $data => $item){
				$this->modelSaw->insert($item);
			}
			return $this->modelSaw->getAll();
		}
		
		private function getDataSifat()
    {
		$sawData = $this->modelSaw->getAll();
        $dataSifat = array();
        foreach ($sawData as $item => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                $dataSifat[$x] = $this->modelSaw->getStatus($x);
            }
        }
        return $dataSifat;
    }
	
    private function getVlueMinMax($dataSifat)
    {
		$sawData = $this->modelSaw->getAll();
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
		$sawData = $this->modelSaw->getAll();
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
							
                            $this->modelSaw->update($dataUpdate, $where);
                        }else{
							$newData = $dataValueMinMax['min'.$x] / $z ;
                            $dataUpdate = array(
								$x => $newData
                            );
                            $where = array(
								'guru' => $value->Guru
                            );
							
                            $this->modelSaw->update($dataUpdate, $where);
                        }
                    }
                }
            }
        }
		
        return $this->modelSaw->getAll();
    }
	
    private function countTotal()
    {
		$sawData = $this->modelSaw->getAll();
		
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
					
                    $this->modelSaw->update($dataUpdate, $where);
                }else{
					$total = $total + $itemData;
                }
            }
        }
    }
	
    private function getCountByBobot($bobot)
    {
		
		$sawData = $this->modelSaw->getAll();
        foreach ($sawData as $point => $value) {
			foreach ($value as $x => $z) {
				if ($x == 'Guru') {
					continue;
                }
                foreach ($bobot as $item => $itemodelKriteria) {
					
					if ($x == $itemodelKriteria->namaKriteria) {
						
						$sawData[$point]->$x =  $z * $itemodelKriteria->bobot ;
                        $newData = $z * $itemodelKriteria->bobot;
                        $dataUpdate = array(
							$x => $newData
                        );
                        $where = array(
							'guru' => $value->Guru
                        );
						
                        $this->modelSaw->update($dataUpdate, $where);
						
                    }
                }
            }
        }
		
        return $this->modelSaw->getAll();
    }
	
    private function getDataRangking()
    {
		$sawData = $this->modelSaw->getSortTotalByDesc();
        $no = 1;
        foreach ($sawData as $item => $value) {
			$dataUpdate = array(
				'Rangking' => $no
            );
            $where = array(
				'guru' => $value->Guru
            );
			
            $this->modelSaw->update($dataUpdate, $where);
            $no++;
        }
        return $this->modelSaw->getAll();
	}
	
	function print_out(){
		$data['print'] = "<script>
		window.addEventListener('load', window.print());
	  </script>";
		$this->template->load('template','ranking/vRanking',$data);
	}
	
	
}