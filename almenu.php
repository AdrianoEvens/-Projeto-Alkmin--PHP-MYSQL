<?php
  
  $titulo = "Projeto Alkmin - Menu de Alimentos";
    
  include_once("cabecalho.php"); 

  require_once("conexao.php");

 
    $exiba = 3;


    $where = mysqli_real_escape_string($dbc, trim(isset($_GET['q'])) ? $_GET['q'] : '');


      if (isset($_GET['p']) && is_numeric($_GET['p'])){
        $pagina = $_GET['p'];
      }else{
        $q ="SELECT COUNT(id) FROM alimentos WHERE nome like '%$where%'";

        $r = @mysqli_query($dbc, $q); 
        $row = @mysqli_fetch_array($r, MYSQLI_NUM);

        $qtde = $row[0];

       
        if ($qtde > $exiba){
          
          $pagina = ceil($qtde / $exiba);
        }else{
          $pagina = 1;
        }
      }


      if (isset($_GET['s']) && is_numeric($_GET['s'])){
        $inicio = $_GET['s'];
      }else{
        $inicio = 0;
      }


      $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : 'id';

     
      switch ($ordem){
        case 'id' : $order_by = 'id';
        break;
        case 'nome' : $order_by = 'nome';
        break;
        case 'estoque' : $order_by = 'estoque';
        break;
        case 'tipo' : $order_by = 'tipo';
        break;
        default:
          $order_by = 'id';
          $ordem = 'id';
        break;
      }

    $q = "SELECT id, nome, estoque, tipo FROM alimentos WHERE nome like '%$where%' 
     ORDER BY $order_by LIMIT $inicio, $exiba";

    $r = @mysqli_query($dbc, $q);

    if (mysqli_num_rows($r) > 0) {
        $saida = '<div class="table-responsive col-md-12" style="margin-left: 250px;">
            <table class="table table_striped">
                <thead>
                    <tr>
                        <th width="15%"><a href="almenu.php?ordem=id">Código</a></th>
                        <th width="25%"><a href="almenu.php?ordem=nome">Nome</a></th>
                        <th width="15%"><a href="almenu.php?ordem=estoque">Estoque</a></th>
                        <th width="20%"><a href="almenu.php?ordem=tipo">Tipo</a></th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>';

                while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
                {
                    $saida .= '<tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['nome'] . '</td>
                    <td>' . $row['estoque'] . '</td>
                    <td>' . $row['tipo'] . '</td>
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
                $saida .= '<tbody></table></div>';
    }else{
      $saida = "<div class='alert alert-warning'>
      Sua pesquisa por <b>$where</b> não encontrou nenhum resultado.<br/>
      <b>Dicas</b><br/>
      - Tente palavras menos específicas<br/>
      - COnfira a ortografia das palavras e se elas estão acentuadas corretamente.<br/></div>";
    }

    if($pagina > 1){
      $pag = '';
      $pagina_correta = ($inicio / $exiba) + 1;

      //botao anterior
      if ($pagina_correta != 1){
        $pag .= '<li class="page-item"><a class="page-link" style="margin-left:260px;" href="almenu.php?s=' . ($inicio - $exiba) .
        '&p=' . $pagina . '&ordem' . $ordem . '">Anterior</a></li>';
      }else{
        $pag .= '<li class="page-item disabled"><a class="page-link" style="margin-left:260px;" >Anterior</a></li>';
      }

      //Todas as páginas
      for($i = 1; $i <= $pagina; $i++){
        if($i != $pagina_correta){
          $pag .= '<li class="page-item"><a class="page-link" href="almenu.php?s=' . ($exiba * ($i -1)) .
          '&p=' . $pagina . '&ordem' . '">' . $i . '</a></li>';
        }else{
          $pag .= '<li class="page-item disabled"><a class="page-link">' . $i . '</a></li>';
        }
      }

      //botao proximo
      if ($pagina_correta != $pagina){
        $pag .= '<li class="page-item next"><a class="page-link" href="almenu.php?s=' . ($inicio + $exiba) .
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
            <h2>Alimentos</h2>
          </div>
          <div class="col-md-6 text-right" style="margin-left: -300px;">
            
          </div>
          <div class="col-md-3 text-right">
            <a href="alimentocad.php" class="btn btn-success">Inserir Alimentos</a>
          </div>
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