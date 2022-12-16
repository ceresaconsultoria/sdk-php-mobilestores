<?php

error_reporting(-1);
ini_set('display_errors', 1);
        
include __DIR__ . '/../vendor/autoload.php';

$catalog = new \MobileStores\Catalog([
    'base_uri' => 'http://localhost/mobilestores/mobilestores-thirdparty/'
]);

$token = new \MobileStores\Entity\MSToken();

$token->setAccess_token('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyMzY4IiwianRpIjoiN2ZhZGVjMTU1MzliMTlmMTEwOGJmOGE3Nzg1MDIwNTEyNzQ3ZGEwODdlNDQxMDllYTI0NGQxNjZkZTY4ZjNhNDRmZjNlZWU3NDNjMjVhMzgiLCJpYXQiOjE2NzExODcyMDYuMzE4NTQsIm5iZiI6MTY3MTE4NzIwNi4zMTg1NDMsImV4cCI6MTY3MTE5ODAwNi4zMDU4NjQsInN1YiI6IjQ4NiIsInNjb3BlcyI6W119.Fh7QkhcUxjVwFNDeXg2FjcbSK980MjDM5PiaTO8EEOJWBCe6kxr3Oom01A8JT5rNQCaPDbLH8jFE_1S_WT0h4Bl3JifAruw4BmOxpvAXwI1ZsVW-xM0A_alRr2drWhAsmxH6Q3FW7onpeDWdo5KOpj4fTOilPqfkwuU5p0caJbUOspNC5fFQXQt3ywNrh6zbFkJrIgNc3CCcf3OJnHQWsTHk8qsHO6A5A0v2fqn4sbLqZUnDk2dXLxxL1LfROpE70mSp9lnlhBE3t9OCJsdrKlDbaTJqUGi5D9LXJ6k7eyJ4q5bwULyiWivcpJUe08Bv13gIJJjEZ8zFzfNTpZjI2w')
        ->setExpires('2022-12-16 10:42:07')
        ->setExpires_in('10800')
        ->setRefresh_token('sdadasdasdasdasdasdasdasdasdasd')
        ->setStore_id('162')
        ->setToken_type('Bearer');

$catalog->setToken($token);

try{
    
    $brands = $catalog->listBrands();
    
    var_dump($brands);
    
} catch (MobileStores\Exceptions\MSTokenException $ex) {

    var_dump(["[Token]", $ex->getMessage()]);
    
} catch (Exception $ex) {

    var_dump(["[Normal]", $ex->getMessage()]);
    
}