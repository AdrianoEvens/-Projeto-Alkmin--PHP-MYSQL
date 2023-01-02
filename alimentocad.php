<?php

require_once("conexao.php");

if(isset($_POST['enviou'])){

    $erros = array();

if(empty($_POST['nome'])){
    $erros[] = 'Você não digitou a descrição do alimento';
} else {
    $nome = mysqli_real_escape_string($dbc, trim($_POST['nome']));
}

if(empty($_POST['tipo'])){

    $erros[] = 'Você o tipo de alimento ex: grãos, frios...';
} else {
    $tipo = mysqli_real_escape_string($dbc, trim($_POST['tipo']));
}

if(empty($_POST['estoque'])){
    $erros[] = 'Você não digitou a quantidade de estoque';
} else {
    $estoque = mysqli_real_escape_string($dbc, trim($_POST['estoque']));
}

if(empty($_POST['peso'])){
    $erros[] = 'Você não digitou o peso do alimento';
} else {
    $peso = mysqli_real_escape_string($dbc, trim($_POST['peso']));
}

if(empty($_POST['destaque'])){
  $erros[] = 'Você não digitou se há destaque';
} else {
  $destaque = mysqli_real_escape_string($dbc, trim($_POST['destaque']));
}

if(empty($_POST['preco'])){
  $erros[] = 'Você não digitou o preço';
} else {
  $preco = mysqli_real_escape_string($dbc, trim($_POST['preco']));
}

if(isset($_FILES['arquivo'])){

  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novo_nome = md5(time()) . $extensao;
  $diretorio = "../upload/";
  move_uploaded_file($_FILES['arquivo'] ['tmp_name'], $diretorio . $novo_nome);
  

} else {
  $erros[] = 'Você não selecionou uma imagem';
}

if(empty($erros)){
   
    $ins = "INSERT INTO alimentos (nome, tipo, estoque, peso, destaque, preco, arquivo) 
    VALUES ('$nome', '$tipo', '$estoque', '$peso', '$destaque', '$preco', '$novo_nome')";

    $r = mysqli_query($dbc,$ins);

    if($r) {
        $sucesso= "<h1><b>Sucesso</b></h1>
        <p>Seu registro foi incluido com sucesso!</p>
        <p>Aguarde...</p>";
    
        echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=alimentocad.php'>";
    } else {
        $erro= "<h1><b>Erro no sistema</b></h1>
        <p>Você não pode ser redirecionado devido a um erro do sistema.
        Pedimos desculpas por qualquer incoveniente</p>";
        $erro .= "<p>". mysqli_error($dbc) . "</p>";
    }  } else {
        $erro="<h1><b>Erro(s)!</b></h1>
        <p>Ocorreram o(s) seguinte(s) erro(s): <br />";
        foreach ($erros as $msg) {
            $erro .= "- $msg <br/>";
        }
        $erro .= "<p>Por favor, tente novamente.</p>";
    
    
    } 

}

?>

<?php
     if(isset($erro)) 
        echo "<div class='alert alert-danger'>$erro</div>";

    if(isset($sucesso))
         echo "<div class='alert alert-success'>$sucesso</div>"; 
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

    
    
    <link href="../css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form enctype="multipart/form-data" name="cadastro" method="POST" action="">
    <img class="mb-4" src="../img/logoprojeto.png" alt="" width="150" height="150">
    <h1 class="h3 mb-3 fw-normal">Cadastre o alimento</h1>
    <div class="form-floating">
      <input type="text" class="form-control" name="nome" maxlength="200" placeholder="Digite a descrição" 
     >
      <label for="floatingInput">Descrição</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="tipo" maxlength="11" placeholder="Digite o tipo de alimento" 
      >
      <label for="floatingInput">Tipo</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="estoque" maxlength="10" placeholder="Digite a quantidade em estoque" 
      >
      <label for="floatingInput">Estoque</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="peso" maxlength="9" placeholder="Digite o peso do alimento" 
      >
      <label for="floatingPassword">Peso</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" name="destaque" maxlength="1" placeholder="Digite se há destaque" 
      >
      <label for="floatingPassword">Destaque</label>
    </div>

    <div class="form-floating">
      <input type="text" class="form-control" name="preco" placeholder="Digite o preço do alimento" 
      >
      <label for="floatingPassword">Preço</label>
    </div>

    <div class="form-floating">
      <input type="file" class="form-control" name="arquivo" placeholder="faça upload de uma imagem" 
      >
      <label for="floatingPassword">Imagem</label>
    </div>


 

    <div class="checkbox mb-3">
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>

    
    <input type="hidden" name="enviou" value ="true"/>
  </form>
</main>



</body>
</html>