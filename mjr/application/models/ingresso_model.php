<?php
class Ingresso_model extends CI_Model {

	const TABELA = 'ingresso';
	
	var $idingresso;
	var $numeroIngresso;
	var $compra_idcompra;
	var $evento_idevento;

	function __construct($idingresso = "", $numeroIngresso = "", $compra_idcompra = "", $evento_idevento = "") {
		$this->idingresso = $idingresso;
		$this->numeroIngresso = $numeroIngresso;
		$this->compra_idcompra = $compra_idcompra;
		$this->evento_idevento = $evento_idevento;
	}

	function cadastrarCliente(Ingresso_model $ingresso){
		if(!empty($ingresso->numeroIngresso) && !empty($ingresso->compra_idcompra)){
				
			$data = array('numeroIngresso' => $ingresso->numeroIngresso, 'compra_idcompra' => $ingresso->compra_idcompra, 'evento_idevento' => $ingresso->evento_idevento);
		
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