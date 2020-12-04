<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Category_Model");
		$this->load->model("User_Model");
		$this->load->helper('form');
	}

    public function list(){
		if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
			$this->load->view('include/header');
            $this->load->view('worker/providers');
            $this->load->view('include/footer');
		}else{
			redirect('welcome');
		}
	}

	public function provider($phone){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$provider = $this->User_Model->findByPhone($phone);

				$provider['category'] = $this->Category_Model->findServicesByPhone($phone);
				$data['categories'] = $this->Category_Model->findAll();
				$data['provider'] = $provider;
				$this->load->view('include/header');
				$this->load->view('worker/provider', $data);
				$this->load->view('include/footer');
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}

	public function create(){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$this->load->view('include/header');
				$this->load->view('worker/form');
				$this->load->view('include/footer');
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}

	public function date(){
		//$now = time();
		$date_started = date('Y-m-d H:i:s', time());
		$next_renewed = date('Y-m-d H:i:s', time()+2629800);
		$_POST['phone'] = "2721549510";
		$path = './static/img/users/'.$_POST['phone'].'/profile/';
		echo json_encode($path);
	}

	public function createProvider(){
		$this->load->helper("file");
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				if($_POST['name'] != '' && $_POST['surname'] != '' && $_POST['phone'] != '' && $_POST['password'] != '' && $_POST['user-phone'] != ''){
					
					$provider = $this->User_Model->findByPhone($_POST['phone']);
					$worker = $this->User_Model->findByPhone($_POST['user-phone']);

					$path = "./static/img/users/".$_POST['phone']."/profile/";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2048';
					$config['max_height'] = '2048';
					$config['file_name'] = 'profile-picture';
					$config['file_type'] = 'jpg';
					
					$this->load->library('upload', $config);

					if($provider == null){
						$this->load->library('encryption');
						$password = $this->encryption->encrypt($_POST['password']);

						$date_started = date('Y-m-d H:i:s', time());
						$next_renewed = date('Y-m-d H:i:s', time()+2629800);

						$user = array(
							"phone"=>$_POST['phone'],
							"password"=>$password,
							"name"=>$_POST['name'],
							"surname"=>$_POST['surname'],
							"id_role"=>4,
							"date_started"=>date('Y-m-d H:i:s', time()),
							"next_renew"=>date('Y-m-d H:i:s', time() + 2717460),
							"user_of"=>$worker['id']
						);

						if(!is_dir('./static/img/users/'.$_POST['phone'])){
							mkdir('./static/img/users/'.$_POST['phone'], 0777, TRUE);
							mkdir('./static/img/users/'.$_POST['phone'].'/profile', 0777, TRUE);
							mkdir('static/img/users/'.$_POST['phone'].'/works', 0777, TRUE);
						}
						
						if(!$this->upload->do_upload('picture')){
							$error = array('error' => $this->upload->display_errors());
							$data['message'] = $error['error'];
							
							$this->load->view('include/header');
							$this->load->view('messages/warning-message', $data);
							$this->load->view('worker/form');
							$this->load->view('include/footer');
							
							//echo json_encode($error);
							//$this->load->view('upload_form', $error);
						}else{
							$this->User_Model->insertUser($user);
							$data = array('upload_data' => $this->upload->data());
							$data['message'] = 'Usuario agregado';
							$this->load->view('include/header');
							$this->load->view('messages/primary-message', $data);
							$this->load->view('user/account');
							$this->load->view('include/footer');
	
							//echo json_encode($data);
							//$this->load->view('upload_success', $data);
						}

					}else{
						if($provider['id_role'] == 3){
							$provider['id_role'] = 4;
							$provider['user_of'] = $worker['id'];
							$provider['date_started'] = date('Y-m-d H:i:s', time());
							$provider['date_started'] = date('Y-m-d H:i:s', time()+2629800);

							if(!is_dir('./static/img/users/'.$_POST['phone'])){
								mkdir('./static/img/users/'.$_POST['phone'], 0777, TRUE);
								mkdir('./static/img/users/'.$_POST['phone'].'/profile', 0777, TRUE);
								mkdir('static/img/users/'.$_POST['phone'].'/works', 0777, TRUE);
							}
							
							$this->User_Model->updateUser($provider);
							$data['message'] = 'Usuario cambiado de rol correctamente.';

							$this->load->view('include/header');
							$this->load->view('messages/primary-message', $data);
							$this->load->view('worker/form');
							$this->load->view('include/footer');
						}else{
							$data['message'] = 'El usuario no puede cambiar de rol.';
							$this->load->view('include/header');
							$this->load->view('messages/primary-message', $data);
							$this->load->view('worker/form');
							$this->load->view('include/footer');
						}
					}

					//delete_files($config['upload_path'].'/'.$_POST['phone'].'.jpg');
				}else{
					$data['message'] = 'Existieron campos faltantes.';
						$this->load->view('include/header');
						$this->load->view('messages/warning-message', $data);
						$this->load->view('worker/form');
						$this->load->view('include/footer');
				}
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}

	public function providerPicture($phone){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$this->load->view('include/header');
				$this->load->view('messages/primary-message', $data);
				$this->load->view('worker/profile-picture-form');
				$this->load->view('include/footer');
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}

	public function uploadProviderPicture(){
		$this->load->helper("file");
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				if($_POST['phone'] != '' && $_POST['user-phone'] != ''){
					
					$provider = $this->User_Model->findByPhone($_POST['phone']);
					$worker = $this->User_Model->findByPhone($_POST['user-phone']);

					$path = "./static/img/users/".$_POST['phone']."/profile/";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2048';
					$config['max_height'] = '2048';
					$config['file_name'] = 'profile-picture';
					$config['file_type'] = 'jpg';
					
					$this->load->library('upload', $config);
					$this->load->library('encryption');

					if(!is_dir('./static/img/users/'.$_POST['phone'])){
						mkdir('./static/img/users/'.$_POST['phone'], 0777, TRUE);
						mkdir('./static/img/users/'.$_POST['phone'].'/profile', 0777, TRUE);
						mkdir('static/img/users/'.$_POST['phone'].'/works', 0777, TRUE);
					}
					
					if(!$this->upload->do_upload('picture')){
						$error = array('error' => $this->upload->display_errors());
						$data['message'] = $error['error'];
						
						$this->load->view('include/header');
						$this->load->view('messages/warning-message', $data);
						$this->load->view('worker/profile-picture-form');
						$this->load->view('include/footer');
						
						//echo json_encode($error);
						//$this->load->view('upload_form', $error);
					}else{
						$data = array('upload_data' => $this->upload->data());
						$data['message'] = 'Foto actualizada';
						$this->load->view('include/header');
						$this->load->view('messages/primary-message', $data);
						$this->load->view('worker/profile-picture-form');
						$this->load->view('include/footer');

						//echo json_encode($data);
						//$this->load->view('upload_success', $data);
					}
					//delete_files($config['upload_path'].'/'.$_POST['phone'].'.jpg');
				}else{
					$data['message'] = 'Existieron campos faltantes.';
					$this->load->view('include/header');
					$this->load->view('messages/warning-message', $data);
					$this->load->view('worker/form');
					$this->load->view('include/footer');
				}
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}
	
	
}