<?php
namespace persistence;

class Dao {
    /**
     * @var \PDO
     */
    protected $con;
    
    public function open(){
        $this->con = new \PDO("mysql:host=localhost;dbname=benfeitoria",
                "root", "coti", array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ));
    }
    
    public function close(){
        $this->con = null;
    }
}
