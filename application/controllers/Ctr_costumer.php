<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_costumer extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model('Mdl_costumer');
        
	}

	//proses costumer
	public function index(){

        $data['row'] = $this->Mdl_costumer->get();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/costumer/costumer_data', $data);
		$this->load->view('template/footer');
	}

    //proses tambah costumer
    public function tambahcostumer(){
  
        $costumer = new stdClass();
        $costumer->id_costumer = null;
        $costumer->name = null;
        $costumer->gender = null;
		$costumer->phone = null;
        $costumer->address = null;
		$costumer->create = null;
		$costumer->update = null;
        $data = array (
            'page'  => 'Tambah',
            'row'   => $costumer
        );
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/costumer/costumer_form', $data);
			$this->load->view('template/footer');
    }

	//proses edit costumer
	public function editcostumer($id){
		$query = $this->Mdl_costumer->get($id);
		if($query->num_rows() > 0){
			$costumer = $query->row();
			$data = array (
				'page'  => 'Update',
				'row'   =>  $costumer
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/costumer/costumer_form', $data);
			$this->load->view('template/footer');
		}else{
			echo "<script>
					alert ('Data Tidak Ditemukan');
				  </script>";
			echo "<script>
					window.location='".site_url('Ctr_costumer')."';
				  </script>";
		}
	}

    public function prosess(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->Mdl_costumer->tambahcostumer($post);
        }else 
			if(isset($_POST['Update'])){
            	$this->Mdl_costumer->editcostumer($post);
        }

        if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Ditambahankan');
		}
			echo "<script>
					window.location='".site_url('Ctr_costumer')."';
				  </script>";
			
    }

    // proses hapus data costumer
	public function deletcostumer(){
		$id = $this->input->post('id_costumer');
		$this->Mdl_costumer->deletcostumer($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
			echo "<script>
					window.location='".site_url('Ctr_costumer')."';
				  </script>";

	}
}
