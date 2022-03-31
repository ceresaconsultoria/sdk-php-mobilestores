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
        
        MSEventDispatcher::getDispatcher();
    }
    
    public function setToken(MSToken $token){
        $this->token = $token;
        return $this;
    }
    
    public function getToken() : MSToken{
        return $this->token;
    }
    
    protected function exceptionProcess($ex){
        $body = (string)$ex->getResponse()->getBody();
        
        $this->checkTokenExpired($body);
            
        $bodyDecoded = json_decode($body);

        if(isset($bodyDecoded->errorMsg)){

            throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());

        }
    }
    
    protected function checkTokenExpired($message){
        $problemaToken = false;
        
        if(preg_match("/Token inválido/i", $message)){
            $problemaToken = true;
        }
        
        if(preg_match("/Token expirado/i", $message)){
            $problemaToken = true;
        }

        if(preg_match("/Connection refused/i", $message)){
            $problemaToken = true;
        }

        if(preg_match("/Access token could not be verified/i", $message)){
            $problemaToken = true;
        }
        
        if($problemaToken){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);

            throw new MSTokenException("Token expirado", 1);
        }        
    }
}
