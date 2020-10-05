<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_Model");
	}

	public function index(){
		$data['roles'] = $this->User_Model->findAllServices();

		$this->load->view('include/header');
		$this->load->view('nhome', $data);
		//$this->load->view('home');
		$this->load->view('include/footer');
		/*
		if(isset($_SESSION['longitude']) && isset($_SESSION['latitude']) && isset($_SESSION['address'])){
			redirect('service/all');
		}else{
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
			
			$login=$this->User_Model->loginUser($_POST['phone']);
			
			$password = $this->encryption->decrypt($login['password']);

			if($login != NULL && $password == $_POST['password']){

				$arraySession=array(
					"phone"=>$login['phone'],
					"rol"=>$login['id_role'],
					"name"=>$login['name'],
					"surname"=>$login['surname'],
				);
				$this->session->set_userdata($arraySession);
			}
			else{
				redirect('welcome');
			}
			if($_SESSION['phone'] != null){
				$this->load->view('include/header', $_SESSION);
				$this->load->view('home');
				$this->load->view('include/footer');
			}
			else{
				redirect('welcome');
			}
			

		}

	}

	public function logout() {
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
		$this->session->sess_destroy();
		redirect(base_url().'index.php');
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
	public function edit($phone, $password){
		$this->load->library('encryption');
		$password = $this->encryption->encrypt($password);
		$resultado=$this->User_Model->updatePassword($phone, $password);
		header('Content-Type: application/json');
		echo json_encode($resultado);
	}

	public function account(){
		$this->load->view('include/header');
		$this->load->view('account');
		$this->load->view('include/footer');
	}

}

