<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores;

/**
 * Description of Autorization
 *
 * @author weslley
 */
class Autorization extends Core\MSController{
    
    public function token(array $data){
        
        try{
            $response = $this->http->post("authorize/token", array(
                "form_params" => $data
            ));

            $body = (string)$response->getBody();
                        
            $bodyDecoded = json_decode($body);
                        
            return $bodyDecoded->data;
            
        } catch (\GuzzleHttp\Exception\ServerException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
            
        } catch (\GuzzleHttp\Exception\ClientException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (\GuzzleHttp\Exception\BadResponseException $ex) {
            
            $body = (string)$ex->getResponse()->getBody();
            
            $bodyDecoded = json_decode($body);
            
            if(isset($bodyDecoded->errorMsg)){
                
                throw MSException::fromObjectMessage($bodyDecoded->errorMsg, $bodyDecoded->code, $ex->getPrevious());
                
            }
            
        } catch (Exception $ex) {
                 
            throw new MSException($ex);
        
        }
        
    }
    
    public function getUrlToRequest(array $data){
        
        return $this->http->getConfig("base_uri") . "authorize?" . http_build_query($data);
        
    }
}
