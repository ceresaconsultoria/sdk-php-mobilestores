<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Exceptions;

use Exception;

/**
 * Description of MSTokenException
 *
 * @author weslley
 */
class MSTokenException extends Exception{
    
    public function __construct($message, $code, $previous = null) { 
        parent::__construct($message, $code, $previous);
    }
}
