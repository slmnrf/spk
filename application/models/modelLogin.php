<?php

Class modelLogin extends CI_Model {

    function chek($username,$password) {
        $this->db->where('userName', $username);
        $this->db->where('password', $password);
        $user=$this->db->get('login')->row_array();
        return $user;
	}
	
	function getDataLogin($where=''){
		return $this->db->query("select * from login $where;");
	}

    Public function save($password_baru) {
	  	$pass = md5($password_baru);
	  	$data = array (
	   		'password' => $pass
	   	);
	  	$this->db->update('login', $data);
	}

	Public function cek_old() {
	    $old = md5($this->input->post('password_lama'));    
	    $this->db->where('password',$old);
	    $query = $this->db->get('login');
	    return $query->result();;
	}
}

?>