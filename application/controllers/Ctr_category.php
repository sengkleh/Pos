<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_category extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model('Mdl_category');
        
	}

	//proses category
	public function index(){

        $data['row'] = $this->Mdl_category->get();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/category/category_data', $data);
		$this->load->view('template/footer');
	}

    //proses tambah category
    public function tambahcategory(){
  
        $category = new stdClass();
        $category->id_category = null;
        $category->name = null;
        $data = array (
            'page'  => 'Tambah',
            'row'   => $category
        );
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/category/category_form', $data);
			$this->load->view('template/footer');
    }

	//proses edit category
	public function editcategory($id){
		$query = $this->Mdl_category->get($id);
		if($query->num_rows() > 0){
			$category = $query->row();
			$data = array (
				'page'  => 'Update',
				'row'   =>  $category
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/category/category_form', $data);
			$this->load->view('template/footer');
		}else{
			echo "<script>
					alert ('Data Tidak Ditemukan');
				  </script>";
			echo "<script>
					window.location='".site_url('Ctr_category')."';
				  </script>";
		}
	}

    public function prosess(){
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['Tambah'])){
            $this->Mdl_category->tambahcategory($post);
        }else 
			if(isset($_POST['Update'])){
            	$this->Mdl_category->editcategory($post);
        }

        if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Ditambahkan');
		}
			echo "<script>
					window.location='".site_url('Ctr_category')."';
				  </script>";
			
    }

    // proses hapus data category
	public function deletcategory(){
		$id = $this->input->post('id_category');
		$this->Mdl_category->deletcategory($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
		}
			echo "<script>
					window.location='".site_url('Ctr_category')."';
				  </script>";

	}
}
