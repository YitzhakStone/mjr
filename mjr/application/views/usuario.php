</div>
<div class="col-lg-10  espacoTopo conteudoPrincipal">
	<h3> Usuário </h3>
	<hr />
	<a id="modal-170030" href="#addUsuario" role="button" class="btn btn-success" data-toggle="modal">Adicionar Usuário</a>
	<br />
	<br />
	<div class="modal fade" id="addUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel"> Novo Usuário </h4>
				</div>
				<div class="modal-body">
					<form id="formUsuario" action="<?php echo base_url('usuario/cadastrarUsuario') ?>" method="post" role="form">
						<div id="erroVazio" class="alert alert-warning">
							*Todos os campos são obrigatórios
						</div>
						<div class="form-group">
							<label for="nmusuario">Nome do Usuário</label>
							<input class="form-control" id="nmusuario" name="nmusuario" type="text" />
						</div>
						<div class="form-group">
							<label for="login">Login</label>
							<input class="form-control" id="login" name="login" type="text" />
						</div>
						<div class="form-group">
							<label for="dssenha">Senha</label>
							<input class="form-control" id="dssenha" name="dssenha" type="password" />
						</div>
						<div class="form-group">
							<label for="fgstatus">Status</label>
							<select class="form-control" id="fgstatus" name="fgstatus">
								<option value="A">Ativo</option>
								<option value="B">Bloqueado</option>
							</select>
						</div>
						<div class="form-group">
							<label for="perfil">Perfil</label>
							<select class="form-control" id="perfil" name="perfil">
								<option value="admin">Administrador</option>
								<option value="comum">Comum</option>
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
	<table id="tblUsuarios" class="display" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Status</th>
                <th>Login</th>
                <th>Perfil</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    
		
		<div class="modal fade" id="excluirUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="<?php echo base_url('usuario/excluirUsuario') ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Excluir Usuário
							</h4>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir o usuário <span class="spanNmUsuario"></span>
							<input type="hidden" id="spanIdUsuario" name="idusuario" />
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <button type="submit" class="btn btn-primary">Excluir</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<div class="modal fade" id="alterarUsuario" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form id="" method="post" action="<?php echo base_url('usuario/alterarUsuario') ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Alteração de Usuário
							</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="nomeEvento">Nome do Usuário</label>
								<input class="form-control" id="itpNmUsuario" name="nmusuario" type="text" />
							</div>
							<div class="form-group">
								<label for="data">Status</label>
								<select class="form-control" id="iptFgStatus" name="fgstatus">
									<option title="Ativo" value="A">Ativo</option>
									<option title="Bloqueado" value="B">Bloqueado</option>
								</select>
							</div>
							<div class="form-group">
								<label for="horario">Login</label>
								<input class="form-control" id="iptLogin" name="login" type="text"  />
							</div>
							<div class="form-group">
								<label for="horario">Perfil</label>
								<select class="form-control" id="iptPerfil" name="perfil">
								<option value="admin">Administrador</option>
								<option value="comum">Comum</option>
							</select>
							</div>
							</div>
							<input type="hidden" name="idusuario" id="iptIdUsuario" value="'.$row->idusuario.'" />
							<div class="modal-footer">
								 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
								 <input type="submit" class="btn btn-primary" value="Salvar" />
							</div>
						</div>
					</div>
				</div>
			</form>
			
		</div>
		
    
	<script type="text/javascript" src="<?php echo base_url("utils/js/usuario.js") ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("utils/js/validacao.js") ?>"></script>
</div>
<br />
		<br />
		<br />
</div>
</body>
</html>
