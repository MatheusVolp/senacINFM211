<?php

if (isset($_POST['editar'])) {
            $id = $_POST['idUser'];
            $nome = $_POST['nomeUser'];
            $email = $_POST['email'];

            $pdo = require_once '../pdo/connection.php';

            $sql = "update usuario SET nomeUser='?', email='?' where idUser = ?";
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->bindParam(2, $nome, PDO::PARAM_STR);
            $sth->bindParam(3, $email, PDO::PARAM_STR);
            
            $stmt = $pdo->prepare($sql);
            unset($sth);
            unset($pdo);
            
            header("Location: ../view/listaUsuarios.php");
        }
?>