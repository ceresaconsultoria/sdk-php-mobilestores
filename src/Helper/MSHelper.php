<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Helper;

/**
 * Description of MSHelper
 *
 * @author weslley
 */
class MSHelper {
    public static function dump($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    
    public static function guid(){
        if (function_exists('com_create_guid') === true)
            return trim(com_create_guid(), '{}');

        return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
    }
}
