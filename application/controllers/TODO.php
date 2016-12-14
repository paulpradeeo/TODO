<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TODO extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
	    $this->load->model('task');
    } 

		public function index(){
			$user_id = $this->session->userdata('user_id');
			$data['lists'] = $this->task->get_all_list($user_id);
			$this->load->view('Todo',$data);
		}

		public function CreateTask(){
			if ($this->task->create_task()) {
					$this->session->set_flashdata('Task_status','Task Hasbeen Created!');
					redirect('index.php/Home/index');
				}
		}

		public function delTask($task_id){
			$this->task->del_task($task_id);
			$this->index();
			
		}


		public function load_task($task_id){
			$data= $this->task->fetchTask($task_id);
			echo json_encode($data);	
		}


		public function updateTask(){
			$task_id=$this->input->post('task_id');
			$data = array(             
                'title'    => $this->input->post('task_title'),
                'description'    => $this->input->post('task_description'),
                'time_limit'     => $this->input->post('task_date')
            );
           if($this->task->edit_task($task_id,$data)){
                $this->session->set_flashdata('task_updated', 'Your task has been updated');
                //Redirect to index page with error aboves
                redirect('index.php/Home/index');
           }
		}

}

?>