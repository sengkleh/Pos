<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_costumer extends CI_Model {

	public function get($id = null){
		$this->db->from('costumer');
		if($id != null) {
			$this->db->where('id_costumer', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function tambahcostumer($post){
        $params = [
            'name'          => $post['costumer_name'],
            'phone'         => $post['costumer_phone'],
            'address'       => $post['costumer_address'],
			'gender'    	=> $post['costumer_gender'],
			'create'		=> $post['costumer_create'],
			'update'		=> $post['costumer_update'],
        ];
        $this->db->insert('costumer', $params);

    }

	public function editcostumer($post){
        $params = [
            'name'          => $post['costumer_name'],
            'phone'         => $post['costumer_phone'],
            'address'       => $post['costumer_address'],
			'gender'	    => $post['costumer_gender'],
			'create'		=> $post['costumer_create'],
			'update'		=> $post['costumer_update'],
        ];
		$this->db->where('id_costumer', $post['id_costumer']);
        $this->db->update('costumer', $params);

    }

    //proses hapus data user
	public function deletcostumer($id){
		$this->db->where('id_costumer', $id);
		$this->db->delete('costumer');
	}

}
