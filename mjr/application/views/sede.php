</div>
<div class="col-lg-10  espacoTopo conteudoPrincipal">
		<div class="col-md-12 column">
			<h3> Igrejas</h3>
			<hr />
	
			<div class="tabbable" id="tabs-815921">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-843329" data-toggle="tab">Lista de Igrejas</a>
					</li>
					<li>
						<a href="#panel-388194" data-toggle="tab">Contato dos Lideres</a>
					</li>
				</ul>
				<div class="tab-content">
					<br />
					<div class="tab-pane active" id="panel-843329">
						<a id="modal-170030" href="#addIgreja" role="button" class="btn btn-success" data-toggle="modal">Adicionar Igreja</a>
	<br />
	<br />



	<div class="modal fade" id="addIgreja" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel"> Nova Igreja </h4>
				</div>
				<div class="modal-body">
					<form id="formCliente" action="sede/cadastrar_sede" method="post" role="form">
						<div id="erroVazio" class="alert alert-warning">
							*Todos os campos são obrigatórios
						</div>
						<div class="form-group">
							<label for="nmusuario">Nome Igreja</label>
							<input class="form-control" id="nome" name="nome" type="text" />
						</div>
						<div class="form-group">
							<label for="email">Endereço</label>
							<input class="form-control" id="endereco" name="endereco" type="text" />
						</div>


						<div class="form-group">
										<label for="idlider">Lider</label>
										<select id="idlider" name="idlider">

											<?php
											
											foreach ($jovens as $row) {
												echo '<option value="' . $row -> ID_Jovem . '">' . $row -> Nome_Jovem . '</option>';
											}
											?>
										</select>
						</div>
									

						<div class="form-group">
							<label for="nmusuario">Observações</label>
							<textarea class="form-control" id="obs" name="obs" type="text"></textarea>
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
	<table id="tblIgrejas" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Lider</th>				
				<th>Observações</th>
				<th>Ações</th>

			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div class="modal fade" id="excluirSede" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="sede/excluirSede">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Excluir Igreja </h4>
					</div>
					<div class="modal-body">
						Tem certeza que deseja excluir a Igreja <span class="spanNomeSede"></span>
						<input type="hidden" id="spanIdSede" name="idsede" />
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

	<div class="modal fade" id="alterarSede" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="sede/alterarSede">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Alteração de Igreja </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nmusuario">Nome Igreja</label>
							<input class="form-control" id="iptnome" name="iptnome" type="text" />
						</div>
						<div class="form-group">
							<label for="email">Endereço</label>
							<input class="form-control" id="iptendereco" name="iptendereco" type="text" />
						</div>


						<div class="form-group">
										<label for="iptidlider">Lider</label>
										<select id="iptidlider" name="iptidlider">

											<?php
											
											foreach ($jovens as $row) {
												//echo '<option value="' . $row -> ID_Jovem . '">' . $row -> Nome_Jovem . '</option>';
												echo '<option title="'.$row -> Nome_Jovem.'" value="' . $row -> ID_Jovem . '">' . $row -> Nome_Jovem . '</option>';
											}
											?>
										</select>
						</div>								

						<div class="form-group">
							<label for="nmusuario">Observações</label>
							<textarea class="form-control" id="iptobs" name="iptobs" type="text"></textarea>
						</div>

						<input id="iptidSede" name="iptidSede" type="hidden" />
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
						<table id="tblContatoLideres" class="display" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>Igreja</th>
									<th>Lider</th>
									<th>Telefone</th>
									<th>Celular</th>
									<th>Email</th>
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
<script type="text/javascript" src="<?php echo base_url("utils/js/sede.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
</div>

</div>
</body>
</html>
