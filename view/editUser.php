<!DOCTYPE html>


<?php 
require_once '../controller/cUsuario.php';
require_once 'listaUsuarios.php';

$id = 0;
if(isset($_POST['updatePF'])){
    $id = $_POST['id'];
}
$cadUser = new cUsuario();
$pf = $cadPFs->getPessoaFById($id);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Usuario</title>
    </head>
    <body>
        <h1>Editar Usuario</h1>
        <form action="<?php $cadUser->editar(); ?>" method="POST">
            <input type="hidden" value="<?php echo $id; ?>" name="id"/>
            <input type="text" required value="<?php echo $pf[0]['nome']; ?>" name="nome"/>
            <br><br>
            <input type="email" required value="<?php echo $pf[0]['email']; ?>" name="email"/>
            <br><br>
            <br><br>
            <input type="submit" value="Salvar Alterações" name="editar"/>
            <input type="submit" value="Cancelar" name="cancelar"/>
        </form>
    </body>
</html>