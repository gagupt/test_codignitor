<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model
{

    // Get all user list
    function getUsersList()
    {
        $this->db->select('*');
        $this->db->order_by('name', 'asc');
        $this->db->limit(10, 0);
        $q = $this->db->get('users');
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getUserById($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $q = $this->db->get('users');
        $result = $q->result_array();
        return $result;
    }

    // Update record by id
    function updateUser($postData, $id)
    {

        $name = trim($postData['txt_name']);
        $uname = trim($postData['txt_uname']);
        $email = trim($postData['txt_email']);
        if ($name != '' && $email != '') {

            // Update
            $value = array('name' => $name, 'email' => $email, 'username' => $uname);
            $this->db->where('id', $id);
            $this->db->update('users', $value);
        }
    }

    function addUser($postData)
    {

        $name = trim($postData['txt_name1']);
        $uname = trim($postData['txt_uname1']);
        $email = trim($postData['txt_email1']);
        if ($name != '' && $email != '') {

            // Add
            $value = array('name' => $name, 'email' => $email, 'username' => $uname);
            $this->db->insert('users', $value);
        }
    }

    function deleteUser($id)
    {
        $value = array('id' => $id);
        $this->db->delete('users', $value);
    }

    function can_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users_login');
        //SELECT * FROM users WHERE username = '$username' AND password = '$password'
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}