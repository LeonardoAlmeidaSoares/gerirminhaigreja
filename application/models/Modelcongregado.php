<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelcongregado extends CI_Model {
	
	public function Cadastrar($parametros) {        
		return $this->db->insert("congregado",$parametros);
    }
	
	public function cadastrarResponsavel($idDepartamento,$idMembro) {
        return $this->db->insert("membro_departamento", array("idDepartamento"=>$idDepartamento, "idMembro"=>$idMembro, "responsavel" =>1));
		
    }
	
	public function getMembros(){
		return $this->db->select("*")->from("membro")->get();
	}
	
}