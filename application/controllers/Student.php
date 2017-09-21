<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function detail($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'|| $this->uri->segment(3) == '')
		{
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}
		 else 
			{
				$check_auth_client = $this->MyModel->check_auth_client();
				if($check_auth_client == true){		        
		        $response['status'] = 200;
		        $resp = $this->MyModel->student_detail_data($id);
				json_output($response['status'],$resp);
			}
		}
		
	}	
}