<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Service extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model("Category_Model");
		$this->load->model("User_Model");
	}

    public function index(){
		if($_POST['address'] != '' && $_POST['longitude'] != '' && $_POST['latitude'] != ''){
			$address = explode(', ', $_POST['address']);
			$location = array(
				'address'=>$address[0],
				'longitude'=>$_POST['longitude'],
				'latitude'=>$_POST['latitude'],
				'block'=>$address[1],
				'city'=>$address[2],
				'state'=>$address[3]
			);
			$this->session->set_userdata($location);
			redirect('service/all');
		}else{
			redirect('welcome');
		}
	}
	
	public function all(){
		//$data['roles'] = $this->User_Model->findNearServices($_SESSION['longitude'], $_SESSION['latitude']);
		$data['roles'] = $this->User_Model->findAllServices();
		
		$this->load->view('include/header');
		$this->load->view('all', $data);
		$this->load->view('include/footer');
	}

	public function providers($category){
		$data['category'] = $this->Category_Model->findByKeycode($category);
		$data['providers'] = $this->User_Model->findServiceProviders($category);

		$this->load->view('include/header');
		$this->load->view('providers', $data);
		$this->load->view('include/footer');
	}
	
	/*
	public function providers($category){
		$data['category'] = $this->Category_Model->findByKeycode($category);
		$data['providers'] = $this->User_Model->findNearServiceProviders($_SESSION['longitude'], $_SESSION['latitude'], $category);

		$this->load->view('include/header');
		$this->load->view('providers', $data);
		$this->load->view('include/footer');
	}
	*/

	public function provider($username){
		$provider = $this->User_Model->findByUsername($username);
		$provider['category'] = $this->Category_Model->findServicesByPhone($provider['phone']);

		$data['provider'] = $provider;

		$directorio = 'users/'.$provider['phone'].'/jobs/';
		$data['images'] = scandir($directorio);

		unset($data['images'][0]);
		unset($data['images'][1]);

		$this->load->view('include/header');
		$this->load->view('provider', $data);
		$this->load->view('include/footer');
	}
}