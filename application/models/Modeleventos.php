<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modeleventos extends CI_Model {
	
	public function getEventos(){
		$this->db->select("*");
        $this->db->from("site_eventos");
        return $this->db->get();
	}	
	
	public function Cadastrar($parametros) { 
		return $this->db->insert("site_eventos",$parametros);
    }
	
	public function getEvento($cod){
		return $this->db->select("*")
			->from("site_eventos")
			->where("idEvento",$cod)
			->get();
	}
	
	public function Editar($parametros, $cod){		 
        $this->db->where('idEvento', $cod);
        return $this->db->update('site_eventos', $parametros);		
	}
	
	public function Excluir($cod){
		 return $this->db->delete('site_eventos', array('idEvento' => $cod));
	}

	
}