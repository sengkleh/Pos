<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_item extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model(['Mdl_item','Mdl_category','Mdl_unit']); //penambahan load model diarray
        
	}

	//proses item
	public function index(){

        $data['row'] = $this->Mdl_item->get(); 

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/item/item_data', $data);
		$this->load->view('template/footer');
	}

    //proses tambah item
    public function tambahitem(){
  
        $item = new stdClass();
        $item->id_item = null;
		$item->barcode = null;
        $item->name = null;
		$item->price = null;
		$item->id_category = null;
		$item->image = null;

		//cara pertama menggunakan select dicontroler
		$query_category = $this->Mdl_category->get();

		//cara kedua menggunakan select dicontroler dan harus menambahkan form di autolod helper
		$query_unit = $this->Mdl_unit->get();
		$unit[null] = '- Pilih -';
		foreach ($query_unit->result() as $key=> $unt) {
			$unit[$unt->id_unit] = $unt->name;
		}
		
        $data = array (
            'page'  	=> 'Tambah',
            'row'   	=> $item,
			//cara pertama menggunakan select penambahan diarray
			'category'	=> $query_category,
			//cara kedua menggunakan select penambahan di array
			'unit'		=> $unit, 'selectedunit' => null,
        );
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/item/item_form', $data);
			$this->load->view('template/footer');
    }

	//proses edit item
	public function edititem($id){
		$query = $this->Mdl_item->get($id);
		if($query->num_rows() > 0){
			$item = $query->row();
			//cara pertama menggunakan select dicontroler
			$query_category = $this->Mdl_category->get();

			//cara kedua menggunakan select dicontroler dan harus menambahkan form di autolod helper
			$query_unit = $this->Mdl_unit->get();
			$unit[null] = '- Pilih -';
			foreach ($query_unit->result() as $key=> $unt) {
				$unit[$unt->id_unit] = $unt->name;
			}
			$data = array (
				'page'  	=> 'Update',
				'row'   	=> $item,
				//cara pertama menggunakan select penambahan diarray
				'category'	=> $query_category,
				//cara kedua menggunakan select penambahan di array
				'unit'		=> $unit, 'selectedunit' => $item->id_unit,
				
			);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('template/item/item_form', $data);
			$this->load->view('template/footer');
		}else{
			echo "<script>
					alert ('Data Tidak Ditemukan');
				  </script>";
			echo "<script>
					window.location='".site_url('Ctr_item')."';
				  </script>";
		}
	}

	//function proses
    public function prosess(){

		//proses image
		$config['upload_path']          = './uploads/product';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['file_name']			= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);

		$this->load->library('upload', $config);
		//end proses image

        $post = $this->input->post(null, TRUE);
		//if tambah
        if(isset($_POST['Tambah'])){
			//proses barcode
			if($this->Mdl_item->check_barcode($post['item_barcode'])->num_rows() > 0){
				$this->session->set_flashdata('success', 'Barcode Sudah dipake');

				echo "<script>
						window.location='".site_url('Ctr_item')."';
					</script>";
			//end proses barcode

			//proses pengecualian image
			}else{
				if(@$_FILES['item_foto']['name'] != null ){
					if($this->upload->do_upload('item_foto')){
						$post['item_foto'] = $this->upload->data('file_name');
						$this->Mdl_item->tambahitem($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'data berhasil disimpan');
						}
							redirect('Ctr_item');
					}else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', 'data gagal upload');
						redirect('Ctr_item/tambahitem');
					}
				}else{
					$post['item_image'] = null;
						$this->Mdl_item->tambahitem($post);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'berhasil disimpan');
						}
							redirect('Ctr_item');
				}
			//end proses pengecualian image	
			}
            
        }else 
			if(isset($_POST['Update'])){
				//proses update barcode
				if($this->Mdl_item->check_barcode($post['item_barcode'], $post['id_item'])->num_rows() > 0){
					$this->session->set_flashdata('success', 'Barcode Sudah dipake');
				echo "<script>
						window.location='".site_url('Ctr_item')."';
					  </script>";	
				}else{
					// proses update image
					if(@$_FILES['item_foto']['name'] != null ){
						if($this->upload->do_upload('item_foto')){

							$item = $this->Mdl_item->get($post['id'])->row();
							if($item->item_foto != null){
								$target_file = './uploads/product'.$item->item_foto;
								unlink($target_file);
							}

							$post['item_foto'] = $this->upload->data('file_name');
							$this->Mdl_item->edititem($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('success', 'data berhasil disimpan');
							}
								redirect('Ctr_item');
						}else{
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', 'data gagal upload');
							redirect('Ctr_item/tambahitem');
						}
					}else{
						$post['item_image'] = null;
							$this->Mdl_item->edititem($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('success', 'berhasil disimpan');
							}
								redirect('Ctr_item');
					}
					// end proses update image
					
				}            
				//end proses update barcode
        }
		//end if tambah
        		
    }
	//end function proses

    // fungtion hapus data item
	public function deletitem(){
		$id = $this->input->post('id_item');
		$this->Mdl_item->deletitem($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil dihapus');
		}
			echo "<script>
					window.location='".site_url('Ctr_item')."';
				  </script>";

	}
	//function proses delete

	//fungsi barcode
	function barcode_qrcode($id){
		$data['row'] = $this->Mdl_item->get($id)->row();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/item/barcode_qrcode', $data);
		$this->load->view('template/footer');
	}
	//end fungsi barcode

	//fungsi proses qr-code generation
	function qr_code(){
		
	}
	// end

	//fungsi proses Print PDFDom
	function barcode_print($id){
		$data['row'] = $this->Mdl_item->get($id)->row();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$html = $this->load->view('template/item/barcode_print', $data, true);
		$this->fungsi->PdfGeneration($html, 'barcode', $data['row']->barcode, 'A4', 'landscape');
	}
	//end fungsi proses Print PDFDom
}
