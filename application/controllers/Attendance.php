<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    public function index() {
        $data['attendance'] = $this->Global_model->get_attendance_by_class_id('students', $this->session->class_id);
        
        $this->load->view('templates/header');
        $this->load->view('attendance',$data);
        $this->load->view('templates/footer');
//$this->session->sess_destroy();
    }

}
