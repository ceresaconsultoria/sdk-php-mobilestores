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
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use MobileStores\Core\MSController;
use MobileStores\Entity\MSToken;
use MobileStores\Exceptions\MSException;
use MobileStores\Exceptions\MSTokenException;

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
                        
            $responseApi = json_decode($body);
            
            if(empty($responseApi) || !is_object($responseApi))
                throw new MSTokenException("Resposta desconhecida do servidor", 1);
            
            if($responseApi->code != 200)
                throw new MSTokenException($responseApi->errorMsg, 1);
            
            $token = $responseApi->data;
            
            $msToken = new MSToken();
            
            $expires = time() + $token->expires_in;
            
            $msToken
                ->setExpires(date("Y-m-d H:i:s", $expires))
                ->setAccess_token($token->access_token)
                ->setExpires_in($token->expires_in)
                ->setRefresh_token($token->refresh_token)
                ->setToken_type($token->token_type);
            
            return $msToken;
            
        } catch (ServerException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (ClientException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (BadResponseException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (RequestException $ex) {
            
            $this->exceptionProcess($ex);
            
        } catch (Exception $ex) {
                 
            $this->checkTokenExpired($ex->getMessage());
            
            throw new MSException($ex);
        
        }
        
    }
    
    public function getUrlToRequest(array $data){
        
        return $this->http->getConfig("base_uri") . "authorize?" . http_build_query($data);
        
    }
}
