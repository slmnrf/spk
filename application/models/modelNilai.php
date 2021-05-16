<?php
class ModelNilai extends CI_Model{

    public $nip;
    public $kdKriteria;
    public $nilai;

    public function __construct(){
        parent::__construct();
    }

    private function getTable()
    {
        return 'nilai';
    }

    private function getData()
    {
        $data = array(
            'nip' => $this->nip,
            'kdKriteria' => $this->kdKriteria,
            'nilai' => $this->nilai
        );

        return $data;
    }

    public function insert()
    {
        $status = $this->db->insert($this->getTable(), $this->getData());
        return $status;
    }

    public function getNilaiByGuru($id)
    {
        $query = $this->db->query(
            'select u.nip, u.namaLengkap, k.kdKriteria, n.nilai from guru u, nilai n, kriteria k, subkriteria sk where u.nip = n.nip AND k.kdKriteria = n.kdKriteria and k.kdKriteria = sk.kdKriteria and u.nip = '.$id.' GROUP by k.kdKriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function getNilaiGuru()
    {
        $query = $this->db->query(
            'select u.nip, u.namaLengkap, k.kdKriteria, k.namaKriteria ,n.nilai from guru u, nilai n, kriteria k where u.nip = n.nip AND k.kdKriteria = n.kdKriteria '
        );
        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $nilai[] = $row;
            }

            return $nilai;
        }
    }

    public function update()
    {
        $data = array('nilai' => $this->nilai);
        $this->db->where('nip', $this->nip);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTable(), $data);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('nip', $id);
        return $this->db->delete($this->getTable());
    }

    function chek($nip) {
        $this->db->where('nip', $nip);
        $user=$this->db->get('nilai')->result_array();
        return $user;
	}
}