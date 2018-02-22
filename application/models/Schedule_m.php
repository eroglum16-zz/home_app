<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_m extends CI_Model{

	public function __construct()
        {
            $this->load->database();
        }

    public function get1(){
        $query = $this->db->get_where('schedule', array('user_id' => 1, 'is_active' => 1));
        return $query->result_array();        
    }
    public function get2(){
        $query = $this->db->get_where('schedule', array('user_id' => 2, 'is_active' => 1));
        return $query->result_array();        
    }
    public function get3(){
        $query = $this->db->get_where('schedule', array('user_id' => 3, 'is_active' => 1));
        return $query->result_array();        
    }

    public function inactivate($class_id){

        $this->db->where('class_id', $class_id);
        $this->db->set('is_active', 0);
        return $this->db->update('schedule');

    }

    public function add($insert_data){

        return $this->db->insert('schedule', $insert_data);

    }

}

?>