<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Класс для работы с Goodcrm
	api-ключ является обезательным параметром  и должен устанавливаться при помощи метода setApi или передаваться в качестве аргумента в других методах. 
	Список доступных методов  в Goodcrm на 20.03.2014;
	setCaptured - для вставки привлченных клиентов. обезательные поля: name,phone,email,type(legal,individual)
	setOrder - 

 */
class Apiforcrm{
	private $_api;
	private $_url;
	private $_host = 'http://goodcrm.ru';
	function setApi($api){
		$this->_api = $api;
		return $this;
	}
	function __call($name,$arg){
		if(!isset($arg) or empty($arg)){
			$params = array(); 
		}
		else{
			$params = $arg[0];
		}
		return $this->sendToCrm($name,$params);
	}
	function sendToCrm($name_method,$data){
		if(!isset($data['api']) and !isset($this->_api)){
			return false;
		}
		elseif(isset($data['api'])){
			$this->setApi($data['api']);
		}

		$this->_url = $name_method."/".$this->_api;
		$post_data = http_build_query($data);


		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $post_data
		    )
		);

		$context  = stream_context_create($opts);

		$result = file_get_contents($this->_host.'/api/'.$this->_url, false, $context);
		return  $result;
	}
	function setResult($result){

	}

}

// $test = new ApiForCrm();
// // // $test->setApi('bbb6d3a0bc6f184c397520b7f4e6c7a89d27c04b')->setCaptured(array('name'=>'Проверка',
// // 	                                    'phone'=>898989898,
// // 	                                    'email'=>'test@email.ru',
// // 	                                    'type'=>'individual'));
// // 	                                    
// // 	                                    
// $desc = '[{"quantity":"1","cost":"2532","id":"85","total_sum":2532,"product":"10402"}]';
// $order = array('description'=>$desc);
// $customer = array('name'=>'Проверка',
// 	                                    'phone'=>898989898,
// 	                                    'email'=>'test@email.ru',
// 	                                    'type'=>'individual',
// 	                                    'id'=>373);
// $test->setApi('bbb6d3a0bc6f184c397520b7f4e6c7a89d27c04b')->setOrder(array('order'=>$order,'customer'=>$customer,'phase'=>'cart','reg'=>true));
//  ?>
