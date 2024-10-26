<?php

namespace MobileStores;

use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use MobileStores\Core\MSController;
use MobileStores\Exceptions\MSException;

class Customer extends MSController{
    
    public function details($id){
        $this->validToken();
        
        try{
            $response = $this->http->get(sprintf("api/v1/customer/%s", $id), array(
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
    
}
