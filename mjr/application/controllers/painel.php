<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		if($this->session->userdata('logged_in')){
			$this->sessaoUsuario = $this->session->userdata('logged_in');
		}else{
			redirect('login');
		}
	}
	
	public function index()
	{
		$relatorio['relatorio'] = $this->graficoAnual();
		$this->load->view('helper/menu', $this->sessaoUsuario);
		$this->load->view('painel', $relatorio);
	}
	
	/* 
	 * Grafico
	 * 
	 * Teste = OK
	 */
	function graficoAnual(){
		$this->load->model('evento_model');
		$total = $this->evento_model->relatorioAnoCorrente();
		
		return $total;
	}
	
}
