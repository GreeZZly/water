<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Lp_model extends CI_Model{
	function __construct() {
        parent::__construct();
        $this->id_registred_company = $this->config->item('id_registred_company');
        $this->db = $this->load->database('default', TRUE);
        // $this->load->library('session');
        
        
    }	

    function checkUser($user_email){
    	$query = $this->db->query("select email from user_is where id_registred_company = '$this->id_registred_company' and email = '$user_email'")->result_array();
        // echo $this->db->last_query();
    	return $query;
    }

    function getUserById($user_id){
        return  $this->db->query("select name, surname, email, phone, delivery_address from user_is where id = '$user_id' and id_registred_company = '$this->id_registred_company'")->result_array();
    }
}
?>
