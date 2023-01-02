<?php

    
    require_once("administrativo/conexao.php");
    include_once("cabecalho.php");


    $alimento = $_GET['alimento'];

    $sql="SELECT * FROM alimentos WHERE id = '"
    . $alimento . "'";

    $rs = mysqli_query($dbc, $sql);
    $reg = mysqli_fetch_array($rs);
    $id = $reg["id"];
    $nome = $reg["nome"];
    $tipo = $reg["tipo"];
    $estoque = $reg["estoque"];
    $peso = $reg["peso"];
    $preco = $reg["preco"];
    $arquivo = $reg["arquivo"];
    
?>

<body>


<h1 align="center" style="margin-top: 110px"><u><b>Detalhes</b></u></h1>


<div class="card mb-3 border-dark" style="max-width: 1000px; margin-left: 200px; margin-top:50px; height: 482px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="upload/<?php echo $arquivo;?>" style="height: 30rem; width: 30rem" >
    </div>
    <div class="col-md-8">
      <div class="card-body" style="margin-left: 140px">
        <h5 class="card-title">Informações</h5>
        <p class="card-text">
    Descrição: <b><?= $nome; ?></b><br />
    Id: <b><?= $id; ?></b><br />
    Tipo: <b><?= $tipo; ?></b><br />
    Peso: <b><?= $peso; ?></b><br />
    Preço: <b><?= $preco; ?></b><br />
    Estoque: <b><?= $estoque; ?></b><br />


    </b><br />
</p>

<div class="col-md-8 jumbotron">
        <div class="row">
            <div class="col-md-10">
            <h4>Por R$ <?= number_format($preco,2,',','.'); ?></h4>
            </div>
            <div class="col-md-2 pull-right">
                <?php if ($estoque > 0) { ?>
                <a href="cesta.php?alimento=<?= $id; ?>&inserir=S"
                class="btn btn-success">Comprar</a>
                <?php } else { ?>
                    <img src="a1c.png" hspace="5">
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Parcelamento no cartão de crédito</b>
            </div>
        </div>
        <?php
                $col_esq='';
                $col_dir='';
        ?>  
                <div class="col-md-6">
                <?= $col_esq; ?>
                </div>
                <div class="col-md-6">
                <?= $col_dir; ?>
                </div>
        </div>
        <br />

        <div class="row">
            <div class="col-md-12">
        <b>Formas de pagamento</b></br>
        <img src="img/banner-4.png"
            width="297px" height="23px" />
        <br /><br />
        <br /><br />
     </div>
    </div>
</div>

      </div>
    </div>
  </div>
</div>


    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    

    <!-- Bootstrap core CSS -->
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

      a {
        text-decoration: none;
      }
    </style>



    </div>
    </body>