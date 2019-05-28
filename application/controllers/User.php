<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function loadOldTable()
    {
        $this->load->library('session');
        $readS = $this->session->userdata('username');
        if (empty($readS)) {
            redirect('http://gauravtestnew.com/index.php/main/login');
        }
        $this->load->model('Main_model');
        $edit = $this->input->get('edit');

        if (!isset($edit)) {
            $data['response'] = $this->Main_model->getUsersList();
            $data['view'] = 1;
            $this->load->view('Timeline', $data);
        } else {
            if ($this->input->post('submit') != NULL) {
                $postData = $this->input->post();
                $this->load->model('Main_model');
                $this->Main_model->updateUser($postData, $edit);
                redirect('user/');
            } else {
                $data['response'] = $this->Main_model->getUserById($edit);
                $data['view'] = 2;
                $this->load->view('Timeline', $data);
            }
        }
    }

    public function index()
    {
        $this->load->library('session');
        $readS = $this->session->userdata('username');
        if (empty($readS)) {
            redirect('http://gauravtestnew.com/index.php/main/login');
        }
        $this->load->model('Main_model');
        $edit = $this->input->get('edit');
        $data['userdata'] = $this->Main_model->getUserByUsername($this->session->userdata('username'));
        if (!isset($edit)) {
            $data['response'] = $this->Main_model->getPostsList();
            $data['view'] = 1;

            //create name to username map
            $this->load->model('Main_model');
            $user1list = $this->Main_model->getNewUsersList();

            foreach ($user1list as $user1) {
                $namemap[$user1['username']] = $user1['name'];
            }
            $data['namemap'] = $namemap;

            //create likes map
            $likes = array();
            foreach ($data['response'] as $item) {
                $likes[$item['id']] = $this->Main_model->getLikesCount($item['id']);
                $likes[$item['id']]['isLiked'] = $this->Main_model->
                isLikedPost($this->session->userdata('username'), $item['id']);
            }
            $data['likes'] = $likes;
            $data['notifications'] = $this->Main_model->getNotifsForUser($this->session->userdata('username'));

            $this->load->view('Timeline', $data);
        } else {
            if ($this->input->post('submit') != NULL) {
                $postData = $this->input->post();
                $this->load->model('Main_model');
                $this->Main_model->updatePost($postData, $edit);
                redirect('user/');
            } else {
                $data['response'] = $this->Main_model->getPostById($edit);
                $data['view'] = 2;
                $this->load->view('Timeline', $data);
            }
        }
    }

    public function unset_session_data()
    {
        //loading session library
        $this->load->library('session');

        //removing session data
        $this->session->unset_userdata('name');
        $this->load->view('session_view');
        //redirect('http://gauravtestnew.com/index.php/main/login');
    }

    public function getProfile()
    {
        $data['profile'] = 1;
        $this->load->model('Main_model');
        $data['userdata'] = $this->Main_model->getUserByUsername($this->session->userdata('username'));

        //create name to username map
        $this->load->model('Main_model');
        $user1list = $this->Main_model->getNewUsersList();

        foreach ($user1list as $user1) {
            $namemap[$user1['username']] = $user1['name'];
        }
        $data['namemap'] = $namemap;

        $data['notifications'] = $this->Main_model->getNotifsForUser($this->session->userdata('username'));
        $this->load->view('Timeline', $data);
    }

    public function getPublicProfile()
    {
        $username = $this->input->get('username');
        $data['profile'] = 2;
        $this->load->model('Main_model');
        $data['userdata'] = $this->Main_model->getUserByUsername($username);
        //create name to username map
        $this->load->model('Main_model');
        $user1list = $this->Main_model->getNewUsersList();

        foreach ($user1list as $user1) {
            $namemap[$user1['username']] = $user1['name'];
        }
        $data['namemap'] = $namemap;

        $data['notifications'] = $this->Main_model->getNotifsForUser($this->session->userdata('username'));

        $this->load->view('Timeline', $data);
    }

    public function deleteUser()
    {
        $this->load->model('Main_model');
        $delete = $this->input->get('delete');

        $this->load->model('Main_model');
        $this->Main_model->deleteUser($delete);

        redirect('user/');
    }

    public function addFriend()
    {
        $this->load->model('Main_model');
        $username2 = $this->input->get('username2');
        $this->Main_model->addFriend($this->session->userdata('username'), $username2);
        redirect('user/showFriends');
    }

    public function removeFriend()
    {
        $this->load->model('Main_model');
        $username2 = $this->input->get('username2');
        $this->Main_model->removeFriend($this->session->userdata('username'), $username2);
        redirect('user/showFriends');
    }

    public function removeFollowers()
    {
        $this->load->model('Main_model');
        $username1 = $this->input->get('username1');
        $this->Main_model->removeFriend($username1, $this->session->userdata('username'));
        redirect('user/showFriends');
    }

    public function deletePost()
    {
        $this->load->model('Main_model');
        $delete = $this->input->get('delete');
        $this->Main_model->deletePost($delete);

        redirect('user/');
    }

    public function likePost()
    {
        $this->load->model('Main_model');
        $like = $this->input->get('like');

        $this->Main_model->likePost($this->session->userdata('username'), $like);

        redirect('user/');
    }

    public function unlikePost()
    {
        $this->load->model('Main_model');
        $unlike = $this->input->get('unlike');

        $this->Main_model->unlikePost($this->session->userdata('username'), $unlike);

        redirect('user/');
    }

    public function addUser()
    {
        $this->load->model('Test_Redis');
        //$this->Test_Redis->setRedisData("key1", "data1");
        $this->load->model('Main_model');
        $data['view'] = 3;
        $data['response'] = $this->Main_model->getUsersList();
        $this->load->view('Timeline', $data);
        if ($this->input->post('submit') != NULL) {
            $postData = $this->input->post();
            $this->load->model('Main_model');
            $this->Main_model->addUser($postData);
            redirect('user/');
        }
    }

    public function createPost()
    {
        $this->load->model('Main_model');
        $postData = $this->input->post();
        $this->Main_model->createPost($postData);
        redirect('user/');
    }

    public function showFriends()
    {
        $data['friends'] = 1;

        $this->load->model('Main_model');
        $user1list = $this->Main_model->getNewUsersList();
        $data['user1list'] = $user1list;

        //create name to username map
        $this->load->model('Main_model');
        $user1list = $this->Main_model->getNewUsersList();

        foreach ($user1list as $user1) {
            $namemap[$user1['username']] = $user1['name'];
        }
        $data['namemap'] = $namemap;

        $data['notifications'] = $this->Main_model->getNotifsForUser($this->session->userdata('username'));

        foreach ($user1list as $user1) {
            $namemap[$user1['username']] = $user1['name'];
        }
        $data['namemap'] = $namemap;

        $friends = $this->Main_model->getFriendssList($this->session->userdata('username'));
        $data['friends'] = $friends;

        $followers = $this->Main_model->getFollowersList($this->session->userdata('username'));
        $data['followers'] = $followers;

        $friend_reqs_rec = $this->Main_model->getFriendsReqReceList($this->session->userdata('username'));
        $data['friend_reqs_rec'] = $friend_reqs_rec;

        $friend_reqs_sent = $this->Main_model->getFriendsReqSentList($this->session->userdata('username'));
        $data['friend_reqs_sent'] = $friend_reqs_sent;

        $data['userdata'] = $this->Main_model->getUserByUsername($this->session->userdata('username'));
        $this->load->view('Timeline', $data);
    }
}