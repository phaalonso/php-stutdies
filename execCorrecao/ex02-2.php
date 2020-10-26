<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
         session_start();

    ?>
    Segundo arquivo<br>
    Entre com login:<br>
    <input type="text" name="login" value=<?php echo $_SESSION['login']?>></input><br>
    Entre com senha:<br>
    <input type="text" name="senha" value=<?php echo $_SESSION['senha']?>></input><br><br>
</body>

</html>