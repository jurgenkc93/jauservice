<?php
class Address_Model extends CI_Model  {

    public function getAll(){
        $this->db->select('*');
        $this->db->from('address');
        $query = $this->db->get();

        $response = $query->result_array();

        if ($response > 0){
            return $response;
        }
        else {
            return NULL;
        }
    }