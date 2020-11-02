<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

	public function __construct(){
        header("Access-Control-Allow-Headers: *");
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET");
        header('Content-Type: application/json');
        parent::__construct();
		$this->load->model("User_Model");
		$this->load->model("Category_Model");
		$this->load->model("Appointment_Model");
	}

	public function getPhone($phone){
        $data = $this->User_Model->findPhone($phone);
        echo json_encode($data);
	}
	public function getEmail($email, $domain){
        $data = $this->User_Model->findEmail($email . "@" . $domain);
        echo json_encode($data);
	}
	
	public function findUsername($password){
		$this->load->library('encryption');
		
		$encrytptedPass = $this->encryption->encrypt($password);

		$kary = array(
			'karystaimika' => $encrytptedPass
		);

		echo json_encode($kary);
	}
	
	public function createUser(){
		if(file_get_contents('php://input')){
			$json = file_get_contents('php://input');

			// Converts it into a PHP object
			$data = json_decode($json);
			
			$this->load->library('encryption');
			
			$encrytptedPass = $this->encryption->encrypt($data->password);
			
			$user = $this->User_Model->findByPhone($data->phone);

			if($user == null){
				$newUser = array(
					"phone"=>$data->phone,
					"password"=>$encrytptedPass,
					"name"=>$data->name,
					"surname"=>$data->surname,
					"id_role"=>3
				);
				try{
					$this->User_Model->insertUser($newUser);
				}catch(Exception $e){
					$response['error'] = $e;
					//echo json_encode($e);
				}
				$response['title'] = "Bienvenido ".$newUser['name']." por favor ";
				$response['body'] = 'Ya puedes empezar a utilizar Jauservice <a href="'.base_url().'"index.php/welcome/user">Iniciar Sesión</a>';
				$response['action'] = base_url().'index.php/welcome/user';
				echo json_encode($response);
			}else{
				$response['title'] = "Cuenta existente!";
				$response['body'] = 'Usted ya tiene una cuenta pruebe <a href="'.base_url().'"index.php/welcome/user">iniciando Sesión</a>';
				echo json_encode($response);
			}
		}else{
			echo json_encode('Ora no empujen!');
		}
	}
	
	public function editAbout(){
		if(file_get_contents('php://input')){
			$json = file_get_contents('php://input');
			
			// Converts it into a PHP object
			$data = json_decode($json);
			
			$this->User_Model->editDescriptionByPhone($data->phone, $data->description);
			
			$response['title'] = "Hecho!";
			$response['body'] = "Su descripción ha sido correctamente guardada!";
			/*
			*/
			echo json_encode($response);
		}else{
			echo json_encode('¿Me da usted permiso?');
		}
	}

	public function editCategory(){
		if(file_get_contents('php://input')){
			$json = file_get_contents('php://input');
			$data = json_decode($json);

			if($this->User_Model->findByPhone($data->phone)){
				$user = $this->User_Model->findByPhone($data->phone);
				$category = $this->Category_Model->findUserCategoryById($data->id);
				if($user['id'] == $category['id_user']){
					$description = str_replace("<br />", "", $data->description);
					$this->Category_Model->editCategoryById($data->id, $description);
					
					$response['title'] = "Hecho!";
					$response['body'] = "Su descripción ha sido correctamente guardada!";
					echo json_encode($response);
				}else{
					$response['title'] = "Error!";
					$response['body'] = "Parece que usted no es el propietario de este conocimimento!";
					echo json_encode($response);
				}
			}else{
				$response['title'] = "Error!";
				$response['body'] = "¿Ya probaste creando una cuenta?";
				echo json_encode($response);
			}
			
		}else{
			echo json_encode('Disculpe señorita, ¿Se le apetece un te?');
		}
	}

	public function addCategory(){
		if(file_get_contents('php://input')){
			$json = file_get_contents('php://input');
			$data = json_decode($json);

			$id = $this->User_Model->findIdByPhone($data->phone);

			if($id != NULL){
				$category = $this->Category_Model->findCategoryExistanceByUserId($id['id'], $data->id);

				if($category != NULL){
					//$category = $this->Category_Model->findCategoryExistanceByUserId($obj['id_user'], $obj['id_category']);
					$response['title'] = 'Categoría existente';
					$response['body'] = 'Esta categoría ya se encuentra registrada';
					echo json_encode($response);
				}else{
					$category['id_user'] = $id['id'];
					$category['id_category'] = $data->id;
					$category['description'] = $data->description;
					$this->Category_Model->createUserCategory($category);

					$response['title'] = 'Categoría agregada';
					$response['body'] = '';
					
					echo json_encode($response);
				}
				/*
				if($category != NULL){
				}else{
					echo json_encode($category);
				}
				*/
			}
			
		}else{
			echo json_encode('Disculpe señorita, ¿Se le apetece un te?');
		}
	}

	public function downCategory(){
		if(file_get_contents('php://input')){
			$json = file_get_contents('php://input');
			$data = json_decode($json);

			$id = $this->User_Model->findIdByPhone($data->phone);

			if($id != NULL){
				$category = $this->Category_Model->changeToStatusReviewCategoryUserById($data->id);
				
				$response['title'] = 'Categoría desactivada';
				$response['body'] = 'Los usuarios no podrán ver esta categoría en tu perfil';
				echo json_encode($response);
				/*
				if($category != NULL){
				}else{
					echo json_encode($category);
				}
				*/
			}
			
		}else{
			echo json_encode('Disculpe señorita, ¿Se le apetece un te?');
		}
	}

	public function appointment(){
		if(file_get_contents('php://input') && $_SERVER['REQUEST_METHOD'] == "POST"){
			$json = file_get_contents('php://input');
			$data = json_decode($json);

			
			$id_user = $this->User_Model->findIdByPhone($data->phone);
			if($id_user != NULL){
				$provider = $this->User_Model->findByUsername($data->provider);

				if($id_user['id'] != $provider['id']){
					$appointment = $this->Appointment_Model->findAppointmentExistanceByUserAndProvider($id_user['id'], $provider['id']);
					if($appointment == NULL){
						$appointment['id_user'] = $id_user['id'];
						$appointment['id_provider'] = $provider['id'];
						$appointment['description'] = $data->reason;
						$id_appointment = $this->Appointment_Model->createAppointment($appointment);
						
						$response['title'] = "Consulta realizada";
						$response['body'] = "Me pondré en contacto con usted en cuanto me sea posible!";
						echo json_encode($response);
					}else{
						$response['title'] = "Cita pendiente";
						$response['body'] = "Ya existe una cita pendiente, no podemos agendar más!";
						echo json_encode($response);
					}
					
					$message['phone'] = $provider['phone'];
					$message['message'] = $data->reason;
				}else{
					$response['title'] = "No es posible";
					$response['body'] = "Si quieres una cita contigo mismo no es necesario agendarla!";
					echo json_encode($response);
				}
			}else{
				echo json_encode('Disculpe señorita, ¿Se le apetece un café?');
			}
		}else{
			echo json_encode('Disculpe señorita, ¿Se le apetece un te?');
		}
	}
	
	public function values(){
		print_r($_SESSION);
	}

	public function session(){
		header('Content-Type: application/json');
		echo json_encode($_SESSION);
	}

	public function hola($email, $password){
		$resultado=$this->User_Model->loginUser($email, $password);
		header('Content-Type: application/json');
		echo json_encode($resultado);
	}

}
