<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct() {
        parent::__construct();
        chek_seesion();
    }

	public function index()
	{
		$this->template->load('template','karyawan/contentKaryawan');
	}
}
