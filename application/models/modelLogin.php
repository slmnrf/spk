<?php

Class ModelLogin extends CI_Model {

    function chek($username,$password) {
        $this->db->where('userName', $username);
        $this->db->where('password', $password);
        $user=$this->db->get('login')->row_array();
        return $user;
	}
	
	function getDataLogin($where=''){
		return $this->db->query("select * from login $where;");
	}

    function simpan($table,$data) {
		return $this->db->insert($table,$data);
	}

	Public function cek_old() {
	    $old = md5($this->input->post('password_lama'));    
	    $this->db->where('password',$old);
	    $query = $this->db->get('login');
	    return $query->result();;
	}

	function tampilakun($table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where('userName !=', 'admin');
        $hasil = $this->db->get();
        return $hasil->result();
	}
	
	function hapus($no){
		$this->db->where('no', $no);
        $this->db->delete('login');
        return;
	}

}

?>