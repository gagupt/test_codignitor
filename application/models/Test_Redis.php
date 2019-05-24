<?php


class Test_Redis
{

    function __construct() {
        require_once APPPATH . 'libraries/codeigniter-predis/src/Redis.php';
    }
//    function updateRedis()
//    {
//        $redis = $this->load->library('redis');
//
//        $redis->connect('127.0.0.1', 6379);
//        echo "Connection to server sucessfully";
//        exit;
//    }

    public function setRedisData($key, $data){

        $this->redis = new \CI_Predis\Redis();
        echo $this->redis->ping();

        $this->redis->set($key,$data);

        echo $this->redis->get($key);

//        $redis = new \CI_Predis\Redis();
//        $value = json_encode($data);
//        $redis->set($key, $value);
    }
}
