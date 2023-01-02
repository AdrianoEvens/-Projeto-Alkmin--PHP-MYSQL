
<?php 

$titulo = "Alteração - Alimentos";

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

    $erros = array();

    //Verifica se há um primeiro nome
    if(empty($_POST['nome'])){
        $erros[] ='Você não digitou seu primeiro nome';
    }else {
        $pn = mysqli_real_escape_string($dbc, trim($_POST['nome']));
    }

    if(empty($_POST['peso'])){
        $erros[] ='Você não digitou o peso';
    }else {
        $peso = mysqli_real_escape_string($dbc, trim($_POST['peso']));
    }

    if(empty($_POST['tipo'])){
        $erros[] ='Você não digitou o tipo';
    }else {
        $tipo = mysqli_real_escape_string($dbc, trim($_POST['tipo']));
    }

    if(empty($_POST['preco'])){
        $erros[] ='Você não digitou o preço';
    }else {
        $preco= mysqli_real_escape_string($dbc, trim($_POST['preco']));
    }

    if(empty($_POST['estoque'])){
        $erros[] ='Você não digitou o estoque';
    }else {
        $estoque= mysqli_real_escape_string($dbc, trim($_POST['estoque']));
    }

    if(empty($erros)) {
    //SQL de alteração 
    $q = "UPDATE alimentos SET nome = '$pn', peso = '$peso', tipo = '$tipo', preco = '$preco', estoque = '$estoque' 
    WHERE id = $id";

    $r = mysqli_query($dbc,$q);

    if($r) {
        $sucesso= "<h1><b>Sucesso</b></h1>
        <p>Seu registro foi alterado com sucesso!</p>
        <p>Aguarde...Redirecionando!</p>";

        echo "<meta HTTP-EQUIV='refresh'CONTENT ='3; URL=almenu.php'>";
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

//Pesquisa para exibir o registro para alteração
$q = "SELECT * FROM alimentos WHERE id=$id";
$r = @mysqli_query($dbc, $q);

if(mysqli_num_rows($r)==1) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);


?>
<div class="container-fluid">
  <div class="row">

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Alimentos - Alteração</h1>
        </div>

        <?php
            if(isset($erro)) 
            echo "<div class='alert alert-danger'>$erro</div>";

            if(isset($sucesso))
            echo "<div class='alert alert-success'>$sucesso</div>"; 
        ?>
        
        <form method="post" action="alimentosalt.php">

        <div vlass="row">
            <div class="col-md-12 text-right">
            <a href="almenu.php" class="btn btn-secondary">
                Fechar sem salvar
            </a>
            <input type="submit"
                class ="btn btn-warning"
                value="Salvar Alteração" />

            </div>
            </div>

        <div class ="row">
            <div class="col-md-4 form-group">
                <label>Descrição</label>
                <input type="text" name="nome"
                maxlength="200" class="form-control"
                placeholder="Digite o primeiro nome"
                value="<?php echo $row['nome'];?>"/>
            </div>
            <div class="col-md-4 form-group">
                <label>Peso</label>
                <input type="text" name="peso"
                maxlength="9" class="form-control"
                placeholder="Digite o peso"
                value="<?php echo $row['peso'];?>"/>
            </div>
            <div class="col-md-4 form-group">
                <label>Tipo</label>
                <input type="text" name="tipo"
                maxlength="11" class="form-control"
                placeholder="Digite o tipo"
                value="<?php echo $row['tipo'];?>"/>
            </div>
            <div class="col-md-4 form-group">
                <label>Preço</label>
                <input type="text" name="preco"
                 class="form-control"
                placeholder="Digite o preço"
                value="<?php echo $row['preco'];?>"/>
            </div>
            <div class="col-md-4 form-group">
                <label>Estoque</label>
                <input type="text" name="estoque"
                maxlength="10" class="form-control"
                placeholder="Digite o estoque"
                value="<?php echo $row['estoque'];?>"/>
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