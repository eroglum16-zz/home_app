<?php
class Homework extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('homework_m');
                $this->load->helper('url');
        }

        public function index()
        {
        
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{

        	        if($this->session->userdata['logged_in']==true){
        
        
                                $this->load->model('schedule_m');
        
        				$data['title']="Ödev Planlayıcı";
        				$data['name']=$this->session->userdata['name'];
        				$data['surname']=$this->session->userdata['surname'];
        				$data['email']=$this->session->userdata['email'];
                                        $data['homework']=$this->homework_m->get_homework();
        
        
        		        $this->load->view('templates/header', $data);
        		        $this->load->view('homework/homework_v',$data);
        		        $this->load->view('templates/footer', $data);
        
        	        }else{
                                $this->session->set_flashdata('redirect', uri_string());
        	        	redirect("");
        	        }
                }

        }

        public function tick_homework($hw_id){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
                    if($this->session->userdata['logged_in']==true){
    
                            $this->homework_m->tick_homework($hw_id);
    
                            redirect("/homework");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }

        public function add_homework(){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
                    if($this->session->userdata['logged_in']==true){
    
                            $due_date=date("Y-m-d",strtotime($this->input->post('month')." ".$this->input->post('day')." ".$this->input->post('year')));
    
                            $IS = array(
                                    'class_id' => $this->input->post('class') , 
                                    'hw_content' => $this->input->post('description'),
                                    'due_date' => $due_date,
                            );
    
                            $this->homework_m->add_homework($IS);
    
                            redirect("/homework");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }
        
}
?>