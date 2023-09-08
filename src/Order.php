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
use MobileStores\Exceptions\MSException;
use MobileStores\Exceptions\MSTokenException;

/**
 * Description of Order
 *
 * @author weslley
 */
class Order extends MSController{
        
    public function listOrders(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/order", array(
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
    
    public function listOrderStatus(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/order-status", array(
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
    
    public function orderStatusDetails($id){
        if($this->getToken()->expired()){ 
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get(sprintf("api/v1/order-status/%s", $id), array(
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
    
    public function orderDetails($id){
        if($this->getToken()->expired()){ 
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get(sprintf("api/v1/order/%s", $id), array(
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
    
    public function createPayment($orderId, array $data){ 
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/order/%s/payment", $orderId), array(
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
    
    public function updatePayment($orderId, $paymentOrderId, array $data){
        if($this->getToken()->expired()){  
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/order/%s/payment/%s", $orderId, $paymentOrderId), array(
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
    
    public function cancelOrder($id, array $data){
        if($this->getToken()->expired()){ 
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/order/%s/cancel", $id), array(
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
    
    public function updateOrder($id, array $data){
        if($this->getToken()->expired()){ 
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/order/".$id, array(
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
