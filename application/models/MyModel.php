<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "simplerestapi";

    public function check_auth_client(){
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
        if($client_service == $this->client_service && $auth_key == $this->auth_key){
            return true;
        } else {
            return json_output(401,array('status' => 401,'message' => 'Unauthorized.'));
        }
    }

    public function login($username,$password)
    {
        $q  = $this->db->select('password,type')->from('login')->where('username',$username)->get()->row();
        if($q == ""){

            return array('status' => 200,'message' => 'Username not found.');
        } 
        else 
        {
             $hashed_password = $q->password;
             $type= $q->type;
            // echo $hashed_password;
             if($hashed_password == $password)
             {
                
                 return array('status' => 200,'message' => 'success','type' => $type);
                 exit;
             }
             else
             {
                
                 return array('status' => 200,'message' => 'wrong password');
                  exit;
             }
        }     
    }
      public function teacher_detail_data($id)
    {
        return $this->db->select('*')->from('teachers')->where('teacher_id',$id)->get()->row();
    }  

     public function student_detail_data($id)
    {
        return $this->db->select('*')->from('student')->where('student_id',$id)->get()->row();
    }

      public function class_timetable($class_id,$day)
    {
        return $this->db->select('*')->from($day)->where('class_id',$class_id)->get()->row();
    }

      public function class_allstudent($id)
    {
        return $this->db->select('*')->from('student')->where('class_id',$id)->get()->result();
    }


    

  
}
