<?php
namespace persistence;

class ListaItemDao extends Dao {
    
    public function cadastrar(\model\Listaitem $l){
        try{
            $idurl = $l->getUrl()->getIdUrls();
            $item = $l->getItem();
            
            $this->open();
            
            $stmt = $this->con->prepare("insert into listaitens values(null, ?,?)");
            
            $stmt->bindParam(1, $item);
            $stmt->bindParam(2, $idurl);
            
            //gravar
            if($stmt->execute()){
                $this->close();
                return true;
            }else{
                $this->close();
                return false;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function listarPorUrl($url = ""){
        try{
            
            $this->open();
            
            $stmt = $this->con->prepare("select * from listaitens li inner join urls u on u.idurls = li.urls_idurls where u.url = ?");
            
            $stmt->bindParam(1, $url);
            $lista = array();
            
            $stmt->execute();
            while($row = $stmt->fetchObject()){
                $lista[] = $row;
            }
            $this->close();
            return $lista;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function excluir($id = 0){
        try{
            $this->open();
            
            $stmt = $this->con->prepare("delete from listaitens where idlistaitens = ?");
            
            $stmt->bindParam(1, $id);
            
            if($stmt->execute()){
                $this->close();
                return true;
            }else{
                $this->close();
                return false;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}

