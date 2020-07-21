<?php

Class modelDashboard extends CI_Model {

    function getData($data,$as,$table){
        return $this->db->query("SELECT COUNT($data) as $as FROM $table")->row();
    }
    function getDataWhere($data,$as,$table,$key,$where){
        return $this->db->query("SELECT COUNT($data) as $as FROM $table WHERE $key='$where'")->row();
    }
}

?>