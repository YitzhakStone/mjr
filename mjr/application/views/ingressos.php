</div>
<div class="col-lg-10  espacoTopo conteudoPrincipal">
		<div class="col-md-12 column">
			<h3> Ingressos </h3>
			<hr />
	
			<div class="tabbable" id="tabs-815921">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-843329" data-toggle="tab">Efetuar Compra</a>
					</li>
					<li>
						<a href="#panel-388194" data-toggle="tab">Verificar Ingressos Comprados</a>
					</li>
				</ul>
				<div class="tab-content">
					<br />
					<div class="tab-pane active" id="panel-843329">
						<a id="modal-170030" href="#addCliente" role="button" class="btn btn-success" data-toggle="modal">Adicionar Cliente</a>
	<br />
	<br />
	<div class="modal fade" id="addCliente" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel"> Novo Cliente </h4>
				</div>
				<div class="modal-body">
					<form id="formCliente" action="<?php echo base_url('ingressos/cadastrarCliente') ?>" method="post" role="form">
						<div id="erroVazio" class="alert alert-warning">
							*Todos os campos são obrigatórios
						</div>
						<div class="form-group">
							<label for="nmusuario">Nome do Cliente</label>
							<input class="form-control" id="nome" name="nome" type="text" />
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" id="email" name="email" type="text" />
						</div>
						<div class="form-group">
							<label for="nmusuario">CPF</label>
							<input class="form-control" id="cpf" name="cpf" type="text" />
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cancelar
					</button>
					<input type="submit" class="btn btn-primary" value="Salvar" />
				</div>
				</form>
			</div>
		</div>
	</div>
	<table id="tblClientes" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>CPF</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div class="modal fade" id="excluirUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="<?php echo base_url('ingressos/excluirCliente') ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Excluir Cliente </h4>
					</div>
					<div class="modal-body">
						Tem certeza que deseja excluir o usuário <span class="spanNomeCliente"></span>
						<input type="hidden" id="spanIdCliente" name="idcliente" />
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancelar
						</button>
						<button type="submit" class="btn btn-primary">
							Excluir
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<div class="modal fade" id="alterarUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="<?php echo base_url('ingressos/alterarCliente') ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Alteração de Cliente </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nomeEvento">Nome do Cliente</label>
							<input class="form-control" id="iptNomeCliente" name="nome" type="text" />
						</div>
						<div class="form-group">
							<label for="iptEmail">Email</label>
							<input class="form-control" id="iptEmail" name="email" type="text" />
						</div>
						<div class="form-group">
							<label for="nomeEvento">CPF</label>
							<input class="form-control" id="iptCpf" name="cpf" type="text" />
						</div>
						<input id="iptIdCliente" name="idcliente" type="hidden" />
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cancelar
							</button>
							<input type="submit" class="btn btn-primary" value="Salvar" />
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

		<div class="modal fade" id="efetuarCompra" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form id="formCompra" method="post" action="<?php echo base_url('ingressos/comprarIngresso') ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								×
							</button>
							<h4 class="modal-title" id="myModalLabel"> Efetuar Compra </h4>
						</div>
						<div class="modal-body">
							<input class="idClienteFk" name="cliente_idcliente" type="hidden" />
							<div id="erroQuantidade" class="alert alert-warning">
								* Quantidade não pode ser menor ou igual a zero.
							</div>
							<label for="Evento"> Evento </label>
							<select class="form-control" id="nmevento" name="nmevento">
								<?php
								foreach ($eventos as $row) {
									echo '
											<option value="' . $row -> idevento . '">' . $row -> nomeEvento . '</option>
										';
									}
								?>
							</select>
							<br />
							<div class="respostaAjax">
								<label for="Evento"> Valor </label>
								<input type="hidden" class="precos" name="valor" />
								<input type="hidden" class="evento_idevento" name="idevento" />
								<input type="text" disabled="" class="precos" name="precos" disabled="" />
								<br />
								<label for="Evento"> Quantidade </label>
								<input type="number" id="quantidade" name="quantidade" />
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cancelar
							</button>
							<button type="submit" class="btn btn-primary">
								Comprar
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
					</div>
					<div class="tab-pane" id="panel-388194">
						<br />
						<table id="tblIngressosComprados" class="display" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Valor total da compra</th>
									<th>Quantidade</th>
									<th>Nome do Evento</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
		<br />
	</div>
	
<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.maskedinput.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("utils/js/ingressos.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
</div>

</div>
</body>
</html>
