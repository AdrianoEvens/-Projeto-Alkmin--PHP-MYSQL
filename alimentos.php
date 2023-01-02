<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    


    <?php 
  require_once("conexao.php");

  //Numero de registros para mostar por pagina
  $exiba=3;

  //Captura a busca 
  $where = mysqli_real_escape_string($dbc,trim(isset($_GET['q'])) ? $_GET['q'] : '');

  //Determina a quantidade de páginas
  if (isset($_GET['P']) && is_numeric($_GET['p'])) {
    $pagina = $_GET['p'];
  } else {
    $q = "SELECT COUNT(id) FROM alimentos WHERE nome like '%$where%'";

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
  
  $q = "SELECT id,nome
  FROM alimentos
  WHERE nome like '%$where%' 
  ORDER BY $order_by
  LIMIT $inicio, $exiba";
  $r = @mysqli_query($dbc,$q);

  if (@mysqli_num_rows($r)>0){
    $saida ='<div class="table-responsive col-md-12"> 
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="10%"><a href="almenu.php?ordem=id">Código</a></th>
          <th width="25%"><a href="almenu.php?ordem=nome">Descrição</a></th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>';                                                                         
                                                                     
        while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
        {
          $saida .= '<tr>
          <td>'.$row['id'].'</td>
          <td>'.$row['nome'].'</td>
          <td>
            <a href="alimentosalt.php?id=' . $row['id'] . '"class="btn btn-sm btn-warning"> 
            Alterar
            </a>
            <a href="alimentosexc.php?id=' . $row['id'] . '"class="btn btn-sm btn-danger"> 
            Excluir
            </a>
          </td>
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
    $pagina_correta = ($inicio/$exiba) + 1;

    //botão anterior
    if($pagina_correta != 1) {
      $pag .= '<li class="prior"><a href="almenu.php?s='.($inicio-$exiba).
      '&p='.$pagina.'&ordem=' .$ordem. '">Anterior</a></li>';
    } else {
      $pag .= '<li class="disabled"><a>Anterior</a></li>';
    }
    
    //Todas as paginas
    for ($i=1; $i <= $pagina; $i++){
      if($i != $pagina_correta) {
        $pag .= '<li><a href="almenu.php?s=' . ($exiba*($i-1)).
        '&p=' . $pagina . '&ordem=' . $ordem. '">' .$i. '</a></li>';
      } else {
        $pag .= '<li class ="disabled"><a>' .$i.'</a></li>';
      }
    }
    // Botão Próximo
    if($pagina_correta != $pagina) {
      $pag .= '<li class="next"><a href="almenu.php?s='.($inicio+$exiba).
      '&p='.$pagina.'&ordem=' .$ordem. '">Próximo</a></li>';
    } else {
      $pag .= '<li class="disabled"><a>Próximo</a></li>';
    }

  }
?>
<div class="container-fluid">
  <div class="row">

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
        <div class="row mt-3">


          <div class="col-md-3">
              <h2>Alimentos</h2>
          </div>

          <div class="col-md-6">
          </div>

          <div class="col-md-3 text-right">
              <a href="alimentocad.php" class="btn btn-primary">
              Inserir Alimentos
              </a>

          </div>

        </div>
        
        
        <div class ="row">
          <?php echo $saida; ?>
      </div>

      <div class="row">
        <ul class = "pagination">
          <?php if(isset($pag)) echo $pag; ?>
        </ul>
      </div>

    </main>
  </div>
</div>






      

      <h2>Section title</h2>
      
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
