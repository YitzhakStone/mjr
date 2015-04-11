<?php

class Evento_model extends CI_Model {

	const TABELA = 'evento';
	
	var $idEvento;
	var $tituloEvento; 
	var $dataEvento; 
	var $valorEvento; 
	var $localEvento;
	var $obsEvento;
	

	//construtror - Parei aqui
	function __construct($idEvento = "", $tituloEvento = "", $dataEvento = "", $valorEvento = "",
	 $localEvento = "" , $obsEvento = ""){
		$this->idEvento = $idEvento;
		$this->tituloEvento = $tituloEvento;
		$this->dataEvento = $dataEvento;
		$this->valorEvento =$valorEvento
		$this->localEvento = $localEvento;
		$this->obsEvento = $obsEvento;
	}
	
	
	/* 
	 * Listar Eventos
	 * 
	 * 
	 */
	function listarEventos(){
		$this->db->select('*');
		$this->db->from(self::TABELA);
		$query = $this->db->get();
		return $query->result();
	}
	
	/* 
	 * Cadastrar Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function cadastrarEvento(Evento_model $evento) {
		if(!empty($evento->tituloEvento) && !empty($evento->dataEvento) ){
			
			$data = array(
				'Titulo' => $evento->tituloEvento,
				'Data' => $evento->dataEvento, 
				'valorEvento' => $evento->valorEvento,
				'Local' => $evento->localEvento, 
				'Obs' => $evento->obsEvento
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
	
	/* 
	 * Excluir Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function excluirEvento(Evento_model $evento){
		$excluir = $this->db->delete(self::TABELA, array('idEvento' => $evento->idEvento));
		if($excluir)
			return true;
		else 
			return false;
			
	}
	
	/* 
	 * Alterar Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function alterarEvento(Evento_model $evento){
		if(!empty($evento->tituloEvento) && !empty($evento->dataEvento)){
			$data = array(
               'idevento' => $evento->idevento,               
				'Titulo' => $evento->tituloEvento,
				'Data' => $evento->dataEvento, 
				'valorEvento' => $evento->valorEvento,
				'Local' => $evento->localEvento, 
				'Obs' => $evento->obsEvento
            );
			
		$this->db->where('idevento', $evento->idevento);
		if($this->db->update(self::TABELA, $data))
			return TRUE;
		else
			return FALSE;
		}else{
			return FALSE;
		}
		
		
	}
	
	/* 
	 * Relatório do Ano Corrente
	 * 
	 * Teste = OK
	 */
	
	function relatorioAnoCorrente(){
		$ano = date('Y');
		$arrayRelatorio = array();
		for ($i=1; $i <= 12; $i++) { 
			$query = $this->db->query("SELECT COUNT(*) FROM ticket.evento wHERE year(data) = ".$ano." and month(data) = ".$i.";");
			foreach ($query->result_array() as $row){
			   $arrayRelatorio[$i] = array($row);
			}
		}
		return $arrayRelatorio;
	}
	
	function listarEventosPorId($id){
		$query = $this->db->get_where(self::TABELA , array('idevento' => $id));
		return $query->result();
	}
	
	
}
?>