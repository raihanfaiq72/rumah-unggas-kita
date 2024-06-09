<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->cek_login();
	}
	public function index()
	{
		// $this->load->helper('api');
		$data = array(
			"judul"			=> "Contoh Halaman",
			"keterangan"	=> "Contoh Keterangan",
			"halaman"		=> "dasbor",
			"view"			=> "dasbor",
		);
		$this->load->view('template', $data);
	}
}
