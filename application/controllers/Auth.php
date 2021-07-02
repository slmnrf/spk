<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->Model('ModelLogin');
        $this->load->library('form_validation');
        // chek_seesion();
    }

	function login(){
      $this->load->view('login/Vlogin');
    } 

    function chek_login(    ){
        if (isset($_POST['submit'])) {
            $username= $this->input->post('username');
            $password= md5($this->input->post('password'));
            $result=$this->ModelLogin->chek($username,$password);
            if (!empty($result)) {
                $content = $this->ModelLogin->getDataLogin("where username = '$username'")->row_array();
                $data_session = array('username' => $content['userName'],
                                        'namaLengkap' => $content['namaLengkap'],
                                        'role' => $content['role']);
                    $this->session->set_userdata(array('status_login'=>'ok'));
                    $this->session->set_userdata('username',$data_session['username']);
                    $this->session->set_userdata('namaLengkap',$data_session['namaLengkap']);
                    $this->session->set_userdata('role',$data_session['role']);
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
        $dataakun = $this->ModelLogin->tampilAkun('login');
        $akses="";
        $no=1;
        $html['tabel'] = '<table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>';
                foreach($dataakun as $row){
                $html['tabel'] .='<tr> 
                    <td>'.$no++.'</td>
                    <td>'.$row->namaLengkap.'</td>
                    <td>'.$row->userName.'</td>
                    <td>'.$row->role.'</td>
                    <td><a href="#" onclick="javascipt: hapus('.$row->no.')"><i class="fa fa-eraser"></i></a></td>
                    </tr>';
                }
                $html['tabel'] .= '</tbody>
            </table>';
        $this->template->load('Template','login/contentKataSandi',$html);
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
            'role'     => $inputAkses,
        );
        $this->ModelLogin->simpan('login', $data);
        
        $dataakun = $this->ModelLogin->tampilAkun('login');
        $akses="";
        $no=1;
        $html = '<table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>';
                foreach($dataakun as $row){
                $html .='<tr> 
                    <td>'.$no++.'</td>
                    <td>'.$row->namaLengkap.'</td>
                    <td>'.$row->userName.'</td>
                    <td>'.$row->role.'</td>
                    <td><a href="#" onclick="javascipt: hapus('.$row->no.')"><i class="fa fa-eraser"></i></a></td>
                    </tr>';
                }
                $html .= '</tbody>
            </table>';
        echo $html;
    }

    function hapusAkun(){
        $no = $_GET['no'];
        $this->ModelLogin->hapus($no);
        redirect('kelolaakun');
    }
}
