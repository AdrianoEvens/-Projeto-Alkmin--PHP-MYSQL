<?php

    session_start();

?>

<html>

    <title>Projeto Alkmin</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    

<link href="css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top"style="background-color: #48D1CC;">
    <div class="container-fluid">
      <img src="img/logoprojeto.png" alt="" width="100" height="100">
      <a class="navbar-brand" href="index.php">Projeto Alkmin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0" style="margin-left:150px;"  >
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="sobre.php">Sobre o projeto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="alimentos.php">Alimentos</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="lojas.php">Lojas Parceiras</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="administrativo/almenu.php">Administrativo</a>
          </li>

       
         
         <?php if (!isset($_SESSION['nome']) == true){
           ?>
          <div class="flex-shrink-0 dropdown" style="margin-left:150px;">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" 
          id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/usuario3.png" alt="mdo" width="45" height="45" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
             <li> <a class="dropdown-item" href="login.php">Entrar</a></li>
          
          </ul>
        </div>
        <?php } else {
                ?>
                <div class="flex-shrink-0 dropdown" style="margin-left:150px;">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" 
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
         
                  <img src="<?php echo $_SESSION['foto'] != null ?
                  'fotos_usuarios/' . $_SESSION['foto'] : 'img/usuario3.png'; ?>" alt="mdo" width="36" height="36" class="rounded-circle">
                </a>

               
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                   <li class="dropdown-item"><?php echo $_SESSION['nome'];?></li>
                  <li><a class="dropdown-item" href="perfil.php">Info perfil</a></li>
                  <li><a class="dropdown-item" href="cesta.php">Minha cesta</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
              </div>
              <?php
        }
          ?>

        <li class="nav-item" style="margin-left:20px; margin-top:10px">
        <a href="cesta.php"><img src="img/cesta4.png" width="30px" height="30px" ></a>
          </li>

</ul>
      </div>
    </div>
  </nav>
</header>