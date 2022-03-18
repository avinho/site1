<?php
    include_once 'db_connect.php';
    session_start();  
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/reset.css">
    <link rel="stylesheet" href="assets/estilo.css">
    <title>Login</title>
</head>
<body>
    <section class="section">

        <div class="box-login">
        
        
        <form class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <h1 class="main-title">Login</h1>
        <hr class="line">
            <label class="l-login">Usuario</label> <input class="i-login"type="text" name="login">
            <label class="l-login">Senha</label> <input class="i-login"type="password" name="senha">
            <div class="box-buttons">
            <button class="b-enviar" type="submit" name="entrar">Entrar</button>
            <a href="cadastrar.php" class="b-cadastrar" type="submit" name="criar">Cadastrar</a>
            </div>  
        </form>
        </div>

        <div class="result">
        <?php    
            if(isset($_POST['entrar'])){
                $erros = array();
                $login = mysqli_escape_string($connect, $_POST['login']);
                $senha = mysqli_escape_string($connect, $_POST['senha']);
                if(empty($login)){
                    $erros[] = "<li>Preencha o login.";                    
                } elseif(empty($senha)){           
                    $erros[] = "<li>Preencha a senha.";              
                } else{
                    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
                    $resultado = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($resultado) > 0){
                        $senha = md5($senha);
                        $sql = "SELECT * FROM usuarios WHERE login = '$login' AND  senha = '$senha'";
                        $resultado = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($resultado) == 1){
                            $dados = mysqli_fetch_array($resultado);                            
                            $_SESSION['logado'] = true;
                            $_SESSION['id_usuario'] = $dados['id'];
                            header('location: home.php');
                        }else {
                            $erros[] = "<li>Dados invalidos.";
                        }
                    } else {
                        $erros[] = "<li>Não existe usuario.";
                    }
                }
            }
            if(!empty($erros)){
                foreach($erros as $erros){
                    echo '<html><style>
                    .result {
                    padding: 15px;
                    background-color: #CD853F;
                    border-radius: 10px;
                    border: none;
                    color: white;
                    box-shadow: 2px 2px 1px black;
                    font-family: inherit;
                    font-size: 20px;
                    text-shadow: 2px 2px 1px black;
                }
                </html></style>';
                    echo $erros;
                }
            }
        ?>
        </div>

    </section>
    <div class="gif">
        <img src="assets/img/pug-dance.gif" alt="pugdance">
    </div>
</body>
</html>