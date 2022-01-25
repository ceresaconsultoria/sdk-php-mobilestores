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
    
    public function listProducts(array $data){
        
        try{
            $response = $this->http->get("/products", array(
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
    
}
