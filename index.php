<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['logadoM']) && $_SESSION['logadoM'] != true) {
    header("Location: view/login.php");
}else{
    echo $_SESSION['usuarioM'] . " | " . $_SESSION['emailM'];
    echo " | <a href='controller/logout.php'>Sair</a>";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Página Inicial</h1>
        <br><br>
        <button><a href="view/cadUsuario.php" style="text-decoration:none;color:black;">Cadastro de Usuário</a></button>
    </body>
</html>
