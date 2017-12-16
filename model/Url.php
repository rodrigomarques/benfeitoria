<?php
namespace model;
class Url {
    private $idUrls;
    private $url;
    private $datacriacao;
    
    function getIdUrls() {
        return $this->idUrls;
    }

    function getUrl() {
        return $this->url;
    }

    function getDatacriacao() {
        return $this->datacriacao;
    }

    function setIdUrls($idUrls) {
        $this->idUrls = $idUrls;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setDatacriacao($datacriacao) {
        $this->datacriacao = $datacriacao;
    }


}
