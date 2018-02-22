<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_m extends CI_Model{

	public function __construct()
        {
            $this->load->database();
        }

    public function add_money($insert_data){
        $query = $this->db->get('balance');
        $result = $query->row_array();

        $current_amount = 0;

        $current_amount = $result['current_balance'];
        $current_amount += $insert_data['added_amount'];

        $insert_data['current_balance'] = $current_amount;

        $this->db->set('current_balance', $current_amount);
        $this->db->update('balance');

        return $this->db->insert('balance', $insert_data);
    }

    public function learn_balance(){
        $result = $this->db->get('balance')->row_array();

        if(count($result)>0){
            return $result['current_balance'];
        }else{
            return 0;
        }
    }

    public function add_todo($insert_data){

        return $this->db->insert('todo', $insert_data);

    }

    public function get_todo(){
        $this->db->order_by('todo_id', 'ASC');
        $query = $this->db->get('todo');

        if(count($query->result_array())>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function tick_todo($todo_id){

        $this->db->where('todo_id', $todo_id);
        $this->db->set('is_done', 1);
        return $this->db->update('todo');


    }

}

?>