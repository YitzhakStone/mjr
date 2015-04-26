<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ficha extends CI_Controller {



	function __construct() {
		parent::__construct();

	}

	public function index() {
		$this -> load -> view('ficha');
	}
	

	function unico_jovem($id){
		$this -> load -> model('jovem_model');
		$jovem = $this->jovem_model->listarUnicoJovemID($id);
		return $jovem;

	}
	/* 
	 * Listar Categorias
	 * 
	 * Teste = OK
	 */
	function imprimir($id) {
		//$this -> load -> view('ficha');
		$dados = $this->unico_jovem($id);
		echo" 

<!doctype html>
<html>
<head>
	<title>Ficha de Cadastro Jovem - MJRBH</title>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
</head>
<body>
<h1><span style='font-size:22px'>Ficha de Cadastro Jovem - MJRBH</span></h1>

<p><strong>Nome:</strong> " . $dados[0]->Nome  . " </p>


<p><strong>Data de Nascimento: </strong> " . $dados[0]->DatNasc  . " </p>


<p><strong>Nome do Pai:</strong> ". $dados[0]->NomePai ."</p> 


<p><strong>Nome da M&atilde;e:</strong>  " . $dados[0]->NomeMae . "</p>


<p><strong>Telefone: </strong> " . $dados[0]->Telefone . "</p> 


<p><strong>Celular:</strong> " . $dados[0]->Celular . "</p>


<p><strong>Email: </strong> " . $dados[0]->Email. "</p>


<p><strong>Endere&ccedil;o:</strong> " . $dados[0]->Endereco . "</p>


<p><strong>RG:</strong> " . $dados[0]->RG . "</p>


<p><strong>Igreja:</strong></p> 


<p><strong>Minist&eacute;rio:</strong></p>


<p><strong>Observa&ccedil;&otilde;es:</strong> " . $dados[0]->Obs . "</p>

<p>&nbsp;</p>
</body>
</html>";

	}
}