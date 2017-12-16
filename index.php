<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>Benfeitoria - Sistema de tasks</title>
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-2.2.4.js"
                integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-inverse" style="min-height: 100px">
            <div class="container">
                <div class="col-xs-12">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <img src="https://benfeitoria.com/v1/img/benfeitoria_crowdfunding.png" class="img-responsive" alt="Benfeitoria: Crowdfunding + Financiamento Coletivo">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="col-xs-12">
                
        <?php
            
            //URL da minha aplicação
            $urlbase = "/benfeitoria/";

            $url = isset($_GET["url"])?$_GET["url"]:"";
            if($url == ""){
                $view = "view/index.php";
            }else{
                $view = "view/forms.php";
            }
            //echo $view;
            
            if(file_exists($view)){
                include_once $view;
            }else{
                echo "<h2>PAGINA NÃO PODE SER ENCONTRADA!</h2>";
            }

        
        ?>
                
            </div>
        </div>
    </body>
</html>
