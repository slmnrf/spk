<?php

Class ModelGuru extends CI_Model {
    var $nip;
    var $namaLengkap;
    var $table = 'guru'; //nama tabel dari database
    var $column_order = array(null, 'nip','namaLengkap','mapel',null); //field yang ada di table
    var $column_search = array('nip','namaLengkap','mapel'); //field yang diizin untuk pencarian 
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

    function tambahGuru($table,$data){
        return $this->db->insert($table,$data);
    }

    function autoNik(){
        $q = $this->db->query("SELECT MAX(LEFT(nik,1)) AS nik_max FROM karyawan");
        $kd = "";
        date_default_timezone_set('Asia/Jakarta');
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->nik_max)+1;
                $kd = sprintf($tmp);
            }
        }else{
            $kd = "1";
        }
        return $kd."-".date('y');
    }

function detailGuru($nip){
    $sql = "SELECT * FROM guru WHERE nip='$nip'";
    $detail = $this->db->query($sql)->row_Array();
    return $detail;
}

function cmbGuru($nip){
    $sql = "SELECT jenisKelamin, mapel FROM guru WHERE nip='$nip'";
    $data = $this->db->query($sql)->result();
    return $data;
}

function editData($table,$where,$data){
    $this->db->where($where);
    return $this->db->update($table,$data);
}

function hapus($table,$where){
    $this->db->where($where);
    $this->db->delete($table);
    return;
}

private function getTable(){
    return 'guru';
}

private function getData(){
    $data = array(
        'namaLengkap' => $this->namaLengkap
    );

    return $data;
}

public function getAll()
{
    $guru = array();
    $query = $this->db->get($this->getTable());
    if($query->num_rows() > 0){
        foreach ($query->result() as $row) {
            $guru[] = $row;
        }
    }
    return $guru;
}


public function insert()
{
    $this->db->insert($this->getTable(), $this->getData());
    return $this->db->insert_id();
}

public function update($where)
{
    $status = $this->db->update($this->getTable(), $this->getData(), $where);
    return $status;

}

public function delete($id)
{
    $this->db->where('nip', $id);
    return $this->db->delete($this->getTable());
}

public function getLastID(){
    $this->db->select('nip');
    $this->db->order_by('nip', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get($this->getTable());
    return $query->row();
}
public function getDataNilai($nip){
    $query = "SELECT a.*, b.*,c.namaKriteria FROM nilai as a, subkriteria as b, kriteria as c WHERE a.kdKriteria=b.kdKriteria AND a.nilai=b.nilai AND A.kdKriteria=c.kdKriteria AND a.nip='$nip' GROUP BY a.kdKriteria";
    $data = $this->db->query($query)->result();
    return $data;
}

}
?>