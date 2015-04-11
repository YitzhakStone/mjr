<?php
class Sede_model extends CI_Model {

	const TABELA = 'sede';
	
	var $idSede;
	var $nomeSede;
	var $enderecoSede;
	var $obsSede;
	var $idLider;


	//construtor
	function __construct($idSede = "", $nomeSede = "", $enderecoSede = "",$obsSede = "",$idLider ="") {
		$this->idSede = $idSede;
		$this->nomeSede = $nomeSede;
		$this->enderecoSede = $enderecoSede;
		$this->obsSede = $obsSede;
		$this->idLider = $idLider;
	}

	//select 
	function listarSedes(){
		//$query = $this->db->get(self::TABELA);
		$this->db->select('sede.*,Jovem.Nome as Jovem_Nome,Jovem.Telefone,Jovem.Celular,Jovem.Email');
		$this->db->from(self::TABELA); 
		$this->db->join('jovem', 'sede.ID_Lider = jovem.ID_Jovem');
		$query = $this->db->get();
		return $query->result();
	}

	function listarSedesID(){
		$this->db->select('ID_Sede,Nome as Nome_Sede');
		$this->db->from(self::TABELA); 
		$query = $this->db->get();
		return $query->result();
	}



	//delete
	function excluirSede(Sede_model $sede){
		if(!empty($sede->idSede)){
			$excluir = $this->db->delete(self::TABELA, array('ID_Sede' => $sede->idSede));
			if($excluir)
				return true;
			else 
			return false;
		}else{
			return false;
		}
		
	}
	
	//update
	function alterarSede(Sede_model $sede){
		if(!empty($sede->idSede) && !empty($sede->nomeSede) && !empty($sede->idLider))
		{
			$data = array(
				'Nome' => $sede->nomeSede, 
				'Endereco' => $sede->enderecoSede,
				'Obs' => $sede->obsSede,
				'ID_Lider' => $sede->idLider
			);

			$this->db->where('ID_Sede', $sede->idSede);
			
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;
		}else{
			return false;
		}
		
	}
	
	//insert
	function cadastrarSede(Sede_model $sede){
		if(!empty($sede->nomeSede)){
				
			$data = array(
				'Nome' => $sede->nomeSede, 
				'Endereco' => $sede->enderecoSede,
				'Obs' => $sede->obsSede,
				'ID_Lider' => $sede->idLider
			);
		
			$inserir = $this->db->insert(self::TABELA, $data);
			
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