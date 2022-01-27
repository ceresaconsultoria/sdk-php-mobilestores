<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Core;

use GuzzleHttp\Client;

/**
 * Description of MSHttp
 *
 * @author weslley
 */
class MSHttp {
    protected Client $http;
    protected $config;

    private $baseUrl = "https://thirdparty.mobilestores.app/api/v1/";
           
    public function __construct(array $config = []) {        
        $defaultConfig = array(
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
            'headers' => array(
                'content-type' => 'application/json'
            )
        );
        
        $this->config = array_merge($defaultConfig, $config);
                
        $this->http = new Client($this->config);
    }
}
