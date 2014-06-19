<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Water_model extends CI_Model{
	public function getProducts(){
		$query = $this->db->query("SELECT * FROM water_products")->result_array();
		return $query;
	}
	public function getProductById($prod_id){
		$query = $this->db->query("SELECT * FROM water_products WHERE id ='$prod_id'")->result_array();
		return $query;
	}

	public function getProductType(){
		$query = $this->db->query("SELECT DISTINCT type from water_products")->result_array();
		return $query;
	}

	public function getProdLabel($prod_type){
		$query = $this->db->query("SELECT DISTINCT label FROM water_products WHERE type='$prod_type'")->result_array();
		return $query;

	}

	public function getProdName($prod_label){
		$query = $this->db->query("SELECT id, name, rus_name, price, img FROM water_products WHERE label='$prod_label'")->result_array();
		return $query;		
	}

}
?>