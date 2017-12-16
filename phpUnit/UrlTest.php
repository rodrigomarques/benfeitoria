<?php
namespace phpUnit;

class UrlTest extends \PHPUnit_Framework_TestCase
{
    public function testCadastrarUrl()
    {
        require_once __DIR__ . "/../model/Url.php";
        require_once __DIR__ . "/../persistence/Dao.php";
        require_once __DIR__ . "/../persistence/UrlDao.php";
        
        $urlDao = new \persistence\UrlDao();
        $url = new \model\Url();
        
        $url->setUrl("phpunit/teste");
        
        $result = $urlDao->cadastrar($url);
        $this->assertGreaterThanOrEqual(1, $result);
    }
    
    public function testListarUrl()
    {
        require_once __DIR__ . "/../model/Url.php";
        require_once __DIR__ . "/../persistence/Dao.php";
        require_once __DIR__ . "/../persistence/UrlDao.php";
        
        $urlDao = new \persistence\UrlDao();
        $lista = $urlDao->listar();
        
        $result = $lista == false?false:true;
        $this->assertTrue($result);
    }
}
