
  <?php

  require_once("conexao.php");


  //Numero de registros para mostar por pagina
  $exiba=5;

  //Captura a busca 
  $where = mysqli_real_escape_string($dbc,trim(isset($_GET['q'])) ? $_GET['q'] : '');

  //Determina a quantidade de páginas
  if (isset($_GET['P']) && is_numeric($_GET['p'])) {
    $pagina = $_GET['p'];
  } else {
    $q = "SELECT COUNT(id) FROM pedidos WHERE id_cliente like '%$where%'";

    $r = @mysqli_query($dbc,$q);
    $row = @mysqli_fetch_array($r, MYSQLI_NUM);
  
  $q = "SELECT id, num_ped, status, id_cliente
  FROM pedidos
  WHERE num_ped like '%$where%' 
  ORDER BY $order_by
  LIMIT $inicio, $exiba";
  $r = @mysqli_query($dbc,$q);

  if (@mysqli_num_rows($r)>0){
    $saida ='<div class="table-responsive col-md-12" style="margin-left: 250px;"> 
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%"><a href="pedidos.php?ordem=num_ped">Id</a></th>
          <th width="5%">Número Pedido</th>
          <th width="5%">Id cliente</th>
          <th width="5%">Status</th>
            
        </tr>
        </thead>
        <tbody>';                                                                         
                                                                     
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
          $saida .= '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['num_ped'].'</td>
          <td>'.$row['id_cliente'].'</td>
          <td>'.$row['status'].'</td>
         
          </tr>';
        }
        $saida .= '</tbody></table></div>';
  } else {
    $saida ="<div class ='alert alert-warning'>
    Sua pesquisa por<b>$where</b> não encontrou nenhum resultado.<br />
    <b>Dicas</b><br />
    -Tente palavras menos específicas<br />
    -Tente palavras chaves diferentes<br />
    -Confira a ortografia das palavras e se elas estã acentuadas corretamente.<br />
    </div>";
  }
  if($pagina > 1){
    $pag = '';
    $pagina_correta = ($inicio / $exiba) + 1;

    //botao anterior
    if ($pagina_correta != 1){
      $pag .= '<li class="page-item"><a class="page-link" style="margin-left:260px;" href="pedidos.php?s=' . ($inicio - $exiba) .
      '&p=' . $pagina . '&ordem' . $ordem . '">Anterior</a></li>';
    }else{
      $pag .= '<li class="page-item disabled"><a class="page-link" style="margin-left:260px;" >Anterior</a></li>';
    }

    //Todas as páginas
    for($i = 1; $i <= $pagina; $i++){
      if($i != $pagina_correta){
        $pag .= '<li class="page-item"><a class="page-link" href="pedidos.php?s=' . ($exiba * ($i -1)) .
        '&p=' . $pagina . '&ordem' . '">' . $i . '</a></li>';
      }else{
        $pag .= '<li class="page-item disabled"><a class="page-link">' . $i . '</a></li>';
      }
    }

    //botao proximo
    if ($pagina_correta != $pagina){
      $pag .= '<li class="page-item next"><a class="page-link" href="pedidos.php?s=' . ($inicio + $exiba) .
      '&p=' . $pagina . '&ordem' . $ordem . '">Proximo</a></li>';
    }else{
      $pag .= '<li class="page-item disabled"><a class="page-link" >Proximo</a></li>';
    }
  }
?>


<div class="container-fluid">
  <div class="row">

  <?php include_once("menu_lateral.php"); ?>
  
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="row mt-3">
          <div class="col-md-3" style="margin-left: 250px;">
            <h2>Pedidos</h2>
          </div>
         

      <div class="row">
        <?php echo $saida; ?>
      </div>

      <div class="row">
        <ul class="pagination">
          <?php if (isset($pag)) echo $pag; ?>
        </ul>
      </div>
    </main>
  </div>
</div>

<?php include_once("rodape.php"); ?>