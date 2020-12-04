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
                
                $days = $this->Appointment_Model->findDays($user['id']);
                
                $data['today'] = $today = date('Y-m-d', time());
                
                foreach($days AS $index=>$day){

                    if($today < $day['date']){
                        $dates = $this->Appointment_Model->findDatesByDay($user['id'], $day['date']);

                        if (is_array($dates) || is_object($dates)){

                            foreach($dates AS $jndex=>$date){
    
                                if($date['date'] === $day['date']){

                                    if($date['id_status'] == 2){

                                        if($date['id_user'] === $user['id']){
                                            $not_user = $this->User_Model->findById($date['id_provider']);
                                            $dates[$jndex]['username'] = $not_user['username'];
                                            $dates[$jndex]['provider_name'] = $not_user['name'];
                                            $dates[$jndex]['provider_surname'] = $not_user['surname'];
        
                                        }elseif($date['id_provider'] === $user['id']){
                                            $not_user = $this->User_Model->findById($date['id_provider']);
                                            $dates[$jndex]['user_name'] = $not_user['name'];
                                            $dates[$jndex]['user_surname'] = $not_user['surname'];
                                        }
                                        unset($dates[$jndex]['id_user']);
                                        unset($dates[$jndex]['id_provider']);

                                        $ntime = strtotime($dates[$jndex]['time']);
                                        $dates[$jndex]['time'] = date('H:i', $ntime);
                                    }else{
                                        unset($dates[$jndex]);
                                    }
                                }else{
                                    unset($dates[$jndex]);
                                }

                                /*
                                */

                                $ndate = strtotime($days[$index]['date']);
                                $days[$index]['date'] = date('D d-m-Y', $ndate);
                                
                                unset($days[$index]['id_user']);
                                unset($days[$index]['id_provider']);
                                unset($days[$index]['id_status']);
                                $days[$index]['dates'] = $dates;
                            }
                        }else{
                            unset($days[$index]);
                        }
                    }else{
                        unset($days[$index]);
                    }
                }
                
                $data['dates'] = $days;

                $this->load->view('include/header');
                $this->load->view('user/provider_dates', $data);
                $this->load->view('include/footer');
                /*
                */
            }elseif($_SESSION['rol'] == 3){
                $data['dates_as_user'] = $this->Appointment_Model->findUserDates($user['id']);
                
                $this->load->view('include/header');
                $this->load->view('user/dates', $data);
                $this->load->view('include/footer');
            }
            
        }else{
            redirect('welcome/login');
        }
    }
    
    public function date($id){
        if(isset($_SESSION['phone'])){
            $data['date'] = $this->Appointment_Model->findById($id);
            $this->load->view('include/header');
            $this->load->view('user/date', $data);
            $this->load->view('include/footer');
        }else{
            redirect('welcome/login');
        }
        
    }

    public function date2app($id){
        if(isset($_SESSION['phone'])){
            if($_POST['date'] != '' && $_POST['time'] != '' && $_POST['phone']){
                $user = $this->User_Model->findByPhone($_POST['phone']);
                $appointment = $this->Appointment_Model->findById($id);
                
                if($appointment['id_provider'] == $user['id']){
                    $this->Appointment_Model->date2Appointment($id, $_POST['date'], $_POST['time']);
                    redirect('user/dates');
                }
            }
        }else{
            redirect('welcome/login');
        }
    }

}