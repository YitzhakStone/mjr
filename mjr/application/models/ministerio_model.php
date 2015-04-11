<?php
class Ministerio_model extends CI_Model {

	const TABELA = 'ministerio';
	
	var $idMinisterio;
	var $nomeMinisterio;
	var $idLider;

	//construtor
	function __construct($idMinisterio = "", $nomeMinisterio = "", $idLider = "") {
		$this->idMinisterio = $idMinisterio;
		$this->nomeMinisterio = $nomeMinisterio;
		$this->idLider = $idLider;

	}

	//select
	function listarMinisterios(){
		$this->db->select('ministerio.*,Jovem.Nome as Jovem_Nome,Jovem.Telefone,Jovem.Celular,Jovem.Email');
		$this->db->from(self::TABELA); 
		$this->db->join('jovem', 'ministerio.ID_Lider = jovem.ID_Jovem');
		$query = $this->db->get();
		return $query->result();
	}

	//delete
	function excluirMinisterio(Ministerio_model $ministerio){
		if(!empty($ministerio->idMinisterio)){
			$excluir = $this->db->delete(self::TABELA, array('ID_Minist' => $ministerio->idMinisterio));
			if($excluir)
				return true;
			else 
			return false;
		}else{
			return false;
		}
		
	}
	
	//update
	function alterarMinisterio(Ministerio_model $ministerio){
		if(!empty($ministerio->nomeMinisterio) && !empty($ministerio->idLider))
		{
			$data = array(
				'Nome' => $ministerio->nomeMinisterio, 
				'ID_Lider' => $ministerio->idLider
			);

			$this->db->where('ID_Minist', $ministerio->idMinisterio);
			
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;
		}else{
			return false;
		}
		
	}
	
	//insert
	function cadastrarMinisterio(Ministerio_model $ministerio){
		if(!empty($ministerio->nomeMinisterio) && !empty($ministerio->idLider)){
				
			$data = array(
				'Nome' => $ministerio->nomeMinisterio,
				'ID_Lider' => $ministerio->idLider
				);
		
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