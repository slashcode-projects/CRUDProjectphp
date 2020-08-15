<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'users'; 
    }
    function validateLoginUser($formArray) {
        $this->db->where('email',$formArray['email']);
        $this->db->where('password',md5($formArray['password']));
        $this->db->where('status',1);
        return $user = $this->db->get('users')->row_array(); 
    }
    function getUserById($userId){
        $this->db->where('id',$userId);
        return $user = $this->db->get('users')->row_array();
    }

    //insert user details
    public function insert($data = array()) { 
        if(!empty($data)){ 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
             
            $insert = $this->db->insert($this->table, $data); 
             
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }

    public function getRows($email){
     $this->db->where('email',$email);
        return $user = $this->db->get('users')->row_array();   
    }

}