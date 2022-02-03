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
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
        
        MSEventDispatcher::autoListenners();
    }
    
    public function setToken(MSToken $token){
        $this->token = $token;
        return $this;
    }
    
    public function getToken() : MSToken{
        return $this->token;
    }
}
