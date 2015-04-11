<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {

	function __construct() {
		parent::__construct();

		if ($this -> session -> userdata('logged_in')) {
			$this -> sessaoUsuario = $this -> session -> userdata('logged_in');
		} else {
			redirect('login');
		}
	}

	public function index() {
		$result['result'] = $this -> listarCategorias();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this -> load -> view('eventos', $result);
	}
	
	/* 
	 * Listar Categorias
	 * 
	 * Teste = OK
	 */
	function listarCategorias() {
		$this -> load -> model('categorias_model');
		$result = $this -> categorias_model -> listarCategorias();

		return $result;
	}
	
	/* 
	 * Listar Eventos
	 * 
	 * Teste = OK
	 */
	function listar_eventos(){
		$this -> load -> model('evento_model');
		$eventos = $this->evento_model->listarEventos();
		
		$eventoArray = array();
		
		foreach ($eventos as $evento){
			$evento->data = date("d/m/Y", strtotime($evento->data));
			array_push($eventoArray, $evento);
		}
		
		echo json_encode(array("data" => $eventoArray));	
	}
	
	
	/* 
	 * Cadastrar Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function cadastrarEvento(){

		$this->load->model('evento_model');		
		$nomeEvento = mysql_real_escape_string($_POST ["nomeEvento"]);
		
		$data = mysql_real_escape_string($_POST ["data"]);
		$horario = mysql_real_escape_string($_POST ["horario"]);
		$preco = mysql_real_escape_string($_POST ["preco"]);
		
		$preco = str_replace("," , "." , $preco);
		
		$fkCategoria = mysql_real_escape_string($_POST ["fk_categoria"]);
		
		$data = date("Y-m-d", strtotime($data));
		
		$evento_model = new Evento_model(null, $nomeEvento, $data, $horario, $preco, $fkCategoria);
		
		$cadastrar = $this->evento_model->cadastrarEvento($evento_model);
		
		if($cadastrar){
				redirect('eventos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('eventos')."';	
							</script>");
			
		}
	}
	
	/* 
	 * Alterar Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function alterarEvento(){
		$this->load->model('evento_model');
		
		$idevento = mysql_real_escape_string($_POST ["idevento"]);
		$nomeEvento = mysql_real_escape_string($_POST ["nomeEvento"]);
		$data = mysql_real_escape_string($_POST ["data"]);
		$preco = mysql_real_escape_string($_POST ["preco"]);
		$horario = mysql_real_escape_string($_POST ["horario"]);
		$fkCategoria = mysql_real_escape_string($_POST ["fk_categoria"]);
		
		$data = date("Y-m-d", strtotime($data));
		
		$preco = str_replace("," , "." , $preco);
		
		$evento_model = new Evento_model($idevento, $nomeEvento, $data, $horario,$preco , $fkCategoria);
		
		$alterar = $this->evento_model->alterarEvento($evento_model);
		
		if($alterar){
			redirect('eventos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('eventos')."';	
							</script>");
		}
	}
	
	
	/* 
	 * Excluir Evento
	 * Orientação a objeto = OK
	 * 
	 * Teste = OK
	 */
	function excluirEvento(){
		$this->load->model('evento_model');
		
		$idevento = mysql_real_escape_string($_POST ["idevento"]);
		
		$evento_model = new Evento_model($idevento, null, null, null,null , null);
		
		$excluir = $this->evento_model->excluirEvento($evento_model);
		
		if($excluir){
			redirect('eventos');
		}else{
			echo "<script> alert('ERRO')</scritp>";
		}
	}
	
	/* 
	 * Excluir Evento
	 * 
	 * TODO: Criar Controller Separado
	 * Orientação a objeto = Não
	 * 
	 * Teste = Não
	 */
	function inserirCategorias(){
		$nomeCategoria = $_POST ["nomeCategoria"];
		$this->load->model('categorias_model');
		var_dump($nomeCategoria);
		$cadastrar = $this->categorias_model->inserirCategorias($nomeCategoria);
		if($cadastrar){
				redirect('eventos');
		}else{
			echo "<script> alert('ERRO')</scritp>";
		}
	}
}
