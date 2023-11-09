<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_dashboard extends CI_Controller {

	//proses dashboard
	public function index()
	{
		//fungsi sebelum login difolder helper
		check_not_login();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/dashboard');
		$this->load->view('template/footer');

	}
}
