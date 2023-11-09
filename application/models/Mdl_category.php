<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_category extends CI_Model {

	public function get($id = null){
		$this->db->from('category');
		if($id != null) {
			$this->db->where('id_category', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function tambahcategory($post){
        $params = [
            'name'          => $post['category_name'],
        ];
        $this->db->insert('category', $params);

    }

	public function editcategory($post){
        $params = [
            'name'          => $post['category_name'],
        ];
		$this->db->where('id_category', $post['id_category']);
        $this->db->update('category', $params);

    }

    //proses hapus data user
	public function deletcategory($id){
		$this->db->where('id_category', $id);
		$this->db->delete('category');
	}

}
