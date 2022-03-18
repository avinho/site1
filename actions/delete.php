<?php
session_start();
require_once '../db_connect.php';

if(isset($_POST['btn-deletar'])){
        $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Cliente deletado com sucesso!";
        header('location: ../clientes.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar cliente.";
        header('location: ../clientes.php');
    }
    };