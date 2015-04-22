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
		$this->db->select('ministerio.*,jovem.Nome as Jovem_Nome,jovem.Telefone,jovem.Celular,jovem.Email');
		$this->db->from(self::TABELA); 
		$this->db->join('jovem', 'ministerio.ID_Lider = jovem.ID_Jovem');
		$query = $this->db->get();
		return $query->result();
	}

	function listarMinisteriosSimples(){
		$this->db->select('*');
		$this->db->from(self::TABELA);
		$query = $this->db->get();
		return $query->result();
	}


	function listarJovensMinisterios($idMinist){
		$this->db->select('ministerio.*,jovem.ID_Jovem, jovem.Nome as Jovem_Nome,jovem.Telefone,jovem.Celular,jovem.Email');
		//$this->db->select('ministerio.ID_Minist, ministerio.nome as Minist_Nome, jovem.Nome as Jovem_Nome');
		$this->db->from(self::TABELA); 
		$this->db->join('jovemministerio', 'ministerio.ID_Minist = jovemministerio.ID_Minist');
		$this->db->join('jovem', 'jovemministerio.ID_Jovem = jovem.ID_Jovem');
		//$this->db->where('ID_Minist', $ministerio->idMinisterio);
		$this->db->where('ministerio.ID_Minist', $idMinist);

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