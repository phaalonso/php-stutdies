$(document).ready(() => {
    $("#prontuario").blur(function(){
        var str = $("#prontuario").val();
        alert(str);
        var op = 1;
        $.post('../controle/ControleAluno.php', {prontuario : str, tipo : op}, function(retorno){
            if(retorno != null){
                console.log(retorno);
                obj = JSON.parse(retorno);
                $("#nome").val(obj[0]["nome"]);
                $("#disciplina").val(obj[0]["disciplina"]);
                $("#idade").val(obj[0]["idade"]);
                $("#termo").val(obj[0]["termo"]);
            }else{
                alert("Resultado nulo");
            }
        });
    });
});