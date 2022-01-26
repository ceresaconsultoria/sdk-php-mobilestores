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
            $response = $this->http->delete("/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ]
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function getBrand($id){
        
        try{
            $response = $this->http->get("/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ]
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function listBrands(array $filters = []){
        
        try{
            $response = $this->http->get("/brands", array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function updateBrand($id, array $data){
        
        try{
            $response = $this->http->post("/brands/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function createBrand(array $data){
        
        try{
            $response = $this->http->post("/brands", array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    //Products
    
    public function createProduct(array $data){
        
        try{
            $response = $this->http->post("/products", array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ],
                "json" => $data
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function listProducts(array $filters = []){
        
        try{
            $response = $this->http->get("/products", array(
                "headers" => [
                    "Authorization" => $this->config["auth"]["type"] . " " . $this->config["auth"]["token"]
                ],
                "query" => $filters
            ));

            $body = (string)$response->getBody();
                        
            return json_decode($body);
            
        } catch (Exception $ex) {
            
            throw new MSException($ex);
        
        }
        
    }
    
}
