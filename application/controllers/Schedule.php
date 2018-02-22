<?php
class Schedule extends CI_Controller {

        public function index()
        {

            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{
        	        if($this->session->userdata['logged_in']==true){
        
        	        	$this->load->model("schedule_m");
        
        				$data['title']="Ders Programları";
        				$data['name']=$this->session->userdata['name'];
        				$data['surname']=$this->session->userdata['surname'];
        				$data['email']=$this->session->userdata['email'];
                                        $data['mert']=$this->schedule_m->get1();
                                        $data['yusuf']=$this->schedule_m->get2();
                                        $data['emre']=$this->schedule_m->get3();
        
        		        $this->load->helper('url');
        
        		        $this->load->view('templates/header', $data);
        		        $this->load->view('schedule/schedule_v',$data);
        		        $this->load->view('templates/footer', $data);
        
        	        }else{
                                $this->session->set_flashdata('redirect', uri_string());
        	        	redirect("");
        	        }
                }

        }

        public function inactivate($class_id){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
                            $this->load->model("schedule_m");
    
                            $this->schedule_m->inactivate($class_id);
    
                            redirect("/schedule");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }


        }

        public function add(){
            if($this->session->has_userdata('logged_in')==false){
                    $this->session->set_flashdata('redirect', uri_string());
                    $this->load->view('templates/warning');
                    
                }else{

                    if($this->session->userdata['logged_in']==true){
    
                            $this->load->model("schedule_m");
                            if ($this->input->post('classroom')=="") {
                                    $classroom="Belirtilmemiş";
                            }else{
                                $classroom=$this->input->post('classroom');
                            }
    
                            $term= $this->input->post('term');
                            $year=0;
    
                            if($term==1){
                                    $year=$this->input->post('year');
                            }else{
                                    $year=$this->input->post('year')+1;
                            }
    
                            $IS = array(
                                    'user_id' => $this->session->userdata('user_id') , 
                                    'class_name' => $this->input->post('class'),
                                    'classroom' => $classroom,
                                    'day' => $this->input->post('day'),
                                    'start' => $this->input->post('start'),
                                    'finish' => $this->input->post('finish'),
                                    'year' => $year,
                                    'term' => $term
                            );
    
                            $this->schedule_m->add($IS);
    
                            redirect("/schedule");
    
                    }else{
                            $this->session->set_flashdata('redirect', uri_string());
                            redirect("");
                    }
                }
        }


        
}
?>