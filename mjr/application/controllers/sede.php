<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sede extends CI_Controller {

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
		$this->load->view('sede', $jovens);
	}

	function listar_jovens(){
		$this -> load -> model('jovem_model');
		$jovens = $this->jovem_model->listarJovemID();
		
		return $jovens;	
	}


	function listar_igrejas(){
		$this -> load -> model('sede_model');
		$igrejas = $this->sede_model->listarSedes();
		
		$igrejasArray = array();
		
		foreach ($igrejas as $igreja){
			array_push($igrejasArray, $igreja);
		}
		echo json_encode(array("data" => $igrejasArray));
	}

	//Cadastra SEDE ok 
	function cadastrar_sede(){
		$this -> load -> model('sede_model');
		
		$nome = mysql_real_escape_string($_POST ["nome"]);
		$endereco = mysql_real_escape_string($_POST ["endereco"]);
		$obs = mysql_real_escape_string($_POST ["obs"]);

		$idlider = mysql_real_escape_string($_POST ["idlider"]);

		$igreja = new Sede_model(null, $nome, $endereco,$obs,$idlider);
		
		$cadastrar = $this->sede_model->cadastrarSede($igreja);		
		
		if($cadastrar){
				redirect('sede');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('sede')."';	
							</script>");
			
		}
	}

		//Deleta Sede OK
		function excluirSede(){
		$this->load->model('sede_model');		
		$idsede = mysql_real_escape_string($_POST ["idsede"]);
		
		$Sede = new Sede_model($idsede,null,null,null,null);
		
		$excluir = $this->sede_model->excluirSede($Sede);
		
		if($excluir){
			redirect('sede');
		}else{
			echo "<script> alert('ERRO')</scritp>";
		}
	}
	

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
			redirect('sede');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('sede')."';	
							</script>");
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////

}

?>