
<?php 

$titulo = "Projeto Alkmin - Usuários";
  include_once("cabecalho.php");
  require_once("conexao.php");

  //Numero de registros para mostar por pagina
  $exiba=3;

  //Captura a busca 
  $where = mysqli_real_escape_string($dbc,trim(isset($_GET['q'])) ? $_GET['q'] : '');

  //Determina a quantidade de páginas
  if (isset($_GET['P']) && is_numeric($_GET['p'])) {
    $pagina = $_GET['p'];
  } else {
    $q = "SELECT COUNT(id) FROM usuarios WHERE nome like '%$where%'";

    $r = @mysqli_query($dbc,$q);
    $row = @mysqli_fetch_array($r, MYSQLI_NUM);
    
    $qtde = $row[0];

    //Calcula o numero de paginas 
    if ($qtde > $exiba) {
      //A função ceil arredonda o valor para cima ex 5.05 é 6.
        $pagina = ceil($qtde / $exiba);
    } else {
      $pagina = 1;
    }
  }

  //Determina uma posição no BD para começar a retornar os resultados
  if (isset($_GET['s']) && is_numeric($_GET['s'])) {
    $inicio = $_GET['s'];
  } else {
    $inicio = 0;
  }

  //Determina a ordenação, por padrão é por ID
  $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'id';

  //Determina a ordem de classificação  dos registros
  switch ($ordem) {
    case 'id' : $order_by = 'id';
    break;
    case 'nome' : $order_by = 'nome';
    break;
      default:
      $order_by = 'id';
      $ordem = 'id';
    break;
  }
  
  $q = "SELECT id,nome, email, cpf, senha
  FROM usuarios
  WHERE nome like '%$where%' 
  ORDER BY $order_by
  LIMIT $inicio, $exiba";
  $r = @mysqli_query($dbc,$q);

  if (@mysqli_num_rows($r)>0){
    $saida ='<div class="table-responsive col-md-12" style="margin-left: 250px;"> 
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="5%"><a href="usuarios.php?ordem=id">Id</a></th>
          <th width="5%"><a href="usuarios.php?ordem=nome">Nome</a></th>
          <th width="5%"><a href="usuarios.php?ordem=cpf">CPF</a></th>
          <th width="5%"><a href="usuarios.php?ordem=email">E-mail</a></th>
          
        </tr>
        </thead>
        <tbody>';                                                                         
                                                                     
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
          $saida .= '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['nome'].'</td>
          <td>'.$row['cpf'].'</td>
          <td>'.$row['email'].'</td>
         
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
      $pag .= '<li class="page-item"><a class="page-link" style="margin-left:260px;"  href="usuarios.php?s=' . ($inicio - $exiba) .
      '&p=' . $pagina . '&ordem' . $ordem . '">Anterior</a></li>';
    }else{
      $pag .= '<li class="page-item disabled"><a class="page-link" style="margin-left:260px;" >Anterior</a></li>';
    }

    //Todas as páginas
    for($i = 1; $i <= $pagina; $i++){
      if($i != $pagina_correta){
        $pag .= '<li class="page-item"><a class="page-link" href="usuarios.php?s=' . ($exiba * ($i -1)) .
        '&p=' . $pagina . '&ordem' . '">' . $i . '</a></li>';
      }else{
        $pag .= '<li class="page-item disabled"><a class="page-link">' . $i . '</a></li>';
      }
    }

    //botao proximo
    if ($pagina_correta != $pagina){
      $pag .= '<li class="page-item next"><a class="page-link" href="usuarios.php?s=' . ($inicio + $exiba) .
      '&p=' . $pagina . '&ordem' . $ordem . '">Proximo</a></li>';
    } else {
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
            <h2>Usuários</h2>
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