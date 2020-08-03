<?php

Class modelAnalisa extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($term=''){ //term is value of $_REQUEST['search']['value']
        $column = array('k.nik','k.namaLengkap','s.tanggalMasuk', 's.mulaiTanggal', 's.habisTanggal');
        $this->db->select('k.nik','k.namaLengkap','s.tanggalMasuk', 's.mulaiTanggal', 's.habisTanggal');
        $this->db->from('karyawankota as k');
        $this->db->join('status as s', 's.nik = k.nik','left');
        $this->db->like('k.nik', $term);
        $this->db->or_like('k.namaLengkap', $term);
        $this->db->or_like('s.habisTanggal', $term);
        if(isset($_REQUEST['order'])) // here order processing
        {
        $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    function get_datatables(){
    $term = $_REQUEST['search']['value'];   
    $this->_get_datatables_query($term);
    if($_REQUEST['length'] != -1)
    $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
    $query = $this->db->get();
    return $query->result(); 
    }
    
    function count_filtered(){
    $term = $_REQUEST['search']['value']; 
    $this->_get_datatables_query($term);
    $query = $this->db->get();
    return $query->num_rows();  
    }
    
    public function count_all(){
    $this->db->from($this->table);
    return $this->db->count_all_results();  
    }
}
?>