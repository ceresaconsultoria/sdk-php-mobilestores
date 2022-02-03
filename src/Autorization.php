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
use MobileStores\Entity\MSToken;
use MobileStores\Exceptions\MSException;

/**
 * Description of Autorization
 *
 * @author weslley
 */
class Autorization extends MSController{
    
    public function token(array $data) : MSToken{
        
        try{
            $response = $this->http->post("authorize/token", array(
                "form_params" => $data
            ));

            $body = (string)$response->getBody();
                        
            $token = json_decode($body);
            
            $msToken = new MSToken();
            
            $expire = time() + $token->expire_in;
            
            $msToken
                ->setExpire(date("Y-m-d H:i:s", $expire))
                ->setAccess_token($token->access_token)
                ->setExpire_in($token->expire_in)
                ->setRefresh_token($token->refresh_token)
                ->setToken_type($token->token_type);
            
            return $msToken;
            
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
    
    public function getUrlToRequest(array $data){
        
        return $this->http->getConfig("base_uri") . "authorize?" . http_build_query($data);
        
    }
}
