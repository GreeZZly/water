<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index(){
		echo "See ya, bitches!!";
		
	}

	public function get() {

		$query = $this->db->get('pages');
		$res = $query->row_array(2);
		echo "<pre>";
		print_r($res);
		echo "</pre>";

		echo $res['title'];
	}

	public function get2() {
		$this->db->where('section',2);
		$query = $this->db->get('pages');
		$res = $query->row_array(1);

		echo "<pre>";
		print_r($res);
		echo "</pre>";

		echo $res['descript'];
	}

	public function add() {

		$data = array();
		$this->db->insert('pages', $data);
	}

	public function search_str() {
		$this->load->view('search_view');
	}

	public function search() {
		$this->load->model('models','',true);
		$query =  $_POST['query'];
		$query = trim($query);
		$query = mysql_real_escape_string($query);
		$query = htmlspecialchars($query);

		// echo $query;
		if (!empty($query))
		{
			if (strlen($query) < 3)
			{
				$text = '<p>Слишком короткий запрос!</p>';
			} elseif (strlen($query) > 128)
			 {
				$text = '<p>Слишком длинный запрос!</p>';
			} else {
				$q = $this->models->get_smth($query);
			}
			echo('<pre>');
			print_r($q);
			echo('</pre>');
		

			echo count($q);
			foreach ($q as $key => $value) {
				echo "<p><a href='/'>".$value['main_text']."</a></p>";
			}

		}

	}
}

?>