<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lessons extends CI_Controller {

    public function lesson_summary() {
        $data['lesson'] = $this->Global_model->get_table_data('lessons');
        $data['user']=$this->Global_model->get_data_by_id('students',$this->session->id);
        $this->load->view('templates/header');
        $this->load->view('lesson/lesson_summary', $data);
        $this->load->view('templates/footer');
    }

    public function lesson_questions() {
        $data['lesson'] = $this->Global_model->get_table_data('lessons');
        $data['questions'] = $this->Global_model->get_table_data('lessons_questions');
        $data['user']=$this->Global_model->get_data_by_id('students',$this->session->id);
        $this->load->view('templates/header');
        $this->load->view('lesson/lesson_questions', $data);
        $this->load->view('templates/footer');
    }

}
