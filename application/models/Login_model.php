<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    
    function check_login($username,$password)
    {
        
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $get_user = $this->db->get("students")->row();
        
        if($get_user)
        {
            
            //add user data to session
            $new_data = array(
                'name' => $get_user->name,
                'attendance' => $get_user->attendance,
                'points' => $get_user->points,
                'class_id' => $get_user->class_id,
                'id' => $get_user->id,
                'username'=>$get_user->username,
                'password'=>$get_user->password,
                'logged'=>'true'
                
            );
            $this->session->set_userdata($new_data);
            return TRUE;
            
        }
        else
        {
            
            return FALSE;
        }
    }
}