<?php
    
    require_once("administrativo/conexao.php");
    include_once("cabecalho.php");

    session_start();

    $usuario = $_SESSION['id'];

    $sql="SELECT * FROM usuarios WHERE id = '"
    . $usuario . "'";

    $rs = mysqli_query($dbc, $sql);
    $reg = mysqli_fetch_array($rs);
    $id = $reg["id"];
    $nome = $reg["nome"];
    $foto = $reg["foto"];
    $cpf = $reg["cpf"];
    $email = $reg["email"];
   
?>

<body>


<h1 align="center" style="margin-top: 110px"><u><b>Suas informações</b></u></h1>


<div class="card mb-3 border-dark" style="max-width: 1000px; margin-left: 200px; margin-top:50px; height: 482px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="fotos_usuarios/<?php echo $foto;?>" style="height: 30rem; width: 30rem" >
    </div>
    <div class="col-md-8">
      <div class="card-body" style="margin-left: 140px">
        <h5 class="card-title">Informações</h5>
        <p class="card-text">
    Nome: <b><?= $nome; ?></b><br />
    Id: <b><?= $id; ?></b><br />
    E-mail: <b><?= $email; ?></b><br />
    CPF: <b><?= $cpf; ?></b><br />
  


    </b><br />
</p>



        
      </div>
    </div>
  </div>
</div>


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

      a {
        text-decoration: none;
      }
    </style>



    

    </div>
    </body>