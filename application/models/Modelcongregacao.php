<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelcongregacao extends CI_Model {
	
	public function getCongregacoes(){
		$this->db->select("*");
        $this->db->from("congregacao");
        return $this->db->get();
		
	}
	
	public function Cadastrar($parametros) {        
		return $this->db->insert("congregacao",$parametros);
    }
	
	
	
	
	
}