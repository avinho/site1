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

          <a class="center brand-logo">Clientes</a>
<?php include_once 'includes/nav.php'?>
<!-- Nav Fim -->
<!-- Layout da Pagina -->
<div class="row"> 
    <div class="col l12">
        <!-- Titulo Tabela -->
        <h4>Clientes</h4>
        <!-- Linha de Botões -->
        <div class="row">
          <div class="input-field col s3 pull=s1 left">
              <input id="pequisar" type="text">
              <label for="pequisar">Pequisar</label>
          </div>
          <div class="col s1 right">
            <a href="adicionar.php" class="btn">Adicionar</a>
          </div>
        </div>

        <!-- Tabela -->
        <table class="bordered striped">   
          <!-- Head Tabela -->         
            <thead>
              <tr>
                <th>Nome:</th>
                <th>Sobrenome:</th>
                <th>Email:</th>
                <th>Idade:</th>
                <th>Status:</th>
                <th>Produtor:</th>    
              </tr>          
            </thead>
            <!-- Fim Head Tabela -->

            <!-- Body Tabela -->
            <tbody>
              <?php
              $sql = "SELECT * FROM clientes";
              $resultado = mysqli_query($connect, $sql);
              if(mysqli_num_rows($resultado) > 0):
                while($dados = mysqli_fetch_array($resultado)):       
                ?>
                
                <tr>
                  <td>
                    <?php echo $dados['nome']; ?>
                  </td>
                  <td>
                    <?php echo $dados['sobrenome']; ?>
                  </td>
                  <td>
                    <?php echo $dados['email']; ?>
                  </td>
                  <td>
                    <?php echo $dados['idade']; ?>
                  </td>
                  <td>
                    <?php echo $dados['Status']; ?>
                  </td>
                  <td>
                    <?php echo $dados['Produtor']; ?>
                  </td>
                  <td>
                    <a href="dados.php?id=<?php echo $dados['id'] ?>" class="btn-floating btn-small btn tooltipped waves-effect waves-light teal darken-2 btn tooltipped" data-position="bottom" data-tooltip="Dados"><i class="material-icons">folder_shared</i></a>
                  </td>
                  <td>
                    <a href="editar.php?id=<?php echo $dados['id'] ?>" class="btn-floating btn-small btn tooltipped waves-effect waves-light orange lighten-1 btn tooltipped" data-position="bottom" data-tooltip="Editar"><i class="material-icons">create</i></a>
                  </td>
                  <td>
                    <a href="#modal<?php echo $dados['id'] ?>" class="btn-floating btn-small waves-effect waves-light red modal-trigger btn tooltipped" data-position="bottom" data-tooltip="Apagar"><i class="material-icons right">delete</i></a>
                  </td>
                  
                  <!-- Modal Structure -->
                  <div id="modal<?php echo $dados['id'] ?>" class="modal">

                    <div class="modal-content">
                      <h4>Opa!</h4>
                      <p>Tem certeza que deseja excluir o cliente ?</p>
                    </div>

                    <div class="modal-footer">
                      <form action="actions/delete.php" method="POST">
                        <input type ="hidden" name = "id" value = "<?php echo $dados['id']; ?>"></input>
                        <button type ="submit" name = "btn-deletar" class="btn red">Deletar</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                      </form>
                    </div>
                  </div>
                  <!-- Fim Modal Structure -->
                </tr>
                <?php
                endwhile;
            else: ?>            
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
            <?php endif; ?>    
            </tbody>
            <!-- Fim Body Tabela -->          
        </table>
        <!-- Fim Tabela -->        
    </div>
</div>
<!-- Fim Layout da Pagina -->
<?php
include_once 'includes/footer.php';
?>
