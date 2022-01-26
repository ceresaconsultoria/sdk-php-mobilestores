<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Exceptions;

use Exception;

/**
 * Description of MSException
 *
 * @author weslley
 */
class MSException extends Exception{
    
    public function __construct(Exception $ex) {
        $message = $ex->getMessage() . PHP_EOL . $ex->getTraceAsString();        
        parent::__construct($message, $ex->getCode(), $ex->getPrevious());
    }
    
    public static function fromObjectMessage($message, $code, $previous = null){
        
        if(is_object($message)){
            
            $newMessageString = [];
            
            foreach($message as $key => $typeError){
                
                foreach($typeError as $type => $errorMsg){
                    
                    $newMessageString[] =  $errorMsg;
                    
                }
                
            }
            
            return new MSException( new Exception(implode("\n", $newMessageString), $code, $previous) );     
        }
        
        if(is_string($message)){
            
            return new MSException( new Exception($message, $code, $previous) );     
            
        }
        
    }
    
}
