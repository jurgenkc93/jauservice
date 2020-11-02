<?php
class Function_Model extends CI_Model  {

    public function sendWhats($phone, $message){
		if(!isset($message) or !isset($phone)){ die('Not enough data');}

			$apiURL = 'https://eu128.chat-api.com/instance135874/';
			$token = 'pb25a5kmr2xds5g6';

			$data = json_encode(
				array(
					//'chatId'=>$phone.'@c.us',
					'phone'=>"52".$phone,
					'body'=>$message
				)
			);
			$url = $apiURL.'message?token='.$token;
			$options = stream_context_create(
				array('http' =>
					array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/json',
						'content' => $data
					)
				)
			);

        $response = file_get_contents($url,false,$options);
        return $response;
	}
    
}