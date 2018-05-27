<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelcongregacao extends CI_Model {
	
	public function getCongregacao($codCongregacao){
		return $this->db->get_where("congregacao", array("idCongregacao" => $codCongregacao));
	}

	public function getCongregacoes(){
		$this->db->select("*");
        $this->db->from("congregacao");
        return $this->db->get();	
	}
	
	public function Cadastrar($parametros) {        
		return $this->db->insert("congregacao",$parametros);
    }
	
	public function get($cod){
		return $this->db->select("c.*, uf.codEstado as estado")
			->from("congregacao c")
			->join("cidade ci", "ci.codCidade = c.idCidade")			
			->join("estado uf", "uf.codEstado = ci.codEstado")
			->where("idCongregacao",$cod)
			->get();
	}
	
	public function Alterar($parametros,$cod) {
       $this->db->where('idCongregacao', $cod);
        return $this->db->update('congregacao', $parametros);
    }
	
}