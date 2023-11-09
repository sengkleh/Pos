<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_stock extends CI_Model {

    //proses function get stok
    public function get($id = null){
        $this->db->from('stock');
        if ($id != null){
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    //proses delet stok dari model stok
    public function del($id){
        $this->db->where('id_stock', $id);
        $this->db->delete('stock');
    }

    // function get out stock
    public function get_stock_in(){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('item', 'stock.id_item = item.id_item');
        $this->db->join('supplier', 'supplier.id_supplier = supplier.id_supplier');
        $this->db->where('type','in');
        $this->db->order_by('id_stock','desc');
        $query = $this->db->get();
        return $query;
    }

	public function add_stock_in($post){
		$params = [
            'id_item'        => $post['id_item'],
            'type'           => 'in',
            'detail'         => $post['stock_description'],
            'id_supplier'    => $post['stock_supplier'] =='' ? null : $post['stock_supplier'],
            'qty'            => $post['stock_qty'],
            'date'           => $post['date'],
            'id_user'        => $this->session->userdata('id_user'),
        ];
        $this->db->insert('stock', $params);
	}
    // end function get out stock


    // function get out stock
    public function get_stock_out(){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('item', 'stock.id_item = item.id_item');
        $this->db->join('supplier', 'supplier.id_supplier = supplier.id_supplier');
        $this->db->where('type','out');
        $this->db->order_by('id_stock','desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post){
		$params = [
            'id_item'        => $post['id_item'],
            'type'           => 'out',
            'info'           => $post['stock_description'],
            'id_supplier'    => $post['stock_supplier'] =='' ? null : $post['stock_supplier'],
            'qty'            => $post['stock_qty'],
            'date'           => $post['date'],
            'id_user'        => $this->session->userdata('id_user'),
        ];
        $this->db->insert('stock', $params);
	}
    // end function get out stock

  
}