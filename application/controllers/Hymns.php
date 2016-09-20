<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hymns extends CI_Controller {

    public function hymns_list() {
        $data['hymns'] = $this->Global_model->get_table_data('hymns');
        $this->load->view('templates/header');
        $this->load->view('hymns/hymns_list', $data);
        $this->load->view('templates/footer');
    }

    public function view_hymn($hymn_id) {
        $data['hymn'] = $this->Global_model->get_data_by_id('hymns', $hymn_id);
        $data['user']=$this->Global_model->get_data_by_id('students',$this->session->id);
        $this->load->view('templates/header');
        $this->load->view('hymns/view_hymn', $data);
        $this->load->view('templates/footer');
    }

}
