
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: POST, GET , DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Allow-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');

require_once("conexao.php");

$data = array();
$q = "SELECT * FROM alimentos ORDER BY id";

$r = @mysqli_query($dbc, $q);

while ($row = mysqli_fetch_object($r)) {
    $data[] = $row;
}

echo json_encode($data);


?>