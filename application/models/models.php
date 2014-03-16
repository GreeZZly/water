
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Models extends CI_Model {

		function get_smth($query)
		{
			$this->db->select('descript, title, main_text');
			$this->db->like('main_text',$query);
			$db_query = $this->db->get('pages')->result_array();
			return $db_query;
		}
}

?>