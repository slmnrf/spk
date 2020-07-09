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
}
