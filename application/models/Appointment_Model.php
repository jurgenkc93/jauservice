<?php
class Appointment_Model extends CI_Model  {

    public function dateToday(){
        $today =  date('Y-m-d', time());
        return $today;
    }

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
    
    public function findById($id){
        $this->db->select('appointments.id, appointments.date, appointments.time, appointments.description, user.name AS user_name, user.surname AS user_surname, provider.name AS provider_name, provider.surname AS provider_surname, appointments.id_provider');
        $this->db->from('appointments');
        $this->db->where('appointments.id', $id);
        $this->db->join('user AS user', 'user.id = appointments.id_user', 'left');
        $this->db->join('user AS provider', 'provider.id = appointments.id_provider', 'left');
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
        $this->db->select('appointments.id, appointments.description, user.name, user.surname, user.phone');
        $this->db->from('appointments');
        $this->db->join('user', 'user.id = appointments.id_user');
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
        $this->db->select('appointments.id,appointments.date, appointments.description, user.name, user.surname, user.username');
        $this->db->from('appointments');
        $this->db->join('user', 'user.id = appointments.id_provider');
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
        $this->db->select('appointments.id, appointments.date, appointments.description, user.name, user.surname, user.phone');
        $this->db->from('appointments');
        $this->db->join('user', 'user.id = appointments.id_user');
        $this->db->where('id_provider', $id_provider);
        $this->db->where('appointments.id_status', 2);
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
        $this->db->select('appointments.id, appointments.date, appointments.time, appointments.description, user.name, user.surname, user.username');
        $this->db->from('appointments');
        $this->db->join('user', 'user.id = appointments.id_provider');
        $this->db->where('date >=', $this->dateToday());
        $this->db->where('appointments.id_user', $id_user);
        $this->db->where('id_status', 2);
        $this->db->order_by('appointments.date', 'ASC');
        $query = $this->db->get();
        //$query = $this->db->get('appointments', 30);
        
        $response = $query->result_array();
        if(!empty($response)){
            return $response;
        }else{
            return NULL;
        }
        
    }

    public function findUserPastDates($id_user){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('date <=', $this->dateToday());
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 3);
        $this->db->group_by('id_provider');
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }

    public function findUserComments($id_user, $id_provider){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('date <=', $this->dateToday());
        $this->db->where('id_user', $id_user);
        $this->db->where('id_user', $id_provider);
        $query = $this->db->get();
        
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }
    
    public function findDays($id_user){
        $this->db->select('date, id_provider, id_user, id_status');
        $this->db->where('date >=', $this->dateToday());
        $this->db->where('id_status', 2);
        
        $this->db->where('id_user', $id_user);
        $this->db->or_where('id_provider', $id_user);

        $this->db->group_by('date');
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get('appointments', 30);
        
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
    }
    
    public function findDatesByDay($id_user, $day){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('date', $day);
        $this->db->where('id_status', 2);
        
        $this->db->where('id_user', $id_user);
        $this->db->or_where('id_provider', $id_user);
        
        $this->db->order_by('time', 'ASC');
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
        $this->db->where('date >=', $this->dateToday());
        
        $this->db->where('id_user', $id_user);
        $this->db->or_where('id_provider', $id_user);
        
        $this->db->where('id_status', 2);
        $this->db->order_by('date', 'ASC');
        $query = $this->db->get();
        
        $response = $query->result_array();
        if (!empty($response)){
            return $response;
        }
        else {
            return NULL;
        }
        
    }
    
    public function date2Appointment($id, $date, $time){
        $this->db->set('date', $date);
        $this->db->set('time', $time);
        $this->db->set('id_status', 2);
        $this->db->where('id', $id);
        $this->db->update('appointments');
    }
    
    public function findUserComentProvider($user, $provider){
        $this->db->select('*');
        $this->db->from('appointment_comments');
        $this->db->where('id_user', $user);
        $this->db->where('id_provider', $provider);
        $query = $this->db->get();
        $response = $query->result_array();
        if (!empty($response)){
            return $response[0];
        }
        else {
            return null;
        }
    }

}
