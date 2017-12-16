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
    
    public function listarPorUrl($url = "", $order = "asc"){
        try{
            
            $this->open();
            
            $stmt = $this->con->prepare("select * from listaitens li inner join urls u on u.idurls = li.urls_idurls where u.url like ? order by li.item " . $order);
            $url = $url . "%";
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
    
    public function editar(\model\Listaitem $l){
        try{
            $id = $l->getIdListaItens();
            $item = $l->getItem();
            
            $this->open();
            
            $stmt = $this->con->prepare("update listaitens set item = ? where idlistaitens = ?");
            
            $stmt->bindParam(1, $item);
            $stmt->bindParam(2, $id);
            
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

