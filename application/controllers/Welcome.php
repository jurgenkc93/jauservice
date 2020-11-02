<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_Model");
	}

	public function index(){
		//if(!isset($_SESSION['phone']) || $_SESSION['rol'] != 4){
			$data['roles'] = $this->User_Model->findAllServices();
			$this->load->view('include/header');
			$this->load->view('nhome', $data);
			$this->load->view('include/footer');
		/*
		}else{
			redirect('user/dates');
		}
		*/			
	}

	public function user(){
        if(isset($_SESSION['username'])){
			redirect('welcome/index');
		}
		else{
			$this->load->view('include/header');
			$this->load->view('login');
			$this->load->view('include/footer');
		}
	}

	public function newUser(){
		$this->load->view('include/header');
		$this->load->view('signup');
		$this->load->view('include/footer');
	}
	
	public function values(){
		print_r($_SESSION);
	}
	
	public function contact(){
		$this->load->view('include/header');
		$this->load->view('contact');
		$this->load->view('include/footer');
	}

	public function test(){
		$this->load->view('testing');
	}
	
	public function privacy(){
		$this->load->view('include/header');
		$this->load->view('privacy');
		$this->load->view('include/footer');
	}

	public function who(){
		$this->load->view('include/header');
		$this->load->view('who');
		$this->load->view('include/footer');
	}

	public function login(){
		$this->load->library('encryption');

		if($_POST['phone'] == '' || $_POST['password'] == ''){
			redirect('welcome/user');
		}
		else{
			if(isset($_SESSION['try'])){
				if($_SESSION['try'] >= 3){

					$time_after = strtotime($_SESSION['time']) + 600;

					if(isset($_SESSION['lock'])){
						if($time_after > time()){
							$this->session->set_userdata('time', time());
							$this->session->unset_userdata('lock');
							
							$data['message'] = "Su cuenta ha sido desbloqueada, vuelva a intentarlo por favor.";
							
							$this->load->view('include/header');
							$this->load->view('messages/primary-message', $data);
							$this->load->view('login');
							$this->load->view('include/footer');
						}else{
							$data['message'] = "Su cuenta encuentra bloqueada, vuelva a intentarlo mas tarde por favor";
							$this->load->view('include/header');
							$this->load->view('messages/warning-message', $data);
							$this->load->view('user/user_lock');
							$this->load->view('include/footer');
						}
					}else{
						$this->session->set_userdata('lock', true);
						$this->session->set_userdata('time', time());
						
						$data['message'] = "Su cuenta encuentra bloqueada, vuelva a intentarlo mas tarde por favor";
						$this->load->view('include/header');
						$this->load->view('messages/warning-message', $data);
						$this->load->view('login');
						$this->load->view('include/footer');
					}
					
					
				}else{
					
					$login = $this->doLogin($_POST['phone'], $_POST['password']);
					if($login === true){
						if($_SESSION['rol'] == 4 ){
							redirect('user/dates');
						}else{
							redirect('welcome');
						}
					}else{
						$count = $_SESSION['try'] + 1;
						$this->session->set_userdata('try', $count);
						
						$data['message'] = "Vuelva a intentarlo";
						$this->load->view('include/header');
						$this->load->view('messages/primary-message', $data);
						$this->load->view('login');
						$this->load->view('include/footer');
						
					}
					
				}
			}else{
				$login = $this->doLogin($_POST['phone'], $_POST['password']);
				if($login === true){
					if($_SESSION['rol'] == 4 ){
						redirect('user/dates');
					}else{
						redirect('welcome');
					}
				}else{
					$this->session->set_userdata('try', 1);
					$this->session->set_userdata('time', time());
					
					$data['message'] = "Vuelva a intentarlo";
					$this->load->view('include/header');
					$this->load->view('messages/primary-message', $data);
					$this->load->view('login');
					$this->load->view('include/footer');

				}
			}

		}

	}

	private function doLogin($phone, $password){
		$login=$this->User_Model->loginUser($phone);
		$userPassword = $this->encryption->decrypt($login['password']);

		if($login != NULL && $password == $userPassword){
			$arraySession=array(
				"phone"=>$login['phone'],
				"rol"=>$login['id_role'],
				"name"=>$login['name'],
				"surname"=>$login['surname'],
			);
			$this->session->set_userdata($arraySession);
			return true;
		}else{
			return false;
		}
	}

	public function logout() {
		if(isset($_SESSION['phone'])){
			$user_data = $this->session->all_userdata();
			foreach ($user_data as $key => $value) {
				if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
					$this->session->unset_userdata($key);
				}
			}
			$this->session->sess_destroy();
			redirect(base_url().'index.php');
		}else{
			redirect('welcome/user');
			
		}
	}

	public function doLogout() {
			$this->session->sess_destroy();
			redirect(base_url());
	}

	public function forgot(){
		$this->load->view('include/header');
		$this->load->view('forgot');
		$this->load->view('include/footer');
	}

	public function recovery(){
		if(($_POST['phone'] != '')){
			$user = $this->User_Model->findByPhone($_POST['phone']);
			
			//if($user != null && $user['recovery'] == null){
			if($user != null){
				$time = time();

				$random_numbers = rand(10000, 999999);
				if($random_numbers < 100000){
					$random_numbers = '0'.$random_numbers;
				}

				//$data['random'] = $random_numbers;
				$this->User_Model->activateRecoverPassword($user['id'], $time, $random_numbers);

				$data['user'] = $user['phone'];
				$this->load->view('include/header');
				$this->load->view('user/recovery', $data);
				$this->load->view('include/footer');
			}else{
				$data['message'] = "Telefono no registrado";
				$this->load->view('include/header');
				$this->load->view('messages/warning-message', $data);
				$this->load->view('forgot');
				$this->load->view('include/footer');
			}
		}else{
			redirect('welcome');
		}
		
	}
	
	public function password(){
		if($_POST['number'] != '' && $_POST['user'] != ''){
			$user = $this->User_Model->findByPhone($_POST['user']);

			//if($user != null && $user['recovery'] == null){
			if($user != null){
				
				if($user['number'] == $_POST['number']){
					$time = time();
					$time_after = $user['recovery'] + 600;
					if($time > $user['recovery'] && $time < $time_after){
						
						$data['user'] = $user['phone'];
						$data['recovery'] = $user['number'];
						$this->load->view('include/header');
						$this->load->view('user/password', $data);
						$this->load->view('include/footer');
						
					}else{
						$this->load->view('include/header');
						$this->load->view('user/time_out');
						$this->load->view('include/footer');
					}
				}else{
					$this->load->view('include/header');
					$this->load->view('user/time_out');
					$this->load->view('include/footer');
				}
			}else{
				redirect('welcome');
			}

		}
	}

	public function changePassword(){
		if(($_POST['user'] != '' && $_POST['password'] != '' && $_POST['password'] == $_POST['password-repeat'])){
			$user = $this->User_Model->findByPhone($_POST['user']);
			
			//if($user != null && $user['recovery'] == null){
			if($user != null){
				$time = time();
				$time_after = $user['recovery'] + 600;
				if($time > $user['recovery'] && $time < $time_after){
					$this->load->library('encryption');
					$password = $this->encryption->encrypt($_POST['password']);
					$this->User_Model->updatePassword($user['phone'], $password);

					$data['message'] = "Contraseña actualizada, por favor inicie sesión";
					$this->load->view('include/header');
					$this->load->view('messages/primary-message', $data);
					$this->load->view('login');
					$this->load->view('include/footer');
				}else{
					$this->load->view('include/header');
					$this->load->view('user/time_out');
					$this->load->view('include/footer');
				}
			}else{
				redirect('welcome');
			}
		}else{
			redirect('welcome');
		}
	}
	
	

	public function session(){
		header('Content-Type: application/json');
		echo json_encode($_SESSION);
	}
	
	public function hola($phone, $password){
		$resultado=$this->User_Model->loginUser($phone, $password);
		header('Content-Type: application/json');
		echo json_encode($resultado);
	}
	private function edit($phone, $password){
		$this->load->library('encryption');
		$password = $this->encryption->encrypt($password);
		$resultado=$this->User_Model->updatePassword($phone, $password);
		return 1;
	}

	public function account(){
		$this->load->view('include/header');
		$this->load->view('account');
		$this->load->view('include/footer');
	}

}

