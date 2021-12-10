<?php

class cUsuario {
    //put your code here
    public function inserir() {
        if(isset($_POST['salvar'])){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $pas = $_POST['pas'];
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into usuario (nomeUser, email, pas) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $pass, PDO::PARAM_STR);
            $pass = password_hash($pas, PASSWORD_DEFAULT);
            $sth->execute();
            unset($sth);
            unset($pdo);
        }
    }
    
    public function getUsuario() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
        unset($sth);
        unset($pdo);
    }

    public function deleteUser() {
        if (isset($_POST['deletar'])) {
            $id = $_POST['idUser'];

            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }

    }

    public function editar(){
        if (isset($_POST['editar'])) {
            $id = $_POST['idUser'];
            $nome = $_POST['nomeUser'];
            $email = $_POST['email'];

            $pdo = require_once '../pdo/connection.php';

            $sql = "update usuario SET nomeUser=?, email=? where idUser = ?";
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->bindParam(2, $nome, PDO::PARAM_STR);
            $sth->bindParam(3, $email, PDO::PARAM_STR);
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            
            unset($sth);
            unset($pdo);
            
            header("Location: ../view/listaUsuarios.php");
        }
    }
    /*
    public function deleteUser(){
        if (isset($_POST['delete'])) {
            $id = $_POST['idUser'];
            
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $schema = 'inf4m211';
            $conexao = mysqli_connect($host, $user, $pass, $schema);
            if (!$conexao) {
                die('Não foi possivel conectar. ' . mysqli_error());
            }
            
            $sql = "delete from pessoa where idUser = $id";
            $result = mysqli_query($conexao, $sql);
            if(!$result){
                die('Erro ao deletar. ' . mysqli_error($conexao));
            }
            mysqli_close($conexao);
            header('Refresh: 0'); // recarrega a pág. F5 em 0 segundos
        }
    }
    */
}
