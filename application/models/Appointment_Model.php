<?php
class Appointment_Model extends CI_Model  {

    public function createAppointment($appointment){
        $this->db->set($appointment);
        $this->db->insert("appointments", $appointment);
        $id = $this->db->insert_id();
        return $id;
    }

    public function message($message){
        $this->db->set($message);
        $this->db->insert("chats", $message);
    }

    public function findAppointmentExistanceByUserAndProvider($id_user, $id_provider){ 
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_provider', $id_provider);
        $this->db->where('id_status', '1');
        $query = $this->db->get();

        $response = $query->result_array();
        if (!empty($response)){
            return $response[0];
        }
        else {
            return NULL;
        }
    }
    
    public function findProviderPendingDates($id_provider){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_provider', $id_provider);
        $this->db->where('id_status', 1);
        $query = $this->db->get();
    
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

    public function findUserPendingDates($id_user){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 1);
        $query = $this->db->get();
    
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

    public function findProviderDates($id_provider){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_provider', $id_provider);
        $query = $this->db->get();
    
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

    public function findUserDates($id_user){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
    
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

    public function findDates($id_user){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('id_user', $id_user);
        $this->db->or_where('id_provider', $id_user);
        $query = $this->db->get();
    
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

}
