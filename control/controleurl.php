<?php

include_once '../init.php';

$acao = isset($_POST["acao"])?$_POST["acao"]:"";

if($acao == "cadastrar"){
    $msgitem = $_POST["msgitem"];
    $idurl = $_POST["idurl"]; 
    $url = $_POST["url"];
    
    $item = new \model\Listaitem();
    $item->setItem($msgitem);
    
    $url = new \model\Url();
    $url->setIdUrls($idurl);
    
    $item->setUrl($url);
    
    $itemDao = new \persistence\ListaItemDao();
    if($itemDao->cadastrar($item)){
        echo 1;
    }else{
        echo 0;
    }
}else if($acao == "concluirtask"){
    $idurl = $_POST["idurl"]; 
    $urlDao = new persistence\UrlDao();
    
    if($urlDao->encerrar($idurl)){
        echo 1;
    }else{
        echo 0;
    }
}else if($acao == "excluiritem"){
    $id = $_POST["id"];
    
    $itemDao = new \persistence\ListaItemDao();
    if($itemDao->excluir($id)){
        echo 1;
    }else{
        echo 0;
    }
}
