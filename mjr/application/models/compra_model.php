<?php
class Compra_model extends CI_Model {

	const TABELA = 'compra';
	
	var $idcompra;
	var $protocolo; 
	var $quantidade; 
	var $valor_total; 
	var $cliente_idcliente;
	var $evento_idevento;
	
	function __construct($idcompra = "", $protocolo = "", $quantidade = "", $valor_total ="", $cliente_idcliente ="", $evento_idevento =""){
		$this->idcompra = $idcompra;
		$this->protocolo = $protocolo;
		$this->quantidade = $quantidade;
		$this->valor_total = $valor_total;
		$this->cliente_idcliente = $cliente_idcliente;
		$this->evento_idevento = $evento_idevento;
	}
	
	function cadastrarCompra(Compra_model $compra) {
		$data = array('protocolo' => $compra->protocolo, 'quantidade' => $compra->quantidade, 
						'valor_total' => $compra->valor_total, 'cliente_idcliente' => $compra->cliente_idcliente, 
						'evento_idevento' => $compra->evento_idevento);

		$inserir = $this -> db -> insert(self::TABELA, $data);
		if($inserir)
			return true;
		else
			return false;
		
	}
	
	function buscarIngressosComprados(){
		$query = $this->db->query('SELECT cl.nome, cl.cpf, com.quantidade, com.valor_total, e.nomeEvento
							FROM cliente cl , compra com, evento e
							WHERE cl.idcliente = com.cliente_idcliente
							and e.idevento = com.evento_idevento');
		
		return $query->result();
	}
	
	function excluirIngressoId($idcliente){
		$excluir = $this->db->delete(self::TABELA, array('cliente_idcliente' => $idcliente));
	}
}
?>