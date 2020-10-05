<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_Model");
		$this->load->model("Category_Model");
		$this->load->model("Appointment_Model");
	}

	public function index(){
		if(isset($_SESSION['phone'])){
            $this->load->view('include/header');
            $this->load->view('user/account');
            $this->load->view('include/footer');
        }else{
            redirect('welcome/login');
        }
			
    }

	public function provider(){
		if(isset($_SESSION['phone'])){
            $provider = $this->User_Model->findByPhone($_SESSION['phone']);

            $provider['category'] = $this->Category_Model->findServicesByPhone($_SESSION['phone']);
            $data['categories'] = $this->Category_Model->findAll();
            $data['provider'] = $provider;
            /*
            header("Access-Control-Allow-Headers: *");
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Methods: GET");
            header('Content-Type: application/json');
            echo json_encode($data);
            */
            $this->load->view('include/header');
            $this->load->view('user/provider', $data);
            $this->load->view('include/footer');
        }else{
            redirect('welcome/login');
        }
    }

	public function dates(){
		if(isset($_SESSION['phone'])){
            $user = $this->User_Model->findByPhone($_SESSION['phone']);
            if($_SESSION['rol'] == 4){
                $data['pending_dates_as_provider'] = $this->Appointment_Model->findProviderPendingDates($user['id']);
                $data['pending_dates_as_user'] = $this->Appointment_Model->findUserPendingDates($user['id']);
                
                $data['dates_as_provider'] = $this->Appointment_Model->findProviderDates($user['id']);
                $data['dates_as_user'] = $this->Appointment_Model->findUserDates($user['id']);
            }elseif($_SESSION['rol'] == 3){
                $data['pending_dates_as_user'] = $this->Appointment_Model->findUserPendingDates($user['id']);
                $data['dates_as_user'] = $this->Appointment_Model->findUserDates($user['id']);
            }

            
            /*
            header("Access-Control-Allow-Headers: *");
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Methods: GET");
            header('Content-Type: application/json');
            echo json_encode($data);
            $provider['category'] = $this->Category_Model->findServicesByPhone($_SESSION['phone']);
            $data['categories'] = $this->Category_Model->findAll();
            $data['provider'] = $provider;
            */

            $this->load->view('include/header');
            $this->load->view('user/dates', $data);
            $this->load->view('include/footer');
        }else{
            redirect('welcome/login');
        }
    }

}