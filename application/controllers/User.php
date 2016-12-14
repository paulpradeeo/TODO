<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	public function index()
	{

		$this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
	    $this->load->model('usermodel');
	}

	public function __construct() {
        parent::__construct();
       /* $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('usermodel');*/
    }  

		public function login(){
			$username =$this->input->post('username');
			$password =md5($this->input->post('password'));
			$user_id = $this->usermodel->login_user($username,$password);
			//echo $username."<br>".$user_id;
			if ($user_id) {
				$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
				$this->session->set_flashdata('login_details','Login success');
				$this->session->set_userdata($user_data);
				redirect('index.php/TODO/index');
			}else{
				$this->session->set_flashdata('Error','Invalid Login');
				redirect('index.php/Home/index');
			}
		}

		public function register(){
			
				if ($this->usermodel->create_member()) {
					$this->session->set_flashdata('registered','You are now register');
					redirect('index.php/Home/index');
				}

		}


		public function logout()
		{
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect('index.php');
		}
}

?>