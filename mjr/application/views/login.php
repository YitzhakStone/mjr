<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>MRJBH - Cadastro de Jovens - Login</title>
		<link rel="icon" href="<?php echo base_url("utils/img/key.png") ?>" type="image/png">
		<link href="<?php echo base_url("utils/css/bootstrap.min.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/css/style.css") ?>" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url("utils/css/login.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/fonts/stylesheet.css") ?>" rel="stylesheet">


		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">

		<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/bootstrap.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/scripts.js") ?>"></script>
		
		
	</head>

	<body class="bg-login">

		<div class="container">
			<div class="col-lg-4"></div>
			<div class="col-lg-4 login-container">
				<form id="formLogin" action="login/verificaLogin" method="post"class="form-signin" role="form">
					<div id="erroVazio" class="alert alert-warning">
						<span class="glyphicon glyphicon-ban-circle"></span> Todos os campos são obrigatórios
					</div>
					<br />	
					<img src="<?php echo base_url('utils/img/mjrfundo.png'); ?>" />
					<br />	
					<br />	
					<input type="text" id="login" name="login" class="form-control" placeholder="Login"  >
					<input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" >
					<button class="btn btn-lg btn-info btn-block" type="submit">
						<b>
								Entrar
						</b>
					</button>
				</form>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
	</body>
</html>
