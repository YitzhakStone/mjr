<?php
class Usuario_model extends CI_Model {

	const TABELA = 'usuario';

	function __construct() {
		parent::__construct();
	}

	function listarUsuario(){
		$query = $this->db->get(self::TABELA);
		return $query->result();
	}
	
	function excluirUsuario($idusuario){
		$excluir = $this->db->delete(self::TABELA, array('idusuario' => $idusuario));
		if($excluir)
			return true;
		else 
			return false;
	}
	
	function alterarUsuario($idusuario, $nmusuario, $fgstatus, $login, $perfil){
		$data = array('nmusuario' => $nmusuario, 'fgstatus' => $fgstatus, 'login' => $login, 'perfil' => $perfil);

		$this->db->where('idusuario', $idusuario);
		
		if($this->db->update(self::TABELA, $data))
			return true;
		else
			return false;
	}
	
	function cadastrarUsuario($dssenha, $nmusuario, $fgstatus, $login, $perfil){
		$data = array('nmusuario' => $nmusuario,'dssenha' => $dssenha ,'fgstatus' => $fgstatus, 'login' => $login, 'perfil' => $perfil);
		
		$inserir = $this -> db -> insert(self::TABELA, $data);
		
		if($inserir)
			return true;
		else
			return false;
	}
}
?>