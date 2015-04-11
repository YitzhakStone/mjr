<?php
class Evento_model extends CI_Model {

	const TABELA = 'evento';
	
	var $idevento;
	var $nomeEvento; 
	var $data; 
	var $horario; 
	var $preco;
	var $fkCategoria;
	
	function __construct($idevento = "", $nomeEvento = "", $data = "", $horarios = "", $preco = "" , $fkCategoria = ""){
		$this->idevento = $idevento;
		$this->nomeEvento = $nomeEvento;
		$this->data = $data;
		$this->horario = $horarios;
		$this->preco = $preco;
		$this->fkCategoria = $fkCategoria;
	}
	
	
	/* 
	 * Listar Eventos
	 * 
	 * Teste = OK
	 */
	function listarEventos(){
		$this->db->select('*');
		$this->db->from(self::TABELA);
		$this->db->join('categoria', 'idcategoria = categoria_idcategoria');

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
		if(!empty($evento->nomeEvento) && !empty($evento->data) && !empty($evento->horario) && !empty($evento->fkCategoria) ){
			
			$data = array('nomeEvento' => $evento->nomeEvento, 'data' => $evento->data, 'horario' => $evento->horario, 'preco' => $evento->preco , 'categoria_idcategoria' => $evento->fkCategoria);

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
		$excluir = $this->db->delete(self::TABELA, array('idevento' => $evento->idevento));
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
		if(!empty($evento->nomeEvento) && !empty($evento->data) && !empty($evento->horario) && !empty($evento->fkCategoria) ){
			$data = array(
               'idevento' => $evento->idevento,
               'nomeEvento' => $evento->nomeEvento,
               'data' => $evento->data,
               'horario' => $evento->horario,
               'preco' => $evento->preco,
               'categoria_idcategoria' => $evento->fkCategoria
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