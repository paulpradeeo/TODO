<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model{

	public function __construct()
    {
        parent::__construct();
    }

	public function create_member(){
		$data = array(
				'id'=>'',
				'name'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password'))
			);
		$insert = $this->db->insert('users',$data);
		return $insert;
	}



	public function login_user($username,$password)
	{
		$this->db->where('name',$username);
		$this->db->where('password',$password);

		$result = $this->db->get('users');
		if($result->num_rows()){
			return $result->row(0)->id;
		}else{
			return false;
		}
	}
}

?>