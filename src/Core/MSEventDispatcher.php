<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Core;

use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Description of MSEventDispatcher
 *
 * @author weslley
 */
class MSEventDispatcher {
    
    private static $dispatcher;
    
    public static function getDispatcher() : EventDispatcher{
        if(empty(self::$dispatcher)){
            self::$dispatcher = new EventDispatcher();
        }
        
        return self::$dispatcher;
    }
    
    public static function autoListenners(){
        $dispatcher = self::getDispatcher();
        
        $fileListenners = scandir(__DIR__ . "/../Events/Listenners");
        $fileListenners = array_diff($fileListenners, array('.', '..'));

        foreach($fileListenners as $listenerTrigger){
            $listenerTriggerClassName = str_replace(".php", "", $listenerTrigger);                    

            $listenerTriggerClass = "\\MobileStores\\Events\Listenners\\". $listenerTriggerClassName;
            
            $dispatcher->addListener($listenerTriggerClass::EVENT, [new $listenerTriggerClass(), "execute"]);
        }
    }
}
