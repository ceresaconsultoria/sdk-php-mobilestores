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
    
    //Addional Informations Options
    
    public function updateAdditionalInformationOption($additionalInformationId, $additionalInformationOptionId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf('api/v1/addtional-information/%s/option/%s', $additionalInformationId, $additionalInformationOptionId), array(
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
    
    public function createAdditionalInformationOption($additionalInformationId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf('api/v1/addtional-information/%s/option', $additionalInformationId), array(
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
    
    public function listAdditionalInformationOptions($additionalInformationId, array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get(sprintf('api/v1/addtional-information/%s/option', $additionalInformationId), array(
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
    
    //Addional Informations
    
    public function updateAdditionalInformation($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/addtional-information/%s", $id), array(
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
    
    public function createAdditionalInformation(array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post('api/v1/addtional-information', array(
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
    
    public function listAdditionalInformations(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get('api/v1/addtional-information', array(
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
    
    //Variants
    
    public function updateVariantStock($productId, $variantId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/product/%s/variant/%s/stock", $productId, $variantId), array(
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
    
    public function updateVariantPrice($productId, $variantId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/product/%s/variant/%s/price", $productId, $variantId), array(
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
    
    public function listVariants($productId, array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get(sprintf("api/v1/product/%s/variant", $productId), array(
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
    
    public function createVariant($productId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/product/%s/variant", $productId), array(
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
    
    public function updateVariant($productId, $variantId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/product/%s/variant/%s", $productId, $variantId), array(
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
    
    public function deleteVariant($productId, $variantId){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->delete(sprintf("api/v1/product/%s/variant/%s", $productId, $variantId), array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
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
    
    //Properties
    
    public function listProperties(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/property", array(
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
    
    public function createProperty(array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/property", array(
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
    
    public function listPropertyValues($propertyId, array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get(sprintf("api/v1/property/%s/value", $propertyId), array(
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
    
    public function createPropertyValue($propertyId, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post(sprintf("api/v1/property/%s/value", $propertyId), array(
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
    
    //Categories
    
    public function treeCategories(){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/category/tree", array(
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
    
    public function listCategories(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/category", array(
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
    
    public function updateCategory($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/category/".$id, array(
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
    
    public function createCategory(array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/category", array(
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
    
    //Brands
    
    public function removeBrand($id){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->delete("api/v1/brand/".$id, array(
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
    
    public function getBrand($id){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/brand/".$id, array(
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
    
    public function listBrands(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/brand", array(
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
    
    public function updateBrand($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/brand/".$id, array(
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
    
    public function createBrand(array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/brand", array(
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
    
    //Products
    
    public function updateProductPrice($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/product/".$id."/price", array(
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
    
    public function updateProductStock($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/product/".$id."/stock", array(
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
    
    public function deleteProduct($id){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->delete("api/v1/product/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
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
    
    public function updateProduct($id, array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/product/".$id, array(
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
    
    public function createProduct(array $data){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->post("api/v1/product", array(
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
    
    public function countProducts(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/product/count", array(
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
    
    public function listProducts(array $filters = []){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/product", array(
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
    
    public function getProduct($id){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/product/".$id, array(
                "headers" => [
                    "Authorization" => $this->getToken()->getToken_type() . " " . $this->getToken()->getAccess_token()
                ],
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
