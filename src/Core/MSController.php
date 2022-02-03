<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Core;

use MobileStores\Entity\MSToken;

/**
 * Description of MSController
 *
 * @author weslley
 */
class MSController extends MSHttp{
    protected MSToken $token;
    
    const EVENT_TOKEN_EXPIRED = "tokenExpired";
    
    private $events;
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
        
        $this->resetEvents();
    }
    
    public function setToken(MSToken $token){
        $this->token = $token;
        return $this;
    }
    
    public function getToken() : MSToken{
        return $this->token;
    }
    
    public function on($eventName, $callback){
        if(!isset($this->events[$eventName]))
            $this->events[$eventName] = $callback;
    }
    
    public function resetEvents(){
        $this->events = [];
    }
    
    protected function triggerEvent($eventName, array $data = null){
        if(!isset($this->events[$eventName]))
            $this->events[$eventName]($data);
    }
}
