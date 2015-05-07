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
		$data['jovens'] = $this->listar_jovens();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('ministerio', $data);
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

	function listar_jovens_ministerios($idMinist){
		$this -> load -> model('ministerio_model');
		$ministerios = $this->ministerio_model->listarJovensMinisterios($idMinist);
		
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
									location.href='".base_url('ministerio')."';	
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

	function removerDoMinisterio(){
		$this->load->model('ministerio_model');		
		$idministerio = mysql_real_escape_string($_POST ["idministerioV"]);
		$idjovem = mysql_real_escape_string($_POST ["idJovemV"]);
		
		$excluir = $this->ministerio_model->removerdoMinisterio($idministerio,$idjovem );
		
		if($excluir){
			redirect('ministerio');
		}else{
			echo "<script> alert('ERRO');</scritp>";
		}
	}
	
	
}

?>