<?php
session_start();
require_once '../db_connect.php';

function clear($input){
    global $connect;
    $var = mysqli_escape_string($connect, $input);
    $var = htmlspecialchars($var);
    return $var;
}

if(isset($_POST['btn-cadastrar'])){
    if (!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) {
		$_SESSION['mensagem'] = "Formato de idade inválido.";
		header('Location: ../adicionar.php');
	} else {
		$nome = clear($_POST['nome']);
		$sobrenome = clear($_POST['sobrenome']);
		$email = clear($_POST['email']);
		$idade = clear($_POST['idade']);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUE ('$nome','$sobrenome','$email','$idade')";

    if(mysqli_query($connect, $sql)){
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('location: ../clientes.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar cliente.";
        header('location: ../clientes.php');
    }
    }
};