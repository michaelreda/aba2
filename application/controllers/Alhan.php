<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alhan extends CI_Controller {

    public function alhan_list() {
        $data['alhan'] = $this->Global_model->get_table_data('alhan');
        $this->load->view('templates/header');
        $this->load->view('alhan/alhan_list', $data);
        $this->load->view('templates/footer');
    }

    public function view_lahn($lahn_id) {
        $data['lahn'] = $this->Global_model->get_data_by_id('alhan', $lahn_id);
        $data['user']=$this->Global_model->get_data_by_id('students',$this->session->id);
        $this->load->view('templates/header');
        $this->load->view('alhan/view_lahn', $data);
        $this->load->view('templates/footer');
    }

}
