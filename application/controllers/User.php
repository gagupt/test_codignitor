<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {

        //echo phpinfo();
        //load model

        $this->load->library('session');
        //$this->session->set_userdata('name','virat');

        $readS=$this->session->userdata('username');
//    echo $readS;

        if(empty($readS)){
            redirect('http://gauravtestnew.com/index.php/main/login');
        }
        $this->load->view('session_view');

        $this->load->model('Main_model');

        // Get
        $edit = $this->input->get('edit');

        if (!isset($edit)) {
            // get data
            $data['response'] = $this->Main_model->getUsersList();
            $data['view'] = 1;

            // load view
            $this->load->view('user_view', $data);
        } else {

            // Check submit button POST or not
            if ($this->input->post('submit') != NULL) {
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Main_model');

                // Update record
                $this->Main_model->updateUser($postData, $edit);

                // Redirect page
                redirect('user/');

            } else {

                // get data by id
                $data['response'] = $this->Main_model->getUserById($edit);
                $data['view'] = 2;

                // load view
                $this->load->view('user_view', $data);

            }
        }
    }

    public function unset_session_data() {
        //loading session library
        $this->load->library('session');

        //removing session data
        $this->session->unset_userdata('name');
        $this->load->view('session_view');
        //redirect('http://gauravtestnew.com/index.php/main/login');
    }

    public function deleteUser()
    {
        $this->load->model('Main_model');
        $delete = $this->input->get('delete');

        $this->load->model('Main_model');
        $this->Main_model->deleteUser($delete);

        redirect('user/');
    }


    public function addUser()
    {
        $this->load->model('Test_Redis');
        $this->Test_Redis->setRedisData("key1", "data1");

        $this->index();
        $this->load->model('Main_model');
        $data['view'] = 3;
        $data['response'] = $this->Main_model->getUsersList();
        $this->load->view('user_view', $data);
        if ($this->input->post('submit') != NULL) {
            // POST data
            $postData = $this->input->post();

            //load model
            $this->load->model('Main_model');

            // Update record
            $this->Main_model->addUser($postData);

            // Redirect page
            redirect('user/');

        }
    }
}