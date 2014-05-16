<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Water_model extends CI_Model{
	public function getProducts(){
		$query = $this->db->query("SELECT * FROM products")->result_array();
		return $query;
	}

	public function getProductType(){
		$query = $this->db->query("SELECT DISTINCT type from products")->result_array();
		return $query;
	}

	public function getProdLabel($prod_type){
		$query = $this->db->query("SELECT DISTINCT label FROM products WHERE type='$prod_type'")->result_array();
		return $query;

	}

	public function getProdName($prod_label){
		$query = $this->db->query("SELECT id, name FROM products WHERE label='$prod_label'")->result_array();
		return $query;		
	}
}
?>