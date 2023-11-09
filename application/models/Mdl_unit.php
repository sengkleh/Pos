<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_unit extends CI_Model {

	public function get($id = null){
		$this->db->from('unit');
		if($id != null) {
			$this->db->where('id_unit', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function tambahunit($post){
        $params = [
            'name'          => $post['unit_name'],
        ];
        $this->db->insert('unit', $params);

    }

	public function editunit($post){
        $params = [
            'name'          => $post['unit_name'],
        ];
		$this->db->where('id_unit', $post['id_unit']);
        $this->db->update('unit', $params);

    }

    //proses hapus data user
	public function deletunit($id){
		$this->db->where('id_unit', $id);
		$this->db->delete('unit');
	}

}
