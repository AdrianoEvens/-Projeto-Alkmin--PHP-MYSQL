<?php

include_once("cabecalho.php");

$ins = "";
if(isset($_POST['enviou'])) {

  require_once("administrativo/conexao.php");


$erros = array();

if(empty($_POST['pnome'])){
    $erros[] = 'Você não digitou seu primeiro nome';
} else {
    $pnome = mysqli_real_escape_string($dbc, trim($_POST['pnome']));
}

if(empty($_POST['unome'])){

    $erros[] = 'Você não digitou seu último nome';
} else {
    $unome = mysqli_real_escape_string($dbc, trim($_POST['unome']));
}
if(empty($_POST['cep'])){
    $erros[] = 'Você não digitou seu CEP';
} else {
    $cep = mysqli_real_escape_string($dbc, trim($_POST['cep']));
}

if(empty($_POST['logradouro'])){
    $erros[] = 'Você não digitou o logradouro';
} else {
    $log = mysqli_real_escape_string($dbc, trim($_POST['logradouro']));
}

if(empty($_POST['bairro'])){
    $erros[] = 'Você não digitou o bairro';
} else {
    $bairro = mysqli_real_escape_string($dbc, trim($_POST['bairro']));
}

if(empty($_POST['cidade'])){
    $erros[] = 'Você não digitou a cidade';
} else {
    $cidade = mysqli_real_escape_string($dbc, trim($_POST['cidade']));
}

if(empty($_POST['uf'])){
    $erros[] = 'Você não digitou a UF';
} else {
    $uf= mysqli_real_escape_string($dbc, trim($_POST['uf']));
}


if(empty($_POST['nomecartao'])){
  $erros[] = 'Você não digitou o nome do cartão';
} else {
  $nome_cartao= mysqli_real_escape_string($dbc, trim($_POST['nomecartao']));
}


if(empty($_POST['numcartao'])){
  $erros[] = 'Você não digitou o número do cartão';
} else {
  $num_cartao = mysqli_real_escape_string($dbc, trim($_POST['numcartao']));
}


if(empty($_POST['vencartao'])){
  $erros[] = 'Você não digitou o vencimento do cartão';
} else {
  $venc_cartao= mysqli_real_escape_string($dbc, trim($_POST['vencartao']));
}

if(empty($_POST['codcartao'])){
  $erros[] = 'Você não digitou o código do cartão';
} else {
  $cod_cartao = mysqli_real_escape_string($dbc, trim($_POST['codcartao']));
}

if(empty($erros)){
 
  $ins = "UPDATE pedidos set num_cartao = '$num_cartao', 
  venc_cartao = '$venc_cartao', 
  nome_cartao = '$nome_cartao',
  cods_cartao = '$cod_cartao',
  id_cliente = '" . $_SESSION['id_cliente'] . "' , 
  status = 'Finalizado' 

   WHERE id = '" . $_SESSION['id_ped'] . "'";
   
    $r = mysqli_query($dbc,$ins);

    if($r) {
      $sucesso= "<h1><b>Sucesso</b></h1>
      <p>Seu registro foi alterado com sucesso!</p>
      <p>Aguarde...Redirecionando!</p>";

      echo "<meta HTTP-EQUIV='refresh'CONTENT ='1; URL=msgfinaliza.php'>";
  } else {
      $erro= "<h1><b>Erro no sistema</b></h1>
      <p>Você não pode alterar o registro devido a um erro do sistema.
      Pedimos desculpas por qualquer incoveniente</p>";
      $erro .= "<p>". mysqli_error($dbc) . "</p>";
  } 
  } else {
      $erro="<h1><b>Erro(s)!</b></h1>
      <p>Ocorreram o(s) seguinte(s) erro(s): <br />";
      foreach ($erros as $msg) {
          $erro .= "- $msg <br/>";
      }
      $erro .= "<p>Por favor, tente novamente.</p>";
  

  }
}

?>
<link rel="stylesheet" href="css/api-cep.css">

<body>
<link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center" style="margin-top:80px;">
     
      <h2>Finalização do Pedido</h2>
        
    
    </div>

    <?php
            if(isset($erro)) 
            echo "<div class='alert alert-danger'>$erro</div>";

            if(isset($sucesso))
            echo "<div class='alert alert-success'>$sucesso</div>"; 
        ?>

<div id="appCep">
<form method="POST" style="margin-top:5px;" action="finaliza_ped.php">

    
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (R$) <?php echo $_SESSION["subtotal"]; ?></span>
            <strong></strong>
          </li>
        </ul>


      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Dados Pessoais </h4>
          <div class="row g-3">
            <div class="col-sm-6">
              <label  class="form-label">Primeiro Nome</label>
              <input type="text" class="form-control" name="pnome" placeholder="Digite seu primeiro nome" >
              
            </div>

            <div class="col-sm-6">
              <label  class="form-label">Último Nome</label>
              <input type="text" class="form-control" name="unome" placeholder="Digite seu último nome" >
           
            </div>

            <div class="col-12">
              <label  class="form-label">CEP</label>
              <input type="text" class="form-control" name="cep" placeholder="Digite o n° do CEP"  
              v-model="endereco.cep" @change="cepAlteradoEvento" >
              
            </div>

            <div class="col-12">
              <label class="form-label">Logradouro </label>
              <input type="text" class="form-control" name="logradouro" 
              placeholder="Digite o Logradouro"  v-model="endereco.logradouro">
            </div>

            <div class="col-12">
              <label class="form-label">Bairro </label>
              <input type="text" class="form-control" name="bairro" 
              placeholder="Digite o nome do bairro" v-model="endereco.bairro">
            </div>

            <div class="col-md-5">
              <label class="form-label">Cidade</label>
                <input type="text" class="form-control" name="cidade" 
                placeholder="Digite o nome da cidade"  v-model="endereco.cidade">
            </div>

            <div class="col-md-4">
              <label  class="form-label">UF</label>
                <input type="text" class="form-control" name="uf" 
                placeholder="Digite a UF"  v-model="endereco.estado">
             
            </div>

    

          <hr class="my-4">

          <h4 class="mb-3">Pagamento</h4>

          
          <div class="row gy-3">
            <div class="col-md-6">
              <label class="form-label">Nome no cartão</label>
              <input type="text" class="form-control"name="nomecartao" placeholder="Digite o nome do titular do cartão">

            </div>

            <div class="col-md-6">
              <label  class="form-label">Número do Cartão</label>
              <input type="text" class="form-control" name="numcartao" placeholder="Digite o número do cartão" >
             
            </div>

            <div class="col-md-3">
              <label  class="form-label">Vencimento </label>
              <input type="text" class="form-control" name="vencartao" placeholder="DD/MM/AA" >
           
            </div>

            <div class="col-md-3">
              <label  class="form-label">CVV</label>
              <input type="text" class="form-control" name="codcartao" >

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Confirmar Dados</button>

          <input type="hidden" name="enviou" value ="true"/>
        </form>
     
      </div>
    </div>
  </main>



<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="JS/api_cep.js"></script>

</body>