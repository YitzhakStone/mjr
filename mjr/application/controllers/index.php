<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	public function index() {
		$result['result'] = $this -> listarEventos();
		$this -> load -> view('jovem', $result);
	}
	
	/* 
	 * Listar Categorias
	 * 
	 * Teste = OK
	 */
	function listarEventos() {
		$this -> load -> model('evento_model');
		$result = $this->evento_model->listarEventos();

		return $result;
	}
}
