<?php session_start();
$_SESSION['message'] = '';
$mysqli = new mysqli('localhost', 'root', '1234', 'cvsconsultoria');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//two passwords match
  if($_POST['password'] == $_POST['password_confirm']){
$username = $mysqli->real_escape_string($_POST['username']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);
$password = md5($password);
$avatar_path = $mysqli->real_escape_string('image/'.$_FILES['avatar']['name']);

//make sure file type is imagearc
if (preg_match("!image!", $_FILES['avatar']['type'])){
//copy image to image/folder
if(copy($_FILES['avatar']['tmp_name'], $avatar_path)){
  $_SESSION['username'] = $username;
  $_SESSION['avatar'] = $avatar_path;
  $sql = "INSERT INTO (nome, email, senha, avatar)"
  . "VALUES ('$username', '$email','$password','$avatar_path')";
  //if the query is successful, redirect to Login.php
  if($mysqli->query($sql) === true){
    $_SESSION['message'] = 'Registro feito com Sucesso!';
    header("Location: Login.php");
  }
  else{
    $_SESSION['message'] = "Não foi possível adicionar o nome. Tente outra vez";
  }
}
else{
  $_SESSION['message'] = "Falha no envio da foto! ";
}
}
else{
  $_SESSION['message'] = "Por favor utilize fotos GIF, JPG ou PNG.";
}
}
else{
  $_SESSION['message'] = "As senhas nao sao iguais";
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Registration</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">
      <img src="css/law.png" width="30" height="30" class="d-inline-block align-top" alt="">
      CVS Consultoria
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Login.php">Entrar</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Registration.php">Criar Conta <span class="sr-only">(current)</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Premium</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </nav>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<article>
  <div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
</article>
<div id="page-content">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-7">
        <h1 class="font-weight-light mt-4 text-white">Sticky Footer using Flexbox</h1>
        <p class="lead text-white-50">Use just two Bootstrap 4 utility classes and three custom CSS rules and you will have a flexbox enabled sticky footer for your website!</p>
      </div>
    </div>
  </div>
</div>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
  <div class="container text-center">
    <small>Copyright &copy; Your Website</small>
  </div>
</footer>
  </body>
</html>
