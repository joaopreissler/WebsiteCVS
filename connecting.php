<?php
$servidor = "localhost";
$usuario = "root";
$senha = "1234";
$dbname = "cvsconsultoria";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){

  die("Falha na Conexao: " . mysqli_connect_error());
}else{

}



 ?>
