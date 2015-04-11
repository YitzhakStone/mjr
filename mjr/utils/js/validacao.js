$(document).ready(function() {
	
	$('#erroVazio').hide();
	$('#erroQuantidade').hide();
	
	$('#formLogin').submit(function(){
		var login = $('#login').val();
		var senha = $('#senha').val();
		if(login == "" || senha == ""){
			$('#erroVazio').show('slow');
			return false;
		}else{
			return true;
		}
	});
	
	$('#formEvento').submit(function(){
		var nomeEvento = $('#nomeEvento').val();
		var data = $('#data').val();
		var horario = $('#horario').val();
		var preco = $('#preco').val();
		if(nomeEvento == "" || data == "" || horario == "" || preco == ""){
			$('#erroVazio').show('slow');
			return false;
		}else{
			return true;
		}
	});

	$('#formJovem').submit(function(){
		var nomejovem = $('#nomejovem').val();
		if(nomejovem == ""){
			$('#erroVazio').show('slow');
			return false;
		}else{
			return true;
		}
	});


	
	$('#formCliente').submit(function(){
		var nome = $('#nome').val();
		var email = $('#email').val();
		var cpf = $('#cpf').val();
		if(nome == "" || email == "" || cpf == ""){
			$('#erroVazio').show('slow');
			return false;
		}else{
			return true;
		}
	});
	
	$('#formUsuario').submit(function(){
		var nmusuario = $('#nmusuario').val();
		var login = $('#login').val();
		var dssenha = $('#dssenha').val();
		if(nmusuario == "" || login == "" || dssenha == ""){
			$('#erroVazio').show('slow');
			return false;
		}else{
			return true;
		}
	});
	
	$('#formCompra').submit(function(){
		var quantidade = $('#quantidade').val();
		if(quantidade <= 0){
			$('#erroQuantidade').show('slow');
			return false;
		}else{
			return true;
		}
	});
});

