<?php
class Product_model extends CI_model{

	function all(){
		return $products = $this->db->get('product')->result_array();
	}
	function create($formArray){
		$this->db->insert("product",$formArray);
	}
	function getProductById($p_code){
		$this->db->where('p_code',$p_code);
		return $product = $this->db->get('product')->row_array();
	}
	function updateProduct($p_code,$formArray){
		log_message("debug", "Updated product :: ".$p_code);
		$this->db->where('p_code',$p_code);
		$this->db->update('product',$formArray);
	}
	function deleteProduct($p_code){
		log_message("debug", "Deleted product :: ".$p_code);
		$this->db->where('p_code',$p_code);
		$this->db->delete('product');
	}
}