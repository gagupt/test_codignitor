<?php

class PostModel extends CI_Model {

    public function getData()
    {
        $db = $this->load->database();
        $query = $db->get('store_mapping');  // users is table anme
        var_dump($query);

    }
}
