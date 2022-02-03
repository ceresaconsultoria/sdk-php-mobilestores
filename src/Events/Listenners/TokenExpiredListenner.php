<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Events\Listenners;

use MobileStores\Events\TokenExpired;

/**
 * Description of TokenExpiredListenner
 *
 * @author weslley
 */
class TokenExpiredListenner{
    const EVENT = "tokenExpired";
    
    public function execute(TokenExpired $e){
        
    }
}
