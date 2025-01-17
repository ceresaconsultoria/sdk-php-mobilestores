<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Core;

use MobileStores\Entity\MSToken;
use MobileStores\Events\TokenExpired;
use MobileStores\Exceptions\MSException;
use MobileStores\Exceptions\MSTokenException;

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
        
        throw MSException::fromObjectMessage($body, 400, $ex->getPrevious());
    }
    
    protected function checkTokenExpired($message){
        $problemaToken = false;
                
        if(preg_match("/Token inválido|inv\x{00e1}lido|inexistente/i", $message)){
            $problemaToken = true;
        }
        
        if(preg_match("/Token expirado/i", $message)){
            $problemaToken = true;
        }

        if(preg_match("/Access token could not be verified/i", $message)){
            $problemaToken = true;
        }
        
        if($problemaToken){
            $eventTokenExpired = new TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, TokenExpired::NAME);

            throw new MSTokenException("Token expirado", 1);
        }        
    }
    
    protected function validToken(){
        if(!$this->getToken()){
            throw new MSTokenException("Token não informado", 1);
        }
        
        if($this->getToken()->expired()){ 
            $eventTokenExpired = new TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
    }
}
