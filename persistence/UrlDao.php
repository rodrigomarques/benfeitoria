<?php
namespace persistence;

class UrlDao extends Dao {
    
    public function cadastrar(\model\Url $u){
        try{
            $url = $u->getUrl();
            $urldatacriacao = date('Y-m-d H:i:s');
            
            $this->open();
            
            $stmt = $this->con->prepare("insert into urls values(null, ?, 0,?)");
            
            $stmt->bindParam(1, $url);
            $stmt->bindParam(2, $urldatacriacao);
            
            if($stmt->execute()){
                $id = $this->con->lastInsertId();
                $this->close();
                return $id;
            }else{
                $this->close();
                return false;
            }
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function buscarUrl($url = ""){
        try{
            
            $this->open();
            
            $stmt = $this->con->prepare("select * from urls u where u.url = ?");
            
            $stmt->bindParam(1, $url);
            
            $stmt->execute();
            if($row = $stmt->fetchObject()){
                $this->close();
                return $row;
            }
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function listar(){
        try{
            
            $this->open();
            
            $stmt = $this->con->prepare("select * from urls u");
            $url = array();
            
            $stmt->execute();
            while($row = $stmt->fetchObject()){
                $url[] = $row;
            }
            $this->close();
            return $url;
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function encerrar($idurl = 0){
        try{
            
            $this->open();
            
            $stmt = $this->con->prepare("update urls set finalizada = 1 where idurls = ?");
            
            $stmt->bindParam(1, $idurl);
            
            if($stmt->execute()){
                $this->close();
                return true;
            }
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
    
