<?php

function mostreTabuadaFor($valor){
    echo "<table style='border: 1px solid black'>";
    for($i=1; $i<11; $i++){
        echo "<tr style='border: 1px solid black'><th style='border: 1px solid black'>$valor x $i</th>";
        echo "<th style='border: 1px solid black'><span style='color: red'>".($i * $valor)."</span></th></tr>";
    }
    echo "</table>";
}

function mostreTabuadaWhile($valor){
    echo "<table style='border: 1px solid black'>";
    $i = 1;
    while($i < 11){
        echo "<tr style='border: 1px solid black'><th style='border: 1px solid black'>$valor x $i</th>";
        echo "<th style='border: 1px solid black'><span style='color: red'>".($i * $valor)."</span></th></tr>";
        $i++;
    }
    echo "</table>";
}

function mostreTabuadaDoWhile($valor){
    echo "<table style='border: 1px solid black'>";
    $i = 1;
    do{
        echo "<tr style='border: 1px solid black'><th style='border: 1px solid black'>$valor x $i</th>";
        echo "<th style='border: 1px solid black'><span style='color: red'>".($i * $valor)."</span></th></tr>";
        $i++;
    }while($i < 11);
    echo "</table>";
}

for($i=1; $i<10; $i++){
    if(($i - 1) % 3 == 0){
        echo "<table><tr>";
    }
    echo "<td>";
    mostreTabuadaFor($i);
    echo "</td>";
    if($i % 3 == 0){
        echo "</tr></table>";
    }
}


?>