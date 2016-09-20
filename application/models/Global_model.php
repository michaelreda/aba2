<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Global_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function global_insert($table_name,$data)
    {
        $this->db->insert($table_name,$data);
    }
    function global_insert_and_return_id($table_name,$data)
    {
        $this->db->insert($table_name,$data);
        return $this->db->insert_id();
    }
    
    
    function global_update($table_name,$id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update($table_name,$data);
    }
    function get_data_by_id($table_name,$id)
    {
        $this->db->where('id',$id);
        return $this->db->get($table_name)->row();
    }
    
    function get_datas_by_id($table_name,$id)
    {
        $this->db->where('id',$id);
        return $this->db->get($table_name)->result();
    }
    function get_attendance_by_class_id($table_name,$id)
    {
       
        $this->db->where('class_id',$id);
        $this->db->order_by("attendance","desc");
        return $this->db->get($table_name)->result();
    }
    function get_points_by_class_id($table_name,$id)
    {
       
        $this->db->where('class_id',$id);
        $this->db->order_by("points","desc");
        return $this->db->get($table_name)->result();
    }
    
    function get_table_count($table_name)
    {
        $this->db->from($table_name);
        return $this->db->count_all_results();
    }
    function get_table_data($table_name)
    {
        return $this->db->get($table_name)->result();
    }
    function check_email($table_name,$email)
    {
        $this->db->where("email", $email);
        $get_data = $this->db->get($table_name);
        if($get_data->num_rows() > 0)
        {
            return TRUE;
        }
        return FALSE;
    }
    function reset_password($table_name,$email,$new_password)
    {
        $this->db->where('email', $email);
        $this->db->update($table_name, array('password' => md5($new_password)));
        $this->send_new_password($table_name,$email,$new_password);
    }
    function send_new_password($table_name,$email,$new_password)
    {
        $msg_content = '';
        //get Client info
        $this->db->where('email', $email);
        $info = $this->db->get($table_name)->row();
        $msg_content .= "Dear $info->first_name $info->last_name <br>";
        $msg_content .= "Your new password is $new_password <br>";
        $msg_content .= "You can change it after login to your account";
        // config email smtp
        $settings = $this->db->get('emailsettings')->row();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => $settings->smtp_host, //ssl://smtp.googlemail.com
            'smtp_port' => $settings->smtp_port, // 465 
            'smtp_user' => $settings->smtp_user,
            'smtp_pass' => $settings->smtp_pass,
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($settings->host_mail);
        $this->email->to($email);
        $this->email->subject('Your New Password');
        $this->email->message($msg_content);
        $this->email->send();
    }
    function get_count_clients_by_status($table_name,$num)
    {
        $this->db->where('status', $num);
        $this->db->from($table_name);
        return $this->db->count_all_results();
    }
    function get_clients_by_status($table_name,$num)
    {
        $this->db->where('status', $num);
        $this->db->from($table_name);
        return $this->db->get()->result();
    }
    function update_client($table_name,$client_id, $data)
    {
        $this->db->where('id', $client_id);
        $this->db->update($table_name, $data);
        if($this->db->affected_rows() > 0)
        {
            $new_data = array(
                'client_first_name' => $data['first_name'],
                'client_last_name' => $data['last_name'],
                'client_display_name' => $data['display_name']
            );
            if($this->session->userdata('client_id') == $client_id)
            {
                $this->session->set_userdata($new_data);
            }
        }
    }
    function active_waiting_ban_client($table_name,$num,$client_id)
    {
        $this->db->where('id', $client_id);
        $data = array('status' => $num);
        $this->db->update($table_name, $data);
    }
    function global_delete($table_name,$id)
    {
        $this->db->where('id', $id);
        
        $this->db->where('id', $id);
        $this->db->delete($table_name);
    }
}