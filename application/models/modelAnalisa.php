<?php

Class ModelAnalisa extends CI_Model {
    var $table = 'guru'; //nama tabel dari database
    var $column_order = array(null, 'nip','namaLengkap',null); //field yang ada di table
    var $column_search = array('nip','namaLengkap'); //field yang diizin untuk pencarian 
    var $order = array('nip' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);

        $i = 0;
    
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
        
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function detail($nip){
        $query = "SELECT * FROM guru WHERE nip='$nip'";
        return $this->db->query($query)->row_Array();
        
    }

    function detailkriteria(){
        $query = "select a.kdKriteria, a.namaKriteria, a.sifat, a.bobot, b.kdSubKriteria,b.subKriteria from kriteria as a, subKriteria as b where a.kdKriteria=b.kdKriteria"; 
        $data = $this->db->query($query)->result_array();
        return $data;  
    }
}
?>