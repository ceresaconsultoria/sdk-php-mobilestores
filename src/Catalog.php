<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores;

use Exception;
use MobileStores\Core\MSController;
use MobileStores\Exceptions\MSException;

/**
 * Description of Catalog
 *
 * @author weslley
 */
class Catalog extends MSController{
    
    //Brands
    
    public function removeBrand($id){
        
        try{
            $response = $this->http->delete("brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function getBrand($id){
        
        try{
            $response = $this->http->get("brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ]
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function listBrands(array $filters = []){
        
        try{
            $response = $this->http->get("brands", array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function updateBrand($id, array $data){
        
        try{
            $response = $this->http->post("brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function createBrand(array $data){
        
        try{
            $response = $this->http->post("brands", array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    //Products
    
    public function createProduct(array $data){
        
        try{
            $response = $this->http->post("products", array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function listProducts(array $filters = []){
        
        try{
            $response = $this->http->get("products", array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw new MSException(new Exception($bodyDecoded->errorMsg, $bodyDecoded->code));
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
}
