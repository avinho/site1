<!-- Nav inicio -->
          <ul id="navbar-items" class="left">
            <li>
              <a data-target="slide-out" class="sidenav-trigger show-on-large right"><i class="material-icons">menu</i></a>
            </li>
          </ul>
          <ul id="slide-out" class="sidenav">
          <li>
            <div class="user-view larger">
              <div class="background">
                <img src="img/foto.jpg">
              </div>
              <a><img class="circle" src="img/eu.png"></a>             
              <a href="logout.php" class="btn transparent"><i class="material-icons">exit_to_app</i></a>
              <a class="white-text text left"><?php echo $dados['nome']; ?></a>
            </div>            
          </li> 
          <li><div class="divider"></div></li>
        <ul class="collapsible">
            <li>
                <!-- Nav Admin  -->
            <div class="collapsible-header"><span class="black-text">Admin</span></div>
            <div class="collapsible-body">
                <div class="collection">
                    <a href="#!" class="collection-item"><span class="blue-grey-text">Usuarios</span></a>
                    <a href="#!" class="collection-item"><span class="blue-grey-text">Configurações</span></a>
                </div>
            </div>
            </li>
        </ul>
          <li><div class="divider"></div></li>  
          <li><a href="home.php"><i class="waves-effect small material-icons">home</i>Home</a></li>
          <li><a href="clientes.php"><i class="waves-effect small material-icons">group</i>Clientes</a></li>              
          <li><a href="#!"><i class="waves-effect small material-icons">insert_drive_file</i>Propostas e Apólices</a></li>
          <li><a href="#!"><i class="waves-effect small material-icons">payment</i>Financeiro</a></li>
          <li><div class="divider"></div></li>      
        </div>       
    </nav>
  </div>
<!-- Nav Fim -->