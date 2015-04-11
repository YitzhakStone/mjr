<?php
class Usuario_model extends CI_Model {

	const TABELA = 'usuario';
	
	var $idusuario;
	var $nmusuario;
	var $dssenha;
	var $fgstatus;
	var $login;
	var $perfil;

	function __construct($idusuario = "", $nmusuario = "", $dssenha = "", $fgstatus = "", $login = "", $perfil = "") {
		$this->idusuario = $idusuario;
		$this->nmusuario = $nmusuario;
		$this->dssenha = $dssenha;
		$this->fgstatus = $fgstatus;
		$this->login = $login;
		$this->perfil = $perfil;
	}

	function listarUsuario(){
		$query = $this->db->get(self::TABELA);
		return $query->result();
	}
	
	function excluirUsuario(Usuario_model $usuario){
		if(!empty($usuario->idusuario)){
			$excluir = $this->db->delete(self::TABELA, array('idusuario' => $usuario->idusuario));
			if($excluir)
				return true;
			else 
			return false;
		}else{
			return false;
		}
		
	}
	
	function alterarUsuario(Usuario_model $usuario){
		if(!empty($usuario->nmusuario) && !empty($usuario->fgstatus) && !empty($usuario->login) && !empty($usuario->perfil)){
			$data = array('nmusuario' => $usuario->nmusuario, 'fgstatus' => $usuario->fgstatus, 'login' => $usuario->login, 'perfil' => $usuario->perfil);

			$this->db->where('idusuario', $usuario->idusuario);
			
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;
		}else{
			return false;
		}
		
	}
	
	function cadastrarUsuario(Usuario_model $usuario){
		if(!empty($usuario->nmusuario) && !empty($usuario->fgstatus) && !empty($usuario->login) && !empty($usuario->perfil)){
				
			$data = array('nmusuario' => $usuario->nmusuario,'dssenha' => $usuario->dssenha ,'fgstatus' => $usuario->fgstatus, 
							'login' => $usuario->login, 'perfil' => $usuario->perfil);
		
			$inserir = $this -> db -> insert(self::TABELA, $data);
			
			if($inserir)
				return true;
			else
				return false;
		}else{
			return false;
		}
	}
}
?>