<script>
    $(function(){
        $("#btncadastrar").on('click', function(){
            var msgitem = $("#msgitem").val();
            var idurl = $("#idurl").val();
            var url = $("#url").val();
            var iditem = $("#iditem").val();
            var acao = "cadastrar";
            
            if(iditem != ""){
                acao = "editar";
            }
            
            $.post('<?php echo $urlbase; ?>control/controleurl.php',{
                msgitem : msgitem,
                idurl : idurl, 
                url : url,
                iditem : iditem,
                acao : acao
            }, function(result){
                if(result == 1){
                    location.reload();
                }
            });
            return false;
        });
        
        $(".concluirtask").on('click', function(){
            var idurl = $("#idurl").val();
            
            $.post('<?php echo $urlbase; ?>control/controleurl.php',{
                idurl : idurl, 
                acao : 'concluirtask'
            }, function(result){
                if(result == 1){
                    location.reload();
                }
            });
            return false;
        });
        
        $(".deletaritem").on('click', function(){
            if(confirm("Confirma a exclusão deste item?")){
                var iditem = $(this).attr('data-value');

                $.post('<?php echo $urlbase; ?>control/controleurl.php',{
                    id : iditem, 
                    acao : 'excluiritem'
                }, function(result){
                    if(result == 1){
                        location.reload();
                    }
                });
            }
            return false;
        
        });
        
        $(".editaritem").on('click', function(){
            var texto = $(this).parent().text();
            var iditem = $(this).attr("data-value");
            $("#msgitem").val(texto);
            $("#btncadastrar").val("EDITAR");
            $("#iditem").val(iditem);
        })
    })
</script>
<?php 
    include_once 'init.php'; 
    $urlDao = new persistence\UrlDao();
    $listaItemDao = new persistence\ListaItemDao();
    
    $urlDB = $urlDao->buscarUrl($url);
    
    if($urlDB == null){
        $u = new \model\Url();
        $u->setUrl($url);
        $idurl = $urlDao->cadastrar($u);
    }else{
        $idurl = $urlDB->idurls;
    }
    $itens = $listaItemDao->listarPorUrl($url, $order);
?>
<h3 class="page-header">URL DE ACESSO: <?php echo $url; ?></h3>
<?php if($urlDB != null && $urlDB->finalizada == 1): ?>
<div class="alert alert-info">
    <p>TASK CONCLUÍDA</p>
</div>
<?php endif; ?>
<?php
    if(count($itens) > 0): 
        echo "<a href='?asc' class='btn btn-default'>Ordenar Ascendente</a>";
        echo "<a href='?desc' class='btn btn-default'>Ordenar Descendente</a>";
        echo "<hr>";
        echo '<div class="list-group">';
        foreach ($itens as $it):
            echo '<div class="list-group-item">';
                echo '<p>'.nl2br($it->item)."</p>" ;
                if($urlDB != null && $urlDB->finalizada == 0):
                    echo '<a href="#" class="btn btn-danger deletaritem" data-value="'.$it->idlistaitens.'"><span class="glyphicon glyphicon-remove"></span></a>';
                    echo '<a href="#" class="btn btn-warning editaritem" data-value="'.$it->idlistaitens.'"><span class="glyphicon glyphicon-edit"></span></a>';
                endif;
            echo '</div>';
        endforeach;
        echo '</div>';
    endif;
?>

<?php if($urlDB == null || $urlDB->finalizada == 0): ?>
    <form method="post" action="ok.php" >
        <div class="form-group">
            <textarea name="msgitem" class="form-control" id="msgitem" rows="10"></textarea>
        </div>
        <input type="hidden" name="idurl" id="idurl" value="<?php echo $idurl; ?>">
        <input type="hidden" name="url" id="url" value="<?php echo $url; ?>">
        <input type="hidden" name="iditem" id="iditem" value="">
        <input type="submit" value="ADD" class="btn btn-primary" id="btncadastrar">
        <a href="#" class="btn btn-success concluirtask">Concluir TASK</a>
</form>
<?php endif; ?>