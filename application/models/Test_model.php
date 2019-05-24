<?php


class Test_model extends CI_Model
{

    function getData()
    {
        $sql = "Select * from SampleTable";
        $query = $this->db->query($sql);
        $resp = $query->result_array();
        print_r($resp);

    }
}
