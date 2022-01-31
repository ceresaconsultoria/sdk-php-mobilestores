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

/**
 * Description of Order
 *
 * @author weslley
 */
class Order extends MSController{
    public function updateOrder($id, array $data){
        
        try{
            $response = $this->http->post("orders/".$id, array(
                "headers" => [
                    "Authorization" => $this->config["msAuth"]["type"] . " " . $this->config["msAuth"]["token"]
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
}
