<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('login_m');
        }


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		if($this->session->has_userdata('logged_in')){
			if($this->session->userdata['logged_in']==true){
				redirect("/pages/view");
			}
		}
		
		if($this->session->flashdata('email')){
			$data['email'] = $this->session->flashdata('email');
		}else{
			$data['email'] = "";
		}

		$data['validationError'] = "";

		if($this->session->flashdata('registration')){
			$data['validationError']=$this->session->flashdata('registration');
		}

		if($this->session->flashdata('loginError')){
			$data['validationError']=$this->session->flashdata('loginError');
		}
		
		if($this->session->flashdata('redirect')){
			$data['redirect']=$this->session->flashdata('redirect');
		}else{
			$data['redirect']="pages/view";
		}




		$this->load->view('pages/login_v',$data);
	}

	public function check_login(){
		$this->load->helper('cookie');
		if($this->session->has_userdata('logged_in')){
			if($this->session->userdata['logged_in']==true){
				redirect("/pages/view");
			}
		}

		
		if($this->login_m->check_user($this->input->post('email'),$this->input->post('password'))){
			$resultrow=$this->login_m->check_user($this->input->post('email'),$this->input->post('password'));
			if($resultrow['is_active']==1){
				$userinfo = array(
					'user_id' => $resultrow['id'],
				    'name'  => $resultrow['name'],
				    'surname'  => $resultrow['surname'],
				    'email'     => $resultrow['username'],
				    'logged_in' => TRUE
				);
				$this->session->set_userdata($userinfo);

				if($this->session->flashdata('redirect')){
					redirect($this->session->flashdata('redirect'));
				}else{
					redirect("/pages/view");
				}
								
			}else{
				$this->session->set_flashdata('email', $this->input->post('email'));
				$this->session->set_flashdata('loginError', "Hesabınız yönetici onayı bekliyor!");
				redirect("");	
			}
		}else{
			$this->session->set_flashdata('email', $this->input->post('email'));
			$this->session->set_flashdata('loginError', "Kullanıcı adı veya şifre hatası!");
			redirect("");
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		
		//delete_cookie('rememberme');
		
		redirect('');
	}	

	public function register(){

		$new_user = array(
			'name' => $this->input->post('name') , 
			'surname' => $this->input->post('surname') ,
			'username' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'is_active' => 0
		);

		if ($this->login_m->register_user($new_user)) {
			$this->session->set_flashdata('registration', "Kayıt başvurunuz onay beklemektedir.");
		}else{
			$this->session->set_flashdata('registration', "Kayıt başvurunuzda hata oluştu!");
		}
		redirect("");
		
	}

}
