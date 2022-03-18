<?php
include_once 'db_connect.php';
include_once 'includes/header.php';
include_once 'includes/mensagem.php';

if(isset($_GET['id'])){
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
};
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar Cliente</h1>
        <form action="actions/update.php" method="POST">
            <input type="hidden" name ="id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'];?>">
                <label for="name">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome'];?>">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'];?>">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'];?>">
                <label for="idade">Idade</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="btn-editar">Atualizar
            <i class="material-icons right">send</i>
            </button>
            <a href = "clientes.php" class="btn green darken-2">Lista de Clientes</a>
        </form>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>