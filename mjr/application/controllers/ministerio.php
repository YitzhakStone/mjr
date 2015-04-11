<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ministerio extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('logged_in')){
			$this->sessaoUsuario = $this->session->userdata('logged_in');
			if($this->sessaoUsuario['perfil'] != 'admin'){
				redirect('login');
			}	
		}else{
			redirect('login');
		}
	}
	
	public function index()
	{
		$jovens['jovens'] = $this->listar_jovens();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('ministerio', $jovens);
	}

	function listar_jovens(){
		$this -> load -> model('jovem_model');
		$jovens = $this->jovem_model->listarJovemID();
		
		return $jovens;	
	}


	function listar_ministerios(){
		$this -> load -> model('ministerio_model');
		$ministerios = $this->ministerio_model->listarMinisterios();
		
		$ministerioArray = array();
		
		foreach ($ministerios as $ministerio){
			array_push($ministerioArray, $ministerio);
		}
		echo json_encode(array("data" => $ministerioArray));
	}

	//Cadastra Ministerio ok 
	function cadastrar_ministerio(){
		$this -> load -> model('ministerio_model');
		
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$idlider = mysql_real_escape_string($_POST ["idlider"]);

		$ministerio = new Ministerio_model(null,$nome,$idlider);
		
		$cadastrar = $this->ministerio_model->cadastrarMinisterio($ministerio);		
		
		if($cadastrar){
				redirect('ministerio');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ingressos')."';	
							</script>");
			
		}
	}

		//Deleta Sede OK
	function excluir_ministerio(){
		$this->load->model('ministerio_model');		
		$idministerio = mysql_real_escape_string($_POST ["idministerio"]);
		
		$ministerio = new Ministerio_model($idministerio,null,null);
		
		$excluir = $this->ministerio_model->excluirMinisterio($ministerio);
		
		if($excluir){
			redirect('ministerio');
		}else{
			echo "<script> alert('ERRO');</scritp>";
		}
	}


	function alterarministerio(){
		$this->load->model('ministerio_model');
		$idministerio = mysql_real_escape_string($_POST ["iptidMinisterio"]);
		$nome = mysql_real_escape_string($_POST ["iptnome"]);
		$idlider = mysql_real_escape_string($_POST ["iptidlider"]);

		$ministerio = new Ministerio_model($idministerio,$nome,$idlider);
		$alterar = $this->ministerio_model->alterarMinisterio($ministerio);

		if($alterar){
			redirect('ministerio');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ministerio')."';	
							</script>");
		}

	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////////////
		



		function alterarSede(){

		$this -> load -> model('sede_model');
		$idsede = mysql_real_escape_string($_POST ["iptidSede"]);		
		$nome = mysql_real_escape_string($_POST ["iptnome"]);
		$endereco = mysql_real_escape_string($_POST ["iptendereco"]);
		$obs = mysql_real_escape_string($_POST ["iptobs"]);
		$idlider = mysql_real_escape_string($_POST ["iptidlider"]);

		$igreja = new Sede_model($idsede, $nome, $endereco,$obs,$idlider);
		
		$alterar = $this->sede_model->alterarSede($igreja);
		
		if($alterar){
			redirect('jovem');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('eventos')."';	
							</script>");
		}
	}



	
	function listar_ingressos_comprados(){
		$this -> load -> model('compra_model');
		$ingressoComprados = $this->compra_model->buscarIngressosComprados();
		
		$ingressosArray = array();
		
		foreach ($ingressoComprados as $ingressoComprado){
			array_push($ingressosArray, $ingressoComprado);
		}
			
		
		echo json_encode(array("data" => $ingressosArray));
	}
	
	/* 
	 * Comprar Ingresso
	 * 
	 * Orientação a objeto = Sim
	 * 
	 * Teste = OK
	 */
	function comprarIngresso(){
		$this -> load -> model('compra_model');
		
		$protocolo = time();
		$quantidade = mysql_real_escape_string($_POST ["quantidade"]);
		$precos = mysql_real_escape_string($_POST ["valor"]);
		$cliente_idcliente = mysql_real_escape_string($_POST ["cliente_idcliente"]);
		$evento_idevento = mysql_real_escape_string($_POST ["idevento"]);
		
		$valor_total = $quantidade * $precos;
		$valor_total = number_format($valor_total, 2, '.', ''); ;
		
		$compra_model = new Compra_model(null, $protocolo, $quantidade, $valor_total, $cliente_idcliente, $evento_idevento);
		
		$compra = $this->compra_model->cadastrarCompra($compra_model);
		
		if($compra){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Erro);
									location.href='".base_url('eventos')."';	
							</script>");
			
		}
		
	}

	function listar_eventos(){
		$this -> load -> model('evento_model');
		$eventos = $this->evento_model->listarEventos();
		
		return $eventos;	
	}
	
	/* 
	 * Cadastrar Cliente
	 * 
	 * Orientação a objeto = Sim
	 * 
	 * Teste = OK
	 */	
	function cadastrarCliente(){
		$this -> load -> model('cliente_model');
		
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$cpf = mysql_real_escape_string($_POST ["cpf"]);
		$email = mysql_real_escape_string($_POST ["email"]);

		$cliente_model = new Cliente_model(null, $nome, $cpf, $email);
		
		$cadastrar = $this->cliente_model->cadastrarCliente($cliente_model);		
		
		if($cadastrar){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ingressos')."';	
							</script>");
			
		}
	}
	
	/* 
	 * Alterar Ingresso
	 * 
	 * Orientação a objeto = Sim
	 * 
	 * Teste = OK
	 */
	function alterarCliente(){
		$this -> load -> model('cliente_model');
		
		$idcliente= mysql_real_escape_string($_POST ["idcliente"]);
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$cpf = mysql_real_escape_string($_POST ["cpf"]);
		$email = mysql_real_escape_string($_POST ["email"]);

		$cliente_model = new Cliente_model($idcliente, $nome, $cpf, $email);
		
		$alterar = $this->cliente_model->alterarCliente($cliente_model);		
		
		if($alterar){
				redirect('ingressos');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('ingressos')."';	
							</script>");
			
		}
	}
	
	/* 
	 * Excluir Cliente
	 * 
	 * Orientação a objeto = Sim
	 * 
	 * Teste = OK
	 */
	function excluirCliente(){
		$this->load->model('cliente_model');
		$this->load->model('compra_model');
		
		$idevento = mysql_real_escape_string($_POST ["idcliente"]);
		
		$excluir_ingresso = $this->compra_model->excluirIngressoId($idevento);		
		$cliente_model = new Cliente_model($idevento, null, null);
		
		$excluir = $this->cliente_model->excluirCliente($cliente_model);
		
		if($excluir){
			redirect('ingressos');
		}else{
			echo "<script> alert('ERRO')</scritp>";
		}
	}
	
	/* 
	 * Listar Preço por Id
	 * 
	 * Orientação a objeto = Não
	 * 
	 * Teste = OK
	 */
	function listarPrecoPorId($id){
		$this->load->model('evento_model');
		
		$busca = $this->evento_model->listarEventosPorId($id);
		
		$arrayMensagem = array();
		
		if($busca){
			foreach ($busca as $row) {
				$arrayMensagem = array(
										"tipo" => "success",
										"preco" => $row->preco									
											);
			}
			
		}else{
			$arrayMensagem = array("tipo" => "success");
		}
		echo json_encode($arrayMensagem);
	}
	
}

?>















