<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_unit extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model('Mdl_unit');
        
	}

	//proses unit
	public function index(){

        $data['row'] = $this->Mdl_unit->get();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/unit/unit_data', $data);
		$this->load->view('template/footer');
	}

    //proses tambah unit
    public function tambahunit(){
  
        $unit = new stdClass();
        $unit->id_unit = null;
        $unit->name = null;
        $data = array (
            'page'  => 'Tambah',
            'row'   => $unit
        );
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/unit/unit_form', $data);
			$this->load->view('template/footer');
    }

	//proses edit unit
	public function editunit($id){
		$query = $this->Mdl_unit->get($id);
		if($query->num_rows() > 0){
			$unit = $query->row();
			$data = array (
				'page'  => 'Update',
				'row'   =>  $unit
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/unit/unit_form', $data);
			$this->load->view('template/footer');
		}else{
			echo "<script>
					alert ('Data Tidak Ditemukan');
				  </script>";
			echo "<script>
					window.location='".site_url('Ctr_unit')."';
				  </script>";
		}
	}

    public function prosess(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->Mdl_unit->tambahunit($post);
        }else 
			if(isset($_POST['Update'])){
            	$this->Mdl_unit->editunit($post);
        }

        if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan !!!');
		}
			redirect ('Ctr_unit');
			
    }

    // proses hapus data unit
	public function deletunit(){
		$id = $this->input->post('id_unit');
		$this->Mdl_unit->deletunit($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>
					alert ('Data Berhasil Dihapus');
				  </script>";
		}
			echo "<script>
					window.location='".site_url('Ctr_unit')."';
				  </script>";

	}
}
