<?php
class Categorias_model extends CI_Model{
	
	const TABELA = 'categoria';
  	
  	function __construct(){
  		parent::__construct();  		
  	}
  	
  	function listarCategorias(){
  		$query = $this->db->get(self::TABELA);
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
  	}
	
	function inserirCategorias($nomeCategoria){
		if(!empty($nomeCategoria)){
			$data = array('nomeCategoria' => $nomeCategoria);
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