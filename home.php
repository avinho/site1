<?php
include_once 'db_connect.php';
include_once 'includes/header.php';
include_once 'includes/mensagem.php';


$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

?>
<!-- Nav inicio -->
<div class="nav-extended">
    <nav>
        <div class="nav-wrapper deep-purple darken-4">

          <a class="center brand-logo">Home</a>
<?php include_once 'includes/nav.php'?>
<!-- Nav Fim -->
<!-- Layout da Pagina -->
<div class="row"> 
    
</div>
<!-- Fim Layout da Pagina -->
<?php
include_once 'includes/footer.php';
?>
