<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spending_m extends CI_Model{

	public function __construct()
        {
            $this->load->database();
        }

    public function get_spending(){
        $this->db->select('*');
        $this->db->from('spending');
        $this->db->join('users', 'users.id = spending.user_id');
        $this->db->order_by('sp_date', 'ASC');
        $query = $this->db->get();

        return $query->result_array();        
    }

    public function get_bill(){
        $query = $this->db->get('bills');
        return $query->result_array();        
    }

    public function add_spending($insert_data){

        $query = $this->db->get('balance');
        $result = $query->row_array();

        $current_amount = 0;

        $current_amount = $result['current_balance'];
        $current_amount -= $insert_data['sp_cost'];

        $this->db->set('current_balance', $current_amount);
        
        if($this->db->update('balance')){
            return $this->db->insert('spending', $insert_data);
        }else return false;

    }

    public function add_bill($insert_data){

        $query = $this->db->get('balance');
        $result = $query->row_array();

        $current_amount = 0;

        $current_amount = $result['current_balance'];
        $current_amount -= $insert_data['bill_due'];

        $this->db->set('current_balance', $current_amount);
        
        if($this->db->update('balance')){
            return $this->db->insert('bills', $insert_data);
        }else return false;

    }

    public function pay_bill($bill_id){

        $this->db->where('bill_id', $bill_id);
        $this->db->set('is_paid', 1);
        return $this->db->update('bills');
    }

}

?>