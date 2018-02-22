<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model{

	public function __construct()
        {
            $this->load->database();
        }

    public function check_user($mail, $pass){
    	$query = $this->db->get_where('users', array('username' => $mail, 'password' => md5($pass)), 1);
    	$result = $query->row_array();

    	if (isset($result))
		{
			return $result;
		}else{
			return false;
		}
    }

    public function register_user($new_user){

        //if($new_user['name']!=null)

    	$query = $this->db->get_where('users', array('username' => $new_user['username']), 1);
    	$result = $query->row_array();

    	if(count($result)>0){
    		return false;
    	}else{
    		return $this->db->insert('users', $new_user);
    	}
    	
    }

}

?>