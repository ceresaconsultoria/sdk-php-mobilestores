<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Description of TokenExpired
 *
 * @author weslley
 */
class TokenExpired extends Event{    
    const NAME = "tokenExpired";
    
    private $data;
    
    public function __construct($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }
}
