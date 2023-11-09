<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_supplier extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model('Mdl_supplier');
        
	}

	//proses supplier
	public function index(){

        $data['row'] = $this->Mdl_supplier->get();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/supplier/supplier_data', $data);
		$this->load->view('template/footer');
	}

    //proses tambah supplier
    public function tambahsupplier(){
  
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->nama = null;
        $supplier->phone = null;
        $supplier->address = null;
		$supplier->description = null;
		$supplier->create = null;
		$supplier->update = null;
        $data = array (
            'page'  => 'Tambah',
            'row'   => $supplier
        );
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/supplier/supplier_form', $data);
			$this->load->view('template/footer');
    }

	//proses edit supplier
	public function editsupplier($id){
		$query = $this->Mdl_supplier->get($id);
		if($query->num_rows() > 0){
			$supplier = $query->row();
			$data = array (
				'page'  => 'Update',
				'row'   =>  $supplier
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/supplier/supplier_form', $data);
			$this->load->view('template/footer');
		}else{
			echo "<script>
					alert ('Data Tidak Ditemukan');
				  </script>";
			echo "<script>
					window.location='".site_url('Ctr_supplier')."';
				  </script>";
		}
	}

    public function prosess(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->Mdl_supplier->tambahsupplier($post);
        }else 
			if(isset($_POST['Update'])){
            	$this->Mdl_supplier->editsupplier($post);
        }

        if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'berhasil disimpan');
		}
			echo "<script>
					window.location='".site_url('Ctr_supplier')."';
				  </script>";
			
    }

    // proses hapus data supplier
	public function deletsupplier(){
		$id = $this->input->post('id_supplier');
		$this->Mdl_supplier->deletsupplier($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
			echo "<script>
					window.location='".site_url('Ctr_supplier')."';
				  </script>";

	}
}
