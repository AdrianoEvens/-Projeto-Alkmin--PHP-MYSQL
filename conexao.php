
<?php
/** Código que faz a conexão com o banco de dados, informa o ip, o nome do banco, 
 * a senha e o usuário administrador
 */
define('HOST','127.0.0.1');
$usuario = 'root';
$senha = '';
$database = 'projetoalkmin';
$host = 'localhost';


/*Código que verifica se houve erros com a conexão do banco de dados. */

$dbc = new mysqli($host, $usuario, $senha, $database);

if($dbc->error){
    die("Falha ao conectar ao banco de dados" . $dbc->error);
}