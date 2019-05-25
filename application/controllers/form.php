<?php

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

// When user submit data on view page, Then this function store data in array.
    public function data_submitted()
    {
        $data = array(
            'user_name' => $this->input->post('uname'),
            'name' => $this->input->post('u_name'),
            'user_email_id' => $this->input->post('u_email'),
            'user_phone' => $this->input->post('u_phone'),
            'user_pass' => $this->input->post('u_pass'),
        );
        $this->load->view("register_form", $data);
    }
}
