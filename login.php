
<?php

    include('administrativo/conexao.php');

    session_start();
  

    if(isset($_POST['email']) || isset($_POST['senha'])){
        if(strlen($_POST['email']) == 0){
           echo "<div class='alert alert-danger'>'Preencha o E-mail'</div>";
        } else if(strlen($_POST['senha']) == 0){
            echo "<div class='alert alert-danger'>'Preencha  a senha '</div>";
        } else{

            $email = $dbc->real_escape_string($_POST['email']);
            $senha = $dbc->real_escape_string($_POST['senha']);

            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $query = $dbc->query($sql) or die("Falha na execução do código SQL: " . $dbc->error);
            
            $registros = $query->num_rows;

            if($registros == 1){
                $usuario = $query->fetch_assoc();
                
              

                $_SESSION['id_cliente'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['foto'] = $usuario['foto'];

                header("Location: index.php");
            } else{
                echo "Falha ao logar, email ou senha incorretos";
            }
        }
    }


?>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form  name="cadastro" method="POST" action="">
    <img class="mb-4" src="img/logoprojeto.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 fw-normal">Entre em sua conta</h1>
    
    <div class="form-floating">
      <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail" 
      >
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" 
      >
      <label for="floatingPassword">Senha</label>
    </div>

 

    <div class="checkbox mb-3">
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    <a href="cadastro.php">Cadastrar-se</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>

  </form>
</main>



</body>
</html>

