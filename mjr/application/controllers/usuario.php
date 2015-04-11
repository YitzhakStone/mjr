<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('logged_in')){
			$this->sessaoUsuario = $this->session->userdata('logged_in');
			if($this->sessaoUsuario['perfil'] != 'admin'){
				redirect('login');
			}	
		}else{
			redirect('login');
		}
	}
	
	public function index()
	{
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('usuario');
	}
	
	/* 
	 * Listar Usuários
	 * 
	 * Teste = OK
	 */
	function listar_usuarios(){
		$this -> load -> model('usuario_model');
		$usuarios = $this->usuario_model->listarUsuario();
		
		$usuarioArray = array();
		
		foreach ($usuarios as $usuario){
			if($usuario->fgstatus == "A")	
				$usuario->fgstatus = "Ativo";
			else 
				$usuario->fgstatus = "Bloqueado";
			array_push($usuarioArray, $usuario);
		}
			
		
		echo json_encode(array("data" => $usuarioArray));
	}
	
	/* 
	 * Excluir Usuário
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function excluirUsuario(){
		$this -> load -> model('usuario_model');
		$idusuario = mysql_real_escape_string($_POST ["idusuario"]);
		
		$usuario = new Usuario_model($idusuario, null, null, null, null, null);
		
		$excluir = $this -> usuario_model -> excluirUsuario($usuario);
		if($excluir){
			redirect('usuario');
		}else{
			echo utf8_decode("<script>
									alert('ERRO');
									location.href='".base_url('usuario')."';	
							</script>");
		}
	}
	
	/* 
	 * Alterar Usuário
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function alterarUsuario(){
		$this -> load -> model('usuario_model');
		
		$idusuario = mysql_real_escape_string($_POST ["idusuario"]);
		$nmusuario = mysql_real_escape_string($_POST ["nmusuario"]);
		$fgstatus = mysql_real_escape_string($_POST ["fgstatus"]);
		$login = mysql_real_escape_string($_POST ["login"]);
		$perfil = mysql_real_escape_string($_POST ["perfil"]);
		
		$usuario = new Usuario_model($idusuario, $nmusuario , null , $fgstatus, $login, $perfil);
		
		$alterar = $this->usuario_model->alterarUsuario($usuario);
		
		if($alterar){
			redirect('usuario');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('usuario')."';	
							</script>");
		}
	}
	
	/* 
	 * Cadastrar Usuário
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function cadastrarUsuario(){
		$this -> load -> model('usuario_model');
		
		$nmusuario = mysql_real_escape_string($_POST ["nmusuario"]);
		$fgstatus = mysql_real_escape_string($_POST ["fgstatus"]);
		$dssenha = md5(mysql_real_escape_string($_POST ["dssenha"]));
		$login = mysql_real_escape_string($_POST ["login"]);
		$perfil = mysql_real_escape_string($_POST ["perfil"]);
		
		$usuario = new Usuario_model(null, $nmusuario , $dssenha , $fgstatus, $login, $perfil);
		
		$cadastrar = $this->usuario_model->cadastrarUsuario($usuario);
		
		if($cadastrar){
			redirect('usuario');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('usuario')."';	
							</script>");
		}
	}
	
}
