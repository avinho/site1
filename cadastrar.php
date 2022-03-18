<?php
    require_once 'db_connect.php';
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
    <title>Formulario</title>
</head>
<body>
    <section class="section">

        <div class="box-login">
        
        
        <form class="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <h1 class="main-title">Cadastro</h1>
        <hr class="line">
            <label class="l-login">Nome</label> <input class="i-login"type="text" name="nome">
            <label class="l-login">Usuario</label> <input class="i-login"type="text" name="login">
            <label class="l-login">Senha</label> <input class="i-login"type="text" name="senha">
            <div class="box-buttons">
            <button class="b-cadastrar1" type="submit" name="cadastro">Cadastrar</button>
            <a href="index.php" class="b-voltar"name="voltar">Voltar</a>
            </div>  
        </form>
        </div>

        <div class="result">
        <?php    
        function clear($input){
            global $connect;
            $var = mysqli_escape_string($connect, $input);
            $var = htmlspecialchars($var);
            return $var;
        }
            if(isset($_POST['cadastro'])){
                $erros = array();
                $nome = clear($_POST['nome']);
                $login = clear($_POST['login']);
                $senha = clear($_POST['senha']);
                if(empty($login)){
                    $erros[] = "<li>Preencha um login.";                    
                } elseif(empty($senha)){           
                    $erros[] = "<li>Preencha uma senha.";    
                    }if(empty($nome)){
                        $erros[] = "<li>Preencha um nome.";        
                } else{
                    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
                    $resultado = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($resultado) == 1){                       
                        $erros[] = "<li>Já existe esse usuario.";                        
                        } else {
                            $senha = md5($senha);
                            $sql = "INSERT INTO usuarios (nome, login, senha) VALUE ('$nome','$login','$senha')";
                            mysqli_query($connect, $sql);
                            mysqli_close($connect);
                            header('location: home.php');
                        };
                        };
                    };
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
</body>
</html>