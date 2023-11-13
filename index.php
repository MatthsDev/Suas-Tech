<?php 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>


	<title>TechSUAS - login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="cadunico/css/login.css">
	<link rel="shortcut icon" href="cadunico/img/logo.png" type="image/x-icon">
	<link rel="icon" href="" type="image/x-icon">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
	

	<div class="login-form">
		<form action="cadunico/config/autenticar.php" method="post">
			<div class="logo">
				<img src="cadunico/img/logo1.png" alt="TECHSUAS">
			</div>
			<h2 class="text-center">
				Acessar Sistema
			</h2>
			<div class="form-group">
				<input class="form-control" type="text" name="usuario" placeholder="Usuario" required>
			</div>

			<div class="form-group">
				<input class="form-control" type="password" name="senha" placeholder="Senha" required>
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-login">LOGIN</button>	
			</div>

			<div class="clearfix">
				<label class="float-left checkbox-inline">
					<input type="checkbox">
					Lembrar-me
				</label>
				<a data-toggle="modal" data-target="#modal-senha" class="float-right">Recuperar Senha</a>
			</div>
		</form>
		<div class="rodape" type="text">
			Sistema desenvolvido por DDV &trade;
		</div>
	</div>

</body>
</html>