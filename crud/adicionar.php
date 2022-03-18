<?php
include_once 'db_connect.php';
include_once 'includes/header.php';
session_start(); 

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>
<!-- Nav inicio -->
<div class="nav-extended">
    <nav>
        <div class="nav-wrapper deep-purple darken-4">

          <a class="center brand-logo">Novo Cliente</a>
<?php include_once 'includes/nav.php'?>
<!-- Nav Fim -->
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Dados</h1>
        <form action="actions/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="name">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="number" name="idade" id="idade">
                <label for="idade">Idade</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="btn-cadastrar">Cadastrar
            <i class="material-icons right">send</i>
            </button>
            <a href = "clientes.php" class="btn green darken-2">Lista de Clientes</a>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>