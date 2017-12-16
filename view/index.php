<script>
$(function(){
    $("#btn").on('click', function(){
        var url = $("#url").val();
        $("#form1").attr('action', url);
        $("#form1").submit();
    })
})    
</script>
<h3 class="page-header">Benfeitoria - Tasks</h3>

<form class="form-inline" id="form1" method="post">
    <div class="form-group">
        www.benfeitoria.com/
        <input type="text" name="url" id="url" class="form-control">
    </div>
    <button id="btn" class="btn">
        Acessar!
    </button>
</form>

<?php 
    include_once 'init.php'; 
    $urlDao = new persistence\UrlDao();
    
    $listaUrl = $urlDao->listar();
    if(count($listaUrl) > 0):
        echo "<ul>";
        foreach($listaUrl as $u):
            $concluido = ($u->finalizada == 1)?" #### Task Concluída":"";
        
            echo "<li><a href='".$u->url."'>" . $u->url . "</a> " . $concluido . "</li>";
        endforeach;
        echo "</ul>";
    endif;
?>
