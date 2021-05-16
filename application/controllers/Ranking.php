<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ranking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelKriteria');
        $this->load->model('ModelNilai');
        $this->load->model('ModelGuru');
        $this->load->model('ModelSaw');
    }

    public function index(){
        $this->template->load('Template','ranking/vRekapNilai');
    }

    function get_data_guru()
    {
        $list = $this->ModelGuru->get_datatables();
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
            $row[] = "<td class='text-center'><button class='btn btn-info' onclick=detailGuru('$field->nip') data-toggle='modal' data-target='#modal-detail'>Lihat Nilai</button></td>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->ModelGuru->count_all(),
            "recordsFiltered" => $this->ModelGuru->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function detailGuru() {
		$detail = $this->ModelGuru->detailGuru($_GET['nip']);

        $data = array(
            'nip' => $detail['nip'],
            'namaLengkap' => $detail['namaLengkap'],
            'mapel' => $detail['mapel'],
        );
        echo json_encode($data);
	}
    
    public function penilaian()
    {
		$guru = $this->ModelGuru->getAll();
	
        /**
         * Menghapus table SAW jika ada
         */
        $this->ModelSaw->dropTable();

        /**
         * $kriteria data dari table kriteria
         */
        $kriteria = $this->ModelKriteria->getAll();

        /**
         * membuat table SAW berdasarkan data dari table kriteria
         * menginputkan semua data nilai
         */
        $this->ModelSaw->createTable($kriteria);

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
        $bobot = $this->ModelKriteria->getBobotKriteria();
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

        /**
         * Menghapus table SAW
         */
		$this->ModelSaw->dropTable();
        $this->template->load('Template','ranking/vRanking');
    }
	
    // public function noData()
    // {
		//     loadPage('saw/noData');
		// }
		
		private function initialTableSAW($guru)
		{
			$nilai = $this->ModelNilai->getNilaiGuru();
			
			$dataInput = array();
			$no = 0;
			foreach ($guru as $item => $itemGuru) {
				foreach ($nilai as $index => $itemModelNilai) {
					if ($itemGuru->nip == $itemModelNilai->nip) {
						$dataInput[$no]['guru'] = $itemGuru->namaLengkap;
						$dataInput[$no][$itemModelNilai->namaKriteria] = $itemModelNilai->nilai;
					}
				}
				$no++;
			}
			
			foreach ($dataInput as $data => $item){
				$this->ModelSaw->insert($item);
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
	
	function print_out(){
		$data['print'] = "<script>
		window.addEventListener('load', window.print());
	  </script>";
		$this->template->load('template','ranking/vRanking',$data);
	}
	
	
}