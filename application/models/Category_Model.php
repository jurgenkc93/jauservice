<?php
class Category_Model extends CI_Model  {

    public function findAll(){
        $this->db->select('*');
        $this->db->from('category');
        $query = $this->db->get();
        $response = $query->result_array();
        return $response;
    }

    public function findByKeycode($keycode){
        $this->db->select('name, image');
        $this->db->from('category');
        $this->db->where('keycode', $keycode);
        $query = $this->db->get();
        $response = $query->result_array();
        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findUserCategoryById($id){
        $this->db->select('*');
        $this->db->from('user_category');
        $this->db->where('id', $id);
        $query = $this->db->get();

        $response = $query->result_array();
        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function createUserCategory($user_category){
        $this->db->set($user_category);
        $this->db->insert("user_category", $user_category);
    }

    public function updatePassword($phone, $password){
        $this->db->set('password', $password);
        $this->db->where('phone', $phone);
        $this->db->update('user');
    }

    public function changeToStatusReviewCategoryUserById($id){
        $this->db->set('status', 2);
        $this->db->where('id', $id);
        $this->db->update('user_category');
    }
    

    public function findCategoryExistanceByUserId($id_user, $id_category){
        $this->db->select('*');
        $this->db->from('user_category');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_category', $id_category);
        $query = $this->db->get();

        $response = $query->result_array();
        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }

    public function findServicesByPhone($phone){
        $this->db->select('category.name, user_category.id, category.image, category.keycode, user_category.description, user_category.status');
        $this->db->from('user_category');
        
        $this->db->join('user', 'user.id = user_category.id_user');
        $this->db->join('category', 'category.id = user_category.id_category');
        
        $this->db->where("user.id_role", 4);
        $this->db->where("user.status", 1);
        $this->db->where("user.phone", $phone);
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

    public function editCategoryById($id, $description){
        $this->db->set('description', nl2br($description));
        $this->db->where('id', $id);
        $this->db->update('user_category');
    }


}
