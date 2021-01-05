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
			$user = $this->User_Model->findByPhone($_SESSION['phone']);
			if($user['id_role'] == 2 || $user['id_role'] == 1){
				$data['providers'] = $this->User_Model->findAllProvidersByGeneral($user['id']);
				$this->load->view('include/header');
				$this->load->view('worker/providers', $data);
				$this->load->view('include/footer');
			}else{
				redirect('welcome');
			}

		}else{
			redirect('welcome');
		}
	}

	public function provider($phone){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$provider = $this->User_Model->findByPhone($phone);

				$provider['category'] = $this->Category_Model->findServicesByPhoneForGeneral($phone);
				$data['categories'] = $this->Category_Model->findAll();
				$data['provider'] = $provider;

				$directorio = 'users/'.$_POST['phone'].'/jobs/';
				$data['images'] = scandir($directorio);

				unset($data['images'][0]);
				unset($data['images'][1]);
				$data['image'] = $provider['image'];
				/*
				header("Access-Control-Allow-Headers: *");
				header('Access-Control-Allow-Origin: *');
				header("Access-Control-Allow-Methods: GET");
				header('Content-Type: application/json');
				echo json_encode($data);
				*/
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
				if($_POST['name'] != '' && $_POST['surname'] != '' && $_POST['username'] != '' && $_POST['phone'] != '' && $_POST['password'] != '' && $_POST['phone'] != ''){
					/*
					header("Access-Control-Allow-Headers: *");
					header('Access-Control-Allow-Origin: *');
					header("Access-Control-Allow-Methods: GET");
					header('Content-Type: application/json');
					echo json_encode($_POST['phone']);
					*/
					
					$provider = $this->User_Model->findByPhone($_POST['phone']);
					$worker = $this->User_Model->findByPhone($_POST['user-phone']);

					$path = "./users/".$_POST['phone']."/profile/";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2048';
					$config['max_height'] = '2048';
					$config['file_name'] = 'profile-picture';
					$config['file_type'] = 'jpeg';
					
					$this->load->library('upload', $config);

					if($provider == null){
						$this->load->library('encryption');
						$provider = $this->User_Model->findByUsername($_POST['username']);
						if($provider == null){
							$password = $this->encryption->encrypt($_POST['password']);

							$date_started = date('Y-m-d H:i:s', time());
							$next_renewed = date('Y-m-d H:i:s', time()+2629800);

							if(!is_dir('./users/'.$_POST['phone'])){
								mkdir('./users/'.$_POST['phone'], 0777, TRUE);
								mkdir('./users/'.$_POST['phone'].'/profile', 0777, TRUE);
								mkdir('./users/'.$_POST['phone'].'/jobs', 0777, TRUE);
							}
							
							if(!$this->upload->do_upload('picture')){
								$error = array('error' => $this->upload->display_errors());
								$data['message'] = $error['error'];
								
								$this->load->view('include/header');
								$this->load->view('messages/warning-message', $data);
								$this->load->view('worker/form');
								$this->load->view('include/footer');
							}else{
								$directorio = 'users/'.$_POST['phone'].'/profile/';
								$data['images'] = scandir($directorio);
								$image = $data['images'][2];

								$user = array(
									"phone"=>$_POST['phone'],
									"username"=>$_POST['username'],
									"password"=>$password,
									"name"=>$_POST['name'],
									"surname"=>$_POST['surname'],
									"id_role"=>4,
									"status"=>1,
									"date_started"=>date('Y-m-d H:i:s', time()),
									"next_renew"=>date('Y-m-d H:i:s', time() + 2717460),
									"user_of"=>$worker['id'],
									"image"=>$image
								);

								$this->User_Model->insertUser($user);
								$data = array('upload_data' => $this->upload->data());
								$data['message'] = 'Usuario agregado';
								$this->load->view('include/header');
								$this->load->view('messages/primary-message', $data);
								$this->load->view('user/account');
								$this->load->view('include/footer');
							}
						}else{
							$data['message'] = 'Nombre de usuario existente.';
							$this->load->view('include/header');
							$this->load->view('messages/warning-message', $data);
							$this->load->view('worker/form');
							$this->load->view('include/footer');
						}

					}else{
						if($provider['id_role'] == 3){
							$provider['id_role'] = 4;
							$provider['user_of'] = $worker['id'];
							$provider['date_started'] = date('Y-m-d H:i:s', time());
							$provider['date_started'] = date('Y-m-d H:i:s', time()+2629800);

							if(!is_dir('./users/'.$_POST['phone'])){
								mkdir('./users/'.$_POST['phone'], 0777, TRUE);
								mkdir('./users/'.$_POST['phone'].'/profile', 0777, TRUE);
								mkdir('./users/'.$_POST['phone'].'/jobs', 0777, TRUE);
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

	public function picture($phone){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$data['phone'] = $phone;
				$user = $this->User_Model->findByPhone($phone);
				$data['image'] = $user['image'];
				$this->load->view('include/header');
				$this->load->view('worker/picture', $data);
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
				if($_POST['phone'] != '' && $_POST['picture'] != ''){
					
					$provider = $this->User_Model->findByPhone($_POST['phone']);

					$path = "./users/".$_POST['phone']."/profile/";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2048';
					$config['max_height'] = '2048';
					$config['file_name'] = 'profile-picture';
					$config['file_type'] = 'jpeg';
					
					$this->load->library('upload', $config);
					$this->load->library('encryption');

					if(!is_dir('./users/'.$_POST['phone'])){
						mkdir('./users/'.$_POST['phone'], 0777, TRUE);
						mkdir('./users/'.$_POST['phone'].'/profile', 0777, TRUE);
						mkdir('./users/'.$_POST['phone'].'/jobs', 0777, TRUE);
					}
					delete_files('./users/'.$_POST['phone'].'/profile');
					if(!$this->upload->do_upload('picture')){
						$error = array('error' => $this->upload->display_errors());
						$data['message'] = $error['error'];
						$data['phone'] = $_POST['phone'];
						$this->load->view('include/header');
						$this->load->view('messages/warning-message', $data);
						$this->load->view('worker/picture', $data);
						$this->load->view('include/footer');
						
						//echo json_encode($error);
						//$this->load->view('upload_form', $error);
					}else{
						$data = array('upload_data' => $this->upload->data());
						$data['message'] = 'Foto actualizada';
						$data['phone'] = $_POST['phone'];

						$directorio = 'users/'.$_POST['phone'].'/profile/';
						$data['images'] = scandir($directorio);
						$image = $data['images'][2];

						$this->User_Model->changeUserImage($_POST['phone'], $image);

						$data['image'] = $image;

						$this->load->view('include/header');
						$this->load->view('messages/primary-message', $data);
						$this->load->view('worker/picture', $data);
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

	public function jobs($phone){
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				$data['phone'] = $phone;
				$directorio = 'users/'.$phone.'/jobs/';
				$data['images'] = scandir($directorio);

				unset($data['images'][0]);
				unset($data['images'][1]);

				$this->load->view('include/header');
				$this->load->view('worker/jobs', $data);
				$this->load->view('include/footer');
			}else{
				redirect('welcome/login');
			}
        }else{
            redirect('welcome/login');
        }
	}

	public function uploadProviderJob(){
		$this->load->helper("file");
		if(isset($_SESSION['phone'])){
			if($_SESSION['rol'] == 2 || $_SESSION['rol'] == 1){
				if($_POST['phone'] != ''){
					
					$provider = $this->User_Model->findByPhone($_POST['phone']);

					$path = "./users/".$_POST['phone']."/jobs/";
					$config['upload_path'] = $path;
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2048';
					$config['max_height'] = '2048';
					$config['file_name'] = 'job';
					
					$this->load->library('upload', $config);
					$this->load->library('encryption');

					if(!is_dir('./users/'.$_POST['phone'])){
						mkdir('./users/'.$_POST['phone'], 0777, TRUE);
						mkdir('./users/'.$_POST['phone'].'/profile', 0777, TRUE);
						mkdir('./users/'.$_POST['phone'].'/jobs', 0777, TRUE);
					}
					
					$directorio = 'users/'.$_POST['phone'].'/jobs/';
					$data['images'] = scandir($directorio);

					unset($data['images'][0]);
					unset($data['images'][1]);

					if(!$this->upload->do_upload('picture')){
						$error = array('error' => $this->upload->display_errors());
						$data['message'] = $error['error'];
						$data['phone'] = $_POST['phone'];
						$this->load->view('include/header');
						$this->load->view('messages/warning-message', $data);
						$this->load->view('worker/jobs', $data);
						$this->load->view('include/footer');
						
						//echo json_encode($error);
						//$this->load->view('upload_form', $error);
					}else{
						//$data = array('upload_data' => $this->upload->data());
						$data['message'] = 'Foto agregada';
						$data['phone'] = $_POST['phone'];
						$this->load->view('include/header');
						$this->load->view('messages/primary-message', $data);
						$this->load->view('worker/jobs', $data);
						$this->load->view('include/footer');
						
						//echo json_encode($data);
						//$this->load->view('upload_success', $data);
					}
					//delete_files($config['upload_path'].'/'.$_POST['phone'].'.jpg');
				}else{
					$data['message'] = 'Existieron campos faltantes.';
					$this->load->view('include/header');
					$this->load->view('messages/warning-message', $data);
					$this->load->view('worker/jobs', $data);
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