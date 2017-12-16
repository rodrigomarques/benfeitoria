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
