<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MobileStores\Core;

/**
 * Description of MSController
 *
 * @author weslley
 */
class MSController extends MSHttp{
    
    public function __construct(array $config = []) {        
        parent::__construct($config);
    }
    
}
