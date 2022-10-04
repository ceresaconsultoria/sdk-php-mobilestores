<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores;

/**
 * Description of Store
 *
 * @author weslley
 */
class Store extends Core\MSController{
    
    public function details(){
        if($this->getToken()->expired()){
            $eventTokenExpired = new Events\TokenExpired(null);
            
            Core\MSEventDispatcher::getDispatcher()->dispatch($eventTokenExpired, Events\TokenExpired::NAME);
            
            throw new MSTokenException("Token expirado", 1);
        }
        
        try{
            $response = $this->http->get("api/v1/store", array(
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
