<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_user extends CI_Model {

	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1 ($post['password']));

		$query = $this->db->get();
		return $query;
	}

	public function get($id = null){
		$this->db->from('user');
		if($id != null) {
			$this->db->where('id_user', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	//proess tambah data user
	public function tambahuser($post){
		$parem['name'] 		= $post['name'];
		$parem['username'] 	= $post['username'];
		$parem['password']	= sha1 ($post['password']);
		$parem['address']	= $post['address'];
		$parem['level'] 	= $post['level'];

		$this->db->insert('user', $parem);
	}

	//proess edit data user
	public function edituser($post){
		$parem['name'] 		= $post['name'];
		$parem['username'] 	= $post['username'];
		if(!empty($post['password'])){
			$parem['password']	= sha1 ($post['password']);
		}
		
		$parem['address']	= $post['address'] != "" ? $post ['address'] : null;
		$parem['level'] 	= $post['level'];

		$this->db->where('id_user', $post['id_user']);
		$this->db->update('user', $parem);
	}

	//proses hapus data user
	public function deleteuser($id){
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

}
