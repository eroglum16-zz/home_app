<?php
class Pages extends CI_Controller {

        public function view()
        {

	        	/* if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }
	        $data['title'] = ucfirst($page); // Capitalize the first letter
			*/
                if($this->session->has_userdata('logged_in')==false){
                    
                    $this->load->view('templates/warning');
                    
                }else{
             
    	            if($this->session->userdata['logged_in']==true){
    
        	        	$this->load->model("dashboard_m");
                        $this->load->model("homework_m");
                        $this->load->model("spending_m");
        
        				$data['title']="Anasayfa";
        				$data['name']=$this->session->userdata['name'];
        				$data['surname']=$this->session->userdata['surname'];
        				$data['email']=$this->session->userdata['email'];
        				$data['balance']=$this->dashboard_m->learn_balance();
        				$data['todo']=$this->dashboard_m->get_todo();
                                        $data['homework']=$this->homework_m->get_homework();
                                        $data['spending']=$this->spending_m->get_spending();
        
        		        $this->load->helper('url');
        
        		        $this->load->view('templates/header', $data);
        		        $this->load->view('pages/dashboard_v',$data);
        		        $this->load->view('templates/footer', $data);
    	            
    	        }else{
    	        	redirect("");
    	        }
            }

        }

        public function add_money(){
            if($this->session->has_userdata('logged_in')==false){
                    
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
    
                    	$this->load->model("dashboard_m");
    
                    	$insert_data = $arrayName = array(
                    		'adder_id' => $this->session->userdata('user_id') ,
                    		'added_amount' => $this->input->post('amount') ,
                    	);
    
                    	$this->dashboard_m->add_money($insert_data);
    
    
                    	redirect("/pages/view");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("/");
                    }
                }

        }

        public function add_todo(){
            
            if($this->session->has_userdata('logged_in')==false){
                    
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
    
                    	$this->load->model("dashboard_m");
    
                    	$insert_data = $arrayName = array(
                    		'todo_adder' => $this->session->userdata('user_id') ,
                    		'todo_text' => $this->input->post('item') ,
                    		'is_done' => 0
                    	);
    
                    	$this->dashboard_m->add_todo($insert_data);
    
                    	
                    	redirect("/pages/view");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("/");
                    }
                }
        }

        public function tick_todo($todo_id){
            if($this->session->has_userdata('logged_in')==false){
                    
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
    
                    	$this->load->model("dashboard_m");
    
                    	$this->dashboard_m->tick_todo($todo_id);
    
                    	redirect("/pages/view");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }
        
}
?>