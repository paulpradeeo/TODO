<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Model{

	public function __construct()
    {
        parent::__construct();
       
    }

	public function create_task(){
		$data = array(
				'task_id'=>'',
				'id'=>$this->session->userdata('user_id'),
				'title'=>$this->input->post('task_title'),
				'description'=>$this->input->post('task_description'),
				'time_limit'=>$this->input->post('task_date')
			);
		$insert = $this->db->insert('task',$data);
		return $insert;
	}


	public function edit_task($task_id,$data){
        $this->db->where('task_id', $task_id);
        $this->db->update('task', $data); 
        return TRUE;
    }


	public function get_all_list($id){

		$this->db->where('id',$id);
		$query = $this->db->get('task');		
		return $query->result();
	}


	public function del_task($task_id)
	{
		$this->db->where('task_id',$task_id);
        $this->db->delete('task');
        return;
	}


	public function fetchTask($task_id){
		$this->db->where('task_id',$task_id);
		$query = $this->db->get('task');		
		return $query->result();
	}

}

?>