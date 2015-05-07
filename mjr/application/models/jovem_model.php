<?php
class Jovem_model extends CI_Model {

	const TABELA = 'jovem';

	var $idjovem;
	var $nomejovem;
	var $datnascjovem;
	var $nomepai;
	var $nomemae;
	var $enderecojovem;
	var $telefonejovem;
	var $celuluarjovem;
	var $emailjovem;
	var $rgjovem;
	var $cpfjovem;
	var $obsjovem;
	var $idsede;

	//construtor
	function __construct($idjovem= "",$nomejovem= "",$datnascjovem= "",$nomepai= "",$nomemae= "",$enderecojovem= "",$telefonejovem= "", $celuluarjovem= "", $emailjovem= "",$rgjovem= "",$cpfjovem= "",$obsjovem= "",$idsede= ""){

		$this ->idjovem = $idjovem;	
		$this ->nomejovem =$nomejovem;
		$this ->datnascjovem =$datnascjovem;
		$this ->nomepai =$nomepai;
		$this ->nomemae =$nomemae;
		$this ->enderecojovem =$enderecojovem;
		$this ->telefonejovem =$telefonejovem;
		$this ->celuluarjovem =$celuluarjovem;
		$this ->emailjovem =$emailjovem;
		$this ->rgjovem =$rgjovem;
		$this ->cpfjovem =$cpfjovem;
		$this ->obsjovem =$obsjovem;
		$this ->idsede =$idsede;
	}

	//retorna todos jovens
	function listarJovem(){


		$this->db->select('jovem.*,sede.Nome as Nome_Sede ,sede.ID_Sede');
		$this->db->from(self::TABELA);
		$this->db->join('sede', 'sede.ID_Sede = jovem.ID_Sede', 'left');
		$this->db->order_by('Nome','ASC');
		$this->db->where('jovem.FlgExcluido', '0');


		$query = $this->db->get();
		return $query->result();

		//$query = $this->db->get(self::TABELA);
		//return $query->result();
	}

	function listarJovemID(){


		$this->db->select('Nome as Nome_Jovem, ID_Jovem');
		$this->db->from(self::TABELA);
		$this->db->where('jovem.FlgExcluido', '0');
		$this->db->order_by('Nome','ASC');
		$query = $this->db->get();

		return $query->result();

		//$query = $this->db->get(self::TABELA);
		//return $query->result();
	}

	function listarUnicoJovemID($id){


		$this->db->select('jovem.*,sede.Nome as Nome_Sede ,sede.ID_Sede');
		$this->db->from(self::TABELA);
		$this->db->join('sede', 'sede.ID_Sede = jovem.ID_Sede', 'left');
		$this->db->where('ID_Jovem', $id);
		$query = $this->db->get();

		return $query->result();

		//$query = $this->db->get(self::TABELA);
		//return $query->result();
	}

	//Delete
	function excluirJovem(Jovem_model $jovem){
		if(!empty($jovem->idjovem)){

			$data = array(
					'FlgExcluido' => 1
			);

			$this->db->where('ID_Jovem',$jovem->idjovem);
			
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;

		}else{
			return false;
		}			

	}

	//Update
	function alterarJovem(Jovem_model $jovem){
		if(!empty($jovem->nomejovem)&& !empty($jovem->datnascjovem) && !empty($jovem->idsede))
		{

			$data = array(
					'Nome' => $jovem->nomejovem,
					'DatNasc' => $jovem->datnascjovem ,
					'NomePai' => $jovem->nomepai,
					'NomeMae' => $jovem->nomemae, 
					'Endereco' => $jovem->enderecojovem,
					'Telefone' => $jovem->telefonejovem,
					'Celular'=>$jovem->celuluarjovem,
					'Email'=>$jovem->emailjovem,
					'RG'=>$jovem->rgjovem,
					'CPF'=>$jovem->cpfjovem,
					'Obs'=>$jovem->obsjovem,
					'ID_Sede'=>$jovem->idsede
			);

			$this->db->where('ID_Jovem',$jovem->idjovem);
			if($this->db->update(self::TABELA, $data))
				return true;
			else
				return false;
		}

	}

	//Insert
	function cadastrarJovem (jovem_model $jovem){

			if(!empty($jovem->nomejovem)&& !empty($jovem->datnascjovem) && !empty($jovem->idsede)){
					
				$data = array(
					'Nome' => $jovem->nomejovem,
					'DatNasc' => $jovem->datnascjovem,
					'NomePai' => $jovem->nomepai,
					'NomeMae' => $jovem->nomemae, 
					'Endereco' => $jovem->enderecojovem,
					'Telefone' => $jovem->telefonejovem,
					'Celular'=>$jovem->celuluarjovem,
					'Email'=>$jovem->emailjovem,
					'RG'=>$jovem->rgjovem,
					'CPF'=>$jovem->cpfjovem,
					'Obs'=>$jovem->obsjovem,
					'ID_Sede'=>$jovem->idsede
				);
			
				$inserir = $this->db->insert(self::TABELA, $data);

				if($inserir)
					return true;
				else
					return false;
			}else{
				return false;
			}
		
	}
}

?>