<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['login'])) {
        session_start();
        $_SESSION["login"] = $_GET['login'];
        $_SESSION["senha"] = $_GET['senha'];
    }
    ?>

    <form action="ex02-1.php" method="GET">
         <br>
         Entre com login:<br>
         <input type="text" name="login"></input><br>
         Entre com senha:<br>
         <input type="text" name="senha"></input><br><br>
        <button type="submit">Criar sessão</button>
    </form>
    <br>
    <a href="ex02-2.php">Clique aqui para ir para segundo arquivo</a>

</body>

</html>