<?php

require_once("conexao.php");


if(isset($_POST['enviou'])){

    $erros = array();

if(empty($_POST['nome'])){
    $erros[] = 'Você não digitou seu nome';
} else {
    $nome = mysqli_real_escape_string($dbc, trim($_POST['nome']));
}

if(empty($_POST['cpf'])){

    $erros[] = 'Você não digitou seu CPF';
} else {
    $cpf = mysqli_real_escape_string($dbc, trim($_POST['cpf']));
}

if(empty($_POST['email'])){
    $erros[] = 'Você não digitou seu E-mail';
} else {
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
}

if(empty($_POST['senha'])){
    $erros[] = 'Você não digitou sua senha';
} else {
    $senha = mysqli_real_escape_string($dbc, trim($_POST['senha']));
}

if(isset($_FILES['foto'])){

    $extensao = strtolower(substr($_FILES['foto']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../fotos_usuarios/";
    move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio . $novo_nome);
    
  
  } 

if(empty($erros)){
   
    $ins = "INSERT INTO usuarios (nome, cpf, email, senha, foto) VALUES ('$nome', '$cpf', '$email', '$senha', '$novo_nome')";

    $r = mysqli_query($dbc,$ins);

    if($r) {
        $sucesso= "<h1><b>Sucesso</b></h1>
        <p>Seu registro foi incluido com sucesso!</p>
        <p>Aguarde...Redirecionando!</p>";
    
        echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=login.php'>";
    } else {
        $erro= "<h1><b>Erro no sistema</b></h1>
        <p>Você não pode ser redirecionado devido a um erro do sistema.
        Pedimos desculpas por qualquer incoveniente</p>";
        $erro .= "<p>". mysqli_error($dbc) . "</p>";
    }  } else {
        $erro="<h1><b>Erro(s)!</b></h1>
        <p>Ocorreram o(s) seguinte(s) erro(s): <br />";
        foreach ($erros as $msg) {
            $erro .= "- $msg <br/>";
        }
        $erro .= "<p>Por favor, tente novamente.</p>";
    
    
    } 

}

?>

<?php
     if(isset($erro)) 
        echo "<div class='alert alert-danger'>$erro</div>";

    if(isset($sucesso))
         echo "<div class='alert alert-success'>$sucesso</div>"; 
?>