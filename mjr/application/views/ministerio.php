</div>
<div class="col-lg-10  espacoTopo conteudoPrincipal">
		<div class="col-md-12 column">
			<h3> Ministérios</h3>
			<hr />
	
			<div class="tabbable" id="tabs-815921">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-843329" data-toggle="tab">Lista de Ministérios</a>
					</li>
					<li>
						<a href="#panel-388194" data-toggle="tab">Falta implementar</a>
					</li>
				</ul>
				<div class="tab-content">
					<br />
					<div class="tab-pane active" id="panel-843329">
						<a id="modal-170030" href="#addMinisterio" role="button" class="btn btn-success" data-toggle="modal">Adicionar Ministério</a>
	<br />
	<br />



	<div class="modal fade" id="addMinisterio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel"> Novo Ministério </h4>
				</div>
				<div class="modal-body">
					<form id="formCliente" action="ministerio/cadastrar_ministerio" method="post" role="form">
						<div id="erroVazio" class="alert alert-warning">
							*Todos os campos são obrigatórios
						</div>
						<div class="form-group">
							<label for="nmusuario">Nome Ministério</label>
							<input class="form-control" id="nome" name="nome" type="text" />
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
	<table id="tblMinisterios" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Lider</th>
				<th>Telefone Lider</th>				
				<th>Celular Lider</th>
				<th>Email Lider</th>
				<th>Ações</th>

			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<div class="modal fade" id="excluirMinisterio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="ministerio/excluir_ministerio">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Excluir Ministério </h4>
					</div>
					<div class="modal-body">
						Tem certeza que deseja excluir o Ministério <span class="spanNomeMinisterio"></span>
						<input type="hidden" id="spanIDMinisterio" name="idministerio" />
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

	<div class="modal fade" id="alteraMinisterio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="post" action="ministerio/alterarministerio">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							×
						</button>
						<h4 class="modal-title" id="myModalLabel"> Alteração de Ministerio </h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="nmusuario">Nome Ministério</label>
							<input class="form-control" id="iptnome" name="iptnome" type="text" />
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

						<input id="iptidMinisterio" name="iptidMinisterio" type="hidden" />
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
<script type="text/javascript" src="<?php echo base_url("utils/js/ministerio.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
</div>

</div>
</body>
</html>
