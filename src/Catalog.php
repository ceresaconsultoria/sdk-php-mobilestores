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
 * Description of Catalog
 *
 * @author weslley
 */
class Catalog extends MSController{
    
    //Categories
    
    public function treeCategories(){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/categories/tree", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function listCategories(array $filters = []){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/categories", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function updateCategory($id, array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/categories/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function createCategory(array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/categories", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    //Brands
    
    public function removeBrand($id){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->delete("api/v1/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function getBrand($id){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function listBrands(array $filters = []){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/brands", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function updateBrand($id, array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function createBrand(array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/brands", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    //Products
    
    public function updateProduct($id, array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/products/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());

            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function createProduct(array $data){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/products", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());

            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function listProducts(array $filters = []){
        if($this->getToken()->expired()){
            $this->triggerEvent(self::EVENT_TOKEN_EXPIRED);
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/products", array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
}
