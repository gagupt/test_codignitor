<?php

class php{

    /**
     * Redis Cache Keys
     */

    CONST REDIS_PRODUCT_LIST_KEY = "products";
    CONST REDIS_ALL_USERS_KEY = "allUsers";
    CONST REDIS_USER_DETAIL_USER_ID_KEY = "user::";
    CONST REDIS_ORDER_INFO_KEY = "orderInfo::";
    CONST REDIS_USER_DETAIL_USER_MOBILE_KEY = "user::";
    CONST REDIS_PRODUCT_KEY = "product::";

    public static function getRedisData($key){
        $redis = new \CI_Predis\Redis();
        $data = $redis->get($key);
        if(isset($data) && !empty($data)){
            return json_decode($data, true);
        }
        return array();
    }

    public static function setRedisData($key, $data){
        $redis = new \CI_Predis\Redis();
        $value = json_encode($data);
        $redis->set($key, $value);
    }

    public static function deleteRedisKey($key){
        $redis = new \CI_Predis\Redis();
        $redis->del($key);
    }

    public static function getUserByUserIdRedisKey($userId){
        if(isset($userId) && !empty($userId)){
            return php::REDIS_USER_DETAIL_USER_ID_KEY.$userId;
        }
        return "";
    }

    public static function getUserByMobileNoRedisKey($MobileNo){
        if(isset($MobileNo) && !empty($MobileNo)){
            return php::REDIS_USER_DETAIL_USER_MOBILE_KEY.$MobileNo;
        }
        return "";
    }

    public static function getOrderInfoRedisKey($orderId){
        if(isset($orderId) && !empty($orderId)){
            return php::REDIS_ORDER_INFO_KEY.$orderId;
        }
        return "";
    }

    public static function getProductRedisKey($productId){
        if(isset($productId) && !empty($productId)){
            return php::REDIS_PRODUCT_KEY.$productId;
        }
        return "";
    }
}