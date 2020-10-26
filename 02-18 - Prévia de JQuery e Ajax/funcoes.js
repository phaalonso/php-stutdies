$(document).ready(function () {
    $("h2").css("color","red");

    // Pode ser assim
    $("#bt1").click(function () {
        texto = "<img src='image.jpeg'>";
        $("#div2").append(texto);
    });

    $("#bt2").click(function() {remove()});
});


function remove(){
    $("img").remove();
};

