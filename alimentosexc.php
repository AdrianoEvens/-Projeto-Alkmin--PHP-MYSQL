
<?php 

$titulo = "Exclusão- Alimentos";

include_once("cabecalho.php");

if(isset($_GET['id']) && (is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} else if (isset($_POST['id']) && (is_numeric($_POST['id']))) {
    $id = $_POST['id'];
} else {
    header("Location: almenu_php");
    exit();
}

require_once("conexao.php");

if(isset($_POST['enviou'])) {



    //SQL da exclusão 
    $q = "DELETE from alimentos
    WHERE id = $id";

    $r = mysqli_query($dbc,$q);

    if($r) {
        $sucesso= "<h1><b>Sucesso</b></h1>
        <p>Seu registro foi excluído com sucesso!</p>
        <p>Aguarde...Redirecionando!</p>";

        echo "<meta HTTP-EQUIV='refresh' CONTENT ='1; URL=almenu.php'>";
    } else {
        $erro= "<h1><b>Erro no sistema</b></h1>
        <p>Você não pode excluir o registro devido a um erro do sistema.
        Pedimos desculpas por qualquer incoveniente.</p>";
        $erro .= "<p>". mysqli_error($dbc) . "</p>";
    } 
}

//Pesquisa para exibir o registro para exclusão
$q = "SELECT * FROM alimentos WHERE id=$id";
$r = @mysqli_query($dbc, $q);

if(mysqli_num_rows($r)==1) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);


?>
<div class="container-fluid">
  <div class="row">

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between 
      flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Alimentos - Exclusão</h1>
        </div>

        <?php
            if(isset($erro)) 
            echo "<div class='alert alert-danger'>$erro</div>";

            if(isset($sucesso))
            echo "<div class='alert alert-success'>$sucesso</div>"; 
        ?>
        
        <form method="post" action="alimentosexc.php">

        <div vlass="row">
            <div class="col-md-12 text-right">
            <a href="almenu.php" class="btn btn-secondary">
                Fechar sem salvar
            </a>
            <input type="submit"
                class ="btn btn-danger"
                value="Excluir" />

            </div>
            </div>

        <div class ="row">
            <div class="col-md-4 form-group">
                <label>Descrição</label>
                <input type="text" name="nome"
                maxlength="200" class="form-control"
                placeholder="Digite a descrição do alimento"
                value="<?php echo $row['nome'];?>"
                disabled
                />
            </div>
        </div>
            <input type="hidden" name="enviou" value ="true"/>
            <input type="hidden" name="id" value ="<?php echo $row['id'];?>"/>
        </form>
        </div>
    </main>
  </div>
</div>

<?php
}
mysqli_close($dbc);
 ?>