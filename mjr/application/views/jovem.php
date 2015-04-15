			<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
  webshims.setOptions('waitReady', false);
  webshims.setOptions('forms-ext', {types: 'date'});
  webshims.polyfill('forms forms-ext');
</script>
			<div class="col-lg-10  espacoTopo conteudoPrincipal">
				<h3>
					Jovens
				</h3>
				<hr />
				<a id="modal-170030" href="#addEvento" role="button" class="btn btn-success" data-toggle="modal">Adicionar Jovem</a>
				<br />
				<br />
				
				<div class="modal fade" id="addEvento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									×
								</button>
								<h4 class="modal-title" id="myModalLabel">Cadastrar Novo Jovem</h4>
							</div>
							<div class="modal-body modalEvento">
								
								
								
								<form id="formJovem" name="formJovem" action="jovem/cadastrarJovem" method="post" role="form">
									<div id="erroVazio" class="alert alert-warning">
										*Todos os campos são obrigatórios
									</div>

									<div class="form-group">
										<label for="categoria">Igreja</label>
										<select id="idsede" name="idsede">

											<?php
											
											foreach ($result as $row) {
												echo '<option value="' . $row -> ID_Sede. '">' . $row -> Nome_Sede. '</option>';
											}
											?>
										
										</div>
									</select>
									<br />
									<br />
									<div class="form-group">
										<label for="nomejovem">Nome do Jovem</label>
										<input class="form-control" id="nomejovem" name="nomejovem" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="datanascjovem">Data de nascimento</label><br />
										<input class="dataEvento" id="datnascjovem" name="datnascjovem" type="date" />
									</div>
									<div class="form-group">
										<label for="nomepai">Nome Do Pai</label>
										<input class="form-control" id="nomepai" name="nomepai" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="nomemae">Nome Da Mãe</label>
										<input class="form-control" id="nomemae" name="nomemae" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="enderecojovem">Endereço</label>
										<input class="form-control" id="enderecojovem" name="enderecojovem" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="telefonejovem">Telefone</label>
										<input class="form-control" id="telefonejovem" name="telefonejovem" type="text" maxlength="15"/>
									</div>
									<div class="form-group">
										<label for="celuluarjovem">Celular</label>
										<input class="form-control" id="celuluarjovem" name="celuluarjovem" type="text" maxlength="15"/>
									</div>
									<div class="form-group">
										<label for="emailjovem">Email</label>
										<input class="form-control" id="emailjovem" name="emailjovem" type="text" maxlength="50"/>
									</div>
									<div class="form-group">
										<label for="rgjovem">Identidade</label>
										<input class="form-control" id="rgjovem" name="rgjovem" type="text" maxlength="15"/>
									</div>
									<!-- <div class="form-group">
										<label for="celuluarjovem">CPF</label>
										<input class="form-control" id="cpfjovem" name="cpfjovem" type="text" maxlength="11" placeholder="somente números"/>
									</div> -->
									<div class="form-group">
										<label for="obsjovem">Informações Adicionais</label>
										<textarea class="form-control" id="obsjovem" name="obsjovem" type="textbox" maxlength="200" placeholder="Informações adicionais sobre o jovem"></textarea>
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
			</div>
					
		<table id="tblJovem" class="display" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Id</th>
	                <th>Nome</th>
	                <th>Endereço</th>
	                <th>Telefone</th>
	                <th>Celular</th>
	                <th>E-mail</th>
	                <th>Anivérsário</th>
	               	<th>Nome Mãe</th>
	                <th>Nome Pai</th>
	                <th>Ação</th>
	                
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
	    
		<div class="modal fade" id="excluirJovem" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="jovem/excluirJovem">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Excluir Jovem
							</h4>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir o Jovem <span class="spanNomeEvento"></span>
						    <input type="hidden" name="ID_Jovem" class="spanIdEvento" />
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <input type="submit" class="btn btn-primary" value="Excluir" />
						</div>
					</div>
					
				</div>
			</form>
		</div>
		



		<div class="modal fade" id="alterarJovem" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="jovem/alterarJovem">
			<input type="hidden" name="ID_Jovem" class="spanIdEvento" />
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Alterar Jovem
							</h4>
						</div>
						<div class="modal-body">
							

							<div class="form-group">
										<label for="categoria">Igreja</label>
										<select id="u_idsede" name="u_idsede">

											<?php
											
											echo '<option title="" value=""></option>';

											foreach ($result as $row) {
												//echo '<option value="' . $row -> ID_Sede . '">' . $row -> Nome . '</option>';
												echo '<option title="'.$row -> Nome_Sede.'" value="' . $row -> ID_Sede . '">' . $row -> Nome_Sede . '</option>';
											}
											?>
										
										</div>
									</select>


							<div class="form-group">
										<label for="nomejovem">Nome do Jovem</label>
										<input class="form-control" id="iptnomejovem" name="iptnomejovem" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="datanascjovem">Data de nascimento</label><br />
										<input class="dataEvento" id="u_datnascjovem" name="u_datnascjovem" type="date" />
									</div>
									<div class="form-group">
										<label for="nomepai">Nome Do Pai</label>
										<input class="form-control" id="u_nomepai" name="u_nomepai" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="nomemae">Nome Da Mãe</label>
										<input class="form-control" id="u_nomemae" name="u_nomemae" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="enderecojovem">Endereço</label>
										<input class="form-control" id="u_enderecojovem" name="u_enderecojovem" type="text" maxlength="100"/>
									</div>
									<div class="form-group">
										<label for="telefonejovem">Telefone</label>
										<input class="form-control" id="u_telefonejovem" name="u_telefonejovem" type="text" maxlength="15"/>
									</div>
									<div class="form-group">
										<label for="celuluarjovem">Celular</label>
										<input class="form-control" id="u_celuluarjovem" name="u_celuluarjovem" type="text" maxlength="15"/>
									</div>
									<div class="form-group">
										<label for="emailjovem">Email</label>
										<input class="form-control" id="u_emailjovem" name="u_emailjovem" type="text" maxlength="50"/>
									</div>
									<div class="form-group">
										<label for="rgjovem">Identidade</label>
										<input class="form-control" id="u_rgjovem" name="u_rgjovem" type="text" maxlength="15"/>
									</div>
								<!-- 	<div class="form-group">
										<label for="celuluarjovem">CPF</label>
										<input class="form-control" id="u_cpfjovem" name="u_cpfjovem" type="text" maxlength="11" placeholder="somente números"/>
									</div> -->
									<div class="form-group">
										<label for="obsjovem">Informações Adicionais</label>
										<textarea class="form-control" id="u_obsjovem" name="u_obsjovem" type="textbox" maxlength="200" placeholder="Informações adicionais sobre o jovem"></textarea>
									</div>
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <input type="submit" class="btn btn-primary" value="Salvar" />
						</div>
					</div>
					
				</div>
			</form>
		</div>

<!-- Ainda não funfa, quando clica pra abir desativa tudo mais ele não aparece -->
		<div class="modal fade" id="cadastrarMinisterio" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Inserir em ministério
							</h4>
						</div>
						<div class="modal-body">
							Selecione o Ministério						    
						</div>
						<div class="modal-body">
										<select id="idminist" name="idminist">

											<?php
											

											foreach ($listaMinisterios as $row) {
											echo '<option value="' . $row -> ID_Minist . '">' . $row -> Nome . '</option>';
											}
											?>
										
										</select>
						</div>
									
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <input type="submit" class="btn btn-primary" value="Cadastrar" />
						</div>
					</div>
					
				</div>
			</form>
		</div>

		<br />
		<br />
		<br />
		</div>
		<script type="text/javascript" src="<?php echo base_url("utils/js/jquery.maskedinput.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/eventos.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/jovem.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
	</body>
</html>
