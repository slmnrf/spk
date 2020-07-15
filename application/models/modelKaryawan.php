<?php

Class modelKaryawan extends CI_Model {
    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(nik) as nikarya from karyawan");
        $hasil = $query->row();
        return $hasil->nikarya;
    }

    function tambahKaryawan($table,$dataKaryawan){
		return $this->db->insert($table,$dataKaryawan);
    }
    function tambahStatus($table,$dataStatus){
		return $this->db->insert($table,$dataStatus);
	}
}

?>