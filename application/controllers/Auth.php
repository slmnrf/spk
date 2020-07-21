<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('modelLogin');
        $this->load->library('form_validation');
        // chek_seesion();
    }

	function login(){
      $this->load->view('login/Vlogin');
    } 

    function chek_login(){
        if (isset($_POST['submit'])) {
            $username= $this->input->post('username');
            $password= md5($this->input->post('password'));
            $result=$this->modelLogin->chek($username,$password);
            if (!empty($result)) {
                $content = $this->modelLogin->getDataLogin("where userName = '$username'")->row_array();
                $data_session = array('username' => $content['username'],
                                        'namaLengkap' => $content['namaLengkap']);
                    $this->session->set_userdata(array('status_login'=>'ok'));
                    $this->session->set_userdata('username',$data_session['username']);
                    $this->session->set_userdata('namaLengkap',$data_session['namaLengkap']);
                    redirect(base_url('dashboard'),$data_session);
            }else{
                $this->session->set_flashdata('gagal','username dan password yang anda masukan salah !!!');
                redirect(base_url("login"));
            }
        }else{
                $this->load->view('login/Vlogin');
        }
    } 

    function logout(){
        $this->session->sess_destroy();
        $this->load->view('login/Vlogin');
    }

    function kelolaakun(){        
        $dataakun = $this->modelLogin->tampilAkun('login');
        $akses="";
        $no=1;
        $html['tabel'] = '<table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Hak Akses</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>';
                foreach($dataakun as $row){
                if($row->hakAkses == '1'){
                    $akses = "HRD";
                }else{
                    $akses = "SDM Produksi";
                }
                $html['tabel'] .='<tr> 
                    <td>'.$no++.'</td>
                    <td>'.$row->namaLengkap.'</td>
                    <td>'.$row->userName.'</td>
                    <td>'.$akses.'</td>
                    <td><a href="#" onclick="javascipt: hapus('.$row->no.')"><i class="fa fa-eraser"></i></a></td>
                    </tr>';
                }
                $html['tabel'] .= '</tbody>
            </table>';
        $this->template->load('template','login/contentKataSandi',$html);
    }

    function tambahAkun() {          
        $namaLengkap = $_GET['namaLengkap'];
        $username = $_GET['username'];
        $password = $_GET['password'];
        $inputAkses = $_GET['inputAkses'];

        $data = array(
            'namaLengkap' => $namaLengkap,
            'userName'      => $username,
            'password'     => md5($password),
            'hakAkses' => $inputAkses
        );
        $this->modelLogin->simpan('login', $data);
        
        $dataakun = $this->modelLogin->tampilAkun('login');
        $akses="";
        $no=1;
        $html = '<table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Hak Akses</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>';
                foreach($dataakun as $row){
                if($row->hakAkses == '1'){
                    $akses = "HRD";
                }else{
                    $akses = "SDM Produksi";
                }
                $html .='<tr> 
                    <td>'.$no++.'</td>
                    <td>'.$row->namaLengkap.'</td>
                    <td>'.$row->userName.'</td>
                    <td>'.$akses.'</td>
                    <td><a href="#" onclick="javascipt: hapus('.$row->no.')"><i class="fa fa-eraser"></i></a></td>
                    </tr>';
                }
                $html .= '</tbody>
            </table>';
        echo $html;
    }

    function hapusAkun(){
        $no = $_GET['no'];
        $this->modelLogin->hapus($no);
        redirect('kelolaakun');
    }
}
