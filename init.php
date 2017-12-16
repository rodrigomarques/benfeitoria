<?php
set_include_path(
    get_include_path() . PATH_SEPARATOR . 
    __DIR__ 
);

function __autoload($classe){
    $nomeclasse = str_replace("\\", DIRECTORY_SEPARATOR, $classe);
    include_once $nomeclasse . ".php";
}
