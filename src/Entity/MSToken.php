<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Entity;

/**
 * Description of Token
 *
 * @author weslley
 */
class MSToken {
    private $store_id;
    private $access_token;
    private $expire_in;
    private $expire;
    private $refresh_token;
    private $token_type;
    
    const VALID = 1;
    const VALID_REFRESH_TOKEN = 2;
    
    public function expired(){
        $now = strtotime(date("Y-m-d H:i:s"));
                
        if($now > strtotime($this->getExpire()))
            return self::VALID_REFRESH_TOKEN;
        
        return self::VALID;
    }
    
    public function getStore_id() {
        return $this->store_id;
    }

    public function getAccess_token() {
        return $this->access_token;
    }

    public function getExpire_in() {
        return $this->expire_in;
    }

    public function getExpire() {
        return $this->expire;
    }

    public function getRefresh_token() {
        return $this->refresh_token;
    }

    public function getToken_type() {
        return $this->token_type;
    }

    public function setStore_id($store_id) {
        $this->store_id = $store_id;
        return $this;
    }

    public function setAccess_token($access_token) {
        $this->access_token = $access_token;
        return $this;
    }

    public function setExpire_in($expire_in) {
        $this->expire_in = $expire_in;        
        return $this;
    }
    
    public function setExpire($expire) {
        $this->expire = $expire;        
        return $this;
    }

    public function setRefresh_token($refresh_token) {
        $this->refresh_token = $refresh_token;
        return $this;
    }

    public function setToken_type($token_type) {
        $this->token_type = $token_type;
        return $this;
    }
    
    public function toArray(){
        return get_object_vars($this);
    }
}
