<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>MJR - Cadastro de Jovens</title>
		<link rel="icon" href="<?php echo base_url("utils/img/icone.jpg") ?>" type="image/jpg">

		<link href="<?php echo base_url("utils/css/bootstrap.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/css/style.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/css/jquery.datatables.css") ?>" rel="stylesheet">
		<link href="<?php echo base_url("utils/fonts/stylesheet.css") ?>" rel="stylesheet">		
		<link href="<?php echo base_url("utils/css/login.css") ?>" rel="stylesheet">


		<link href="<?php echo base_url("utils/css/dataTables.tableTools.css") ?>" rel="stylesheet">

		<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/bootstrap.min.js") ?>"></script>		
		<script type="text/javascript" src="<?php echo base_url("utils/js/jquery-1.11.1.min.js") ?>"></script>
	 	<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.dataTables.min.js") ?>"></script>
	 	<script type="text/javascript" src="<?php echo base_url("utils/js/dataTables.tableTools.js") ?>"></script>
	 	
	 	<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	 	<script type="text/javascript" src="http://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>  -->
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
							<a class="navbar-brand" href="#">
								<img class="img-responsive" src="<?php echo base_url('utils/img/logoMjrTopo.png'); ?>" />
							</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="marginLabel">
									<div class="label label-info">Seja Bem-vindo <?php echo $nmusuario ?></div>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções <strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<?php 
										if($perfil == "admin"){
											echo 	'
													<li>
														<a href="usuario">Cadastrar Usuário</a>
													</li>
													';
										}
										?>
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
		<div class="col-lg-12">
			<div class="col-lg-2 espacoTopo menuLateral">
				<div class="col-lg-12">


					<a href="jovem">
						<div class="link-telas">
							Jovens
						</div>
					</a>
					<a href="sede">
						<div class="link-telas">
							Igrejas
						</div>
					</a>
					<a href="ministerio">
						<div class="link-telas">
							Ministérios
						</div>
					</a>		
					<a href="">
						<div class="link-telas">
						</div>
					</a>
					<a href="eventos">
						<div class="link-telas">
							Eventos - Desativar
						</div>
					</a>
					<a href="ingressos">
						<div class="link-telas">
							Vendas - Desativar
						</div>
					</a>


					<a href="painel">
						<div class="link-telas">
							Relatórios - Desativar
						</div>
					</a>
					
				</div>
			</div>