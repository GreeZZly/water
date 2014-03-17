<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller { 


	public function	index(){
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->load->view('water/htmlheader.html');
		$this->load->view('water/header');
		$this->load->view('water/navbar');
		$this->load->view('water/hero');
		$this->load->view('water/description');
		$this->load->view('water/reviews');
		$this->load->view('water/garanties');
		$this->load->view('water/dostavka');
		$this->load->view('water/orderform');
		$this->load->view('water/shedule');
		$this->load->view('water/consist');
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
	public function order(){
		$this->load->model('heroin');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('email');

		$this->form_validation->set_rules('name', 'Имя', 'required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Телефон', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('water/htmlheader.html');
			$this->load->view('water/orderform_php');
			$this->load->view('water/htmlfooter.html');
		}
		else
		{
			$data = array('name' => $this->input->post('name'),
							'email' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'optionsRadios' =>$this->input->post('optionsRadios'),
							'city' =>$this->input->post('city'),
							'adress' =>$this->input->post('adress'),
							'full_count' =>$this->input->post('full_count'),
							'empty_count' =>$this->input->post('empty_count')
				);
			$data['type']=($data['optionsRadios']=='yur_lico')?'legal':'individual';
			$data['captured']=1;
		   	$this->heroin->setCustomer(null,$data);
			$config['mailtype'] = 'text';
			// $config['mailpath'] = '/usr/sbin/sendmail';
			// $config['charset'] = 'iso-8859-1';
			// $config['wordwrap'] = FALSE;
			// $config['newline'] = TRUE;

			$this->email->initialize($config);

			$this->email->clear();
		    $this->email->to('greezzly7@gmail.com');
		    $this->email->from('iwant@lineofhealth.ru');
		    $this->email->subject('Новая заявка!');
		    $this->email->message("Привет!\nПоступила заявка от\nИмя: ".$data['name']."\nE-mail: ".$data['email']."\nТелефон: ".$data['phone']."\nЛицо: ".$data['optionsRadios']."\nГород: ".$data['city']."\nАдрес: ".$data['adress']."\nКоличество бутылей: ".$data['full_count']."\nСдаваемая тара: ".$data['empty_count']."");
		    $this->email->send();


			$this->load->view('water/htmlheader.html');
			$this->load->view('water/formsuccess');
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
}
