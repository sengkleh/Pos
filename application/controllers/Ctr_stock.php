<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_stock extends CI_Controller {
    function __construct(){
		parent :: __construct();
		//fungsi sebelum login difolder helper
		check_not_login();
		user_login();
		$this->load->model(['Mdl_item','Mdl_supplier','Mdl_stock']);
		       
	}

	//proses stock menggunakan pemanggilan router
	public function stock_in_data(){
		$data ['row'] = $this->Mdl_stock->get_stock_in()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/transaction/stock_in/stock_in_data', $data);
		$this->load->view('template/footer');
	}

	public function stock_in_add(){
		$item = $this->Mdl_item->get()->result();
		$supplier = $this->Mdl_supplier->get()->result();

		//penambahan data supplier
		$data = [
				'item' 		=>$item, 
				'supplier' 	=>$supplier ];

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/transaction/stock_in/stock_in_form', $data);
		$this->load->view('template/footer');
	}

	//proses function delet stok dan qty 
	public function stock_in_del(){
		//proses ambil dari parameter url
		$id_stock = $this->uri->segment(4);
		$id_item = $this->uri->segment(5);
		//end proses ambil dari parameter url
		
		$qty = $this->Mdl_stock->get($id_stock)->row()->qty;
		$data = ['stock_qty' => $qty, 'id_item' => $id_item];

		//proses get dari function model item 
		$this->Mdl_item->update_stock_out($data);
		//end proses get stok dari model stok

		//proses delet stok dari model stok
		$this->Mdl_stock->del($id_stock);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Stok Berhasil dihapus');
		}
		//end proses delet stok dari model stok
		redirect('Ctr_stock/in');
	}
	//end proses function delet stok dan qty 



	public function stock_out_data(){
		$data ['row'] = $this->Mdl_stock->get_stock_out()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/transaction/stock_out/stock_out_data', $data);
		$this->load->view('template/footer');
	}

	public function stock_out_add(){
		$item = $this->Mdl_item->get()->result();
		$supplier = $this->Mdl_supplier->get()->result();

		//penambahan data supplier
		$data = [
				'item' 		=>$item, 
				'supplier' 	=>$supplier ];

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('template/transaction/stock_out/stock_out_form', $data);
		$this->load->view('template/footer');
	}

	//proses function delet stok dan qty 
	public function stock_out_del(){
		//proses ambil dari parameter url
		$id_stock = $this->uri->segment(4);
		$id_item = $this->uri->segment(5);
		//end proses ambil dari parameter url
		
		$qty = $this->Mdl_stock->get($id_stock)->row()->qty;
		$data = ['stock_qty' => $qty, 'id_item' => $id_item];

		//proses get dari function model item 
		$this->Mdl_item->update_stock_out($data);
		//end proses get stok dari model stok

		//proses delet stok dari model stok
		$this->Mdl_stock->del($id_stock);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Stok Berhasil dihapus');
		}
		//end proses delet stok dari model stok
		redirect('Ctr_stock/out');
	}
	//end proses function delet stok dan qty 



	//proses function stock 
	public function prosess(){		
        if(isset($_POST['in_add'])){
			$post = $this->input->post(null, TRUE);
			$this->Mdl_stock->add_stock_in($post);
			$this->Mdl_item->update_stock_in($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Stok Berhasil disimpan');
			}
			redirect('Ctr_stock/in');
			
        }else if(isset($_POST['out_add'])){
			$post = $this->input->post(null, TRUE);
			$this->Mdl_stock->add_stock_out($post);
			$this->Mdl_item->update_stock_out($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data Stok Berhasil disimpan');
			}
			redirect('Ctr_stock/out');
	}
	//end proses function stock 
	}

	

}