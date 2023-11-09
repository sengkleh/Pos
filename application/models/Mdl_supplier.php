<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_supplier extends CI_Model {

	public function get($id = null){
		$this->db->from('supplier');
		if($id != null) {
			$this->db->where('id_supplier', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function tambahsupplier($post){
        $params = [
            'nama'          => $post['supplier_name'],
            'phone'         => $post['supplier_phone'],
            'address'       => $post['supplier_address'],
			'description'	=> $post['supplier_description'],
			'create'		=> $post['supplier_create'],
			'update'		=> $post['supplier_update'],
        ];
        $this->db->insert('supplier', $params);

    }

	public function editsupplier($post){
        $params = [
            'nama'          => $post['supplier_name'],
            'phone'         => $post['supplier_phone'],
            'address'       => $post['supplier_address'],
			'description'	=> $post['supplier_description'],
			'create'		=> $post['supplier_create'],
			'update'		=> $post['supplier_update'],
        ];
		$this->db->where('id_supplier', $post['id_supplier']);
        $this->db->update('supplier', $params);

    }

    //proses hapus data user
	public function deletsupplier($id){
		$this->db->where('id_supplier', $id);
		$this->db->delete('supplier');
	}

}
