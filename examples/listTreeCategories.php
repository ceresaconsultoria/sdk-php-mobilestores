<?php

$authorization = AuthorizationEloquent::where("store_id", 162)
        ->get()
        ->first();

$token = new \MobileStores\Entity\MSToken();

$token->setAccess_token($authorization->access_token)
        ->setExpires($authorization->expires)
        ->setExpires_in($authorization->expires_in)
        ->setRefresh_token($authorization->refresh_token)
        ->setStore_id($authorization->store_id)
        ->setToken_type($authorization->token_type);

$msApiCatalog = new \MobileStores\Catalog();

$msApiCatalog->setToken($token);

\MobileStores\Core\MSEventDispatcher::getDispatcher()
        ->addListener(\MobileStores\Events\TokenExpired::NAME, function(\MobileStores\Events\TokenExpired $event){

            dump("token expirado evento");

        });

$data = $msApiCatalog->treeCategories();

var_dump(count($data));