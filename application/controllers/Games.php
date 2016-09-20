<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Games extends CI_Controller {

    public function index() {
        
        $this->load->view('templates/header');
        $this->load->view('games');
        $this->load->view('templates/footer');
//$this->session->sess_destroy();
    }

}
