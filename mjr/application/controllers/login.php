<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	
	/* 
	 * Login 
	 * 
	 * Orientação a objeto
	 * 
	 * Teste = OK
	 */
	function verificaLogin(){
		$this->load->model('login_model');
		$login = mysql_real_escape_string(($_POST ["login"]));
		$senha = mysql_real_escape_string(md5($_POST ["senha"]));
		
		$objLogin = new Login_model($login, $senha);
		
		$result = $this->login_model->verifica_login($objLogin);
		
		if($result){
			
			$session_array = array ();
			
			foreach ($result as $row) {
				
				$session_array = array (
							'idusuario' => $row->idusuario,
							'nmusuario' => $row->nmusuario,
							'fgstatus' => $row->fgstatus,
							'perfil' => $row->perfil  
					);
			$this->session->set_userdata ('logged_in', $session_array);
			
			}

			redirect ('jovem');
		}else{
			$this->session->sess_destroy();
			echo "<script> alert('Login invalido')</script>";
			echo "<script> location.href='".base_url('login')."';</script>";
			
		}
	}
	
	function sair(){
		$this->session->sess_destroy();
		redirect ('login');
	}
	
}
