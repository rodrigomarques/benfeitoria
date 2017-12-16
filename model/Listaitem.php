<?php

namespace model;

class Listaitem {
    
    private $idListaItens;
    private $item;
    /**
     * @var Url
     */
    private $url;
    
    
    function getIdListaItens() {
        return $this->idListaItens;
    }

    function getItem() {
        return $this->item;
    }

    function getUrl() {
        return $this->url;
    }

    function setIdListaItens($idListaItens) {
        $this->idListaItens = $idListaItens;
    }

    function setItem($item) {
        $this->item = $item;
    }

    function setUrl(Url $url) {
        $this->url = $url;
    }


}
