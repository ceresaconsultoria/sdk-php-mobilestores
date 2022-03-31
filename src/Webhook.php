<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores;

use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use MobileStores\Core\MSController;
use MobileStores\Core\MSEventDispatcher;
use MobileStores\Exceptions\MSException;
use MobileStores\Exceptions\MSTokenException;

/**
 * Description of Webhook
 *
 * @author weslley
 */
class Webhook extends MSController{
    
    public function listTriggers(){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/webhook/triggers", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function listWebhooks(array $filters = []){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/webhook", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function details($id){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/webhook/" . $id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function remove($id){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->delete("api/v1/webhook/" . $id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function update($id, array $data){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/webhook/" . $id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function create(array $data){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/webhook", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = @json_decode($body);
            
            if(!is_object($bodyDecoded))
                throw new Exception("Server not reponse JSON, response: " . $body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
}
