<?php
class User_Model extends CI_Model  {

    public function loginUser($phone){
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where("phone", $phone);
        //$this->db->join("users_roles","users_roles.id = users.id_users_role");
        $query=$this->db->get();

        $response=$query->result_array();

        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findPhone($phone){
        $this->db->select('phone');
        $this->db->from('user');
        $this->db->where('phone', $phone);

        $query = $this->db->get();
        
        $response = $query->result_array();
    
        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }

    public function findIdByPhone($phone){
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('phone', $phone);

        $query = $this->db->get();
        
        $response = $query->result_array();
    
        if ($response > 0){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findByPhone($phone){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('phone', $phone);

        $query = $this->db->get();
        
        $response = $query->result_array();
    
        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }


    public function getAll(){
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }

    public function findById($id){
        $this->db->select('phone, name, surname, username, id_role, longitude, latitude, workshop, address_1, telephone');
        $this->db->from('user');
        $this->db->where("id", $id);
        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findUserById($id){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("id", $id);
        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findByUsername($username){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where("username", $username);
        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function insertUser($user){
        $this->db->set($user);
        $this->db->insert("user", $user);
    }

    public function updatePassword($phone, $password){
        $this->db->set('password', $password);
        $this->db->where('phone', $phone);
        $this->db->update('user');
    }

    public function activateRecoverPassword($id, $time, $number){
        $this->db->set('number', $number);
        $this->db->set('recovery', $time);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function deactivateRecoverPassword($id){
        $this->db->set('number', 0);
        $this->db->set('recovery', null);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function statusOff($phone){
        $this->db->set('status', 0);
        $this->db->where('phone', $phone);
        $this->db->update('user');
    }

    public function findAllServices(){
        $this->db->select('category.name, category.id, category.image, category.keycode');
        $this->db->from('user_category');
        
        $this->db->join('user', 'user.id = user_category.id_user');
        $this->db->join('category', 'category.id = user_category.id_category');
        
        $this->db->where("user.id_role", 4);
        $this->db->where("user.status", 1);
        $this->db->where("user_category.status", 1);

        $this->db->group_by('category.keycode');
        $this->db->order_by("category.name", "ASC");

        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }

    public function editDescriptionByPhone($phone, $description){
        $this->db->set('description', $description);
        $this->db->where('phone', $phone);
        $this->db->update('user');
    }

    public function findNearServices($longitude, $latitude){
        $this->db->select('category.name, category.id, category.image, category.keycode');
        $this->db->from('user_category');
        
        $this->db->join('user', 'user.id = user_category.id_user');
        $this->db->join('category', 'category.id = user_category.id_category');
        
        $this->db->where("user.id_role", 4);
        $this->db->where("user.status", 1);
        $this->db->where("user.longitude <", $longitude+(0.095000*5));
        $this->db->where("user.longitude >", $longitude-(0.095000*5));
        $this->db->where("user.latitude <", $latitude+(0.095000*5));
        $this->db->where("user.latitude >", $longitude-(0.095000*5));

        $this->db->group_by('category.keycode');
        $this->db->order_by("category.name", "ASC");

        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }
    
    public function findServiceProviders($category){
        $this->db->select('user.name, user.username, user.surname, user.status AS user_status, user_category.status AS category_status, user.workshop, user.address_1, user.phone, user.description');
        $this->db->from('user_category');

        
        $this->db->join('user', 'user.id = user_category.id_user');
        $this->db->join('category', 'category.id = user_category.id_category');
        
        $this->db->where("user.id_role", 4);
        $this->db->where("user.status", 1);
        $this->db->where("user_category.status", 1);
        $this->db->where("category.keycode", $category);

        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }

    public function findNearServiceProviders($longitude, $latitude, $category){
        $this->db->select('user.name, user.username, user.surname, user.status, user.latitude, user.longitude, user.workshop, user.address_1, user.phone, user.description');
        $this->db->from('user_category');

        
        $this->db->join('user', 'user.id = user_category.id_user');
        $this->db->join('category', 'category.id = user_category.id_category');
        
        $this->db->where("user.id_role", 4);
        $this->db->where("user.status", 1);
        $this->db->where("category.keycode", $category);
        $this->db->where("user.longitude <", $longitude+(0.095000*5));
        $this->db->where("user.longitude >", $longitude-(0.095000*5));
        $this->db->where("user.latitude <", $latitude+(0.095000*5));
        $this->db->where("user.latitude >", $longitude-(0.095000*5));

        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }

    
}

