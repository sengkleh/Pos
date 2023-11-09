<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_user extends CI_Controller {

	function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model('Mdl_user');
		// form validasi ada di library form_validasi
		$this->load->library('form_validation');
		
	}

	//proses dashboard
	public function index()
	{
		$data['row'] = $this->Mdl_user->get();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
        $this->load->view('template/navbar');
		$this->load->view('template/user/user_data', $data);
		$this->load->view('template/footer');

	}

	//proses tambah user
	public function tambahuser(){
		//test print post
		//print_r($_POST['username']);


		//contoh validai required
		$this->form_validation->set_rules('name', 'Nama', 'required|is_unique[user.nama]');
		$this->form_validation->set_rules('username', 'Username', 'required');
		//contoh min_length validai
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		//contoh min_length validai dan (macthes) pass tdk sesuai & costem informasi
		$this->form_validation->set_rules('reppas', 'Konfirmasi Password', 'required|min_length[5]|matches[password]',	
		array('matches' => ' %s Passwor Tidak Sesuai')	
		);
		$this->form_validation->set_rules('level', 'Level', 'required');


		// bisa set secara langsung berdasarkan kareakter validasi
		//$this->form_validation->set_message('required', '%s Passwor Tidak Sesuai');
		//$this->form_validation->set_message('is_unique', {files} Passwor sudah dipake');

		//contoh blok input file merah semua
		//$this->form_validation->set_error_delimiters('<span class ="help-block">','</spam>');

		//jika validasi kosong redirect
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('template/navbar');
				$this->load->view('template/user/user_tambah');
				$this->load->view('template/footer');
		}
		else
		{		
			//jika validasi benar redirect
			$post = $this->input->post(null, TRUE);
			$this->Mdl_user->tambahuser($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>
						alert ('Data Berhasil Disimpan');
					  </script>";
			}
				echo "<script>
						window.location='".site_url('Ctr_user')."';
					  </script>";
		}
		
	}

	//proses edit user
	public function edituser(){
		//test print post
		//print_r($_POST['username']);

		//contoh validai required
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
		
		if ($this->input->post('password')){
			//contoh min_length validai
			$this->form_validation->set_rules('password', 'Password', '|min_length[5]');
			//contoh min_length validai dan (macthes) pass tdk sesuai & costem informasi
			$this->form_validation->set_rules('reppas', 'Konfirmasi Password', '|min_length[5]|matches[password]',	
			array('matches' => ' %s Passwor Tidak Sesuai')	
			);
		}

		if ($this->input->post('reppas')){
			//contoh min_length validai dan (macthes) pass tdk sesuai & costem informasi
			$this->form_validation->set_rules('reppas', 'Konfirmasi Password', '|min_length[5]|matches[password]',	
			array('matches' => ' %s Passwor Tidak Sesuai')	
			);
		}
		//contoh min_length validai
		$this->form_validation->set_rules('password', 'Password', '|min_length[5]');
		//contoh min_length validai dan (macthes) pass tdk sesuai & costem informasi
		$this->form_validation->set_rules('reppas', 'Konfirmasi Password', '|min_length[5]|matches[password]',	
		array('matches' => ' %s Passwor Tidak Sesuai')	
		);
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		//jika validasi kosong redirect
		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->Mdl_user->get();
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->load->view('template/header');
				$this->load->view('template/sidebar');
				$this->load->view('template/navbar');
				$this->load->view('template/user/user_edit', $data);
				$this->load->view('template/footer');
			}else {
				echo "<script> alert ('Data Tidak Ditemukan');<script>";
				echo "<script>window.location='".site_url('Ctr_user')."';</script>";
			}			
		}
		else
		{		
			//jika validasi benar redirect
			$post = $this->input->post(null, TRUE);
			$this->Mdl_user->edituser($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert ('Data Berhasil Disimpan');</script>";
			}
				echo "<script>window.location='".site_url('Ctr_user')."';</script>";
		}		
	}

	function username_check(){
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s Username sudah dipake silahkan ganti');
			return FALSE;
		}else {
			return TRUE;
		}
	}

	// proses hapus data user
	public function deleteuser(){
		$id = $this->input->post('id_user');
		$this->Mdl_user->deleteuser($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>
					alert ('Data Berhasil Dihapus');
				  </script>";
		}
			echo "<script>
					window.location='".site_url('Ctr_user')."';
				  </script>";

	}

}
