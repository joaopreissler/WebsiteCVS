<?php

 session_start();
include_once("connecting.php");
if((isset($_POST['email'])) && (isset($_POST['password']))){
$usuario = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$senha = md5($password);

$sql = "SELECT * FROM `usuarios` WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
$result = mysqli_query($conn, $sql);
$resultado = mysqli_fetch_assoc($result);

  if(empty($resultado)){
  $_SESSION['loginErro'] = "Usuário ou senha Inválido";
  header("Location: Login.php");
}elseif(isset($resultado)){
  $_SESSION['usuarioId'] = $resultado['id'];
  $_SESSION['usuarionome'] = $resultado['nome'];
  $_SESSION['usuarioniveisacessoid'] = $resultado['niveis_acesso_id'];
  $_SESSION['usuarioEmail'] = $resultado['email'];
  $_SESSION['usuarioSenha'] = $resultado['senha'];
  header("Location: loggedin.php");
}else{
  $_SESSION['loginErro'] = "Usuário ou senha inválido";
  header("Location: Login.php");
}

}else{
  $_SESSION['loginErro'] = "Usuário ou senha inválido";
  header("Location: Login.php");
}

 ?>
