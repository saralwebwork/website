<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function timetable()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET')
		{
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}
		 else 
			{	
				$check_auth_client = $this->MyModel->check_auth_client();
				if($check_auth_client == true){	
				$params = $_REQUEST;
				$class_id = $params['classid'];
		        $day = $params['day'];
		        $response['status'] = 200;
		        $resp = $this->MyModel->class_timetable($class_id,$day);
				json_output($response['status'],$resp);
			}
		}
		
	}

	public function all_student($id)
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET')
		{
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}
		 else 
			{	
				$check_auth_client = $this->MyModel->check_auth_client();
				if($check_auth_client == true){	
				$response['status'] = 200;
		        $resp = $this->MyModel->class_allstudent($id);
				json_output($response['status'],$resp);
			}
		}
		
	}	
}