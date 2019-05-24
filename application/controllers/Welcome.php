<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {

        $this->load->model("test_model");
        $this->test_model->getData();
    }

    public function myview()
    {
        $var1 = $this->input->post("var1");
        //$var2 = $this->input->get("var2");
        //$var3 = $this->get("var2");
        //echo $var2 . " " . $var3;
        echo "hello";
    }
}