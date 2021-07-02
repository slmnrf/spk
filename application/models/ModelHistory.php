<?php

class ModelHistory extends CI_Model{
    var $table = 'history'; //nama tabel dari database
    var $column_order = array(null, 'datePrint',null); //field yang ada di table
    var $column_search = array('datePrint'); //field yang diizin untuk pencarian 
    var $order = array('datePrint' => 'asc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->dbforge();
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
            $this->db->group_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->group_by(key($order), $order[key($order)]);
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

//============================================================== HISTORY ====================================================================================================
//=============================================================================================================================================================================

    private function getTableHistory(){
        return 'history';
    }

    public function insertHistory($data)
    {
        $status = $this->db->insert($this->getTableHistory(), $data);
        return $status;
    }

    public function getAllHistory($s)
    {
        $query = $this->db->query(
            "select a.Guru, a.kdKriteria, a.nilai, b.namaKriteria from history a, historykriteria b where a.kdKriteria=b.kdKriteria AND a.datePrint=b.datePrint AND a.datePrint='$s'"
        );
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $history[] = $row;
            }
            return $history;
        }
    }

    public function update($data, $where)
    {
        $this->db->update($this->getTableHistory(),$data,$where);
    }

    public function getSortTotalByDesc()
    {
        $this->db->order_by('Total', 'DESC');
        $query = $this->db->get($this->getTableHistory());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $datahistory[] = $row;
            }
            return $datahistory;
        }
    }

    public function addColumnTotalRangking()
    {
        $fields = array(
            'Total  DECIMAL(13,2)',
            'Rangking  INT'
        );
        $this->dbforge->add_column($this->getTable(), $fields);
    }

//============================================================== HISTORY KRITERIA ====================================================================================================
//=============================================================================================================================================================================

    private function getTableHistoryKriteria(){
        return 'historykriteria';
    }

    public function insertHistoryKriteria($data)
    {
        $status = $this->db->insert($this->getTableHistoryKriteria(), $data);
        return $status;
    }

    public function getAllHistoryKriteria($s)
    {
        $query = $this->db->query(
            "select kdKriteria, namaKriteria, sifat, bobot from historykriteria where datePrint='$s'"
        );
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $history[] = $row;
            }
            return $history;
        }
    }

    public function getBobotKriteria($s)
    {
        $query = $this->db->query("select namaKriteria, bobot from historykriteria where datePrint='$s'");
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $bobot[] = $row;
            }
            return $bobot;
        }
    }

    //======================================================================================================================================================
    //========================================================== HISTORYTEMP ===============================================================================
    private function getTable()
    {
        return 'historytemp';
    }
    public function createTable()
    {
        $fields = array(
            'datePrint VARCHAR(120) not null',
            'Guru VARCHAR(120) not null',
            'kdKriteria INT(11) not null',
            'nilai INT(11) not null'
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('historytemp');
    }

    public function deleteTable(){
        $this->dbforge->drop_table('historytemp');
    }

    public function insert($data)
    {
        $status = $this->db->insert($this->getTable(), $data);
        return $status;
    }

    public function getAll()
    {
        $query = $this->db->get($this->getTable());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $historytemp[] = $row;
            }
            return $historytemp;
        }
    }

    public function getStatus($key)
    {
        $this->db->select('sifat');
        $this->db->where('namaKriteria',$key);
        $query = $this->db->get('kriteria');
        return $query->row();
    }



    public function dropTable()
    {
        $this->dbforge->drop_table($this->getTable(),TRUE);
    }

    public function getNilaiHistoryTemp()
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

    //=============================================================================================================================================================
    //========================================================== KRITERIA TEMP =====================================================================================

    private function getTableKriteriaTemp()
    {
        return 'kriteriatemp';
    }
    public function createTableKriteriaTemp()
    {
        $fields = array(
            'datePrint VARCHAR(120) not null',
            'kdKriteria INT(11) not null',
            'namaKriteria VARCHAR(120) not null',
            'sifat CHAR(2) not null',
            'bobot INT(11) not null'
        );

        $this->dbforge->add_field($fields);
        $this->dbforge->create_table('kriteriatemp');
    }

    public function getAllKriteriaTemp()
    {
        $query = $this->db->get($this->getTableKriteriaTemp());
        if($query->num_rows() > 0){
            foreach ( $query->result() as $row) {
                $historytemp[] = $row;
            }
            return $historytemp;
        }
    }

    public function insertKriteriaTemp($data)
    {
        $status = $this->db->insert($this->getTableKriteriaTemp(), $data);
        return $status;
    }
    
    public function dropTableKriteriaTemp()
    {
        $this->dbforge->drop_table($this->getTableKriteriaTemp(),TRUE);
    }


    //FUNGSI UNTUK MEMINDAHKAN DATA HISTORY SEMENTARA KE TABEL HISTORY
    public function getAllDataTemp(){
        $queryhistorytemp = $this->db->get($this->getTable());
        $querykriteriatemp = $this->db->get($this->getTableKriteriaTemp());
        foreach ($queryhistorytemp->result() as $row) {
            $this->db->insert($this->getTableHistory(),$row);
        }
        foreach ($querykriteriatemp->result() as $row) {
            $this->db->insert($this->getTableHistoryKriteria(),$row);
        }
    }

    public function deleteHistory($table,$id)
    {
        $this->db->where('datePrint', $id);
        return $this->db->delete($table);
    }

}