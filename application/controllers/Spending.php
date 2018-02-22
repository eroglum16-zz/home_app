<?php
class Spending extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('spending_m');
                $this->load->helper('url');
                $this->load->helper('date');
        }

        public function index(){

            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{

        	        if($this->session->userdata['logged_in']==true){
        
        
                                
        
        				$data['title']="Harcamalar";
        				$data['name']=$this->session->userdata['name'];
        				$data['surname']=$this->session->userdata['surname'];
        				$data['email']=$this->session->userdata['email'];
                                        $data['spendings']=$this->spending_m->get_spending();
                                        
        
        
        		        $this->load->view('templates/header', $data);
        		        $this->load->view('spending/spending_v',$data);
        		        $this->load->view('templates/footer', $data);
        
        	        }else{
                        $this->session->set_flashdata('redirect', uri_string());
        	        	redirect("");
        	        }
                }

        }

        public function bill(){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
    
    
                            
    
                                    $data['title']="Faturalar";
                                    $data['name']=$this->session->userdata['name'];
                                    $data['surname']=$this->session->userdata['surname'];
                                    $data['email']=$this->session->userdata['email'];
                                    $data['bills']=$this->spending_m->get_bill();
                                    
    
    
                            $this->load->view('templates/header', $data);
                            $this->load->view('spending/bill_v',$data);
                            $this->load->view('templates/footer', $data);
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }

        }

        public function add_spending(){
            
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
                    if($this->session->userdata['logged_in']==true){
    
                            $insert_string= array(
                                    'user_id' => $this->session->userdata['user_id'], 
                                    'sp_name' => $this->input->post('item'),
                                    'sp_cost' => $this->input->post('cost')
                            );
    
                            $this->spending_m->add_spending($insert_string);
    
                            redirect("/spending");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }

        public function add_bill(){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
                    if($this->session->userdata['logged_in']==true){
    
                            $insert_string= array(
                                    'bill_type' => $this->input->post('type'), 
                                    'bill_due' => $this->input->post('due'),
                                    'bill_month' => $this->input->post('month'),
                                    'bill_year' => $this->input->post('year')
                            );
    
                            $this->spending_m->add_bill($insert_string);
    
                            redirect("/spending/bill");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }

        public function pay_bill($bill_id){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
                    if($this->session->userdata['logged_in']==true){
    
                            $this->spending_m->pay_bill($bill_id);
    
                            redirect("/spending/bill");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }

        
}
?>