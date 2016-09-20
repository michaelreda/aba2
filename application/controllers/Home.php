<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function index() {
        
        $this->load->view('templates/header');
        $this->load->view('home');
        $this->load->view('templates/footer');
        //$this->session->sess_destroy();
    }

    public function login($username,$password) {
       
      //  $username = $this->input->post('username');
        //$password = $this->input->post('password'); //do_hash($this->input->post('password'), 'md5'); commented by michael
       // print_r($this->Global_model->get_data_by_id('students',1));
        $this->load->model('Login_model');
        $check_login_result = $this->Login_model->check_login($username, $password);
        
        if ($check_login_result) {
            redirect('Home');
        } else {
            redirect('Home');
        }
    }

}
