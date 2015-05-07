<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jovem extends CI_Controller {

	function __construct() {
		parent::__construct();

		if ($this -> session -> userdata('logged_in')) {
			$this -> sessaoUsuario = $this -> session -> userdata('logged_in');
		} else {
			redirect('login');
		}
	}

	//Carrega Menu e a view jovem
	//TESTE OK 
	public function index() {
		$result['result'] = $this -> listar_igrejas();
		$result['listaMinisterios'] = $this -> listar_ministerios();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this -> load -> view('jovem', $result);
		
	}
	
	//Lista igrejas para o select de cadastro de jovens
	//TESTE OK
	function listar_igrejas()
	{
		$this -> load -> model('sede_model');
		$igrejas = $this->sede_model->listarSedesID();
		return $igrejas;
	}

	//
	function listar_ministerios()
	{
		$this -> load -> model('ministerio_model');
		$ministerios = $this->ministerio_model->listarMinisteriosSimples();
		return $ministerios;
	}
	
	//Obtem a lista dos jovens para enviar a Tabel
	//TESTE OK
	function listar_jovens(){
		$this -> load -> model('jovem_model');
		$jovens = $this->jovem_model->listarJovem();
		$jovemArray = array();

		foreach ($jovens as $jovem){
			$jovem->DatNasc = date("d/m/Y", strtotime($jovem->DatNasc));
			array_push($jovemArray, $jovem);
		}
	
		echo json_encode(array("data" => $jovemArray));	
	}
	

		/**
	 * Cadastra um novo Jovem
	 *
	 * @param	não possui
	 * @return	redireciona para  a propria página
	 */
	function cadastrarJovem(){

		$Tnomejovem  = mysql_real_escape_string($_POST["nomejovem"]);
		$datnascjovem  = mysql_real_escape_string($_POST['datnascjovem']);
		//converte a data recebida
		$datnascjovem = date("Y-m-d", strtotime($datnascjovem));
		$nomepai = mysql_real_escape_string($_POST['nomepai']);
		$nomemae  = mysql_real_escape_string($_POST['nomemae']);
		$enderecojovem  = mysql_real_escape_string($_POST['enderecojovem']);
		$telefonejovem = mysql_real_escape_string($_POST['telefonejovem']);
		$celuluarjovem  = mysql_real_escape_string($_POST['celuluarjovem']);
		$emailjovem  = mysql_real_escape_string($_POST['emailjovem']);
		$rgjovem  = mysql_real_escape_string($_POST['rgjovem']);
		$cpfjovem = "";
		//$cpfjovem = mysql_real_escape_string($_POST['cpfjovem']);
		$obsjovem  = mysql_real_escape_string($_POST['obsjovem']);
		$idsede = mysql_real_escape_string($_POST['idsede']);

		//cria um novo jovem
		$this->load->model('jovem_model');

		$novoJovem = new jovem_model(null,$Tnomejovem,$datnascjovem,
			$nomepai,$nomemae,$enderecojovem,$telefonejovem, 
			$celuluarjovem, $emailjovem,$rgjovem,$cpfjovem,
			$obsjovem,$idsede);

		//print_r ($novoJovem);

		$cadastrar = $this->jovem_model->cadastrarJovem($novoJovem);


		if($cadastrar){
				redirect('jovem');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('jovem')."';	
							</script>");

			
		}

	}

	
	function alterarJovem(){

		//print_r($_POST);
		$this->load->model('jovem_model');		
		$idjovem  = mysql_real_escape_string($_POST["ID_Jovem"]);
		$Tnomejovem  = mysql_real_escape_string($_POST["iptnomejovem"]);
		$datnascjovem  = mysql_real_escape_string($_POST['u_datnascjovem']);
		//converte a data recebida
		$datnascjovem = date("Y-m-d", strtotime($datnascjovem));
		$nomepai = mysql_real_escape_string($_POST['u_nomepai']);
		$nomemae  = mysql_real_escape_string($_POST['u_nomemae']);
		$enderecojovem  = mysql_real_escape_string($_POST['u_enderecojovem']);
		$telefonejovem = mysql_real_escape_string($_POST['u_telefonejovem']);
		$celuluarjovem  = mysql_real_escape_string($_POST['u_celuluarjovem']);
		$emailjovem  = mysql_real_escape_string($_POST['u_emailjovem']);
		$rgjovem  = mysql_real_escape_string($_POST['u_rgjovem']);
		//$cpfjovem = mysql_real_escape_string($_POST['u_cpfjovem']);
		$cpfjovem = "";
		$obsjovem  = mysql_real_escape_string($_POST['u_obsjovem']);
		$idsede = mysql_real_escape_string($_POST['u_idsede']);

		//cria um novo jovem
		$this->load->model('jovem_model');

		$novoJovem = new jovem_model($idjovem,$Tnomejovem,$datnascjovem,
			$nomepai,$nomemae,$enderecojovem,$telefonejovem, 
			$celuluarjovem,$emailjovem,$rgjovem,$cpfjovem,
			$obsjovem,$idsede);

		$alterar = $this->jovem_model->alterarJovem($novoJovem);
		
		if($alterar){
			redirect('jovem');
		}else{
			echo utf8_decode("<script>
									alert('Todos os campos são obrigatórios');
									location.href='".base_url('jovem')."';	
							</script>");
		}
	}
		
	
	//Deleta um jovem
	//TESTE OK
	function excluirJovem(){
		$this->load->model('jovem_model');
		
		$idJovem = mysql_real_escape_string($_POST ["ID_Jovem"]);
		
		$jovem = new jovem_model($idJovem,null,null,
			null,null,null,null, 
			null, null,null,null,
			null,null);

		
		$excluir = $this->jovem_model->excluirJovem($jovem);
		
		if($excluir){
			redirect('jovem');
		}else{
			echo "<script> alert('Ocorreu um erro ao Excluir o Jovem')</scritp>";
		}
	}

	function InserirEmMinisterio()
	{
		$this->load->model('ministerio_model');
		$idjovem = mysql_real_escape_string($_POST ["ID_JovemMinisterio"]);
		$idministerio = mysql_real_escape_string($_POST ["idminist"]);

		$vincular = $this->ministerio_model->CadastrarNoMinisterio($idjovem,$idministerio);

		if($vincular){
			redirect('jovem');
		}else{
			//echo "<script> alert('Erro: Verifique se o jovem não está cadastardo no ministerio!')</scritp>";
			redirect('jovem');
		}

	}
	
}
?>