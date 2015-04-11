<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>EasyTicket</title>

		<link href="<?php echo base_url("utils/css/bootstrap.min.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/css/style.css") ?>" rel="stylesheet">
		
		<!-- Custom styles for this template -->
		<link href="<?php echo base_url("utils/css/login.css") ?>" rel="stylesheet">


		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="img/favicon.png">

		<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/bootstrap.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/scripts.js") ?>"></script>
		
	</head>

	<body>
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Easy Ticket</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">Alterar Senha</a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="login/sair">Sair</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>

					</nav>
				</div>
			</div>
		</div>
		<div class="container listaEventos">
			<div class="row clearfix">
			<?php 
			foreach ($result as $row) {
				echo 	'<a href="'.base_url('ingresso/listar_ingresso/'.$row->idevento.'').'">';
				echo 	'<div class="col-md-4 column eventos">
							<h4>'.$row->nomeEvento.'</h4>
							<hr />
							<div class="col-md-6">
								<p><span class="glyphicon glyphicon-calendar"> </span> '.$row->data.'</p>
							</div>
							<div class="col-md-6 eventosHorario">
								<p><span class="glyphicon glyphicon-time"> </span> '.$row->horario.'</p>
							</div>
						</div>';
				echo 	'</a>';
			}
			
			?>
				
			</div>
		</div>
	</body>
</html>
