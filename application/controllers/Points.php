<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Points extends CI_Controller {

    public function index() {
        $data['points'] = $this->Global_model->get_points_by_class_id('students', $this->session->class_id);
        $data['user']=$this->Global_model->get_data_by_id('students',$this->session->id);
        $this->load->view('templates/header');
        $this->load->view('points', $data);
        $this->load->view('templates/footer');
//$this->session->sess_destroy();
    }

    public function add_points() {
        $postData = $this->input->post();
        $points = $postData['points'];
        $this->session->set_userdata('points', $this->session->points + $points);
        $user=$this->Global_model->get_data_by_id('students',$this->session->id);
        
        $new_data = array(
            'name' => $this->session->name,
            'attendance' => $this->session->attendance,
            'points' => $this->session->points,
            'class_id' => $this->session->class_id,
            'id' => $this->session->id,
            'username' => $this->session->username,
            'password' =>$this->session->password,
            'visited'=>$user->visited.$postData['visited']
        );
        $this->Global_model->global_update('students', $this->session->userdata('id'), $new_data);
    }

}
