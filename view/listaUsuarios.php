<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logadoM']) && $_SESSION['logadoM'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuarioM'] . " | " . $_SESSION['emailM'];
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
$listaUser = $cadUser->getUsuario(); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
    <button onclick="location.href='cadUsuario.php'">Voltar</button>
        
        <h1>Lista de Usuários</h1>
        <table>
                <tr><!-- Linha da tabela -->
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>e-mail</th>
                    <th>Funções</th>
                </tr>
                <?php foreach ($listaUser as $user): ?>
                <tr><!-- Linha da tabela -->
                    <td><?php echo $user['idUser'] ?></td>
                    <td><?php echo $user['nomeUser'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <?php if($user['email'] != $_SESSION['emailM']){ ?>
                            <form action="../controller/deleteUser.php" method="POST">
                            <input type="hidden" value="<?php echo $user['idUser']; ?>" name="idUser">
                            <input type="submit" name="delete" value="Deletar">
                        </form>
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($user['email'] != $_SESSION['emailM']){ ?>
                            <form action="../controller/editarUser.php" method="POST">
                            <input type="hidden" value="<?php echo $user['idUser']; ?>" name="idUser">
                            <input type="hidden" value="<?php echo $user['nomeUser']; ?>" name="nomeUser">
                            <input type="hidden" value="<?php echo $user['email']; ?>" name="email">                      
                            <input type="submit" name="editar" value="Editar">
                        </form>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?> 
        </table>
        <br>
        
    </body>
</html>
