<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework_m extends CI_Model{

	public function __construct()
        {

            $this->load->database(); 

        }

    public function get_homework(){
        $this->db->select('*');
        $this->db->from('homeworks');
        $this->db->join('schedule', 'schedule.class_id = homeworks.class_id');
        $this->db->where('user_id', $this->session->userdata['user_id']); 
        $this->db->where('is_done', 0); 
        $this->db->order_by('due_date', 'ASC');
        $query = $this->db->get();

        $result= $query->result_array();

        if(count($result)>0){
            return $result;
        }else{
            return false;
        }
    }

    public function tick_homework($hw_id){

        $this->db->where('hw_id', $hw_id);
        $this->db->set('is_done', 1);
        return $this->db->update('homeworks');


    }

    public function add_homework($IS){

        return $this->db->insert('homeworks', $IS);

    }

}

?>