<?php
class Login_model extends CI_Model{
	
	const TABELA = 'usuario';
  	
	var $login;
	var $senha;
	
  	function __construct($login = "", $senha = ""){
  		 $this->login = $login;
		 $this->senha = $senha;
  	}
  	
	/* 
	 * Login 
	 * 
	 * Orientação a objeto
	 * 
	 * Teste = OK
	 */
  	function verifica_login($login, $senha){
  		
  		if ($query = $this->db->get_where(self::TABELA, array('login' => $login->login , 'dssenha' => $login->senha))) {
  			if($query->num_rows() > 0){
				return $query->result();
			}else{
				return false;
			}
		}else{
			return false;
		}

  	}

  }
?>