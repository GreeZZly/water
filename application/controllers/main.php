<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller { 
	function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('ion_auth');
		$this->load->model('water_model');
		$this->load->model('lp_model');
		$this->load->library('cart');
		$this->load->helper('cookie');
		$this->load->library('session');
		// $id_registred_company = 12;
		$this->water_cost = 110;

	}

	public function	index(){
		$this->load->helper(array('form', 'url'));

		$data['log_on'] = ($this->ion_auth->logged_in()) ? 1 : 0;
		$data['username'] = $this->mb_ucfirst($this->session->userdata('name'));
		if($data['log_on']){
		$id = $this->ion_auth->get_user_id();
		$user= $this->ion_auth_model->user($id)->row();
		$data['delivery_city'] = $user->delivery_city;
		$data['delivery_address'] = $user->delivery_address;
		$data['phone'] = $user->phone;
		$data['name'] = $user->name;
		$data['email'] = $user->email;
		}

		$data['productType'] = $this->water_model->getProductType();
		// print_r($data['products']);

		$this->load->library('form_validation');

		$this->load->view('water/htmlheader.html', $data);
		$this->load->view('water/reg_form');
		$this->load->view('water/header');
		$this->load->view('water/navbar');
		if ($data['log_on']) {
			$this->load->view('water/products_view');
			$this->load->view('water/orderform');
			$this->load->view('water/garant_dostavka');
			$this->load->view('water/dostavka');
			$this->load->view('water/shedule');
			$this->load->view('water/consist');
			$this->load->view('water/footer');
			
		} else {
			$this->load->view('water/hero');
			$this->load->view('water/orderform');
			$this->load->view('water/trust');
			$this->load->view('water/description');
			$this->load->view('water/reviews');
			$this->load->view('water/garant_dostavka');
			// $this->load->view('water/video');
			$this->load->view('water/dostavka');
			$this->load->view('water/garanties');
			$this->load->view('water/shedule');
			$this->load->view('water/faq');
			$this->load->view('water/consist');
			$this->load->view('water/footer');
		}
		// $this->load->view('main/consult');
		// $this->load->view('main/just_another_order_block');
		// $this->load->view('main/portfolio');
		// $this->load->view('main/howwork');
		// $this->load->view('main/question');
		// $this->load->view('main/whywe');
		// $this->load->view('main/howchoose');
		// $this->load->view('main/banner');
		// $this->load->view('main/question2');
		// $this->load->view('main/footer');
		$this->load->view('water/htmlfooter.html');

	}
	function preorder(){
		$data['log_on'] = ($this->ion_auth->logged_in()) ? 1 : 0;
			$data['full_count'] = $this->input->post('p1');
			$data['empty_count'] = $this->input->post('p2');

			if($data['log_on']) {
				$data['total_sum'] = $data['full_count']*(($data['full_count'] == 1)? 119 : 99)+($data['full_count']-$data['empty_count'])*180;
				echo $data['total_sum'];
			}
			else {
				$data['total_sum'] = $data['full_count']*(($data['full_count'] == 1)? 130 : 110)+($data['full_count']-$data['empty_count'])*180;
				echo $data['total_sum'];
			}

	}
	public function order(){
		$this->load->model('heroin');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('email');

		$this->form_validation->set_rules('nameOrg', 'Название организации', 'min_length[5]|max_length[100]');
		$this->form_validation->set_rules('name', 'Имя', 'required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Телефон', 'required|numeric');
		$this->form_validation->set_rules('adress', 'Адрес', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('water/htmlheader.html');
			$this->load->view('water/orderform_php');
			$this->load->view('water/htmlfooter.html');
		}
		else
		{
			$data = array('name' => $this->input->post('name'),
							'nameOrg' => $this->input->post('nameOrg'),
							'email' => $this->input->post('email'),

							'phone' => $this->input->post('phone'),
							'optionsRadios' =>$this->input->post('optionsRadios'),
							// 'city' =>$this->input->post('city'),
							'adress' =>$this->input->post('adress'),
							'order' => array(
									'product' => 'Вода "Ореол здоровья"',
									// 'total_sum' => $this->input->post('cost'),
									'cost' => $this->water_cost,
									'quantity' => $this->input->post('full_count')
								),
							'full_count' =>$this->input->post('full_count'),
							'empty_count' =>$this->input->post('empty_count'),
							'cost_order' =>$this->input->post('cost'),
							'delivery_time_since' =>$this->input->post('delivery_time_since'),
							'delivery_time_po' =>$this->input->post('delivery_time_po')
				);
			$data['log_on'] = ($this->ion_auth->logged_in()) ? 1 : 0;

			if($data['log_on']) {
				$data['order']['total_sum'] = $data['full_count']*(($data['full_count'] == 1)? 119 : 99)+($data['full_count']-$data['empty_count'])*180;
				$data['cost_order'] = $data['order']['total_sum'];
				// print_r($data['cost_order']);
				// full_cnt*((full_cnt == 1) ? 130 : 110) + (full_cnt-empty_cnt)*180
			}
			else {
				$data['order']['total_sum'] = $data['full_count']*(($data['full_count'] == 1)? 130 : 110)+($data['full_count']-$data['empty_count'])*180;
				$data['cost_order'] = $data['order']['total_sum'];
				// print_r($data['cost_order']);
			}
			$data['type']=($data['optionsRadios']=='yur_lico')?'legal':'individual';
			$data['captured']=1;
			$data['email_home']=$this->input->post('email');

		   	//$this->heroin->setCustomer(null,$data);
			$config['mailtype'] = 'text';

			$this->load->library('apiforcrm');
			$order = array('customer' => $data, 'order'=>array('description'=>json_encode(array($data['order']))), 'reg' =>$this->ion_auth->logged_in(), 'phase'=>'cart' );
			$answer  = $this->apiforcrm->setApi('39911b72b0e0cbe805ea9fa294e36e72b7793539')->setOrder($order);
			//$answer  = $this->apiforcrm->setApi('39911b72b0e0cbe805ea9fa294e36e72b7793539')->setOrder($order);
			// $config['mailpath'] = '/usr/sbin/sendmail';
			// $config['charset'] = 'iso-8859-1';
			// $config['wordwrap'] = FALSE;
			// $config['newline'] = TRUE;

			$this->email->initialize($config);

			$this->email->clear();
		    $this->email->to('lineofhealth@mail.ru, semenzuev777@gmail.com');
		    $this->email->from('iwant@lineofhealth.ru');
		    $this->email->subject('Новая заявка!');
		    $this->email->message("Привет!\nПоступила заявка от\nИмя: ".$data['name']."\nE-mail: ".$data['email']."\nТелефон: ".$data['phone']."\nЛицо: ".$data['optionsRadios']."\nАдрес: ".$data['adress']."\nПредпочитаемое время доставки: с ".$data['delivery_time_since']." до ".$data['delivery_time_po']."\nКоличество бутылей: ".$data['full_count']."\nСдаваемая тара: ".$data['empty_count']."\nЗаказ на сумму:".$data['cost_order']." руб.");
		    $this->email->send();


			$this->load->view('water/htmlheader.html');
			$this->load->view('water/auth_success');
			$this->load->view('water/htmlfooter.html');
		}
		
	}

	public function form_php(){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->view('main/htmlheader.html');
			$this->load->view('main/form_php');
			$this->load->view('main/htmlfooter.html');
	}

	public function reg_success() {
			$this->load->view('water/htmlheader_success.html');
			$this->load->view('water/reg_success');
			$this->load->view('water/htmlfooter.html');
	}

	public function remember_success(){
		$this->load->view('water/htmlheader_success.html');
			$this->load->view('water/remember_success');
			$this->load->view('water/htmlfooter.html');
	}
	private function  mb_ucfirst($str){
		return mb_strtoupper(mb_substr($str, 0, 1)).mb_substr($str, 1, mb_strlen($str));
	}

	public function logout(){
		$this->ion_auth->logout();
		redirect('/', 'refresh');
	}

	public function user_office(){
		$this->load->helper(array('form', 'url'));
		$data['log_on'] = ($this->ion_auth->logged_in()) ? 1 : 0;
		$data['username'] = $this->mb_ucfirst($this->session->userdata('name'));

		$this->load->library('form_validation');
		if ($data['log_on']) {

			$id = $this->ion_auth->get_user_id();
			$user= $this->ion_auth_model->user($id)->row();
			$data['delivery_address'] = $user->delivery_address;
			$data['phone'] = $user->phone;
			$data['delivery_city'] = $user->delivery_city;

			// echo "<pre>".print_r($data['user_data'])."</pre>";

		}
		$this->load->view('water/htmlheader.html', $data);
		$this->load->view('water/reg_form');
		$this->load->view('water/header');
		$this->load->view('water/user_office');
		$this->load->view('water/footer');
		$this->load->view('water/htmlfooter.html');

	}

	public function change_user_data() {
		if ($this->ion_auth->logged_in()){
			$id = $this->ion_auth->get_user_id();
			$data['delivery_city'] = $this->input->post('delivery_city');
			$data['delivery_address'] = $this->input->post('delivery_adress');
			$data['phone'] = $this->input->post('user_phone');
			$this->ion_auth_model->change_user_data($id, $data);

			// $data['log_on'] = 1;
			// $data['username'] = $this->mb_ucfirst($this->session->userdata('name'));
			// $this->load->view('water/htmlheader.html', $data);
			// $this->load->view('water/reg_form');
			// $this->load->view('water/header');
			// $this->load->view('water/user_office');
			// $this->load->view('water/footer');
			// $this->load->view('water/htmlfooter.html');			
		}
		redirect('/', 'refresh');
	}

	function check_user_email(){
		$this->load->model('lp_model');
		$user_email = $this->input->post('user_email');
		$data = $this->lp_model->checkUser($user_email);
		// print_r($data);
		$data_request = array('status'=>false,'text'=>'Ошибка при проверке');
		if (count($data)>0) {
			$data_request['text']='Такой емайл уже существует';
		}
		else{
			$data_request['status']=true;
			$data_request['text']='';
		}
		echo json_encode($data_request);
		// print_r($user_email);
	}

	function forgotPass(){
		$this->ion_auth->forgotten_password($this->input->post('email'));
		// redirect ('/', 'refresh');
	}

	function productLabels(){
		$prod_type = $this->input->post('prod_type');
		// $prod_type = 'Чай';
		$data['prod_label'] = $this->water_model->getProdLabel($prod_type);
		// echo "<pre>";
		// print_r($data['prod_label']);
		$this->output->set_content_type('application/json')->set_output(json_encode($data['prod_label']));
	}

	function productNames(){
		$prod_label = $this->input->post('prod_label');
		$data['prod_name'] = $this->water_model->getProdName($prod_label);
		$this->output->set_content_type('application/json')->set_output(json_encode($data['prod_name']));
	}

	function product_insert_cart(){

		$prod_id = $this->input->post('prod_id');
		$datum = $this->water_model->getProductById($prod_id);
		
		$data = array(
               'id'      => $datum[0]['id'],
               'qty'     => 1,
               'price'   => $datum[0]['price'],
               'name'    => $datum[0]['name']
               // 'options' => array('Size' => 'L', 'Color' => 'Red')
            );

		$this->cart->insert($data);
		$this->output->set_content_type('application/json')->set_output(json_encode($datum));
	}

	function view_cart(){
		$this->load->helper(array('form', 'url'));

		$data['log_on'] = ($this->ion_auth->logged_in()) ? 1 : 0;
		$data['username'] = $this->mb_ucfirst($this->session->userdata('name'));
		if($data['log_on']){
		$id = $this->ion_auth->get_user_id();
		$user= $this->ion_auth_model->user($id)->row();
		$data['delivery_city'] = $user->delivery_city;
		$data['delivery_address'] = $user->delivery_address;
		$data['phone'] = $user->phone;
		$data['name'] = $user->name;
		$data['email'] = $user->email;
		}

		$data['productType'] = $this->water_model->getProductType();
		// print_r($data['products']);

		$this->load->library('form_validation');

		// $order_data = $this->session->userdata('user_id');
		// print_r($order_data);
		$this->load->view('water/htmlheader.html', $data);
		$this->load->view('water/reg_form');
		$this->load->view('water/header');
		$this->load->view('water/navbar');
		$this->load->view('water/view_cart');
		$this->load->view('water/footer');
		// $this->load->view('main/consult');
		// $this->load->view('main/just_another_order_block');
		// $this->load->view('main/portfolio');
		// $this->load->view('main/howwork');
		// $this->load->view('main/question');
		// $this->load->view('main/whywe');
		// $this->load->view('main/howchoose');
		// $this->load->view('main/banner');
		// $this->load->view('main/question2');
		// $this->load->view('main/footer');
		$this->load->view('water/htmlfooter.html');
	}


	function update_cart(){
		$data = array();
		$data['qty'] = $this->input->post('sel_val');
		$data['rowid'] = $this->input->post('row_id');
		$this->cart->update($data); 
		$products = array('total_sum'=>0);
		foreach ($this->cart->contents() as $key => $value) {
			$products['products'][]=array('rowid'=>$value['rowid'],'subtotal'=>$value['subtotal']);
			$products['total_sum']+=$value['subtotal'];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($products));

	}

	function pre_order(){
		$user_id = $this->session->userdata('user_id');
		$user_data = $this->lp_model->getUserById($user_id);
		$this->output->set_content_type('application/json')->set_output(json_encode($user_data));
		
	}
	function make_order(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('email');

		$user_phone = $this->input->post('user_phone');
		$user_adress = $this->input->post('delivery_adress');
		$time_s = $this->input->post('time_s');
		$time_po = $this->input->post('time_po');

		$user_id = $this->session->userdata('user_id');
		$user_data = $this->lp_model->getUserById($user_id);
		$product_data = $this->cart->contents();
		$total_cart = $this->cart->total();
		
		
		$temp_arr = array();
		$order_table ='<tr><td>ID</td><td>Название</td><td>Количество</td><td>Цена</td><td>Сумма</td></tr>';
		foreach ($product_data as $key => $value) {
			$temp_arr[] = array('quantity' => $value['qty'],
								'cost' => $value['price'],
								'id' => $value['id'],
								'product' => $value['name'],
								'total_sum' => $value['subtotal']
				);

			$order_table = $order_table."<tr><td>".$value['id']."</td><td>".$value['name']."</td><td>".$value['qty']."</td><td>".$value['price']."</td><td>".$value['subtotal']."</td></tr>";
		}


		// $desc = '[{"quantity":"1","cost":"2532","id":"85","total_sum":2532,"product":"10402"}]';
		$desc = json_encode($temp_arr);
		$data = array('name' => $user_data[0]['name'],
							'surname' => $user_data[0]['surname'],
							'adress' => $user_adress,
							'email' => $user_data[0]['email'],
							'phone' => $user_phone,
							'order' => array('description'=>$desc),
							'description' => array(
								'delivery_time_since' =>$time_s,
								'delivery_time_po' =>$time_po
								),
							'total' => $total_cart
				);

		// echo "<table>".$order_table."</table>";
		// $config['mailtype'] = 'html';
		$config['protocol'] = 'sendmail';
		// $config['newline'] = "\r\n";
		//  $config['wordwrap'] = FALSE;
		// $config['wrapchars'] = 76;


		$this->load->library('apiforcrm');
		$order = array('customer' => $data, 'order'=>$data['order'], 'reg' =>$this->ion_auth->logged_in(), 'phase'=>'cart' );
		$answer  = $this->apiforcrm->setApi('836cab5a02d50d14cf4121097cc93da753ddc29e')->setOrder($order);
		//39911b72b0e0cbe805ea9fa294e36e72b7793539
		$this->email->initialize($config);
		$this->email->clear();
	    $this->email->to('lineofhealth@mail.ru, semenzuev777@gmail.com');
	    $this->email->from('iwant@lineofhealth.ru');
	    $this->email->subject('Заявка на продукты!');
	    $this->email->message("{unwrap}<p>Привет!</p><p>Поступила заявка от</p><p>Имя: ".$data['name']."</p><p>E-mail: ".$data['email']."</p><p>Телефон: ".$data['phone']."</p><p>Адрес: ".$data['adress']."</p><table>".$order_table."</table><p>Желательное время доставки: с ".$time_s." до ".$time_po."</p><p>Заказ на сумму: ".$data['total']." руб.</p>{/unwrap}");
	    $this->email->send();

	    $this->cart->destroy();
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}
