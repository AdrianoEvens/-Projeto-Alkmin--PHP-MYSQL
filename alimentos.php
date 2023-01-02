<?php


  require_once("administrativo/conexao.php");
  include_once("cabecalho.php");

$ins = "SELECT  * FROM alimentos WHERE destaque = 's'";

$r = mysqli_query($dbc, $ins);   

$total_registros = mysqli_num_rows($r);


?>



<div class="album py-5 bg-light">
    <div class="container">
      <div class='row'>

<?php

for ($contador=0; $contador < $total_registros; $contador++) {
    $reg = mysqli_fetch_array($r, MYSQLI_ASSOC);
    $id = $reg["id"];
    $nome = $reg["nome"];
    $tipo = $reg["tipo"];
    $estoque = $reg["estoque"];
    $peso = $reg["peso"];
    $preco = $reg["preco"];
    $arquivo = $reg["arquivo"];
?>
 

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="width:22rem; margin-top: 100px;">
            <img src="upload/<?php echo $arquivo;?>" style="height: 20rem;">
         
          
            <div class="card-body">
              <p align="center" class="card-text"><b><u>Descrição: <?=$nome; ?></u></b><br></p>
              <p class="card-text">Estoque: <?= $estoque; ?><br>
                Peso: <?= $peso; ?>g<br></p>
                <p class="card-text" align="right"><b>Preço: R$ <?= $preco; ?></b></p>
               </p>

                <button type="button" class="btn btn-success me-md-2" >
                    <a href="detalimento.php?alimento=<?= $id ?>" class="link-light">Detalhes</a>
                  </button>
                
                <button type="button" class="btn btn-info me-md-2" style="margin-left: 120px;">
                  <?php if ($tipo == "Frutas"){
                  ?>
                  <a href="sub_menus/frutas.php" class="link-light">Ver Mais</a>
                    <?php } else if ($tipo == "Goluseimas"){
                      ?>
                  <a href="sub_menus/guloseimas.php" class="link-light" >Ver Mais</a>
                    <?php } else if ($tipo == "Grãos"){
                    ?>
                  <a href="sub_menus/graos.php" class="link-light">Ver Mais</a>
                    <?php } else if ($tipo == "Líquidos"){
                    ?>
                 <a href="sub_menus/liquidos.php" class="link-light" >Ver Mais</a>
                  <?php
                }?></button>

            
        
            </div>
          </div>
        </div>



  <?php } ?>

</div>
</div>


<html lang="pt-br">
  <head>
  


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
 
  
<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


   
  </body>
</html>
