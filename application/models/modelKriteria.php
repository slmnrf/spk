<?php

Class modelKriteria extends CI_Model {
    public $kdKriteria;
    public $kriteria;
    public $sifat;
    public $bobot;
    public $kdSubKriteria;
    public $subKriteria;
    public $value;

    var $table = 'kriteria'; //nama tabel dari database
    var $column_order = array(null, 'kdKriteria','namaKriteria','sifat','bobot',null); //field yang ada di table
    var $column_search = array('kdKriteria','namaKriteria','sifat','bobot'); //field yang diizin untuk pencarian 
    var $order = array('kdKriteria' => 'asc'); // default order 

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
    
    private function getTable()
    {
        return 'kriteria';
    }

    private function getTablesub()
    {
        return 'subkriteria';
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $kriterias[] = $row;
            }
            return $kriterias;
        }
    }

    public function getById()
    {
        $this->db->from($this->getTable());
        $this->db->where('kdKriteria',$this->kdKriteria);
        $query = $this->db->get();
        return $query->row();
    }

    public function getByIdSub()
    {
        $this->db->where('kdKriteria', $this->kdKriteria);
        $query = $this->db->get($this->getTablesub());

        if($query->num_rows() > 0){
            foreach ($query->result() as $row) {
                $subkriteria[] = $row;
            }

            return $subkriteria;
        }
    }
    
    public function getLastID(){
        $this->db->select('kdKriteria');
        $this->db->order_by('kdKriteria', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get($this->getTable());
        return $query->row();
    }

    private function getData(){
        $data = array(
            'namaKriteria' => $this->kriteria,
            'sifat' => $this->sifat,
            'bobot' => $this->bobot
        );

        return $data;
    }

    private function getDataSub(){
        $data = array(
            'kdKriteria' => $this->kdKriteria,
            'subKriteria' => $this->subKriteria,
            'nilai' => $this->value
        );
        return $data;
    }
    public function insert()
    {
        $this->db->insert($this->getTable(), $this->getData());
        return $this->db->insert_id();
    }

    public function subinsert()
    {
        $this->db->insert($this->getTableSub(), $this->getDataSub());
        return $this->db->insert_id();
    }

    public function update($where)
    {
        $this->db->update($this->getTable(), $this->getData(), $where);
        return $this->db->affected_rows();
    }

    public function updatesub()
    {
        $data = $this->getDataSub();
        $this->db->where('kdSubKriteria', $this->kdSubKriteria);
        $this->db->where('kdKriteria', $this->kdKriteria);
        $this->db->update($this->getTablesub(), $data);
        return $this->db->affected_rows();
    }
    
    function detail($kdKriteria){
        $query = "select a.kdKriteria, a.namaKriteria, a.sifat, a.bobot, b.kdSubKriteria,b.subKriteria from kriteria as a, subKriteria as b where a.kdKriteria=b.kdKriteria and a.kdKriteria='$kdKriteria'"; 
        $data = $this->db->query($query)->result_array();
        return $data;  

    }

    public function delete($id, $table)
    {
        $this->db->where('kdKriteria', $id);
        return $this->db->delete($table);
    }

    public function getBobotKriteria()
    {
        $query = $this->db->query('select namaKriteria, bobot from kriteria');
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $bobot[] = $row;
            }
            return $bobot;
        }
    }

}
?>