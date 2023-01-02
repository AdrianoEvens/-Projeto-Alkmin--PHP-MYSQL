<?php

//Código para realizar a conexão com o banco de dados.

require_once("conexao.php");

?>


<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Login - Projeto Alkmin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

    <!-- CSS padrão do template do bootstrap -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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


  <!-- Códigos abaixo são utilizados para criar e formatar o formulário,
  utilizamos o bootstrap também -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form enctype="multipart/form-data" name="cadastro" method="POST" action="cadastrosis.php">
    <img class="mb-4" src="../img/logoprojeto.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 fw-normal">Cadastre-se</h1>
    <div class="form-floating">
      <input type="text" class="form-control" name="nome" maxlength="190" placeholder="Digite seu nome completo" 
     >
      <label for="floatingInput">Nome completo</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="cpf" maxlength="11" autocomplete="off" placeholder="Digite seu CPF" 
      >
      <label for="floatingInput">CPF</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" name="email" maxlength="200" placeholder="Digite seu E-mail" 
      >
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" 
      >
      <label for="floatingPassword">Senha</label>
    </div>
    <div class="form-floating">
      <input type="file" class="form-control" name="foto" 
      >
      <label for="floatingPassword">Foto de Perfil</label>
    </div>

 

    <div class="checkbox mb-3">
    </div>

    <!-- Código do botão para enviar os dados preenchidos no formulário -->
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
    <a href="login.php">Entrar</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>

    
    <input type="hidden" name="enviou" value ="true"/>
  </form>
</main>



</body>
</html>