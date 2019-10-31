<?php
session_start();
session_destroy();

unset(
$_SESSION['usuarioId'],
$_SESSION['usuarionome'],
$_SESSION['usuarioniveisacessoid'],
$_SESSION['usuarioEmail'],
$_SESSION['usuarioSenha'],
);

header("Location: Login.php");
 ?>
